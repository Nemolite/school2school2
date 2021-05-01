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

/**
 * Добавление ссылка на сайт разработчика vandraren.ru
 */
function colormag_footer_socket_right_section() {

	?>

		<div class="footer-socket-right-section">
		<?php
		$site_link = '<a href="' . esc_url( 'https://vandraren.ru/' ) . '" title="' . esc_attr( 'Разработка web-проектов' ) . '" ><span>' . esc_html__( 'VANDRAREN - Разработка web-проектов', 'colormag' ) . '</span></a>';

		$default_footer_value = sprintf(  esc_html__( 'Создание и техническая поддержка сайта:  %1$s', 'colormag' ), $site_link );

		$colormag_footer_copyright = '<div class="copyright">' . $default_footer_value . '</div>';

		echo $colormag_footer_copyright; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped

	?>
		</div>

		<?php

	}	

/**
 * Регистрация виджета для футера
 */
register_sidebar(
	array(
		'name'          => esc_html__( 'Footer Sidebar Tandex Map', 'colormag' ),
		'id'            => 'school2_footer_sidebar_map',
		'description'   => esc_html__( 'Shows widgets at footer sidebar yandex map.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	)
);

?>
