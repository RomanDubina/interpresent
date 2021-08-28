<?php
/* interpresent */
  add_action('wp_enqueue_scripts', 'interpresent_styles', 3);
  add_action('wp_enqueue_scripts', 'interpresent_scripts', 5);

  add_action( 'after_setup_theme', 'after_setup_theme_function' );
  
  if (!function_exists('after_setup_theme_function')) :
    function after_setup_theme_function () {
      load_theme_textdomain('interpresent', get_template_directory() . '/languages');
      
      register_nav_menu( 'top_menu', 'Навигация по сайту в шапке' );
      register_nav_menu( 'bottom_menu', 'Навигация по сайту в подвале' );
      
      // WooCommerce support.
      add_theme_support('woocommerce');
    
      add_theme_support('html5', array('search-form'));
      
      add_theme_support( 'custom-logo' );
          
      add_theme_support( 'post-thumbnails' );  
      
      // Short text
      add_filter('excerpt_more', function($more) {
      	return '';
      });
    }
  endif;
  
  // Styles theme
  
  function interpresent_styles () {    
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/libs/swiper-bundle.min.css');
    
    wp_enqueue_style('fancy-box-style', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css');
    wp_enqueue_style('interpresent-style', get_stylesheet_uri());
  }
  
  // add_filter( 'stylesheet_uri', 'style_minify', 10, 2 );
  // function style_minify( $stylesheet_uri, $stylesheet_dir_uri ){
  // 	$stylesheet_uri = get_template_directory_uri() . '/style.min.css';
  // 
  // 	return $stylesheet_uri;
  // }

  // Scripts theme
  
  function interpresent_scripts () {  
    // Перезагрузка страницы при смене зазмера экрана экрана
    wp_enqueue_script('reloader-script', get_template_directory_uri() . '/assets/js/reloader.js', $deps = array(), $ver = null, $in_footer = true );   

    wp_enqueue_script('header-script', get_template_directory_uri() . '/assets/js/header.min.js', $deps = array(), $ver = null, $in_footer = true );   
    wp_enqueue_script('menu-script', get_template_directory_uri() . '/assets/js/menu.min.js', $deps = array(), $ver = null, $in_footer = true );  
    
    if (is_product() || (is_front_page() && !is_home()) || is_page_template('page-about.php')) {
      wp_enqueue_script('swiper-script', get_template_directory_uri() . '/assets/libs/swiper-bundle.min.js', $deps = array(), $ver = null, $in_footer = true );  
      wp_enqueue_script('swiper-init-script', get_template_directory_uri() . '/assets/js/swiper-init.min.js', $deps = array(), $ver = null, $in_footer = true );  
    }
    
    wp_enqueue_script('category-script', get_template_directory_uri() . '/assets/js/category.min.js', $deps = array(), $ver = null, $in_footer = true );  
    wp_enqueue_script('cart-script', get_template_directory_uri() . '/assets/js/cart.min.js', $deps = array(), $ver = null, $in_footer = true ); 
        
    wp_enqueue_script('popup-script', get_template_directory_uri() . '/assets/js/popup.min.js', $deps = array(), $ver = null, $in_footer = true );
    
    wp_enqueue_script('form-script', get_template_directory_uri() . '/assets/js/form.min.js', $deps = array(), $ver = null, $in_footer = true );
  
    if (is_front_page()) {
      wp_enqueue_script('advantage-script', get_template_directory_uri() . '/assets/js/advantage.min.js', $deps = array(), $ver = null, $in_footer = true );  
    } 
    
    if (is_checkout()) {
      wp_enqueue_script('checkout-script', get_template_directory_uri() . '/assets/js/checkout.min.js', $deps = array(), $ver = null, $in_footer = true );
    }
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('search-script', get_template_directory_uri() . '/assets/js/search.min.js', $deps = array('jquery'), $ver = null, $in_footer = true );   
    wp_enqueue_script('count-script', get_template_directory_uri() . '/assets/js/count-product.min.js', $deps = array('jquery'), $ver = null, $in_footer = true );   
    
    if (is_product()) {
      wp_enqueue_script('fancy-box-script', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js', $deps = array('jquery'), $ver = null, $in_footer = true ); 
      
      wp_enqueue_script('oneclick-script', get_template_directory_uri() . '/assets/js/oneclick.min.js', $deps = array('jquery'), $ver = null, $in_footer = true ); 
    }
    
    wp_enqueue_script('select-count-product-script', get_template_directory_uri() . '/assets/js/select-count-product.min.js', $deps = array('jquery'), $ver = null, $in_footer = true ); 
    
    $args = array();
     
    $args['url'] = admin_url('admin-ajax.php');      
    
    if (class_exists('WooCommerce')) {
      $args['cart'] = WC()->cart;
      
      if (is_product()) {
        $args['nonce'] = wp_create_nonce('oneclick-interpresent');
      }
    }    
    
    wp_localize_script( 'cart-script', 'interpresent_ajax', $args);
    
    if (is_home() || is_front_page()) {
      wp_enqueue_script('news-script', get_template_directory_uri() . '/assets/js/show-or-hide-text-news.min.js', $deps = array(), $ver = null, $in_footer = true );  
    } 
    
    if (is_shop() || is_product_category() || is_search() || is_home() || is_singular( 'post' ) || is_singular( 'product' )) {
      wp_enqueue_script('loadmore-script', get_template_directory_uri() . '/assets/js/loadmore.min.js', $deps = array(), $ver = null, $in_footer = true );
    }   
    
    if (is_singular( 'product' )) {
      // Лупа увеличивающая на изображении продукта
      //wp_enqueue_script('image-zoom-script', get_template_directory_uri() . '/assets/js/image-zoom.min.js', $deps = array(), $ver = null, $in_footer = true );
    }   
    
    if (is_page_template('page-order.php') || is_page_template('page-opt.php') || is_singular( 'product') ) {
      wp_enqueue_script('faq-script', get_template_directory_uri() . '/assets/js/faq.min.js', $deps = array(), $ver = null, $in_footer = true );  
    } 
  }
  
  // новые Хлебные крошки
  
  function new_yoast_breadcrumbs () {
    $WPSEO_Breadcrumbs = new WPSEO_Breadcrumbs();
    $yoast_breadcrumbs_links = $WPSEO_Breadcrumbs->get_links();  
    
    if ($yoast_breadcrumbs_links) {
      ?>
        <ul class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
          <?php
            $i = 0;
            foreach ($yoast_breadcrumbs_links as $yoast_breadcrumbs_link) {
              if ($i < (count($yoast_breadcrumbs_links) - 1)) {
                ?>
                  <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="<?= $yoast_breadcrumbs_link['url']; ?>" itemprop="item">
                      <span itemprop="name"><?= $yoast_breadcrumbs_link['text']; ?></span>
                      <meta itemprop="position" content="<?= $i; ?>">
                    </a>
                  </li>
                <?php
              } else {
                ?>
                  <li class="breadcrumbs__item breadcrumbs__item--current">
                    <span>
                      <?= $yoast_breadcrumbs_link['text']; ?>
                    </span>
                  </li>
                <?php
              }     
              $i++; 
            }
          ?>
        </ul>
      <?php
    }
  }
  
  
  if (class_exists('WooCommerce')) {
    if( wp_doing_ajax() ){
      add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
      add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

      add_action('wp_ajax_update_total_price', 'update_total_price');
      add_action('wp_ajax_nopriv_update_total_price', 'update_total_price');
      
      add_action('wp_ajax_apply_coupon_ajax', 'apply_coupon_ajax');
      add_action('wp_ajax_nopriv_apply_coupon_ajax', 'apply_coupon_ajax');
      
      add_action('wp_ajax_nopriv_new_ajax_search','new_ajax_search');
      add_action('wp_ajax_new_ajax_search','new_ajax_search');
      
      add_action('wp_ajax_loadmore', 'true_load_posts');
      add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
      
      add_action( 'wp_ajax_roomble_ajax_create_order', 'roomble_ajax_create_order' );
      add_action( 'wp_ajax_nopriv_roomble_ajax_create_order', 'roomble_ajax_create_order' );
    }
      
    // Количество товаров в корзине ( ajax добавление )
    
    if (!function_exists('interpresent_mini_cart')) {

      function interpresent_mini_cart () {   
        $count_product_on_cart = wp_kses_data(WC()->cart->get_cart_contents_count());
        ?>	
        <svg class="my-cart__icon <?php if ($count_product_on_cart > 0) echo 'active'; ?>" width="32" height="32" aria-label="Корзина">
          <use xlink:href="#icon-cart"></use>
        </svg>	
                
        <p class="my-cart__top">
          В корзине          
          <span class="my-cart__count">
            <?php echo '(' . wp_kses_data(WC()->cart->get_cart_contents_count()) . ')'; ?>
          </span>          
        </p>
        <p class="my-cart__bottom">
          <span class="my-cart__total">
            <?php 
              echo wp_kses_data(WC()->cart->get_cart_total()); 
            ?>
          </span>
        </p>
        
        <?php  
      }  
    }
    
    add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_icon');
    
    function wc_refresh_mini_cart_icon ($fragments) {
      ob_start();
      
      $count_product_on_cart = wp_kses_data(WC()->cart->get_cart_contents_count());
      ?>
      <svg class="my-cart__icon <?php if ($count_product_on_cart > 0) echo 'active'; ?>" width="32" height="32" aria-label="Корзина">
        <use xlink:href="#icon-cart"></use>
      </svg>
      <?php
      $fragments['.my-cart__icon'] = ob_get_clean();
      
      return $fragments;  
    }
    
    add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
    
    function wc_refresh_mini_cart_count ($fragments) {
      ob_start();
      ?>
      <span class="my-cart__count">
        <?php echo '(' . WC()->cart->get_cart_contents_count() . ')'; ?>
      </span>
      <?php
      $fragments['.my-cart__count'] = ob_get_clean();
      
      return $fragments;  
    }
    
    add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_total');
    
    function wc_refresh_mini_cart_total ($fragments) {
      ob_start();
      ?>
      <span class="my-cart__total">
        <?php 
          echo WC()->cart->get_cart_total(); 
        ?>
      </span>
      <?php
      $fragments['.my-cart__total'] = ob_get_clean();
      
      return $fragments;  
    }
    
    add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_coupon_cart');
    
    function wc_refresh_coupon_cart ($fragments) {
      ob_start();
      $coupons_applied = WC()->cart->get_coupons();
      ?>
      <div class="my-basket__coupon">        
        <?php if (empty($coupons_applied)): ?>
          <?php if ( wc_coupons_enabled() ) { ?>
  					<div class="coupon">
  						<label class="coupon__label" for="coupon_code">
  							<?php esc_html_e( 'Введите купон:', 'interpresent' ); ?>
  						</label> 
  						<input type="text" name="coupon_code" class="coupon__input" id="coupon_code" value="" placeholder="" /> 
  						<button type="submit" class="coupon__button" name="apply_coupon" value="<?php esc_attr_e( 'Применить', 'interpresent' ); ?>">
  							<?php esc_attr_e( 'Применить', 'interpresent' ); ?>
  						</button>
  						<?php do_action( 'woocommerce_cart_coupon' ); ?>
  					</div>
  				<?php } ?>
        <?php elseif (!empty($coupons_applied)) : ?>
          <div class="total total--top">
    				<h4 class="total__title total__title--top">
    					<?php esc_html_e( 'Стоимость', 'interpresent' ); ?>
    				</h4>
    				<?php wc_cart_totals_subtotal_html(); ?>
    			</div>
    			<div class="total total--center">
    				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
    					<h4 class="total__title total__title--center">
    						<?php esc_html_e( 'Скидка по купону', 'interpresent' ); ?>
    					</h4>
    					<?php wc_cart_totals_coupon_html( $coupon ); ?>
    				<?php endforeach; ?>
    			</div>        
        <?php endif; ?> 
      </div>       
      <?php
      $fragments['.my-basket__coupon'] = ob_get_clean();
      
      return $fragments;  
    }

    // Функция Корзины в попапе
    
    if (!function_exists('interpresent_cart')) {

      function interpresent_cart ( $args = array() ) {  
        $defaults = array(
      		'list_class' => '',
      	);

      	$args = wp_parse_args( $args, $defaults ); 
        wc_get_template( 'cart/cart.php', $args );
      }  
    }
    
    add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_cart');
    
    function wc_refresh_cart ($fragments) {
      ob_start();
      ?>
      <div id="my-basket__container">
        <?php
        
        interpresent_cart();
        
        ?>
      </div>
      <?php
      $fragments['#my-basket__container'] = ob_get_clean();
      
      return $fragments;  
    }
    
    // woocommerce_ajax_add_to_cart
    
    function woocommerce_ajax_add_to_cart() {
      $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
      $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
      $variation_id = absint($_POST['variation_id']);
      $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
      $product_status = get_post_status($product_id);

      if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

          do_action('woocommerce_ajax_added_to_cart', $product_id);

          if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
              wc_add_to_cart_message(array($product_id => $quantity), true);
          }

          WC_AJAX :: get_refreshed_fragments();
      } else {

          $data = array(
              'error' => true,
              'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

          echo wp_send_json($data);
      }

      wp_die();
            
    }
    
    // Корзина ajax обновление при удалении и изменении количества
    
    function update_total_price() {
      // Skip product if no updated quantity was posted or no hash on WC_Cart
      if( !isset( $_POST['hash'] ) || !isset( $_POST['quantity'] ) ){
          exit;
      }

      $cart_item_key = $_POST['hash'];

      if( !isset( WC()->cart->get_cart()[ $cart_item_key ] ) ){
          exit;
      }

      $values = WC()->cart->get_cart()[ $cart_item_key ];

      $_product = $values['data'];

      // Sanitize
      $quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

      if ( '' === $quantity || $quantity == $values['quantity'] )
          exit;

      // Update cart validation
      $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $values, $quantity );

      // is_sold_individually
      if ( $_product->is_sold_individually() && $quantity > 1 ) {
          wc_add_notice( sprintf( __( 'You can only have 1 %s in your cart.', 'woocommerce' ), $_product->get_title() ), 'error' );
          $passed_validation = false;
      }

      if ( $passed_validation ) {
          WC()->cart->set_quantity( $cart_item_key, $quantity, false );
      }

      // Recalc our totals
      WC()->cart->calculate_totals();
      
      //woocommerce_cart_totals();
      
      /*$data = array(
        'sub_total' => WC()->cart->get_product_subtotal( $_product, $quantity ),
        'sub_totals' => WC()->cart->get_cart_subtotal(),
        'totals' => WC()->cart->get_cart_total(),
      );
      
      echo wp_send_json($data);*/
      
      WC_AJAX::get_refreshed_fragments();
      
      exit;        
    }
    
    // Применение купона ajax

    function apply_coupon_ajax() {
      $coupon_code = wc_format_coupon_code( $_POST['coupon_val'] );
      
      if (isset($coupon_code)) {
        $coupons_applied = WC()->cart->get_coupons(); 
        
        if (empty($coupons_applied)) {
          // Применить купон
          
          WC()->cart->apply_coupon( $coupon_code );
          
          // Recalc our totals
          WC()->cart->calculate_totals();
        } else if (!empty($coupons_applied)) {
          // Удалить купон
          
          WC()->cart->remove_coupon( $coupon_code );
          
          // Recalc our totals
          WC()->cart->calculate_totals();
        }        
      }
      
      WC_AJAX::get_refreshed_fragments();
      
      exit;
    }
    
    // Переопределяю шаблон формы поиска
    
    add_filter('get_search_form', 'new_search_form');
    
    function new_search_form($form) {
    	$form = '        
        <form class="my-search__form" action="' . home_url( '/' ) . '" method="get" role="search" >
          <input class="my-search__input" autocomplete="off" type="text" name="s" value="' . get_search_query() . '" id="s" placeholder="Поиск по товарам">
          <button class="my-search__button" type="submit" name="search-btn">
            <svg width="24" height="24" aria-label="Поиск">
              <use xlink:href="#icon-search"></use>
            </svg>
            <span>Поиск</span>
          </button>
          <input type="hidden" name="post_type" value="product" />
        </form> 
        
        <div class="my-search__result">
          <svg class="my-search__preloader" width="16" height="16" aria-label="Идёт поиск">
            <use xlink:href="#icon-more"></use>
          </svg>
          <ul class="my-search__list">
          </ul>
        </div>
    	';
    	return $form;
    }

    function new_ajax_search() {
      $not_found = true;
      $found_posts = 0;
      
      $s = htmlspecialchars($_POST['term']);
    	$args = array(
    		's' => $s,
        'post_type' => 'product',
    		'posts_per_page' => 10,
    	);
    
    	$the_query = new WP_Query($args);
    	if ($the_query->have_posts()) {
        $not_found = false;
        $found_posts += $the_query->found_posts;
    		while ($the_query->have_posts()) {
    			$the_query->the_post();
      ?>
      			<li class="my-search__item">
              <a href="<?php the_permalink(); ?>">
                <div class="my-search__image">
                  <?php
          					woocommerce_template_loop_product_thumbnail();
          				?>
                </div>
                <div class="my-search__info">
                  <h5>
                    <?php the_title(); ?>
                  </h5>
                  <?php $product = wc_get_product( get_the_ID() ); /* get the WC_Product Object */ ?>
                  <p>
                    <?php echo $product->get_price_html(); ?>
                  </p>
                </div>      				
              </a>
      			</li>
      <?php
      	}
      }
        
      wp_reset_postdata(); 
      
      $args = array(
        'posts_per_page'  => 10,
        'post_type'       => 'product',
        'meta_query' => array(
            array(
                'key' => '_sku',
                'value' => $s,
                'compare' => 'LIKE'
            )
        )
      );
      
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) {
        $not_found = false;
        $found_posts += $the_query->found_posts;
        
        while ($the_query->have_posts()) {
          $the_query->the_post();
        ?>
            <li class="my-search__item">
              <a href="<?php the_permalink(); ?>">
                <div class="my-search__image">
                  <?php
                    woocommerce_template_loop_product_thumbnail();
                  ?>
                </div>
                <div class="my-search__info">
                  <h5>
                    <?php the_title(); ?>
                  </h5>
                  <?php $product = wc_get_product( get_the_ID() ); /* get the WC_Product Object */ ?>
                  <p>
                    <?php echo $product->get_price_html(); ?>
                  </p>
                </div>      				
              </a>
            </li>
        <?php
        }    
      }
              
       wp_reset_postdata(); 
       
      if ($not_found === true) {
        ?>
        <li class="my-search__item">
          <span class="not_found">Ничего не найдено, попробуйте другой запрос</span>
        </li>
        <?php          
      } else {
        ?>
        <li class="my-search__item my-search__item--all">
          <a class="my-search__all" href="<?php echo bloginfo( 'url' ) . '?s=' . $s . '&search-btn=&post_type=product'; ?>">Показать все ( <?php echo $found_posts; ?> )</a>
        </li>
        <?php
      }  

      exit;
    }    
    
    /**
     * Создание заказа по кнопке "Заказать в один клик
     */
    function roomble_ajax_create_order() {

    	// Получить корзину
    	$cart = WC()->cart;

    	$phone = esc_attr( trim( $_REQUEST['phone'] ) );
    	$email = esc_attr( trim( $_REQUEST['email'] ) );
    	$name = esc_attr( trim( $_REQUEST['name'] ) );
    	$message = esc_attr( trim( $_REQUEST['message'] ) );
      $nonce = esc_attr( trim( $_REQUEST['nonce'] ) );

    	if( ! wp_verify_nonce( $nonce, 'oneclick-interpresent' ) ) {
    		wp_send_json_error('Не совпадает ключ безопасности. Обратитесь к разработчикам.');
    	
        wp_die();
      }

    	$address = [
    		'first_name' => $name,
    		'email'      => $email,
    		'phone'      => $phone,
    	];
      
    	$order = wc_create_order();

    	// Информация о покупателе
    	$order->set_address( $address, 'billing' );
    	$order->set_address( $address, 'shipping' );
      
      $order->set_customer_note( $message );

    	// Товары из корзины
    	foreach( $cart->get_cart() as $cart_item_key => $cart_item ) {

    		$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    		$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

    		$order->add_product( $_product, $cart_item['quantity'], [
    			'variation' => $cart_item['variation'],
    			'totals'    => [
    				'subtotal'     => $cart_item['line_subtotal'],
    				'subtotal_tax' => $cart_item['line_subtotal_tax'],
    				'total'        => $cart_item['line_total'],
    				'tax'          => $cart_item['line_tax'],
    				'tax_data'     => $cart_item['line_tax_data']
    			]
    		]);
    	}

    	// Добавить купоны
    	foreach ( $cart->get_coupons() as $code => $coupon ) {
    		$order->add_coupon( $code, $cart->get_coupon_discount_amount( $code ), $cart->get_coupon_discount_tax_amount( $code ) );
    	}

    	$order->calculate_totals();

    	// Отправить письмо юзеру
    	$mailer = WC()->mailer();
    	$email = $mailer->emails['WC_Email_Customer_Processing_Order'];
    	$email->trigger( $order->id );

    	// Отправить письмо админу
    	$email = $mailer->emails['WC_Email_New_Order'];
    	$email->trigger( $order->id );

    	// Очистить корзину
    	$cart->empty_cart();
      
      WC_AJAX::get_refreshed_fragments();
      
      wp_die();
    }
    
    // Страница архива продуктов
    
    // Удаляю описание категорий
    
    remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
    
    // Удаляем стандартный вывод

    remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );
    
    // Вывожу в кастомную шапку каталога

    add_action( 'interpresent_header_catalog', 'woo_show_subcategory', 5 );

    function woo_show_subcategory () {
      global $wp_query;
      $cat = $wp_query->get_queried_object();
      $termID = $cat->term_id; //динамическое получение ID текущей рубрики
      $taxonomyName = 'product_cat';
      $termchildren = get_term_children( $termID, $taxonomyName );

      if ((count($termchildren) > 0) || is_shop()) {
        ?>
          <ul itemscope itemtype="http://schema.org/ItemList" class="promotion__list promotion__list--subcat">
            <?php
              echo woocommerce_maybe_show_product_subcategories();
            ?>
          </ul>
        <?php
        
        echo '<div class="term-description">';
        $description = term_description();
        
        echo $description;
        echo '</div>';
      }
    }
    
    // Убираю количество товаров в категории из Заголовка
    add_filter( 'woocommerce_subcategory_count_html', 'remove_count_into_the_title_category', 10, 2 );
    function remove_count_into_the_title_category ( $html, $category ){
    	$html = '';

    	return $html;
    }
    
    // Добавляю обертку для картинки Сабкатегории
    
    add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail_before', 5 );
    add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail_after', 15 );
    
    function woocommerce_subcategory_thumbnail_before () {
      echo '<div class="subcat-img">';
    }
    
    function woocommerce_subcategory_thumbnail_after () {
      echo '</div>';
    }
    
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    
    // Удаляет название страницы
    
    add_filter( 'woocommerce_show_page_title', 'wc_hide_title' );
    
    function wc_hide_title ($show) {
      $show = false;
      
      return $show;
    }
    
    // Новое название страницы
    
    add_action( 'woocommerce_my_header_page', 'woocommerce_my_title_page', 5 ); // десктоп
        
    function woocommerce_my_title_page () {
      ?>
      <h1 class="title title--catalog">
        <?php woocommerce_page_title(); ?>
      </h1>
      <?php
    }
    
    add_action( 'interpresent_header_catalog', 'woocommerce_my_title_page_mobile', 10 ); // мобильное
    
    function woocommerce_my_title_page_mobile () {
      if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
        return;
      }
      
      ?>
      <h1 class="title title--catalog">
        <?php woocommerce_page_title(); ?>
      </h1>
      <?php
    }
    
    // Сортировка 
    
    add_action( 'woocommerce_my_sort_page', 'custom_catalog_ordering_start', 5);
    
    function custom_catalog_ordering_start () {
      if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
    		return;
    	}
      
      echo '<div class="promotion__sort">
              <h4 class="promotion__sort-title">Сортировка:</h4>';
    }
        
    add_action( 'woocommerce_my_sort_page', 'woocommerce_catalog_ordering', 10);
    
    add_action( 'woocommerce_my_sort_page', 'custom_catalog_ordering_end', 15);
    
    function custom_catalog_ordering_end () {
      if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
    		return;
    	}
      
      echo '</div>';
    }
    
    add_filter( 'woocommerce_catalog_orderby', 'change_default_sort_by' );

    // Добавляем/удаляем условия в стандартный вывод сортировки WP (выпадающий список)
    
    function change_default_sort_by ( $orderby ){
      unset($orderby["price"]); // Сортировка по цене по возрастанию
      unset($orderby["price-desc"]); // Сортировка по цене по убыванию
      unset($orderby["popularity"]); // Сортировка по популярности
      unset($orderby["rating"]); // Сортировка по рейтингу
      unset($orderby["date"]);    // Сортировка по дате
      unset($orderby["title"]);	 // Сортировка по названию
      unset($orderby["menu_order"]); // Сортировка по умолчанию (можно определить порядок в админ панели)
      
      $orderby['popularity_desc'] = __( 'по популярности', 'interpresent' );
      $orderby['price_asc'] = __( 'от дешевых к дорогим', 'interpresent' );
      $orderby['price_desc'] = __( 'от дорогих к дешевым', 'interpresent' );
      
      return $orderby;
    }
    
    // Добавим/удалим в кастомайзер пункты Сортировки
    
    add_filter( 'woocommerce_default_catalog_orderby_options', 'remove_default_sort_by_rating' );

    function remove_default_sort_by_rating( $orderby ){
      unset($orderby["price"]); // Сортировка по цене по возрастанию
      unset($orderby["price-desc"]); // Сортировка по цене по убыванию
      unset($orderby["popularity"]); // Сортировка по популярности
      unset($orderby["rating"]); // Сортировка по рейтингу
      unset($orderby["date"]);    // Сортировка по дате
      unset($orderby["title"]);	 // Сортировка по названию
      unset($orderby["menu_order"]); // Сортировка по умолчанию (можно определить порядок в админ панели)
      
      $orderby['popularity_desc'] = __( 'По популярности', 'interpresent' );
      $orderby['price_asc'] = __( 'От дешевых к дорогим', 'interpresent' );
      $orderby['price_desc'] = __( 'От дорогих к дешевым', 'interpresent' );
      
      return $orderby;
    }
    
    // По каким критериям мы будем осуществлять нашу сортировку
    add_filter( 'woocommerce_get_catalog_ordering_args', 'woocommerce_get_catalog_ordering_new_args' );
     
    function woocommerce_get_catalog_ordering_new_args( $args ) {
      if (isset($_GET['orderby'])) {
        switch ($_GET['orderby']) :
          case 'popularity_desc' :
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            $args['meta_key'] = 'total_sales';  
          break;
          case 'price_asc' :
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'ASC';
            $args['meta_key'] = '_price';                 
          break;
          case 'price_desc' :
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            $args['meta_key'] = '_price';                 
          break;    
        endswitch;  
      }  
     
    	return $args;
    }
    
    // Описание под товарами у категорий без подкатегорий
    
    add_action( 'woocommerce_after_shop_loop', 'show_description_catecory_product_without_children', 11 );
    
    function show_description_catecory_product_without_children () {
      global $wp_query;
      $cat = $wp_query->get_queried_object();
      $termID = $cat->term_id; //динамическое получение ID текущей рубрики
      $taxonomyName = 'product_cat';
      $termchildren = get_term_children( $termID, $taxonomyName );

      if ((count($termchildren) == 0)) {
        echo '<div class="term-description">';
        $description = term_description();
        
        echo $description;
        echo '</div>';
      }
    }
    
    // Показать больше кнопка
        
    //add_action( 'woocommerce_after_shop_loop', 'woocommerce_show_more', 8 ); // Каталог
    add_action( 'ajax_more_button_show', 'woocommerce_show_more', 5 );// Акции и новости
    
    function woocommerce_show_more () {
      global $wp_query;
      
      if (  $wp_query->max_num_pages > 1 && get_query_var('paged') < $wp_query->max_num_pages ) :
      ?>
      <script>
        var true_posts = '<?php echo addslashes(wp_json_encode($wp_query->query_vars)); ?>';
        
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        var post_on_page = '<?php echo $wp_query->post_count; ?>';        
        var post_type = '<?php echo get_post_type(); ?>';
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
    }
    
    // Загрузить ещё (функция-обработчик запроса)
    
    function true_load_posts(){     
    	$args = json_decode( stripslashes( $_POST['query'] ), true );
      $paged = $_POST['page'] + 1; // следующая страница
    	$args['paged'] = $paged; 
    	$args['post_status'] = 'publish';
      
      if ($args[ 'product_cat' ]) {
        $category_name = $args[ 'product_cat' ];
        $category = get_term_by('slug', $category_name, 'product_cat', 'ARRAY_A');
        $category_id = $category['term_id'];
        
        $args[ 'post_type' ] = 'product';
        
        $args['tax_query'] = array(
          array (
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => array( $category_id ),
          ),
        );
      }
      
      // обычно лучше использовать WP_Query, но не здесь
      query_posts( $args );
    
    	// если посты есть
    	if( have_posts() ) :
     
    		// запускаем цикл		
        while( have_posts() ): the_post();
          if ($args[ 'post_type' ] == 'product') {
            if ($_POST['single'] == '1') {
              get_template_part( 'woocommerce/content', 'product-sale' );
            } else {
              get_template_part( 'woocommerce/content', 'product' );
            }            
          } else {
            get_template_part( 'template-parts/content', 'news' );   
          }
        endwhile;
    	endif;      
      
      wp_reset_postdata();      
      
    	die();
    }    

    // Пагинация
    
    add_filter( 'woocommerce_pagination_args', 'filter_woocommerce_pagination' );
    function filter_woocommerce_pagination( $array ){
    	//$array['prev_next'] = false;
      $array['prev_text'] = __('Назад', 'interpresent');
  		$array['next_text'] = __('Вперёд', 'interpresent');
      $array['end_size'] = 1;
      $array['mid_size'] = 1;
    	return $array;
    }
    
    // Количество товаров (25 приоритет) на странице помещаю в Хедер и перед - добавляю Пагинацию
    
    add_action( 'woocommerce_before_shop_loop', 'woocommerce_pagination', 24 );
    add_action( 'woocommerce_before_shop_loop', 'woo_end_header_catalog_right', 26 );
    
    function woo_end_header_catalog_right () {
      echo '</header>';
    }
    
    // Редактирование карточки товара ( архив )
    
    if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
    	/**
    	 * Insert the opening anchor tag for products in the loop.
    	 */
    	function woocommerce_template_loop_product_link_open() {
    		global $product;

    		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

    		echo '<a itemprop="url" href="' . esc_url( $link ) . '" class="card__link">';
    	}
    }
  
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 12 );
    
    add_action( 'woocommerce_before_shop_loop_item_title', 'image_loop_wrapper_start', 9 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'image_loop_wrapper_end', 11 );
    
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
    
    // Картинка в списке товаров
    
    function image_loop_wrapper_start () {
      echo '<div class="card__image card__image--catalog">';
    }
    
    if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

    	/**
    	 * Get the product thumbnail, or the placeholder if not set.
    	 *
    	 * @param string $size (default: 'woocommerce_thumbnail').
    	 * @param int    $deprecated1 Deprecated since WooCommerce 2.0 (default: 0).
    	 * @param int    $deprecated2 Deprecated since WooCommerce 2.0 (default: 0).
    	 * @return string
    	 */
    	function woocommerce_get_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
    		global $product;
        
        $attr = array('class' => '');
    		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
      
    		return $product ? $product->get_image( $image_size, $attr ) : '';
    	}
    }
      
    function image_loop_wrapper_end () {
      echo '</div>';
    }
    
    // Артикул в списке товаров
    
    add_action( 'woocommerce_before_shop_loop_item_title', 'loop_product_sku', 12 );
    
    function loop_product_sku () {
      global $product;
      
      ?>
        <span class="card__art card__art--catalog">
          <?php 
          if ( wc_product_sku_enabled() ) {
            esc_html_e( 'Арт. ', 'interpresent' );
            echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' );
          }
          ?>
        </span>
      <?php
      
    }
    
    // Заголовок в списке товаров
    
    if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

    	/**
    	 * Show the product title in the product loop. By default this is an H2.
    	 */
    	function woocommerce_template_loop_product_title() {
    		echo '<h3 itemprop="name" content="' . get_the_title() . '" class="card__title card__title--catalog">' . get_the_title() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    	}
    }
    
    // Удаляю рейтинг из архива товаров    
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    
    add_action( 'woocommerce_after_shop_loop_item_title', 'bottom_loop_start', 4 );
    add_action( 'woocommerce_after_shop_loop_item', 'bottom_loop_end', 11 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    
    add_action( 'woocommerce_after_shop_loop_item', 'right_loop_start', 7 );
    add_action( 'woocommerce_after_shop_loop_item', 'loop_count_product', 8 );
    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 9 );
    add_action( 'woocommerce_after_shop_loop_item', 'right_loop_end', 10 );
    
    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 12 );
    
    function bottom_loop_start () {
      echo '<div class="card__bottom">';
    }
    
    function bottom_loop_end () {
      echo '</div>';
    }
    
    function right_loop_start () {
      echo '<div class="card__right">';  
    }
    
    function right_loop_end () {
      echo '</div>';
    }
    
    function loop_count_product () {
      global $product;
      
      if (! $product->is_purchasable()) {
        return false;
      }
      
      if ($product->is_type( 'simple' )) :
      ?>
      <div class="count-product count-product--card">
        <button type="button" class="count-product__minus count-product__minus--card">
          <span class="visually-hidden">На один товар меньше</span>
        </button>  
        <?php 
          echo woocommerce_quantity_input( array('min_value' => 1), $product, false );
        ?>
        <button type="button" class="count-product__plus count-product__plus--card">
          <span class="visually-hidden">На один товар больше</span>
        </button>
      </div>                  
      <?php
      elseif ($product->is_type( 'variable' )) :
      ?>
      <div class="count-product count-product--card">
        
      </div> 
      <?php
      endif;
    }
    /**
     * Override loop template and show quantities next to add to cart buttons
     */
    /*
    add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
    function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
    	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
    		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
        $html .= '<div class="count-product count-product--card">
                    <button type="button" class="count-product__minus count-product__minus--card">
                      <span class="visually-hidden">На один товар меньше</span>
                    </button>';
    		$html .= woocommerce_quantity_input( array('min_value' => 1), $product, false );
        $html .= '<button type="button" class="count-product__plus count-product__plus--card">
                    <span class="visually-hidden">На один товар больше</span>
                  </button>
                </div>';
    		$html .= '<button type="submit" class="card__button card__button--catalog">' . esc_html( $product->add_to_cart_text() ) . '</button>';
    		$html .= '</form>';
    	}
    	return $html;
    }
    */
    
    // Фильтр кнопки "Купить"
    
    add_filter( 'woocommerce_loop_add_to_cart_link', 'add_to_cart_loop_filter', 10, 3 );
    function add_to_cart_loop_filter ( $sprintf, $product, $args ){
      global $product;
      
      if( $product->is_type( 'simple' ) ) {
        $is_catalog = false;
        
        if (is_shop() || is_product_category() || is_search() || is_home() || is_singular( 'post' )) {
          $is_catalog = true;
        }
        
        $args['class'] = $is_catalog ? 'card__button card__button--catalog add_to_cart_button ajax_add_to_cart button openpopup' : 'card__button add_to_cart_button ajax_add_to_cart button openpopup';
        $args['data_popup'] = 'beforecart';
        
        if (!$product->is_purchasable()) {
          $args['class'] = $is_catalog ? 'card__button card__button--catalog add_to_cart_button ajax_add_to_cart button' : 'card__button add_to_cart_button ajax_add_to_cart button';
          $args['data_popup'] = '';  
        }
        
      	$sprintf = sprintf(
      		'<a href="%s" data-quantity="%s" class="%s" %s data-popup="%s">%s</a>',
      		esc_url( $product->add_to_cart_url() ),
      		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
      		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
      		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
          esc_attr( isset( $args['data_popup'] ) ? $args['data_popup'] : '' ),
      		esc_html( $product->add_to_cart_text() )
      	); //button product_type_variable add_to_cart_button
      } else if ($product->is_type( 'variable' )) {
        $args['class'] = $is_catalog ? 'card__button card__button--catalog button product_type_variable add_to_cart_button' : 'card__button button product_type_variable add_to_cart_button';
      	$sprintf = sprintf(
      		'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
      		esc_url( $product->add_to_cart_url() ),
      		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
      		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
      		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
      		esc_html( $product->add_to_cart_text() )
      	);
      }

    	return $sprintf;
    }
    
    // Кастомные названия кнопок для различных типов товаров
    add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text', 10, 1 );
  
    function custom_woocommerce_product_add_to_cart_text($default) {

    	global $product;

    	$product_type = $product->product_type;
      
      if ($product_type === 'variable') {
        return __( 'Выбрать', 'interpresent' );
      }
      
      return $default;
    }    
    
    
    // Символ валюты
    
    add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

    function change_existing_currency_symbol( $currency_symbol, $currency ) {
      switch( $currency ) {
        case 'KZT': $currency_symbol = 'KZT'; 
        break;   
      }
      return $currency_symbol;   
    }

    // Страница товара
    
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
    
    // Удаление заголовка у Tabs attributes
    add_filter('woocommerce_product_additional_information_heading', 'isa_product_additional_information_heading');

    function isa_product_additional_information_heading() {
        echo '';
    }
    
    // Вывод таблицы атрибутов    
    add_action( 'woocommerce_single_product_summary', 'attributes_table', 5 );
    
    function attributes_table () {
      $product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
      
      if ( ! empty( $product_tabs ) ) {
        foreach ( $product_tabs as $key => $product_tab ) :
          if ( isset( $product_tab['callback'] ) && $product_tab['callback'] == 'woocommerce_product_additional_information_tab' ) {
            ?>
              <div class="product__attributes">
                <?php 
                  call_user_func( $product_tab['callback'], $key, $product_tab );
                ?>
              </div>
            <?php            
          }
        endforeach;        
      }
    }
    
    // Удаление структурированных данных
    
    add_filter( 'woocommerce_structured_data_product', 'structured_data_product_nulled', 10, 2 );
    function structured_data_product_nulled( $markup, $product ){
        if( is_product() ) {
            $markup = '';
        }
        return $markup;
    }
    
    // Показать заголовок и рейтинг в хедере страницы Продукта
    
    add_action( 'show_product_title', 'woocommerce_template_single_title', 5 );
    add_action( 'rating_show_product_title', 'woocommerce_template_single_rating', 1 );
        
    // Редактирование шаблона вывода рейтинга
    add_filter( 'woocommerce_product_get_rating_html', 'filter_function_name_8540', 10, 3 );
    function filter_function_name_8540( $html, $rating, $count ) {  
      $html = '';
          
      for ($i=1; $i <= 5; $i++) {       
        if ($i <= $rating) {
          $html .= '<li class="rating__item rating__item--fill">
            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 0L10.6709 4.32383L15.6085 5.52786L12.3216 9.40417L12.7023 14.4721L8 12.544L3.29772 14.4721L3.6784 9.40417L0.391548 5.52786L5.3291 4.32383L8 0Z" />
            </svg>
          </li>';
        } else {
          $html .= '<li class="rating__item">
            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 0L10.6709 4.32383L15.6085 5.52786L12.3216 9.40417L12.7023 14.4721L8 12.544L3.29772 14.4721L3.6784 9.40417L0.391548 5.52786L5.3291 4.32383L8 0Z" />
            </svg>
          </li>';
        }
      }

    	return $html;
    }
    
    // Удаление стандартного места вывода оценки в отзыве
    remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
    
    // Вывожу в после контента отзыва оценку
    add_action( 'rating_after_review_content', 'woocommerce_review_display_rating', 1 );
    
    // Переписываю ф-ю выводв текста отзыва
    if ( ! function_exists( 'woocommerce_review_display_comment_text' ) ) {

    	/**
    	 * Display the review content.
    	 */
    	function woocommerce_review_display_comment_text() {
    		echo '<div class="reviews__item-content">';
    		comment_text();
    		echo '</div>';
    	}
    }
  
    // Сдайдер с изображениями
    
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
  
    // Вывод цены
    
    add_action( 'my_product_price_single', 'my_product_price_single_function', 5 );
    
    function my_product_price_single_function() {
      global $product;
      if ( $price_html = $product->get_price_html() ) : 
        ?>
        <p class="card__price card__price--product">
          <span class="card__price-title card__price-title--price">
            <?php esc_html_e( 'Цена', 'interpresent' ); ?>
          </span>	
          <?php 
            echo $price_html;
          ?>
				</p>
        <?php 
      endif;
    }
    
    add_action( 'my_product_price_single', 'add_sku_single_product', 6 );
    
    function add_sku_single_product () {
      global $product;
      
      if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : 
        ?>
    		<p class="product__art">
    			<?php esc_html_e( 'Арт. ', 'interpresent' ); ?> 
    			 
    			<?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?>
    		</p>
      	<?php 
      endif;
    }
    
    // Вывод количества
    
    add_action( 'my_product_add_to_cart_single', 'woocommerce_template_single_add_to_cart', 5 );
    
    
    // Меняю текст кнопки В корзину на странице Товара
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'interpresent_cart_button_text' );
    
    function interpresent_cart_button_text() {
      return __( 'Купить', 'interpresent' );
    }   
    
  
    // Краткое описание
    
    add_action( 'my_product_short_description_single', 'woocommerce_template_single_excerpt', 5 );
  
    // Убрать табы/суперпродажи/сопутствующие
    
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  
    // Вывод категорий
    
    add_action( 'my_product_category_single', 'woocommerce_template_single_meta', 5 );
  
    // Вывод сопутствующих товаров
    
    add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 70 );
  
    // Оформление заказа
    
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form' );
    
    add_action( 'woocommerce_checkout_after_fields', 'new_payment_checkout', 5 );
    
    function new_payment_checkout () {
      wc_get_template( 'checkout/new-payment.php');
    }
    
    // Billing fields
    
    add_filter( 'woocommerce_billing_fields', 'custom_billing_fields' );
     
    function custom_billing_fields ( $fields ) {
      // Hide label
      
      $fields[ 'billing_first_name' ]['label_class'] = 'visually-hidden';    
      $fields[ 'billing_last_name' ]['label_class'] = 'visually-hidden';
      $fields[ 'billing_postcode' ]['label_class'] = 'visually-hidden'; 
      $fields[ 'billing_company' ]['label_class'] = 'visually-hidden';   
      $fields[ 'billing_country' ]['label_class'] = 'visually-hidden';
      $fields[ 'billing_state' ]['label_class'] = 'visually-hidden';
      $fields[ 'billing_city' ]['label_class'] = 'visually-hidden';
      $fields[ 'billing_address_1' ]['label_class'] = 'visually-hidden';
      $fields[ 'billing_address_2' ]['label_class'] = 'visually-hidden';      
      $fields[ 'billing_phone' ]['label_class'] = 'visually-hidden';
      $fields[ 'billing_email' ]['label_class'] = 'visually-hidden';
      
      if ( is_checkout() ) {
        // Addition field
        
        $fields['billing_add_info']   = array(
          'type' => 'textarea',
          'label'        => __('Доп. информация', 'interpresent'),
          'label_class'  => 'visually-hidden',
          'placeholder'  => __('Доп. информация', 'interpresent'),
          'priority'     => 5,
          'required'     => false,
        );
        
        // Placeholder
        
        $fields[ 'billing_first_name' ]['placeholder'] = __('Ваше имя или название организации', 'interpresent'); 
        $fields[ 'billing_phone' ]['placeholder'] = __('Телефон', 'interpresent');  
        $fields[ 'billing_email' ]['placeholder'] = __('Email *', 'interpresent');
        $fields[ 'billing_address_1' ]['placeholder'] = __('Адрес и способ доставки', 'interpresent');
                
        // Label
        
        $fields[ 'billing_first_name' ]['label'] = __('Ваше имя или название организации', 'interpresent'); 
        $fields[ 'billing_phone' ]['label'] = __('Телефон', 'interpresent');  
        $fields[ 'billing_email' ]['label'] = __('Email *', 'interpresent');
        $fields[ 'billing_address_1' ]['label'] = __('Адрес и способ доставки', 'interpresent');
        
        // Not required

        $fields[ 'billing_first_name' ]['required'] = false; 
        $fields[ 'billing_phone' ]['required'] = false;  
        $fields[ 'billing_email' ]['required'] = false;
        $fields[ 'billing_address_1' ]['required'] = false;
        
        // Unset
        
        $fields[ 'billing_last_name' ]['required'] = false;
        unset( $fields[ 'billing_last_name' ] );
        
        $fields[ 'billing_postcode' ]['required'] = false;
        unset( $fields[ 'billing_postcode' ] );   
        
        $fields[ 'billing_country' ]['required'] = false; 
        unset( $fields[ 'billing_country' ] );
        
        $fields[ 'billing_state' ]['required'] = false; 
        unset( $fields[ 'billing_state' ] );
        
        $fields[ 'billing_city' ]['required'] = false; 
        unset( $fields[ 'billing_city' ] );
         
        unset( $fields[ 'billing_address_2' ] );
        unset( $fields[ 'billing_company' ] );        
        
        // Priority
        $fields[ 'billing_first_name' ]['priority'] = 1;
        $fields[ 'billing_phone' ]['priority'] = 2;
        $fields[ 'billing_email' ]['priority'] = 3;
        $fields[ 'billing_address_1' ]['priority'] = 4;
      } 
      
      return $fields;   
    }
    
    // Поле с дополнительной информацией
    
    add_action( 'woocommerce_checkout_update_order_meta', 'save_billing_add_info' );

    function save_billing_add_info ( $order_id ) {     
    	if( !empty( $_POST['billing_add_info'] ) )
    		update_post_meta( $order_id, 'billing_add_info', sanitize_text_field( $_POST['billing_add_info'] ) );
    }
    
    // Вывод поля с дополнительной информацией в админку
    
    add_action( 'woocommerce_admin_order_data_after_billing_address', 'custom_field_display_admin_order_meta', 10, 1 );

    function custom_field_display_admin_order_meta($order){
      echo '<p><strong>'.__('Доп. информация', 'interpresent').':</strong> ' . get_post_meta( $order->id, 'billing_add_info', true ) . '</p>';
    }
    
    // Выводим значения полей в шаблоне письма с заказом
    add_filter('woocommerce_email_order_meta_keys', 'email_checkout_field_order_meta_keys');

    function email_checkout_field_order_meta_keys( $keys ) {

      $keys['Доп. информация'] = 'billing_add_info';

      return $keys;
    }
    
    // Sipping fields
    
    add_filter( 'woocommerce_shipping_fields', 'custom_shipping_fields' );
     
    function custom_shipping_fields ( $fields ) {
      // Hide label
      
      $fields[ 'shipping_first_name' ]['label_class'] = 'visually-hidden';    
      $fields[ 'shipping_last_name' ]['label_class'] = 'visually-hidden';
      $fields[ 'shipping_postcode' ]['label_class'] = 'visually-hidden'; 
      $fields[ 'shipping_company' ]['label_class'] = 'visually-hidden';   
      $fields[ 'shipping_country' ]['label_class'] = 'visually-hidden';
      $fields[ 'shipping_state' ]['label_class'] = 'visually-hidden';
      $fields[ 'shipping_city' ]['label_class'] = 'visually-hidden';
      $fields[ 'shipping_address_1' ]['label_class'] = 'visually-hidden';
      $fields[ 'shipping_address_2' ]['label_class'] = 'visually-hidden';    
      
      if ( is_checkout() ) {
        // Placeholder
        
        $fields[ 'shipping_first_name' ]['placeholder'] = __('Имя', 'interpresent'); 
        $fields[ 'shipping_address_1' ]['placeholder'] = __('Адрес', 'interpresent');
        
        // Label
        $fields[ 'shipping_first_name' ]['label'] = __('Имя', 'interpresent'); 
        $fields[ 'shipping_address_1' ]['label'] = __('Адрес', 'interpresent');
        
        // Unset
        
        $fields[ 'shipping_last_name' ]['required'] = false;
        unset( $fields[ 'shipping_last_name' ] );
        
        $fields[ 'shipping_postcode' ]['required'] = false;
        unset( $fields[ 'shipping_postcode' ] );   
        
        $fields[ 'shipping_country' ]['required'] = false; 
        unset( $fields[ 'shipping_country' ] );
        
        $fields[ 'shipping_state' ]['required'] = false; 
        unset( $fields[ 'shipping_state' ] );
        
        $fields[ 'shipping_city' ]['required'] = false; 
        unset( $fields[ 'shipping_city' ] );
         
        unset( $fields[ 'shipping_address_2' ] );
        unset( $fields[ 'shipping_company' ] );        
        
        // Priority
        $fields[ 'shipping_first_name' ]['priority'] = 1;
        $fields[ 'shipping_address_1' ]['priority'] = 2;
      } 
      
      return $fields;   
    }
    
    add_filter( 'woocommerce_checkout_fields' , 'custom_order_comments' );
     
    function custom_order_comments( $fields ) {
      // $fields['order'][ 'order_comments' ]['label_class'] = 'visually-hidden';
      // $fields['order'][ 'order_comments' ]['placeholder'] = __('Примечание к заказу (необязательно)', 'interpresent');
      // $fields['order'][ 'order_comments' ]['label'] = __('Примечание к заказу (необязательно)', 'interpresent');
      unset( $fields[ 'order' ] );
       
      return $fields; 
    }
    
    // Удаляем checked из поля Доставка по другому адресу
    
    add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

    function ShowOneError( $fields, $errors ){
     
      // if their is any validation errors
     
      if( !empty( $errors->get_error_codes() ) ) {
        //var_dump($errors);
     
        // remove all of Error msg
     
        foreach( $errors->get_error_codes() as $code ) {
     
          $errors->remove( $code );
     
        }
     
      // our custom Error msg
     
      $errors->add('validation', __('Одно из обязательных полей осталось незаполненным. Проверьте введённые данные', 'interpresent'));
      }
     
    }
     
    add_action('woocommerce_after_checkout_validation','ShowOneError',999,2);
        
    // Преобразование Оптовой цены в нормальный вид
    
    function beauty_price ($price) {
      $symbols_currency = array('тг', 'тг.', ' ', '.00');
      $symbols_replace = array('', '', '', '');
      
      $price = str_replace($symbols_currency, $symbols_replace, $price);
      
      echo $price . '<span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>';  
    }
  }


