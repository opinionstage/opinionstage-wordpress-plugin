import { __ } from '@wordpress/i18n'

import './editor.scss'

const $ = jQuery
let dropdownOptions = false

export default function Edit ({ className, attributes, setAttributes }) {
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

  const onSelectButtonClick = value => {
    window.verifyOSInsert = function(widget){
      setAttributes({ embedUrl: widget, buttonText:'Change' })

      let opinionStageWidgetVersion = OPINIONSTAGE_GUTENBERG_DATA.OswpPluginVersion
      let opinionStageClientToken = OPINIONSTAGE_GUTENBERG_DATA.OswpClientToken
      let opinionstageFetchDataUrl = OPINIONSTAGE_GUTENBERG_DATA.OswpFetchDataUrl+'?type=poll&page=1&per_page=99'
      fetch(opinionstageFetchDataUrl, {
        method: "GET",
        headers: {
          'Accept':'application/vnd.api+json',
          'Content-Type':'application/vnd.api+json',
          'OSWP-Plugin-Version':opinionStageWidgetVersion,
          'OSWP-Client-Token': opinionStageClientToken
        },
      })
        .then(async res => {
          let data = await res.json()
          data = data.data
          dropdownOptions = data
          // force reprinting instead!!
          setAttributes({ buttonText: buttonText})

        })
        .catch(function(err) {
          console.log('ERROR: ' + err.message)
        })
    }
  }

  const onChangeButtonClick = value => {
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
  }

  let createNewWidgetUrl = OPINIONSTAGE_GUTENBERG_DATA.createNewWidgetUrl+'&w_type=poll'

  // Connected to opinionstage
  $(document).ready(function ($) {
    // Content Popup Launch Working
    $('body').on('click', '[data-opinionstage-content-launch]', function (event) {
      event.preventDefault()
      setTimeout(function(){
        $('.progress_message').css('display', 'block')
        $('.content__list').css('display', 'none')
        let text = $('#oswpLauncherContentPopuppoll').attr('data-os-block')
        $("button#dropbtn span").text(text)
        let inputs = $(".filter__itm")
        for(let i = 0; i < inputs.length; i++){
          if($(inputs[i]).text() == text){
            setTimeout(function(){
              $(inputs[i]).trigger('click')
              $('.progress_message').css('display', 'none')
              $('.content__list').css('display', 'block')

              $('button.content__links-itm').on('click',null, function(e) {
                $('.tingle-modal.opinionstage-content-popup').hide()
                $('.tingle-modal.opinionstage-content-popup.tingle-modal--visible').hide()
              })
            },2500)

            break
          }
          else {
            $('.progress_message').css('display', 'block')
            $('.content__list').css('display', 'none')
          }
        }
      },1000)
    })
  })

  // Fetching Ajax Call Result
  if ( dropdownOptions !== false ) {
    for (let i = 0; i < dropdownOptions.length; i++) {
      let getLandingPageUrlOs = function(href) {
        let locationUrlOS = document.createElement("a")
        locationUrlOS.href = href
        return locationUrlOS
      }
      let locationUrlOS = getLandingPageUrlOs(dropdownOptions[i].attributes['landing-page-url'])
      let matchValue = locationUrlOS.pathname
      if ( embedUrl === matchValue ) {
        setAttributes({
          lockEmbed:              true,
          buttonText:             'Change',
          insertItemImage:        dropdownOptions[i].attributes['image-url'],
          insertItemOsTitle:      dropdownOptions[i].attributes['title'],
          insertItemOsView:       dropdownOptions[i].attributes['landing-page-url'],
          insertItemOsEdit:       dropdownOptions[i].attributes['edit-url'],
          insertItemOsStatistics: dropdownOptions[i].attributes['stats-url'],
        })
        break
      }
    }
  }

  // Content On Editor
  let contentViewEditStatOs = (
    <div class="os-poll-wrapper components-placeholder">
      <p class="components-heading"><img src={OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl} alt=""/></p>
      <span id="oswpLauncherContentPopuppoll" class="components-button is-button is-default is-block is-primary" data-opinionstage-content-launch data-os-block="poll" onClick={onSelectButtonClick} >Select a Poll</span>
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
                  <input type="button" value={buttonText} class="components-button is-button is-default is-large left-align" onClick={onChangeButtonClick}/>
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
