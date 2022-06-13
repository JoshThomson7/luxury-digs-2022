<?php 
/*Template Name: gallery page*/
get_header();
?>
<section class="banner-section" style="background-image: url(https://luxurydigs.co.uk/wp-content/uploads/2019/10/banner.jpg)">
    <div class="container">
        <div class="banner-main">
            <div class="banner-content">
                <h1>Building Property and Developing Homes for Renters</h1>
                <p>We are a different type of letting company.</p><a href="https://luxurydigs.co.uk/about-us" class="btn">About us</a>
            </div>
        </div>
    </div><!-- container end -->
</section>
<div class="section-pdng">
   <div class="container">
    <div class="heading text-center">
        <h2>Gallery</h2>
    </div>
    <div class="gallery-block">

        <?php
        /**/

if( get_query_var('page') ) {
  $page = get_query_var( 'page' );
} else {
  $page = 1;
}

// Variables
$row              = 0;
$images_per_page  = 9; // How many images to display on each page
$images           = get_field( 'gallery_section' );
$total            = count( $images );
$pages            = ceil( $total / $images_per_page );
$min              = ( ( $page * $images_per_page ) - $images_per_page ) + 1;
$max              = ( $min + $images_per_page ) - 1;

// ACF Loop
/**/

// check if the repeater field has rows of data
if( have_rows('gallery_section') ):
    while ( have_rows('gallery_section') ) : the_row();

    $row++;
    if($row < $min) { continue; }
    if($row > $max) { break; }                   

        // display a sub field value
        $gallery_images= get_sub_field('gallery_images');

         ?>

        <div> <a href=" <?php echo imageResizeNewFunc($gallery_images,1400,933); ?>" data-lightbox="image-1" data-title="ppr_news8"><img src=" <?php echo imageResizeNewFunc($gallery_images,1400,933); ?>"></a></div>

        <?php 

    endwhile;
?>
</div>
<div class="pagination">
<?php 
    echo paginate_links( array(
    'base' => get_permalink() . '%#%' . '/',
    'format' => '?page=%#%',
    'current' => $page,
    'total' => $pages,
    'prev_text' => '<<',
  'next_text' => '>>'
    ) );?>
    </div>
    <?php 

else :

    // no rows found

endif;

?>
    </div>
    
</div>
<?php get_footer();