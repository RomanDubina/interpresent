<?php
/**
 * Plugin Name:     WooCommerce Catalog PDF
 * Text Domain:     catalog-pdf
 */


if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! extension_loaded( 'gd' ) || ! extension_loaded( 'mbstring' ) || version_compare( phpversion(), '5.6.0', '<' ) ) {

    /**
     * Admin notice to display requirements
     *
     * @return void
     */
    function wc_catalog_pdf_admin_notices() {
        ?>

        <div class="notice notice-warning is-dismissible">
            <p><strong><?php esc_html_e( 'WooCommerce Catalog PDF requirements not met', 'catalog-pdf' ); ?></strong></p>
            <p><?php esc_html_e( 'WooCommerce Catalog PDF requires at least PHP 5.6.0 with the mbstring and gd extensions loaded. ', 'catalog-pdf' ); ?></p>
        </div>

        <?php
    }

    /**
     * Hook to add admin notices...
     *
     * @return void
     */
    function wc_catalog_pdf_admin_requirements_notice() {
        add_action( 'admin_notices', 'wc_catalog_pdf_admin_notices' );
    }
    add_action( 'admin_init', 'wc_catalog_pdf_admin_requirements_notice' );

    return;
}


define( 'WC_CATALOG_PDF_PATH', plugin_dir_path( __FILE__ ) );


require WC_CATALOG_PDF_PATH . 'vendor/autoload.php';
require WC_CATALOG_PDF_PATH . 'catalog-pdf-compatibility.php';


/**
 * Generates the PDF for download
 *
 * @return void
 */
function wc_catalog_pdf_process_download() {
    if ( ! function_exists( 'WC' ) ) {
        return;
    }

    if ( ! isset( $_GET['catalog-pdf'] ) ) {
        return;
    }

    if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'catalog-pdf' ) ) {
        wc_add_notice( __( 'Invalid nonce. Unable to process PDF for download.', 'wc_catalog_pdf' ), 'error' );
        return;
    }

    $mpdf = new \Mpdf\Mpdf( array( 'mode' => get_locale(), 'format' => 'A4', 'default_font' => 'dejavusans' ) );
    $mpdf->shrink_tables_to_fit = 1;
    $mpdf->simpleTables = true;
    $mpdf->packTableData = true;
    $mpdf->autoLangToFont = true;

    $content = $css = '';

    $catalog_table = wc_locate_template( 'catalog-table.php', '/woocommerce/catalog-pdf/', __DIR__ . '/templates/' );
    $css        = wc_locate_template( 'pdf-styles.php', '/woocommerce/catalog-pdf/', __DIR__ . '/templates/' );

    do_action( 'wc_catalog_pdf_before_process' );


    if( file_exists( $catalog_table ) ) {
        ob_start();

        include $catalog_table;

        $content = ob_get_clean();
    }
    
    if( file_exists( $css ) ) {
        ob_start();

        include $css;

        $css = apply_filters( 'woocommerce_email_styles', ob_get_clean() );
    }

    $dest = \Mpdf\Output\Destination::DOWNLOAD;

    if ( is_rtl() ) {
        $mpdf->SetDirectionality( 'rtl' );
    }

    $stream_options = apply_filters( 'wc_catalog_pdf_stream_options', array( 'compress' => 1, 'Attachment' => 1 ) );

    if ( $stream_options['Attachment'] == 0 ) {
        $dest = \Mpdf\Output\Destination::INLINE;
    }

    /**
     * Hook to modify mPDF object before generating
     * 
     * @since 2.0.6
     */
    $mpdf = apply_filters( 'wc_catalog_pdf_mpdf', $mpdf );

    $mpdf->WriteHTML( $css, \Mpdf\HTMLParserMode::HEADER_CSS );
    $mpdf->WriteHTML( $content, \Mpdf\HTMLParserMode::HTML_BODY );
    $mpdf->Output( 
        apply_filters( 'wc_catalog_pdf_filename', 'WC_Category-' . date( 'Ymd' ) . bin2hex( openssl_random_pseudo_bytes( 5 ) ) ) . '.pdf', 
        apply_filters( 'wc_catalog_pdf_destination', $dest )
    );

    /**
     * Perform custom actions after PDF generated
     * 
     * @since 2.0.6
     */
    do_action( 'wc_catalog_pdf_output', $mpdf );

    exit;
}
add_action( 'template_redirect', 'wc_catalog_pdf_process_download' );


/**
 * Renders the download Catalog as PDF button
 *
 * @return void
 */
