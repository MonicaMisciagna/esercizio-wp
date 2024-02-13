<?php

/*
Plugin Name: Cute Animals
Plugin URI: 
Version: 1.00
Description: Display cute animated animals on your website!
Author: Manu225
Author URI: https://www.info-d-74.com/
Network: false
Text Domain: cute-animals
Domain Path: 
*/

global $WPA_SPRITES;
$WPA_SPRITES = array(
	array('sprite' => plugins_url('sprites/rabbit.png', __FILE__), 'width' => 32, 'height' => 32),
	array('sprite' => plugins_url( 'sprites/frog.png',  __FILE__), 'width' => 32, 'height' => 32),
	array('sprite' => plugins_url( 'sprites/bird.png',  __FILE__), 'width' => 32, 'height' => 32),
	array('sprite' => plugins_url( 'sprites/spider.png',  __FILE__), 'width' => 32, 'height' => 32),
	array('sprite' => plugins_url( 'sprites/cat.png',  __FILE__), 'width' => 32, 'height' => 32),
	array('sprite' => plugins_url( 'sprites/dog.png',  __FILE__), 'width' => 32, 'height' => 32)
);

register_activation_hook( __FILE__, 'cute_animals_install' );
register_uninstall_hook(__FILE__, 'cute_animals_desinstall');

function cute_animals_install() {

	global $wpdb;

	$cute_animals_table = $wpdb->prefix . "cute_animals";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	$sql = "
        CREATE TABLE `".$cute_animals_table."` (
          id int(11) NOT NULL AUTO_INCREMENT,          
          sprite varchar(250) NOT NULL,
          direction int(1) NOT NULL,
          position int(11) NOT NULL,
          speed int(1) NOT NULL,
          PRIMARY KEY  (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
    ";

    dbDelta($sql);
}

function cute_animals_desinstall() {

	global $wpdb;

	$cute_animals_table = $wpdb->prefix . "cute_animals";

	//suppression des tables
	$sql = "DROP TABLE ".$cute_animals_table.";";
	$wpdb->query($sql);

}

add_action( 'admin_menu', 'register_cute_animals_menu' );
function register_cute_animals_menu() {
	add_submenu_page( 'options-general.php', 'Cute Animals settings', 'Cute Animals settings', 'manage_options', 'cute_animals_settings', 'cute_animals_settings');
}

function cute_animals_settings() {

	if (is_admin()) {

		global $wpdb;
		$cute_animals_table = $wpdb->prefix . "cute_animals";

		//formulaire soumis ?
		if(sizeof($_POST))
		{		
			check_admin_referer( 'wpa_settings' );

			$query = "DELETE FROM ".$cute_animals_table;
			$wpdb->query($query);

			$query = $wpdb->prepare( "INSERT INTO ".$cute_animals_table." (`sprite`, `direction`, `position`, `speed`)
			VALUES (%s, %d, %d, %d)", sanitize_text_field(stripslashes_deep($_POST['sprite'])), intval($_POST['direction']), intval($_POST['position']), intval($_POST['speed']));
			$wpdb->query($query);

		}

		$query = "SELECT * FROM ".$cute_animals_table;
		$current_animal = $wpdb->get_row($query);

		include(plugin_dir_path( __FILE__ ) . 'views/settings.php');
	}
}

add_action('admin_print_styles', 'cute_animals_css' );
function cute_animals_css() {
    wp_enqueue_style( 'WP-Animal-CSS', plugins_url('css/admin.css', __FILE__) );
}

add_action( 'wp_head', 'head_cute_animals' );
function head_cute_animals()
{
	global $wpdb;
	$cute_animals_table = $wpdb->prefix . "cute_animals";

	$query = "SELECT * FROM ".$cute_animals_table;
	$animals = $wpdb->get_results($query);

	if(@sizeof($animals) > 0)
	{
		$parameters = array();
		foreach($animals as $animal)
		{
			$parameters[] = $animal;
		}

		//print_r($parameters);

		wp_enqueue_style( 'cute_animals_css', plugins_url('css/front.css', __FILE__) );
		wp_enqueue_script( 'jquery' );

		// Register the script
		wp_register_script( 'cute_animals_front', plugins_url( 'js/front.js', __FILE__ ) );
		wp_enqueue_script( 'cute_animals_front' );
		wp_localize_script( 'cute_animals_front', 'parameters', $parameters );

		
	}
}

?>