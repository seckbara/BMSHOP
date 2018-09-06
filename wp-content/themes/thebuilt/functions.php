<?php
/**
 * TheBuilt functions
 *
 * @package TheBuilt
 */

/*
 *	@@@ iPanel Path Constant @@@
*/
define( 'IPANEL_PATH' , get_template_directory() . '/iPanel/' ); 

/*
 *	@@@ iPanel URI Constant @@@
*/
define( 'IPANEL_URI' , get_template_directory_uri() . '/iPanel/' );

/*
 *	@@@ Usage Constant @@@
*/
define( 'IPANEL_PLUGIN_USAGE' , false );

/*
 *	@@@ Include iPanel Main File @@@
*/
include_once IPANEL_PATH . 'iPanel.php';

// Get theme options globally
function thebuilt_get_theme_options() {
	if(get_option('THEBUILT_PANEL')) {
		$theme_options_data = maybe_unserialize(get_option('THEBUILT_PANEL'));
	} else {
		$theme_options_data = Array();
	}

	return $theme_options_data;
}

$thebuilt_theme_options = thebuilt_get_theme_options();

if (!isset($content_width))
	$content_width = 810; /* pixels */

if (!function_exists('thebuilt_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function thebuilt_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on TheBuilt, use a find and replace
	 * to change 'thebuilt' to the name of your theme in all the template files
	 */
	load_theme_textdomain('thebuilt', get_template_directory() . '/languages');

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support('automatic-feed-links');

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Enable support for Title Tag
	 *
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Logo
	 */
	add_theme_support( 'custom-header', array(
	    'default-image' =>  get_template_directory_uri() . '/img/logo.png',
            'width'         => 195,
            'flex-width'    => true,
            'flex-height'   => false,
            'header-text'   => false,
	));

	/**
	 *	Woocommerce support
	 */
	add_theme_support( 'woocommerce' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Product per page limit in WooCommerce
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

	/**
	 * Enable custom background support
	 */
	add_theme_support( 'custom-background' );
	/**
	 * Change customizer features
	 */
	add_action( 'customize_register', 'thebuilt_theme_customize_register' );
	function thebuilt_theme_customize_register( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );

		$wp_customize->add_setting( 'thebuilt_header_transparent_logo' , array(
		    array ( 'default' => '',
				    'sanitize_callback' => 'esc_url_raw'
				    ),
		    'transport'   => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'thebuilt_header_transparent_logo', array(
		    'label'    => esc_html__( 'Logo for Transparent Header (Light logo)', 'thebuilt' ),
		    'section'  => 'header_image',
		    'settings' => 'thebuilt_header_transparent_logo',
		) ) );
	}

	/**
	 * Theme image sizes
	 */
	add_image_size( 'thebuilt-blog-thumb', 1170, 660, true);
	add_image_size( 'thebuilt-blog-thumb-widget', 270, 152, true);

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
            'primary' => esc_html__('Main Menu', 'thebuilt'),
            'top' => esc_html__('Top Menu', 'thebuilt'),
            'footer' => esc_html__('Footer Menu', 'thebuilt'),
	) );
	/*
	* Change excerpt length
	*/
	function thebuilt_new_excerpt_length($length) {
		$thebuilt_theme_options = thebuilt_get_theme_options();

		if(isset($thebuilt_theme_options['post_excerpt_legth'])) {
			$post_excerpt_length = $thebuilt_theme_options['post_excerpt_legth'];
		} else {
			$post_excerpt_length = 30;
		}

		return $post_excerpt_length;
	}
	add_filter('excerpt_length', 'thebuilt_new_excerpt_length');
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support('post-formats', array('aside', 'image', 'gallery', 'video', 'audio', 'quote', 'link', 'status', 'chat'));
}
endif;
add_action('after_setup_theme', 'thebuilt_setup');

/**
 * Enqueue scripts and styles
 */
