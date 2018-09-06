<?php

	add_action( 'wp_enqueue_scripts', 'thebuilt_enqueue_dynamic_styles', '999' );

	function thebuilt_enqueue_dynamic_styles( ) {
		
        require_once(ABSPATH . 'wp-admin/includes/file.php'); // required to use WP_Filesystem()

        WP_Filesystem();

        $thebuilt_theme_options = thebuilt_get_theme_options();
        global $wp_filesystem;

        if ( function_exists( 'is_multisite' ) && is_multisite() ){
            $cache_file_name = 'style-cache-'.wp_get_theme()->get('TextDomain').'-b' . get_current_blog_id();
        } else {
            $cache_file_name = 'style-cache-'.wp_get_theme()->get('TextDomain');
        }

        $wp_upload_dir = wp_upload_dir();

        $css_cache_file = $wp_upload_dir['basedir'].'/'.$cache_file_name.'.css';

        $css_cache_file_url = $wp_upload_dir['baseurl'].'/'.$cache_file_name.'.css';

        $ipanel_saved_date = get_option( 'ipanel_saved_date', 1 );
        $cache_saved_date = get_option( 'cache_css_saved_date', 0 );

        if( file_exists( $css_cache_file ) ) {
            $cache_status = 'exist';

            if($ipanel_saved_date > $cache_saved_date) {
                $cache_status = 'no-exist';
            }

        } else {
            $cache_status = 'no-exist';
        }

        if ( defined('DEMO_MODE') ) {
            $cache_status = 'no-exist';
        }

        if ( $cache_status == 'exist' ) {

            wp_register_style( $cache_file_name, $css_cache_file_url, $cache_saved_date);
            wp_enqueue_style( $cache_file_name );

        } else {
            
            $out = '';

            $generated = microtime(true);

            $out = thebuilt_get_css();
    
            $out = str_replace( array( "\t", "
", "\n", "  ", "   ", ), array( "", "", " ", " ", " ", ), $out );

            $out .= '/* CSS Generator Execution Time: ' . floatval( ( microtime(true) - $generated ) ) . ' seconds */';

            // FS_CHMOD_FILE required by WordPress guideliness - https://codex.wordpress.org/Filesystem_API#Using_the_WP_Filesystem_Base_Class
            if ( $wp_filesystem->put_contents( $css_cache_file, $out, FS_CHMOD_FILE) ) {
            
                wp_register_style( $cache_file_name, $css_cache_file_url, $cache_saved_date);
                wp_enqueue_style( $cache_file_name );

                // Update save options date
                $option_name = 'cache_css_saved_date';
                
                $new_value = microtime(true) ;

                if ( get_option( $option_name ) !== false ) {

                    // The option already exists, so we just update it.
                    update_option( $option_name, $new_value );

                } else {

                    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                    $deprecated = null;
                    $autoload = 'no';
                    add_option( $option_name, $new_value, $deprecated, $autoload );
                }
            }
        
        }
	}

	function thebuilt_get_css () {
		$thebuilt_theme_options = thebuilt_get_theme_options();
		// ===
		ob_start();
    ?>
    <?php
    if ( defined('DEMO_MODE') && isset($_GET['header_height']) ) {
      $thebuilt_theme_options['header_height'] = $_GET['header_height'];
    }

    if(isset($thebuilt_theme_options['header_height']) && $thebuilt_theme_options['header_height'] > 0) {
        $header_height = $thebuilt_theme_options['header_height'];
    } else {
        $header_height = 110;
    } 
    ?>
    header .col-md-12 {
        height: <?php echo intval($header_height); ?>px;
    }
    <?php
    // Retina logo
    
    ?>
    header .logo-link img {
        width: <?php if(isset($thebuilt_theme_options['logo_width'])) { echo intval($thebuilt_theme_options['logo_width']); } else { echo '198'; } ?>px;
    }
    #preloader-image img {
        width: <?php if(isset($thebuilt_theme_options['preloader_width'])) { echo intval($thebuilt_theme_options['preloader_width']); } else { echo '100'; } ?>px;
    }
    <?php if(isset($thebuilt_theme_options['enable_parallax']) && $thebuilt_theme_options['enable_parallax']): ?>
        .fullwidth-section.parallax,
        .parallax {
            background-attachment: fixed!important;
        }
    <?php endif; ?>
    
    /**
    * Custom CSS
    **/
    <?php if(isset($thebuilt_theme_options['custom_css_code'])) { 

        echo ($thebuilt_theme_options['custom_css_code']); // This variable contains user Custom CSS code and can't be escaped with WordPress functions

    } 
    ?>
    
    /** 
    * Theme Google Font
    **/
    <?php 
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

        if(isset($thebuilt_theme_options['font_google_disable']) && $thebuilt_theme_options['font_google_disable']) {

            $thebuilt_theme_options['body_font']['font-family'] = $thebuilt_theme_options['font_regular'];
            $thebuilt_theme_options['header_font']['font-family'] = $thebuilt_theme_options['font_regular'];
            $thebuilt_theme_options['additional_font']['font-family'] = $thebuilt_theme_options['font_regular'];
        }
    ?>
    h1, h2, h3, h4, h5, h6 {
        font-family: '<?php echo esc_attr($thebuilt_theme_options['header_font']['font-family']); ?>';
    }
    .header-info-2-text .header-info-half .header-info-content-title,
    a.btn, .btn, .btn:focus, input[type="submit"], .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce a.added_to_cart, .woocommerce-page a.added_to_cart,
    .mgt-header-block p,
    .mgt-post-list .mgt-post-categories,
    .mgt-counter-wrapper .mgt-counter-value,
    .mgt-counter-wrapper h5.mgt-counter-title,
    .mgt-cta-block h5,
    .mgt-cta-block .mgt-cta-block-content,
    .mgt-countdown-wrapper .mgt-countdown-item,
    .sidebar.main-sidebar .widget.widget_nav_menu li,
    .widget-download-link-wrapper,
    .blog-post .post-categories,
    .blog-post .tags,
    .post-social-wrapper span,
    .author-bio .author-title,
    .comment-meta .reply a,
    .comment-metadata .author,
    .comment-metadata .date,
    .woocommerce ul.products li.product, 
    .woocommerce-page ul.products li.product,
    .woocommerce ul.products li.product .onsale,
    .woocommerce span.onsale,
    .sidebar .widget.widget_thebuilt_recent_entries li .widget-post-details-wrapper {
        font-family: '<?php echo esc_attr($thebuilt_theme_options['header_font']['font-family']); ?>';
    }
    h1 {
        font-size: <?php echo esc_attr($thebuilt_theme_options['header_font']['font-size']); ?>px;
    }
    body {
        font-family: '<?php echo esc_attr($thebuilt_theme_options['body_font']['font-family']); ?>';
        font-size: <?php echo esc_attr($thebuilt_theme_options['body_font']['font-size']); ?>px;
    }
    <?php if(isset($thebuilt_theme_options['additional_font_enable']) && $thebuilt_theme_options['additional_font_enable']): ?>
    .mgt-promo-block .mgt-promo-block-content strong,
    .thebuilt-slide strong {
        font-family: '<?php echo esc_attr($thebuilt_theme_options['additional_font']['font-family']); ?>';
    }
    <?php endif; ?>
    /**
    * Colors and color skins
    */
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['color_skin_name']) ) {
      $thebuilt_theme_options['color_skin_name'] = $_GET['color_skin_name'];
    }

    if(!isset($thebuilt_theme_options['color_skin_name'])) {
        $color_skin_name = 'none';
    }
    else {
        $color_skin_name = $thebuilt_theme_options['color_skin_name'];
    }
    // Use panel settings
    if($color_skin_name == 'none') {

        $theme_body_color = $thebuilt_theme_options['theme_body_color'];
        $theme_text_color = $thebuilt_theme_options['theme_text_color'];
        $theme_main_color = $thebuilt_theme_options['theme_main_color'];
        $theme_header_bg_color = $thebuilt_theme_options['theme_header_bg_color'];
        $theme_top_menu_bg_color = $thebuilt_theme_options['theme_top_menu_bg_color'];
        $theme_top_menu_color = $thebuilt_theme_options['theme_top_menu_color'];
        $theme_main_menu_bg_color = $thebuilt_theme_options['theme_main_menu_bg_color'];
        $theme_main_menu_dark_bg_color = $thebuilt_theme_options['theme_main_menu_dark_bg_color'];
        $theme_footer_sidebar_bg_color = $thebuilt_theme_options['theme_footer_sidebar_bg_color'];
        $theme_footer_bg_color = $thebuilt_theme_options['theme_footer_bg_color'];
        $theme_title_color = $thebuilt_theme_options['theme_title_color'];

    }
    // Default skin
    if($color_skin_name == 'default') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#FBBE3F';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }
    // Green skin
    if($color_skin_name == 'green') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#79C852';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }
    // Blue skin
    if($color_skin_name == 'blue') { 
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#5a7e9f';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }
    // Purple skin
    if($color_skin_name == 'purple') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#5d89f9';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }
    // Red skin
    if($color_skin_name == 'red') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#F3403F';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';

    }
    // Black&White skin
    if($color_skin_name == 'blackandwhite') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#999a9d';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }

    // Orange skin
    if($color_skin_name == 'orange') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#e3e002';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }
    // Fencer skin
    if($color_skin_name == 'fencer') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#26cdb3';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }
    // Perfectum skin
    if($color_skin_name == 'perfectum') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#F2532F';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }
    // Simplegreat skin
    if($color_skin_name == 'simplegreat') {
        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#2A2F35';
        $theme_main_color = '#C3A36B';
        $theme_header_bg_color = '#FFFFFF';
        $theme_top_menu_bg_color = '#F5F5F5';
        $theme_top_menu_color = '#828282';
        $theme_main_menu_bg_color = '#FFFFFF';
        $theme_main_menu_dark_bg_color = '#2A2F35';
        $theme_footer_sidebar_bg_color = '#2A2F35';
        $theme_footer_bg_color = '#1C2126';
        $theme_title_color = '#2A2F35';
    }

    ?>
    body {
        background-color: <?php echo esc_html($theme_body_color); ?>;
        color: <?php echo esc_html($theme_text_color); ?>;
    }
    .st-pusher, 
    .st-sidebar-pusher {
        background-color: <?php echo esc_html($theme_body_color); ?>;
    }
    a.btn,
    .btn,
    .btn:focus,
    input[type="submit"],
    .woocommerce #content input.button, 
    .woocommerce #respond input#submit, 
    .woocommerce a.button, 
    .woocommerce button.button,
    .woocommerce input.button, 
    .woocommerce-page #content input.button, 
    .woocommerce-page #respond input#submit, 
    .woocommerce-page a.button, 
    .woocommerce-page button.button, 
    .woocommerce-page input.button, 
    .woocommerce a.added_to_cart, 
    .woocommerce-page a.added_to_cart,
    .btn-primary:hover,
    .btn-primary:active,
    header.main-header.top-menu-position-header .header-left,
    .navbar .navbar-toggle,
    .nav .sub-menu li.menu-item > a:hover,
    .mainmenu-belowheader .navbar .nav > li.mgt-highlight > a,
    .blog-post .tags a:hover,
    #top-link,
    .sidebar .widget_calendar th,
    .sidebar .widget_calendar tfoot td,
    .sidebar.main-sidebar .widget.widget_nav_menu .current-menu-item > a,
    body .flex-control-paging li a.flex-active,
    body .flex-control-paging li a:hover,
    .mgt-header-block .mgt-header-line,
    .mgt-post-list .mgt-post-icon,
    .mgt-post-list .mgt-post-wrapper-icon:hover,
    .mgt-icon-box.mgt-icon-background:hover .mgt-icon-box-icon,
    .mgt-button.mgt-style-solid-invert:hover,
    .mgt-button.mgt-style-bordered:hover,
    .mgt-button.mgt-style-borderedwhite:hover,
    .mgt-button.mgt-style-borderedgrey:hover,
    .mgt-button.mgt-style-grey:hover,
    .mgt-button.mgt-style-green:hover,
    .mgt-button.mgt-style-red:hover,
    .portfolio-filter a:hover, 
    .portfolio-filter a.active,
    .portfolio-item-block.portfolio-item-animation-0 .portfolio-item-bg,
    .portfolio-item-block .btn:hover,
    .mgt-pricing-table.featured h4.mgt-pricing-table-header,
    body .vc_tta-color-black.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a,
    .mgt-button.hvr-sweep-to-right:hover,
    .mgt-button.hvr-sweep-to-left:hover,
    .mgt-button.hvr-sweep-to-bottom:hover,
    .mgt-button.hvr-sweep-to-top:hover,
    .mgt-button.hvr-bounce-to-right:hover,
    .mgt-button.hvr-bounce-to-left:hover,
    .mgt-button.hvr-bounce-to-bottom:hover,
    .mgt-button.hvr-bounce-to-top:hover,
    .mgt-button:before,
    .mgt-post-list .mgt-post-categories,
    .blog-post .post-categories,
    .mgt-icon-box.mgt-icon-background.mgt-icon-background-invert .mgt-icon-box-icon,
    body .vc_tta-color-black.vc_tta-style-classic .vc_tta-tab.vc_active > a,
    .woocommerce ul.products li.product .onsale,
    .woocommerce span.onsale,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
    .woocommerce #payment #place_order, 
    .woocommerce-page #payment #place_order,
    .portfolio-filter a.view-all:hover, 
    .portfolio-filter a:hover, .portfolio-filter a.active {
        background-color: <?php echo esc_html($theme_main_color); ?>;
    }
    a,
    a:focus,
    .breadcrumbs-container-wrapper a:hover,
    .page-404 h1,
    header.main-header.top-menu-position-header .nav > li > a:hover,
    header.main-header.top-menu-position-header .nav > li.current-menu-item:not(.pull-right) > a,
    header.main-header.top-menu-position-header .header-right ul.header-nav a:hover,
    header.main-header.top-menu-position-header .header-menu .social-icons-top a:hover,
    header .header-right ul.header-nav a:hover,
    .header-info-2-text .header-info-half .header-info-content-text,
    .navbar .nav > li.current-menu-item:not(.pull-right) > a,
    header.transparent-header .navbar .nav > li > a:hover,
    header.transparent-header .navbar .nav > li.current-menu-item:not(.pull-right) > a,
    .navbar .nav > li > a:hover,
    .navbar .nav > li.current-menu-item:not(.pull-right) > a,
    header.transparent-header .mainmenu-belowheader.mainmenu-light .navbar .nav > li:not(.pull-right) > a:hover,
    header.transparent-header .mainmenu-belowheader.mainmenu-light .navbar .nav > li.current-menu-item:not(.pull-right) > a,
    .mainmenu-belowheader.mainmenu-light .navbar .nav > li > a:hover,
    .mainmenu-belowheader.mainmenu-dark .navbar .nav > li.current-menu-item:not(.pull-right) > a,
    .header-menu-bg.transparent-header .header-menu .social-icons-top a:hover,
    .header-menu-bg.transparent-header .header-menu .top-menu li a:hover,
    .header-menu .social-icons-top a:hover,
    .header-menu .top-menu li a:hover,
    .header-menu .top-menu .sub-menu li a:hover,
    .blog-post .post-header-title a:hover,
    .post-social-title i,
    .post-social a:hover,
    .navigation-paging a:hover,
    footer a:hover,
    .sidebar.footer-container .widget a:not(.select2-choice):hover,
    .footer-sidebar-2-wrapper .sidebar.footer-container .widget.widget_calendar tbody td a:hover,
    .widget-download-link-wrapper .widget-download-icon,
    .widget-download-link-wrapper .widget-download-title a:hover,
    .sidebar .widget.widget_thebuilt_recent_entries li .widget-post-details-wrapper .post-title a:hover,
    .woocommerce ul.products li.product .price,
    .woocommerce ul.products li.product h2:hover,
    .woocommerce div.product p.price, 
    .woocommerce div.product span.price,
    .comment-meta .reply a:hover,
    .mgt-promo-block .mgt-promo-block-content i.fa,
    .mgt-post-list .mgt-post-details .mgt-post-title h5:hover,
    .mgt-icon-box .mgt-icon-box-icon,
    .mgt-button.mgt-style-bordered,
    .mgt-button.mgt-style-text,
    .mgt-button.mgt-style-textwhite,
    .mgt-button.mgt-style-bordered:active,
    .mgt-button.mgt-style-text:active,
    .mgt-button.mgt-style-textwhite:active,
    .mgt-button.mgt-style-bordered:focus,
    .mgt-button.mgt-style-text:focus,
    .mgt-button.mgt-style-textwhite:focus,
    .mgt-counter-wrapper .mgt-counter-icon,
    .portfolio-filter a.view-all,
    .portfolio-item-block .btn,
    body .st-sidebar-menu .sidebar a:hover,
    .wpcf7-form .wpcf7-submit:hover,
    .ninja-forms-cont input[type="submit"]:hover,
    .nav .sub-menu > li.menu-item.current-menu-item > a,
    .content-block .widget_archive ul li a:hover,
    .content-block .widget_categories ul li a:hover,
    body .select2-drop,
    .woocommerce.widget.widget_product_categories a:hover,
    .woocommerce ul.products li.product .added_to_cart:hover,
    .text-color-theme,
    .text-color-theme * {
        color: <?php echo esc_html($theme_main_color); ?>;
    }
    blockquote,
    .post-social a:hover,
    .sidebar .widget_calendar tbody td a,
    .widget-download-link-wrapper,
    body .owl-theme .owl-controls .owl-page.active span, 
    body .owl-theme .owl-controls.clickable .owl-page:hover span,
    .mgt-button.mgt-style-bordered,
    .mgt-button.mgt-style-bordered:active,
    .mgt-button.mgt-style-bordered:focus,
    .mgt-button.mgt-style-bordered:hover,
    .mgt-button.mgt-style-borderedwhite:hover,
    .mgt-button.mgt-style-borderedgrey:hover,
    .mgt-button.mgt-style-green:hover,
    .mgt-button.mgt-style-red:hover,
    .portfolio-item-block .btn,
    .portfolio-item-block .btn:hover {
        border-color: <?php echo esc_html($theme_main_color); ?>;
    }
    header.main-header {
        background-color: <?php echo esc_html($theme_header_bg_color); ?>;
    }
    .header-menu-bg {
        background-color: <?php echo esc_html($theme_top_menu_bg_color); ?>;
    }
    .header-menu,
    .header-menu .social-icons-top a,
    .header-menu .top-menu li a,
    .header-menu .menu-top-menu-container-toggle {
        color: <?php echo esc_html($theme_top_menu_color); ?>;
    }
    .mainmenu-belowheader.mainmenu-light {
        background-color: <?php echo esc_html($theme_main_menu_bg_color); ?>;
    }
    .mainmenu-belowheader.mainmenu-dark {
        background-color: <?php echo esc_html($theme_main_menu_dark_bg_color); ?>;
    }
    .footer-sidebar-2-wrapper {
        background-color: <?php echo esc_html($theme_footer_sidebar_bg_color); ?>;
    }
    footer {
        background-color: <?php echo esc_html($theme_footer_bg_color); ?>;
    }
    .page-item-title h1 {
        color: <?php echo esc_html($theme_title_color); ?>;
    }
    
    <?php

    	$out = ob_get_clean();

		$out .= ' /*' . date("Y-m-d H:i") . '*/';
		/* RETURN */
		return $out;
	}
?>
