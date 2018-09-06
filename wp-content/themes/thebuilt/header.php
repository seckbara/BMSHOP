<?php
/**
 * WP Theme Header
 *
 * Displays all of the <head> section
 *
 * @package TheBuilt
 */
$thebuilt_theme_options = thebuilt_get_theme_options();

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['header_logo_position']) ) {
  $thebuilt_theme_options['header_logo_position'] = esc_html($_GET['header_logo_position']);
}
if ( defined('DEMO_MODE') && isset($_GET['header_fullwidth']) ) {
  if($_GET['header_fullwidth'] == 0) {
    $thebuilt_theme_options['header_fullwidth'] = false;
  }
  if($_GET['header_fullwidth'] == 1) {
    $thebuilt_theme_options['header_fullwidth'] = true;
  }

}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php echo body_class(); ?>>

<?php do_action( 'before' ); ?>
<?php thebuilt_menu_top_show(); ?>
<?php

// Don't show special header menu layout depending on settings
if(isset($thebuilt_theme_options['header_menu_layout']) && $thebuilt_theme_options['header_menu_layout'] == "menu_below_header" ) {
  $thebuilt_theme_options['top_menu_position'] = "default";
}

if(isset($thebuilt_theme_options['top_menu_position']) && $thebuilt_theme_options['top_menu_position'] == "header" ) {
  $thebuilt_theme_options['header_logo_position'] = "left";
}

// Center logo
if(isset($thebuilt_theme_options['header_logo_position']) && $thebuilt_theme_options['header_logo_position'] == 'center') {
  $header_container_add_class = ' header-logo-center';
} else {
  $header_container_add_class = '';
}
if(isset($thebuilt_theme_options['header_fullwidth']) && $thebuilt_theme_options['header_fullwidth']) {
  $header_container_class = 'container-fluid';
} else {
  $header_container_class = 'container';
}

// Sticky header
if(isset($thebuilt_theme_options['enable_sticky_header']) && $thebuilt_theme_options['enable_sticky_header']) {
  $header_add_class = 'sticky-header main-header';
} else {
  $header_add_class = 'main-header';
}

// Sticky header elements
if(!isset($thebuilt_theme_options['sticky_header_elements'])) {
  $thebuilt_theme_options['sticky_header_elements'] = 'headeronly';
}

$header_add_class .= ' sticky-header-elements-'.esc_attr($thebuilt_theme_options['sticky_header_elements']);

?>
<header class="<?php echo esc_attr($header_add_class); ?>">
<div class="<?php echo esc_attr($header_container_class); ?><?php echo esc_attr($header_container_add_class); ?>">
  <div class="row">
    <div class="col-md-12">
     
      <div class="header-left logo">
        <?php
        // Center logo
        if(isset($thebuilt_theme_options['header_logo_position']) && $thebuilt_theme_options['header_logo_position'] == 'center'): ?>
          <?php thebuilt_header_center_show(); ?>
        <?php else: ?>
          <?php thebuilt_header_left_show(); ?>
        <?php endif;
        // Center logo END
        ?>
      </div>
      
      <div class="header-center">
      <?php 
      // Center logo
      if(isset($thebuilt_theme_options['header_logo_position']) && $thebuilt_theme_options['header_logo_position'] == 'center'):
      ?>
        <?php thebuilt_header_left_show(); ?>
      <?php else: ?>
        <?php thebuilt_header_center_show(); ?>
      <?php 
      endif; 
      // Center logo END
      ?>
      </div>

      <div class="header-right">
        <?php thebuilt_header_right_show(); ?>
      </div>
    </div>
  </div>
    
</div>
<?php thebuilt_menu_below_header_show(); ?>
</header>