function wc_catalog_pdf_button( $cat_ids, $class_button = 'button', $class_text = 'text' ) {
  $all_pages = 1;
  $args = array(
    'posts_per_page' => 500,
    'post_status' => 'publish',
    'post_type' => 'product',
    'tax_query' => array(
      array (
        'taxonomy' => 'product_cat',
        'field'    => 'term_id',
        'terms'    => $cat_ids,
      ),
    )
  );
  
  $query = new WP_Query($args); 
  
  $all_pages = $query->max_num_pages;
  
  wp_reset_postdata();
  
      for ($page=1; $page <= $all_pages; $page++) {
        ?>
        <form class="form-pdf" method="get" action="">
        	<input type="hidden" name="cat_ids" value="<?php if(!empty($cat_ids)) echo json_encode( $cat_ids ); ?>" />
          <input type="hidden" name="page_current" value="<?php echo $page; ?>" />
        	<input type="hidden" name="catalog-pdf" value="1" />
        	<?php wp_nonce_field( 'catalog-pdf' ); ?>
        	<button type="submit" class="<?= $class_button; ?>">        		
            <span>
              <svg width="16" height="16" aria-label="Прайс-лист">
          			<use xlink:href="#icon-blank"></use>
          		</svg>
              <?php 
                esc_html_e( 'Прайс-лист' ); 
                
                if ($all_pages > 1) echo ' Ч. ' . $page; 
              ?>             
            </span> 
            <?php 
              for ($i=0; $i < count($cat_ids); $i++) {
                $cat_name = get_the_category_by_ID( $cat_ids[$i] );
                
                echo '<span>';
                
                echo ' “';
                
                echo $cat_name;
                
                echo '”';
                
                if ($i < (count($cat_ids) - 1)) {
                  echo ', ';
                }
                
                echo '</span>';
              }
            ?>       		
        	</button>
        </form>
        <?php
      }
    ?>    
    
    <p class="<?= $class_text; ?>"> 
      (В 1 файле до 500 товаров. Время загрузки файла: 30 - 90 сек.)
    </p>
    
    <script type="text/javascript">
      let formPDF = document.querySelectorAll('.form-pdf');
      
      if (formPDF) {
        formPDF.forEach((item, i) => {
          item.addEventListener('submit', function () {
            item.style.pointerEvents = 'none';
          });
        });       
      }   
    </script>
    <?php
}


/**
 * Register various customizer options for modifying the Catalog PDF
 *
 * @since 1.0.3
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function wc_catalog_pdf_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'wc_catalog_pdf', array(
        'title'                 => __( 'Catalog PDF', 'catalog-pdf' ),
        'priority'              => 50,
        'panel'                 => 'woocommerce',
    ) );

    $wp_customize->add_setting( 'wc_catalog_pdf_button_label', array(
        'default'               => __( 'Download Catalog as PDF', 'catalog-pdf' ),
        'type'                  => 'option',
        'capability'            => 'manage_woocommerce',
        'sanitize_callback'     => 'esc_html',
        'transport'             => 'refresh'
    ) );

    $wp_customize->add_control( 'wc_catalog_pdf_button_label', array(
        'label'                 => __( 'Button label', 'catalog-pdf'),
        'description'           => __( 'Text that is displayed on the button which generates the PDF.', 'catalog-pdf'),
        'section'               => 'wc_catalog_pdf',
        'settings'              => 'wc_catalog_pdf_button_label',
        'type'                  => 'text',
    ) );

    $wp_customize->add_setting( 'wc_catalog_pdf_logo', array(
        'default'               => get_option( 'woocommerce_email_header_image' ),
        'type'                  => 'option',
        'capability'            => 'manage_woocommerce',
        'sanitize_callback'     => 'esc_url',
        'transport'             => 'postMessage'
    ) );

    $wp_customize->add_control( 'wc_catalog_pdf_logo', array(
        'label'                 => __( 'Logo URL', 'catalog-pdf'),
        'description'           => __( 'Image URL of logo for the Catalog PDF, must live on current server.', 'catalog-pdf'),
        'section'               => 'wc_catalog_pdf',
        'settings'              => 'wc_catalog_pdf_logo',
        'type'                  => 'text',
    ) );

    $wp_customize->add_setting( 'wc_catalog_pdf_logo_width', array(
        'default'               => 400,
        'type'                  => 'option',
        'capability'            => 'manage_woocommerce',
        'sanitize_callback'     => 'absint',
        'sanitize_js_callback'  => 'absint',
        'transport'             => 'postMessage'
    ) );

    $wp_customize->add_control( 'wc_catalog_pdf_logo_width', array(
        'label'                 => __( 'Logo width', 'catalog-pdf'),
        'description'           => __( 'Logo size used for the Catalog PDF.', 'catalog-pdf'),
        'section'               => 'wc_catalog_pdf',
        'settings'              => 'wc_catalog_pdf_logo_width',
        'type'                  => 'number',
        'input_attrs'           => array(
            'min'           => 0,
            'step'          => 1,
        ),
    ) );

    $wp_customize->add_setting( 'wc_catalog_pdf_logo_alignment', array(
        'default'               => 'center',
        'type'                  => 'option',
        'capability'            => 'manage_woocommerce',
        'sanitize_callback'     => 'wc_clean',
        'sanitize_js_callback'  => 'wc_clean',
        'transport'             => 'postMessage'
    ) );

    $wp_customize->add_control( 'wc_catalog_pdf_logo_alignment', array(
        'label'                 => __( 'Logo alignment', 'catalog-pdf'),
        'description'           => __( 'Alignment of the logo within header of the Catalog PDF.', 'catalog-pdf'),
        'section'               => 'wc_catalog_pdf',
        'settings'              => 'wc_catalog_pdf_logo_alignment',
        'type'                  => 'radio',
        'choices'               => array(
            'left'          => __( 'Left', 'catalog-pdf'),
            'center'        => __( 'Center', 'catalog-pdf'),
            'right'         => __( 'Right', 'catalog-pdf'),
        ),
    ) );
}
add_action( 'customize_register', 'wc_catalog_pdf_customize_register' );


/**
 * Expand {site_title} placeholder variable
 *
 * @since 1.0.3
 * @param string $string
 * @return string
 */
function wc_catalog_pdf_footer_text( $string ) {
    return str_replace( '{site_title}', wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES ), $string );
}
add_filter( 'woocommerce_email_footer_text', 'wc_catalog_pdf_footer_text' );
