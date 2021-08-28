<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>

<?php do_action( 'woocommerce_before_cart_totals' ); ?>

<h4 class="total__title">
  <?php esc_html_e( 'Общая стоимость', 'interpresent' ); ?>
</h4>

<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

<?php echo WC()->cart->get_total(); ?>

<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

<?php do_action( 'woocommerce_after_cart_totals' ); ?>
