<?php

/**
 * SETTINGS TAB
 **/
$ipanel_thebuilt_tabs[] = array(
	'name' => 'Main Settings',
	'id' => 'main_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "main_settings"
);

$ipanel_thebuilt_option[] = array(
	"name" => "Enable Parallax effects for pages backgrounds and parallax blocks",
	"id" => "enable_parallax",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "You can turn on/off parallax effects for scrolling here",
	"type" => "checkbox",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Enable theme CSS3 animations",
	"id" => "enable_theme_animations",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Enable colors and background colors fade effects",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"type" => "htmlpage",
	"name" => '<div class="ipanel-label">
    <label>Favicon</label>
  </div><div class="ipanel-input">
    You can upload your website favicon (site icon) in <a href="customize.php" target="_blank">WordPress Customizer</a> (in "Site Identity" section at the left sidebar).<br/><br/><br/>
  </div>'
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);
/**
 * Header TAB
 **/
$ipanel_thebuilt_tabs[] = array(
	'name' => 'Header',
	'id' => 'header_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "header_settings"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Header layout",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_thebuilt_option[] = array(
	"name" => "Disable top menu",
	"id" => "disable_top_menu",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "This option will disable top menu (first menu with social icons and additional links)",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Header top menu text",
	"id" => "header_info_editor",
	"std" => 'Tradition and Innovaiton. WorldWide.',
	"desc" => "Text in top menu.",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Header height in pixels",
	"id" => "header_height",
	"std" => "110",
	"desc" => "Default: 110",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Fullwidth Header",
	"id" => "header_fullwidth",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"type" => "htmlpage",
	"name" => '<div class="ipanel-label">
    <label>Logo upload</label>
  </div><div class="ipanel-input">
    You can upload your website logo in <a href="customize.php" target="_blank">WordPress Customizer</a> (in "Header Image" section at the left sidebar).<br/><br/><br/>
  </div>'
);
$ipanel_thebuilt_option[] = array(
	"name" => "Logo width (px)",
	"id" => "logo_width",
	"std" => "198",
	"desc" => "Default: 198. Upload retina logo (2x size) and input your regular logo width here. For example if your retina logo have 400px width put 200 value here. If you does not use retina logo input regular logo width here (your logo image width).",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Enable sticky header",
	"id" => "enable_sticky_header",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => 'Header with menus will be fixed to top on page scroll.',
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => 'Sticky header display',
	"id" => "sticky_header_elements",
	"std" => "headeronly",
	"options" => array(
		"headeronly" => 'Only Header',
		"menuonly" => 'Only Menu below header',
		"headerandmenu" => 'Header with Menu below header'
	),
	"desc" => 'Choose elements that will be displayed in sticky header after scroll.',
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Enable Fullscreen search (Add search button to header)",
	"id" => "enable_fullscreen_search",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Fullscreen Search can be opened by search button near header social icons.",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Enable right side offcanvas floating sidebar menu",
	"id" => "enable_offcanvas_sidebar",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Sidebar can be opened by toggle button near header social icons. You can add widgets to this sidebar in 'Offcanvas Right sidebar' in Appearance > Widgets.",
	"type" => "checkbox",
);

