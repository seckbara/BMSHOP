<?php
/**
 * The Template for displaying Portfolio single posts.
 *
 * @package thebuilt
 */

$thebuilt_theme_options = thebuilt_get_theme_options();

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php 

// PORTFOLIO ITEM DETAILS
$comments_loaded = false;

$portfolio_css_classes = '';

$portfolio_small = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'mgt-portfolio-small' );
$portfolio_large = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thebuilt-portfolio-large' );
$portfolio_source = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'source' );

$portfolio_brand = get_post_meta( get_the_ID(), '_portfolio_brand_value', true );
$portfolio_location = get_post_meta( get_the_ID(), '_portfolio_location_value', true );
$portfolio_area = get_post_meta( get_the_ID(), '_portfolio_area_value', true );
$portfolio_value = get_post_meta( get_the_ID(), '_portfolio_value_value', true );
$portfolio_completed = get_post_meta( get_the_ID(), '_portfolio_completed_value', true );
$portfolio_architect = get_post_meta( get_the_ID(), '_portfolio_architect_value', true );

$portfolio_fullwidthslider = get_post_meta( get_the_ID(), '_portfolio_fullwidthslider_value', true );
$portfolio_socialshare_disable = get_post_meta( get_the_ID(), '_portfolio_socialshare_disable_value', true );
$portfolio_original_image_sizes = get_post_meta( get_the_ID(), '_portfolio_original_image_sizes_value', true );
$portfolio_hide_details = get_post_meta( get_the_ID(), '_portfolio_hide_details_value', true );

$portfolio_hide_1st_image_from_slider = get_post_meta( get_the_ID(), '_portfolio_hide_1st_image_from_slider_value', true );

$portfolio_images = array();
$portfolio_images_sources = array();

$portfolio_images_sources = thebuilt_cmb2_get_images_src( get_the_ID(), '_thebuilt_portfolio_images_file_list', 'source' );

$portfolio_layout = get_post_meta( get_the_ID(), '_portfolio_display_type_value', true );
$portfolio_disableslider = get_post_meta( get_the_ID(), '_portfolio_disableslider_value', true );

$portfolio_sidebarposition = get_post_meta( $post->ID, '_portfolio_sidebarposition_value', true );
$portfolio_titleposition = get_post_meta( $post->ID, '_portfolio_titleposition_value', true );

$page_transparent_header = get_post_meta( $post->ID, '_page_transparent_header_value', true );

if(isset($page_transparent_header)&&($page_transparent_header)) {
  echo '<script>(function($){$(document).ready(function() { $("body").addClass("transparent-header"); });})(jQuery);</script>';
}

$page_bgcolor = get_post_meta( $post->ID, '_page_bgcolor_value', true );

$page_bgcolor_css = '';

if(isset($page_bgcolor)&&($page_bgcolor<>'')) {
    $page_bgcolor_css = 'background-color: '.$page_bgcolor;
}
else
{
    $page_bgcolor_css = '';
}

if(!isset($portfolio_sidebarposition) || ($portfolio_sidebarposition == '')) {
  $portfolio_sidebarposition = 0;
}

if(!isset($portfolio_titleposition) || ($portfolio_titleposition == '')) {
  $portfolio_titleposition = 'default';
}

if($portfolio_sidebarposition == "0") {
  $portfolio_sidebarposition = $thebuilt_theme_options['portfolio_sidebar_position'];
}

$portfolio_css_classes = 'portfolio-layout-'.$portfolio_layout.' portfolio-title-position-'.$portfolio_titleposition;

$containerclass = 'container';
$containerboxclass = '';

if($portfolio_layout == 0) {

	if(is_active_sidebar( 'portfolio-sidebar' ) && ($portfolio_sidebarposition <> 'disable')) {
		$span_class = 'col-md-4';
		$span_class2 = 'col-md-5';
	}
	else {
		$span_class = 'col-md-7';
		$span_class2 = 'col-md-5';
	}

	$portfolio_main_image = $portfolio_small;

  $portfolio_images = thebuilt_cmb2_get_images_src( get_the_ID(), '_thebuilt_portfolio_images_file_list', 'mgt-portfolio-small' );
}
else {
	if(is_active_sidebar( 'portfolio-sidebar' ) && ($portfolio_sidebarposition <> 'disable') ) {
		$span_class = 'col-md-9';
	}
	else {
		$span_class = 'col-md-12';
		$span_class2 = 'col-md-12 portfolio-single-content';
	}

	$portfolio_main_image = $portfolio_large;

  $portfolio_images = thebuilt_cmb2_get_images_src( get_the_ID(), '_thebuilt_portfolio_images_file_list', 'thebuilt-portfolio-large' );
}

