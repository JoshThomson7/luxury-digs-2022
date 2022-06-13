<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
get_header();
while ( have_posts() ) : the_post();
?>
<?php //echo bannerImage($post->ID);
 $banner_image = get_field('post_banner_image',$post->ID); 
    if( $banner_image ){ ?>
    <section class="header-tittle" style="background-image: url('<?php echo imageResizeNewFunc($banner_image['url'],1799,570); ?>');">
	</section>
<?php } ?>
<section class="about-section text-center">
	<div class="container">
        <div class="heading">
          <h2><?php the_title(); ?></h2>
          
        </div>
    </div>
</section>
<?php $full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<div class="container">
	<div class="single-post-info">
		<div class="post-thumbanil">
			<p>
			<img src="<?php echo $full_image[0]; ?>">
			</p>
				
		</div>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
		<div class="post-gallery">

		<?php $images = get_field('post_gallery_loop');
			if( $images ) { 
			foreach ($images as $image) { ?>
				<!-- <img src="<?php echo $image['post_gallery_loop_image']['url']; ?>"> -->
				<a href="<?php echo $image['post_gallery_loop_image']['url']; ?>" data-lightbox="image-1" data-title="<?php echo $image['post_gallery_loop_image']['title']; ?>"><img src="<?php echo $image['post_gallery_loop_image']['url']; ?>"></a>
			<?php } } ?>
			
		</div>
	</div>
	
        	<div class="po-tag">
        				<?php the_tags() ;?>
        	</div>
			
</div>
		<?php
		endwhile;?>
<?php get_footer();
