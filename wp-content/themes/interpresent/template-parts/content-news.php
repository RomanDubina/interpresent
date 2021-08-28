<?php 
  if (is_front_page() && !is_home()) {
    ?>
    <li class="promotion__item swiper-slide">
      <a class="news" href="<?php echo get_permalink(  ); ?>">
        <h3 class="news__title">
          <?php 
            the_title();
          ?>
        </h3>
    
        <p class="news__text">
          <?php 
            echo get_the_excerpt(  );
          ?>
        </p>
      </a>
    </li>
    <?php
  } else if (!is_front_page() && is_home()) {
    ?>
      <li class="promotion__item promotion__item--news">
        <a class="news news--sale" href="<?php echo get_permalink(  ); ?>">
          <div class="news__image">
            <?php 
              if (has_post_thumbnail()) {
                  the_post_thumbnail();
              } else {
                  echo "<img src='" . get_template_directory_uri() . '/assets/img/not-found.jpg' .
                  "' alt='" . get_the_title() . "' title='" . get_the_title() . "'>";
              }                      
            ?>
          </div>
          <div class="news__content">
            <p class="news__date"><?php echo get_the_date( $d = 'j M Y' ); ?></p>
            <h3 class="news__title news__title--sale">
              <?php the_title(); ?>            
            </h3>

            <p class="news__text news__text--sale">
              <?php echo get_the_excerpt(  ); ?>
            </p>
          </div>
        </a>
      </li>
    <?php
  }
?>