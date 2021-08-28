<?php
  get_header(  );
?>

<main class="page-main <?php if (is_cart()) {echo 'cart';} else if(is_checkout()) {echo 'checkout';} ?>">
  <?php if (is_front_page() && !is_home()): ?>
    <section class="promo">      
      <div class="promo__slider swiper-container">
        <div class="promo__list swiper-wrapper">
          <?php 
            
            for ($i=1; $i < 5; $i++) :
              $image = get_field( 'promo_img_' . $i );
              
              if (!empty($image)) :
                $bg_slide = get_field( 'promo_bg_' . $i );  
                
                if (!empty($bg_slide)) {
                  if ($bg_slide === 'dark') {
                    $bg_slide = '#4F4F4F';
                  } else if ($bg_slide === 'light') {
                    $bg_slide = '#E1E1E1';
                  }
                } else {
                  $bg_slide = '#E1E1E1';
                }
                
                $color_title_slide = get_field( 'promo_color_title_' . $i );  
                
                if (!empty($color_title_slide)) {
                  if ($color_title_slide === 'light') {
                    $color_title_slide = '#ffffff';
                  } else if ($color_title_slide === 'dark') {
                    $color_title_slide = '#4F4F4F';
                  } else if ($color_title_slide === 'red') {
                    $color_title_slide = '#BA2F30';
                  }  
                } else {
                  $color_title_slide = '#4F4F4F';
                } 
                
                $color_text_slide = get_field( 'promo_color_' . $i );                 
                
                if (!empty($color_text_slide)) {
                  if ($color_text_slide === 'light') {
                    $color_text_slide = '#ffffff';
                  } else if ($color_text_slide === 'dark') {
                    $color_text_slide = '#4F4F4F';
                  } else if ($color_text_slide === 'red') {
                    $color_text_slide = '#BA2F30';
                  }  
                } else {
                  $color_text_slide = '#4F4F4F';
                } 
                
                $color_sub_title = get_field( 'promo_color_sub_title_' . $i );  
                
                if (!empty($color_sub_title)) {
                   
                } else {
                  $color_sub_title = '#de5d72';
                }                    
          ?>
              <div class="promo__item swiper-slide"<?php echo ' style="background-color: ' . $bg_slide . ';"';  ?>>
                <div class="promo__wrapper">
                  <div class="promo__content">
                    <?php 
                      $subtitle = get_field( 'promo_sub_title_' . $i );
                      
                      if (!empty($subtitle)) :
                    ?>
                    <p class="promo__subtitle" style="<?php echo 'color: ' . $color_sub_title . ';'; ?>">
                      <?php the_field( 'promo_sub_title_' . $i ); ?>
                    </p>
                    
                    <?php 
                      endif;
                    ?>
                    <h3 class="promo__title" style="<?php echo 'color: ' . $color_title_slide . ';'; ?>">
                      <?php the_field( 'promo_text_' . $i ); ?>
                    </h3>
                    <p class="promo__text" style="<?php echo 'color: ' . $color_text_slide . ';'; ?>">
                      <?php the_field( 'promo_content_' . $i ); ?>
                    </p>
                    <?php 
                      $promo_toggle = get_field( 'promo_toggle_' . $i );
                      if ($promo_toggle == 'да') : 
                    ?>
                      <a class="promo__more" href="<?php the_field( 'promo_link_' . $i ); ?>">
                        <span>Подробнее</span>
                        <svg width="22" height="8" aria-label="Стрелка вправо">
                          <use xlink:href="#icon-arrow"></use>
                        </svg>
                      </a>
                    <?php 
                      endif;
                    ?>
                  </div>
                  <div class="promo__banner">
                    <img width="1037" height="548" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ) ?>">
                  </div>
                
                  <svg class="promo__gift promo__gift--1" width="125" height="125" viewBox="0 0 125 125" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.1" clip-path="url(#clip1)">
                    <path d="M18.4795 53.7324L8.61626 90.5425C7.70884 93.929 9.72701 97.4156 13.1074 98.3214L43.7825 106.541L55.2896 63.5957L18.4795 53.7324Z" fill="#780001"/>
                    <path d="M110.945 52.2066L91.5341 47.0054C93.1815 46.4276 94.631 45.8034 95.6922 45.1803C101.976 41.5314 104.146 33.4332 100.528 27.1311C97.0173 20.9956 88.6336 18.7624 82.5345 22.3096C79.1568 24.2649 69.1902 33.2396 68.221 40.7586L67.7793 40.6403C70.6933 33.6423 66.5494 20.8867 64.608 17.5062C61.0935 11.383 52.7131 9.13749 46.614 12.6847C40.336 16.3353 38.1661 24.4335 41.7716 30.7323C42.3852 31.8041 43.3284 33.0695 44.4662 34.3936L25.055 29.1924C21.6746 28.2866 18.1819 30.3031 17.2762 33.6835L14.8103 42.886C14.3566 44.5793 15.3626 46.3218 17.0559 46.7755L56.9335 57.4606L60.2213 45.1906L72.4913 48.4784L69.2035 60.7484L109.081 71.4336C110.774 71.8873 112.517 70.8812 112.971 69.188L115.436 59.9855C116.342 56.6051 114.332 53.114 110.945 52.2066ZM61.5574 38.7562C61.5574 38.7562 61.2455 38.8896 60.3682 38.6545C56.1289 37.5186 49.2171 30.9454 47.2864 27.5743C45.4095 24.2965 46.5405 20.0756 49.8048 18.1754C51.3855 17.2576 53.22 17.0127 54.9746 17.4828C56.7231 17.9513 58.1893 19.0806 59.0993 20.6659C62.1198 25.9334 63.383 37.6606 61.5574 38.7562ZM75.626 42.7428C74.7548 42.5094 74.5497 42.244 74.5514 42.2379C73.5181 40.3763 80.4757 30.8519 85.7253 27.8003C88.8668 25.9658 93.1952 27.1125 95.0198 30.2908C96.9028 33.5702 95.7718 37.7911 92.5014 39.6896C89.1438 41.6437 79.8714 43.8804 75.626 42.7428Z" fill="#780001"/>
                    <path d="M67.5596 66.8834L56.0525 109.829L86.7275 118.048C90.1141 118.955 93.599 116.943 94.5064 113.557L104.37 76.7467L67.5596 66.8834Z" fill="#780001"/>
                    </g>
                    <defs>
                    <clipPath id="clip1">
                    <rect width="101.623" height="101.623" fill="white" transform="translate(26.3018) rotate(15)"/>
                    </clipPath>
                    </defs>
                  </svg>
                  <svg class="promo__gift promo__gift--2" width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.1" clip-path="url(#clip2)">
                    <path d="M11.709 44.7245L17.4568 66.1758C17.9856 68.1493 20.0201 69.3208 21.99 68.793L39.8661 64.0031L33.1603 38.9766L11.709 44.7245Z" fill="#780001"/>
                    <path d="M57.9299 17.012L46.6179 20.0431C47.281 19.2714 47.8307 18.5341 48.1847 17.9104C50.293 14.2378 49.0284 9.51853 45.3663 7.39212C41.8066 5.31875 36.9247 6.6345 34.8802 10.2019C33.7453 12.1728 31.3304 19.6062 33.0321 23.6834L32.7747 23.7523C32.2063 19.3715 26.3983 14.1415 24.4335 13.0011C20.8756 10.9348 15.9919 12.2434 13.9474 15.8108C11.8427 19.4824 13.1072 24.2017 16.7622 26.33C17.3842 26.6922 18.2289 27.0559 19.1889 27.3926L7.87695 30.4237C5.90701 30.9515 4.73187 32.9869 5.25971 34.9569L6.69668 40.3197C6.96108 41.3064 7.97651 41.8927 8.96327 41.6283L32.2021 35.4015L30.2862 28.251L37.4366 26.3351L39.3526 33.4855L62.5914 27.2587C63.5782 26.9943 64.1645 25.9788 63.9001 24.9921L62.4631 19.6293C61.9353 17.6593 59.9034 16.4832 57.9299 17.012ZM29.0857 24.6144C29.0857 24.6144 28.9671 24.7726 28.4559 24.9096C25.9854 25.5715 20.5819 24.2681 18.6252 23.1293C16.7229 22.022 16.0638 19.5623 17.1576 17.6521C17.6879 16.7283 18.5424 16.0702 19.5649 15.7962C20.5838 15.5232 21.6528 15.6659 22.574 16.2008C25.6332 17.9791 29.6878 23.5295 29.0857 24.6144ZM37.3474 22.5271C36.8397 22.6631 36.6589 22.5889 36.658 22.5854C35.5941 21.947 36.3303 15.1128 38.0904 12.0432C39.1413 10.202 41.66 9.51948 43.5069 10.5918C45.4127 11.6982 46.0718 14.158 44.9745 16.0691C43.8493 18.0336 39.8215 21.8642 37.3474 22.5271Z" fill="#780001"/>
                    <path d="M40.3105 37.0607L47.0164 62.0872L64.8924 57.2973C66.8659 56.7685 68.0385 54.7376 67.5097 52.7641L61.7618 31.3128L40.3105 37.0607Z" fill="#780001"/>
                    </g>
                    <defs>
                    <clipPath id="clip2">
                    <rect width="59.2213" height="59.2213" fill="white" transform="translate(0 15.3276) rotate(-15)"/>
                    </clipPath>
                    </defs>
                  </svg>
                  <svg class="promo__gift promo__gift--3" width="82" height="82" viewBox="0 0 82 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.1" clip-path="url(#clip0)">
                    <path d="M17.7549 28.7151L6.08853 47.6335C5.01523 49.374 5.55987 51.6596 7.2972 52.7309L23.0625 62.4529L36.6733 40.3814L17.7549 28.7151Z" fill="#780001"/>
                    <path d="M69.6755 43.3243L59.6992 37.1723C60.7163 37.1249 61.6306 37.0185 62.3277 36.8478C66.4492 35.8598 69.0158 31.6978 68.0481 27.5715C67.1122 23.5562 62.8012 20.9064 58.8002 21.8686C56.586 22.3963 49.5164 25.7443 47.7175 29.7836L47.4905 29.6436C50.2889 26.2207 50.1064 18.4006 49.5869 16.1871C48.6471 12.1781 44.34 9.52202 40.339 10.4842C36.2207 11.4741 33.6541 15.6362 34.6154 19.7586C34.7791 20.4601 35.0945 21.3248 35.5089 22.2549L25.5326 16.1028C23.7952 15.0315 21.5065 15.5742 20.4351 17.3115L17.5185 22.0411C16.9819 22.9114 17.2526 24.0532 18.1228 24.5898L38.6178 37.2284L42.5066 30.9223L48.8127 34.811L44.9239 41.1172L65.4188 53.7557C66.2891 54.2924 67.4309 54.0216 67.9676 53.1514L70.8842 48.4218C71.9555 46.6844 71.416 44.3976 69.6755 43.3243ZM44.3291 27.5504C44.3291 27.5504 44.1325 27.5728 43.6816 27.2948C41.5028 25.9512 38.74 21.1226 38.2249 18.9162C37.7243 16.7709 39.0621 14.6016 41.2037 14.0857C42.2404 13.8372 43.3064 14.007 44.2082 14.5631C45.1068 15.1173 45.7372 15.9935 45.9806 17.0314C46.7875 20.4797 45.5324 27.2436 44.3291 27.5504ZM51.5233 32.1305C51.0755 31.8544 51.0053 31.6718 51.0073 31.6686C50.7412 30.4557 56.2215 26.2973 59.6649 25.4701C61.727 24.9704 63.9538 26.3349 64.4418 28.4158C64.9456 30.5631 63.6078 32.7324 61.463 33.2463C59.2602 33.7767 53.7052 33.476 51.5233 32.1305Z" fill="#780001"/>
                    <path d="M42.9795 44.2702L29.3687 66.3417L45.1341 76.0637C46.8746 77.137 49.1582 76.5955 50.2315 74.855L61.8979 55.9366L42.9795 44.2702Z" fill="#780001"/>
                    </g>
                    <defs>
                    <clipPath id="clip0">
                    <rect width="59.2702" height="59.2702" fill="white" transform="translate(31.1104) rotate(31.6608)"/>
                    </clipPath>
                    </defs>
                  </svg>
                </div>
              </div>
          
          <?php 
              endif;
            endfor;
          ?>
        </div>
  
        <div class="promo__pagination swiper-pagination"></div>
      </div>
    </section>
    
    <section class="promotion promotion--about">
      <div class="promotion__wrapper">
        <h1 class="title"><?php the_field( 'about_title' ); ?></h1>
  
        <div class="about about--index">
          <div class="about__image about__image--index">
            <?php 
              $img_about = get_field( 'about_img' );
              
              if (!empty($img_about)) {
                ?>
                  <img width="455" height="366" src="<?php echo esc_url( $img_about['url'] ); ?>" alt="<?php echo esc_attr( $img_about['alt'] ) ?>">
                <?php
              } else {
                ?>
                <img width="455" height="366" src="<?php echo get_template_directory_uri(); ?>/assets/img/not-found.png" alt="img">
                <?php
              }
            ?>
            
          </div>
          <div class="about__content about__content--index">
            <h3 class="about__title">
              <?php the_field( 'about_title_red' ); ?>
            </h3>
            <p class="about__text about__text--index">
              <?php the_field( 'about_text' ); ?>            
            </p>
            
            <a class="about__button" href="<?php echo get_field( 'about_link' ); ?>">Подробнее</a>
          </div>
        </div>
  
        <ul class="advantages">
          <?php 
            for ($i=1; $i < 4; $i++) :
          ?>
          <li class="advantages__item">
            <div class="advantages__icon">
              <img width="64" height="64" src="<?php echo get_template_directory_uri(); ?>/assets/img/shopping-bag-<?php echo $i; ?>.svg" alt="<?php echo get_field( 'advantage_title_' . $i ); ?>">
            </div>
  
            <h3 class="advantages__title">
              <?php 
                echo get_field( 'advantage_title_' . $i ); 
              ?>
            </h3>
  
            <div class="advantages__text advantages__text--short <?php if ($i === 3) echo ' advantages__text--left'; ?>">
              <?php 
                the_field( 'advantage_content_' . $i );
              ?>             
            </div>
            <button class="advantages__more openpopup" data-popup="advantage-<?php echo $i; ?>" type="button" name="read-more">
              Читать дальше
            </button>
          </li>
          <?php 
            endfor;
          ?>
        </ul>
      </div>
    </section>
    
    <section class="promotion promotion--sale">
      <div class="promotion__wrapper">
        <header class="promotion__header">
          <h2 class="title title--slider">Акционные товары</h2>
          <div class="slider-navigation">
            <button class="slider-navigation__button slider-navigation--prev slider-navigation--prev--sale" type="button" name="prev">
              <svg width="20" height="20" aria-label="Предыдущий слайд">
                <use xlink:href="#icon-prev"></use>
              </svg>
            </button>
            <button class="slider-navigation__button slider-navigation--next slider-navigation--next--sale" type="button" name="next">
              <svg width="20" height="20" aria-label="Следующий слайд">
                <use xlink:href="#icon-next"></use>
              </svg>
            </button>
          </div>
        </header>
        <?php 
          $category_name = get_field( 'slider_sale_cat' );
          $category = get_term_by('slug', $category_name, 'product_cat', 'ARRAY_A');          
          
          if(!empty($category)) :
            ?>
            <div class="promotion__slider promotion__slider--sale swiper-container">
              <?php 
              $category_id = $category['term_id'];
              $category_link = get_term_link( (int) $category_id, 'product_cat' );
            
              $args = array (
                'posts_per_page' => 21, 
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
               ?> 
               <ul class="promotion__list swiper-wrapper">                     
                 <?php 
                   while( $query->have_posts() ) {
                     $query->the_post(); 
                 
                     get_template_part( 'woocommerce/content', 'product' );
                   }
                 ?>
               </ul>
               <?php          
               } 
               else {
                 get_template_part( 'template-parts/content', 'none' );
               }
            
               wp_reset_postdata(); // сброс    
                 
               ?>
            </div>
            
            <a class="promotion__all" href="<?php echo $category_link; ?>">Показать все</a>
            <?php 
          endif;
          ?>
      </div>
    </section>
    
    <section class="promotion promotion--latest">
      <div class="promotion__wrapper">
        <header class="promotion__header">
          <h2 class="title title--slider">Новинки</h2>
          <div class="slider-navigation">
            <button class="slider-navigation__button slider-navigation--prev slider-navigation--prev--latest" type="button" name="prev">
              <svg width="20" height="20" aria-label="Предыдущий слайд">
                <use xlink:href="#icon-prev"></use>
              </svg>
            </button>
            <button class="slider-navigation__button slider-navigation--next slider-navigation--next--latest" type="button" name="next">
              <svg width="20" height="20" aria-label="Следующий слайд">
                <use xlink:href="#icon-next"></use>
              </svg>
            </button>
          </div>
        </header>
        <?php 
          $category_name = get_field( 'slider_latest_cat' );
          $category = get_term_by('slug', $category_name, 'product_cat', 'ARRAY_A');          
          
          if(!empty($category)) :
            ?>
            <div class="promotion__slider promotion__slider--latest swiper-container">
              <?php 
              $category_id = $category['term_id'];
              $category_link = get_term_link( (int) $category_id, 'product_cat' );
            
              $args = array (
                'posts_per_page' => 21, 
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
               ?> 
               <ul class="promotion__list swiper-wrapper">                     
                 <?php 
                   while( $query->have_posts() ) {
                     $query->the_post(); 
                 
                     get_template_part( 'woocommerce/content', 'product' );
                   }
                 ?>
               </ul>
               <?php          
               } 
               else {
                 get_template_part( 'template-parts/content', 'none' );
               }
            
               wp_reset_postdata(); // сброс    
                 
               ?>
            </div>
            
            <a class="promotion__all" href="<?php echo $category_link; ?>">Показать все</a>
            <?php 
          endif;
          ?>
      </div>
    </section>    
    
    <?php get_template_part( 'template-parts/content', 'form' ) ?>
    
    <section class="promotion promotion--news">
      <div class="promotion__wrapper">
        <header class="promotion__header">
          <h2 class="title title--slider"><?php the_field( 'news_title' ); ?></h2>
          <div class="slider-navigation slider-navigation--news">
            <button class="slider-navigation__button slider-navigation--prev slider-navigation--prev--news" type="button" name="prev">
              <svg width="24" height="24" aria-label="Предыдущий слайд">
                <use xlink:href="#icon-prev"></use>
              </svg>
            </button>
            <button class="slider-navigation__button slider-navigation--next slider-navigation--next--news" type="button" name="next">
              <svg width="24" height="24" aria-label="Следующий слайд">
                <use xlink:href="#icon-next"></use>
              </svg>
            </button>
          </div>
        </header>
        
        <?php         
          $args = array(
            'posts_per_page' => 21, 
            'post_type' => 'post',
            'post_status' => array( 'publish' ),
          );
           $query = new WP_Query($args); 
            if( $query->have_posts() ) {
        ?>
        <div class="promotion__slider promotion__slider--news swiper-container">
          <ul class="promotion__list swiper-wrapper">            
            <?php              
              while( $query->have_posts() ) :
                $query->the_post();                   
            ?>            
            <?php get_template_part( 'template-parts/content', 'news' ); ?>
            <?php 
              endwhile;
            ?>
          </ul>
        </div>
        <?php          
          } 
          else {
            get_template_part( 'template-parts/content', 'none' );
          }
       
          wp_reset_postdata(); // сброс
        ?>
        
        <a class="promotion__all" href="<?php echo get_post_type_archive_link( 'post' ); ?>">Показать все</a>
      </div>
    </section>
  <?php elseif (!is_front_page() && is_home()): ?>
    <section class="promotion promotion--catalog">
      <div class="promotion__wrapper">
        <?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
        <h1 class="title title--news">
          Акции и новости
        </h1>
        <?php         
          $args = array( 
            'post_type' => 'post',
            'post_status' => array( 'publish' ),
          );
           $query = new WP_Query($args); 
            if( $query->have_posts() ) {
        ?>
        
        <ul class="promotion__list promotion__list--news">
          <?php              
            while( $query->have_posts() ) :
              $query->the_post();                   
          ?>            
          <?php get_template_part( 'template-parts/content', 'news' ); ?>
          <?php 
            endwhile;
          ?>
        </ul>
        
        <?php 
          /*
            * Hook: 'ajax_more_button_show'
            *
            * Hooked: 'woocommerce_show_more' - 5
            *
            */
          do_action( 'ajax_more_button_show' );
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
  <?php 
    elseif (is_checkout()) :
  ?>
    <?php the_content( $more_link_text = null, $strip_teaser = false ); ?>    
  <?php else: ?>
    <section class="promotion <?php if (is_cart()) {echo 'promotion--cart';} ?>">
      <div class="promotion__wrapper">
        <h2 class="title"><?php the_title( $before = '', $after = '', $echo = true ); ?></h2>
        <?php the_content( $more_link_text = null, $strip_teaser = false ); ?>
      </div>
    </section>    
  <?php endif; ?>
  
</main>

<?php
  get_footer(  );
?>
