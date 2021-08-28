<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
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

global $post, $product;

$latest = array();

$category_name = get_field( 'slider_latest_cat', 13 );
$category = get_term_by('slug', $category_name, 'product_cat', 'ARRAY_A');

if (!empty($category)) {
	$category_id = $category['term_id'];
	
	$args = array (
		'posts_per_page' => -1, 
		'post_type' => 'product',
		'post_status' => array( 'publish' ),
		'tax_query' => array(
			array (
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => array( $category_id ),
			),
		),
	);
	
	$query = new WP_Query($args); 
	 if( $query->have_posts() ) {  
		 while( $query->have_posts() ) {
			 $query->the_post(); 
			 
			 array_push($latest, get_the_ID());
		 }        
	 }
	
	 wp_reset_postdata(); // сброс
}

$product_id = $product->get_id();

?>
<?php 
	if ( $product->is_on_sale() && !in_array($product_id, $latest) ) : ?>

		<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="card__label card__label--sale">' . esc_html__( 'Скидки', 'interpresent' ) . '</span>', $post, $product ); ?>

		<?php
	elseif (in_array($product_id, $latest) && ($product->is_on_sale() || !$product->is_on_sale())) :
		echo '<span class="card__label card__label--latest">' . esc_html__( 'Новинки', 'interpresent' ) . '</span>';
	endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
