<?php 
  /*
    Template name: Страница "Оптовикам"
  */
?>
<?php
  get_header(  );
?>

<main class="page-main">
  <section class="promotion promotion--faq">    
    <div class="promotion__wrapper">
      <?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
      
      <h1 class="title title--opt">
        <?php the_title( $before = '', $after = '', $echo = true ); ?>
      </h1>
      
      <h2 class="promotion__title promotion__title--opt">
        <?php the_field( 'opt_title' ); ?>
      </h2>
      
      <ul class="faq faq--opt">
        <?php 
          for ($k=1; $k < 16; $k++) {
            $title_faq = get_field( 'faq_title_' . $k );
            
            if (!empty($title_faq)) :
              ?>
              <li class="faq__item faq__item--opt" tabindex="0">
                <header class="faq__header">
                  <h3 class="faq__title faq__title--opt">
                    <?php the_field( 'faq_title_' . $k ); ?>
                  </h3>
                  <button class="faq__toggle faq__toggle--opt" type="button" name="toggle"><span class="visually-hidden">Открыть/Закрыть вкладку</span></button>
                </header>
                <div class="faq__text faq__text--opt">
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
