<?php
	/**
		* The template for displaying the footer
		*
		* Contains the opening of the #site-footer div and all content after.
		*
		* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
		*
		* @package ikhouvanshoppen 
	*/
	
?>

<footer class="gnrl_footerBg">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-12">
				<a href="<?php echo home_url();?>">
				<img src="https://bestforyourbody.shop/wp-content/uploads/2022/06/BFYB_Logo_1234-x-236.jpg" alt="Logo" class="logo"></a>
				<a href="https://goo.gl/maps/eL9uWHwEZHyDr6Wo8" target="_blank"><p class="prh"><span class="material-icons">location_on</span> Gesloten Stad 22, 3823 DP, Amersfoort<br> 
				</p></a>	
				<!--<a href="#" class="social"><i class="fa fa-twitter"></i></a>-->
				<a href="https://www.facebook.com/bestforyourbodyshop" target="_blank" class="social"><i class="fa fa-facebook"></i></a>
				<a href="https://www.instagram.com/bestforyourbodyshop/" target="_blank" class="social"><i class="fa fa-instagram"></i></a>
				<!-- <a href="https://www.linkedin.com/company/ikhouvanshoppen-nl/" class="social"><i class="fa fa-linkedin"></i></a> -->
				<!--<a href="#" class="social"><i class="fa fa-youtube"></i></a>-->

			</div>
			<div class="col-md-1 col-md-offset-2 col-sm-3">
			
			</div>
			<div class="col-md-3 col-sm-3 bfyb">
				<div class="maintxt">
					<h2><?php echo get_the_title( $post = 206 );?></h2>
					<div><span></span></div>
					<?php echo get_post_field('post_content', 206); ?> 
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="maintxt">
					<h2><?php echo get_the_title( $post = 208 );?></h2>
					<div><span></span></div>
					<?php echo get_post_field('post_content', 208); ?> 
				</div>
			</div>
			
		</div>
	</div>
</footer>


<div class="copy_right_bg">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p class="txtcopy">Copyright © 2022-bestforyoubody.shop. Ontworpen en geplaatst door <a href="https://websitebooster.nl/" target="_blank">Websitebooster</a> </p>
			</div>
			<!--<div class="col-md-6 col-sm-12">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/paypal_icn.png" class="txtcopyImg">
			</div>-->
		</div>
	</div>
</div>



<?php wp_footer(); ?>

</body>
</html>