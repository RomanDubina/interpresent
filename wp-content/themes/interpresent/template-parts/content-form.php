<section class="review review--gift">
  <div class="review__wrapper">
    <h2 class="review__title">
      Получите доступ к оптовым ценам и системе скидок!
    </h2>
    <?php 
      echo do_shortcode( '[contact-form-7 id="162" title="Подписка на оптовые цены"]' );
    ?>
    <!-- <form class="review__form review__form--gift" action="" method="post">
      <label class="visually-hidden" for="name">Имя *</label>
      <input class="review__field review__field--gift" id="name" type="text" name="name" placeholder="Имя *" required>
      <label class="visually-hidden" for="phone-1">Телефон *</label>
      <input class="review__field review__field--gift" id="phone-1" type="tel" name="phone" placeholder="Телефон *" required>
      <label class="visually-hidden" for="email">E-mail *</label>
      <input class="review__field review__field--gift" id="email" type="email" name="email" placeholder="E-mail *" required>
      <label class="visually-hidden" for="company">Какую компанию вы представляете?</label>
      <input class="review__field review__field--gift" id="company" type="text" name="company" placeholder="Какую компанию вы представляете?" required>

      <button class="review__button review__button--gift" type="submit" name="review">
        Подписаться
      </button>

      <p class="privacy privacy--gift">
        <span>
          Нажимая на кнопку, вы соглашаетесь с
        </span>
        <a href="#" target="_blank">
          Политикой конфиденциальности
        </a>
      </p>
    </form> -->
    <?php 
      if (is_front_page()) {
        ?>
        <img class="review__gift" width="252" height="264" src="<?php echo get_template_directory_uri(); ?>/assets/img/gift.png" alt="Gift">
        <?php
      }
    ?>
  </div>
</section>