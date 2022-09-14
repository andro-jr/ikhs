<?php
	/**
		* The main template file
		*
		* Template Name: New Home template
		
	*/
	
	get_header(); 
?>


<?php if(checkMobile() != 1){ ?>
<div class="Npg_sliderBg">
	<div class="container-fluid">
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="inverse">
				<!--carousel-->
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/home-slider-1.png" alt="" class="img-responsive mainslide_img">
						<div class="slider_capBg">
							<!--<p>ENJOY 40% OFF Coupon code: COZ18AZ</p>
							<h3>WOMEN'S <br>Best of GLASSES</h3>-->
							<!--<a href="#"><button>SHOP NOW</button></a>-->
						</div>
					</div>
					<div class="item">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/home-slider-1.png" alt="" class="img-responsive mainslide_img">
						<div class="slider_capBg">
							<!--<p>ENJOY 40% OFF Coupon code: COZ18AZ</p>
							<h3>WOMEN'S <br>Best of GLASSES</h3>-->
							<!--<a href="#"><button>SHOP NOW</button></a>-->
						</div>
					</div>
					<div class="item">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/home-slider-1.png" alt="" class="img-responsive mainslide_img">
						<div class="slider_capBg">
							<!--<p>ENJOY 40% OFF Coupon code: COZ18AZ</p>
							<h3>WOMEN'S <br>Best of GLASSES</h3>-->
							<!--<a href="#"><button>SHOP NOW</button></a>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php if(checkMobile() == 1){ ?>
<div class="Npg_sliderBg">
	<div class="container-fluid">
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="inverse">
				<!--carousel-->
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/home-slider-mobi.png" alt="" class="img-responsive mainslide_img">
					</div>
					<div class="item">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/home-slider-mobi.png" alt="" class="img-responsive mainslide_img">
					</div>
					<div class="item">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/home-slider-mobi.png" alt="" class="img-responsive mainslide_img">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>




<div class="clear mb-40 hidden-xs"></div>
<div class="clear mb-20 hidden-xl hidden-lg hidden-md hidden-sm"></div>
<div class="container-fluid home_newWD">
	<div class="row">
		<div class="clear mb-15 hidden-xs"></div>
		<div class="col-md-12">
			<div class="Nhp_headtxtbg">
				<h3>Kies een categorie</h3>
				<div></div>
			</div>
		</div>
		<?php
			$taxonomy     = 'product_cat';
			$orderby      = 'name';  
			$show_count   = 0;
			$pad_counts   = 0;
			$hierarchical = 1;
			$title        = '';  
			$empty        = 0;

			
			$args = array(
			'taxonomy'     => $taxonomy,
			'orderby'      => $orderby,
			'show_count'   => $show_count,
			'pad_counts'   => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li'     => $title,
			'hide_empty'   => $empty,
			'parent'       => 0
			);
			
			$all_cat = get_categories( $args ); 
			
			//var_dump($all_cat); 
		?>

		<div class="col-md-12 cat_sldWidth">
			<div id="owl-demo3" class="owl-carousel owl-theme">
				<?php foreach ($all_cat as $cat) {		
					$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					 $category_link = get_category_link($cat->cat_ID);
					
					echo '<div class="owl-item active">';
					echo '<a href="'.esc_url($category_link).'"><img src="' . esc_url($image) . '" class="img-responsive cat_sliderImg"/></a>';
					echo '<div class="clear mb-20"></div>';
					echo '<a href="'.esc_url($category_link).'"><h5 class="owlcat_txt">'.esc_html($cat->name).'</h5></a>';
					echo '</div>';
					
				}
				?>
			</div>
		</div>
	</div>
</div>





<div class="clear mb-50 hidden-xs hidden-sm"></div>
<div class="container-fluid home_newWD2 hidden-xs hidden-sm">
	<div class="row">
		<!--<div class="col-md-12">
			<img src="<?php //echo esc_url( get_template_directory_uri() ); ?>/images/img/shiping_imgs.png" class="img-responsive home_shpingimg">
		</div>-->
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/shop_online.png" class="img-responsive">
				<h3>Shop Online</h3>
				<!--<span></span>-->
				<p>Kies bewust en koop jouw duurzame producten op ons groene platform.</p>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/shop_local.png" class="img-responsive">
				<h3>Shop Lokaal</h3>
				<!--<span></span>-->
				<p>Liever shoppen in de winkel? Met onze Shop Lokaal Kaart vind je de lokale winkel bij jou in de buurt.</p>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/payment_icon.png" class="img-responsive">
				<h3>Betaal op jouw manier</h3>
				<!--<span></span>-->
				<p>Betaal jouw aankopen in een veilige omgeving. Vooraf of Achteraf, bij ons geen probleem.</p>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/greenest_icon.png" class="img-responsive">
				<h3>Groen, Groener, Groenst</h3>
				<!--<span></span>-->
				<p>Enkel Groene, Duurzame, Vegan, Biologische, Fairtrade producten vind je op ikhouvanshoppen.nl</p>
			</div>
		</div>
		
	</div>
</div>






<div class="clear mb-10 hidden-xl hidden-lg hidden-md"></div>
<div class="container-fluid home_newWD2 hidden-xl hidden-lg hidden-md">
	<div class="row">
		
		<div id="owl-usp" class="owl-carousel owl-theme">
		
			<div class="owl-item active">
				<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/shop_online.png" class="img-responsive">
				<h3>Shop Online</h3>
				<!--<span></span>-->
				<p>Kies bewust en koop jouw duurzame producten op ons groene platform.</p>
			</div>
			</div>
			<div class="owl-item">
				<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/shop_local.png" class="img-responsive">
				<h3>Shop Lokaal</h3>
				<!--<span></span>-->
				<p>Liever shoppen in de winkel? Met onze Shop Lokaal Kaart vind je de lokale winkel bij jou in de buurt.</p>
			</div>
			</div>
			<div class="owl-item">
				<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/payment_icon.png" class="img-responsive">
				<h3>Betaal op jouw manier</h3>
				<!--<span></span>-->
				<p>Betaal jouw aankopen in een veilige omgeving. Vooraf of Achteraf, bij ons geen probleem.</p>
			</div>
			</div>
			<div class="owl-item">
				<div class="hm_payBoxbgg"> 
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/greenest_icon.png" class="img-responsive">
				<h3>Groen, Groener, Groenst</h3>
				<!--<span></span>-->
				<p>Enkel Groene, Duurzame, Vegan, Biologische, Faitrade producten vind je op ikhouvanshoppen.nl</p>
			</div>
			</div>
			
		</div>
		
	</div>
</div>

<div class="clear mb-50"></div>
<div class="container-fluid home_newWD">
	<div class="row">
		<div class="col-md-12">
			<div class="Nhp_headtxtbg">
				<h3>Nieuwe artikelen</h3>
				<div></div>
			</div>
		</div>
		<div class="col-md-12 cat_sldWidth">
			<div id="owl-demo4" class="owl-carousel owl-theme">
				<?php
					$query_args = array(
					'posts_per_page' => 15,
					'no_found_rows' => 1,
					'post_type' => 'product',
					'post_status' => 'publish',
				    'orderby' => 'publish_date',
				    'order' => 'DESC',
					);
					$products = new WP_Query($query_args);
					
					if ($products->have_posts()) :
					while ($products->have_posts()) : $products->the_post();
					
					$post_thumbnail_id = get_post_thumbnail_id();
					$product_thumbnail = wp_get_attachment_url($post_thumbnail_id, $size = 'shop-feature');
					$product_thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
					$price = $product->get_regular_price();
					$product_link = get_permalink();
					
					
					echo '<div class="owl-item active">';
					echo '<div class="Nh_productBg">';
					// echo '<i class="fa fa-heart-o"></i>';
					echo '<a href="'.esc_url($product_link).'"><img src="'. esc_url($product_thumbnail) .'" class="img-responsive"/></a>';
					echo '<span class="#"></span>';
					echo '<a href="'.esc_url($product_link).'"><h5>'.esc_html(get_the_title()).'<br></h5></a>';
					echo '<p>'. '€' . ' ' . esc_html($price) .'</p>';
					echo '</div>';
					echo '</div>';
					
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div> 





<div class="clear mb-50"></div>
<div class="container-fluid home_newWD">
	<div class="row">
		<div class="col-md-12">
			<div class="Nhp_headtxtbg">
				<h3><?php echo esc_html(the_field('second_section')); ?></h3>
				<div></div>
			</div>
		</div>
		<div class="col-md-4 col-sm-4">
			<a href="<?php echo esc_url(the_field('first_category_url')); ?>"><img src="<?php echo esc_url(the_field('first_category_image')); ?>" class="img-responsive"></a>
			<div class="mb-15 hidden-xs"></div>
			<div class="mb-20 hidden-xl hidden-lg hidden-md hidden-sm"></div>
			<a href="<?php echo esc_url(the_field('second_category_url')); ?>"><img src="<?php echo esc_url(the_field('second_category_image')); ?>" class="img-responsive"></a>
			<div class="mb-20 hidden-xl hidden-lg hidden-md hidden-sm"></div>
		</div>
		<div class="col-md-4 col-sm-4">
			<a href="<?php echo esc_url(the_field('third_category_url')); ?>"><img src="<?php echo esc_url(the_field('third_category_image')); ?>" class="img-responsive"></a>
			<div class="mb-20 hidden-xl hidden-lg hidden-md hidden-sm"></div>
		</div>
		<div class="col-md-4 col-sm-4">
			<a href="<?php echo esc_url(the_field('fourth_category_url')); ?>"><img src="<?php echo esc_url(the_field('fourth_category_image')); ?>" class="img-responsiv"></a>
			<div class="mb-15 hidden-xs"></div>
			<div class="mb-20 hidden-xl hidden-lg hidden-md hidden-sm"></div>
			<a href="<?php echo esc_url(the_field('fifth_category_url')); ?>"><img src="<?php echo esc_url(the_field('fifth_category_image')); ?>" class="img-responsive"></a>
			<div class="mb-20 hidden-xl hidden-lg hidden-md hidden-sm"></div>
		</div>
	</div>
</div>



<div class="clear mb-50"></div>
<div class="container-fluid home_newWD">
	<div class="row">
		<div class="col-md-12">
			<div class="Nhp_headtxtbg">
				<h3>Kies jouw product</h3>
				<div></div>
			</div>
		</div>
		<div class="col-md-12 cat_sldWidth">
			<div id="owl-demo5" class="owl-carousel owl-theme">
				<?php
					$query_args = array(
					'posts_per_page' => 10,
					'no_found_rows' => 1,
					'post_type' => 'product',
					'post_status' => 'publish',
				    'orderby' => 'publish_date',
				    'order' => 'ASC',
					);
					$products = new WP_Query($query_args);
					
					if ($products->have_posts()) :
					while ($products->have_posts()) : $products->the_post();
					
					$post_thumbnail_id = get_post_thumbnail_id();
					$product_thumbnail = wp_get_attachment_url($post_thumbnail_id, $size = 'shop-feature');
					$product_thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
					$price = $product->get_regular_price();
					$product_link = get_permalink();
					
					
					echo '<div class="owl-item active">';
					echo '<div class="Nh_productBg">';
					// echo '<i class="fa fa-heart-o"></i>';
					echo '<a href="'.esc_url($product_link).'"><img src="'. esc_url($product_thumbnail) .'" class="img-responsive"/></a>';
					echo '<span class="#"></span>';
					echo '<a href="'.esc_url($product_link).'"><h5>'.esc_html(get_the_title()).'<br></h5></a>';
					echo '<p>'. '€' . ' ' . esc_html($price) .'</p>';
					echo '</div>';
					echo '</div>';
					
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div> 



<style>
	body{
	background: #fff !important;
	}
</style>
<script>
	jQuery(document).ready(function() { 
	jQuery("#owl-usp").owlCarousel({
			navigation: true,
			navigationText: [
			"<i class='usp_lftarrow fa fa-angle-left'></i>",
			"<i class='usp_rgtarrow fa fa-angle-right'></i>"
			],
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: false,
			//autoPlay: 5000,
			stopOnHover: false,
			dots: true,
			items: 10,
			responsive: {
				0: {
					items: 1
				},
				468: {
					items: 1
				},
				768: {
					items: 4
				},
				1000: {
					items: 3
				}
			}
		});
		jQuery("#owl-demo3").owlCarousel({
			navigation: true,
			navigationText: [
			"<i class='spkrslid_lftarrow fa fa-angle-left'></i>",
			"<i class='spkrslid_rgtarrow fa fa-angle-right'></i>"
			],
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: false,
			//autoPlay: 5000,
			stopOnHover: false,
			dots: true,
			items: 4,
			responsive: {
				0: {
					items: 1
				},
				468: {
					items: 1
				},
				768: {
					items: 4
				},
				1000: {
					items: 3
				}
			}
		});
		
		jQuery("#owl-demo4").owlCarousel({
			navigation: true,
			navigationText: [
			"<i class='spkrslid_lftarrow2 fa fa-angle-left'></i>",
			"<i class='spkrslid_rgtarrow2 fa fa-angle-right'></i>"
			],
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: false,
			//autoPlay: 5000,
			stopOnHover: false,
			dots: true,
			items: 5,
			responsive: {
				0: {
					items: 1
				},
				468: {
					items: 1
				},
				768: {
					items: 3
				},
				1000: {
					items: 3
				}
			}
		});
		jQuery("#owl-demo5").owlCarousel({
			navigation: true,
			navigationText: [
			"<i class='spkrslid_lftarrow2 fa fa-angle-left'></i>",
			"<i class='spkrslid_rgtarrow2 fa fa-angle-right'></i>"
			],
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: false,
			//autoPlay: 5000,
			stopOnHover: false,
			dots: true,
			items: 5,
			responsive: {
				0: {
					items: 1
				},
				468: {
					items: 1
				},
				768: {
					items: 3
				},
				1000: {
					items: 3
				}
			}
		});
		
		jQuery("#owl-demo6").owlCarousel({
			navigation: true,
			navigationText: [
			"<i class='spkrslid_lftarrow2 fa fa-angle-left'></i>",
			"<i class='spkrslid_rgtarrow2 fa fa-angle-right'></i>"
			],
			slideSpeed: 300,
			paginationSpeed: 400,
			singleItem: false,
			//autoPlay: 5000,
			stopOnHover: false,
			dots: true,
			items: 5,
			responsive: {
				0: {
					items: 1
				},
				468: {
					items: 1
				},
				768: {
					items: 3
				},
				1000: {
					items: 3
				}
			}
		});
		
	});
</script>
<?php
get_footer();		