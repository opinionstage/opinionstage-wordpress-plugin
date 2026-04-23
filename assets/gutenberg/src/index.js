import {registerBlockType} from '@wordpress/blocks'
import {__} from '@wordpress/i18n'

import Edit from './edit'
import save from './save'
import {attributes, category, supports, supportsLegacyWidgets} from './configuration'

registerBlockType('opinion-stage/block-os-poll', {
  title: 'Quiz, Poll & Survey by Opinion Stage',
  icon: <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M29.5783 16.1094C29.9744 14.9839 30.1906 13.7682 30.1906 12.5C30.1906 6.70101 25.6708 2 20.0953 2C14.5198 2 10 6.70101 10 12.5C10 18.299 14.5198 23 20.0953 23C22.4214 23 24.5638 22.1817 26.2709 20.8068L30.1027 22.1145C31.3736 22.5483 32.4783 21.1049 31.7869 19.914L29.5783 16.1094Z" fill="#5CC9FA"></path>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.75161 11C3.25599 11 2.04355 12.3125 2.04355 13.9316V24.4673L0.200043 27.7726C-0.449043 28.9364 0.588119 30.3468 1.78133 29.923L7.59852 27.8567H18.2919C19.7876 27.8567 21 26.5441 21 24.9251V13.9316C21 12.3125 19.7876 11 18.2919 11H4.75161Z" fill="#8C1AF5"></path>
  </svg>,
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
