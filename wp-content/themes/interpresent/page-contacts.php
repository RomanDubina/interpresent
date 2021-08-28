<?php 
  /*
    Template Name: Контакты
  */
?>
<?php
  get_header(  );
?>

<main class="page-main">
  <div class="visually-hidden">
    <?php get_template_part( 'template-parts/yoast', 'breadcrumbs' ); ?>
  </div>
  
  <div class="map">
    <div class="map__wrapper">
      <div class="contacts contacts--map">
        <h1 class="title title--map"><?php the_title(); ?></h1>
        <ul class="contacts__list contacts__list--map">
          <li class="contacts__item contacts__item--map">
            <a class="contacts__link contacts__link--map" href="https://2gis.kz/karaganda/firm/11822477302875266" target="_blank">
              <div class="contacts__wrapper contacts__wrapper--map">
                <svg class="contacts__icon contacts__icon--map" width="16" height="16" aria-label="Карта">
                  <use xlink:href="#icon-map"></use>
                </svg>
              </div>

              <span><?php the_field('contact_address_1'); ?>, <?php the_field('contact_address_2'); ?></span>
            </a>
          </li>
          <li class="contacts__item contacts__item--map">
            <a class="contacts__link contacts__link--map" href="tel:<?php the_field( 'contact_phone_link_1' ); ?>">
              <div class="contacts__wrapper contacts__wrapper--map">
                <svg class="contacts__icon contacts__icon--map" width="16" height="16" aria-label="Телефон">
                  <use xlink:href="#icon-phone"></use>
                </svg>
              </div>

              <span><?php the_field( 'contact_phone_1' ); ?></span>
            </a>
            
            <a class="contacts__link contacts__link--map contacts__link--mail2" href="tel:<?php the_field( 'contact_phone_link_2' ); ?>">
              <span><?php the_field( 'contact_phone_2' ); ?></span>
            </a>
          </li>
          <li class="contacts__item contacts__item--map">
            <div class="contacts__worktime">
              <div class="contacts__wrapper contacts__wrapper--map">
                <svg class="contacts__icon contacts__icon--map" width="16" height="16" aria-label="clock">
                  <use xlink:href="#icon-clock"></use>
                </svg>
              </div>

              <span><?php the_field( 'contact_work_1' ); ?></span>
              <span><?php the_field( 'contact_work_2' ); ?></span>
              <span><?php the_field( 'contact_work_3' ); ?></span>
            </div>
          </li>
          <li class="contacts__item contacts__item--map">
            <a class="contacts__link contacts__link--map" href="mailto:<?php the_field( 'contact_email_1' ); ?>">
              <div class="contacts__wrapper contacts__wrapper--map">
                <svg class="contacts__icon contacts__icon--map" width="16" height="16" aria-label="E-mail">
                  <use xlink:href="#icon-mail"></use>
                </svg>
              </div>

              <span><?php the_field( 'contact_email_1' ); ?></span>
            </a>
            <a class="contacts__link contacts__link--map contacts__link--mail2" href="mailto:<?php the_field( 'contact_email_2' ); ?>">
              <span><?php the_field( 'contact_email_2' ); ?></span>
            </a>
          </li>
          <li class="contacts__item contacts__item--map contacts__item--map-delivery">
            <div class="contacts__delivery">
              <div class="contacts__wrapper contacts__wrapper--map">
                <svg class="contacts__icon contacts__icon--map" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M5.97602 11.9999C5.89676 12.5561 5.61949 13.065 5.19513 13.4332C4.77078 13.8014 4.22783 14.0041 3.66602 14.0041C3.1042 14.0041 2.56125 13.8014 2.1369 13.4332C1.71254 13.065 1.43527 12.5561 1.35602 11.9999H0.666016V3.99992C0.666016 3.82311 0.736253 3.65354 0.861278 3.52851C0.986302 3.40349 1.15587 3.33325 1.33268 3.33325H10.666C10.8428 3.33325 11.0124 3.40349 11.1374 3.52851C11.2624 3.65354 11.3327 3.82311 11.3327 3.99992V5.33325H13.3327L15.3327 8.03725V11.9999H13.976C13.8968 12.5561 13.6195 13.065 13.1951 13.4332C12.7708 13.8014 12.2278 14.0041 11.666 14.0041C11.1042 14.0041 10.5613 13.8014 10.1369 13.4332C9.71254 13.065 9.43527 12.5561 9.35602 11.9999H5.97602ZM11.3327 8.66659H13.9993V8.47659L12.6607 6.66659H11.3327V8.66659ZM11.666 12.6666C11.9313 12.6666 12.1858 12.5612 12.3734 12.3736C12.561 12.186 12.6663 11.9316 12.6663 11.6663C12.6663 11.4009 12.561 11.1465 12.3734 10.9589C12.1858 10.7713 11.9313 10.6659 11.666 10.6659C11.4007 10.6659 11.1463 10.7713 10.9587 10.9589C10.7711 11.1465 10.6657 11.4009 10.6657 11.6663C10.6657 11.9316 10.7711 12.186 10.9587 12.3736C11.1463 12.5612 11.4007 12.6666 11.666 12.6666ZM4.66602 11.6666C4.66602 11.5353 4.64015 11.4052 4.5899 11.2839C4.53964 11.1626 4.46598 11.0523 4.37312 10.9595C4.28026 10.8666 4.17002 10.793 4.0487 10.7427C3.92737 10.6925 3.79734 10.6666 3.66602 10.6666C3.53469 10.6666 3.40466 10.6925 3.28333 10.7427C3.16201 10.793 3.05177 10.8666 2.95891 10.9595C2.86605 11.0523 2.79239 11.1626 2.74214 11.2839C2.69188 11.4052 2.66602 11.5353 2.66602 11.6666C2.66602 11.9318 2.77137 12.1862 2.95891 12.3737C3.14645 12.5612 3.4008 12.6666 3.66602 12.6666C3.93123 12.6666 4.18559 12.5612 4.37312 12.3737C4.56066 12.1862 4.66602 11.9318 4.66602 11.6666Z" fill="white"/>
                </svg>
              </div>

              <span><?php the_field( 'contact_delivery' ); ?></span>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="map__2gis" id="map"></div>
  </div>
</main>

<?php
  get_footer(  );
?>