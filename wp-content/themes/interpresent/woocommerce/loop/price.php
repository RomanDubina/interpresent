<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if (is_shop() || is_product_category() || is_search()) {
	$class = 'catalog';
} else if ((is_front_page() && !is_home()) || is_singular( 'product' )) {
	$class = 'slider';
} else if (is_singular( 'post' )) {
	$class = 'best';
}
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<div class="card__price-wrapper">
		<p itemscope itemprop="offers" itemtype="http://schema.org/Offer" class="card__price card__price--<?php echo $class; ?>">
			<?php 
				echo $price_html;
			?>
            <meta itemprop="priceCurrency" content="KZT">
            <meta itemprop="availability" content="http://schema.org/InStock" />
		</p>
		<div class="card__wholesale card__wholesale--<?php echo $class; ?>">
			<?php 
				$wholesale_price = get_field( 'wholesale_price_new' );
				$wholesale_price_old = get_field( 'wholesale_price_old' );
				
			?>
			<?php if (!empty($wholesale_price)): ?>
				
				<h4>
					<?php esc_html_e( 'Опт:', 'interpresent' ); ?>
				</h4>
				<span class="amount amount--wholesale">
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
			<?php endif; ?>
			
		</div>
	</div>
<?php endif; ?>
