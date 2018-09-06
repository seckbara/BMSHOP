<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to thebuilt_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package TheBuilt
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;

?>
<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( '1 comment', '%1$s comments', get_comments_number(), '', 'thebuilt' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
		

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<div class="mgt-message-box mgt-message-box-info"><?php esc_html_e( 'Comments are closed.', 'thebuilt' ); ?></div>
		<?php endif; ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<a id="blog_show_comment_form" class="btn mgt-button mgt-style-solid-invert mgt-align-center mgt-size-small"><?php esc_html_e('Write a comment', 'thebuilt');?></a>
		<div class="comments-form-wrapper" id="comments-form-wrapper">
		<?php comment_form(array('comment_notes_after' => '', 'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . esc_html( 'Comment', 'thebuilt' ) .
    ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>')); ?>
		</div>
		<?php endif; ?>

		<ul class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use thebuilt_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define thebuilt_comment() and that will be used instead.
				 * See thebuilt_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'thebuilt_comment' ) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="nav-below" class="navigation-paging">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="nav-previous col-md-2">
					<?php previous_comments_link( esc_html__( 'Older Comments', 'thebuilt' ) ); ?>
					</div>
					<div class="col-md-8 nav-text"><?php esc_html_e("Comments navigation", 'thebuilt'); ?></div>
					<div class="nav-next col-md-2">
					<?php next_comments_link( esc_html__( 'Newer Comments', 'thebuilt' ) ); ?>
					</div>
				</div>
			</div>
		</nav>
	
		<?php endif; // check for comment navigation ?>
	<?php else: ?>
		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<h2 class="comments-title">
			<?php
				esc_html_e( '0 comments', 'thebuilt' );
			?>
		</h2>
		<a id="blog_show_comment_form" class="btn mgt-button mgt-style-solid-invert mgt-align-center mgt-size-small"><?php esc_html_e('Write a comment', 'thebuilt');?></a>
		<div class="comments-form-wrapper" id="comments-form-wrapper">
		<?php comment_form(array('comment_notes_after' => '', 'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . esc_html( 'Comment', 'thebuilt' ) .
    ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>')); ?>
		</div>
		<?php endif; ?>
		
	<?php endif; // have_comments() ?>

	

</div><!-- #comments -->
