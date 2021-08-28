<footer class="page-footer">
  <div class="page-footer__wrapper">
    <div class="page-footer__left">
      <div class="logo logo--footer">
        <?php 
         $img_logo = get_field( 'logo_footer', 13 );
         
         if (!empty($img_logo)) {
           $img_link = esc_url( $img_logo['url'] );
           $img_alt = esc_html( $img_logo['alt'] );
         }
        ?>
        <a href="/">
          <img width="301" height="95" src="<?php echo $img_link; ?>" alt="<?php echo $img_alt; ?>">
        </a>
      </div>
      <p class="privacy privacy--footer">
		<img src="https://inter-present.kz/wp-content/uploads/2021/07/unnamed.png" alt="Способы оплаты"><br>
        <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">
          Политика конфиденциальности
        </a>
      </p>
    </div>
    <div class="page-footer__center">
      <nav class="site-navigation site-navigation--footer" role="navigation" aria-label="Навигация по сайту">
        <?php 
          wp_nav_menu( 
            array(
              'theme_location'  => 'bottom_menu',
              'container'       => null, 
              'menu_class'      => 'site-navigation__list site-navigation__list--footer', 
              'depth'           => 0,
            ) 
          );         
        ?>
      </nav>
    </div>
    <div class="page-footer__right">
      <div class="contacts contacts--footer">
        <ul class="contacts__list contacts__list--footer">
          <li class="contacts__item contacts__item--footer">
            <a class="contacts__link contacts__link--footer" href="https://2gis.kz/karaganda/firm/11822477302875266" target="_blank">
              <svg class="contacts__icon contacts__icon--footer" width="16" height="16" aria-label="Карта">
                <use xlink:href="#icon-map"></use>
              </svg>
              <span><?php the_field('contact_address_1', 21); ?></span>
            </a>
          </li>
          <li class="contacts__item contacts__item--footer">
            <a class="contacts__link contacts__link--footer" href="tel:<?php the_field( 'contact_phone_link_1', 21 ); ?>">
              <svg class="contacts__icon contacts__icon--footer" width="16" height="16" aria-label="Телефон">
                <use xlink:href="#icon-phone"></use>
              </svg>
              <span><?php the_field( 'contact_phone_1', 21 ); ?></span>
            </a>
            <a class="contacts__link contacts__link--footer contacts__link--phone2" href="tel:<?php the_field( 'contact_phone_link_2', 21 ); ?>">
              <span><?php the_field( 'contact_phone_2', 21 ); ?></span>
            </a>
          </li>
          <li class="contacts__item contacts__item--footer">
            <a class="contacts__link contacts__link--footer" href="mailto:<?php the_field( 'contact_email_1', 21 ); ?>">
              <svg class="contacts__icon contacts__icon--footer" width="16" height="16" aria-label="E-mail">
                <use xlink:href="#icon-mail"></use>
              </svg>
              <span><?php the_field( 'contact_email_1', 21 ); ?></span>
            </a>
          </li>
        </ul>
      </div>
      <ul class="social">
        <li class="social__item">
          <a class="social__link" href="<?php the_field( 'contact_instagram', 21 ); ?>" target="_blank">
            <svg width="16" height="16" aria-label="Instagram">
              <use xlink:href="#icon-insta"></use>
            </svg>
          </a>
        </li>
        <li class="social__item">
          <a class="social__link" href="<?php the_field( 'contact_vk', 21 ); ?>" target="_blank">
            <svg width="16" height="16" aria-label="ВКонтакте">
              <use xlink:href="#icon-vk"></use>
			</svg>
          </a>
        </li>
      </ul>	  	  				 
    </div>
  </div>
  <div class="page-footer__creators">
    <p class="page-footer__text">
      <span>Сделано в </span>
      <a href="https://webnauts.pro" target="_blank">Webnauts</a>
      <span> c </span>
      <svg width="12" height="12" aria-label="С любовью">
        <use xlink:href="#icon-heart"></use>
      </svg>      		
    </p>
    <p class="page-footer__policygoogle">
      <span>This site is protected by reCAPTCHA and the Google</span>
      <a href="https://policies.google.com/privacy" target="blank">Privacy Policy</a>
      <span>and</span>
      <a href="https://policies.google.com/terms" target="blank">Terms of Service</a>
      <span>apply.</span>
    </p>
  </div>
