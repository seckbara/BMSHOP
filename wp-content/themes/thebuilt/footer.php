<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package TheBuilt
 */
?>
<?php 
$thebuilt_theme_options = thebuilt_get_theme_options();

$show_footer_sidebar_1 = true;

if(isset($thebuilt_theme_options['footer_sidebar_1_homepage_only']) && ($thebuilt_theme_options['footer_sidebar_1_homepage_only']) && is_front_page()) {
  $show_footer_sidebar_1 = true;
} 
if(isset($thebuilt_theme_options['footer_sidebar_1_homepage_only']) && ($thebuilt_theme_options['footer_sidebar_1_homepage_only']) && !is_front_page()) {
  $show_footer_sidebar_1 = false;
}
?>
<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
  <?php if($show_footer_sidebar_1): ?>
  <div class="footer-sidebar sidebar container">
    <ul id="footer-sidebar">
      <?php dynamic_sidebar( 'footer-sidebar' ); ?>
    </ul>
  </div>
  <?php endif; ?>
<?php endif; ?>
<div class="container-fluid container-fluid-footer">
<div class="row">
<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
<div class="footer-sidebar-2-wrapper">
  <div class="footer-sidebar-2 sidebar container footer-container">
    <ul id="footer-sidebar-2" class="clearfix">
      <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
    </ul>
  </div> 
</div>
<?php endif; ?>

<footer>
<div class="container">
<div class="row">
    <div class="col-md-6 footer-copyright">
    <?php
    if(isset($thebuilt_theme_options['footer_copyright_editor'])) {
      echo wp_kses_post($thebuilt_theme_options['footer_copyright_editor']); 
    }
    ?>
    </div>
    <div class="col-md-6 footer-menu">
    <?php
      wp_nav_menu(array(
        'theme_location'  => 'footer',
        'menu_class'      => 'footer-menu'
        ));
    ?>
    </div>
</div>
</div>
<a id="top-link" href="#top"><span><?php _ex('Top', '', 'thebuilt');?></span></a>
</footer>

</div>
</div>
<?php

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['enable_offcanvas_sidebar']) ) {
  $thebuilt_theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
}

if(isset($thebuilt_theme_options['enable_offcanvas_sidebar'])&&($thebuilt_theme_options['enable_offcanvas_sidebar'])): 
?>
<nav id="offcanvas-sidebar-nav" class="st-sidebar-menu st-sidebar-effect-2">
<div class="st-sidebar-menu-close-btn"><i class="fa fa-times"></i></div>
  <?php if ( is_active_sidebar( 'offcanvas-sidebar' ) ) : ?>
    <div class="offcanvas-sidebar sidebar">
    <ul id="offcanvas-sidebar" class="clearfix">
      <?php dynamic_sidebar( 'offcanvas-sidebar' ); ?>
    </ul>
    </div>
  <?php endif; ?>
</nav>
<?php endif; ?>
<?php if(isset($thebuilt_theme_options['enable_fullscreen_search'])&&($thebuilt_theme_options['enable_fullscreen_search'])): ?>
<div class="search-fullscreen-wrapper">
  <div class="search-fullscreen-form">
    <div class="search-close-btn"><i class="fa fa-times"></i></div>
    <?php get_template_part( 'searchform-popup' ); ?>
  </div>
</div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>