<?php
/**
 * Class School2
 */
// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

class School2 {
	
	private static $instance;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	protected function __construct() {
		
        add_action( 'school2_front_page_second_row_baners', array( $this, 'front_page_second_row_baners' ));
        
	}
	
	/**
	 * Средний ряд банеров
	 *	
	 */
	public function front_page_second_row_baners( ) {
	?>

<section id="colormag_featured_posts_widget-2" class="widget widget_featured_posts widget_featured_meta clearfix">
		<h3 class="widget-title"><span>БАНЕРЫ</span></h3>
		
        <div class="following-post school2-following-right">
            <?php
			if ( is_active_sidebar( 'second-left-baners' ) ) {
						dynamic_sidebar( 'second-left-baners' );						
					}
			?>			
		</div>

			
		<div class="following-post school2-following-left">
			<?php
			if ( is_active_sidebar( 'second-right-baners' ) ) {
						dynamic_sidebar( 'second-right-baners' );						
					}
			?>
		</div>	
</section>

    <?php
	}

    
}
	
/**
 * Initiate 
 */
function createSchool2Instance(){
	if ( class_exists( 'School2' ) ) {
		School2::instance();
	}
}
add_action('init','createSchool2Instance',30);

?>