import Modal from './lib/modal.js'
import ContentPopup from './app/index.js'

jQuery(function($) {
  let app
  let modal

  $('body').on('click', '[data-opinionstage-content-launch]', function (event) {
    event.preventDefault()

    if ( modal === undefined ) {
      modal = new Modal({
        content: $('[data-opinionstage-content-popup-template]').html(),
        onCreate (modal) {
          app = new ContentPopup(modal)
        },
      })
    }

    modal.open()
  })
})
