<?php
	/**
		* The main template file
		*
		/*
		Template Name: Partner Contact template
	*/
	get_header('seller');
?>

<div class="container-fluid">
	<div class="row">
	<div class="col-lg-12">
	
	
		<div class="col-lg-6 col-sm-12 col-xs-12">
			<div class="contact_lhs"> 
				<h3>Een Helpend Groen Handje nodig?</h3>
				<h4>Wij staan voor jou klaar!</h4>
				<p>Bellen of mailen, doe wat jij prettig vindt. 
Het contactformulier invullen kan natuurlijk ook! 
Uiterlijk binnen 2 werkdagen krijg je een antwoord van ons.
</p>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-xs-12 pl-0 mpr-0"> 
				<div class="col-lg-12 col-sm-12 col-xs-12 contact_phBox"> 
				<div class="col-lg-12 col-sm-12 col-xs-2 mpl-0">
					<i class="fa fa-phone contact_phBox_i"></i>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-10 mpl-0 mpr-0">
					<h4 class="contact_phBox_h4">Telefoon</h4>
					<p class="contact_phBox_p"><a href="tel:+31363333200">(+31) 036-3333200</a></p>
				</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-xs-12 pr-0 mpl-0"> 
			<div class="col-lg-12 col-sm-12 col-xs-12 contact_phBox"> 
				<div class="col-lg-12 col-sm-12 col-xs-2 mpl-0">
					<i class="fa fa-envelope-o contact_phBox_i"></i>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-10 mpl-0 mpr-0">
					<h4 class="contact_phBox_h4">E-mail</h4>
					<p class="contact_phBox_p">
						<a href="mailto:klantenservice@ikhouvanshoppen.nl">klantenservice@ikhouvanshoppen.nl</a></p>
				</div>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-xs-12 pl-0 pr-0"> 
			<div class="col-lg-12 col-sm-12 col-xs-12 contact_phBox"> 
				<div class="col-lg-12 col-sm-12 col-xs-2 mpl-0">
					<i class="fa fa-map-marker contact_phBox_i"></i>
				</div>
				<div class="col-lg-12 col-sm-12 col-xs-10 mpl-0 mpr-0">
					<h4 class="contact_phBox_h4">Adres</h4>
					<p class="contact_phBox_p"><a href="https://www.google.com/maps/dir//Websitebooster,+Xenonstraat+156,+1e+verdieping,+1362+GH+Almere,+Netherlands/@52.3555177,5.1643015,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x47c611d55ae0023d:0xacba7800f0b271a2!2m2!1d5.1664902!2d52.3555177" target="_blank" rel="noopener noreferrer">Xenonstraat 156 1362 GH Almere</a></p>
					
				</div>
				</div>
			</div>
			
		</div>
		
		<div class="col-lg-5 col-lg-offset-1 col-lg-12 col-sm-12 col-xs-12">
			<div class="clear mb-40"></div>
			<div class="contact_RHSbg">
				<?php echo do_shortcode( '[contact-form-7 id="760" title="Contact form 1"]' );?>
			</div>
		</div>
		
		
	</div>
	</div>
</div>
<div class="container-fluid">
			
			
			<?php //get_template_part( 'library/template-parts/page-title' ); ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part( 'library/template-parts/content', 'page' ); ?>
			
			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif; ?>
			
			<?php endwhile; // end of the loop. ?>
			
			<?php
				// Prevent weirdness
				wp_reset_postdata();
			?>
			
			</div> 
			
		</div> 
		
		
		<footer class="gnrl_footerBg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<a href="<?php echo home_url();?>">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/ikvh_logo.png" alt="Logo" class="logo"></a>
						<p class="prh"><span class="material-icons">location_on</span> Xenonstraat 156 1e verdieping<br> 
						1362 GH Almere.</p>	
<!-- 						<a href="#" class="social"><i class="fa fa-twitter"></i></a>
												<a href="#" class="social"><i class="fa fa-youtube"></i></a> -->
						<a href="<?php echo esc_url('https://www.facebook.com/ikhouvanshoppen.nl/') ?>" class="social"><i class="fa fa-facebook"></i></a>
						<a href="<?php echo esc_url('https://instagram.com/ikhouvanshoppen.nl') ?>" class="social"><i class="fa fa-instagram"></i></a>
						<a href="<?php echo esc_url('https://www.linkedin.com/company/ikhouvanshoppen-nl/') ?>" class="social"><i class="fa fa-linkedin"></i></a>
					</div>
					<div class="col-md-2 col-sm-3">
						<!-- <div class="maintxt">
							<h2><?php //echo get_the_title( $post = 1284 );?></h2>
							<div><span></span></div>
							<?php //echo get_post_field('post_content', 1284); ?> 
						</div> -->
					</div>
					<div class="col-md-2 col-sm-3">
						<div class="maintxt">
							<h2>PARTNER INFO</h2>
							<div><span></span></div>
							<?php echo get_post_field('post_content', 1320); ?> 
						</div>
					</div>
					<div class="col-md-2 col-sm-3">
						<div class="maintxt">
							<h2>IKHOUVANSHOPPEN</h2>
							<div><span></span></div>
							<?php echo get_post_field('post_content', 1325); ?> 
						</div>
					</div>
					<div class="col-md-2 col-sm-3">
						<div class="maintxt">
							<h2>KLANTENSERVICE</h2>
							<div><span></span></div>
							<?php echo get_post_field('post_content', 1327); ?> 
						</div>
					</div>
					
		</div>
		</div>
	</footer>
	
	
	<div class="copy_right_bg2">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<p class="txtcopy2">Copyright © 2021-IKVANSHOPPEN.NL. Designed and posted by Websitebooster</p>
				</div>
				<div class="col-md-6">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/accounts_icn.png" class="txtcopyImg2">
				</div>
			</div>
		</div>
	</div>
	
	
	<?php wp_footer(); ?>	