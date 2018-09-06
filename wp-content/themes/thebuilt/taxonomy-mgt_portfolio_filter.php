<?php
/**
 * The template used for displaying mgt_portfolio_filter taxonomy page
 *
 * @package TheBuilt
 */

$thebuilt_theme_options = thebuilt_get_theme_options();

if(isset($thebuilt_theme_options['portfolio_page_url']) && $thebuilt_theme_options['portfolio_page_url']!=='') {
  $portfolio_page_url = $thebuilt_theme_options['portfolio_page_url'];
} else {
  $portfolio_page_url = home_url();
}

wp_redirect( esc_url($portfolio_page_url) ); exit;

?>