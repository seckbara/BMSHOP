<?php
/** 
 * Plugin recomendations
 **/
$thebuilt_theme_options = thebuilt_get_theme_options();

require_once ('class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'thebuilt_register_required_plugins' );

function thebuilt_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
        array(
            'name'                  => 'TheBuilt Visual Page Builder', // The plugin name
            'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/js_composer.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '5.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        ),        
        array(
            'name'                  => 'TheBuilt Theme Addons', // The plugin name
            'slug'                  => 'thebuilt-theme-addons', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/thebuilt-theme-addons.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        ),
        array(
            'name'                  => 'TheBuilt Custom Metaboxes', // The plugin name
            'slug'                  => 'cmb2', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/cmb2.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.4.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        ),
        array(
            'name'                  => 'Revolution Slider', // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/revslider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '5.4.7.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        ),
        array(
            'name'                  => 'TheBuilt Widget Logic', // The plugin name
            'slug'                  => 'widget-logic', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => 'WordPress Breadcrumbs', // The plugin name
            'slug'                  => 'breadcrumb-navxt', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => 'WordPress LightBox', // The plugin name
            'slug'                  => 'responsive-lightbox', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/responsive-lightbox.2.0.4.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => 'WooCommerce (Shop)', // The plugin name
            'slug'                  => 'woocommerce', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => 'Contact Form 7', // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => 'Regenerate Thumbnails', // The plugin name
            'slug'                  => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => 'TheBuilt Translation Manager', // The plugin name
            'slug'                  => 'loco-translate', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        )

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => 'thebuilt',           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                          // Default absolute path to pre-packaged plugins
        'menu'              => 'install-required-plugins',  // Menu slug
        'has_notices'       => true,                        // Show admin notices or not
        'dismissable'  => true,
        'is_automatic'      => true,                       // Automatically activate plugins after installation or not
        'message'           => ''                          // Message to output right before the plugins table
    );

    tgmpa( $plugins, $config );

}

// Customisation Menu Links
class thebuilt_description_walker extends Walker_Nav_Menu{
      function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0 ){
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
           $class_names = $value = '';
           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
          
           $add_class = '';
           
           $post = get_post($item->object_id);          

               $class_names = ' class="'.$add_class.' '. esc_attr( $class_names ) . '"';
               $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
               $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
               $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
               $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

                    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';

                if (is_object($args)) {
                    $item_output = $args->before;
                    $item_output .= '<a'. $attributes .'>';
                    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
                    $item_output .= $args->link_after;
                    $item_output .= '</a>';
                    $item_output .= $args->after;
                    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

                }
     }
}

