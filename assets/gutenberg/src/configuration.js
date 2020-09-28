export const attributes = {
  embedUrl: {
    source:    'attribute',
    attribute: 'data-test-url',
    selector:  'div[data-test-url]',
  },

  lockEmbed: {
    source:    'attribute',
    attribute: 'data-lock-embed',
    selector:  'div[data-lock-embed]',
  },

  buttonText: {
    source:    'attribute',
    attribute: 'data-button-text',
    selector:  'div[data-button-text]',
  },

  insertItemImage: {
    source:    'attribute',
    attribute: 'data-image-url',
    selector:  'div[data-image-url]',
  },

  insertItemOsTitle: {
    source:    'attribute',
    attribute: 'data-title-url',
    selector:  'div[data-title-url]',
  },

  insertItemOsView: {
    source:    'attribute',
    attribute: 'data-view-url',
    selector:  'div[data-view-url]',
  },

  insertItemOsEdit: {
    source:    'attribute',
    attribute: 'data-edit-url',
    selector:  'div[data-edit-url]',
  },

  insertItemOsStatistics: {
    source:    'attribute',
    attribute: 'data-statistics-url',
    selector:  'div[data-statistics-url]',
  },
}

export const category = 'opinion-stage'

export const supports = {
  // Removes support for an HTML mode.
  html: false,
}
