import Vue from 'vue'
import store from '../store.js'
import RSVP from 'rsvp'

export default Vue.component('popup-content', {
  template: '#opinionstage-popup-content',

  props: [
    'showClientContent',
    'clientIsLoggedIn',
    'clientWidgetsUrl',
    'sharedWidgetsUrl',
    'accessKey',
    'pluginVersion',
  ],

  data () {
    return {
      dataLoading: false,
      widgets: [],
      searchCriteria: {},
      noMoreData: false,
    }
  },

  store,

  methods: {
    reloadData ({ widgetType, widgetTitle }) {
      this.searchCriteria = { page: 1, type: widgetType, title: widgetTitle }
      this.widgets = []
      this.noMoreData = false
      this.$store.commit('clearWidgets')

      loadData.call(this, this.searchCriteria).then( () => {
        this.widgets = this.$store.state.widgets[0]
      })
    },

    appendData () {
      this.searchCriteria.page += 1

      loadData.call(this, this.searchCriteria).then( () => {
        const newWidgets = this.$store.state.widgets[this.searchCriteria.page-1]

        if ( _.isEmpty(newWidgets) ) {
          this.noMoreData = true
        } else {
          this.widgets = this.widgets.concat( newWidgets )
        }
      })
    },

    insertShortcode (shortcode) {
      this.$emit('insert-shortcode', shortcode)
    },
  },
})

function loadData (searchCriteria) {
  this.dataLoading = true

  const load = this.showClientContent ? loadClientWidgets : loadTemplateWidgets

  return load.call(this, searchCriteria).then( () => {
    this.dataLoading = false
  })
}

function loadClientWidgets (filtering) {
  if ( this.clientIsLoggedIn ) {
    return this.$store.dispatch({
      type: 'loadClientWidgets',
      widgetsUrl:    this.clientWidgetsUrl,
      pluginVersion: this.pluginVersion,
      accessToken:   this.accessKey,
      filtering,
    })
  } else {
    return RSVP.resolve()
  }
}

function loadTemplateWidgets (filtering) {
  return this.$store.dispatch({
    type: 'loadTemplateWidgets',
    widgetsUrl:    this.sharedWidgetsUrl,
    pluginVersion: this.pluginVersion,
    filtering,
  })
}
