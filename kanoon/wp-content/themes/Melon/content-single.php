<?php
/**
 * @package web2feel
 * @since web2feel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<div class="float-right">تاریخ و زمان انتشار  <?php the_time('l, n F Y ساعت g:i a'); ?> </div>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<br /><br />
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'صفحه:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( ', ');

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! web2feel_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = 'کلیدواژه ها %2$s  | <a href="%3$s" title="لینک مستقیم به %4$s" rel="bookmark">لینک مستقیم</a>.';
				} else {
					$meta_text = '<a href="%3$s" title="لینک مستقیم به %4$s" rel="bookmark">لینک مستقیم</a>.';
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = 'دسته %1$s. کلیدواژه ها %2$s.<a href="%3$s" title="لینک مستقیم به %4$s" rel="bookmark">لینک مستقیم</a>.';
				} else {
					$meta_text = 'دسته %1$s | <a href="%3$s" title="لینک مستقیم به %4$s" rel="bookmark">لینک مستقیم</a>.';
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( '(ویرایش)' , '<span class="edit-link">', '</span><br />' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->