<?php
/**
 * Template Name: Rental Properties page
 * The custom page template file
 */
get_header();
?>
<?php echo bannerImage($post->ID); ?>
<?php $tag_line = get_field('tag_line');?>
<div class="property-data abc">
   
    <div class="property-main">
        <?php if($tag_line){?>
        <div class="text-center tag-line"> 
            <div class="back-img" style="background-image: url(https://luxurydigs.co.uk/wp-content/themes/ppc-capital/images/rent.jpg)">	
                <div class="container">
                    <p><?php echo $tag_line;?></p>
                
                <?php } ?>
                    	<?php echo do_shortcode('[wre_search]'); ?>
                </div>
            </div><!-- back img -->	
                    	<?php echo do_shortcode('[wre_archive_listings]'); ?>
                    	<?php //echo do_shortcode('[wre_map]'); ?>
      <!--   </div> container --> 
        </div><!-- tag -->
    </div>
</div>
<?php
get_footer();