<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 */
?>

	</div><!-- #main .site-main -->

<div class="grid_6 papr cf" id="bottom">
	

	<?php if ( !function_exists('dynamic_sidebar')
	        || !dynamic_sidebar("Footer") ) : ?>  
	
	<?php endif; ?>
	
	
	<div class='clear'></div>
</div>
	<?php if(is_user_logged_in()) { ?>
	<a id="nav-admin" href="<?php bloginfo('url'); echo "/wp-admin"; ?>" target="_blank" title="برای ورود به بخش مدیریت کلیک کنید"><img src="<?php bloginfo('template_directory'); echo"/images/navigate-admin.png"; ?>" alt="انتقال به پنل مدیریت نوشهرآنلاین" ></a>
	<?php } ?>
	<footer id="footer" class="site-footer grid_6 cf" role="contentinfo">
		<div class="site-info">
				<div id="copyright">تمام حقوق این وب سایت برای <a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> محفوظ است.</div>
				<div id="powered-by">
				Designed By <a target="_blank" href="http://ermile.ir" title="طراحی شده توسط عضو ارمایل" >Ermile &copy;</a> |
				<a href="http://validator.w3.org/check?uri=referer" title='HTML5 Valid' target="_blank"> HTML5 Valid</a>
				</div>
		</div><!-- .site-info -->
	</footer><!-- #footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>