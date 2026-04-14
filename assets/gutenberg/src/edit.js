import {__} from '@wordpress/i18n'

import './editor.scss'
export default function Edit({name, className, attributes, setAttributes}) {
  let {
    embedUrl,
    buttonText,
    insertItemImage,
    insertItemOsTitle,
    insertItemOsView,
    insertItemOsEdit,
    insertItemOsStatistics,
  } = attributes
  
  const isDeprecated = name !== 'opinion-stage/block-os-poll';
  const deprecationNotice = isDeprecated ? (
    <div className="os-deprecation-notice" style={{
      background: '#fcf0c0',
      border: '1px solid #e6c200',
      borderRadius: '3px',
      padding: '8px 12px',
      marginBottom: '8px',
      fontSize: '13px',
      color: '#3d3200',
    }}>
      ⚠️ {__('This block type is legacy. Use "Quiz, Poll & Survey" block.', 'opinionstage')}
    </div>
  ) : null;

  if ( ! OPINIONSTAGE_GUTENBERG_DATA.userLoggedIn ) {
    return (
      <div className={className}>
        <div className="os-widget-wrapper components-placeholder">
          {deprecationNotice}
          <p className="components-heading">
            <img src={OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl} alt="Opinionstage Logo"/>
          </p>
          <p className="components-heading">Please connect WordPress to Opinion Stage to start adding polls, quizzes,
            surveys & forms
          </p>
          <a href={OPINIONSTAGE_GUTENBERG_DATA.loginPageUrl}
             className="opinionstage-button opinionstage-button__blue">Connect
          </a>
        </div>
      </div>
    )
  }

  const placeWidget = function (widget) {
    const selectedWidgetType = widget.type
    const newAttributes = {
      widgetType: selectedWidgetType,
      lockEmbed: true,
      buttonText: 'Change',
      embedUrl: widget.landingPageUrl.replace(/^https?:\/\/[^/]+\//, '/'),
      insertItemImage: widget.imageUrl,
      insertItemOsTitle: widget.title,
      insertItemOsView: widget.landingPageUrl,
      insertItemOsEdit: widget.editUrl,
      insertItemOsStatistics: widget.statsUrl,
    }
    setAttributes(newAttributes)
  }

  const selectWidget = e => {
    e.preventDefault()
    OpinionStage.contentPopup.open({
      onWidgetSelect: placeWidget
    })
  }

  let createNewWidgetUrl = `${OPINIONSTAGE_GUTENBERG_DATA.createNewWidgetUrl}`
  let contentViewEditStatOs = (
    <div className="os-widget-wrapper components-placeholder">
      {deprecationNotice}
      <p className="components-heading">
        <img src={OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl} alt="Opinionstage Logo"/>
      </p>
      <a className="opinionstage-button opinionstage-button__blue" href='#' onClick={selectWidget}>Select an
        Item</a>
      <a href={createNewWidgetUrl} target="_blank"  rel="noopener"
         className="opinionstage-button opinionstage-button__blue">Create a New Item</a>
    </div>
  )
  if (
    embedUrl 
    && embedUrl !== ''
    && buttonText === 'Change' 
  ) {
    contentViewEditStatOs = (
      <div className="os-widget-wrapper components-placeholder">
        {deprecationNotice}
        <p className="components-heading">
          <img src={OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl} alt="Opinionstage Logo"/>
        </p> 
        <div className="components-preview__block">
          <div className="components-preview__leftBlockImage">
            <img src={insertItemImage} alt={insertItemOsTitle} className="image"/>
            <div className="overlay">
              <div className="text">
                <a href={insertItemOsView} className='opinionstage-button opinionstage-button__blue' target="_blank"  rel="noopener">View</a>
                <a href={insertItemOsEdit} className='opinionstage-button opinionstage-button__blue' target="_blank"  rel="noopener">Edit</a>
                <a href={insertItemOsStatistics} className='opinionstage-button opinionstage-button__blue' target="_blank"  rel="noopener">Results</a>
                <a href='#' className='opinionstage-button opinionstage-button__blue' onClick={selectWidget}>{buttonText}</a>
              </div>
            </div>
          </div>
          <div className="components-preview__rightBlockContent">
            <div className="components-placeholder__label">{insertItemOsTitle}</div>
          </div>
        </div>
      </div>
    )
  } else {
    setAttributes({buttonText: 'Embed'})
  }

  return (
    <div className={className}>
      {contentViewEditStatOs}
    </div>
  )
}
