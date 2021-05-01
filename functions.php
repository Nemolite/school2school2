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

/**
 * Переопределение функции вывода даты, автора и комментарий
 */

function colormag_entry_meta( $full_post_meta = true ) {

	if ( 'post' == get_post_type() ) :

		echo '<div class="below-entry-meta">';
		?>

		<?php
		// Displays the same published and updated date if the post is never updated.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		// Displays the different published and updated date if the post is updated.
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
		/* Translators: 1. Post link, 2. Post time, 3. Post date */
			__( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			$time_string
		); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
		?>

	

		<?php 

		if ( $full_post_meta ) {
			$tags_list = get_the_tag_list( '<span class="tag-links"><i class="fa fa-tags"></i>', __( ', ', 'colormag' ), '</span>' );

			if ( $tags_list ) {
				echo $tags_list; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
			}
		}

		if ( $full_post_meta ) {
			edit_post_link( __( 'Edit', 'colormag' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' );
		}

		echo '</div>';

	endif;

}

/**
 * Отключение комментарий к постам
 */
add_filter('comments_open', function($open, $post_id)
{
	return false;
}, 10, 2);

/**
 * Baner Руководитель
 */
require 'inc/chif-baner.php';

?>
