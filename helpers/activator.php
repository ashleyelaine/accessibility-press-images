<?php
namespace accessibility_press_images;
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Class Activator Provides the method to insert a table into mysql, and set up any other prerequisites
 */
class Activator {
	/**
	 * Sets up the database and any options
	 */
	public static function ACTIVATE() {
		global $wpdb;
		//COMMENTED THESE OUT BECAUSE THEY WERE CAUSING THIS ERROR: Warning: mysqli_query(): Empty query in ...../wp-includes/wp-db.php on line 1811
        //$createDbStr = ' ';
		//$wpdb->query($createDbStr);
	}
}
