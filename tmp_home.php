<?php
/*
*Template Name: Home page
*/
get_header(); ?>
<div class="main-body">
        <?php AVB::avb_banners(); ?>

        <section class="about-section text-center">
            <div class="container">
                <?php if( get_field('home_welcome_title') ) { ?>
                <div class="heading">
                    <h2><?php echo get_field('home_welcome_title'); ?></h2>
                </div>
                <?php } ?>
                <div class="about-content">
                <?php if( get_field('home_welcome_content') ) { ?>
                    <p><?php echo get_field('home_welcome_content'); ?></p>
                <?php } ?>
                <?php $welcome_btn = get_field('home_welcome_read_button'); 
                    if( $welcome_btn ) { ?>
                    <a href="<?php echo $welcome_btn['url']; ?>" class="btn"><?php echo $welcome_btn['title']; ?></a>
                <?php } ?>
                </div>
            </div><!-- container end -->
        </section> <!-- about section end -->
        <section class="luxury-digs-section bg-blue">
            <div class="luxury-digs-img" style="background-image: url(<?php echo get_field('luxury_property_left_image')['url']; ?>);">
                <img src="<?php echo get_field('luxury_property_left_image')['url']; ?>" alt="dummy img"></div>
            <div class="luxury-digs-content ">
                <?php if( get_field('luxury_property_right_content_title') ) { ?>
                <div class="heading">
                    <h2><?php echo get_field('luxury_property_right_content_title'); ?></h2>
                </div>
                <?php } ?>
                <?php if( get_field('luxury_property_right_content') ) { ?>
                    <?php echo get_field('luxury_property_right_content'); ?>
                <?php } ?>
                <?php $more_btn = get_field('luxury_property_right_more_button');
                    if( $more_btn ) { ?>
                    <a href="<?php echo $more_btn['url']; ?>" class="btn"><?php echo $more_btn['title']; ?></a>
                <?php } ?>
            </div><!-- luxury digs content end -->
        </section> <!-- luxury digs section end -->
        <section class="testimonials-section text-center">
            <div class="container">
                <?php if( get_field('home_testimonial_title') ) { ?>
                <div class="heading ">
                    <h2><?php echo get_field('home_testimonial_title'); ?></h2>
                </div>
                <?php } ?>
                <div class="testimonials-slider slider">
                    <?php 
                    $args = array(
                        'post_type'=> 'testimonials',
                        'order'    => 'DESC',
                        'posts_per_page' => -1,
                        'post_status'   => 'publish'
                        );              
                    $the_query = new WP_Query( $args );
                    // $featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
                    if($the_query->have_posts() ) : 
                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="testimonials-block">
                        <?php the_content(); ?>
                        <h4>-<?php the_title(); ?></h4>
                    </div>
                    <?php endwhile;
                    endif; wp_reset_query(); ?>
                </div><!-- testimonials slider end -->
            </div><!-- container end -->
        </section> <!-- testimonials section end -->
        <section class="luxury-digs-section bg-gray cf right-img">
            <div class="luxury-digs-content ">
                <?php if( get_field('home_our_bread_title') ) { ?>
                <div class="heading">
                    <h2><?php echo get_field('home_our_bread_title'); ?></h2>
                </div>
                <?php } ?>
                <?php if( get_field('home_our_bread_content') ) { ?>
                    <?php echo get_field('home_our_bread_content'); ?>
                <?php } ?>
                <?php $bread_btn = get_field('home_our_bread_more_button'); 
                    if( $bread_btn ) { ?>
                    <a href="<?php echo $bread_btn['url']; ?>" class="btn"><?php echo $bread_btn['title']; ?></a>
                <?php } ?>
            </div> <!-- luxury digs content end -->
            <div class="luxury-digs-img" style="background-image: url(<?php echo get_field('home_our_bread_right_image')['url']; ?>);"><img src="<?php echo get_field('home_our_bread_right_image')['url']; ?>" alt="dummy img"></div>
        </section> <!-- luxury digs section end -->
        <section class="client-section text-center">
            <div class="container">
                <div class="heading-two">
                    <?php if( get_field('ideal_property_title') ) { ?>
                        <h3><?php echo get_field('ideal_property_title'); ?></h3>
                    <?php } ?>
                    <?php if( get_field('ideal_property_sub_title') ) { ?>
                        <h2><?php echo get_field('ideal_property_sub_title'); ?></h2>
                    <?php } ?>
                    <hr>
                </div>
                <?php $img_loop = get_field('ideal_property_logo_loop');
                    if( $img_loop ) { ?>
                <div class="client-inner">
                    <?php foreach ($img_loop as $img) { ?>
                        <img src="<?php echo $img['ideal_property_logo_image']['url']; ?>" alt="dummy img">    
                    <?php } ?>
                </div>
            <?php } ?>
            </div><!-- container end -->
        </section> <!-- client section end -->
    </div> <!-- main body -->

<?php get_footer();