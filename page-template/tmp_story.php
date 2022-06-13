<?php
/**
 * Template Name: Story page
 * The custom page template file
 */
get_header();
?>
<?php echo bannerImage($post->ID); ?>
<div class="main">
	<div class="blog-listing-main">
		<div class="container clearfix cf">
			<div class="page-des">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					the_content();
					endwhile; else: ?>
					<?php endif; ?>
			</div>

			<?php 
			// $args = array(
			//     'post_type'=> 'story',
			//     'order'    => 'DESC',
			//     'posts_per_page' => 10,
			//     'post_status'	=> 'publish'
			//     );              
			// $the_query = new WP_Query( $args );
			// if($the_query->have_posts() ) :
			// 	while ( $the_query->have_posts() ) : $the_query->the_post(); 
			// $categories = get_the_category();
			// 		$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		              // if ( ! empty ($full_image) ) { 
		              //     $img = imageResizeNewFunc( $full_image[0],370,220);
		              // } else {
		              //     $img = esc_url( get_template_directory_uri() )."/img/placeholder-image.png";
		              // } ?>
		          <!--   <div class="blog-post-block">  
		            	<div class="bg-set-blog">
				            <div class="post-image"> -->
				            	
				            	<?php //if ( ! empty ($full_image) ){ ?>
				            		<!-- <img src="<?php echo imageResizeNewFunc( $full_image[0],370,220); ?>"> -->
				            	<?php //} else { ?>
				            	<?php //$link = get_field('post_video'); ?>
				            	<!-- <iframe width="370" height="220" src="<?php echo get_field('post_video'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
				            	<!-- <div class="play-icon">
				            		<a class="youtube cboxElement play-video" href="<?php echo $link; ?>" target="_blank" rel="slideshow"><i class="fa fa-play" aria-hidden="true"></i></a>
				            	</div> -->
				            	<?php 
				            		//preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $link, $match);
				            		//preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
									//$youtube_id = $match[1]; 
									//echo $youtube_id; ?>
									<!-- <img src="http://img.youtube.com/vi/<?php echo $youtube_id; ?>/0.jpg" width="370" height="400" /> -->
								<!-- <div class="play-video"><i class="fa fa-play" aria-hidden="true"></i></div> -->
								<?php //} ?>
				            <!-- </div>
				            <div class="post-details">
								<h4><?php the_title();?></h4>
								<span><?php echo esc_html( $categories[0]->name ); ?></span>
								<p><?php echo wp_trim_words(get_the_excerpt(), '35','...'); ?></p>
								<a class="btn" href="<?php echo get_the_permalink(); ?>">Read more <i class="fa fa-caret-right" aria-hidden="true"></i></a>	
							</div>		
						</div>	
					</div> -->
					<?php 
			// 	 endwhile;
			// endif; ?>
		</div>	
	</div>
</div>
<?php get_footer();