$ipanel_thebuilt_option[] = array(
	"name" => "MainMenu position",   
	"id" => "header_menu_layout",
	"options" => array(
		'menu_below_header' => array(
			"image" => IPANEL_URI . 'option-images/menu_in_header_1.png',
			"label" => 'MainMenu below Header'
		),
		'menu_in_header' => array(
			"image" => IPANEL_URI . 'option-images/menu_in_header_2.png',
			"label" => 'MainMenu in Header Center'
		),
	),
	"std" => "menu_below_header",
	"desc" => "",
	"type" => "image",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Show top menu above MainMenu in header",
	"id" => "top_menu_position",
	"std" => "default",
	"options" => array(
		"header" => "Yes",
		"default" => "No",
	),
	"desc" => "This option work only if you selected MainMenu position as 'MainMenu in Header Center'.",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "MainMenu Below Header Width",
	"id" => "header_menu_width",
	"std" => "menu_fullwidth",
	"options" => array(
		"menu_fullwidth" => "Fullwidth",
		"menu_boxed" => "Boxed",
	),
	"desc" => "This option change menu width for menu below header position.",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "MainMenu color scheme",
	"id" => "header_menu_color_scheme",
	"std" => "menu_dark",
	"options" => array(
		"menu_light" => "Light menu",
		"menu_dark" => "Dark menu",
	),
	"desc" => "This option will change menu background if MainMenu located below header",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "MainMenu horizontal align",
	"id" => "header_menu_align",
	"std" => "menu_left",
	"options" => array(
		"menu_left" => "Left",
		"menu_center" => "Center",
	),
	"desc" => "This option will change menu align if MainMenu located below header",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "MainMenu items text transform",
	"id" => "header_menu_text_transform",
	"std" => "menu_uppercase",
	"options" => array(
		"menu_uppercase" => "Uppercase",
		"menu_regular" => "Regular",
	),
	"desc" => "This option will change menu text tranform for main elements",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Header Logo position",   
	"id" => "header_logo_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/header_logo_position_1.png',
			"label" => 'Left'
		),
		'center' => array(
			"image" => IPANEL_URI . 'option-images/header_logo_position_2.png',
			"label" => 'Center'
		),
	),
	"std" => "left",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Header info text",
	"id" => "header_info_2_editor",
	"std" => '<div class="header-info-half">
<div class="header-info-content-icon"><i class="fa fa-phone-square"></i></div>
<div class="header-info-content-title">Customer Support & Sales</div>
<div class="header-info-content-text">646-325-0357</div>
</div>
<div class="header-info-half">
<div class="header-info-content-icon"><i class="fa fa-clock-o"></i></div>
<div class="header-info-content-title">Working time</div>
<div class="header-info-content-text">Mon - Sat : 08:00 - 18:00</div>
</div>',
	"desc" => "Available only with 'Menu below header' menu layout type. Does not available with 'Centered logo' option. Displayed in header center. ",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);
