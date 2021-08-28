<?php
/*
Template Name: 404
*/
?>

<?php
get_header(  );
?>

<main class="page-main">
    <div class="thankyou thankyou--404">
        <div class="thankyou__left">
            <h1 class="title title--404">
                404
            </h1>
            <h2 class="title title--sub-404">
                Извините, но у нас такой страницы нет
            </h2>

            <p class="thankyou__text thankyou__text--404">
                Мы проверили все полки на своих складах и не смогли найти запрашиваемую вами страницу.
                <br>
                Пожалуйста, вернитесь в каталог товаров для продолжения поиска или зайдите на страницу наших полезных статей о сувенирах.
            </p>

            <div class="thankyou__buttons">
                <?php
                if ( wc_get_page_id( 'shop' ) > 0 ) :
                    ?>
                    <a class="thankyou__button thankyou__button--404" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                        Вернуться в каталог
                    </a>
                <?php
                endif;
                ?>
                <a class="thankyou__button thankyou__button--404" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
                    Почитать статьи
                </a>
            </div>

        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404-img.png" alt="404">
    </div>
</main>

<?php
get_footer(  );
?>