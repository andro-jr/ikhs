<?php
	/**
		* Email Addresses
		*
		* This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
		*
		* HOWEVER, on occasion WooCommerce will need to update template files and you
		* (the theme developer) will need to copy the new files to your theme to
		* maintain compatibility. We try to do this as little as possible, but it does
		* happen. When this occurs the version of the template file will be bumped and
		* the readme will list any important changes.
		*
		* @see https://docs.woocommerce.com/document/template-structure/
		* @package WooCommerce\Templates\Emails
		* @version 3.9.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	$text_align = is_rtl() ? 'right' : 'left';
	$address    = $order->get_formatted_billing_address();
	$shipping   = $order->get_formatted_shipping_address();
	
?>
<tr><td valign="top" height="20"></td></tr>
<tr>
	<td>
		<table border="0" cellpadding="0" align="center" cellspacing="0" width="500" style="background: #fff;font-family: 'Montserrat', sans-serif;padding: 20px;border-radius: 6px;box-shadow: 0 3px 6px 0 rgb(0 0 0 / 9%);border-collapse: initial; display: block;">
			<tbody style=" background: #fbfdfa; border: 1px solid #cdf5c0; display: inherit; border-radius: 6px; width: 100%; ">	
				<tr>
					<td style="color: #000;border-right: 1px solid #cdf5c0;padding: 25px 12px;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;font-family: 'Montserrat', sans-serif;font-size: 14px;font-weight: 500;width: 50%;">
						<div style=" font-size: 16px; text-transform: uppercase; font-weight: 600; padding-bottom: 14px; "><?php esc_html_e( 'Billing address', 'woocommerce' ); ?></div>
						
						<div style=" font-size: 14px; color: #505f4c;line-height: 1.8;">
							<?php echo wp_kses_post( $address ? $address : esc_html__( 'N/A', 'woocommerce' ) ); ?>
							<div style=" font-size: 14px; color: #00cf70;" class="email_phn">
							<?php if ( $order->get_billing_phone() ) : ?>
							<?php echo wc_make_phone_clickable( $order->get_billing_phone() ); ?>
							<?php endif; ?>
							</div>
							<div style=" font-size: 14px; color: #505f4c;">
							<?php if ( $order->get_billing_email() ) : ?>
							<?php echo esc_html( $order->get_billing_email() ); ?>
							<?php endif; ?>	
							</div>
						</div>
					</td>
					<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && $shipping ) : ?>
					<td style="color: #000;border-right: 1px solid #cdf5c0;padding: 25px 12px;text-align:<?php echo esc_attr( $text_align ); ?>;vertical-align: middle;font-family: 'Montserrat', sans-serif;font-size: 14px;font-weight: 500;width: 50%;">
						<div style=" font-size: 16px; text-transform: uppercase; font-weight: 600; padding-bottom: 14px; "><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></div>
						
						<div style=" font-size: 14px; color: #505f4c; margin-bottom: 8px; ">
							<?php echo wp_kses_post( $shipping ); ?>
						</div>
					</td>
					<?php endif; ?>
				</tr>
			</tbody>
		</table>
	</td>
</tr>

