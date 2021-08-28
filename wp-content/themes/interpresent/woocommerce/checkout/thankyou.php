<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="thankyou">
	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="thankyou__text">
				<?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
			</p>

			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="thankyou__button">
				<?php esc_html_e( 'Pay', 'woocommerce' ); ?>
			</a>
			<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="thankyou__button">
					<?php esc_html_e( 'My account', 'woocommerce' ); ?>
				</a>
			<?php endif; ?>

		<?php else : ?>
			<svg class="thankyou__icon" width="94" height="94" aria-label="OK">
				<use xlink:href="#icon-check"></use>
			</svg>
			
			<h1 class="title title--thankyou">
				<?php esc_html_e( 'Спасибо за заказ!', 'interpresent' ); ?>
			</h1>
			
			<p class="thankyou__text">
				
				<?php esc_html_e( 'Наш консультант скоро свяжется с вами для подтверждения заказа.', 'interpresent' ); ?>
			</p>
			
			<a class="thankyou__button" href="<?php echo bloginfo( 'url' ); ?>"><?php esc_html_e( 'Хорошо', 'interpresent' ); ?></a>
		<?php endif; ?>

	<?php else : ?>

		<svg class="thankyou__icon" width="94" height="94" aria-label="OK">
			<use xlink:href="#icon-check"></use>
		</svg>
		
		<h1 class="title title--thankyou">
			<?php esc_html_e( 'Спасибо за заказ!', 'interpresent' ); ?>
		</h1>
		
		<p class="thankyou__text">
			
			<?php esc_html_e( 'Наш консультант скоро свяжется с вами для подтверждения заказа.', 'interpresent' ); ?>
		</p>
		
		<a class="thankyou__button" href="<?php echo bloginfo( 'url' ); ?>"><?php esc_html_e( 'Хорошо', 'interpresent' ); ?></a>
	<?php endif; ?>	
	
</div>
