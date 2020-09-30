import { __ } from '@wordpress/i18n'

import './editor.scss'

const $ = jQuery
let dropdownOptions = false

export default function Edit ({ name, className, attributes, setAttributes }) {
  let {
    embedUrl,
    lockEmbed,
    buttonText,
    insertItemImage,
    insertItemOsTitle,
    insertItemOsView,
    insertItemOsEdit,
    insertItemOsStatistics,
  } = attributes

  if ( OPINIONSTAGE_GUTENBERG_DATA.userLoggedIn === 'false' ) {
    return (
      <div className={ className }>
        <div class="os-poll-wrapper components-placeholder">
          <p class="components-heading"><img src={OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl} alt=""/></p>
          <p class="components-heading">Please connect WordPress to Opinion Stage to start adding polls</p>
          <a href={OPINIONSTAGE_GUTENBERG_DATA.loginPageUrl} class="components-button is-button is-default is-block is-primary">Connect</a>
        </div>
      </div>
    )
  }

  const placeWidget = function (widget) {
    setAttributes({
      lockEmbed:              true,
      buttonText:             'Change',
      embedUrl:               widget.landingPageUrl.replace(/^https?:\/\/[^/]+\//,'/'),
      insertItemImage:        widget.imageUrl,
      insertItemOsTitle:      widget.title,
      insertItemOsView:       widget.landingPageUrl,
      insertItemOsEdit:       widget.editUrl,
      insertItemOsStatistics: widget.statsUrl,
    })
  }

  const selectWidget = _event => {
    OpinionStage.contentPopup.open({ onWidgetSelect: placeWidget })
  }

  const changeWidget = _event => {
    OpinionStage.contentPopup.open({ onWidgetSelect: widget => {
      setAttributes({
        embedUrl: '',
        buttonText:'Embed',
        lockEmbed: false,
        insertItemImage: false,
        insertItemOsTitle: false,
        insertItemOsView: false,
        insertItemOsEdit: false,
        insertItemOsStatistics: false,
      })
      placeWidget(widget)
    }})
  }

  let createNewWidgetUrl = OPINIONSTAGE_GUTENBERG_DATA.createNewWidgetUrl+'&w_type=poll'

  // Content On Editor
  let contentViewEditStatOs = (
    <div class="os-poll-wrapper components-placeholder">
      <p class="components-heading"><img src={OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl} alt=""/></p>
      <button class="components-button is-button is-default is-block is-primary" onClick={selectWidget} >Select a Poll</button>
      <a href={createNewWidgetUrl} target="_blank" class="components-button is-button is-default is-block is-primary">Create a New Poll</a>
    </div>
  )

  if ( embedUrl && embedUrl !== '' ) {
    if ( buttonText === 'Change' ) {
      contentViewEditStatOs = (
        <div class="os-poll-wrapper components-placeholder">
          <p class="components-heading"><img src={OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl} alt=""/></p>
          <div class="components-preview__block" >
            <div class="components-preview__leftBlockImage">
              <img src={insertItemImage} alt={insertItemOsTitle} class="image" />
              <div class="overlay">
                <div class="text">
                  <a href={insertItemOsView} target="_blank"> View </a>
                  <a href={insertItemOsEdit} target="_blank"> Edit </a>
                  <a href={insertItemOsStatistics} target="_blank"> Statistics </a>
                  <input type="button" value={buttonText} class="components-button is-button is-default is-large left-align" onClick={changeWidget}/>
                </div>
              </div>
            </div>
            <div class="components-preview__rightBlockContent">
              <div class="components-placeholder__label">Poll: {insertItemOsTitle}</div>
            </div>
          </div>
        </div>
      )
    }
  } else {
    setAttributes({ buttonText: 'Embed'})
  }

  return (
    <div className={ className }>
      {contentViewEditStatOs}
    </div>
  )
}
