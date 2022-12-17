<?php
/**
 * Bebe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bebe
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bebe_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Bebe, use a find and replace
		* to change 'bebe' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bebe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bebe' ),
			'menu-footer' => esc_html__( 'Footer', 'bebe' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bebe_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
	//Crop Images. их задают 1 раз, после инициализ.темы - after_setup_theme
		add_image_size( 'post-front', 235, 183, true );
		add_image_size( 'post-single', 370, 280, true );
		
		add_image_size( 'gallery_one', 222, 341, true );
		add_image_size( 'gallery_two', 222, 164, true );
		add_image_size( 'gallery_three', 456, 164, true );
		add_image_size( 'teacher_photo', 257, 138, true );
		add_image_size( 'room_photo', 212, 168, true );
}
add_action( 'after_setup_theme', 'bebe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bebe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bebe_content_width', 640 );
}
add_action( 'after_setup_theme', 'bebe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bebe_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bebe' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bebe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bebe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bebe_scripts() {
	wp_enqueue_style( 'bebe-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bebe-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bebe-general', get_template_directory_uri() . '/layouts/general.css', array(), '1.0', false );

    wp_enqueue_script('jquery');  //подкл.jQuery кот.уже есть в вордпрессе
	wp_enqueue_script( 'bebe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bebe-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/libs/jquery.flexslider-min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scrollable', get_template_directory_uri() . '/js/libs/scrollable.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bebe_scripts' );

/**
 * Enqueue scripts and styles for Admin.
 */

/*function ale_add_scripts($hook) {
			wp_enqueue_script('bebe_metaboxes', get_template_directory_uri() . '/js/admin/metaboxes.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox'));
		    wp_enqueue_style( 'bebe-admin', get_template_directory_uri() . '/layouts/admin.css', array(), '1.0', false );
		}
add_action( 'admin_enqueue_scripts', 'ale_add_scripts', 10 );*/

function ale_add_scripts($hook) {
	if('post-new.php' == $hook || 'post.php' == $hook){
		wp_enqueue_script( 'bebe_metaboxes', get_template_directory_uri()  . '/js/admin/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
		wp_enqueue_script( 'bebe_metabox-gallery', get_template_directory_uri()  . '/js/admin/metabox-gallery.js', array( 'jquery') );
	}
    wp_enqueue_style('thickbox');
	wp_enqueue_style( 'bebe-admin', get_template_directory_uri() . '/layouts/admin.css', array(), '1.0', false );
}
add_action( 'admin_enqueue_scripts', 'ale_add_scripts', 10 );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

 /**
 * init tgm plugins installer
 */
require get_template_directory() . '/inc/tgm-list.php';

 /**
 * init Redux Theme Options Settings
 */
require get_template_directory() . '/inc/redux-options.php';

 /**
 * init Breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * init metaboxes options
 */
require get_template_directory() . '/inc/metaboxes.php';
require get_template_directory() . '/inc/gallery-meta.php';

/**
 * Load Jetpack compatibility file. */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//---------------Contact Form 7 убирает генерируемые плагином <span> https://stackoverflow.com/questions/39731560/how-can-i-remove-the-span-wrapper-in-contact-form-7

add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	$content = str_replace('<br />', '', $content);
    
	return $content;
});

//===================================metaboxes==========================================
function aletheme_metaboxes($meta_boxes) {

	$meta_boxes = array();

	wp_reset_postdata();

	$prefix = "bebe_";

// ---------homepage--------------------
	$meta_boxes[] = array(
		'id'         => 'homepage_metabox',
		'title'      => 'Homepage Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('About Photo','bebe'),
				'desc' => __('Upload a photo. Recommended size: 280-194px','bebe'),
				'id'   => $prefix . 'about_photo',
				'std'  => '',
				'type' => 'file',  
			),
			array(
				'name' => __('About title','bebe'),
				'desc' => __('The title','bebe'),
				'id'   => $prefix . 'about_title',
				'std'  => 'About Us',  //это выводится по умолчанию
				'type' => 'text',
			),
			array(
				'name' => __('Description About Box','bebe'),
				'desc' => __('Type the description','bebe'),
				'id'   => $prefix . 'about_desc',
				'std'  => '',
				'type' => 'wysiwyg',  // тип - редактор
			),
			array(
				'name' => __('About Link','bebe'),
				'desc' => __('The Link','bebe'),
				'id'   => $prefix . 'about_link',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Title 1','bebe'),
				'desc' => __('Type here the Info Title 1','bebe'),
				'id'   => $prefix . 'info_title_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 1','bebe'),
				'desc' => __('Type here the Info Description 1','bebe'),
				'id'   => $prefix . 'info_description_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Title 2','bebe'),
				'desc' => __('Type here the Info Title 2','bebe'),
				'id'   => $prefix . 'info_title_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 2','bebe'),
				'desc' => __('Type here the Info Description 2','bebe'),
				'id'   => $prefix . 'info_description_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Title 3','bebe'),
				'desc' => __('Type here the Info Title 3','bebe'),
				'id'   => $prefix . 'info_title_3',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 3','bebe'),
				'desc' => __('Type here the Info Description 3','bebe'),
				'id'   => $prefix . 'info_description_3',
				'std'  => '',
				'type' => 'text',
			),
		)
	);
	//-------------- для страницы about--------------------
	$meta_boxes[] = array(
		'id'         => 'about_metabox',
		'title'      => 'About Data',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('Teacher Block Title','bebe'),
				'desc' => __('Specify the Teacher Block Title','bebe'),
				'id'   => $prefix . 'about_teachers',
				'std'  => '',
				'type' => 'text',  
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'teachers_metabox',
		'title'      => 'Teachers Social Links',
		'pages'      => array( 'teachers', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('Facebook Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'fb_link',
				'std'  => '',
				'type' => 'text',  
			),
			array(
				'name' => __('Twitter Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'twi_link',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Pinterest Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'pin_link',
				'std'  => '',
				'type' => 'text',
			),
		)
	);
		$meta_boxes[] = array(
		'id'         => 'contact_metabox',
		'title'      => esc_html__('Contact Info','bebe'),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contact.php'), ), // где показыв.этот метабокс
		'fields' => array(
			array(
				'name' => esc_html__('Address Label','bebe'),
				'desc' => esc_html__('Add the info','bebe'),
				'id'   => $prefix . 'address_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => esc_html__('Address','bebe'),
				'desc' => esc_html__('Add the info','bebe'),
				'id'   => $prefix . 'address',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Phone Label','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'phone_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Phone','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'phone',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Email Label','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'email_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Email','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'email',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Google Maps Api Key','bebe'),
				'desc' => __('Get your API key in Google Console.','bebe'), // в опис. лучше добав. ссылку генерации ключа от гугля
				'id'   => $prefix . 'googleapi',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Contact Form Shortcode','bebe'),
				'desc' => __('You can use any contact for Plugin. Generate the Form and paste the shortcode here. ','bebe'),
				'id'   => $prefix . 'contactformshortcode',
				'std'  => '',
				'type' => 'textarea_code',
			),
		)
	);

	return $meta_boxes;
}
//==========================вывод соц сетей в single.php================================