add_action( 'woocommerce_product_options_general_product_data', 'art_woo_add_custom_fields' );
function art_woo_add_custom_fields() {
    global $product, $post;
    echo '<div class="options_group">';// Группировка полей
    //...здесь добавляем нужные функции

    woocommerce_wp_text_input( array(
        'id'                => '_number_field',
        'label'             => __( 'Скидка % от базовой цены', 'woocommerce' ),
        'placeholder'       => '0',
        'description'       => __( '%', 'woocommerce' ),
        'type'              => 'number',
        'custom_attributes' => array(
            'step' => 'any',
            'min'  => '0',
        ),
    ) );
    echo '</div>';
}
function art_woo_custom_fields_save( $post_id ) {



    // Сохранение цифрового поля.
    $woocommerce_number_field = $_POST['_number_field'];
    if ( ! empty( $woocommerce_number_field ) ) {
        update_post_meta( $post_id, '_number_field', esc_attr( $woocommerce_number_field ) );
    }


}

add_action( 'woocommerce_process_product_meta', 'art_woo_custom_fields_save', 10 );

add_action( 'woocommerce_before_add_to_cart_form', 'art_get_text_field_before_add_card' );
function art_get_text_field_before_add_card() {
    global $post;

    echo get_post_meta( $post->ID, '_number_field', true );
    
}


?>