<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="my-basket__left my-basket__left--review-order">
	<table class="my-basket__table my-basket__table--checkout">
		<thead>
			<tr class="my-basket__header">
				<!--<th class="my-basket__title"><?php esc_html_e( 'Название товара', 'interpresent' ); ?></th>
				<th class="my-basket__quantity"><?php esc_html_e( 'Кол-во', 'interpresent' ); ?></th>
				<th class="my-basket__subtotal"><?php esc_html_e( 'Цена', 'interpresent' ); ?></th>-->
			</tr>
		</thead>
		<tbody>
			<?php
			/*
			do_action( 'woocommerce_review_order_before_cart_contents' );
	
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="my-basket__item my-basket__item--checkout">
	
						<td class="my-basket__title" data-title="<?php esc_html_e( 'Название товара', 'interpresent' ); ?>">
							<?php
							if ( ! $product_permalink ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
							} else {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
							}
	
							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
	
							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
	
							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
							}
							?>
						</td>
	
						<td class="my-basket__quantity" data-title="<?php esc_html_e( 'Кол-во', 'interpresent' ); ?>">
							<div class="count-product count-product--checkout">
								<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input(
										array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										),
										$_product,
										false
									);
								}
	
								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								?>
							</div>
						</td>
	
						<td class="my-basket__subtotal" data-title="<?php esc_html_e( 'Цена', 'interpresent' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>
					</tr>
					<?php
				}
			}
			
			do_action( 'woocommerce_review_order_after_cart_contents' );
			*/
			?>
		</tbody>
		
	</table>	
</div>
<div class="my-basket__right my-basket__right--review-order">
	<div class="sidebar sidebar--checkout">
		<div class="sidebar__content">
			<?php the_field( 'usefull_checkout_content' ); ?>
		</div>
	</div>
	
	<div class="my-basket__gray">
		<div class="total total--top">
			<h4 class="total__title total__title--top">
				<?php esc_html_e( 'Стоимость', 'interpresent' ); ?>
			</h4>
			<?php wc_cart_totals_subtotal_html(); ?>
		</div>
		<?php $coupons_applied = WC()->cart->get_coupons(); ?>
		<?php if (!empty($coupons_applied)) : ?>
			<div class="total total--center">
				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
					<h4 class="total__title total__title--center">
						<?php esc_html_e( 'Скидка по купону', 'interpresent' ); ?>
					</h4>
					<p class="total__coupon">
						<?php wc_cart_totals_coupon_html( $coupon ); ?>
					</p>    					
				<?php endforeach; ?>
			</div>        
		<?php endif; ?> 
		<div class="total total--bottom">
			<h4 class="total__title">
			  <?php esc_html_e( 'Общая стоимость', 'interpresent' ); ?>
			</h4>
			<?php echo WC()->cart->get_total(); ?>
		</div>
	</div>
	
	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	<div class="my-basket__line">
		<?php $order_button_text = esc_html__( 'Подтвердить заказ', 'interpresent'); ?>
		
		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>
		
		<noscript>
			<?php
			/* translators: $1 and $2 opening and closing emphasis tags respectively */
			printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
			?>
			<br/>
			<button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>">
				<?php esc_html_e( 'Update totals', 'woocommerce' ); ?>
			</button>
		</noscript>

		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="my-basket__order my-basket__order--checkout" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
		
		<div class="card card--checkout">
			<a class="card__opt card__opt--download" href="<?php echo esc_url( wp_nonce_url( add_query_arg( array( 'cart-pdf' => '1' ), wc_get_cart_url() ), 'cart-pdf' ) );?>" download target="_blank">
				<svg width="12" height="12" aria-label="Иконка закрузки">
					<use xlink:href="#icon-download"></use>
				</svg>
				<span><?php esc_html_e( 'Скачать счёт', 'interpresent' ); ?></span>
			</a>

			<a class="card__opt card__opt--return" href="<?php echo wc_get_cart_url(); ?>">
				<span><?php esc_html_e( 'Редактировать заказ', 'interpresent' ); ?></span>
			</a>
		</div>
	</div>
</div>



