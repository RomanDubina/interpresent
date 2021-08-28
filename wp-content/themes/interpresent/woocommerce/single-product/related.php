<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="promotion promotion--related">
		<div class="promotion__wrapper">

			<?php
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

			?>
			<header class="promotion__header">
				<h2 class="title title--slider"><?php echo $heading; ?></h2>
				<div class="slider-navigation">
					<button class="slider-navigation__button slider-navigation--prev slider-navigation--prev--related" type="button" name="prev">
						<svg width="20" height="20" aria-label="Предыдущий слайд">
							<use xlink:href="#icon-prev"></use>
						</svg>
					</button>
					<button class="slider-navigation__button slider-navigation--next slider-navigation--next--related" type="button" name="next">
						<svg width="20" height="20" aria-label="Следующий слайд">
							<use xlink:href="#icon-next"></use>
						</svg>
					</button>
				</div>
			</header>	
			
			<div class="promotion__slider promotion__slider--related swiper-container">
				<ul class="promotion__list swiper-wrapper">

					<?php foreach ( $related_products as $related_product ) : ?>

							<?php
							$post_object = get_post( $related_product->get_id() );

							setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

							wc_get_template_part( 'content', 'product' );
							?>

					<?php endforeach; ?>

				</ul>
			</div>
		</div>
	</section>
	<?php
endif;

wp_reset_postdata();
