<?php
/**
 * Дочерняя тема для темы hamroclass 
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helper
 */
function show($param){
	echo "<pre>";
	print_r($param);
	echo "</per>";
}

/**
 * Подключение OptionTree
 */

 //add_filter( 'ot_theme_mode', '__return_true' );
 //add_filter( 'ot_show_pages', '__return_true' );

 //require 'option-tree/ot-loader.php';
 //require 'inc/meta-boxes.php';
 //require 'inc/theme-options.php';
/**
 * Extension scipts and styles
 */ 
function school2school2_scripts_style() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'school2school2-style', get_stylesheet_directory_uri() .'/assets/css/school2school2.css' );
	wp_enqueue_script( 'school2school2-script', get_stylesheet_directory_uri() . '/assets/js/school2school2.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'school2school2_scripts_style' );



?>
