<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package web2feel
 * @since web2feel 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area grid_6 papr">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 hentry not-found">
				<header class="entry-header">
					<h1 class="entry-title">یافت نشد</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p>مطلبی در این آدرس وجود ندارد. دوباره تلاش کرده و یا از جستجو استفاده کنید</p>

					<?php get_search_form(); ?><br />
					
					
					<h2>دسته بندی ها</h2>
					<ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
					
					<h2>آرشیو</h2>
					<ul class="arrow_list">
						<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
					</ul>

				
				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

<?php get_footer(); ?>