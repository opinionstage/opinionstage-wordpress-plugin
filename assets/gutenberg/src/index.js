import {registerBlockType} from '@wordpress/blocks'
import {__} from '@wordpress/i18n'

import Edit from './edit'
import save from './save'
import {attributes, category, supports, supportsLegacyWidgets} from './configuration'

registerBlockType('opinion-stage/block-os-poll', {
  title: 'Quiz, Poll & Survey by Opinion Stage',
  icon: 'chart-bar',
  description: __('Embed an Opinion Stage Poll', 'social-polls-by-opinionstage'),
  category,
  keywords: [
    __('poll', 'social-polls-by-opinionstage'),
    __('social poll', 'social-polls-by-opinionstage'),
  ],

  supports,
  attributes,

  edit: Edit,
  save,
})

registerBlockType('opinion-stage/block-os-survey', {
  title: 'Survey (legacy) - Use Quiz, Poll & Survey block',
  icon: 'list-view',
  description: __('Embed an Opinion Stage Survey', 'social-polls-by-opinionstage'),
  category,
  keywords: [
    __('survey', 'social-polls-by-opinionstage'),
    __('form', 'social-polls-by-opinionstage'),
  ],

  supports: supportsLegacyWidgets,
  attributes,

  edit: Edit,
  save,
})

registerBlockType('opinion-stage/block-os-trivia', {
  title: 'Knowledge Quiz (legacy) - Use Quiz, Poll & Survey block',
  icon: 'yes',
  description: __('Embed an Opinion Stage Knowledge Quiz', 'social-polls-by-opinionstage'),
  category,
  keywords: [
    __('quiz', 'social-polls-by-opinionstage'),
    __('trivia', 'social-polls-by-opinionstage'),
  ],

  supports: supportsLegacyWidgets,
  attributes,

  edit: Edit,
  save,
})

registerBlockType('opinion-stage/block-os-personality', {
  title: 'Personality Quiz (legacy) - Use Quiz, Poll & Survey block',
  icon: 'smiley',
  description: __('Embed an Opinion Stage Personality Quiz', 'social-polls-by-opinionstage'),
  category,
  keywords: [
    __('personality', 'social-polls-by-opinionstage'),
    __('quiz', 'social-polls-by-opinionstage'),
    __('outcome', 'social-polls-by-opinionstage'),
  ],

  supports: supportsLegacyWidgets,
  attributes,

  edit: Edit,
  save,
})
