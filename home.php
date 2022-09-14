<?php
	/**
		* The main template file
		*
		/*
		Template Name: Home Map template
	*/
	
	get_header(); 
?>

<div class="radius_map">
	<iframe src="https://www.google.com/maps/d/embed?mid=1JwZoueQvjLccvDn3lFkY7d9izQl5ExZ6" class="map_height"></iframe>
	<!--<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d77953.69913213207!2d5.179658412393855!3d52.36945719981543!3m2!1i1024!2i768!4f13.1!2m1!1sshops%20near%20Almere%2C%20Netherlands!5e0!3m2!1sen!2sin!4v1615210053377!5m2!1sen!2sin" class="map_height" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
</div>

<div class="hpro_fltrbg">
	<i><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/stores_icn.png" class="img-responsive"></i>
	<div class="hd_txt">
		<h3>58 winkels bij u in de buurt gevonden</h3>
		<h5>Veeg omhoog voor meer informatie</h5>
	</div>
	<div class="hd_arrow">
		<div class="material-icons MuiIcon-root">keyboard_arrow_right</div>
	</div>
</div>

<?php
	get_footer(); 

