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
/*For the PDF title & Link*/
$download_floor_plan_title = get_field('download_floor_plan_title');
$download_floor_plan_here = get_field('download_floor_plan_here');
$energy_performance_certificate_title = get_field('energy_performance_certificate_title');
$energy_performance_certificate = get_field('energy_performance_certificate');
/*End*/
while ( have_posts() ) : the_post(); ?>
<section class="about-section text-center">
    <div class="container">
        <div class="heading">
          <h2><?php the_title(); ?></h2>
        </div>
    </div>
</section>
<div class="preperty-detail-data">
    <div class="container"> 
        <div class="preperty-detail-main">
            <?php echo do_shortcode('[wre_listing]'); ?>
        </div>
        <div class="preperty-detail-btn">
            <?php if($download_floor_plan_here && $download_floor_plan_title ){?>
        <a href="<?php echo $download_floor_plan_here;?>" class="btn" target="_blank"><?php echo $download_floor_plan_title;?></a>
    <?php } ?>
    <?php if($energy_performance_certificate && $energy_performance_certificate_title){?>

        <a href="<?php echo $energy_performance_certificate;?>" class="btn btn-border"target="_blank"><?php echo $energy_performance_certificate_title;?></a>
    <?php } ?>
    </div>
    </div>
    
</div>
<?php endwhile;
get_footer();