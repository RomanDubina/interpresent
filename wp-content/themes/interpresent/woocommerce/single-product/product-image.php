<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_thumbnail_ids = array();

if( $product->is_type( 'simple' ) ) {
	if ($product->get_image_id()) {
		array_push($post_thumbnail_ids, $product->get_image_id());
	}
} else if ($product->is_type( 'variable' )) {
	if ($product->get_image_id()) {
		array_push($post_thumbnail_ids, $product->get_image_id());
	}
	
	$variations = $product->get_children();
	
	foreach ( $variations as $variation ) {
		if (get_post_thumbnail_id( $variation )) {
			array_push($post_thumbnail_ids, get_post_thumbnail_id( $variation ));
		}    
  }	
}

$attachment_ids = $product->get_gallery_image_ids();

$image_size = 'full';
$image_size_main = 'large';
$image_size_thumb = 'thumb';

$icon = false;

// Лупа увеличивающая на изображении продукта. При добавлении тегу img этого класса - появится лупа при наведении
$attr_image_zoom = array( 
	//'class' => 'image-zoom',
);

function replace_dooble_quotes ( $text ) {
	$text = str_replace('"', "'", $text);
	
	return $text;
}

?>
<div class="product__slider product__slider--thumb swiper-container">
	<div class="product__slider-list product__slider-list--thumb swiper-wrapper">
		<?php
			if ( $attachment_ids && $post_thumbnail_ids ) {
				foreach ( $post_thumbnail_ids as $post_thumbnail_id ) {
					?>
						<div class="product__slide product__slide--thumb swiper-slide">
							<?php 
								$image = wp_get_attachment_image(	$post_thumbnail_id, $image_size_thumb, $icon );
								echo $image;
							?>
						</div>
					<?php
				}
				
				foreach ( $attachment_ids as $attachment_id ) {
					?>
						<div class="product__slide product__slide--thumb swiper-slide">							
							<?php 								
								$image = wp_get_attachment_image(	$attachment_id, $image_size_thumb, $icon );
								echo $image;
							?>
						</div>
					<?php
				}				
			} else if ( $attachment_ids && !$post_thumbnail_ids ) {
				foreach ( $attachment_ids as $attachment_id ) {
					?>
						<div class="product__slide product__slide--thumb swiper-slide">
							<?php 
								$image = wp_get_attachment_image(	$attachment_id, $image_size_thumb, $icon );
								echo $image;
							?>
						</div>
					<?php
				}
			} else if (!$attachment_ids && $post_thumbnail_ids) {
				foreach ( $post_thumbnail_ids as $post_thumbnail_id ) {
					?>
					<div class="product__slide product__slide--thumb swiper-slide">
						<?php 
							$image = wp_get_attachment_image(	$post_thumbnail_id, $image_size_thumb, $icon );
							echo $image;
						?>
					</div>
					<?php
				}
			} else {
				?>
					<div class="product__slide product__slide--thumb swiper-slide">
						<?php 
							$html = sprintf( '<img src="%s" alt="%s" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
							echo $html;
						?>
					</div>
				<?php
			}			
		?>
	</div>
</div>

<div class="product__slider product__slider--main swiper-container">
	<div class="product__slider-list product__slider-list--main swiper-wrapper">
		<?php
			if ( $attachment_ids && $post_thumbnail_ids ) {
				foreach ( $post_thumbnail_ids as $post_thumbnail_id ) {
					?>
					<div class="product__slide product__slide--main swiper-slide">
						<?php 
							$image_for_fancy_box = wp_get_attachment_image_src($post_thumbnail_id, $image_size, $icon );
						?>
						<a href="<?= $image_for_fancy_box[0]; ?>" data-fancybox="gallery-product" data-caption="<?php echo replace_dooble_quotes($product->post->post_title); ?>">
							<?php 
								$image = wp_get_attachment_image(	$post_thumbnail_id, $image_size_main, $icon, $attr_image_zoom );
								echo $image;
							?>
						</a>						
					</div>
					<?php
				}
				
				foreach ( $attachment_ids as $attachment_id ) {
					?>
					<div class="product__slide product__slide--main swiper-slide">
						<?php 
							$image_for_fancy_box = wp_get_attachment_image_src($attachment_id, $image_size, $icon );
						?>
						<a href="<?= $image_for_fancy_box[0]; ?>" data-fancybox="gallery-product" data-caption="<?php echo replace_dooble_quotes($product->post->post_title); ?>">
							<?php 
								$image = wp_get_attachment_image(	$attachment_id, $image_size_main, $icon, $attr_image_zoom );
								echo $image;
							?>
						</a>						
					</div>
					<?php
				}
			} else if ( $attachment_ids && !$post_thumbnail_ids ) {
				foreach ( $attachment_ids as $attachment_id ) {
					?>
					<div class="product__slide product__slide--main swiper-slide">						
						<?php 
							$image_for_fancy_box = wp_get_attachment_image_src($attachment_id, $image_size, $icon );
						?>
						<a href="<?= $image_for_fancy_box[0]; ?>" data-fancybox="gallery-product" data-caption="<?php echo replace_dooble_quotes($product->post->post_title); ?>">
							<?php 
								$image = wp_get_attachment_image(	$attachment_id, $image_size_main, $icon, $attr_image_zoom );
								echo $image;
							?>
						</a>	
					</div>
					<?php
				}
			} else if (!$attachment_ids && $post_thumbnail_ids) {
				foreach ( $post_thumbnail_ids as $post_thumbnail_id ) {
					?>
					<div class="product__slide product__slide--main swiper-slide">						
						<?php 
							$image_for_fancy_box = wp_get_attachment_image_src($post_thumbnail_id, $image_size, $icon );
						?>
						<a href="<?= $image_for_fancy_box[0]; ?>" data-fancybox="gallery-product" data-caption="<?php echo replace_dooble_quotes($product->post->post_title); ?>">
							<?php 
								$image = wp_get_attachment_image(	$post_thumbnail_id, $image_size_main, $icon, $attr_image_zoom );
								echo $image;
							?>
						</a>
					</div>
					<?php
				}
			} else {
				?>
				<div class="product__slide product__slide--main swiper-slide">
					<?php 
						$html = sprintf( '<img src="%s" alt="%s" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
						echo $html;
					?>
				</div>
				<?php
			}			
		?>
	</div>
</div>

<?php do_action( 'woocommerce_product_thumbnails' ); ?>
