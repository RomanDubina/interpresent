<li class="review__item swiper-slide">
  <div class="review__user">
    <?php 
      $gravatar = false;
      
      $email = wpmtst_get_field( 'email_client' );
      
      if (!empty($email)) {
        $email = trim( $email ); // "MyEmailAddress@example.com"
        $email = strtolower( $email ); // "myemailaddress@example.com"
        $email = md5( $email );
        
        $gravatar = true;
      }      
    ?>
    <div class="review__icon">
      <?php 
        if ($gravatar) {
          ?>
          <img width="90" height="90" src="https://www.gravatar.com/avatar/<?php echo $email; ?>" alt="<?php wpmtst_field( 'client_name' ); ?>">
          <?php
        } else if (has_post_thumbnail()) {
          the_post_thumbnail();
        } else {
          echo "<img src='" . get_template_directory_uri() . '/assets/img/not-found.jpg' .
            "' alt='" . get_the_title() . "' title='" . get_the_title() . "'>";
        }                      
      ?>
    </div>

    <h3 class="review__name"><?php wpmtst_field( 'name_client' ); ?></h3>
  </div>
  <div class="review__text">
    <?php the_content(); ?>  
  </div>
  <div class="review__mask">

  </div>
</li>