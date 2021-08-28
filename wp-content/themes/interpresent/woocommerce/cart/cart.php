<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="my-basket__form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	<div class="my-basket__left">
		<?php 
			$cart_count = count( WC()->cart->get_cart() );
		
			if ($cart_count >= 1): 
		?>
			<table class="my-basket__table" cellspacing="0">
				<thead>
					<tr class="my-basket__header">
						<th class="my-basket__thumbnail">&nbsp;</th>
						<th class="my-basket__title"><?php esc_html_e( 'Название товара', 'interpresent' ); ?></th>
						<th class="my-basket__quantity"><?php esc_html_e( 'Кол-во', 'interpresent' ); ?></th>
						<th class="my-basket__subtotal"><?php esc_html_e( 'Цена', 'interpresent' ); ?></th>
						<th class="my-basket__remove">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php do_action( 'woocommerce_before_cart_contents' ); ?>
	
					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<tr class="my-basket__item">
								<td class="my-basket__thumbnail" data-title="<?php esc_html_e( 'Фото товара', 'interpresent' ); ?>">
									<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
									?>
								</td>
								
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
									<div class="count-product">
										<button type="button" class="count-product__minus count-product__minus--cart">
											<span class="visually-hidden">На один товар меньше</span>
										</button>
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
										<button type="button" class="count-product__plus count-product__plus--cart">
											<span class="visually-hidden">На один товар больше</span>
										</button>
									</div>
								</td>
	
								<td class="my-basket__subtotal" data-title="<?php esc_html_e( 'Цена', 'interpresent' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</td>
								
								<td class="my-basket__remove">
									<?php
										echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a href="%s" class="my-basket__delete" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												esc_html__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											),
											$cart_item_key
										);
									?>
								</td>
							</tr>
							<?php
						}
					}
					?>
	
					<?php do_action( 'woocommerce_cart_contents' ); ?>
	
					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</tbody>
			</table>
		<?php else: ?>
			<?php esc_html_e( 'Вы ещё не добавили ни одного товара', 'interpresent' ); ?>
			<?php	
				if ( wc_get_page_id( 'shop' ) > 0 ) : 
			?>
					<p class="return-to-shop">
						<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
							<?php						
								echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
							?>
						</a>
					</p>
			<?php 
				endif; 
			?>
		<?php endif; ?>		
	</div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
	<?php 
		if ($cart_count > 0): 
	?>
		<div class="my-basket__right">
			<div class="my-basket__gray">	
				<?php 
					$coupons_applied = WC()->cart->get_coupons(); 
				?>		
				<div class="my-basket__coupon">        
	        <?php if (empty($coupons_applied)): ?>
	          <?php if ( wc_coupons_enabled() ) { ?>
							<h3 class="title title--coupon">
								ПОЛУЧИТЕ СКИДКУ
							</h3>
	  					<div class="coupon">
	  						<label class="coupon__label" for="coupon_code">
	  							<?php esc_html_e( 'Введите купон:', 'interpresent' ); ?>
	  						</label> 
	  						<input type="text" name="coupon_code" class="coupon__input" id="coupon_code" value="" placeholder="" /> 
	  						<button type="submit" class="coupon__button" name="apply_coupon" value="<?php esc_attr_e( 'Применить', 'interpresent' ); ?>">
	  							<?php esc_attr_e( 'Применить', 'interpresent' ); ?>
	  						</button>
	  						<?php do_action( 'woocommerce_cart_coupon' ); ?>
	  					</div>
							<div class="coupon__instagram">
								<p>
									Скидочный купон можно найти в нашем 
									<a href="<?php the_field( 'contact_instagram', 21 ); ?>" target="_blank">
										Instagram-аккаунте
									</a><br>
									На товары по скидке, купон недействителен
								</p>								
							</div>
	  				<?php } ?>
	        <?php elseif (!empty($coupons_applied)) : ?>
	          <div class="total total--top">
	    				<h4 class="total__title total__title--top">
	    					<?php esc_html_e( 'Стоимость', 'interpresent' ); ?>
	    				</h4>
	    				<?php wc_cart_totals_subtotal_html(); ?>
	    			</div>
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
	      </div>
				
				<?php do_action( 'woocommerce_cart_actions' ); ?>
				
				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

				<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
				
				<div class="total total--cart">				
					<?php
						/**
						 * Cart collaterals hook.
						 *
						 * @hooked woocommerce_cross_sell_display
						 * @hooked woocommerce_cart_totals - 10
						 */
						do_action( 'woocommerce_cart_collaterals' );
					?>
				</div>
			</div>

			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>
	<?php 
		endif; 
	?>
</form>

<?php do_action( 'woocommerce_after_cart' ); ?>