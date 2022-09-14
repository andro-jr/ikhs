<?php
/**
 * Customer invoice email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-invoice.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Executes the e-mail header.
 *
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>


<tr id="header_wrapper" bgcolor="#cdf5c0">
    <td>
        <table border="0" cellpadding="0" align="center" cellspacing="0" width="500" style="background: #fff;font-family: 'Montserrat', sans-serif;padding: 20px;border-radius: 6px;box-shadow: 0 3px 6px 0 rgb(0 0 0 / 9%);border-collapse: initial; display: block;">
            <thead>                         
                
                <tr>
                    <td valign="top" style="font-size: 50px; text-align: center; font-weight: 700; color: #cb3d64;">THANK YOU</td>
                </tr>
                <tr>
                    <td valign="top" style="font-size: 18px; text-align: center; color: #00e447;"><?php echo $email_heading; ?></td>
                </tr>
                <tr><td valign="top" height="20"></td></tr>  
                <tr>
                    <td valign="top" style="font-size: 16px; text-align: left; color: #000;font-weight: 600;">
                        <p>
                            <?php /* translators: %s: Customer first name */ ?>
                                <p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>

                                <?php if ( $order->has_status( 'pending' ) ) { ?>
                                    <p>
                                    <?php
                                    printf(
                                        wp_kses(
                                            /* translators: %1$s Site title, %2$s Order pay link */
                                            __( 'An order has been created for you on %1$s. Your invoice is below, with a link to make payment when you’re ready: %2$s', 'woocommerce' ),
                                            array(
                                                'a' => array(
                                                    'href' => array(),
                                                ),
                                            )
                                        ),
                                        esc_html( get_bloginfo( 'name', 'display' ) ),
                                        '<a href="' . esc_url( $order->get_checkout_payment_url() ) . '">' . esc_html__( 'Pay for this order', 'woocommerce' ) . '</a>'
                                    );
                                    ?>
                                    </p>

                                <?php } else { ?>
                                    <p>
                                    <?php
                                    /* translators: %s Order date */
                                    printf( esc_html__( 'Here are the details of your order placed on %s:', 'woocommerce' ), esc_html( wc_format_datetime( $order->get_date_created() ) ) );
                                    ?>
                                    </p>
                                    <?php
                                }

                            ?>

                        </p>
                    </td>
                </tr>
             

            </thead>
                    </table>

    </td>
</tr>

<tr>
    <td align="center" valign="top">
        <!-- Body -->
        <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
            <tr>
                <td valign="top" id="body_content" bgcolor="#cdf5c0" style="background-color: #cdf5c0;padding-bottom: 50px;">
                    <!-- Content -->
                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                        <tr>
                            <td valign="top">
                                <div id="body_content_inner">
                                    
                                    
                                    
                                    <?php
                                        
                                        /*
                                            * @hooked WC_Emails::order_details() Shows the order details table.
                                            * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
                                            * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
                                            * @since 2.5.0
                                        */
                                        do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );
                                        
                                        /*
                                            * @hooked WC_Emails::order_meta() Shows order meta data.
                                        */
                                        do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );
                                        
                                        /*
                                            * @hooked WC_Emails::customer_details() Shows customer details
                                            * @hooked WC_Emails::email_address() Shows email address
                                        */
                                        do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );
                                        
                                        /**
                                            * Show user-defined additional content - this is set in each email's settings.
                                        */
                                        // if ( $additional_content ) {
                                        //   echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
                                        // }
                                        
                                        /*
                                            * @hooked WC_Emails::email_footer() Output the email footer
                                        */
                                        do_action( 'woocommerce_email_footer', $email );

