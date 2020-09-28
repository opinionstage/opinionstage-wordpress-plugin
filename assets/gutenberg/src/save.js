import { __ } from '@wordpress/i18n'

export default function save({ attributes }) {
  const {
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
    <div class="os-poll-wrapper"
      data-type="poll"
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
