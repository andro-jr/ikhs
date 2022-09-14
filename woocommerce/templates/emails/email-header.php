<?php
	/**
		* Email Header
		*
		* This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
		*
		* HOWEVER, on occasion WooCommerce will need to update template files and you
		* (the theme developer) will need to copy the new files to your theme to
		* maintain compatibility. We try to do this as little as possible, but it does
		* happen. When this occurs the version of the template file will be bumped and
		* the readme will list any important changes.
		*
		* @see     https://docs.woocommerce.com/document/template-structure/
		* @package WooCommerce\Templates\Emails
		* @version 4.0.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<style>
		.email_phn a{color: #00cf70 !important;font-weight: unset !important;text-decoration: none !important;}
		p {margin-bottom: 0!important;}
		</style>
	</head>
	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
							<?php
								if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
									echo '<p style="margin-top:0;"><img src="' . esc_url( $img ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '" /></p>';
								}
							?>
						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header" bgcolor="#cdf5c0">
										<tr>    
											<td valign="top">    
												<?php
												$img_url = home_url().'/wp-content/uploads/2021/07/your_order_header.png';
												?>     
												<img src="<?php echo esc_url($img_url); ?>" width="620" height="">
											</td>    
										</tr>  
									
									</table>
									<!-- End Header -->
								</td>
							</tr>						
							
							