$ipanel_thebuilt_option[] = array(
		"type" => "EndSection"
);
$ipanel_thebuilt_option[] = array(
	
	"name" => "Social icons",   
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_thebuilt_option[] = array(
	"type" => "info",
	"name" => "Leave URL fields blank to hide this social icons",
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_thebuilt_option[] = array(
	"name" => "Facebook Page url",
	"id" => "facebook",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Vkontakte page url",
	"id" => "vk",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Twitter Page url",
	"id" => "twitter",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Google+ Page url",
	"id" => "google-plus",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Behance",
	"id" => "behance",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "LinkedIn Page url",
	"id" => "linkedin",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Dribbble Page url",
	"id" => "dribbble",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Instagram Page url",
	"id" => "instagram",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Tumblr page url",
	"id" => "tumblr",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Pinterest page url",
	"id" => "pinterest",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Vimeo page url",
	"id" => "vimeo-square",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "YouTube page url",
	"id" => "youtube",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Skype url",
	"id" => "skype",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Houzz url",
	"id" => "houzz",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Flickr url",
	"id" => "flickr",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Odnoklassniki url",
	"id" => "odnoklassniki",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
		"type" => "EndSection"
);
$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);
/**
 * FOOTER TAB
 **/
$ipanel_thebuilt_tabs[] = array(
	'name' => 'Footer',
	'id' => 'footer_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "footer_settings"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Show 'Footer 4 column sidebar #1' only on homepage",
	"id" => "footer_sidebar_1_homepage_only",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Footer Left text (Copyright)",
	"id" => "footer_copyright_editor",
	"std" => "Powered by <a href='http://themeforest.net/user/dedalx/' target='_blank'>TheBuilt - Premium WordPress Theme</a>",
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);
/**
 * MEGAMENU TAB
 **/
$ipanel_thebuilt_tabs[] = array(
	'name' => 'MegaMenu',
	'id' => 'megamenu_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "megamenu_settings"
);
$ipanel_thebuilt_option[] = array(
	"type" => "info",
	"name" => "You can manage your theme menus <a href='nav-menus.php'>here</a>.",
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_thebuilt_option[] = array(
	"name" => "Enable Mega Menu",
	"id" => "megamenu_enable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Number of megamenu sidebars",
	"id" => "megamenu_sidebars_count",
	"std" => "1",
	"desc" => "You can use megamenu sidebars to show widgets in your megamenus. Increase this option value to add more new sidebars.",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);
/**
 * SIDEBARS TAB
 **/
$ipanel_thebuilt_tabs[] = array(
	'name' => 'Sidebars',
	'id' => 'sidebar_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "sidebar_settings"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Pages sidebar position",   
	"id" => "page_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "left",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Blog page sidebar position",   
	"id" => "blog_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "left",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Blog Archive page sidebar position",   
	"id" => "archive_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "right",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Blog Search page sidebar position",   
	"id" => "search_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "right",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Blog post sidebar position",   
	"id" => "post_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio item page sidebar position",   
	"id" => "portfolio_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "WooCommerce pages sidebar position",   
	"id" => "woocommerce_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"name" => "WooCommerce product page sidebar position",   
	"id" => "woocommerce_product_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => 'Left'
		),
		'right' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => 'Right'
		),
		'disable' => array(
			"image" => IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => 'Disable sidebar'
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);
/**
 * BLOG TAB
 **/
$ipanel_thebuilt_tabs[] = array(
	'name' => 'Blog',
	'id' => 'blog_settings'
);
$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "blog_settings"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Post excerpt length (words)",
	"id" => "post_excerpt_legth",
	"std" => "30",
	"desc" => "Used by WordPress for post shortening. Default: 18",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Show author info and avatar after single blog post",
	"id" => "blog_enable_author_info",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Show prev/next posts navigation links on single post page",
	"id" => "blog_post_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * PORTFOLIO TAB
 **/
$ipanel_thebuilt_tabs[] = array(
	'name' => 'Portfolio',
	'id' => 'portfolio_settings'
);
$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "portfolio_settings"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio page url",
	"id" => "portfolio_page_url",
	"std" => "",
	"desc" => "Create portfolio page with your projects (using MGT Portfolio Grid or other elements) and add this page url here. This url will be used in Breadcrumbs to access your all portfolio projects listing from single portfolio items pages. Leave empty to use homepage as portfolio url.",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Display portfolio item images slider prev/next navigation buttons",
	"id" => "portfolio_show_slider_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Display portfolio item images slider pagination buttons",
	"id" => "portfolio_show_slider_pagination",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio item images slider autoplay",
	"id" => "portfolio_slider_autoplay",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Show related works on portfolio items page",
	"id" => "portfolio_related_works",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "This will show works from the same categories",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio related items per row",
	"id" => "portfolio_related_items_columns",
	"std" => "4",
	"options" => array(
		"3" => "3",
		"4" => "4",
		"5" => "5"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio item page related works limit",
	"id" => "portfolio_related_limit",
	"std" => "8",
	"desc" => "Recommended values: 4, 8, 12, 16, etc",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio related items hover effect",
	"id" => "portfolio_posts_item_hover_effect",
	"std" => "fade",
	"options" => array(
		"0" => "Text from left, Zoom, Theme Color Overlay",
		"1" => "Text from left, Zoom, Transparent Overlay",
		"2" => "Text from left, Transparent Overlay",
		"3" => "Text from bottom, Zoom, Transparent Overlay",
		"4" => "Text from bottom, Transparent Overlay",
		"5" => "Text fly-in, Transparent Overlay",
		"6" => "Text style, Large text (Image and text always visible)",
		"7" => "Text style, Large text (Image on hover, text always visible)",
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio related items grid sort animation effect 1",
	"id" => "portfolio_posts_animation_1",
	"std" => "fade",
	"options" => array(
		"fade" => "Fade",
		"scale" => "Scale",
		"translateX" => "TranslateX",
		"translateY" => "TranslateY",
		"translateZ" => "TranslateZ",
		"rotateX" => "RotateX",
		"rotateY" => "RotateY",
		"rotateZ" => "RotateZ",
		"stagger" => "Stagger"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Portfolio related items grid sort animation effect 2",
	"id" => "portfolio_posts_animation_2",
	"std" => "scale",
	"options" => array(
		"fade" => "Fade",
		"scale" => "Scale",
		"translateX" => "TranslateX",
		"translateY" => "TranslateY",
		"translateZ" => "TranslateZ",
		"rotateX" => "RotateX",
		"rotateY" => "RotateY",
		"rotateZ" => "RotateZ",
		"stagger" => "Stagger"
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Show prev/next portfolio items navigation on single portfolio item page",
	"id" => "portfolio_show_item_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "",
	"type" => "checkbox",
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * FONTS TAB
 **/

$ipanel_thebuilt_tabs[] = array(
	'name' => 'Fonts',
	'id' => 'font_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "font_settings"
);

$ipanel_thebuilt_option[] = array(
	"name" => "Headers font",
	"id" => "header_font",
	"desc" => "Font used in headers. Default: Montserrat",
	"options" => array(
		"font-sizes" => array(
			" " => "Font Size",
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px',
			'28' => '28px',
			'29' => '29px',
			'30' => '30px',
			'31' => '31px',
			'32' => '32px',
			'33' => '33px',
			'34' => '34px',
			'35' => '35px',
			'36' => '36px',
			'37' => '37px',
			'38' => '38px',
			'39' => '39px',
			'40' => '40px',
			'41' => '41px',
			'42' => '42px',
			'43' => '43px',
			'44' => '44px',
			'45' => '45px',
			'46' => '46px',
			'47' => '47px',
			'48' => '48px',
			'49' => '49px',
			'50' => '50px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '35',
		"font-family" => 'Montserrat'
	),
	"type" => "typography"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Headers font parameters for Google Font",
	"id" => "header_font_options",
	"std" => "400,700",
	"desc" => "You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 400,700",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Body font",
	"id" => "body_font",
	"desc" => "Font used in text elements. Default: Open Sans",
	"options" => array(
		"font-sizes" => array(
			" " => "Font Size",
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '14',
		"font-family" => 'Open Sans'
	),
	"type" => "typography"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Body font parameters for Google Font",
	"id" => "body_font_options",
	"std" => "300,300italic,400,400italic,600,600italic",
	"desc" => "You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 300,300italic,400,400italic,600,600italic",
	"type" => "text",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Additional font",
	"id" => "additional_font",
	"desc" => "Font used some special decorated theme elements. Default: Herr Von Muellerhoff",
	"options" => array(
		"font-sizes" => array(
			" " => "Font Size",
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px',
			'28' => '28px',
			'29' => '29px',
			'30' => '30px',
			'31' => '31px',
			'32' => '32px',
			'33' => '33px',
			'34' => '34px',
			'35' => '35px',
			'36' => '36px',
			'37' => '37px',
			'38' => '38px',
			'39' => '39px',
			'40' => '40px',
			'41' => '41px',
			'42' => '42px',
			'43' => '43px',
			'44' => '44px',
			'45' => '45px',
			'46' => '46px',
			'47' => '47px',
			'48' => '48px',
			'49' => '49px',
			'50' => '50px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '48',
		"font-family" => 'Herr Von Muellerhoff'
	),
	"type" => "typography"
);
$ipanel_thebuilt_option[] = array(
	"name" => "Enable Additional font",
	"id" => "additional_font_enable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Uncheck if you don't want to use Additional font. This will speed up your site.",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "<span style='color:red'>Disable ALL Google Fonts on site</span>",
	"id" => "font_google_disable",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => "Use this if you want extra site speed or want to have regular fonts. Arial font will be used with this option.",
	"type" => "checkbox",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Regular font (apply if you disabled Google Fonts below)",
	"id" => "font_regular",
	"std" => "Arial",
	"options" => array(
		"Arial" => "Arial",
		"Tahoma" => "Tahoma",
		"Times New Roman" => "Times New Roman",
		"Verdana" => "Verdana",
		"Helvetica" => "Helvetica",
		"Georgia" => "Georgia",
		"Courier New" => "Courier New"
	),
	"desc" => "Use this option if you disabled ALL Google Fonts.",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * COLORS TAB
 **/

$ipanel_thebuilt_tabs[] = array(
	'name' => 'Colors & Skins',
	'id' => 'color_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "color_settings",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Predefined color skins",
	"id" => "color_skin_name",
	"std" => "none",
	"options" => array(
		"none" => "Use colors specified below",
		"default" => "TheBuilt (Default)",
		"green" => "Green",
		"blue" => "Cloudy blue",
		"purple" => "Purple",
		"red" => "Red",
		"blackandwhite" => "Greyscale",
		"orange" => "Yellow",
		"fencer" => "Fencer",
		"perfectum" => "Perfectum",
		"simplegreat" => "SimpleGreat"
	),
	"desc" => "Select one of predefined skins",
	"type" => "select",
);
$ipanel_thebuilt_option[] = array(
	"name" => "Body background color",
	"id" => "theme_body_color",
	"std" => "#ffffff",
	"desc" => "Used in many theme places, default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Body text color",
	"id" => "theme_text_color",
	"std" => "#2A2F35",
	"desc" => "Used in many theme places, default: #2A2F35",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Theme Main color",
	"id" => "theme_main_color",
	"std" => "#FBBE3F",
	"desc" => "Used in many theme places, links, buttons, tabs color, default: #FBBE3F",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Header background color",
	"id" => "theme_header_bg_color",
	"std" => "#ffffff",
	"desc" => "Default: #ffffff",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Top menu background color",
	"id" => "theme_top_menu_bg_color",
	"std" => "#F5F5F5",
	"desc" => "This background will be used for top menu. Default: #F5F5F5",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Top menu text/links color",
	"id" => "theme_top_menu_color",
	"std" => "#828282",
	"desc" => "This background will be used for top menu. Default: #828282",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Main menu background color",
	"id" => "theme_main_menu_bg_color",
	"std" => "#FFFFFF",
	"desc" => "This background will be used for menu below header position. Default: #FFFFFF",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Dark Main menu background color",
	"id" => "theme_main_menu_dark_bg_color",
	"std" => "#2A2F35",
	"desc" => "This background will be used for Dark menu below header position. Default: #2A2F35",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Footer sidebar background color",
	"id" => "theme_footer_sidebar_bg_color",
	"std" => "#2A2F35",
	"desc" => "Default: #2A2F35",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Footer background color",
	"id" => "theme_footer_bg_color",
	"std" => "#1C2126",
	"desc" => "Default: #1C2126",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Pages title color",
	"id" => "theme_title_color",
	"std" => "#2A2F35",
	"desc" => "Default: #2A2F35",
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * CUSTOM CODE TAB
 **/

$ipanel_thebuilt_tabs[] = array(
	'name' => 'Custom code',
	'id' => 'custom_code'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "custom_code",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Custom JavaScript code",
	"id" => "custom_js_code",
	"std" => '',
	"field_options" => array(
		"language" => "javascript",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => "This code will run in header",
	"type" => "textarea",
);

$ipanel_thebuilt_option[] = array(
	"name" => "Custom CSS styles",
	"id" => "custom_css_code",
	"std" => '',
	"field_options" => array(
		"language" => "json",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => "This CSS code will be included in header",
	"type" => "textarea",
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * DOCUMENTATION TAB
 **/

$ipanel_thebuilt_tabs[] = array(
	'name' => 'Documentation',
	'id' => 'documentation'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "documentation"
);

function get_plugin_version_number($plugin_name) {
        // If get_plugins() isn't available, require it
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
        // Create the plugins folder and file variables
	$plugin_folder = get_plugins( '/' . $plugin_name );
	$plugin_file = $plugin_name.'.php';
	
	// If the plugin version number is set, return it 
	if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
		return $plugin_folder[$plugin_file]['Version'];

	} else {
	// Otherwise return null
		return 'Plugin not installed';
	}
}

$ipanel_thebuilt_option[] = array(
	"type" => "htmlpage",
	"name" => '<div class="documentation-icon"><img src="'.IPANEL_URI . 'assets/img/documentation-icon.png" alt="Documentation"/></div><p>We recommend you to read <a href="http://magniumthemes.com/go/thebuilt-docs/" target="_blank">Theme Documentation</a> before you will start using our theme to building your website. It covers all steps for site configuration, demo content import, theme features usage and more.</p>
<p>If you have face any problems with our theme feel free to use our <a href="http://support.magniumthemes.com/" target="_blank">Support System</a> to contact us and get help for free.</p>
<a class="button button-primary" href="http://magniumthemes.com/go/thebuilt-docs/" target="_blank">Theme Documentation</a>
<a class="button button-primary" href="http://support.magniumthemes.com/" target="_blank">Support System</a><h3>Technical information (paste it to your support ticket):</h3><textarea style="width: 500px; height: 160px;font-size: 12px;">Theme Version: '.wp_get_theme()->get( 'Version' ).'
Theme Addons version: '.get_plugin_version_number('thebuilt-theme-addons').'
WordPress Version: '.get_bloginfo( 'version' ).'
WooCommerce Version: '.get_plugin_version_number('woocommerce').'
Visual Composer Version: '.get_plugin_version_number('js_composer').'
Admin Panel Access: '.get_admin_url().'
Admin Panel User login: [ADD_YOUR_LOGIN_HERE]
Admin Panel User password: [ADD_YOUR_PASSWORD_HERE]</textarea>'
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * EXPORT TAB
 **/

$ipanel_thebuilt_tabs[] = array(
	'name' => 'Export',
	'id' => 'export_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "export_settings"
);
	
$ipanel_thebuilt_option[] = array(
	"name" => "Export with Download Possibility",
	"type" => "export",
	"desc" => "Export theme admin panel settings to file."
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * IMPORT TAB
 **/

$ipanel_thebuilt_tabs[] = array(
	'name' => 'Import',
	'id' => 'import_settings'
);

$ipanel_thebuilt_option[] = array(
	"type" => "StartTab",
	"id" => "import_settings"
);

$ipanel_thebuilt_option[] = array(
	"name" => "Import",
	"type" => "import",
	"desc" => "Select theme options import file or paste options string to import your settings from Export."
);

$ipanel_thebuilt_option[] = array(
	"type" => "EndTab"
);

/**
 * CONFIGURATION
 **/

$ipanel_configs = array(
	'ID'=> 'THEBUILT_PANEL',
	'menu'=> 
		array(
			'submenu' => false,
			'page_title' => esc_html__('TheBuilt Control Panel', 'thebuilt'),
			'menu_title' => esc_html__('Theme Control Panel ', 'thebuilt'),
			'capability' => 'manage_options',
			'menu_slug' => 'manage_theme_options',
			'icon_url' => IPANEL_URI . 'assets/img/panel-icon.png',
			'position' => 59
		),
	'rtl' => ( function_exists('is_rtl') && is_rtl() ),
	'tabs' => $ipanel_thebuilt_tabs,
	'fields' => $ipanel_thebuilt_option,
	'download_capability' => 'manage_options',
	'live_preview' => false
);

$ipanel_theme_usage = new IPANEL( $ipanel_configs );
	