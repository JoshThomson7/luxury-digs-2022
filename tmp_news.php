<?php
/**
 * Template Name: News page
 * The custom page template file
 */
get_header();
?>
<?php echo bannerImage($post->ID); ?>

<!-- MAIN BLOG -->
<div class="main">
	<div class="blog-listing-main">
		<div class="container clearfix cf">
			<section class="blog-section" style="background-image: url(<?php echo get_field('home_news_section_background_image')['url']; ?>);">
            <div class="container">
                <?php if( get_field('home_news_title') ) { ?>
                <div class="heading text-center">
                    <h2><?php echo get_field('home_news_title'); ?></h2>
                </div>
                <?php } ?>
                <div class="blog-news">
                    <?php 
                    $args = array(
                        'post_type'=> 'post',
                        'order'    => 'DESC',
                        'posts_per_page' => -1,
                        'post_status'   => 'publish',
                        'post__not_in' => array(1)
                        );              
                    $the_query = new WP_Query( $args );
                    // $featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
                    if($the_query->have_posts() ) : 
                    while ( $the_query->have_posts() ) : $the_query->the_post();  
                    $full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                          if ( ! empty ($full_image) ) { 
                              $img = imageResizeNewFunc( $full_image[0],278,200);
                          } else {
                              $img = esc_url( get_template_directory_uri() )."/img/placeholder-image.png";
                          }?>
                        <div class="blog-block">
                            <div class="blog-img"><img src="<?php echo $img; ?>" alt="images"></div>
                            <div class="blog-content">
                                <h5><?php the_title(); ?></h5>
                                <div class="date"><?php echo get_the_date('d'); ?>/08/2019</div>
                                <?php echo wp_trim_words(get_the_excerpt(), '10' ,'...'); ?>
                                <a href="<?php echo get_the_permalink(); ?>" class="btn">More Info</a>
                            </div>
                        </div>
                        <?php endwhile;
                    endif; wp_reset_query(); ?>
                </div><!-- blog slider end -->
            </div><!-- container end -->
        </section> <!-- blog section end -->
		</div>	
	</div>
</div>
<?php get_footer();