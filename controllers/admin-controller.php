<?php
namespace accessibility_press_images;
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
include_once("controllerAPImage.php");
/**
 * Class AdminController This is the workhorse controller for the Plugin. Most of the business gets dispatched from here.
 * AccessibilityPress : IMAGES
 */
class AdminController extends Controller {
	function addMenuItem() {
		if ( empty ( $GLOBALS['admin_page_hooks']['accessibility-press-info'] ) )
			$page_title   = 'AccessibilityPress';
	        $menu_title   = 'AccessibilityPress';
	        $capabilities = 'manage_options';
	        $menu_slug    = 'accessibility-press-info';
	        $function     = array( &$this, 'accessibilityPressInfo' );
            $icon_url     = plugins_url().'/accessibility-press-images/images/APmenuIcon.png';

			if ( empty ( $GLOBALS['admin_page_hooks']['accessibility-press-info'] ) ) {
	            add_menu_page($page_title, $menu_title, $capabilities, $menu_slug, $function, $icon_url );
	    		add_submenu_page('accessibility-press-info', 'General', 'General', $capabilities, 'accessibility-press-info', $function );
	        }

		//ADD IMAGES PAGE TO NAVIGATION
		$page_title   = 'Images';
        $menu_title   = 'Images';
        $capabilities = 'manage_options';
        $menu_slug    = 'accessibility-press-images';
        $function     = array( &$this, 'accessibilityPressImages' );

        add_submenu_page( 'accessibility-press-info', $page_title, $menu_title, $capabilities, $menu_slug, $function );

	}
	function accessibilityPressInfo() {
		echo fjorge_view_object('admin/accessibilityPressInfo.php');
	}

	function accessibilityPressImages() {
		echo fjorge_view_object('admin/accessibilityPressImages.php');
	}
}
