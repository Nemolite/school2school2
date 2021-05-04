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
 * Content top section
 */
function front_page_content_top_section() {
?>
<section id="colormag_featured_posts_widget-2" class="widget widget_featured_posts widget_featured_meta clearfix">
		<h3 class="widget-title"><span>ИНФОРМАЦИЯ</span></h3>
		
		<div class="first-post">
			<div class="single-article clearfix">
				<figure>
					<a href="http://school2school2.local/destruction-in-montania/" title="Destruction in Montania">
						<img width="390" height="205" 
							 src="http://school2school2.local/wp-content/uploads/2021/04/fireman-390x205.jpg" 
					 	 	 class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image" 
					 	     alt="Destruction in Montania" loading="lazy" title="Destruction in Montania">
					</a>
				</figure>
				<div class="article-content">
					
					<h3 class="entry-title">
						<a href="http://school2school2.local/destruction-in-montania/" title="Destruction in Montania">
							Destruction in Montania
						</a>
					</h3>
					<div class="below-entry-meta">
						<span class="posted-on">
							<a href="http://school2school2.local/destruction-in-montania/" title="6:39 am" rel="bookmark">
					 			<i class="fa fa-calendar-o"></i> 
									<time class="entry-date published updated" 
						    			datetime="2021-04-29T06:39:04+00:00">
										April 29, 2021
									</time>
							</a>
						</span>				
					</div>

					<div class="entry-content">
						<p>Nunc consectetur ipsum nisi, ut pellentesque felis tempus vitae. 
							Integer eget lacinia nunc. Vestibulum consectetur convallis 
							augue id egestas. Nullam Lorem ipsum, 
							dolor sit amet consectetur adipisicing elit. 
						</p>
					</div>
				</div>

			</div>
		</div>



			
		<div class="following-post school2-baner-border">
		
			<div class="single-article clearfix">

				<figure>
					<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
						<img width="130" height="90" src="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" alt="A Paradise for Holiday" loading="lazy" title="A Paradise for Holiday" srcset="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg 130w, http://school2school2.local/wp-content/uploads/2021/04/sea-392x272.jpg 392w" sizes="(max-width: 130px) 100vw, 130px">
					</a>
				</figure>

				<div class="article-content">
					
					<h3 class="entry-title">
						<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
							A Paradise for Holiday
						</a>
					</h3>

				</div>
	
			</div>

			<div class="single-article clearfix">

<figure>
	<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
		<img width="130" height="90" src="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" alt="A Paradise for Holiday" loading="lazy" title="A Paradise for Holiday" srcset="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg 130w, http://school2school2.local/wp-content/uploads/2021/04/sea-392x272.jpg 392w" sizes="(max-width: 130px) 100vw, 130px">
	</a>
</figure>

<div class="article-content">
	
	<h3 class="entry-title">
		<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
			A Paradise for Holiday
		</a>
	</h3>

</div>

</div>



	<div class="single-article clearfix">

				<figure>
					<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
						<img width="130" height="90" src="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" alt="A Paradise for Holiday" loading="lazy" title="A Paradise for Holiday" srcset="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg 130w, http://school2school2.local/wp-content/uploads/2021/04/sea-392x272.jpg 392w" sizes="(max-width: 130px) 100vw, 130px">
					</a>
				</figure>

				<div class="article-content">
					
					<h3 class="entry-title">
						<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
							A Paradise for Holiday
						</a>
					</h3>

				</div>
	
			</div>


			<div class="single-article clearfix">

<figure>
	<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
		<img width="130" height="90" src="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg" class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" alt="A Paradise for Holiday" loading="lazy" title="A Paradise for Holiday" srcset="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg 130w, http://school2school2.local/wp-content/uploads/2021/04/sea-392x272.jpg 392w" sizes="(max-width: 130px) 100vw, 130px">
	</a>
</figure>

<div class="article-content">
	
	<h3 class="entry-title">
		<a href="http://school2school2.local/a-paradise-for-holiday/" title="A Paradise for Holiday">
			A Paradise for Holiday
		</a>
	</h3>

</div>

</div>



			
			
			
		
			
			
</section>
<?php
}
add_action('school2_front_page_content_top_section','front_page_content_top_section',10); 

?>
