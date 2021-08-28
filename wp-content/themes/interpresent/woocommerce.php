<?php
  get_header(  );
?>

<main class="page-main <?php if (is_search()) echo 'search'; ?>">
  <?php 
    if (is_shop() || is_product_category() || is_search()) :
  ?>
    <section class="promotion promotion--catalog">
      <div class="promotion__wrapper">
        <?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
                
        <div class="promotion__container">
          <aside class="promotion__aside promotion__aside--catalog">
			  <meta itemprop="name" content="Каталог">
            <?php
              /**
               * Hook: woocommerce_my_header_page.
               *
               * @hooked woocommerce_my_title_page - 5             
               */
              do_action( 'woocommerce_my_header_page' );
            ?>
            
            <div class="category">
              <div itemscope itemtype="http://schema.org/ItemList" class="category__list category__list--catalog">
                <?php
                  $taxonomy     = 'product_cat';
                  $orderby      = 'menu_order';  
                  $show_count   = 1;      // 1 for yes, 0 for no
                  $pad_counts   = 1;      // 1 for yes, 0 for no
                  $hierarchical = 1;      // 1 for yes, 0 for no  
                  $title        = '';  
                  $empty        = 0;
                  $waiting_category_id = 26;

                  $args = array(
                         'taxonomy'     => $taxonomy,
                         'orderby'      => $orderby,
                         'show_count'   => $show_count,
                         'pad_counts'   => $pad_counts,
                         'hierarchical' => $hierarchical,
                         'title_li'     => $title,
                         'hide_empty'   => $empty
                  );
                  $all_categories = get_categories( $args );
                  
                  // Если возникла ошибка запроса или терминов нет - прерываем выполнение функции
                  if ( is_wp_error( $all_categories ) || ! $all_categories ) {
                    return;
                  }
                  
                  $index = 0;
                  foreach ($all_categories as $cat) {                    
                    if($cat->category_parent == 0) {
                      if ($index === 0) {
                        echo '<div class="category__top">';
                      }                      
                      
                      $category_id = $cat->term_id;       
                      
                      if ($category_id !== $waiting_category_id) {
                        $args2 = array(
                                'taxonomy'     => $taxonomy,
                                'child_of'     => 0,
                                'parent'       => $category_id,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty
                        );
                        $sub_cats = get_categories( $args2 );
                        if($sub_cats) {
                          ?>
                            <div itemscope itemprop="itemListElement" itemtype="http://schema.org/Product" class="category__item category__item--catalog category__item--parent">
                              <a itemprop="url" content="<?php echo $cat->name; ?>" href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">
                                <?php echo $cat->name; ?>
                              </a>
                              <span itemprop="offerCount">
                                <?php echo $cat->count; ?>
                              </span>
                              <ul itemscope itemtype="http://schema.org/ItemList" class="category__children category__children--catalog">
                                <?php 
                                  foreach($sub_cats as $sub_category) : 
                                ?>
                                  <li itemscope itemprop="itemListElement" itemtype="http://schema.org/Product">
                                    <a itemprop="url" content="<?php echo $sub_category->name; ?>" href="<?php echo get_term_link($sub_category->slug, 'product_cat'); ?>"><?php echo $sub_category->name; ?></a>
                                    <span itemprop="offerCount"><?php echo $sub_category->count; ?></span>
                                  </li>
                                <?php 
                                  endforeach;
                                ?>
                              </ul>
                            </div>
                          <?php
                        } else {
                          ?>
                            <div itemscope itemprop="itemListElement" itemtype="http://schema.org/Product" class="category__item category__item--catalog">
                              <a itemprop="url" content="<?php echo $cat->name; ?>" href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">
                                <?php echo $cat->name; ?>
                              </a>
                              <span itemprop="offerCount">
                                <?php echo $cat->count; ?>
                              </span>
                            </div>
                          <?php
                        }
                      }                       
                      
                      if ($index === 3) {
                        echo '</div>';
                        echo '<div class="category__bottom">';
                      }
                      
                      if ($index === (count($all_categories) - 1)) {
                        echo '</div>';
                      }
                      
                      $index++; 
                    }                     
                  }                 
                ?>              
              </div>
            </div>
          </aside>
          <div class="promotion__right promotion__right--catalog">
            <header class="promotion__header promotion__header--page">          
              <?php
                /**
                 * Hook: interpresent_header_catalog.
                 *
                 * @hooked woo_show_subcategory - 5  
                 * @hooked woocommerce_my_title_page_mobile - 10            
                 */
                do_action( 'interpresent_header_catalog' );
              ?>
              <!-- <div class="promotion__search promotion__search--header">
                <div class="my-search my-search--catalog">            
                  <form class="my-search__form my-search__form--catalog" role="search" method="get" action="<?php echo home_url( '/' ); ?>" >
                    <button class="my-search__button my-search__button--catalog" type="submit" name="search-btn">
                      <svg width="16" height="16" aria-label="Поиск">
                        <use xlink:href="#icon-search"></use>
                      </svg>
                    </button>
                    <input type="text" autocomplete="off" value="<?php echo get_search_query(); ?>" name="s" class="my-search__input my-search__input--catalog" placeholder="Название товара" />
                    <input type="hidden" name="post_type" value="product" />
                  </form>
                  <div class="my-search__result my-search__result--catalog">
                    <svg class="my-search__preloader" width="16" height="16" aria-label="Идёт поиск">
                      <use xlink:href="#icon-more"></use>
                    </svg>
                    <div class="my-search__list">
                    </div>
                  </div>
                </div>                
              </div> -->
              
              <?php
              /**
               * Hook: woocommerce_my_sort_page.
               * 
               * @hooked custom_catalog_ordering_start - 5   
               * @hooked woocommerce_catalog_ordering - 10    
               * @hooked custom_catalog_ordering_end - 15               
               */
              do_action( 'woocommerce_my_sort_page' );
              ?>  
            <!-- </header> --- "woo_end_header_catalog_right" -->
            
            <?php woocommerce_content(); ?>
          </div>
        </div>
      </div>
    </section>  
  <?php
    elseif (is_singular( 'product' )) :
  ?>
    <?php woocommerce_content(); ?>
  <?php
    endif;
  ?>
  
</main>

<?php
  get_footer(  );
?>