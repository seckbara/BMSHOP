<?php
/**
 * @package TheBuilt
 */

$post_classes = get_post_class();

$current_post_class = $post_classes[4];

// This post formats will display content before title
$post_classes_content_top = array('format-audio', 'format-video', 'format-gallery', 'format-status', 'format-link');

?>

<div class="content-block blog-post clearfix">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				
				<div class="post-content-wrapper">
					<?php 
					if(in_array($current_post_class , $post_classes_content_top)) {
						
						echo '<div class="entry-content">';
						the_content( esc_html__( 'Continue reading', 'thebuilt' ) );
						echo '</div>';
						
					} else {
						if ( has_post_thumbnail() ):

						$category_html = '<div class="post-categories">'.( get_the_category_list( ', ', 0, $post->ID )).'</div>';
						?>
						<div class="blog-post-thumb text-center">
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php the_post_thumbnail('thebuilt-blog-thumb'); ?>
							</a>
							<?php echo wp_kses_post($category_html); ?>
						</div>
						<?php
						endif;
					}

					$post_comments = get_comments_number($post->ID);

					?>
					<div class="post-content">

						<h2 class="entry-title post-header-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="post-info">
						<span><i class="fa fa-file-text-o"></i><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_time(get_option( 'date_format' ));  ?></a></span><span class="post-comments-count"><i class="fa fa-comment"></i><?php echo esc_html($post_comments); ?></span><?php edit_post_link( esc_html__( 'Edit', 'thebuilt' ), ' <span class="edit-link">', '</span>' ); ?>
						</div>
						
							<?php if(!in_array($current_post_class , $post_classes_content_top)): ?>
							<!-- .entry-content -->
							<div class="entry-content">
								<?php 
								
								the_content();
								
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thebuilt' ),
									'after'  => '</div>',
								) );
								?>
							</div><!-- // .entry-content -->
							<?php endif;?>
						
							
					</div>
		
				</div>
			
		
	</article>
</div>