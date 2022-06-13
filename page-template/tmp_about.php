<?php
/**
 * Template Name: About page
 * The custom page template file
 */
get_header();
while ( have_posts() ) : the_post();
?>
<?php echo bannerImage($post->ID); 
	
	$modern_living_content = get_field('modern_living_content');
	$logos_content = get_field('logos_content');
	$accredited = get_field('accredited');

?>
<div class="about-detail">
	<div class="container">
		<?php the_content(); ?>
		<p><?php echo $modern_living_content;?>
		<div class="accredited-logo">
			<?php

// check if the repeater field has rows of data
if( have_rows('modern_living_logos') ):

 	// loop through the rows of data
    while ( have_rows('modern_living_logos') ) : the_row();

        // display a sub field value
        $modern_logos = get_sub_field('modern_logos');?>
              <img src="<?php echo $modern_logos['url'];?>" alt="dummy img"> 
<?php 
    endwhile;

else :

    // no rows found

endif;

?>
		</div>

	<p><?php echo $logos_content;?></p>
	<p><?php echo $accredited;?></p>
		<div class="client-inner about-client-inner">
			<?php

// check if the repeater field has rows of data
if( have_rows('accredited_logo') ):

 	// loop through the rows of data
    while ( have_rows('accredited_logo') ) : the_row();

        // display a sub field value
        $accredited_images = get_sub_field('accredited_images');?>
              <img src="<?php echo $accredited_images['url'];?>" alt="dummy img"> 
<?php 
    endwhile;

else :

    // no rows found

endif;

?>
		</div>

	</div>
</div>
<!-- </div> -->
<?php
endwhile;
get_footer();