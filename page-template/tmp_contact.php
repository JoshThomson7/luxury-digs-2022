<?php
/**
 * Template Name: Contact page
 * The custom page template file
 */
get_header(); 
?>
<?php echo bannerImage($post->ID); ?>
<?php 
	$report_a_problem_title = get_field('report_a_problem_title');
	$report_a_problem_link = get_field('report_a_problem_link');

?>
<div class="main">
	<div class="contact-main">
		<div class="container">
			<div class="contact-detail">
				<div class="address-data">
				<?php if( get_field('contact_address') ) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/home-address.png">
					<div class="contact-address">
						<p><?php echo get_field('contact_address'); ?></p>
					</div>
				<?php } ?>
				</div>
				<div class="address-data">
				<?php if( get_field('contact_toll_free_number') ) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/telephone.png">
					<div class="contact-address">
						<a href="tel:<?php echo get_field('contact_toll_free_number'); ?>" target="_blank"><?php echo get_field('contact_toll_free_number'); ?></a><br>
					
				<?php } ?>
				<?php if( get_field('contact_phone_number') ) { ?>
					<a href="tel:<?php echo get_field('contact_phone_number'); ?>" target="_blank"><?php echo get_field('contact_phone_number'); ?></a>
					</div>
				<?php } ?>
				</div>
				<div class="address-data">
				<?php if( get_field('contact_email') ) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/message-closed-envelope.png">
					<div class="contact-address">
						<a href="mailto:<?php echo get_field('contact_email'); ?>" target="_blank"><?php echo get_field('contact_email'); ?></a>
					</div>
				<?php } ?>
				</div>
			</div>
			<div class="contact-form">
				<?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
			</div>
			<div class="contact-report-block">
				<a href='<?php echo $report_a_problem_link;?>' target="_blank" class="btn"><?php echo $report_a_problem_title;?></a>
				<p>If you are a resident in one of our properties and would like to report a problem, please click on this button</p>
			</div>
			
		</div>	
		<?php $location = get_field('contact_map');
		if( $location) { ?>
		<div id="googleMap" style="width:100%;height:400px;"></div>
		<?php } ?>
	</div>
</div>
<script>
 function initMap() {
	 	var location = '<?php echo json_encode(get_field('contact_map')); ?>';
		console.log(location);
		location = JSON.parse(location);
		var lat = location['lat'];
		var lng = location['lng'];
        var myLatLng = {lat: parseFloat(lat), lng: parseFloat(lng)};

        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 14,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map
        });
      }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLtE0oa3Fk39718WMtBKxYxdhu3y1p4jU&callback=initMap"></script>
<?php
get_footer();