<?php
/**
 * The comments template
 *
 * @package WordPress
 * @subpackage Minimatica
 * @since Minimatica 1.0
 */
 ?>

<div class="entry-comments">

<?php if ( post_password_required() ) : ?>
	<div id="comments">
		<p class="nopassword"><?php _e( 'اين نوشته محافظت شده است. کلمه عبور را براي ديدن نظرات وارد کنيد.', 'minimatica' ); ?></p>
	</div><!-- #comments -->
	<?php return; ?>
<?php endif; ?>

<?php // You can start editing here -- including this comment! ?>

<?php if ( ! comments_open() && ! is_page() ) : ?>
	<p class="nocomments"><?php _e( 'ديدگاه ها بسته شده اند.', 'minimatica' ); ?></p>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
	<div id="comments">
		<h3 id="comments-title"><?php comments_number( '', __( 'يک ديدگاه' ), '% ' . __( 'ديدگاه' ) ); ?></h3>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php previous_comments_link( '<span class="meta-nav">&larr;</span> ' .  __( 'ديدگاه هاي قديمي تر' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'ديدگاه جديد' ) . '<span class="meta-nav">&rarr;</span>' ); ?></div>
				<div class="clear"></div>
			</div><!-- .navigation -->
		<?php endif; ?>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'minimatica_comment' ) ); ?>
		</ol><!-- .commentlist -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php previous_comments_link( '<span class="meta-nav">&larr;</span> ' .  __( 'ديدگاه هاي قديمي تر' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'ديدگاه جديد' ) . '<span class="meta-nav">&rarr;</span>' ); ?></div>
				<div class="clear"></div>
			</div><!-- .navigation -->
		<?php endif; ?>
	</div><!-- #comments -->
<?php endif; ?>

<?php
$post_id = get_the_ID();
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$required_text = '';

$fields =  array(
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'نام' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email">' . '<label for="email">' . __( 'ايميل (منتشر نخواهد شد)' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	'url'    => '<p class="comment-form-url">' . '<label for="url">' . __( 'وب سايت' ) . '</label>' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
	);

$defaults = array(
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="comment-label">' . __( 'ديدگاه' ) . '</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
);
?>

<?php comment_form( $defaults ); ?>

</div><!-- .entry-comments -->