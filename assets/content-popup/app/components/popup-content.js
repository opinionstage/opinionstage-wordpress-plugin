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
      liveReloading: null,
    }
  },

  mounted () { 
    initializeLiveReload.call(this)
  },

  store,

  methods: {
    reloadData ({ widgetType, widgetTitle }) {
      this.searchCriteria = { page: 1, perPage: 6, type: widgetType, title: widgetTitle }
      this.$store.commit('clearWidgets')

      loadData.call(this, this.searchCriteria).then( () => {
        this.widgets = this.$store.state.widgets[0]
        this.noMoreData = !hasNextPage(this.$store.state.nextPageNumber)
      })
    },

    appendData () {
      this.searchCriteria.page += 1

      loadData.call(this, this.searchCriteria).then( () => {
        const newWidgets = this.$store.state.widgets[this.searchCriteria.page-1]
        this.noMoreData = !hasNextPage(this.$store.state.nextPageNumber)
        this.widgets = this.widgets.concat( newWidgets )
      })
    },

    insertShortcode (shortcode) {
      this.$emit('insert-shortcode', shortcode)
    },

    checkReload ({ widgetType }) {
      let updatedTime = null
      if (typeof this.widgets[0] !== 'undefined') {
        updatedTime = this.widgets[0].updatedAt
      }

      pullWidgetsNeedLiveReload.call(this, widgetType, updatedTime).then( () => {
        if ( this.needReload ) {
          this.reloadData({
            widgetType: widgetType
          })
        }
      })
    },
  },

  watch: {
    modalIsOpened: function(newState){
      if ( newState && this.showClientContent ) {
        initializeLiveReload.call(this)
      } else {
        stopLiveReload.call(this)
      }
    },

    showClientContent: function(newState){
      if ( newState && this.modalIsOpened ) {
        initializeLiveReload.call(this)
      } else {
        stopLiveReload.call(this)
      }
    },
  },

  computed: {
    noAnyWidgets () {
      return !this.dataLoading && this.searchCriteria.type === 'all' && this.widgets.length == 0
    }
  }
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
        .then( (payload) => {
          this.needReload = payload.data['has-new-widgets']
        })
        .catch( (error) => {
          console.error( "[social-polls-by-opinionstage][content-popup] can't load widgets:", error.statusText )
        })
}

function hasNextPage(nextPageNumber) {
  return nextPageNumber > 1
}

function initializeLiveReload() {
  this.liveReloadActivated = true
  this.liveReloading = setInterval(() => {
                         this.checkReload({
                           widgetType: this.searchCriteria.type,
                         })
                       }, 3000)
}

function stopLiveReload() {
  this.liveReloadActivated = false
  clearInterval(this.liveReloading)
}
