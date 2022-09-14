<?php
	/**
	/*
		Template Name: Apply Footer template
		
		* The template for displaying the footer
		*
		* Contains the opening of the #site-footer div and all content after.
		*
		* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
		*
		* @package ikhouvanshoppen 
	*/
	
?>

</div> 

<div id="footerBg">
	<a href="<?php echo home_url().'/';?>">
		<button>
			<!--<span class="material-icons MuiIcon-root">home</span>-->
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/home_icn.png" class="img-responsive">
			<h6 class="">Huis</h6>
		</button>
	</a>
	
	<a href="#">
		<button>
			<!--<span class="material-icons MuiIcon-root">storefront</span>-->
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/mystore_icn.png" class="img-responsive">
			<h6 class="">Mijn winkel</h6>
		</button>
	</a>
	
	<a href="<?php echo home_url().'/login';?>">
		<button class="login_Mpos"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/login_logo.png" class="login_logoPs"></button>
	</a>
	
	<a href="#">
		<button>
			<!--<span class="material-icons MuiIcon-root">local_mall</span>-->
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/orders_icn.png" class="img-responsive">
			<h6 class="">Bestellingen</h6>
		</button>
	</a>
	
	<a href="#">
		<button>
			<!--<span class="material-icons MuiIcon-root">notifications</span>-->
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/notifications_icn.png" class="img-responsive">
			<h6 class="">Kennisgeving</h6>
		</button>
	</a>
	
</div>

<?php wp_footer(); ?>


 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/cart_icon.png">
        </div>
        <div class="modal-body">
          <p class="modal_head">Het platform voor jouw <br>bewuste keuze.</p>
          <p class="modal_small"> Shop bij ons jouw duurzame <br>producten in de winkel of online. </p>
        </div>
      </div>
      
    </div>
  </div>
  
 
  
  <style>
  #myModal .modal-dialog{
	width: 450px;
  }
   #myModal .modal-dialog .modal-content{
	border-radius: 20px;
    height: 380px;
  }
     #myModal .modal-content .modal-header{
	background: linear-gradient(45deg, #00e447, #00bd95);
    border-radius: 20px 20px 0 0;
    height: 130px;
    text-align: center;
  }
   #myModal .modal-content .modal-header img{
	margin: 0 auto;
    margin-top: 15px;
   }
   #myModal .modal-content .modal-header button{
	color: #fff;
    opacity: 1;
    font-size: 25px;
    font-weight: 400;
   }	
   .modal_head{
   font-family: 'Montserrat', sans-serif;
    letter-spacing: 0;
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    line-height: 1.3;
    padding-top: 20px;
   }
   .modal_small{
       font-family: 'Montserrat', sans-serif;
    letter-spacing: 0;
    font-size: 12px;
    text-align: center;
    font-weight: 500;
    line-height: 1.6;
   }
  </style>
</body>
</html>
