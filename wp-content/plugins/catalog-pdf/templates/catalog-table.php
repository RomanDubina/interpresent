<?php
/**
 * WC Catalog PDF template
 * 
 * @package catalog-pdf
 */

/**
 * Before template hook
 *
 * @since 1.0.4
 */
do_action( 'wc_catalog_pdf_before_template' );

$logo = parse_url( get_option( 'wc_catalog_pdf_logo', get_option( 'woocommerce_email_header_image' ) ), PHP_URL_PATH );
$logo = ! $logo ? '' : $_SERVER['DOCUMENT_ROOT'] . $logo;
?>

<div id="template_header_image">
    <?php
        if ( file_exists( $logo ) ) {
            printf( '<p style="margin-top: 0; text-align: %s;"><img src="%s" style="width: %s;" alt="%s" /></p>',
                get_option( 'wc_catalog_pdf_logo_alignment', 'center' ),
                esc_url( $logo ),
                get_option( 'wc_catalog_pdf_logo_width' ) ? get_option( 'wc_catalog_pdf_logo_width' ) . 'px' : 'auto',
                get_bloginfo( 'name', 'display' )
            );
        }
    ?>
</div>
<?php 
  $cat_ids = json_decode( $_GET['cat_ids'] );
  $page = $_GET['page_current'];
  //echo $_GET['page_current'], $_GET['cat_ids'];
?>
<h3>Все товары из категорий: </h3>
<p>
<?php 
  for ($k=0; $k < count($cat_ids); $k++) {
    $term_top = get_term_by( 'id', $cat_ids[$k], 'product_cat' );
    if ($term_top) {
      ?>
      <a href="<?php echo get_term_link( $cat_ids[$k], 'product_cat' ); ?>">
        <?php echo $term_top->name; ?>
      </a>
      <?php
      
      if ($k < (count($cat_ids) - 1)) {
        echo ', ';
      } 
    }    
  }
  
  if ($page > 1) {
    echo 'Часть ' . $page;
  }
  // Number of Product in list
  $z = 1;
?>
</p>

<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 10%;text-align:left;">№</th>
            <th class="product-thumbnail">&nbsp;</th>
            <th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
            <th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>        
        </tr>
    </thead>
    <tbody>
      <?php         
        $args = array(
          'paged' => $page,
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

          if( $query->have_posts() ) :    
          	
          while( $query->have_posts() ): 
            $query->the_post();
              ?>
                <tr class="woocommerce-cart-form__cart-item">
                  <td style="width: 10%;text-align:left;"><?php echo $z; ?></td>
                  <td class="product-thumbnail" style="text-align:center;">
                    <?php
                      $size = array(75, 75);
                      $id_prod = get_the_ID();
                      $isset_size = get_the_post_thumbnail_url($id_prod, $size);
                      if ($isset_size) {
                        ?>
                        <img src="<?php echo $isset_size; ?>" alt="">
                        <?php
                      } else {
                        echo 'нет изображения';
                      }
                      /*if (has_post_thumbnail( ) && $isset_size) {                        
                        the_post_thumbnail( $size );
                      } else {
                        echo 'not found image';
                      }*/
                    ?>
                  </td>

                  <td class="product-name" style="width: 50%;text-align:left;">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>     				
                    </a>
                    <p>
                      <?php 
                        if (function_exists( 'loop_product_sku' )) {
                          loop_product_sku();
                        }
                      ?>
                    </p>
                  </td>

                  <td class="product-price" style="width: 30%;">
                    <h5>Розница: </h5>
                    <p>
                      <?php $product = wc_get_product( get_the_ID() ); ?>
                      <?php
                        echo $product->get_price_html();
                      ?>
                    </p>
                    <h5>Опт: </h5>
                    <p>
                      <span class="amount">
                        <?php 
                          $opt_old = get_field( 'wholesale_price_old' );
                          
                          if (!is_wp_error($opt_old) && !empty($opt_old)) {
                            echo '<del>' . $opt_old . '<span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>' . '</del>';
                          }
                          
                          $opt = get_field( 'wholesale_price_new' );
                          
                          if (!is_wp_error($opt) && !empty($opt)) {
                            $symbols_currency = array('тг', 'тг.', ' ', '.00');
                            $symbols_replace = array('', '', '', '');
                            
                            $opt = str_replace($symbols_currency, $symbols_replace, $opt);
                            
                            echo $opt . '<span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>';
                          }
                        ?>
                      </span>                      
                    </p>
                  </td>                
                </tr>
              <?php
            $z++;
          endwhile;
        endif;
        wp_reset_postdata();
      ?>
    </tbody>
</table>
<div id="template_footer">
    <?php echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
    
    <?php 
      $phone = get_field( 'contact_phone_1', 21 );
      $address_1 = get_field( 'contact_address_1', 21 );
      $address_2 = get_field( 'contact_address_2', 21 );
      $email= get_field( 'contact_email_1', 21 );
      
      if (!empty($phone) && !empty($address_1) && !empty($address_2) && !empty($email)):
        ?>
        <div style="width: 100%;text-align: center;">
          <p>
            <?php 
              echo $phone;
            ?>
          </p>
          <p>
            <?php 
              echo $email;
            ?>
          </p>
          <p>
            <?php 
              echo $address_1;
            ?>
          </p>
          <p>
            <?php 
              echo $address_2;
            ?>
          </p>
        </div>
        <?php 
      endif;
    ?>
</div>

<?php
/**
 * After template hook
 *
 * @since 1.0.4
 */
do_action( 'wc_catalog_pdf_after_template' );
