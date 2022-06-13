<?php
/**
 * Template Name: Testimonial page
 * The custom page template file
 */
get_header();
?>
<?php echo bannerImage($post->ID); ?>
	<div class="testimonials-data">
        <div class="container"> 

        <div class="testimonial-row abc">
    		<?php 
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $args = array(
                'post_type'=> 'testimonials',
                'order'    => 'DESC',
                'posts_per_page' => -1,
                'post_status'   => 'publish',
                'paged' => $paged
                );              
            $the_query = new WP_Query( $args );
            // $featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
            if($the_query->have_posts() ) : 
            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
       
        <div class="testimonials-block">
    		<div class="testimonials-info">
	            <?php the_content(); ?>
	            <h4>-<?php the_title(); ?></h4>
	        </div>
		</div>
        <?php endwhile;
        endif; ?>
         </div> 
        <nav class="pagination">
            <?php
                /*echo paginate_links( array(
                    'format'  => 'page/%#%',
                    'current' => $paged,
                    'total'   => $the_query->max_num_pages,
                    'mid_size'        => 2,
                    'prev_text'       => __('&laquo;'),
                    'next_text'       => __(' &raquo;')
                ) );*/
                ?>
        </nav>
        <?php wp_reset_query(); ?>
        </div>
	</div>

<?php
get_footer();