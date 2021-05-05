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

/**
 * Baners
 */
require 'inc/baners.php';

/**
 * Top Baners
 */
require 'inc/top-baners.php';

/**
 * Content top section
 */
function front_page_content_top_section() {
?>
<section id="colormag_featured_posts_widget-2" class="widget widget_featured_posts widget_featured_meta clearfix">
		<h3 class="widget-title"><span>ИНФОРМАЦИЯ</span></h3>
		
		<div class="first-post">
			<div class="single-article clearfix">

<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
$args_info = array(   
    'post_type'    => 'top_section_info',    
	'posts_per_page' => 1,   
	'paged' => $paged,
);
$query_info = new WP_Query( $args_info ); 
if( $query_info->have_posts() ){
	while( $query_info->have_posts() ){
		$query_info->the_post();
?>


				<figure>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<img width="390" height="205" 
							 src="http://school2school2.local/wp-content/uploads/2021/04/fireman-390x205.jpg" 
					 	 	 class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image" 
					 	     alt="<?php the_title(); ?>" loading="lazy" title="<?php the_title(); ?>">
					</a>
				</figure>
				<div class="article-content">
					
					<h3 class="entry-title" id="school-entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
						</a>
					</h3>
					<div class="school2-below-entry-meta">
						<span class="posted-on">
							
								 <p class="scool2-date">
									<i class="fa fa-calendar-o"></i> 
								 	<?php the_date(); ?>
								 </p>
					
						</span>				
					</div>

					<div class="entry-content">
						<p>

						<?php     
        					$content_info = get_the_content();
        					$trimmed_content_info = wp_trim_words( $content_info, 25, '<a href="'. get_permalink() .'"> ...Читать далее</a>' );
        					echo $trimmed_content_info;
    					?>
						</p>
					</div>
				</div>



				<?php
	}
	wp_reset_postdata(); 	
} 
?>

			</div>
		</div>

			
		<div class="following-post">
			<?php
			if ( is_active_sidebar( 'top-section-baners' ) ) {
						dynamic_sidebar( 'top-section-baners' );						
					}
			?>
		</div>	
</section>
<?php
}
add_action('school2_front_page_content_top_section','front_page_content_top_section',10); 


/**	
 * Банеры в top секции
 */

function school2_register_top_section_widgets(){
	register_sidebar( array(
		'name' => 'Top section baners',
		'id' => 'top-section-baners',
		'description' => 'Банеры для Top Section',		
	) );
}
add_action( 'widgets_init', 'school2_register_top_section_widgets' );

/**
 * Информация для Top Section
 */


add_action('init', 'school2_top_section_info');
function school2_top_section_info(){
	$labels = array(
		'name'               => 'Информация', 
		'singular_name'      => 'Информация', 
		'add_new'            => 'Добавить новую',
		'add_new_item'       => 'Добавить новую информацию',
		'edit_item'          => 'Редактировать информацию',
		'new_item'           => 'Новая информация',
		'view_item'          => 'Посмотреть информацию',
		'search_items'       => 'Найти информацию',
		'not_found'          => 'Информации не найдено',
		'not_found_in_trash' => 'В корзине информации не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Информация'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, // 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-document', 
		'menu_position' => 20, 
		'supports' => array( 'title', 'editor', 'thumbnail')
	);	
	register_post_type('top_section_info', $args  );
}

/**
 * Блок Документация
 */

function school2_front_page_content_documentation() {
?>
<section id="colormag_featured_posts_widget-2" class="widget widget_featured_posts widget_featured_meta clearfix">
		<h3 class="widget-title"><span>ДОКУМЕНТАЦИЯ</span></h3>
		<div class="first-post">
			<div class="single-article clearfix school2-single-article">
				<?php dynamic_sidebar( 'documentation-left' ); ?>
			</div>
		</div>	
		<div class="following-post">
			<div class="single-article clearfix school2-single-article">
				<?php dynamic_sidebar( 'documentation-right' ); ?>
			</div>
		</div>	
</section>
<?php
}
add_action('school2_front_page_content_documentation','school2_front_page_content_documentation',10); 

/**
 * Регистрация меню для раздела документации
 */

add_action( 'after_setup_theme', 'school2_register_nav_menu' );
function school2_register_nav_menu() {
	register_nav_menu( 'document_menu_left', 'Document Menu Left' );
	register_nav_menu( 'document_menu_right', 'Document Menu Right' );

}

/**	
 * Для раздела документации, для меню (левого и правого)
 */

function school2_register_documentation_left_widgets(){
	register_sidebar( array(
		'name' => 'Documentation Left',
		'id' => 'documentation-left',
		'before_widget' => '',
		'after_widget' => '',
		'description' => 'Банеры для Документация (левое)',		
	) );
}
add_action( 'widgets_init', 'school2_register_documentation_left_widgets' );

function school2_register_documentation_right_widgets(){
	register_sidebar( array(
		'name' => 'Documentation Right',
		'id' => 'documentation-right',
		'before_widget' => '',
		'after_widget' => '',
		'description' => 'Банеры для Документация (левое)',		
	) );
}
add_action( 'widgets_init', 'school2_register_documentation_right_widgets' );
/**
 * Main Slider
 */

function front_page_main_slider() {
	?>
<div class="article-container">
<h3 class="widget-title"><span>ФОТОАЛЬБОМ</span></h3>
	<?php echo do_shortcode('[metaslider id="50"]'); ?>
</div>
	<?php
	}
	add_action('school2_front_page_main_slider','front_page_main_slider',10); 
?>
