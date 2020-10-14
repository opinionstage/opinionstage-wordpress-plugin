import Vue from 'vue'
import debounce from 'lodash.debounce'

const selectedWidgetTitles = {
  'all': 'All ITEMS',
  'poll': 'poll',
  'set': 'multi poll set',
  'survey': 'survey',
  'slideshow': 'slideshow',
  'trivia': 'trivia quiz',
  'outcome': 'personality quiz',
  'list': 'list',
  'form': 'form',
  'story': 'story article',
}

export default Vue.component('widget-list', {
  props: [
    'widgets',
    'dataLoading',
    'noMoreData',
    'showSearch',
  ],

  template: '#opinionstage-widget-list',

  data () {
    return {
      selectedWidgetType: 'all',
      widgetTitleSearch: '',
      showMoreBtn: true,
      hasData: true,
    }
  },

  computed: {
    selectedWidgetTitle () {
      return selectedWidgetTitles[this.selectedWidgetType]
    },
  },

  watch: {
    widgetTitleSearch: debounce(function () {
      widgetsSearchUpdate.call(this)
    }, 500),

    widgets () {
      this.hasData = this.dataLoading || this.widgets.length > 0
    },
  },

  methods: {
    select (widget) {
      this.$emit('widget-selected', widget)
    },

    selectWidgetType (type) {
      this.selectedWidgetType = type
      this.widgetTitleSearch = ''

      widgetsSearchUpdate.call(this)
    },

    showMore () {
      this.$emit('load-more-widgets')
    },
  },
})

function widgetsSearchUpdate () {
  this.$emit('widgets-search-update', {
    widgetType: this.selectedWidgetType,
    widgetTitle: this.widgetTitleSearch
  })
}
