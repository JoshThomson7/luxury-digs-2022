<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
 </div> <!-- wrapper body -->
    <div class="insta-feed">
        <?php echo do_shortcode('[instagram-feed feed=1]') ?>
    </div>

    <footer>
        <div class="footer-top bg-gray">
            <div class="container">
                <div class="row">
                    <div class="footer-one left">
                       <?php $logo = get_field('footer_logo','option'); ?>
                        <div class="logo"><a href="<?php echo esc_url ( home_url('/') ); ?>"><img src="<?php echo $logo['url']; ?>" alt=" PPC Capital"></a></div>
                        <p><?php echo get_field('fooer_below_logo_content','option');?></p>
                    </div><!-- footer one end -->
                    <div class="footer-two right">
                        <div class="footer-two-inner">
                            <div class="footer-third">
                                <?php if( get_field('footer_quick_link_title','option') ){ ?>
                                    <h5><?php echo get_field('footer_quick_link_title','option'); ?></h5>
                                <?php } ?>
                               <?php wp_nav_menu( array(
                                    'theme_location' => 'footer',
                                    'menu_id'        => 'footer-1-menu',
                                    'container'=>'',
                                    'menu_class'     => 'clearfix'
                                ) ); ?>
                            </div>
                            <div class="footer-third">
                                <?php if( get_field('footer_address_title','option') ){ ?>
                                    <h5><?php echo get_field('footer_address_title','option'); ?></h5>
                                <?php } ?>
                                 <?php if( get_field('footer_address_title','option') ){ ?>
                                <p><?php echo get_field('footer_address','option'); ?></p>
                                <?php } ?>
                                <?php if( get_field('footer_phone_number','option') ){ ?>
                                    <p><?php echo get_field('footer_phone_title','option'); ?>: <a href="tel:<?php echo get_field('footer_phone_number','option'); ?>"><?php echo get_field('footer_phone_number','option'); ?></a>
                                <?php } ?>
                                <?php if( get_field('footer_free_phone_nunber','option') ){ ?>
                                 <br> <?php echo get_field('footer_free_phone_title','option'); ?>: <a href="tel:<?php echo get_field('footer_free_phone_nunber','option'); ?>"><?php echo get_field('footer_free_phone_nunber','option'); ?></a></p>
                                <?php } ?>
                                <?php if( get_field('footer_email','option') ){ ?>
                                <p><?php echo get_field('footer_email_title','option'); ?>: <a href="mailto:<?php echo get_field('footer_email','option'); ?>"><?php echo get_field('footer_email','option'); ?></a></p>
                                <?php } ?>
                            </div>
                            <div class="footer-third">
                                <?php if( get_field('footer_follow_us_title','option') ) { ?>
                                <h5><?php echo get_field('footer_follow_us_title','option'); ?></h5>
                                <?php } ?>
                                <div class="social-block">
                                    <ul>
                                        <?php $socials = get_field('footer_social_share_link','option'); 
                                        if( $socials ) { 
                                        foreach ( $socials as $social ) { 
                                            ?>
                                            <li><a href="<?php echo $social['footer_social_share_link']; ?>" target="_blank"><i class="<?php echo $social['footer_social_share_class']; ?>" aria-hidden="true"></i></a></li>
                                        <?php } }?>
                                    </ul>
                                </div>
                                <!-- <div class="follow-block"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-follow.png" alt=""></div> -->
                            </div>
                        </div>
                    </div><!-- footer two end -->
                </div>
            </div><!-- container end -->
        </div><!-- footer-top end -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-inner">
                    <div class="footer-half">
                        <?php $copyright = get_field('footer_copyright_link','option'); ?>
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> <a href="<?php echo $copyright['url']; ?>"><?php echo $copyright['title']; ?></a></p>
                    </div>
                    <div class="footer-half">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'social',
                            'menu_id'        => 'social-1-menu',
                            'container'=>'',
                            'menu_class'     => 'clearfix'
                        ) ); ?>
                    </div>
                </div>
            </div><!-- container end -->
        </div><!-- footer-bottom end -->
    </footer><!-- Mobile Menu Start -->
    <nav class="sb-slidebar" id="menu12">
        <div class="menu">
            <ul>
                <?php wp_nav_menu( array(
				    'theme_location' => 'menu-1',
				    'menu_id'        => 'menu-1-menu',
				    'container'=>'',
				    'menu_class'     => 'clearfix'
				) ); ?>
            </ul>
        </div>
    </nav><!-- Mobile Menu end -->
<?php wp_footer(); ?>
</body>
</html>
