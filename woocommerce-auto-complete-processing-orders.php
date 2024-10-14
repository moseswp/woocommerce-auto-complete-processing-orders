<?php
/*
Plugin Name: WooCommerce Auto Complete Processing Orders
Plugin URI: https://24x7wpsupport.com
Description: Automatically completes orders with a status of "processing" in WooCommerce.
Version: 1.0
Author: Mazhar Ali
Author URI: https://24x7wpsupport.com
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Hook into WooCommerce to auto-complete processing orders
add_filter( 'woocommerce_payment_complete_order_status', 'rfvc_update_order_status', 10, 2 );

function rfvc_update_order_status( $order_status, $order_id ) {
    $order = wc_get_order( $order_id );

    // Check if the order status is 'processing'
    if ( 'processing' === $order_status ) {
        return 'completed'; // Automatically complete the order if it's processing
    }

    return $order_status; // Return the default status for other orders
}
