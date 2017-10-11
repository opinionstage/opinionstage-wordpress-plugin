import Vue from 'vue'
import store from '../store.js'
import RSVP from 'rsvp'

import _ from 'lodash'
import JsonApi from '../../lib/jsonapi.js'

export default Vue.component('popup-content', {
  template: '#opinionstage-popup-content',

  props: [
    'modalIsOpened',
    'showClientContent',
    'clientIsLoggedIn',
    'clientWidgetsUrl',
    'clientWidgetsHasNewUrl',
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
      needReload: false,
      liveReloadActivated: false,
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

    liveReload () {
      if (this.liveReloadActivated) {
        setTimeout(() => {
          this.CheckReload({
            widgetType: this.searchCriteria.type,
            page: this.searchCriteria.page
          })
          this.liveReload(this)
        }, 3000)
      }
    },

    CheckReload ({ widgetType, page }) {
      if (typeof this.widgets[0] !== 'undefined') {
        pullWidgetsNeedLiveReload.call(this, widgetType, this.widgets[0].updatedAt).then( () => {
          if ( this.needReload ) {
            this.$store.commit('clearWidgets')
            this.reloadData({
              widgetType: widgetType
            })
          }
        })
      }
    },
  },

  watch: {
    modalIsOpened: function(newState){
      this.liveReloadActivated = newState && this.showClientContent
      this.liveReload()
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
  if ( !this.liveReloadActivated ) {
    this.liveReloadActivated = true
    this.liveReload()
  }

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
  this.liveReloadActivated = false

  return this.$store.dispatch({
    type: 'loadTemplateWidgets',
    widgetsUrl:    this.sharedWidgetsUrl,
    pluginVersion: this.pluginVersion,
    filtering,
  })
}

function withParams(url, type, time) {
  const urlParams = []
  if ( type ) {
    urlParams.push( `type=${type}` )
  }

  if ( time ) {
    urlParams.push( `updated_at=${time}` )
  }

  if ( _.isEmpty(urlParams) ) {
    return url
  } else {
    return url + '?' + _.join( urlParams, '&')
  }
}

function pullWidgetsNeedLiveReload(type, updatedAt){
  const url = withParams(this.clientWidgetsHasNewUrl, type, updatedAt)

  return JsonApi.get(url, this.pluginVersion, this.accessKey)
        .then( (needReloadResponse) => {
          if (needReloadResponse) {
            this.needReload = true
          } else {
            this.needReload = false
          }

        })
        .catch( (error) => {
          console.error( "[social-polls-by-opinionstage][content-popup] can't load widgets:", error.statusText )
        })
}
