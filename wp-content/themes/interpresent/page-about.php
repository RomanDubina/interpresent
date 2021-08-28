<?php 
  /*
    Template name: Страница "О нас"
  */
?>
<?php
  get_header(  );
?>

<main class="page-main">
  <section class="promotion promotion--about">
    <div class="promotion__wrapper">
      <?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
      
      <h1 class="title title--about">
        <?php the_title( $before = '', $after = '', $echo = true ); ?>
      </h1>
      <?php 
        $about_toggle = get_field( 'about_geo_toggle' );
        
        for ($i=1; $i < 4; $i++) {
          $image_section = get_field( 'about_img_' . $i );
          
          if (!empty($image_section)) :
            ?>
            <div class="about about--page">
            <?php
            if ($i%2 === 0) {
            ?>
              <div class="about__content about__content--about">
                <?php 
                  the_field( 'about_text_' . $i );
                ?>
                <?php 
                  if ($about_toggle === 'Секция ' . $i) :
                    ?>                    
                    <div class="about__address">
                      <p><?php the_field( 'about_geo_title' ); ?></p>
          
                      <a href="<?php the_field( 'about_geo_link' ); ?>" target="_blank">
                        <?php the_field( 'about_geo_address' ); ?>
                        <span><?php the_field( 'about_geo_name' ); ?></span>
                      </a>
                    </div>
                    <?php
                  endif;
                ?>                
              </div>
              <div class="about__image about__image--about">
                <img src="<?php echo esc_url( $image_section['url'] ) ?>" alt="<?php echo esc_attr( $image_section['alt'] ) ?>">
              </div>
            <?php
            } else {
            ?>
              <div class="about__image about__image--about">
                <img src="<?php echo esc_url( $image_section['url'] ) ?>" alt="<?php echo esc_attr( $image_section['alt'] ) ?>">
              </div>
              <div class="about__content about__content--about">
                <?php 
                  the_field( 'about_text_' . $i );
                ?>
                <?php 
                  if ($about_toggle === 'Секция ' . $i) :
                    ?>
                    <div class="about__address">
                      <p><?php the_field( 'about_geo_title' ); ?></p>
          
                      <a href="<?php the_field( 'about_geo_link' ); ?>" target="_blank">
                        <?php the_field( 'about_geo_address' ); ?>
                        <span><?php the_field( 'about_geo_name' ); ?></span>
                      </a>
                    </div>
                    <?php
                  endif;
                ?>
              </div>
            <?php
            }
            ?>
            </div>
            <?php
          endif;
        }
      ?>
    </div>
  </section>

  <section class="review review--about">
    <div class="review__wrapper review__wrapper--about">

      <header class="review__header">
        <h2 class="title title--review">
          Отзывы
        </h2>

        <button class="review__button review__button--about openpopup" data-popup="review" type="button" name="review">
          Написать отзыв
        </button>
      </header>
      <?php 
        $args = array(
          'posts_per_page' => -1,
          'post_type' => 'wpm-testimonial',
          'post_status' => 'publish',
          'orderby' => 'menu_order',
        );
        $query = new WP_Query($args); 
          if( $query->have_posts() ){
      ?>
      <div class="review__slider swiper-container">
        <ul class="review__list swiper-wrapper">
          <?php 
            while( $query->have_posts() ){
              $query->the_post();
              
              get_template_part( 'template-parts/content', 'review');
            }    
          ?>
        </ul>
        <div class="slider-navigation slider-navigation--review">
          <button class="slider-navigation__button slider-navigation--prev review__prev" type="button" name="prev">
            <svg width="20" height="20" aria-label="Предыдущий слайд">
              <use xlink:href="#icon-prev"></use>
            </svg>
          </button>
          <button class="slider-navigation__button slider-navigation--next review__next" type="button" name="next">
            <svg width="20" height="20" aria-label="Следующий слайд">
              <use xlink:href="#icon-next"></use>
            </svg>
          </button>
        </div>
      </div>
      <?php 
        }  // End query posts
        else {
          get_template_part( 'template-parts/content','none' );
        }
         
       wp_reset_postdata(); // reset $query 
      ?>
    </div>
  </section>
</main>

<?php
  get_footer(  );
?>