function thebuilt_google_fonts_url() {

    $thebuilt_theme_options = thebuilt_get_theme_options();

    $font_url = '';
    $font_header = '';
    $font_body = '';
    $font_additional = '';

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_font']) ) {
      $thebuilt_theme_options['header_font']['font-family'] = $_GET['header_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['body_font']) ) {
      $thebuilt_theme_options['body_font']['font-family'] = $_GET['body_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['additional_font']) ) {
      $thebuilt_theme_options['additional_font']['font-family'] = $_GET['additional_font'];
    }

    if(!isset($thebuilt_theme_options['font_google_disable']) || $thebuilt_theme_options['font_google_disable'] == false) {

        // Header font
        if(isset($thebuilt_theme_options['header_font'])) {
            $font_header = $thebuilt_theme_options['header_font']['font-family'];

            if(isset($thebuilt_theme_options['header_font_options'])) {
                $font_header = $font_header.':'.$thebuilt_theme_options['header_font_options'];
            }
        }
        // Body font
        if(isset($thebuilt_theme_options['body_font'])) {
            $font_body = '|'.$thebuilt_theme_options['body_font']['font-family'];

            if(isset($thebuilt_theme_options['body_font_options'])) {
                $font_body = $font_body.':'.$thebuilt_theme_options['body_font_options'];
            }
        }
        // Additional font
        if(isset($thebuilt_theme_options['additional_font_enable']) && $thebuilt_theme_options['additional_font_enable']) {
            if(isset($thebuilt_theme_options['additional_font'])) {
                $font_additional = '|'.$thebuilt_theme_options['additional_font']['font-family'].'|';
            }
        }

        // Build Google Fonts request
        $font_url = add_query_arg( 'family', urlencode( $font_header.$font_body.$font_additional ), "//fonts.googleapis.com/css" );

    }
    
    return $font_url;
}

// Custom layout functions
function thebuilt_header_left_show() {
    ?>
    <a class="logo-link" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php bloginfo('name'); ?>" class="regular-logo"><img src="<?php if ( get_theme_mod( 'thebuilt_header_transparent_logo' ) ) { echo esc_url( get_theme_mod( 'thebuilt_header_transparent_logo' )); } else { echo esc_url(get_header_image()); }  ?>" alt="<?php bloginfo('name'); ?>" class="light-logo"></a>
    <?php
}

function thebuilt_menu_top_show() {
    $thebuilt_theme_options = thebuilt_get_theme_options();

     // DEMO SETTINGS
    if ( defined('DEMO_MODE') && isset($_GET['disable_top_menu']) ) {
      $thebuilt_theme_options['disable_top_menu'] = true;
    }

    if(isset($thebuilt_theme_options['disable_top_menu']) && (!$thebuilt_theme_options['disable_top_menu'])): ?>

    <?php 

    // DEMO SETTINGS
    if ( defined('DEMO_MODE') && isset($_GET['top_menu_position']) ) {
      $thebuilt_theme_options['top_menu_position'] = esc_html($_GET['top_menu_position']);
    }

    $header_container_class = 'container';

    if(isset($thebuilt_theme_options['top_menu_position'])) {
         // DEMO SETTINGS
        if ( defined('DEMO_MODE') && isset($_GET['header_menu_layout']) ) {
          $thebuilt_theme_options['header_menu_layout'] = esc_html($_GET['header_menu_layout']);
        }
        
        if((isset($thebuilt_theme_options['header_menu_layout'])) && ($thebuilt_theme_options['header_menu_layout'] == 'menu_in_header')) {
            $add_class = ' top-menu-position-'.$thebuilt_theme_options['top_menu_position'];
        } else {
            $add_class = ' top-menu-position-default';

            if(isset($thebuilt_theme_options['header_fullwidth']) && $thebuilt_theme_options['header_fullwidth']) {
              $header_container_class = 'container-fluid';
            }

        }
        
    } else {
        $add_class = '';
    }

    

    ?>
    <div class="header-menu-bg<?php echo esc_attr($add_class); ?>">
      <div class="header-menu">
        <div class="<?php echo esc_attr($header_container_class); ?>">
          <div class="row">
            <div class="col-md-12">
                
            <div class="header-info-text">
            <?php 
            if((isset($thebuilt_theme_options['header_info_editor'])) && ($thebuilt_theme_options['header_info_editor'] <> '')) {
              echo wp_kses_post($thebuilt_theme_options['header_info_editor']);
            }
            ?>
            </div>
            <?php

            $s_count = 0;

            echo '<div class="social-icons-top"><ul>';

            $social_services_arr = Array("facebook", "vk","twitter", "google-plus", "behance", "linkedin", "dribbble", "instagram", "tumblr", "pinterest", "vimeo-square", "youtube", "skype", "houzz", "flickr", "odnoklassniki");

            foreach( $social_services_arr as $ss_data ){
              if(isset($thebuilt_theme_options[$ss_data]) && (trim($thebuilt_theme_options[$ss_data])) <> '') {
                $s_count++;
                $social_service_url = $thebuilt_theme_options[$ss_data];
                $social_service = $ss_data;
                echo '<li><a href="'.esc_url($social_service_url).'" target="_blank" class="a-'.esc_attr($social_service).'"><i class="fa fa-'.esc_attr($social_service).'"></i></a></li>';
              }
            }
            echo '</ul></div>';

            ?>
            <div class="menu-top-menu-container-toggle"></div>
            <?php
            wp_nav_menu(array(
            'theme_location'  => 'top',
            'menu_class'      => 'top-menu',
            'container_class'         => 'top-menu-container',
            ));
            ?>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif;
}

function thebuilt_menu_below_header_show() {
    $thebuilt_theme_options = thebuilt_get_theme_options();
    
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_layout']) ) {
      $thebuilt_theme_options['header_menu_layout'] = esc_html($_GET['header_menu_layout']);
    }
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_color_scheme']) ) {
      $thebuilt_theme_options['header_menu_color_scheme'] = esc_html($_GET['header_menu_color_scheme']);
    }
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_align']) ) {
      $thebuilt_theme_options['header_menu_align'] = esc_html($_GET['header_menu_align']);
    }
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_text_transform']) ) {
      $thebuilt_theme_options['header_menu_text_transform'] = esc_html($_GET['header_menu_text_transform']);
    }
     if ( defined('DEMO_MODE') && isset($_GET['header_menu_width']) ) {
      $thebuilt_theme_options['header_menu_width'] = esc_html($_GET['header_menu_width']);
    }

    // MainMenu Below header position
    if((isset($thebuilt_theme_options['header_menu_layout'])) && ($thebuilt_theme_options['header_menu_layout'] == 'menu_below_header')): 
    ?>
    <?php 
    if((isset($thebuilt_theme_options['header_menu_color_scheme'])) && ($thebuilt_theme_options['header_menu_color_scheme'] == 'menu_dark')) {
        $menu_add_class = ' mainmenu-dark';
    } else {
        $menu_add_class = ' mainmenu-light';
    }

    if((isset($thebuilt_theme_options['header_menu_align'])) && ($thebuilt_theme_options['header_menu_align'] == 'menu_center')) {
        $menu_add_class .= ' menu-center';
    }

    if((isset($thebuilt_theme_options['header_menu_text_transform'])) && ($thebuilt_theme_options['header_menu_text_transform'] == 'menu_uppercase')) {
        $menu_add_class .= ' menu-uppercase';
    }

    if((isset($thebuilt_theme_options['header_menu_width'])) && ($thebuilt_theme_options['header_menu_width'] == 'menu_boxed')) {
        $menu_add_class .= ' container';
    }

    ?>
    <div class="mainmenu-belowheader<?php echo esc_attr($menu_add_class); ?>">
    <?php
    // Main Menu

    $menu = wp_nav_menu(
        array (
            'theme_location'  => 'primary',
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        )
    );

    if (!empty($menu)):
    ?>
      <?php 
      $add_class = '';

      if(isset($thebuilt_theme_options['megamenu_enable']) && $thebuilt_theme_options['megamenu_enable']) {
        $add_class = " mgt-mega-menu";
      }
      ?>
        <div id="navbar" class="navbar navbar-default clearfix<?php echo esc_attr($add_class);?>">
          <div class="navbar-inner">
              <div class="container">
             
              <div class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                <?php esc_html_e( 'Menu', 'thebuilt' ); ?>
              </div>

              <?php
              if(isset($thebuilt_theme_options['megamenu_enable']) && $thebuilt_theme_options['megamenu_enable']) {
                wp_nav_menu(array(
                  'theme_location'  => 'primary',
                  'container_class' => 'navbar-collapse collapse',
                  'menu_class'      => 'nav',
                  'walker'          => new rc_scm_walker
                  )); 
              } else {
                 wp_nav_menu(array(
                  'theme_location'  => 'primary',
                  'container_class' => 'navbar-collapse collapse',
                  'menu_class'      => 'nav',
                  'walker'          => new thebuilt_description_walker
                  ));  
              }
              
              ?>
              </div>
          </div>
        </div>
      <?php endif; ?>

    </div>
    <?php 
    endif;
    // MainMenu Below header position END 
}