// full image size for fullwidth slider
if($portfolio_fullwidthslider) { 

  $portfolio_images = thebuilt_cmb2_get_images_src( get_the_ID(), '_thebuilt_portfolio_images_file_list', 'source' );
	$portfolio_main_image = $portfolio_source;

  $span_class = 'col-md-12';

  $portfolio_css_classes .= ' portfolio-fullwidthslider';
}

if(!isset($portfolio_original_image_sizes)) {
  $portfolio_original_image_sizes = false;
}

if($portfolio_original_image_sizes) {

    $portfolio_images = thebuilt_cmb2_get_images_src( get_the_ID(), '_thebuilt_portfolio_images_file_list', 'source' );
    $portfolio_main_image = $portfolio_source;
}

$terms = get_the_terms( $post->ID , 'mgt_portfolio_filter' );

$terms_count = count($terms);

$terms_counter = 0;

$terms_slug = '';

$categories_html = '';

$parent_link = get_post_type_archive_link('mgt_portfolio');

$related_filter = '';

foreach ( $terms ? $terms: array() as $term ) {

  if($terms_counter  < $terms_count - 1) {
    $categories_html .= esc_html($term->name).', ';
    $related_filter .= esc_html($term->slug).', ';
  }
  else
  {
    $categories_html .= esc_html($term->name);
    $related_filter .= esc_html($term->slug);
  }
  
  $terms_slug .= ' '.$term->slug;

  $terms_counter++;
}

$theme_data['related_filter'] = $related_filter;

thebuilt_set_theme_data($theme_data);

// PORTFOLIO ITEM DETAILS END

// TITLE SETTINGS
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
// TITLE SETTINGS END
?>
<?php if(isset($thebuilt_theme_options['portfolio_show_item_navigation']) && $thebuilt_theme_options['portfolio_show_item_navigation']): ?>
    <?php
        $prevPost = get_previous_post();

        if($prevPost) {
          $prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'thebuilt-portfolio-nav');
        } else {
          $prevthumbnail = false;
        }

        $nextPost = get_next_post();

        if($nextPost) {
          $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'thebuilt-portfolio-nav');
        } else {
          $nextthumbnail = false;
        }
    ?>
    
    <?php if($prevthumbnail): ?>
    <div class="portfolio-navigation-prev" data-name="<?php esc_attr_e('Prev', 'thebuilt'); ?>">
      <div class="portfolio-navigation-image">
        <?php previous_post_link('%link', $prevthumbnail); ?>
      </div>
    </div>
    <?php endif;?>
    <?php if($nextthumbnail): ?>
    <div class="portfolio-navigation-next" data-name="<?php esc_attr_e('Next', 'thebuilt'); ?>">
      <div class="portfolio-navigation-image">
        <?php next_post_link('%link', $nextthumbnail); ?>
      </div>
    </div>
    <?php endif;?>
  <?php endif; ?>

