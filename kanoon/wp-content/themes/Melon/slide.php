<div id="slider">
<div class="flexslider grid_6">
	<ul class="slides">
	    <?php
				$query = new WP_Query( array( 'cat' =>1,'posts_per_page' =>3 ) );
	           	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
		 		<li>
		 			
				<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 640, 400, true ); //resize & crop the image
				?>
				
				<?php if($image) : ?>
					<a href="<?php the_permalink(); ?>" title="لینک مستقیم به <?php the_title(); ?>"><img class="slide-image" src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
				<?php endif; ?>
		 			
				<div class="flex-caption">
				<h2><a href="<?php the_permalink(); ?>" title="لینک مستقیم به <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php wpe_excerpt('wpe_excerptlength_index', ''); ?>
				</div>
				
		<?php endwhile; endif; ?>
    		
	  </li>
	</ul>
</div>
</div>