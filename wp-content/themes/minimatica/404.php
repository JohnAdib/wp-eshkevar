<?php
/**
 * Template to display when a 404 error is triggered
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */

get_header(); ?>
 	<div class="title-container">
		<h1 class="page-title"><?php _e( 'چنين صفحه اي نداريم', 'minimatica' ); ?></h1>
	</div><!-- .title-container -->
	<div id="container">
		<div id="content">
			<div id="post-0" <?php post_class(); ?>>
				<div class="entry-content">
					<p><?php _e( 'اين محتوايي که شما بدنبالش هستيد، وجود ندارد!', 'minimatica' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- .post -->
		</div><!-- #content -->
		<div class="clear"></div>
	</div><!-- #container -->
<?php get_footer(); ?>