<div class="content-block"<?php if($page_bgcolor_css<>'') { echo ' data-style="'.esc_attr($page_bgcolor_css).'"'; }; ?>>
  <?php if($portfolio_titleposition == 'default'): ?>
    <div class="container-bg<?php echo esc_attr($header_background_class); ?>" data-style="<?php echo esc_attr($header_background_image_style); ?>">
      <div class="container-bg-overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="page-item-title">
                <h1><?php the_title(); ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php thebuilt_show_breadcrumbs(); ?>
    </div>
  </div>

  <?php endif; ?>
  <?php if($portfolio_fullwidthslider):?>
  <div class="portfolio-item-image">
    <div class="porftolio-slider porfolio-slider-fullwidth<?php if((!$portfolio_disableslider)&&(count($portfolio_images) > 0)) { echo ' enable-slider'; } ?>">
      <ul class="slides">
        <?php if(!$portfolio_hide_1st_image_from_slider): ?>
        <li><a href="<?php echo esc_url($portfolio_source[0]); ?>" rel="lightbox"><img src="<?php echo esc_url($portfolio_main_image[0]); ?>" alt="<?php the_title(); ?>"/></a></li>
        <?php endif; ?>
        <?php
        $i = 0;
        foreach ( $portfolio_images as $portfolio_image ) {
          echo '<li><a href="'.esc_url($portfolio_images_sources[$i]).'" rel="lightbox"><img src="'.esc_url($portfolio_image).'" alt="'.get_the_title().'"/></a></li>';
          $i++;
        }

        ?>
      </ul>
    </div>
  </div>
  <?php endif;?>

	<div class="project-container <?php echo esc_attr($containerclass);?> portfolio-item-details <?php echo esc_attr($portfolio_css_classes);?>">
		<div class="row">
		<?php if ( is_active_sidebar( 'portfolio-sidebar' ) && ( $portfolio_sidebarposition == 'left') &&(!$portfolio_fullwidthslider)) : ?>
		<div class="col-md-3 main-sidebar portfolio-sidebar sidebar">
		  <ul id="portfolio-sidebar">
		    <?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
		  </ul>
		</div>
		<?php endif; ?>

		<div class="<?php echo esc_attr($span_class); ?>">
      <?php if(!$portfolio_fullwidthslider):?>

        <?php if((!$portfolio_hide_1st_image_from_slider)||(count($portfolio_images) > 0)):?>
        <div class="<?php echo esc_attr($containerboxclass); ?> portfolio-item-image-container">
        <div class="row">
        <div class="col-md-12">
  			<div class="portfolio-item-image">
  				<div class="porftolio-slider<?php if((!$portfolio_disableslider)&&(count($portfolio_images) > 0)) { echo ' enable-slider'; } ?>">
            <ul class="slides">
              <?php if(!$portfolio_hide_1st_image_from_slider && isset($portfolio_main_image[0])): ?>
              <li><a href="<?php echo esc_url($portfolio_source[0]); ?>" rel="lightbox"><img src="<?php echo esc_url($portfolio_main_image[0]); ?>" alt="<?php the_title(); ?>"/></a></li>
              <?php endif; ?>
              <?php
              $i = 0;
              foreach ( $portfolio_images as $portfolio_image ) {
                echo '<li><a href="'.esc_url($portfolio_images_sources[$i]).'" rel="lightbox"><img src="'.esc_url($portfolio_image).'" alt="'.get_the_title().'"/></a></li>';
                $i++;
              }

              ?>
            </ul>
          </div>
        </div>
        </div>
        </div>
        </div>
        <?php endif;?>

      <?php endif;?>
    <?php if ( !is_active_sidebar( 'portfolio-sidebar' ) || ($portfolio_sidebarposition == 'disable') || ($portfolio_layout == 0)) : ?>    
		</div>

		<div class="<?php echo esc_attr($span_class2); ?>">
		<?php endif; ?>

		  <div class="portfolio-item-data clearfix">
            
            <div class="project-content">
            <?php the_content(); ?>
            <div class="clear"></div>
            </div>
             
            <div class="row">
                <div class="col-md-12">
                <?php if($portfolio_titleposition == 'description'): ?>
             
                      <div class="page-item-title">
                        <h1><?php the_title(); ?></h1>
                      </div>
                   
                <?php endif; ?>
                <?php if(!isset($portfolio_hide_details) || (!$portfolio_hide_details)): ?>
          
                  <div class="project-details">
                   
                      <?php if(isset($portfolio_brand) && $portfolio_brand <> ''): ?>
                      <p><span><?php esc_html_e('Client:', 'thebuilt');?></span> <?php echo esc_html($portfolio_brand); ?></p>
                      <?php endif; ?>
                      <?php if(isset($portfolio_url) && $portfolio_url <> ''): ?>
                      <p><span><?php esc_html_e('Project url:', 'thebuilt');?></span> <a href="<?php echo esc_url($portfolio_url); ?>" target="_blank"><?php echo esc_html($portfolio_url); ?></a></p>
                      <?php endif; ?>

                      <?php if(isset($portfolio_location) && $portfolio_location <> ''): ?>
                      <p><span><?php esc_html_e('Location:', 'thebuilt');?></span> <?php echo esc_html($portfolio_location); ?></p>
                      <?php endif; ?>

                      <?php if(isset($portfolio_area) && $portfolio_area <> ''): ?>
                      <p><span><?php esc_html_e('Area:', 'thebuilt');?></span> <?php echo esc_html($portfolio_area); ?></p>
                      <?php endif; ?>

                      <?php if(isset($portfolio_value) && $portfolio_value <> ''): ?>
                      <p><span><?php esc_html_e('Value:', 'thebuilt');?></span> <?php echo esc_html($portfolio_value); ?></p>
                      <?php endif; ?>

                      <?php if(isset($portfolio_completed) && $portfolio_completed <> ''): ?>
                      <p><span><?php esc_html_e('Completed date:', 'thebuilt');?></span> <?php echo esc_html($portfolio_completed); ?></p>
                      <?php endif; ?>

                      <?php if(isset($portfolio_architect) && $portfolio_architect <> ''): ?>
                      <p><span><?php esc_html_e('Architect:', 'thebuilt');?></span> <?php echo esc_html($portfolio_architect); ?></p>
                      <?php endif; ?>

                      <p><span><?php esc_html_e('Category:', 'thebuilt');?></span> <?php echo esc_html($categories_html); ?></p>
                   
                  </div>

                <?php endif; ?>

                <?php if(!isset($portfolio_socialshare_disable) || !$portfolio_socialshare_disable): ?>
                  <?php do_action('thebuilt_social_share'); // this action called from plugin ?>
                <?php endif; ?>
            
                </div>
            </div>
            
      </div>
      <div class="clear"></div>
      <?php if(($portfolio_sidebarposition !== 'disable')): ?>
 
            <?php 
            if(!$comments_loaded) {
               if ( comments_open() || '0' != get_comments_number() ) 
            
                  comments_template();
            }
            ?>
   
      <?php endif; ?>
		</div>
		
		<?php if ( is_active_sidebar( 'portfolio-sidebar' ) &&( $portfolio_sidebarposition == 'right') &&(!$portfolio_fullwidthslider) ) : ?>
		<div class="col-md-3 main-sidebar portfolio-sidebar sidebar">
		  <ul id="portfolio-sidebar">
		    <?php dynamic_sidebar( 'portfolio-sidebar' ); ?>
		  </ul>
		</div>
		<?php endif; ?>
    
 
		</div>
    <?php if($portfolio_sidebarposition == 'disable' && ( comments_open() || '0' != get_comments_number() )): ?>
    <div class="container fullwidth-no-padding">
      <div class="row">
        <div class="col-md-12">
          <?php 
          if(!$comments_loaded) {
             if ( comments_open() || '0' != get_comments_number() ) 
          
                comments_template();
          }
          ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
	</div>
