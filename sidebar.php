<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Gently
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class='col-md-4 sidebar'>
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</div><!-- #secondary -->
</div>