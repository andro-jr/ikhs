<?php
	/**
		/*
		Template Name: Apply Header template
		
		* The header for our theme
		*
		* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
		*
		* @package ikhouvanshoppen 
	*/
	
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>> 
	
	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<!--<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.ico">-->
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
		
		
		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>
		<?php
			wp_body_open();
		?>
		
		<div id="Main_Bgs"></div>
		<div id="Main_Bgs2"></div>
		
		<div class="footerLhs_logo"> 
				<a href="<?php echo home_url();?>">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/ikvh_logo.png" alt="Logo"></a>
				<!--<a target="_blank" href="#">Know more</a>-->
			</div>
			
			<div class="footerRhs_logo">
				<div class="footerRhs_AppIcn">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/learn_more_icnNew.png" alt="Logo" class="learn_mrbtn">
				</div>
				<div class="footerRhs_AppIcn">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/local_market_icnNew.png" alt="Logo" class="prlt_33"><!--data-toggle="modal" data-target="#myModal"-->
				</div>
				<!-- <div class="footerRhs_AppIcn">
					<img src="<?php //echo esc_url( get_template_directory_uri() ); ?>/images/icons/AppStore_IconNew.png" alt="Logo">
				</div>
				<div class="footerRhs_AppIcn">
					<img src="<?php //echo esc_url( get_template_directory_uri() ); ?>/images/icons/GooglePlay_IconNew.png" alt="Logo">
				</div> -->
			</div>
			
		<div class="desktop-footer"></div>
		
		
		<div class="container-fluid desktop-view">
			
			
			
				