<?php
/*
  Show related items on portfolio single item page
*/

$thebuilt_theme_options = thebuilt_get_theme_options();

$related_filter = thebuilt_get_theme_data_value('related_filter');

$portfolio_posts_limit = $thebuilt_theme_options['portfolio_related_limit'];

if(isset($thebuilt_theme_options['portfolio_related_items_columns'])) {
  $related_columns = $thebuilt_theme_options['portfolio_related_items_columns'];
} else {
  $related_columns = 4;
}

if(isset($thebuilt_theme_options['portfolio_posts_item_hover_effect'])) {
  $item_hover_effect = $thebuilt_theme_options['portfolio_posts_item_hover_effect'];
} else {
  $item_hover_effect = 0;
}

$all_terms = get_terms( 'mgt_portfolio_filter' );

$temp = $wp_query;
$wp_query = null;

$data_item = 0;

$exclude_ids = array( get_the_ID() );

$wp_query = new WP_Query(array(
  'post_type' => 'mgt_portfolio',
  'mgt_portfolio_filter' => $related_filter,
  'posts_per_page' => $portfolio_posts_limit,
  'orderby'=> 'date',
  'post__not_in' => $exclude_ids
));

if($wp_query->have_posts()) {

?>
<div class="related-works">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-item-title">
          <h1><?php esc_html_e('More projects', 'thebuilt'); ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="portfolio-list portfolio-list-related clearfix portfolio-columns-<?php echo esc_attr($related_columns); ?>" id="portfolio-list">
  <?php

  while ($wp_query->have_posts()) : $wp_query->the_post();
    
    $data_item++;
    
    $portfolio_small = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thebuilt-portfolio-thumb-square' );

    $terms = get_the_terms( $post->ID , 'mgt_portfolio_filter' );

    $terms_count = count($terms);

    $terms_counter = 0;

    $terms_slug = '';

    $categories_html = '';

    foreach ( $terms ? $terms: array() as $term ) {

      if($terms_counter  < $terms_count - 1) {
        $categories_html.= $term->name.' / ';
      }
      else
      {
        $categories_html .= $term->name;
      }
      
      $terms_slug .= ' '.$term->slug;

      $terms_counter++;
    }

  ?>
  <div class="portfolio-item-block mix<?php echo esc_attr($terms_slug); ?> portfolio-item-animation-<?php echo esc_attr($item_hover_effect);?>" data-item="<?php echo esc_attr($data_item); ?>" data-name="<?php the_title(); ?>">
    <a href="<?php echo esc_url(get_permalink( $post->ID ));?>">
      <div class="portfolio-item-image" data-style="background-image: url('<?php echo esc_url($portfolio_small[0]); ?>')"></div>
      <div class="portfolio-item-bg"></div>
      <div class="info">
        <span class="sub-title"><?php echo esc_html($categories_html); ?></span>
        <h4 class="title"><?php the_title(); ?></h4>
      </div>
    </a>
  </div>

  <?php 
  if($data_item == 3){
    $data_item = 0;
  }

  endwhile; // end of the loop. 

  ?>
  </div>
  <?php
  echo '<script>(function($){
      $(document).ready(function() {

        $("#portfolio-list").mixItUp({effects:["'.esc_js($thebuilt_theme_options['portfolio_posts_animation_1']).'","'.esc_js($thebuilt_theme_options['portfolio_posts_animation_2']).'"],easing:"snap"});

      });})(jQuery);</script>';
  ?>
</div>
<?php
}
?>
    
<?php $wp_query = null; $wp_query = $temp;?>