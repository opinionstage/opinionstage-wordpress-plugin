// Saved markup produced by these blocks before they were migrated to Block API v3.
//
// WHY THIS FILE EXISTS
// Under `apiVersion: 1` WordPress applies the `blocks.getSaveContent.extraProps`
// filters to the root element of the save output and adds the generated
// `wp-block-opinion-stage-block-os-*` class name itself. From `apiVersion: 2`
// onwards that step is skipped and the block is expected to add those props via
// `useBlockProps.save()`. So bumping apiVersion changes the serialized HTML, and
// every already-published block would fail validation ("Attempt Block Recovery")
// without a deprecation that reproduces the old output.
//
// A deprecation entry is merged over the block type with `apiVersion` stripped
// out, so the `save` below is serialized with API v1 semantics again - which is
// exactly what is already stored in existing posts.
//
// NOTE: this is a frozen copy on purpose. Do not refactor it to share code with
// save.js: any change here changes the markup this deprecation matches against
// and breaks recovery of existing content. In particular `class` (not
// `className`) is kept as-is, see save.js.

import {
  attributes,
  WIDGET_POLL,
  WIDGET_PERSONALITY_QUIZ,
  WIDGET_TRIVIA_QUIZ,
  WIDGET_SURVEY,
} from './configuration.js'

function saveV1({attributes}) {
  const {
    widgetType,
    embedUrl,
    lockEmbed,
    buttonText,
    insertItemImage,
    insertItemOsTitle,
    insertItemOsView,
    insertItemOsEdit,
    insertItemOsStatistics,
  } = attributes

  return (
    <div class={unusedWrapperClassFromWidgetType(widgetType)}
         data-type={widgetType}
         data-image-url={insertItemImage}
         data-title-url={insertItemOsTitle}
         data-view-url={insertItemOsView}
         data-statistics-url={insertItemOsStatistics}
         data-edit-url={insertItemOsEdit}
         data-test-url={embedUrl}
         data-lock-embed={lockEmbed}
         data-button-text={buttonText}
    >
      [os-widget path="{embedUrl}"]
      <span></span>
    </div>
  )
}

function unusedWrapperClassFromWidgetType(widgetType) {
  // case when widget is not inserted yet:
  if (!widgetType) {
    return null
  }

  switch (widgetType) {
    case WIDGET_POLL:
      return 'os-poll-wrapper'
    case WIDGET_SURVEY:
      return 'os-survey-wrapper'
    case WIDGET_TRIVIA_QUIZ:
      return 'os-trivia-wrapper'
    case WIDGET_PERSONALITY_QUIZ:
      return 'os-personality-wrapper'
    default:
      return null
  }
}

// `attributes` must be repeated here: the merge strips them from the block type,
// and without them the old markup would be parsed into an empty attribute set.
export default [
  {
    attributes,
    save: saveV1,
  },
]
