<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

add_action( 'media_buttons', 'opinionstage_content_popup_add_editor_button');
add_action( 'admin_enqueue_scripts', 'opinionstage_content_popup_js');
add_action( 'admin_footer', 'opinionstage_content_popup_html' );
add_action( 'admin_footer-post-new.php', 'opinionstage_content_popup_css_dropdown' );
add_action( 'admin_footer-post.php',     'opinionstage_content_popup_css_dropdown' );

function opinionstage_content_popup_add_editor_button() {
	require( plugin_dir_path( __FILE__ ).'content-popup-button.php' );
}

function opinionstage_content_popup_js() {

	// asset loader hotfix TODO: improve this loader machanism 
		opinionstage_register_javascript_asset(
			'content-popup',
			'content-popup.js',
			array('jquery')
		);

		opinionstage_enqueue_js_asset('content-popup');	
}

function opinionstage_content_popup_html() {
	require( plugin_dir_path( __FILE__ ).'content-popup-template.html.php' );
}

function opinionstage_content_popup_css_dropdown(){ ?>
	<style type="text/css">
		.dropbtn {
    font-size: 16px;
    border: 1px solid #e4e4e4;
    background-color: #3499c2;
    border-radius: 5px 0 0 5px;
    cursor: pointer;
    display: inline-block;
    font: 16px/42px Open Sans,Helvetica,sans-serif;
    text-align: center;
    text-decoration: none;
    width: 140px;
    position: relative;
    outline: none!important;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 9;
  top: 39px;
  left: 1px;
}

.dropdown-content div {
    display: block;
    color: #3aaebd;
    border: 1px solid #3aaebd;
    padding: 5px 60px 5px 10px;
    background-color: #fff;
    text-decoration: none;
    border-top: 0px !important;
}
.dropdown-content div:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block !important;
}

.dropdown:hover .dropbtn {
  background-color: #3499c1;
}
.opinionstage-content-popup-contents .filter__itm{
  width: 100%;
  line-height : 25px !important;
}
button#dropbtn span {
    text-transform: uppercase;
    color: #fff;
}
.filter {
     margin: 0 !important; 
}
button#dropbtn:before {
    content: "\E921";
    display: block;
    position: absolute;
    top: 0;
    font-size: 7px;
    font-family: os-icon-plugin-font!important;
    right: -25px;
    z-index: 3;
    color: #fff;
}
button#dropbtn:after {
    content: "";
    position: absolute;
    top: 0;
    width: 40px;
    right: -42px;
    height: 100%;
    background-color: #3499c2;
    border-radius: 0 5px 5px 0;
  }

	</style>
<?php }
?>