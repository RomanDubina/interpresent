<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<section class="product">
	<div class="product__wrapper">
		<?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
		
		<header class="product__header">
			<?php 			
				/**
				 * Hook: show_product_title.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * 
				 */
				
				do_action( 'show_product_title' ); 				
			?>
			<?php $rating_count = $product->get_rating_count(); ?>
			<?php if ( $rating_count > 0 ): ?>
				<ul class="rating rating--title">
					<?php 
						/**
						 * The rating_show_product_title hook.
						 *
						 * @hooked woocommerce_review_display_rating - 1
						 */
						do_action( 'rating_show_product_title', $comment );
					?>
				</ul>
			<?php endif; ?>
		</header>
		<div class="product__container">
			<div class="product__slider-wrapper">
				<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>			

			<div class="product__right">
				<div class="card card--product">
					<?php if ( $product->is_purchasable() ): ?>
						<div class="card__price-wrapper card__price-wrapper--single">
							<?php 
							/**
							 * Hook: my_product_price_single.
							 *
							 * @hooked my_product_price_single_function - 5
							 * @hooked add_sku_single_product - 6
							 *
							 */
							 
								do_action( 'my_product_price_single' ) 
							?>				
						</div>
						
						<div class="card__right card__right--buy">
							<div class="count-product count-product--product">
								<button type="button" class="count-product__minus count-product__minus--product">
									<span class="visually-hidden">На один товар меньше</span>
								</button>					
								<?php 
									do_action( 'woocommerce_before_add_to_cart_quantity' );
								
				          echo woocommerce_quantity_input( array('min_value' => 1), $product, false );
				        
									do_action( 'woocommerce_after_add_to_cart_quantity' );
								?>
								<button type="button" class="count-product__plus count-product__plus--product">
									<span class="visually-hidden">На один товар больше</span>
								</button>
							</div>
							<?php 
							/**
							 * Hook: my_product_add_to_cart_single.
							 *
							 * @hooked woocommerce_template_loop_add_to_cart - 5
							 */
							 
								do_action( 'my_product_add_to_cart_single' ) ;						
							?>
							<button class="card__one openpopup" id="oneclick" type="button" data-popup="oneclick" name="oneclick">Купить в 1 клик</button>
						</div>
					<?php endif; ?>					
				</div>

				<?php 
					/**
					 * Hook: my_product_short_description_single.
					 *
					 * @hooked woocommerce_template_single_excerpt - 5
					 */
				 
					do_action( 'my_product_short_description_single' ) ;						
				?>
				
				<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked attributes_table - 5
					 * 
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>
				
				<?php
					/**
					 * Hook: woocommerce_after_single_product_summary.
					 *
					 * 
					 */
					do_action( 'woocommerce_after_single_product_summary' );
				?>
			</div>
			
			<aside class="sidebar sidebar--product">
				<?php 
					$shop_page_id = wc_get_page_id( 'shop' );
				?>
				<h3 class="sidebar__title sidebar__title--usefull">
					<?php the_field( 'usefull_title', $shop_page_id ); ?>
				</h3>
	
				<ul class="sidebar__list">
					<?php 
						
						for ($i=1; $i <= 5; $i++) {
							if ( !empty( get_field('usefull_title_' . $i, $shop_page_id ) ) ) {
								?>
									<li class="sidebar__item">
										<button class="sidebar__item-toggle" type="button" name="sidebar-item-toggle">
											<img class="sidebar__icon sidebar__icon--toggle" src="<?php the_field('usefull_image_' . $i, $shop_page_id); ?>" alt="<?php the_field('usefull_title_' . $i, $shop_page_id); ?>">
					
											<span class="sidebar__item-title">
												<?php the_field('usefull_title_' . $i, $shop_page_id); ?>
											</span>
											<span class="sidebar__item-indicator sidebar__item-indicator--plus">
												+
											</span>
											<span class="sidebar__item-indicator sidebar__item-indicator--minus">
												-
											</span>
										</button>
										<div class="sidebar__item-content">
											<?php the_field('usefull_content_' . $i, $shop_page_id); ?>
										</div>
									</li>
								<?php
							}
						}
					?>
				</ul>
	
				<!-- <div class="sidebar__delivery">
					<img class="sidebar__icon sidebar__icon--delivery-big" src="<?php echo get_template_directory_uri(); ?>/assets/img/sidebar-delivery-big.svg" alt="img">
	
					<h4 class="sidebar__delivery-title">
						Осуществляем доставку по всему Казахстану
					</h4>
				</div>
	
				<div class="sidebar__separator"></div> -->
				
				<?php 
					$wholesale_price = get_field( 'wholesale_price_new' );
					$wholesale_price_old = get_field( 'wholesale_price_old' );
				?>
				<?php if (!empty($wholesale_price) && $product->is_purchasable()): ?>
					<h3 class="sidebar__title sidebar__title--wholesale">
						<?php the_field( 'wholesale_title', $shop_page_id ); ?>
					</h3>
		
					<div class="card card--wholesale">
						<h4 class="card__price-title card__price-title--wholesale">
							<?php echo esc_html( 'Цена', 'interpresent' ); ?>
						</h4>
						<span class="amount amount--wholesale-product">
							<bdi>
								<?php if (!empty($wholesale_price_old)): ?>
									<del>
										<?php echo $wholesale_price_old; ?>
									</del>
								<?php endif; ?>
								<?php 
									if (function_exists('beauty_price')) {
										beauty_price($wholesale_price);
									}
								?>
							</bdi>
						</span>	
					</div>
					
					<?php if (get_field( 'buy_title_opt' )): ?>
						<h4 class="product__title product__title--sale">
							<?php the_field( 'buy_title_opt', $shop_page_id ); ?>
						</h4>
					<?php endif; ?>				
	
					<table class="product__table">
						<?php 
							for ($i=1; $i < 4; $i++) {
								$cost_item = get_field( 'buy_cost_opt_' . $i, $shop_page_id );
								$sale_item = get_field( 'buy_sale_opt_' . $i, $shop_page_id );
								
								if (!empty($cost_item) && !empty($sale_item)) {
									?>
									<tr>
										<td>
											скидка <?php echo $sale_item; ?>% при заказе: 
										</td>
										<td>
											от <?php echo $cost_item . ' ' . get_woocommerce_currency_symbol(); ?>
										</td>
									</tr>
									<?php
								}
							}
						?>
					</table>
				<?php endif; ?>				
				
				<?php 
					$id_opt_page = 44;
				?>
				<a class="sidebar__subline sidebar__subline--wholesale" href="<?php echo get_permalink( $id_opt_page ); ?>">
					<span>
						<svg width="16" height="16" aria-label="Иконка анкеты оптовикам">
							<use xlink:href="#icon-blank"></use>
						</svg>
	
						Информация
					</span>
					<span>
						для оптовых
					</span>
					<span>
						клиентов
					</span>
				</a>
	
				<div class="sidebar__separator"></div>
				
				<?php 
					/**
					 * Hook: my_product_category_single.
					 *
					 * @hooked woocommerce_template_single_meta - 5
					 */
				 
					do_action( 'my_product_category_single' ) ;						
				?>
			</aside>
						
			<!-- Отзывы -->
			<?php 
				if( comments_open( $product->id ) ) {
					comments_template();
				}
			?>			
		</div>
		
		<!-- Aside desktop script in oneclick.js file -->
	</div>
</section>

<?php 
/**
 * Hook: woocommerce_after_single_product.
 *
 * @hooked woocommerce_output_related_products - 5
 */
do_action( 'woocommerce_after_single_product' ); 
?>
