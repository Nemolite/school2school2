<?php
/**
 * Widgets for chif
 */

defined( 'ABSPATH' ) || exit;

class chifWidget extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'baner', 
			'Руководитель', // заголовок виджета
			array( 'description' => 'Банер для Руководителя' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $instance ) {
		?>
		<h3 class="widget-title"><span>Директор</span></h3>
			<div class="first-post">
				<img class="school2-img-chif" width="200" height="200" src="<?php echo esc_url($instance['img']);?>" class="attachment-colormag-featured-post-medium size-colormag-featured-post-medium wp-post-image" alt="<?php echo __( $instance['title'], 'school2');?>" loading="lazy" title="<?php echo __( $instance['title'], 'school2');?>">
					<h3 class="school2-entry-title"><?php echo __( $instance['title'], 'school2');?></h3>	
			</div>	
        <?php
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
        
        if ( isset( $instance[ 'img' ] ) ) {
			$img = $instance[ 'img' ];
		}
       
		?>

        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Руководитель</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>">Ссылка на изображение 200x200 (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="url" value="<?php echo esc_attr( $img ); ?>" />
		</p>

       		
		<?php 
	}
 
	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';	
        $instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';       
		return $instance;
	}
}
 
/*
 * регистрация виджета
 */
function school2_chif_baner_widget_load() {
	register_widget( 'chifWidget' );
}
add_action( 'widgets_init', 'school2_chif_baner_widget_load' );

?>
