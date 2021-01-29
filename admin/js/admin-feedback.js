(function ($) {
	var OpinionStageDialogApp = {
		cacheElements: function cacheElements() {
			this.cache = {
				$deactivateLink: $('#the-list').find('[data-slug="social-polls-by-opinionstage"] span.deactivate a'),
				$modal: $('#opinionistage-deactivate-feedback-modal'),
				$skipButton: $('#opinionstage-dialog-skip'),
				$submitButton: $('#opinionstage-dialog-submit'),
				$dialogForm: $('#opinionstage-deactivate-feedback-dialog-form')
			}
		},
		deactivate: function deactivate(e) {
			location.href = this.cache.$deactivateLink.attr('href');
		},
		bindEvents: function bindEvents() {
			var self = this;
			self.cache.$deactivateLink.on('click', function (e) {
				e.preventDefault();
				self.cache.$modal.fadeIn();
			});

			self.cache.$modal.on('click', function (e) {
				if ($(e.target).is(self.cache.$modal)) {
					self.cache.$modal.fadeOut();
				}
			});
			self.cache.$skipButton.on('click', function (e) {
				self.deactivate();
			})
			self.cache.$submitButton.on('click', function (e) {
				e.preventDefault();
				self.sendFeedback();
			})
		},
		sendFeedback: function sendFeedback(){
			var self = this,
				formData = self.cache.$dialogForm.serialize();
			$.post(ajaxurl, formData); //, this.deactivate.bind(this)
		},
		init: function init() {
			this.cacheElements();
			this.bindEvents();
		}
	}

	$(function () {
		OpinionStageDialogApp.init();
	});

}(jQuery));
