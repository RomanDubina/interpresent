<?php
/**
 * Plugin compatibility
 * 
 * @package catalog-pdf
 */

function wc_catalog_pdf_compatibility_tm_extra_product_options() {
    add_filter( 'wc_epo_no_edit_options', '__return_true' ); // Hide "Edit options" link on product title
}
add_action( 'wc_catalog_pdf_before_process', 'wc_catalog_pdf_compatibility_tm_extra_product_options' );


/**
 * Visual Products Configurator
 *
 * @return void
 */
function wc_catalog_pdf_compatibility_visual_products_configurator() {
    add_filter( 'vpc_get_config_data', function( $thumbnail_code ) {
        $edit_i18n = __( 'Edit', 'vpc' );
        
        $thumbnail_code = preg_replace( '/<\s*a[^>]*>' . $edit_i18n . '<\s*\/\s*a>/', '', $thumbnail_code ); // Hide the "Edit" link

        return $thumbnail_code;
    } );
}
add_action( 'wc_catalog_pdf_before_process', 'wc_catalog_pdf_compatibility_visual_products_configurator' );