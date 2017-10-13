import Vue from 'vue'
import './components/popup-content.js'
import './components/widget-list.js'
import './components/new-widget.js'
import '../styles/content-popup.scss'

export default function (modal) {
  return new Vue({
    el: '[data-opinionstage-content-popup]',

    data: {
      showClientContent: true,
      isClientLoggedIn: null,
    },

    beforeMount () {
      this.isClientLoggedIn = this.$el.dataset.opinionstageClientLoggedIn === '1'
    },

    methods: {
      closePopup (/*event*/) {
        modal.close()
      },

      insertShortcode (shortcode) {
        wp.media.editor.insert(shortcode)
        this.closePopup()
      },

      showClientWidgets () {
        this.showClientContent = true
      },

      showTemplatesWidgets () {
        this.showClientContent = false
      },
    },
  })
}
