<?php 
  /*
    Template name: Страница "Как заказать?"
  */
?>
<?php
  get_header(  );
?>

<main class="page-main">
  <section class="promotion promotion--order">
    <div class="promotion__wrapper">
      <?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
      
      <h1 class="title title--order">
        <?php the_title( $before = '', $after = '', $echo = true ); ?>
      </h1>
      <?php 
        for ($i=1; $i < 16; $i++) {
          $image_section = get_field( 'about_img_' . $i );
          
          if (!empty($image_section)) :
            ?>
            <div class="about about--order">
            <?php
            if ($i%2 === 0) {
            ?>
              <div class="about__content about__content--order">
                <?php 
                  the_field( 'about_text_' . $i );
                ?>               
              </div>
              <div class="about__image about__image--order">
                <img src="<?php echo esc_url( $image_section['url'] ) ?>" alt="<?php echo esc_attr( $image_section['alt'] ) ?>">
              </div>
            <?php
            } else {
            ?>
              <div class="about__image about__image--order">
                <img src="<?php echo esc_url( $image_section['url'] ) ?>" alt="<?php echo esc_attr( $image_section['alt'] ) ?>">
              </div>
              <div class="about__content about__content--order">
                <?php 
                  the_field( 'about_text_' . $i );
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

  <section class="promotion promotion--faq">
    <div class="promotion__wrapper">
      <ul class="faq faq--order">
        <?php 
          for ($k=1; $k < 9; $k++) {
            $title_faq = get_field( 'faq_title_' . $k );
            
            if (!empty($title_faq)) :
              ?>
              <li class="faq__item faq__item--order" tabindex="0">
                <header class="faq__header">
                  <h3 class="faq__title faq__title--order">
                    <?php the_field( 'faq_title_' . $k ); ?>
                  </h3>
                  <button class="faq__toggle faq__toggle--order" type="button" name="toggle"><span class="visually-hidden">Открыть/Закрыть вкладку</span></button>
                </header>
                <div class="faq__text faq__text--order">
                  <?php 
                    the_field( 'faq_content_' . $k );
                  ?>
                </div>
              </li>
              <?php
            endif;
          }
        ?>
      </ul>
    </div>
  </section>

  <?php get_template_part( 'template-parts/content', 'form' ) ?>
</main>

<?php
  get_footer(  );
?>
