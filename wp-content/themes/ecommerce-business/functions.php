<?php

/**
 * Enqueue style files.
 * @return [type] [description]
 */
function ecommerce_business_styles() {
	// Parent theme CSS.
    wp_enqueue_style( 'di-business-style-default', get_template_directory_uri() . '/style.css' );

    // This child theme css.
    wp_enqueue_style( 'ecommerce-business-style',  get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap', 'font-awesome', 'di-business-style-default', 'di-business-style-core' ), wp_get_theme()->get('Version'), 'all');
}
add_action( 'wp_enqueue_scripts', 'ecommerce_business_styles' );

/**
 * Default a color.
 * @param  [type] $default_a_color [description]
 * @return [type]                  [description]
 */
function ecommerce_business_default_a_color( $default_a_color ) {
	$default_a_color = '#cc9900';
	return $default_a_color;
}
add_filter( 'di_business_default_a_color', 'ecommerce_business_default_a_color' );

/**
 * Woo onsale lbl bg clr.
 * @param  [type] $woo_onsale_lbl_bg_clr [description]
 * @return [type]                        [description]
 */
function ecommerce_business_woo_onsale_lbl_bg_clr( $woo_onsale_lbl_bg_clr ) {
	$woo_onsale_lbl_bg_clr = '#cc9900';
	return $woo_onsale_lbl_bg_clr;
}
add_filter( 'di_business_woo_onsale_lbl_bg_clr', 'ecommerce_business_woo_onsale_lbl_bg_clr' );

/**
 * [ecommerce_business_woo_price_clr description]
 * @param  [type] $woo_price_clr [description]
 * @return [type]                [description]
 */
function ecommerce_business_woo_price_clr( $woo_price_clr ) {
	$woo_price_clr = '#cc9900';
	return $woo_price_clr;
}
add_filter( 'di_business_woo_price_clr', 'ecommerce_business_woo_price_clr' );

/**
 * [ecommerce_business_plugins description]
 * @return [type] [description]
 */
function ecommerce_business_plugins() {

	$plugins = array(
		array(
			'name'      => __( 'WooCommerce PDF Invoices & Packing Slips', 'ecommerce-business'),
			'slug'      => 'woocommerce-pdf-invoices-packing-slips',
			'required'  => false,
		),
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'ecommerce_business_plugins' );

/**
 * [ecommerce_business_woo_options description]
 * @return [type] [description]
 */
function ecommerce_business_woo_options() {
	Kirki::add_field( 'di_blog_config', array(
		'type'			 => 'select',
		'settings'		=> 'woo_product_img_effect',
		'label'			=> __( 'Product Image Effect', 'ecommerce-business' ),
		'description'	=> __( 'Product image effect on shop page', 'ecommerce-business' ),
		'section'		=> 'woocommerce_options',
		'default'		=> 'zoomin',
		'priority'		=> 10,
		'choices'		=> array(
			'none'			=> esc_attr__( 'None', 'ecommerce-business' ),
			'zoomin'		=> esc_attr__( 'Zoom In', 'ecommerce-business' ),
			'zoomout'		=> esc_attr__( 'Zoom Out', 'ecommerce-business' ),
			'rotate'		=> esc_attr__( 'Rotate', 'ecommerce-business' ),
			'blur'			=> esc_attr__( 'Blur', 'ecommerce-business' ),
			'grayscale'		=> esc_attr__( 'Gray Scale', 'ecommerce-business' ),
			'sepia'			=> esc_attr__( 'Sepia', 'ecommerce-business' ),
			'opacity'		=> esc_attr__( 'Opacity', 'ecommerce-business' ),
			'flash'			=> esc_attr__( 'Flash', 'ecommerce-business' ),
			'shine'			=> esc_attr__( 'Shine', 'ecommerce-business' ),
		),
	) );
}
add_action( 'di_business_woo_options', 'ecommerce_business_woo_options' );

/**
 * [ecommerce_business_product_img_effec_css description]
 * @return [type] [description]
 */
function ecommerce_business_product_img_effec_css() {
	$custom_css = "";
	$effect = get_theme_mod( 'woo_product_img_effect', 'zoomin' );
	if( $effect == 'zoomin' ) {
		$custom_css .= "
		.woocommerce ul.products li.product a img {
			-webkit-transition: opacity 0.5s ease, transform 0.5s ease;
			transition: opacity 0.5s ease, transform 0.5s ease;
		}

		.woocommerce ul.products li.product:hover a img {
			opacity: 0.9;
			transform: scale(1.1);
		}
		";
	} elseif( $effect == 'zoomout' ) {
		$custom_css .= "
		.woocommerce ul.products li.product a img {
			-webkit-transition: opacity 0.5s ease, transform 0.5s ease;
			transition: opacity 0.5s ease, transform 0.5s ease;
		}

		.woocommerce ul.products li.product a img {
			opacity: 0.9;
			transform: scale(1.1);
		}

		.woocommerce ul.products li.product:hover a img {
			opacity: 0.9;
			transform: scale(1);
		}
		";
	} elseif( $effect == 'rotate' ) {
		$custom_css .= "
		.woocommerce ul.products li.product a img {
			-webkit-transition: transform 0s ease;
			transition: transform 0s ease;
		}
		.woocommerce ul.products li.product:hover a img {
			-webkit-transition: transform 0.7s ease;
			transition: transform 0.7s ease;
		}
		.woocommerce ul.products li.product:hover img {
			-ms-transform: rotate(360deg);
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
		";
	} elseif( $effect == 'blur' ) {
		$custom_css .= "
		.woocommerce ul.products li.product img {
			-webkit-filter: blur(3px);
			filter: blur(3px);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}

		.woocommerce ul.products li.product:hover img {
			-webkit-filter: blur(0px);
			filter: blur(0px);
		}
		";
	} elseif( $effect == 'grayscale' ) {
		$custom_css .= "
		.woocommerce ul.products li.product img {
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}

		.woocommerce ul.products li.product:hover img {
			-webkit-filter: grayscale(0%);
			filter: grayscale(0%);
		}
		";
	} elseif( $effect == 'sepia' ) {
		$custom_css .= "
		.woocommerce ul.products li.product img {
			-webkit-filter: sepia(100%);
			filter: sepia(100%);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}

		.woocommerce ul.products li.product:hover img {
			-webkit-filter: sepia(0%);
			filter: sepia(0%);
		}
		";
	} elseif( $effect == 'opacity' ) {
		$custom_css .= "
		.woocommerce ul.products li.product a img {
			-webkit-transition: opacity 0.5s ease;
			transition: opacity 0.5s ease;
		}

		.woocommerce ul.products li.product:hover a img {
			opacity: 0.7;
		}
		";
	} elseif( $effect == 'flash' ) {
		$custom_css .= "
		.woocommerce ul.products li.product:hover a img {
			opacity: 1;
			-webkit-animation: recflash 1.5s;
			animation: recflash 1.5s;
		}
		@-webkit-keyframes recflash {
			0% {
				opacity: .4;
			}
			100% {
				opacity: 1;
			}
		}
		@keyframes recflash {
			0% {
				opacity: .4;
			}
			100% {
				opacity: 1;
			}
		}
		";
	} elseif( $effect == 'shine' ) {
		$custom_css .= "
		.woocommerce ul.products li.product::before {
			position: absolute;
			top: 0;
			left: -83%;
			z-index: 2;
			display: block;
			content: '';
			width: 50%;
			height: 100%;
			background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
			background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,.3) 100%);
			-webkit-transform: skewX(-25deg);
			transform: skewX(-25deg);
		}
		.woocommerce ul.products li.product:hover::before {
			-webkit-animation: recshine .75s;
			animation: recshine .75s;
		}
		@-webkit-keyframes recshine {
			100% {
				left: 125%;
			}
		}
		@keyframes recshine {
			100% {
				left: 125%;
			}
		}
		";
	} else {
		// Nothing to do.
		$custom_css .= "";
	}
	wp_add_inline_style( 'ecommerce-business-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ecommerce_business_product_img_effec_css' );
