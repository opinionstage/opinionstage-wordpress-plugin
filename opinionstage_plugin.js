(function(){
	jQuery(document).ready(function($) {
		var handleWatermark = function(input){
			if(input.val().trim() != "") {
				input.removeClass('os-watermark');						
			} else {
				input.val(input.data('watermark'));
				input.addClass('os-watermark');
			}
		};	

		$("#content_ospolls").click(function() {
			$("os_insert_poll").click();
			return false;
		});				
		$('.opinionstage-submit').click(function(){
			var ed;	  
			if (typeof(tinymce) != 'undefined' && tinymce.isIE && ( ed = tinymce.get(wpActiveEditor) ) && !ed.isHidden()) {
				ed.focus();
				ed.windowManager.insertimagebookmark = ed.selection.getBookmark();
			}
			l = window.dialogArguments || parent || opener || top;
			var $opinionstageStage = $("#opinionstage-type");
			var type = $opinionstageStage.val();
			$opinionstageStage.val("poll");
			var id = $('#opinionstage-' + type + '-id').val();
			$("#opinionstage-poll-id, #opinionstage-set-id").val("");
			var showType = type != "poll";
			if (typeof l != "undefined" && typeof l.send_to_editor === "function")
				l.send_to_editor("[socialpoll id=\"" + id + "\"" + (showType ? " type=\"" + type + "\"" : "") + "]");
			else
				send_to_editor("[socialpoll id=\"" + id + "\"" + (showType ? " type=\"" + type + "\"" : "") + "]");
			tb_remove();
			$("#opinionstage-type").trigger("change");
		});	
		$('input.watermark').focus(function(){
			var input = $(this);
			if (input.data('watermark') == input.val()) {
				input.val("");
				input.removeClass('os-watermark');
			}
		}).each(function(){
			handleWatermark($(this));
		}).blur(function(){
			handleWatermark($(this));
		});			
	});	
})();