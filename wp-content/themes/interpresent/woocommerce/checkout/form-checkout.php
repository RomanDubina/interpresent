<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<section class="my-basket my-basket--checkout">
	<div class="my-basket__wrapper">
		<h1 class="title title--checkout">
			<?php the_title( $before = '', $after = '', $echo = true ); ?>
		</h1>
<?php
do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="my-basket__form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
	
	<?php do_action( 'woocommerce_checkout_order_review' ); ?>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	
	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="my-basket__left my-basket__left--checkout" id="customer_details">
			<div class="about about--checkout">
				<h3 class="about__title about__title--checkout">
					<?php esc_html_e( 'Информация о заказчике и доставке', 'interpresent' ); ?>
				</h3>
				
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
			
			<?php do_action( 'woocommerce_checkout_after_fields' ); ?>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
	</div>
</section>