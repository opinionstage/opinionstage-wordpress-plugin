import { registerBlockType } from '@wordpress/blocks'
import { __ } from '@wordpress/i18n'

import Edit from './edit'
import save from './save'
import { attributes, category, supports } from './configuration'

registerBlockType('opinion-stage/block-os-poll', {
  title: __( 'Poll', 'social-polls-by-opinionstage' ),
  icon: 'chart-bar',
  description: __('Embed an Opinion Stage poll', 'social-polls-by-opinionstage'),
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

registerBlockType('opinion-stage/survey', {
  title: __( '!Survey', 'survey' ),
  icon: 'smiley',
  description: __(
    'monkey ololo',
    'survey-description'
  ),
  category,

  supports,
  attributes,

  edit: Edit,
  save,
})

registerBlockType('opinion-stage/block-os-trivia', {
  title: __( '!Trivia Quiz' ),
  icon: 'yes',
  description: __(
    'this is poll',
    'poll-description'
  ),
  category,

  supports,
  attributes,

  edit: Edit,
  save,
})

registerBlockType('opinion-stage/block-os-personality', {
  title: __( '!Personality Quiz' ),
  icon: 'smiley',
  description: __(
    'this is poll',
    'poll-description'
  ),
  category,

  supports,
  attributes,

  edit: Edit,
  save,
})

registerBlockType('opinion-stage/form', {
  title: __( '!Form' ),
  icon: 'editor-justify',
  description: __(
    'this is poll',
    'poll-description'
  ),
  category,

  supports,
  attributes,

  edit: Edit,
  save,
})

registerBlockType('opinion-stage/slideshow', {
  title: __( 'Slideshow' ),
  icon: 'playlist-video',
  description: __(
    'this is poll',
    'poll-description'
  ),
  category,

  supports,
  attributes,

  edit: Edit,
  save,
})