</footer>

  <a class="fly fly--whatsapp" href="https://wa.me/+77017847251" target="_blank">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp.png" alt="Написать в Whatsapp">
  </a>
  
  <a class="fly fly--totop" href="#header" title="Наверх">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="16" cy="16" r="16" fill="#780001"/>
      <path d="M16.0007 14.828L20.9507 19.778L22.3647 18.364L16.0007 12L9.63672 18.364L11.0507 19.778L16.0007 14.828Z" fill="white"/>
    </svg>
  </a>

  <section class="popup popup--cart">
    <div class="popup__wrapper popup__wrapper--cart">
      <button class="popup__close popup__close--cart" type="button" name="close">
        <span>Закрыть</span>
      </button>
      <h2 class="popup__title popup__title--cart">Корзина</h2>
      <div class="my-basket">
        <div id="my-basket__container">
          <?php 
            if ( function_exists('interpresent_cart') ) {
              interpresent_cart();
            }            
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="popup popup--beforecart">
    <div class="popup__wrapper popup__wrapper--beforecart">
      <button class="popup__close popup__close--beforecart" type="button" name="close">
        <span class="visually-hidden">Закрыть</span>
      </button>

      <div class="popup__content">
        <h2 class="popup__title popup__title--beforecart">
          Товар успешно добавлен в корзину!
        </h2>

        <button class="popup__close popup__close--continue" type="button" name="continue-shopping">
          Продолжить поиск
        </button>
        <a class="popup__tocart" href="<?php echo wc_get_cart_url(); ?>">
          Перейти в корзину
        </a>
      </div>
    </div>
  </section>

  <?php 
    if (is_page_template( 'page-about.php' )) {
      ?>
      <section class="popup popup--review">
        <div class="popup__wrapper popup__wrapper--review">
          <button class="popup__close popup__close--review" type="button" name="close">
            <span class="visually-hidden">Закрыть</span>
          </button>
          <h2 class="popup__title">Написать отзыв</h2>
          <div class="review review--popup">
            <?php echo do_shortcode( '[testimonial_view id="1"]' ); ?>
          
            <p class="privacy">
              <span>
                Нажимая на кнопку, вы соглашаетесь с
              </span>
              <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">
                Политикой конфиденциальности
              </a>
            </p>
          </div>
        </div>
      </section>
      
      <?php
    }
  ?>

  <?php 
    if (is_product()) {
      ?>
      <section class="popup popup--oneclick">
        <div class="popup__wrapper popup__wrapper--oneclick">
          <button class="popup__close popup__close--oneclick" type="button" name="close">
            <span class="visually-hidden">Закрыть</span>
          </button>
          <h2 class="popup__title popup__title--oneclick">Купить в 1 клик</h2>

          <p class="popup__text">
            <?php 
              esc_html_e( 'Если Вы хотите быстро заказать товар: напишите в поля ниже Ваши контакты, способ и адрес доставки. Или задайте интересующий Вас вопрос.', 'interpresent' );
            ?>
          </p>
          <div class="review review--oneclick">
            <form class="review__form" id="oneclick-form" action="" method="post">
              <label class="visually-hidden" for="name-2">Ваше имя *</label>
              <input class="review__field review__field--oneclick" id="name-2" type="text" name="name" placeholder="Ваше имя *" required>
              <label class="visually-hidden" for="phone-2">Ваш телефон *</label>
              <input class="review__field review__field--oneclick" id="phone-2" type="tel" name="phone" placeholder="Ваш телефон *" required>
              <label class="visually-hidden" for="email-2">Ваш e-mail *</label>
              <input class="review__field review__field--oneclick" id="email-2" type="email" name="email" placeholder="Ваш e-mail *" required>

              <label class="visually-hidden" for="message-1">Введите сообщение</label>
              <textarea class="review__field review__field--oneclick-message" id="message-1" name="message" placeholder="Введите сообщение" required></textarea>

              <button class="review__button" type="submit" name="review" id="oneclick-submit">
                Готово
              </button>

              <p class="privacy">
                <span>
                  Нажимая на кнопку, вы соглашаетесь с
                </span>
                <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">
                  Политикой конфиденциальности
                </a>
              </p>
            </form>
            <?php  ?>
          </div>
        </div>
        <template id="thankyou-oneclick">
          <div class="thankyou thankyou--oneclick">
            <svg class="thankyou__icon" width="94" height="94" aria-label="OK">
              <use xlink:href="#icon-check"></use>
            </svg>
            
            <h1 class="title title--thankyou">
              <?php esc_html_e( 'Спасибо за заказ!', 'interpresent' ); ?>
            </h1>
            
            <p class="thankyou__text">
              
              <?php esc_html_e( 'Совсем скоро наш консультант свяжется с Вами.', 'interpresent' ); ?>
            </p>
            
            <a class="thankyou__button thankyou__button--oneclick">
              <?php esc_html_e( 'Хорошо', 'interpresent' ); ?>
            </a>
          </div>
        </template>
        <template id="wait-oneclick">
          <div class="thankyou thankyou--wait">
            <div class="thankyou__form-wait">
              <div class="thankyou__spinner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/spinner-solid.svg">
              </div>
            </div>
          </div>
        </template>
        <template id="error-oneclick">
          <div class="thankyou thankyou--error">
            <div class="thankyou__icon">
              <img width="94" height="94" src="<?php echo get_template_directory_uri(); ?>/assets/img/error.svg">
            </div>
            
            <h1 class="title title--thankyou">
              <?php esc_html_e( 'Что-то пошло не так...', 'interpresent' ); ?>
            </h1>
            
            <p class="thankyou__text">
              
              <?php esc_html_e( 'Попробуйте воспользоваться корзиной для оформления заказа на данный товар.', 'interpresent' ); ?>
            </p>
            
            <a class="thankyou__button thankyou__button--oneclick">
              <?php esc_html_e( 'Хорошо', 'interpresent' ); ?>
            </a>
          </div>
        </template>
      </section>
      <?php
    }
  ?>    

  <?php if (is_front_page()): ?>
  <?php 
    for ($i=1; $i < 4; $i++) :
      ?>

      <section class="popup popup--advantage popup--advantage-<?= $i; ?>">
        <div class="popup__wrapper popup__wrapper--advantage">
          <button class="popup__close popup__close--advantage" type="button" name="close">
            <span class="visually-hidden">Закрыть</span>
          </button>
          <div class="advantages advantages--popup">
            <div class="advantages__icon advantages__icon--popup">
              <img width="64" height="64" src="<?php echo get_template_directory_uri(); ?>/assets/img/shopping-bag-<?php echo $i; ?>.svg" alt="<?php echo get_field( 'advantage_title_' . $i ); ?>">
            </div>

            <h3 class="advantages__title advantages__title--popup">
              <?php 
                echo get_field( 'advantage_title_' . $i ); 
              ?>
            </h3>

            <div class="advantages__text advantages__text--popup">
              <?php 
                the_field( 'advantage_content_' . $i );
              ?>             
            </div>
          </div>
        </div>
      </section>

      <?php 
    endfor;
  ?>
  <?php endif; ?>    

  <div class="popup__overlay"></div>

  <?php 
  wp_footer();
  ?>
  <?php 
  if (is_page_template('page-contacts.php')) :
  ?>
  <!-- contacts -->
  <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
      try {
        let mapElement = document.querySelector('#map');

        if (mapElement) {
          var map;

          if (screen.width > 1119) {
            DG.then(function () {
              map = DG.map('map', {
                center: [49.81368290873919, 73.07693371595738],
                zoom: 17,
                zoomControl: false,
                fullscreenControl: false
              });

              var myIcon = DG.icon({
                iconUrl: '<?php echo get_template_directory_uri(); ?>/assets/img/marker-map.svg',
                iconSize: [48, 48]
              });

              DG.marker([49.81475528341031, 73.07331899811237], {icon: myIcon}).addTo(map);
            });
          } else if (screen.width <= 1119) {
            DG.then(function () {
              map = DG.map('map', {
                center: [49.81475528341031, 73.07331899811237],
                zoom: 16,
                zoomControl: false,
                fullscreenControl: false
              });

              var myIcon = DG.icon({
                iconUrl: '<?php echo get_template_directory_uri(); ?>/assets/img/marker-map.svg',
                iconSize: [48, 48]
              });

              DG.marker([49.81475528341031, 73.07331899811237], {icon: myIcon}).addTo(map);
            });
          }
        }

      } catch (e) {
        console.log(e);
      }
    });
  </script>

  <?php
  elseif (is_page_template('page-about.php')) :
    ?>
      <script>
        try {
          if (window.location.href.indexOf('success') === -1) {
            var formReview = document.querySelector('#wpmtst-submission-form');
            var testimonialSubmitLabel = formReview.querySelector('.wpmtst-submit label');
            var submitButton = formReview.querySelector('#wpmtst_submit_testimonial');
                     
            if (submitButton && wpcf7_recaptcha) {
              submitButton.classList.add('g-recaptcha');
              submitButton.dataset.sitekey = wpcf7_recaptcha.sitekey;
              submitButton.dataset.callback = 'onSubmit';
              submitButton.dataset.action = 'submit';
         
              function onSubmit(token) {
                formReview.submit();
              }
            }
          }
        } catch (e) {
          console.log(e);
        }                          
      </script>
    <?php
  elseif (is_product()) :
      ?>
        <script>
          try {
            var formOneClick = document.querySelector('#oneclick-form');      
            var submitOneButton = formOneClick.querySelector('#oneclick-submit');
                     
            if (submitOneButton && wpcf7_recaptcha) {
              submitOneButton.classList.add('g-recaptcha');
              submitOneButton.dataset.sitekey = wpcf7_recaptcha.sitekey;
              submitOneButton.dataset.callback = 'onSubmit';
              submitOneButton.dataset.action = 'submit';

              function onSubmit(token) {
                formOneClick.trigger('click');
              }
            }                 
          } catch (e) {
            console.log(e);
          }
        </script>
      <?php
  endif;
?>      

</body>
</html>