
<?php
  get_header(  );
?>

<main class="page-main">
  <div class="visually-hidden">
    <?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
  </div>
  
  <section class="sale">    
    <header class="sale__header">
      <div class="sale__wrapper sale__wrapper--header">
        <h1 class="sale__title">
          <?php the_title(); ?>
        </h1>
        <p class="sale__sub-title">
          <?php the_field( 'sale_sub_title' ); ?>
        </p>
      </div>
      <?php 
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        } else {
            echo "<img src='" . get_template_directory_uri() . '/assets/img/not-found.jpg' .
            "' alt='" . get_the_title() . "' title='" . get_the_title() . "'>";
        }                      
      ?>
      <div class="sale__mask"></div>
    </header>
    <div class="sale__wrapper sale__wrapper--center">
      <?php the_content( $more_link_text = null, $strip_teaser = false ); ?>
    </div>
  </section>
  <section class="promotion promotion--best">
    <div class="promotion__wrapper">
      <h2 class="title title--best">
        <?php the_field( 'sale_title' ); ?>
      </h2>
      
      <?php 
        $slug_category = get_field( 'sale_cat_slug' );
        
        if (!empty($slug_category)) {
          $args = array (
            'paged' => 1,
            'posts_per_page' => 12,
            'post_type' => 'product',
            'post_status' => array( 'publish' ),
            'tax_query' => array(
              array (
                'taxonomy' => 'product_cat',
          			'field'    => 'slug',
          			'terms'    => array( $slug_category ),
              ),
            ),
          );
        } else {    
          $args = array (
            'paged' => 1,
            'posts_per_page' => 12,
            'post_type' => 'product',
            'post_status' => array( 'publish' ),
            'meta_query'     => array(
              'relation' => 'OR',
              array( // Simple products type
                  'key'           => '_sale_price',
                  'value'         => 0,
                  'compare'       => '>',
                  'type'          => 'numeric'
              ),
              array( // Variable products type
                  'key'           => '_min_variation_sale_price',
                  'value'         => 0,
                  'compare'       => '>',
                  'type'          => 'numeric'
              )      
            ),
          );
        }
        
         $query = new WP_Query($args); 
          if( $query->have_posts() ) {                   
      ?> 
      <ul class="promotion__list promotion__list--best">                     
        <?php 
          while( $query->have_posts() ) {
            $query->the_post(); 
        
            get_template_part( 'woocommerce/content', 'product-sale' );
          }
        ?>
      </ul>
      <?php 
        if (  $query->max_num_pages > 1 && get_query_var('paged') < $query->max_num_pages ) :
      ?>
        <script>
          var true_posts = '<?php echo addslashes(wp_json_encode($query->query_vars)); ?>';
          var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
          var max_pages = '<?php echo $query->max_num_pages; ?>';
          var post_on_page = '<?php echo $query->post_count; ?>';        
          var post_type = '<?php echo $query->get('post_type') ? $query->get('post_type') : get_post_type(); ?>';
          var single = '<?php echo is_singular( 'post' ); ?>';
          
        </script>
        
        <button class="promotion__more" id="true_loadmore" type="button" name="more">
          <svg width="16" height="16" aria-label="Вращение по кругу">
            <use xlink:href="#icon-more"></use>
          </svg>
          <span>Загрузить ещё</span>
        </button>
      <?php  
        endif;
      ?>
      <?php          
        } 
        else {
          get_template_part( 'template-parts/content', 'none' );
        }
     
        wp_reset_postdata(); // сброс
      ?>
    </div>
  </section>
  <section class="sale">
    <div class="sale__wrapper sale__wrapper--bottom">
      <div class="sale__left">
        <?php the_field( 'sale_left' ); ?>
      </div>
      <div class="sale__right">
        <?php the_field( 'sale_right' ); ?>
      </div>
    </div>
  </section>
</main>

<?php
  get_footer(  );
?>
