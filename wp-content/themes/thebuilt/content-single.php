<?php
/**
 * @package TheBuilt
 */
$thebuilt_theme_options = thebuilt_get_theme_options();

$post_sidebarposition = get_post_meta( get_the_ID(), '_post_sidebarposition_value', true );
$post_socialshare_disable = get_post_meta( get_the_ID(), '_post_socialshare_disable_value', true );
$post_notdisplaytitle = get_post_meta( $post->ID, '_post_notdisplaytitle_value', true );

$post_transparent_header = get_post_meta( $post->ID, '_post_transparent_header_value', true );

if(isset($post_transparent_header)&&($post_transparent_header)) {
	echo '<script>(function($){$(document).ready(function() { $("body").addClass("transparent-header"); });})(jQuery);</script>';
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['post_sidebar_position']) ) {
  $thebuilt_theme_options['post_sidebar_position'] = $_GET['post_sidebar_position'];
}

if(!isset($piemont_theme_options['post_sidebar_position'])) {
	$piemont_theme_options['post_sidebar_position'] = 'disable';
}

if(!isset($post_sidebarposition)||($post_sidebarposition == '')) {
	$post_sidebarposition = 0;
}

if($post_sidebarposition == "0") {
	$post_sidebarposition = $thebuilt_theme_options['post_sidebar_position'];
}

$containerclass = 'container';
$add_class = '';

$post_bgcolor = get_post_meta( $post->ID, '_post_bgcolor_value', true );

$post_bgcolor_css = '';

if(isset($post_bgcolor)&&($post_bgcolor<>'')) {
  $post_bgcolor_css = 'background-color: '.$post_bgcolor;
}
else
{
  $post_bgcolor_css = '';
}

if(is_active_sidebar( 'main-sidebar' ) && ($post_sidebarposition <> 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12 post-single-content';
}

$post_comments = get_comments_number($post->ID);

$header_background_image = get_post_meta( get_the_ID(), '_thebuilt_header_image', true );

if(isset($header_background_image) && ($header_background_image!== '')) {
  $header_background_image_style = 'background-image: url('.$header_background_image.');';
  $header_background_class = ' with-bg';
} else {
  $header_background_image_style = '';
  $header_background_class = '';
}

$header_background_color =  get_post_meta( get_the_ID(), '_thebuilt_header_bgcolor', true );

if(isset($header_background_color) && ($header_background_color!== '')) {
  $header_background_image_style .= 'background-color: '.$header_background_color;
  $header_background_class .= ' with-bgcolor';
}

?>

<div class="content-block"<?php if($post_bgcolor_css<>'') { echo ' data-style="'.esc_attr($post_bgcolor_css).'"'; }; ?>>
<?php if(!$post_notdisplaytitle): ?>
<div class="container-bg<?php echo esc_attr($header_background_class); ?>" data-style="<?php echo esc_attr($header_background_image_style); ?>">
	<div class="container-bg-overlay">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <div class="page-item-title">
	          <h1>
				<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( ', ' );
				if ( $categories_list ) :
				?>
				<span><?php echo wp_kses_post(strip_tags($categories_list)); ?></span>
				<?php else: ?>
				<?php the_title(); ?>
				<?php endif; // End if categories ?>
	         
	          </h1>
	        </div>
	      </div>
	    </div>
	  </div>
    </div>
  <?php thebuilt_show_breadcrumbs(); ?>
</div>
<?php endif; ?>
<div class="post-container <?php echo esc_attr($containerclass); ?>">
	<div class="row">
<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $post_sidebarposition == 'left')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($span_class); ?>">
			<div class="blog-post blog-post-single<?php echo esc_attr($add_class); ?>">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="post-content-wrapper">
					
								<div class="post-content">
									<?php 
									if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it.
									?>
									<div class="blog-post-thumb text-center">
									
									<?php the_post_thumbnail(); ?>
									
									</div>
									<?php endif; ?>
									
									<h2 class="entry-title post-header-title"><?php the_title(); ?></h2>
									<div class="post-info">
									<span><i class="fa fa-file-text-o"></i><?php the_time(get_option( 'date_format' ));  ?></span><span class="post-comments-count"><i class="fa fa-comment"></i><?php echo esc_html($post_comments); ?></span><?php edit_post_link( esc_html__( 'Edit', 'thebuilt' ), ' <span class="edit-link">', '</span>' ); ?>
									</div>
								
									<?php if ( is_search() ) : // Only display Excerpts for Search ?>
									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-summary -->
									<?php else : ?>
									<div class="entry-content">
										<?php the_content('<div class="more-link">'.esc_html__( 'Continue reading...', 'thebuilt' ).'</div>' ); ?>
										<?php
											wp_link_pages( array(
												'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thebuilt' ),
												'after'  => '</div>',
											) );
										?>
									</div><!-- .entry-content -->
									<?php endif; ?>

								</div>
					
							</div>
			
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', ''  );
					if ( $tags_list ) :
				?>
				<span class="tags">
					<i class="fa fa-tags"></i>
<?php printf( wp_kses_post(__('Tags:&nbsp; %1$s', 'thebuilt' )), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
				
				<?php if(!isset($post_socialshare_disable) || !$post_socialshare_disable): ?>
					<?php do_action('thebuilt_social_share'); // this action called from plugin ?>
				<?php endif; ?>
				
				

				</article>

			</div>
			
			<?php if(isset($thebuilt_theme_options['blog_enable_author_info'])&&($thebuilt_theme_options['blog_enable_author_info'])): ?>
				<?php if ( is_single() && get_the_author_meta( 'description' ) ) : ?>
					<?php get_template_part( 'author-bio' ); ?>
				<?php endif; ?>
			<?php endif; ?>
			<?php 
			if(isset($thebuilt_theme_options['blog_post_navigation']) && $thebuilt_theme_options['blog_post_navigation']) {
				thebuilt_content_nav( 'nav-below' ); 
			}
			?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) 
					
					comments_template();
			?>

		</div>
		<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $post_sidebarposition == 'right')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
	</div>
	</div>
</div>
