<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'bebe_options';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Bebe Options', 'bebe' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Theme Options for Bebe', 'bebe' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => true,
	
	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => true,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	
	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!

$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/wowa',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/wowa',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter',
);


// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// translators:  Panel opt_name.
	$args['intro_text'] = '<p>' . sprintf( esc_html__( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'your-textdomain-here' ), '<strong>' . $v . '</strong>' ) . '<p>';
} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';
}


Redux::set_args( $opt_name, $args );


/*
 * --->==================================== START SECTIONS===============================================
 */
Redux::set_section($opt_name, array(
		'title'            => esc_html__( 'Header and Footer ', 'bebe' ),
		'id'               => 'basic',
		'desc'             => esc_html__( 'Data to be displaed in header', 'bebe' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
	)
);
//----------------logo-----------------------
Redux::setSection( $opt_name, array(
            'title'            => __( 'Logo Data', 'bebe' ),
            'desc'             => __( 'Upload the logo and specify the slogan', 'bebe' ),
            'id'               => 'site_logos',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(
                array(
                    'id'       => 'bebelogo',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Logo', 'bebe' ),
                    'subtitle' => __( 'Upload here your logo', 'bebe' ),
                    'desc'     => __( 'Recommended size: 320px-110px', 'bebe' ),
                    'default'  => '',
                ),
				array(
                    'id'       => 'bebelogosmall',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Logo Small', 'bebe' ),
                    'subtitle' => __( 'Upload here your logo', 'bebe' ),
                    'desc'     => __( 'Recommended size: 200px-70px', 'bebe' ),
                    'default'  => '',
                ),
                 array(
                    'id'       => 'bebefooterlogo',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Logo in Footer', 'bebe' ),
                    'subtitle' => __( 'Upload here your logo', 'bebe' ),
                    'desc'     => __( 'Recommended size: 80px-40px', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebeslogan',
                    'type'     => 'text',
                    'title'    => __( 'Slogan', 'bebe' ),
                    'subtitle' => __( 'Type here your Slogan', 'bebe' ),
                    'desc'     => __( 'Your Slogan', 'bebe' ),
                    'default'  => 'Slogan text here',
                ),

            )
) );
   //--------------social links----------------------
Redux::setSection( $opt_name, array(
            'title'            => __( 'Social Links', 'bebe' ),
            'desc'             => __( 'Type here social links', 'bebe' ),
            'id'               => 'social_links',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(

                array(
                    'id'       => 'fb',
                    'type'     => 'text',
                    'title'    => __( 'Facebook Link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'insta',
                    'type'     => 'text',
                    'title'    => __( 'Instagram Link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'pin',
                    'type'     => 'text',
                    'title'    => __( 'Pinterest Link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'twi',
                    'type'     => 'text',
                    'title'    => __( 'Twitter Link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'yt',
                    'type'     => 'text',
                    'title'    => __( 'YouTube Link', 'bebe' ),
                    'subtitle' => __( 'Type here your link', 'bebe' ),
                    'desc'     => __( 'Your Profile Link', 'bebe' ),
                    'default'  => '',
                ),

            )
) );
         // ---------------------home slider----------------------------
        Redux::setSection( $opt_name, array(
            'title'            => __( 'Home Slider', 'bebe' ),
            'desc'             => __( 'Upload data for your slider', 'bebe' ),
            'id'               => 'home_slider',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(

                array(
                    'id'          => 'homepageslider',
                    'type'        => 'slides',
                    'title'       => __( 'Slides Options', 'bebe' ),
                    'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'bebe' ),
                    'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'bebe' ),
                    'placeholder' => array(
                        'title'       => __( 'This is a title', 'bebe' ),
                        'description' => __( 'Description Here', 'bebe' ),
                        'url'         => __( 'Give us a link!', 'bebe' ),
                    ),
                ),

            )
        ) );
		//--------------------------footer data-------------------------------
		        Redux::setSection( $opt_name, array(
            'title'            => __( 'Footer Data', 'bebe' ),
            'desc'             => __( 'Type here info for footer', 'bebe' ),
            'id'               => 'footer_data',
            'subsection'       => true,
            'customizer_width' => '700px',
            'fields'           => array(

                array(
                    'id'       => 'bebephone',
                    'type'     => 'text',
                    'title'    => __( 'Site Phone', 'bebe' ),
                    'subtitle' => __( 'Type here your phone', 'bebe' ),
                    'desc'     => __( 'The phone Number', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebeemail',
                    'type'     => 'text',
                    'validate' => 'email',  // валидатор правильности .напис.имейла
                    'msg'      => __('Wrong Email','bebe'),
                    'title'    => __( 'Site Email', 'bebe' ),
                    'subtitle' => __( 'Type here your email', 'bebe' ),
                    'desc'     => __( 'The Email Address', 'bebe' ),
                    'default'  => '',
                ),
                array(
                    'id'       => 'bebeaddress',
                    'type'     => 'text',
                    'title'    => __( 'Your Address', 'bebe' ),
                    'subtitle' => __( 'Type here your address', 'bebe' ),
                    'desc'     => __( 'The Address', 'bebe' ),
                    'default'  => '',
                ),

                array(
                    'id'       => 'bebeformshortcode',
                    'type'     => 'text',
                    'title'    => __( 'Form Shortcode', 'bebe' ),
                    'subtitle' => __( 'Type here the form shortcode', 'bebe' ),
                    'desc'     => __( 'Type the Shortcode from CF7 plugin or other', 'bebe' ),
                    'default'  => '',
                ),

                array(
                    'id'       => 'copyrights',
                    'type'     => 'editor',
                    'title'    => __( 'Copyrights', 'bebe' ),
                    'subtitle' => __( 'Type here some copyrights', 'redux-framework-demo' ),
                    'default'  => 'BEBE. All rights reserved',
                ),
				 array(
                    'id'       => 'bebeformshortcode',
                    'type'     => 'text',
                    'title'    => __( 'Form Shortcode', 'bebe' ),
                    'subtitle' => __( 'Type here the form shortcode', 'bebe' ),
                    'desc'     => __( 'Type the Shortcode from CF7 plugin or other', 'bebe' ),
                    'default'  => '',
                ),

            )
        ) );
		//------------------------About Page----------------------------
		  Redux::setSection( $opt_name, array(
        'id'               => 'about_page',
		'title'            => 'About Page', 'bebe',
	    'desc'             =>__( 'Slider about','bebe'),
		'customiser_width' => '400px',
		'icon'             => 'el el-asl',
	    'fields'           => array(
	              array(
                    'id'          => 'aboutpageslider',
                    'type'        => 'slides',
                    'title'       => __( 'Slides Options', 'bebe' ),
					'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'bebe' ),
                    'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'bebe' ),
                ),

            )
        ) );
		//------------------Post Type Settings-------------------------------
		    Redux::setSection( $opt_name, array(
        'title'            => __( 'Post Type Settings', 'bebe' ),
        'id'               => 'posttypesettings_page',
        'desc'             => __( 'Specify the count on archives', 'bebe' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-asl',
        'fields'            => array(
            array(
                'id'       => 'roomscount',
                'type'     => 'text',
                'validate' => 'numeric', //это валидация прав.введения кол-ва комнат(т.е. только число!)
                'title'    => __( 'Posts per Page', 'bebe' ),
                'subtitle' => __( 'On Rooms Post Type', 'bebe' ),
                'desc'     => __( 'How many posts you want to show on the Rooms Archive Page.', 'bebe' ),
                'default'  => '6',
            ),

            array(
                'id'       => 'width',
                'type'     => 'text',
                'validate' => 'numeric',
                'title'    => __( 'Width', 'bebe' ),
                'subtitle' => __( '.....', 'bebe' ),
                'desc'     => __( '.....', 'bebe' ),
                'default'  => '',
            ),

            array(
                'id'       => 'sidebar',
                'type'     => 'button_set',
                'title'    => __( 'Button Set Option', 'redux-framework-demo' ),
                'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Left Sidebar',
                    '2' => 'No Sidebar',
                    '3' => 'Right Sidebar'
                ),
                'default'  => '2'
            ),
        ),
    ) );