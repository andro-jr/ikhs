<?php
	/**
		* Order details table shown in emails.
		*
		* This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
		*
		* HOWEVER, on occasion WooCommerce will need to update template files and you
		* (the theme developer) will need to copy the new files to your theme to
		* maintain compatibility. We try to do this as little as possible, but it does
		* happen. When this occurs the version of the template file will be bumped and
		* the readme will list any important changes.
		*
		* @see https://docs.woocommerce.com/document/template-structure/
		* @package WooCommerce\Templates\Emails
		* @version 3.7.0
	*/
	
	defined( 'ABSPATH' ) || exit;
	
	$text_align = is_rtl() ? 'right' : 'left';
	
do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>



<tr>
	<td>
		<table border="0" cellpadding="0" align="center" cellspacing="0" width="500" style="background: #fff;font-family: 'Montserrat', sans-serif;padding: 20px;border-radius: 6px;box-shadow: 0 3px 6px 0 rgb(0 0 0 / 9%);border-collapse: initial; display: block;">
			<thead style="background: #00cf70;">								 
				<tr>
					<td valign="top" style="font-size: 15px;text-align: left;color: #fff;font-weight: 500;padding: 10px;"><?php esc_html_e( 'Product', 'woocommerce' ); ?></td>
					<td valign="top" style="font-size: 15px;text-align: center;color: #fff;font-weight: 500;padding: 10px;"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></td>
					<td valign="top" style="font-size: 15px;text-align: right;color: #fff;font-weight: 500;padding: 10px;"><?php esc_html_e( 'Price', 'woocommerce' ); ?></td>
				</tr>
			</thead>
			<tbody>
				<?php
					echo wc_get_email_order_items( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					$order,
					array(
					'show_sku'      => $sent_to_admin,
					'show_image'    => false,
					'image_size'    => array( 32, 32 ),
					'plain_text'    => $plain_text,
					'sent_to_admin' => $sent_to_admin,
					)
					);
				?>
			</tbody>
			<tfoot>
			<tr><td valign="top" height="25"></td></tr>  
				<?php
					$item_totals = $order->get_order_item_totals();
					
					if ( $item_totals ) {
						$i = 0;
						foreach ( $item_totals as $total ) {
							$i++;
						?>
						<tr>
						<td width="30%"></td>
							<td style="color: #000;padding: 8px 0 0 0;text-align: left;vertical-align: middle;font-family: 'Montserrat', sans-serif;font-size: 14px;font-weight: 600;"><?php echo wp_kses_post( $total['label'] ); ?></td>
							<td style="color: #000;padding: 8px 0 0 0;text-align: right;vertical-align: middle;font-family: 'Montserrat', sans-serif;font-size: 14px;font-weight: 500;"><?php echo wp_kses_post( $total['value'] ); ?></td>
						</tr>
						<?php
						}
					}
					if ( $order->get_customer_note() ) {
					?>
					<tr>
					<td width="30%"></td>
						<td style="color: #000;padding: 12px 0 0 0;text-align: left;vertical-align: middle;font-family: 'Montserrat', sans-serif;font-size: 14px;font-weight: 600;"><?php esc_html_e( 'Note:', 'woocommerce' ); ?></td>
						<td style="color: #00cf70;padding: 12px 0 0 0;text-align: right;vertical-align: middle;font-family: 'Montserrat', sans-serif;font-size: 14px;font-weight: 500;"><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
					</tr>
					<?php
					}
				?>
			</tfoot>
		</table>
	</td>
</tr>


<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
