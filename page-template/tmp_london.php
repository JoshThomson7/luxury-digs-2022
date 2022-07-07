<?php
/**
 * Template Name: London page
 * The custom page template file
 */
get_header(); 
?>
<?php bannerImage($post->ID); ?>
<?php $loops = get_field('london_main_loop',$post->ID);
	if( !empty($loops) ) { ?>
<div class="listing-block-part abc">
	<div class="container">
		<?php foreach( $loops as $loop ) { ?>
		<div class="each-block">
			<?php if( $loop['london_main_loop_title'] ) { ?>
			<div class="block-main-title">
				<h2><?php echo $loop['london_main_loop_title']; ?></h2>	
			</div>
			<?php } ?>
			<?php $inner_loops = $loop['london_loop']; 
				if( !empty($inner_loops) ) { 
					foreach ( $inner_loops as $inner_loop) { ?>
			<div class="list-block">
				<?php if( $inner_loop['london_image'] ) { ?>
				<div class="block-img">
					<img src="<?php echo imageResizeNewFunc($inner_loop['london_image']['url'],330,230); ?>">
				</div>	
				<?php } ?>
				<div class="block-content">
					<?php if( $inner_loop['london_title'] ) { ?>
						<h4><?php echo $inner_loop['london_title']; ?></h4>
					<?php } ?>
					<?php if( $inner_loop['london_content'] ) { ?>
						<?php echo $inner_loop['london_content']; ?>
					<?php } ?>
					<?php $btn = $inner_loop['london_link']; 
					if( $btn ) { ?>
						<a class="btn" target="_blank" href="<?php echo $btn['url']; ?>" title="<?php echo $btn['title']; ?>"><?php echo $btn['title']; ?></a>
					<?php } ?>
				</div>
			</div>
		<?php } } ?>
		</div>
		<?php } ?>
	</div>
</div>
<?php } ?>
<?php get_footer(); ?>
