<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
$favicon = get_field('header_favicon','option');
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" /><!-- links -->
    <link rel="icon" type="image/ico" href="<?php echo $favicon['url']; ?>" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/slick.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.mmenu.all.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/lightbox.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/lightbox.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/style-base.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>

    <!-- <link href="<?php //echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" /> -->
    <!-- <link href="<?php //echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet" /> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- start -->
    <div id="wrapper">
        <!-- header part -->
        <header>
            <div class="container">
            	<?php $logo = get_field('header_logo','option'); ?>
                <div class="logo"><a href="<?php echo esc_url ( home_url('/') ); ?>"><img src="<?php echo $logo['url']; ?>" alt=" PPC Capital"></a></div>
                <div class="menu mobile-desktop cf">
                    <?php wp_nav_menu( array(
					    'theme_location' => 'menu-1',
					    'menu_id'        => 'menu-1-menu',
					    'container'=>'',
					    'menu_class'     => 'clearfix'
					) ); ?>
                </div><!-- desktop mrnu end --><a class="menu-bt sb-toggle-right" id="nav-icon1" href="#menu12">
                    <div class="menu-icon"><span></span><span></span><span></span></div>
                </a>
            </div> <!-- container end -->
        </header>