function thebuilt_header_center_show() {
  $thebuilt_theme_options = thebuilt_get_theme_options();

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_layout']) ) {
      $thebuilt_theme_options['header_menu_layout'] = $_GET['header_menu_layout'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['header_menu_text_transform']) ) {
      $thebuilt_theme_options['header_menu_text_transform'] = esc_html($_GET['header_menu_text_transform']);
    }

  if((isset($thebuilt_theme_options['header_info_2_editor'])) && (isset($thebuilt_theme_options['header_menu_layout'])) && ($thebuilt_theme_options['header_info_2_editor'] <> '') && ($thebuilt_theme_options['header_menu_layout'] == 'menu_below_header')){
    echo '<div class="header-info-2-text">'.wp_kses_post($thebuilt_theme_options['header_info_2_editor']).'</div>';
  }

  // MainMenu in Header position
  if((isset($thebuilt_theme_options['header_menu_layout'])) && ($thebuilt_theme_options['header_menu_layout'] == 'menu_in_header')): 
  ?>
    <?php
    // Main Menu

    $menu = wp_nav_menu(
        array (
            'theme_location'  => 'primary',
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        )
    );

    if (!empty($menu)):
    ?>
    <?php
    if(isset($thebuilt_theme_options['megamenu_enable']) && $thebuilt_theme_options['megamenu_enable']) {
        $add_class = " mgt-mega-menu";
    } else {
        $add_class = "";
    }

    if((isset($thebuilt_theme_options['header_menu_text_transform'])) && ($thebuilt_theme_options['header_menu_text_transform'] == 'menu_uppercase')) {
        $add_class .= ' menu-uppercase';
    }

    ?>
        <div id="navbar" class="navbar navbar-default clearfix<?php echo esc_attr($add_class); ?>">
          <div class="navbar-inner">

              <div class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                <?php esc_html_e( 'Menu', 'thebuilt' ); ?>
              </div>

              <?php
                if(isset($thebuilt_theme_options['megamenu_enable']) && $thebuilt_theme_options['megamenu_enable']) {
                    wp_nav_menu(array(
                      'theme_location'  => 'primary',
                      'container_class' => 'navbar-collapse collapse',
                      'menu_class'      => 'nav',
                      'walker'          => new rc_scm_walker
                      )); 
                } else {
                     wp_nav_menu(array(
                      'theme_location'  => 'primary',
                      'container_class' => 'navbar-collapse collapse',
                      'menu_class'      => 'nav',
                      'walker'          => new thebuilt_description_walker
                      ));  
                }
              ?>

          </div>
        </div>
   
    <?php endif; ?>
  <?php 
  endif;
  // MainMenu in Header position END

}

function thebuilt_header_right_show() {
    $thebuilt_theme_options = thebuilt_get_theme_options();

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['enable_offcanvas_sidebar']) ) {
      $thebuilt_theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
    }

    ?>
    <ul class="header-nav">
        <?php
            if(isset($thebuilt_theme_options['enable_fullscreen_search'])&&($thebuilt_theme_options['enable_fullscreen_search'])): 
        ?>
        <li class="search-toggle"><div id="trigger-search"><a class="search-toggle-btn"><i class="fa fa-search"></i></a></div></li>
        <?php endif; ?>
        <?php
            if(isset($thebuilt_theme_options['enable_offcanvas_sidebar'])&&($thebuilt_theme_options['enable_offcanvas_sidebar'])): 
        ?>
        <li class="float-sidebar-toggle"><div id="st-sidebar-trigger-effects"><a class="float-sidebar-toggle-btn" data-effect="st-sidebar-effect-2"><i class="fa fa-bars"></i></a></div></li>
        <?php endif; ?>

      
      </ul>
<?php
}

/* Blog post excerpt read more */
function thebuilt_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'thebuilt_excerpt_more');

/* Show breadcrumbs */
function thebuilt_show_breadcrumbs() {
    if(function_exists('bcn_display')):
    ?>
    <div class="breadcrumbs-container-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
              <?php bcn_display(); ?>
              </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif;
}

/**
 * Function for outputting a cmb2 file_list
 *
 * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
 * @param  string  $img_size           Size of image to show
 */
function thebuilt_cmb2_get_images_src( $post_id, $file_list_meta_key, $img_size = 'medium' ) {

    // Get the list of files
    $files = get_post_meta( $post_id, $file_list_meta_key, 1 );

    $attachments_image_urls_array = Array();

    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        
        $current_attach = wp_get_attachment_image_src( $attachment_id, $img_size );

        $attachments_image_urls_array[] = $current_attach[0];
     
    }

    if($attachments_image_urls_array[0] == '') {
        $attachments_image_urls_array = array();
    }
     
    return $attachments_image_urls_array;
    
}

// Set revslider as theme
if(function_exists( 'set_revslider_as_theme' )){

    add_action( 'init', 'thebuilt_setRevSlider_asTheme' );

    function thebuilt_setRevSlider_asTheme() {
        set_revslider_as_theme();
    }
}