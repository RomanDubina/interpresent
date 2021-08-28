<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li class="reviews__item" id="li-comment-<?php comment_ID(); ?>">
	<div class="reviews__avatar">		
		<?php 
			$name_author = get_comment_author();
			
			if ($name_author) {
				echo mb_substr($name_author, 0, 1);
			}			
		?>
	</div>
	<div class="reviews__content">
		<?php 
			/**
			 * The woocommerce_review_before_comment_meta hook.
			 *
			 * @hooked woocommerce_review_display_rating - 10 (removed)
			 */
			do_action( 'woocommerce_review_before_comment_meta', $comment );
		?>
		<?php 
			/**
			 * The woocommerce_review_meta hook.
			 *
			 * @hooked woocommerce_review_display_meta - 10
			 */
			do_action( 'woocommerce_review_meta', $comment );
		?>			
		<?php
			do_action( 'woocommerce_review_before_comment_text', $comment );

			/**
			 * The woocommerce_review_comment_text hook
			 *
			 * @hooked woocommerce_review_display_comment_text - 10
			 */
			do_action( 'woocommerce_review_comment_text', $comment );

			do_action( 'woocommerce_review_after_comment_text', $comment );
		?>		
	</div>
	
	<?php 
		global $product;
		$rating_count = $product->get_rating_count();
	?>
	<?php if ( $rating_count > 0 ): ?>
		<ul class="rating rating--reviews">
			<?php 
				/**
				 * The rating_after_review_content hook.
				 *
				 * @hooked woocommerce_review_display_rating - 1
				 */
				do_action( 'rating_after_review_content', $comment );
			?>
		</ul>
	<?php endif; ?>
