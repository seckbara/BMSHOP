<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TheBuilt
 */

get_header();

$thebuilt_theme_options = thebuilt_get_theme_options();

$archive_sidebarposition = $thebuilt_theme_options['archive_sidebar_position'];

if(is_active_sidebar( 'main-sidebar' ) && ($archive_sidebarposition <> 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12';
}

?>

<div class="content-block">
  <div class="container-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-item-title">
            <h1><?php
			if ( is_category() ) :
				printf( wp_kses_post(__( '%s', 'thebuilt' )), '<span>' . single_cat_title( '', false ) . '</span>' );

			elseif ( is_tag() ) :
				printf( wp_kses_post(__('Tag: %s', 'thebuilt' )), '<span>' . single_tag_title( '', false ) . '</span>' );

			elseif ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/
				the_post();
				printf( wp_kses_post(__( 'Author: %s', 'thebuilt' )), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_day() ) :
				printf( wp_kses_post(__('Daily: %s', 'thebuilt' )), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( wp_kses_post(__('Monthly: %s', 'thebuilt' )), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( wp_kses_post(__('Yearly: %s', 'thebuilt' )), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				esc_html_e( 'Asides', 'thebuilt' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				esc_html_e( 'Images', 'thebuilt');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				esc_html_e( 'Videos', 'thebuilt' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				esc_html_e( 'Quotes', 'thebuilt' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				esc_html_e( 'Links', 'thebuilt' );

			else :
				esc_html_e( 'Archives', 'thebuilt' );

			endif;
		?></h1>
          </div>
        </div>
      </div>
    </div>
    <?php thebuilt_show_breadcrumbs(); ?>
  </div>
<div class="container">
	<div class="row">
<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $archive_sidebarposition == 'left')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($span_class); ?>">

<?php
	if ( is_category() ) :
		// show an optional category description
		$category_description = category_description();
		if ( ! empty( $category_description ) ) :
			echo '<div class="container">
<div class="row">
<div class="col-md-12">'.apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . wp_kses_post($category_description) . '</div>' ).'		</div>
</div>
</div>';
		endif;

	elseif ( is_tag() ) :
		// show an optional tag description
		$tag_description = tag_description();
		if ( ! empty( $tag_description ) ) :
			echo '<div class="container">
<div class="row">
<div class="col-md-12">'.apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . wp_kses_post($tag_description) . '</div>' ).'		</div>
</div>
</div>';
		endif;

	endif;
?>
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>
				
				<?php thebuilt_content_nav( 'nav-below' ); ?>
				
			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>
		</div>
		<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $archive_sidebarposition == 'right')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
	</div>
</div>
</div>
<?php get_footer(); ?>