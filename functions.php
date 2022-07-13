<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

// Video Banners
include('modules/advanced-video-banners/functions/class-avb.php');

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
require get_template_directory() . '/page-template/aq_resizer.php'; 
 //aq_resize( $thumb[0], 1900, 536, true, true, true );


if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentynineteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'twentynineteen' ),
				'footer' => __( 'Footer Menu', 'twentynineteen' ),
				'social' => __( 'Social Links Menu', 'twentynineteen' ),
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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'twentynineteen' ),
					'slug'  => 'primary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'twentynineteen' ),
					'slug'  => 'secondary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {
	wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'twentynineteen-style-theme', get_theme_file_uri( '/css/style.css' ), array());
	wp_enqueue_style( 'twentynineteen-responsive', get_theme_file_uri( '/css/responsive.css' ), array());

	wp_style_add_data( 'twentynineteen-style', 'rtl', 'replace' );

	//Other JS
	wp_enqueue_script( 'twentynineteen-lightbox', get_theme_file_uri( '/js/lightbox-plus-jquery.min.js' ), array(), '1.1', true );
	wp_enqueue_script( 'twentynineteen-slick', get_theme_file_uri( '/js/slick.min.js' ), array(), '1.1', true );
	wp_enqueue_script( 'twentynineteen-mmenu', get_theme_file_uri( '/js/jquery.mmenu.min.js' ), array(), '1.1', true );
	wp_enqueue_script( 'twentynineteen-eq', get_theme_file_uri( '/js/equal-height.js' ), array(), '1.1', true );
	wp_enqueue_script( 'twentynineteen-custom', get_theme_file_uri( '/js/custom.js' ), array(), '1.1', true );


	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	}
	
	wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles() {

	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function twentynineteen_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo twentynineteen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentynineteen_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

//acf option start
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();	
}//acf option end

//image resize 
require get_stylesheet_directory() . '/inc/aq_resizer.php'; 
function imageResizeNewFunc( $url,$width, $height ){ 
    $size = getimagesize($url); 
    if( $size[0] > $width && $size[1] > $height ){ 
        $url = aq_resize( $url, $width, $height, true, true, true ); 
    } 
    else {
     $url = $url; 
    } 
    return $url; 
} //image resize 

//logo url , title and link change
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
		height:71px;
		width:180px;
		background-size: 180px 71px;
		background-repeat: no-repeat;
        	/*padding-bottom: 30px;*/
        	/*background-color: #000;*/
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url_title() {
    return 'PPC Capital';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
     return site_url(); //add dynamic url 
}
//logo url , title and link change end

// Banner Image Function
function bannerImage($postID)
{
    $banner_image = get_field('inner_page_banner_image',$postID);   
    $default_banner = get_field('default_banner_image','option',$postID);

    $url = "";
    if( $banner_image == "" ){ 
            $url = imageResizeNewFunc($default_banner['url'],1799,570);
    } else {
        $url = imageResizeNewFunc($banner_image['url'],1799,570);
    } ?>
    <!-- <section class="header-tittle" style="background-image: url('<?php echo $url; ?>');">
    <div class="container">
        <div class="header_main">
          <?php the_title(); ?>
        </div>
    </div>
</section> -->
<section class="banner-section" style="background-image: url(<?php echo $url; ?>)">
    <div class="container">
        <div class="banner-main">
        	<?php if( get_field('inner_page_banner_title') ) { ?>
            <div class="banner-content">
            <?php } ?>
                <?php if( get_field('inner_page_banner_title') ) { ?>
                    <h1><?php echo get_field('inner_page_banner_title'); ?></h1>
                <?php } ?>
                <?php if( get_field('inner_page_banner_content') ) { ?>
                    <p><?php echo get_field('inner_page_banner_content'); ?></p>
                <?php } ?>
                <?php $btn = get_field('inner_page_banner_button'); 
                    if( $btn ) { ?>
                    <a href="<?php echo $btn['url']; ?>" class="btn"><?php echo $btn['title']; ?></a>
                <?php } ?>
                <?php if( get_field('inner_page_banner_title') ) { ?>
            </div>
    		<?php } ?>
        </div>
    </div><!-- container end -->
</section> <!-- banner section end -->
<!-- <section class="about-section text-center">
	<div class="container">
        <div class="heading">
          <h2><?php the_title(); ?></h2>
        </div>
    </div>
</section> -->
    <!-- inner page banner end -->
<?php } 
//svg support
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Testimonials', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Testimonials', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Testimonials', 'twentythirteen' ),
        'all_items'           => __( 'All Testimonials', 'twentythirteen' ),
        'view_item'           => __( 'View Testimonials', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Testimonials', 'twentythirteen' ),
        'add_new'             => __( 'Add Testimonials', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Testimonials', 'twentythirteen' ),
        'update_item'         => __( 'Update Testimonials', 'twentythirteen' ),
        'search_items'        => __( 'Search Testimonials', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'testimonials', 'twentythirteen' ),
        'description'         => __( 'Testimonials and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'testimonials', $args );
}

add_action( 'init', 'custom_post_type', 0 );

function custom_post_type_story() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Story', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Story', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Story', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Story', 'twentythirteen' ),
        'all_items'           => __( 'All Story', 'twentythirteen' ),
        'view_item'           => __( 'View Story', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Story', 'twentythirteen' ),
        'add_new'             => __( 'Add Story', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Story', 'twentythirteen' ),
        'update_item'         => __( 'Update Story', 'twentythirteen' ),
        'search_items'        => __( 'Search Story', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'story', 'twentythirteen' ),
        'description'         => __( 'Story and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'story', $args );
}

add_action( 'init', 'custom_post_type_story', 0 );


function filter_plugin_updates( $value ) {
    unset( $value->response['wp-real-estate/wp-real-estate.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );