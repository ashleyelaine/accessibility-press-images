<?php
namespace accessibility_press_images;
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Class Deactivator Provides the method to deactivate the plugin
 */
class Deactivator {

	/**
	 * Clears any wp-cron jobs scheduled, and flushes the cache.
	 */
	public static function DEACTIVATE() {
		flush_rewrite_rules();
	}
}
