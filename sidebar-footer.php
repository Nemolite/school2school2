<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The footer widget area is triggered if any of the areas have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( ! is_active_sidebar( 'colormag_footer_sidebar_one' ) &&
     ! is_active_sidebar( 'colormag_footer_sidebar_two' ) &&
     
     ! is_active_sidebar( 'school2_footer_sidebar_map' ) ) {
	return;
}
?>

<div class="footer-widgets-wrapper">
	<div class="inner-wrap">
		<div class="footer-widgets-area clearfix">
			<div class="tg-footer-main-widget">
				<div class="tg-first-footer-widget">
					<?php dynamic_sidebar( 'colormag_footer_sidebar_one' ); ?>
				</div>
			</div>

			<div class="tg-footer-other-widgets">
				<div class="tg-second-footer-widget">
					<?php dynamic_sidebar( 'colormag_footer_sidebar_two' ); ?>
				</div>
				<!--
				<div class="tg-third-footer-widget">
					<?php // dynamic_sidebar( 'colormag_footer_sidebar_three' ); ?>
				</div>
				<div class="tg-fourth-footer-widget">
					<?php // dynamic_sidebar( 'colormag_footer_sidebar_four' ); ?>
				</div>
				-->
				<div class="school2-second-footer-widget">
					<?php dynamic_sidebar( 'school2_footer_sidebar_map' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
