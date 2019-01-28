<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

function opinionstage_common_load_resources(){
	
	// Register common assets for admin pages
	opinionstage_register_css_asset( 'menu-page', 'menu-page.css' );
	opinionstage_register_css_asset( 'icon-font', 'icon-font.css' );
	opinionstage_register_javascript_asset( 'menu-page', 'menu-page.js', array('jquery') );

	// Load common assets
	opinionstage_enqueue_css_asset('menu-page');
	opinionstage_enqueue_css_asset('icon-font');
	opinionstage_enqueue_js_asset('menu-page'); ?>
	<style type="text/css">
	.content__list {
	    height: calc(92vh - 190px) !important;
	}
	</style>

<?php }

function opinionstage_common_load_header(){
	if(get_option('oswp_tracking_user_site_data') == 'yes'){ ?>
		<!-- Hotjar Tracking Code for https://wordpress.org/plugins/social-polls-by-opinionstage/ -->
		<script>
		    (function(h,o,t,j,a,r){
		        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		        h._hjSettings={hjid:1142399,hjsv:6};
		        a=o.getElementsByTagName('head')[0];
		        r=o.createElement('script');r.async=1;
		        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		        a.appendChild(r);
		    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
	<?php }
}
function opinionstage_common_load_footer(){ ?>
	<script>
		jQuery(document).ready(function ($) {					
			$('li a span#oswpLauncherContentPopup').live('click', function(e) {    
		        e.preventDefault();
		        $('div#view-items').trigger('click');
		    });
		    $('li a span#oswpLauncherContentPopupExamples').live('click', function(e) {
		     	e.preventDefault();   		        
				var a = $('li a span#oswpLauncherContentPopupExamples').attr('data-os-view');	
				if(a == 'examples'){
					setTimeout(function(){$('div#show-templates').trigger('click');},500); 
				}			 			
		    });
		});
	</script>
<?php }						
?>