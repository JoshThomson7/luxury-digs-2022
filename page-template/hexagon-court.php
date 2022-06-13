<?php
/**
 * Template Name: hexagon-court page
 * The custom page template file
 */
get_header();
$hexagon_logos_after_content = get_field('hexagon_logos_after_content');
while ( have_posts() ) : the_post();
?>
<?php echo bannerImage($post->ID); 

	$construction_title 		= get_field('construction_title');
	$finished_products_title	= get_field('finished_products_title');
?>
<div class="about-detail">
	<div class="container">
		<?php the_content(); ?>
		<?php

// check if the repeater field has rows of data
if( have_rows('hexagon_logos') ){?>
	<div class="accredited-logo">
		<?php 
		 	// loop through the rows of data
		    while ( have_rows('hexagon_logos') ) { the_row();

		        // display a sub field value
		        $imgs = get_sub_field('hexa_logo');?>
		        <img src="<?php echo $imgs;?>">

		        <?php 

		   		}?>
	</div>
   <?php 
}

?>
	<?php echo $hexagon_logos_after_content;?>
		<?php if(is_page('hexagon-court')){?>


		<div class="section-pdng">
			<?php if($construction_title){?>
		    <div class="heading">
		        <h2><?php echo $construction_title;?></h2>
		    </div>
			<?php } ?>
		    <div class="gallery-grid">
		    	<?php

// check if the repeater field has rows of data
if( have_rows('construction_images') ):

 	// loop through the rows of data
    while ( have_rows('construction_images') ) : the_row();

        // display a sub field value
        
        $construction_img = get_sub_field('construction_img');?>
               <a href="<?php echo $construction_img;?>" data-lightbox="image-1" data-title="ppr_news8"><img src="<?php echo imageResizeNewFunc($construction_img,300,300);?>"></a>
<?php 
    endwhile;

else :

    // no rows found

endif;

?>

		    </div>
		    </div>
		    <div class="section-pdng">
		    <?php if($finished_products_title){?>
		    <div class="heading">
		        <h2><?php echo $finished_products_title;?></h2>
		    </div>
			<?php } ?>
		      <div class="gallery-grid">
		      		    	<?php

// check if the repeater field has rows of data
if( have_rows('finished_products') ):

 	// loop through the rows of data
    while ( have_rows('finished_products') ) : the_row();

        // display a sub field value
        $finished_pro = get_sub_field('finished_pro');?>
              <a href="<?php echo $finished_pro;?>" data-lightbox="image-1" data-title="ppr_news8"><img src="<?php echo imageResizeNewFunc($finished_pro,300,300);?>"></a>

<?php 
    endwhile;

else :

    // no rows found

endif;

?>
		      
		    </div>
		<?php } ?>
		</div>
	</div>
</div>
<?php
endwhile;
get_footer();