function ale_get_share($type = 'fb', $permalink = false, $title = false) {
	if (!$permalink) {
		$permalink = get_permalink();
	}
	if (!$title) {
		$title = get_the_title();
	}
	switch ($type) {
		case 'twi':
			return 'http://twitter.com/home?status=' . $title . '+-+' . $permalink;
			break;
		case 'fb':
			return 'http://www.facebook.com/sharer.php?u=' . $permalink . '&t=' . $title;
			break;
		case 'goglp':
			return 'https://plus.google.com/share?url='. urlencode($permalink);
			break;
		case 'pin':
			return 'http://pinterest.com/pin/create/button/?url=' . $permalink;
			break;
		default:
			return '';
	}
}

//======================callack function for wp_list_comments/ для вывода своей верстки для комментов

function bebe_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'article' == $args['style'] ) {
		$tag = 'article';
		$add_below = 'comment';
	} else {
		$tag = 'article';
		$add_below = 'comment';
	}
/*печат.класс.reply если задана глубина комм >1 а для комм без комм печат класс comment.
если глубина =2, т.е. это сын(коммент к комменту)формирует сдвиг и выводит стрелочку
 в <div class="enter"> заданную в background*/
	?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
   <!--div коммента и ответа на коммент имеют разные классы comment и reply-->
	<div class="<?php if($depth > 1){ echo 'reply'; } else { ?>comment<?php } ?> cf"> 
		<?php
		if($depth == 2){ ?><div class="enter"></div><?php } ?> 
		
		<div class="avatar">
			<?php echo get_avatar( $comment, 105 ); ?>
			<h4><?php comment_author(); ?></h4>
		</div>
		<div class="text">
			<div class="top">
				<h4 class="date"><?php echo esc_html('Date','bebe');?>: <?php comment_date() ?></h4>
				<?php if($depth !== 2){ 
					comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));
				}  ?>
			</div>
			<div class="dotted-line"></div>

			<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-meta-item"><?php esc_html('Your comment is awaiting moderation.','bebe');?></p>
			<?php endif; ?>
			<?php comment_text() ?>

			<p><?php edit_comment_link('<p class="comment-meta-item">'.esc_html__('Edit this comment','bebe').'</p>','',''); ?></p>
		</div>
	</div>

<?php }

// end of awesome))) semantic comment

function bebe_comment_close() {
	echo '</article>';
}
//---------end callback function--------

//================================Create Custom Post Type==========================================
function bebe_create_post_type() {
	register_post_type( 'gallery',
		array(
			'labels' => array(
				'name' => esc_html__( 'Galleries','bebe' ),
				'singular_name' => __( 'Gallery' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
//Create Custom Post Type
	register_post_type( 'gallery',
		array(
			'labels' => array(
				'name' => esc_html__( 'Galleries','bebe' ),
				'singular_name' => __( 'Gallery' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
	register_post_type( 'teachers',
		array(
			'labels' => array(
				'name' => __( 'Teachers' ),
				'singular_name' => __( 'Teacher' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
	register_post_type( 'rooms',
		array(
			'labels' => array(
				'name' => __( 'Rooms' ),
				'singular_name' => __( 'Room' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
}
add_action( 'init', 'bebe_create_post_type' );
/**
 * Register a 'gallery_category' taxonomy for post type 'gallery'.
 *
 * @see basic example - https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
function bebe_tax() {
	register_taxonomy( 
		'gallery_category',
		'gallery',
		array(
			'label'        => __( 'Category', 'bebe' ),
			'rewrite'      => array( 'slug' => 'gallery-category' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'bebe_tax', 0 );