function thebuilt_scripts() {
	$thebuilt_theme_options = thebuilt_get_theme_options();

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');

	wp_enqueue_style( 'thebuilt-fonts', thebuilt_google_fonts_url(), array(), '1.0' );

	wp_enqueue_style('owl-main', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css');
	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/js/owl-carousel/owl.theme.css');

	wp_enqueue_style('thebuilt-stylesheet', get_stylesheet_uri(), array(), '1.2', 'all');

	wp_enqueue_style('thebuilt-responsive', get_template_directory_uri() . '/responsive.css', '1.0', 'all');

	if(isset($thebuilt_theme_options['enable_theme_animations']) && $thebuilt_theme_options['enable_theme_animations']) {
		wp_enqueue_style('thebuilt-animations', get_template_directory_uri() . '/css/animations.css');
	}

	if(isset($thebuilt_theme_options['megamenu_enable']) && $thebuilt_theme_options['megamenu_enable']) {
		wp_enqueue_style('thebuilt-mega-menu', get_template_directory_uri() . '/css/mega-menu.css');
		wp_enqueue_style('thebuilt-mega-menu-responsive', get_template_directory_uri() . '/css/mega-menu-responsive.css');
	}

	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style('thebuilt-select2', get_template_directory_uri() . '/js/select2/select2.css'); // Special modified version, must have theme prefix
	wp_enqueue_style('offcanvasmenu', get_template_directory_uri() . '/css/offcanvasmenu.css');
	wp_enqueue_style('nanoscroller', get_template_directory_uri() . '/css/nanoscroller.css');
	wp_enqueue_style('thebuilt-hover', get_template_directory_uri() . '/css/hover.css');

	add_thickbox();
	
	// Registering scripts to include it in correct order later
	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.1.1', true);
	wp_register_script('thebuilt-easing', get_template_directory_uri() . '/js/easing.js', array(), '1.3', true);
	wp_register_script('thebuilt-template', get_template_directory_uri() . '/js/template.js', array(), '1.0', true);
	wp_register_script('thebuilt-parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array(), '1.1.3', true);
	wp_register_script('thebuilt-select2', get_template_directory_uri() . '/js/select2/select2.min.js', array(), '3.5.1', true);// Special modified version, must have theme prefix
	wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array(), '1.3.3', true);
	wp_register_script('nanoscroller', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array(), '3.4.0', true);
	wp_register_script('mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array(), '2.1.7', true);

	wp_register_script('tweenmax', get_template_directory_uri() . '/js/TweenMax.min.js', array(), '1.0', true);
	wp_register_script('scrollorama', get_template_directory_uri() . '/js/jquery.superscrollorama.js', array(), '1.0', true);

	// Enqueue scripts in correct order
	wp_enqueue_script('thebuilt-script', get_template_directory_uri() . '/js/template.js', array('jquery', 'bootstrap', 'thebuilt-easing', 'thebuilt-parallax', 'thebuilt-select2', 'owl-carousel', 'nanoscroller', 'mixitup', 'tweenmax', 'scrollorama'), '1.2', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}
add_action('wp_enqueue_scripts', 'thebuilt_scripts');

// Title backward compatibility
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function thebuilt_render_title() {

	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php

	}

	add_action( 'wp_head', 'thebuilt_render_title' );
}

/**
 * Enqueue scripts and styles for admin area
 */
function thebuilt_admin_scripts() {
	wp_register_style( 'thebuilt-style-admin', get_template_directory_uri() .'/css/admin.css' );
	wp_enqueue_style( 'thebuilt-style-admin' );
	wp_register_style('font-awesome-admin', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'font-awesome-admin' );

	wp_register_script('thebuilt-template-admin', get_template_directory_uri() . '/js/template-admin.js', array(), '1.0', true);
	wp_enqueue_script('thebuilt-template-admin');

}
add_action( 'admin_init', 'thebuilt_admin_scripts' );

function thebuilt_load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'thebuilt_load_wp_media_files' );

/**
 * Theme Welcome message
 */
function thebuilt_show_admin_notice() {
    $current_screen = get_current_screen();
	$current_user = wp_get_current_user();

	if ( ! get_user_meta($current_user->ID, 'thebuilt_welcome_message_ignore') && ( current_user_can( 'install_plugins' ) ) && ( $current_screen->id == 'themes' ) ):
    ?>
    <div class="notice notice-success is-dismissible updated mgt-welcome-message">
    	<div class="mgt-welcome-message-show-steps"><div class="mgt-welcome-logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" style="height: 20px;" alt="<?php bloginfo('name'); ?>"></div><p class="about-description" style="display: inline-block;margin-bottom: 0; margin-top:3px;margin-right: 5px;"><?php esc_html_e('Follow this steps to setup your TheBuilt theme within minutes', 'thebuilt');?></p> <a class="button button-primary" id="mgt-welcome-message-show-steps"><?php esc_html_e('Show steps', 'thebuilt'); ?></a> <a class="button button-secondary" href="<?php echo esc_url( add_query_arg( 'thebuilt_welcome_message_dismiss', '0' ) );?>"><?php esc_html_e('Hide this message forever', 'thebuilt'); ?></a></div>
    	<div class="mgt-welcome-message-steps-wrapper">
	    	<h2><?php esc_html_e('Thanks for choosing TheBuilt WordPress theme', 'thebuilt'); ?></h2>
	        <p class="about-description"><?php esc_html_e('Follow this steps to setup your website within minutes:', 'thebuilt'); ?></p>
	    	<div class="mgt-divider"><a href="themes.php?page=install-required-plugins" class="button button-primary button-hero"><span class="button-step">1</span><?php esc_html_e('Install required & recommended plugins', 'thebuilt'); ?></a></div>
	    	<div class="mgt-divider"><a href="themes.php?page=radium_demo_installer" class="button button-primary button-hero"><span class="button-step">2</span><?php esc_html_e('Use 1-Click Demo Data Import', 'thebuilt'); ?></a></div>
	    	<div class="mgt-divider"><a href="themes.php?page=ipanel_THEBUILT_PANEL" class="button button-primary button-hero"><span class="button-step">3</span><?php esc_html_e('Manage theme options', 'thebuilt'); ?></a></div>
	    	<div class="mgt-divider"><a href="http://magniumthemes.com/go/thebuilt-docs/" target="_blank" class="button button-secondary button-hero"><span class="button-step">4</span><?php esc_html_e('Read Theme Documentation Guide', 'thebuilt'); ?></a></div>
			<div class="mgt-divider"><a href="http://magniumthemes.com/how-to-rate-items-on-themeforest/" target="_blank" class="button button-secondary button-hero"><span class="button-step">5</span><?php esc_html_e('Rate our Theme if you enjoy it!', 'thebuilt'); ?></a><a id="mgt-dismiss-notice" class="button-secondary" href="<?php echo esc_url( add_query_arg( 'mgt_welcome_message_dismiss', '0' ) );?>"><?php esc_html_e('Hide this message', 'thebuilt'); ?></a></div>
    	</div>
    </div>
    <?php
	endif;
}

if(!defined('ENVATO_HOSTED_SITE')) {
	add_action( 'admin_notices', 'thebuilt_show_admin_notice' );
}

function thebuilt_welcome_message_dismiss() {
	$current_user = wp_get_current_user();
    $user_id = $current_user->ID;

    /* If user clicks to ignore the notice, add that to their user meta */
    if ( isset($_GET['thebuilt_welcome_message_dismiss']) && '0' == $_GET['thebuilt_welcome_message_dismiss'] ) {
	    add_user_meta($user_id, 'thebuilt_welcome_message_ignore', 'true', true);
	}
}
add_action( 'admin_init', 'thebuilt_welcome_message_dismiss' );

// Set/Get current data details for global usage in templates (post position in loop, etc)
function thebuilt_set_theme_data($data) {
	global $thebuilt_theme_data;

	$thebuilt_theme_data = $data;
}
function thebuilt_get_theme_data() {
	global $thebuilt_theme_data;

	return $thebuilt_theme_data;
}
function thebuilt_get_theme_data_value($name) {
	global $thebuilt_theme_data;

	if(isset($thebuilt_theme_data[$name])) {
		$value = $thebuilt_theme_data[$name];
	} else {
		$value = '';
	}

	return $value;
}

// Stop WordPress removing tags
function thebuilt_tinymce_fix( $init )
{

    $init['extended_valid_elements'] = 'div[*],br,i[*]';

    return $init;
}
add_filter('tiny_mce_before_init', 'thebuilt_tinymce_fix');

// Change read more link
add_filter( 'the_content_more_link', 'thebuilt_read_more_link' );
function thebuilt_read_more_link() {
	return '<a class="btn more-link mgt-button mgt-style-solid-invert mgt-size-small" href="' . esc_url(get_permalink()) . '">'.esc_html__('Read more', 'thebuilt').'</a>';
}

/**
 * Custom mega menu
 */
if(isset($thebuilt_theme_options['megamenu_enable']) && $thebuilt_theme_options['megamenu_enable']) {
	require get_template_directory() . '/inc/mega-menu/custom-menu.php';
}


/**
 * Ajax registration PHP
 */
if (!function_exists('thebuilt_registration_process_callback')) :
function thebuilt_registration_process_callback() {
	$email = esc_html($_POST['email']);
	$code = esc_html($_POST['code']);
	$subscribe = $_POST['subscribe'];

	update_option('envato_purchase_code_thebuilt', $code);

	echo wp_kses_post($email.';'.$code.';'.get_option('admin_email').';'.wp_get_theme().';'.get_site_url().';'.$subscribe);

	wp_die();
}
add_action('wp_ajax_thebuilt_registration_process', 'thebuilt_registration_process_callback');
endif;

/**
 * Ajax registration JS
 */
if (!function_exists('thebuilt_registration_javascript')) :
function thebuilt_registration_javascript() {
  ?>
  <script type="text/javascript" >
  (function($){
  $(document).ready(function($) {

	$('.theme-activation-wrapper .activate-theme-btn').on('click', function(e){

		var email = $('.theme-activation-wrapper .activate-theme-email').val();
		var code = $('.theme-activation-wrapper .activate-theme-code').val();
		var subscribe = $('.theme-activation-wrapper .activate-theme-subscribe').attr('checked');

		if(subscribe == 'checked') {
			subscribe = 1;
		} else {
			subscribe = 0;
		}

		if(email == '' || code == '') {
			$('.theme-activation-wrapper .theme-activation-message').html('<span class="error"><?php esc_html_e('Please fill out email and purchase code fields.', 'thebuilt'); ?></span>');
		} else {
			$('.theme-activation-wrapper .activate-theme-btn').attr('disabled', 'disabled').removeClass('button-primary').addClass('button-secondary');

			$('.theme-activation-wrapper .theme-activation-message').html('<?php esc_html_e('Registering theme...', 'thebuilt'); ?>');

			var data = {
		      action: 'thebuilt_registration_process',
		      email: email,
		      code: code,
		      subscribe: subscribe,
		    };

			$.post( ajaxurl, data, function(response) {

		      var wpdata = response;

			  $.ajax({
			    url: "//api.magniumthemes.com/activation.php?act=register&data="+wpdata,
			    type: "GET",
			    timeout: 10000,
			    success: function(data) { 
			    	if(data == 'verified') {
						
						$('.theme-activation-wrapper .theme-activation-message').html('<span class="success"><?php esc_html_e('Theme registered succesfully!', 'thebuilt'); ?></span><br/><br>');

						window.location = "themes.php?page=ipanel_THEBUILT_PANEL&act=registration_complete";


					} else {
						$('.theme-activation-wrapper .theme-activation-message').html('<span class="error"><?php esc_html_e('Purchase code is not valid. Your purchase code should look like this: 36434418-e837-48c5-8737-f20d52b36a1f', 'thebuilt'); ?></span>');

						$('.theme-activation-wrapper .activate-theme-btn').removeAttr('disabled', 'disabled').removeClass('button-secondary').addClass('button-primary');

					}
			    },
			    error: function(xmlhttprequest, textstatus, message) {
			        $('.theme-activation-wrapper .theme-activation-message').html("<?php echo wp_kses_post(__("<span class='error'>Oops! It looks like the your hosting blocks external connections to our server.<br/>Please click the button below to skip activation for 1 day and start using all theme features right now. <br/>Please <a href='http://support.magniumthemes.com/' target='_blank'>contact our support team</a> to get theme activated manually.</span><br><a href='themes.php?page=ipanel_THEBUILT_PANEL&act=registration_skip' class='button button-primary button-hero activate-theme-btn'>Start using theme</a>", 'thebuilt')); ?>");
			    }
			  });
		      	
		    });

	  	}

		
    });

  });
  })(jQuery);
  </script>
  <?php
}
add_action('admin_print_footer_scripts', 'thebuilt_registration_javascript', 99);
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/theme-tags.php';

/**
 * Load theme functions.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Load theme widgets.
 */
require get_template_directory() . '/inc/theme-widgets.php';

/**
 * Load theme dynamic CSS.
 */
require get_template_directory() . '/inc/theme-css.php';

/**
 * Load theme dynamic JS.
 */
require get_template_directory() . '/inc/theme-js.php';