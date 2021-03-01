jQuery(document).ready(function ($) {
	var toggleSettingsAjax = function (currObject, action) {
		$.post(ajaxurl, {action: action, activate: currObject.is(':checked')}, function (response) {
		});
	};

	$('#fly-out-switch').change(function () {
		toggleSettingsAjax($(this), "opinionstage_ajax_toggle_flyout");
	});

	$('#article-placement-switch').change(function () {
		toggleSettingsAjax($(this), "opinionstage_ajax_toggle_article_placement");
	});

	$('#sidebar-placement-switch').change(function () {
		toggleSettingsAjax($(this), "opinionstage_ajax_toggle_sidebar_placement");
	});


	$.ajax({
		url: OPINIONSTAGE.WidgetApiUrl,
		headers: {
			'Accept': 'application/vnd.api+json',
			'Content-Type': 'application/vnd.api+json',
			'OSWP-Plugin-Version': OPINIONSTAGE.OswpPluginVersion,
			'OSWP-Client-Token': OPINIONSTAGE.OswpClientToken
		},
		method: 'GET',
		dataType: 'json',
		success: function (data) {
			dropdownOptions = data;
			if (dropdownOptions.data.length == 0) {
				var adminUrlCreateLink = OPINIONSTAGE.adminUrlCreateLink;
				var viewtext = '<tbody><tr><td><p><span class="opinionstage-no-items">No items yet..., </span><a href="' + adminUrlCreateLink + '" class="opinionstage-add-our-first-item">Add your first item</a></p></td></tr></tbody>';
				$('.result_progress').css('display', 'none');
				$(viewtext).appendTo('#container table#check');
			} else {
				for (var i = 0; i < dropdownOptions.data.length; i++) {
					var previewBlockOsTitle = dropdownOptions.data[i].attributes['title'];
					var previewBlockOsType = dropdownOptions.data[i].attributes['type'];
					var previewBlockOsDate = dropdownOptions.data[i].attributes['updated-at'];
					previewBlockOsDate = new Date(previewBlockOsDate);
					previewBlockOsDate = previewBlockOsDate.toDateString();
					var resDateOs = previewBlockOsDate.split(" ");
					previewBlockOsDate = resDateOs[2] + ' ' + resDateOs[1] + ' ' + resDateOs[3];
					var previewBlockOsImageUrl = dropdownOptions.data[i].attributes['image-url'];
					var previewBlockOsView = dropdownOptions.data[i].attributes['landing-page-url'];
					var previewBlockOsEdit = dropdownOptions.data[i].attributes['edit-url'];
					var previewBlockOsStatistics = dropdownOptions.data[i].attributes['stats-url'];
					var viewtext = '<tbody id="count"><tr class="settingBorderOs"><td class="image"><a href="' + previewBlockOsView + '" target="_blank"><div class="content-item-image quiz"><img height="90" src="' + previewBlockOsImageUrl + '" width="120"><div class="content-item-label">' + previewBlockOsType + '</div></div></a></td><td class="long"><div style="position: relative;height: 85px;"><a href="' + previewBlockOsEdit + '" class="opinionstage-item-title" target="_blank">' + previewBlockOsTitle + '</a><table><tbody><tr><td><span class="os-icon-plugin icon-os-common-date"></span><div class="label">' + previewBlockOsDate + '</div></td></tr></tbody></table></div></td><td class="action"><div class="opinionstage-item-action-container"><a href="' + previewBlockOsView + '" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> View </a><a href="' + previewBlockOsEdit + '" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Edit </a><a href="' + previewBlockOsStatistics + '" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Results </div></a></td></tr></tbody>';
					$('.result_progress').css('display', 'none');
					$(viewtext).appendTo('#container table#check');
				}
			}
		},
		complete: function () {
			size_li = $("table#check tbody#count").size();
			dropdownDataLength = dropdownOptions.data.length;

			loadMore(size_li, dropdownDataLength, "all");
			var data = {
				'action': 'opinionstage_ajax_item_count',
				'oswp_item_count': dropdownOptions.data.length
			};
			// todo - move it to main ajax call
			jQuery.post(ajaxurl, data);

			jQuery('#itemList').on('change', function () {
				var selectedValue = this.value;
				var contentLabel = jQuery(".content-item-label");
				var item_count = 0;

				jQuery('.no_item').css('display', 'none');
				contentLabel.each(function () {
					getContainer = jQuery(this).parent().parent().parent().parent();
					if (selectedValue != 'all' && selectedValue != jQuery(this).text().toLowerCase()) {
						getContainer.parent().css('display', 'none');
						getContainer.parent().removeClass('countItem');
					} else {
						jQuery("#searchItem").val('');
						getContainer.parent().css('display', 'table-row-group');
						getContainer.parent().addClass('countItem');
						item_count = item_count + 1;
					}
				});

				if (item_count == 0) {
					jQuery('.no_item').css('display', 'block');
				}

				size = $("table#check tbody.countItem").size();
				$("#opinionstage-load-more").fadeOut(500);
				loadMore(size, item_count, "filter");
			});

			$("#searchItem").on("keyup", function search(e) {
				if (e.keyCode == 13) {
					var searchItem = $(this).val();
					var listTitle = jQuery('td.long a');
					var dropdownValue = jQuery('#itemList').val();
					var contentList = jQuery(".content-item-label");

					listTitle.each(function () {
						var title = jQuery(this).text().toLowerCase();
						outerContainer = jQuery(this).parent().parent().parent().parent();

						if (dropdownValue == 'all') {
							if (!title.includes(searchItem)) {
								outerContainer.css('display', 'none');
							} else {
								outerContainer.css('display', 'table-row-group');
							}
						} else {
							contentList.each(function () {
								if (dropdownValue == jQuery(this).text().toLowerCase()) {
									if (outerContainer.hasClass('countItem')) {
										if (!title.includes(searchItem)) {
											outerContainer.css('display', 'none');
										} else {
											outerContainer.css('display', 'table-row-group');
										}
									}
								}
							});
						}
					});
				}
			});
		},
		error: function () {
			console.log(data.statusText);
		}
	});


	function loadMore(size, dataLength, item) {

		if (dataLength == size && dataLength > 10) {
			setTimeout(function () {

				x = (x - 0 < 0) ? 10 : x - 0;
				if (item == 'all') {
					$('table#check tbody#count').not(':lt(' + x + ')').hide();
				} else {
					$('table#check tbody#countItem').not(':lt(' + x + ')').hide();
				}
			}, 500);
		}
		// Show the div in 5s
		var countItemOS = 10;
		if (dataLength > countItemOS) {
			$("#opinionstage-load-more").delay(2000).fadeIn(500);
		}

		x = 10;
		$('table#check ttbody#count:lt(' + x + ')').show();
		$('#opinionstage-load-more').click(function () {
			x = (x + 10 <= size) ? x + 10 : size;

			if (item == 'all') {
				$('table#check tbody#count:lt(' + x + ')').show(500);
			} else {
				$('table#check tbody#countItem:lt(' + x + ')').show(500);
			}

			if (size == x) {
				$("#opinionstage-load-more").hide(500);
			}
		});
	}

	if ($('.opinionstage-show-anchor-list').length > 0) {

		$('.opinionstage-show-anchor-list').click(function (e){
		    e.preventDefault();
			$('.opinionstage-anchors-list').toggleClass('opened');
		})

		$(document).click(function (e) {
			if ( ! $(e.target).is('.opinionstage-show-anchor-list') && $('.opinionstage-anchors-list').hasClass('opened') ) {
				$('.opinionstage-anchors-list').removeClass('opened');
			}
		})
	}
});