</div> <?php //content-block ?>

<?php if(!$portfolio_disableslider): ?>

<?php 
if(isset($thebuilt_theme_options['portfolio_show_slider_navigation']) && $thebuilt_theme_options['portfolio_show_slider_navigation']) {
  $portfolio_show_slider_navigation = 'true';
} else {
  $portfolio_show_slider_navigation = 'false';
}

if(isset($thebuilt_theme_options['portfolio_slider_autoplay']) && $thebuilt_theme_options['portfolio_slider_autoplay']) {
  $portfolio_slider_autoplay = 'true';
} else {
  $portfolio_slider_autoplay = 'false';
}

if(isset($thebuilt_theme_options['portfolio_show_slider_pagination']) && $thebuilt_theme_options['portfolio_show_slider_pagination']) {
  $portfolio_show_slider_pagination = 'true';
} else {
  $portfolio_show_slider_pagination = 'false';
}

?>
<?php if(count($portfolio_images) > 0): ?>
<script>
(function($){
$(document).ready(function() {
  $(".porftolio-slider.enable-slider ul.slides").owlCarousel({
          items: 1,
          itemsDesktop: [1024,3],
          itemsTablet: [770,2],
          itemsMobile : [480,1],
          autoHeight: true,
          autoPlay: <?php echo esc_js($portfolio_slider_autoplay);?>,
          navigation: <?php echo esc_js($portfolio_show_slider_navigation);?>,
          navigationText : false,
          pagination: <?php echo esc_js($portfolio_show_slider_pagination);?>,
          afterInit : function(elem){
              $(".porftolio-slider").css("display", "block");
          }
    });

});
})(jQuery);
</script>
<?php endif; ?>
<?php endif; ?>

<?php if(isset($thebuilt_theme_options['portfolio_related_works']) && ($thebuilt_theme_options['portfolio_related_works'])): ?>


<?php get_template_part( 'portfolio-related' ); ?>

<?php endif; ?>

<?php endwhile; // end of the loop. ?>





<?php get_footer(); ?>