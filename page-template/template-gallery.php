<?php 
/*Template Name: gallery page*/
get_header();
?>
<?php echo bannerImage($post->ID); ?>
<div class="section-pdng">
   <div class="container">
    <div class="gallery-block">

      <?php
        
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
        $gallery_images= get_sub_field('gallery_images'); ?>

        <div>
          <a href=" <?php echo imageResizeNewFunc($gallery_images,1400,933); ?>" data-lightbox="image-1" data-title="ppr_news8">
            <img src=" <?php echo imageResizeNewFunc($gallery_images,1400,933); ?>">
          </a>
        </div>

        <?php endwhile; ?>
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
        ) );
        ?>

    </div>

    <?php else: ?>
    // no rows found
    <?php endif; ?>

  </div>
    
</div>
<?php get_footer();