<?php
/**
 * Top baners
 */

defined( 'ABSPATH' ) || exit;

class topWidget extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'topbaners', 
			'Top Банер', // заголовок виджета
			array( 'description' => 'Банеры для секции' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $treatment ) {
		?>

            <div class="single-article clearfix">

				<figure>
					<a href="<?php echo esc_url($treatment['url']);?>" title="<?php echo __( $treatment['title'], 'school2');?>">
						<img width="130" height="90" 
                        src="<?php echo esc_url($treatment['img']);?>" 
                        class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" 
                        alt="<?php echo __( $treatment['title'], 'school2');?>" 
                        loading="lazy" 
                        title="<?php echo __( $treatment['title'], 'school2');?>" 
                        srcset="http://school2school2.local/wp-content/uploads/2021/04/sea-130x90.jpg 130w, http://school2school2.local/wp-content/uploads/2021/04/sea-392x272.jpg 392w" 
                        sizes="(max-width: 130px) 100vw, 130px">
					</a>
				</figure>

				<div class="article-content">
					
					<h3 class="entry-title">
						<a href="<?php echo esc_url($treatment['url']);?>" 
                        title="<?php echo __( $treatment['title'], 'school2');?>">
                        <?php echo __( $treatment['title'], 'school2');?>
						</a>
					</h3>

				</div>
	
			</div>       
        <?php
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $treatment ) {
		if ( isset( $treatment[ 'title' ] ) ) {
			$title = $treatment[ 'title' ];
		}
        
        if ( isset( $treatment[ 'img' ] ) ) {
			$img = $treatment[ 'img' ];
		}

        if ( isset( $treatment[ 'url' ] ) ) {
			$url = $treatment[ 'url' ];
		}
		?>

        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>">Ссылка на изображение 130x90 (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="url" value="<?php echo esc_attr( $img ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">Ссылка с банера (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="url" value="<?php echo esc_attr( $url ); ?>" />
		</p>		
		<?php 
	}
 
	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$treatment = array();
		$treatment['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';	
        $treatment['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
        $treatment['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		return $treatment;
	}
}
 
/*
 * регистрация виджета
 */
function school2_top_baners_widget_load() {
	register_widget( 'topWidget' );
}
add_action( 'widgets_init', 'school2_top_baners_widget_load' );



?>
