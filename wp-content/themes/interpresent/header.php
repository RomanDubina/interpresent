<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="icon" href="img/favicon.png" type="image/png"> -->
    <?php
      wp_head();
    ?>
    <title></title>
<?php if (!strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse')): ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-195360749-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-195360749-1');
</script>
	  <script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(37617395, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/37617395" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	  <?php endif; ?>
  </head>
  <body>
    <svg class="visually-hidden" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <symbol id="icon-list" viewBox="0 0 24 24">
        <path d="M20 22H4C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V3C3 2.73478 3.10536 2.48043 3.29289 2.29289C3.48043 2.10536 3.73478 2 4 2H20C20.2652 2 20.5196 2.10536 20.7071 2.29289C20.8946 2.48043 21 2.73478 21 3V21C21 21.2652 20.8946 21.5196 20.7071 21.7071C20.5196 21.8946 20.2652 22 20 22ZM19 20V4H5V20H19ZM8 7H16V9H8V7ZM8 11H16V13H8V11ZM8 15H13V17H8V15Z" fill="#828282"/>
      </symbol>
      <symbol id="icon-more" viewBox="0 0 16 16">
        <path d="M3.64167 2.95526C4.85138 1.90703 6.399 1.33103 7.99967 1.33326C11.6817 1.33326 14.6663 4.31793 14.6663 7.99993C14.6663 9.42393 14.2197 10.7439 13.4597 11.8266L11.333 7.99993H13.333C13.3331 6.95434 13.0258 5.93179 12.4495 5.05943C11.8731 4.18706 11.053 3.50336 10.0911 3.09334C9.12929 2.68332 8.06815 2.56506 7.03965 2.75327C6.01114 2.94148 5.06064 3.42786 4.30634 4.15193L3.64167 2.95526ZM12.3577 13.0446C11.148 14.0928 9.60035 14.6688 7.99967 14.6666C4.31767 14.6666 1.33301 11.6819 1.33301 7.99993C1.33301 6.57593 1.77967 5.25593 2.53967 4.17326L4.66634 7.99993H2.66634C2.66626 9.04551 2.97351 10.0681 3.5499 10.9404C4.12629 11.8128 4.94639 12.4965 5.90822 12.9065C6.87006 13.3165 7.9312 13.4348 8.9597 13.2466C9.98821 13.0584 10.9387 12.572 11.693 11.8479L12.3577 13.0446Z"/>
      </symbol>
      <symbol id="icon-arrow" viewBox="0 0 22 8">
        <path d="M21.3536 4.35355C21.5488 4.15829 21.5488 3.84171 21.3536 3.64645L18.1716 0.464466C17.9763 0.269204 17.6597 0.269204 17.4645 0.464466C17.2692 0.659728 17.2692 0.976311 17.4645 1.17157L20.2929 4L17.4645 6.82843C17.2692 7.02369 17.2692 7.34027 17.4645 7.53553C17.6597 7.7308 17.9763 7.7308 18.1716 7.53553L21.3536 4.35355ZM0 4.5H21V3.5H0V4.5Z"/>
      </symbol>
      <symbol id="icon-blank" viewBox="0 0 16 16">
        <path d="M13.3333 1.33331C13.7013 1.33331 14 1.63198 14 1.99998V4.50465L12.6667 5.83798V2.66665H3.33333V13.3333H12.6667V11.4946L14 10.1613V14C14 14.368 13.7013 14.6666 13.3333 14.6666H2.66667C2.29867 14.6666 2 14.368 2 14V1.99998C2 1.63198 2.29867 1.33331 2.66667 1.33331H13.3333ZM14.5187 5.87198L15.4613 6.81465L10.276 12L9.332 11.9986L9.33333 11.0573L14.5187 5.87198ZM8.66667 7.99998V9.33331H5.33333V7.99998H8.66667ZM10.6667 5.33331V6.66665H5.33333V5.33331H10.6667Z"/>
      </symbol>
      <symbol id="icon-cart" viewBox="0 0 32 32">
        <path d="M5.33328 8.552L1.00928 4.22933L2.89594 2.34267L7.21861 6.66667H27.5413C27.7491 6.66665 27.954 6.71522 28.1398 6.80849C28.3255 6.90176 28.4868 7.03715 28.6109 7.20386C28.735 7.37057 28.8184 7.56398 28.8545 7.76865C28.8905 7.97332 28.8783 8.18359 28.8186 8.38267L25.6186 19.0493C25.5363 19.3241 25.3675 19.565 25.1374 19.7363C24.9073 19.9075 24.6281 20 24.3413 20H7.99994V22.6667H22.6666V25.3333H6.66661C6.31299 25.3333 5.97385 25.1929 5.7238 24.9428C5.47375 24.6928 5.33328 24.3536 5.33328 24V8.552ZM7.33328 30.6667C6.80284 30.6667 6.29414 30.4559 5.91906 30.0809C5.54399 29.7058 5.33328 29.1971 5.33328 28.6667C5.33328 28.1362 5.54399 27.6275 5.91906 27.2525C6.29414 26.8774 6.80284 26.6667 7.33328 26.6667C7.86371 26.6667 8.37242 26.8774 8.74749 27.2525C9.12256 27.6275 9.33328 28.1362 9.33328 28.6667C9.33328 29.1971 9.12256 29.7058 8.74749 30.0809C8.37242 30.4559 7.86371 30.6667 7.33328 30.6667ZM23.3333 30.6667C22.8028 30.6667 22.2941 30.4559 21.9191 30.0809C21.544 29.7058 21.3333 29.1971 21.3333 28.6667C21.3333 28.1362 21.544 27.6275 21.9191 27.2525C22.2941 26.8774 22.8028 26.6667 23.3333 26.6667C23.8637 26.6667 24.3724 26.8774 24.7475 27.2525C25.1226 27.6275 25.3333 28.1362 25.3333 28.6667C25.3333 29.1971 25.1226 29.7058 24.7475 30.0809C24.3724 30.4559 23.8637 30.6667 23.3333 30.6667Z"/>
      </symbol>
      <symbol id="icon-catalog" viewBox="0 0 24 24">
        <path d="M20 22H4C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V3C3 2.73478 3.10536 2.48043 3.29289 2.29289C3.48043 2.10536 3.73478 2 4 2H20C20.2652 2 20.5196 2.10536 20.7071 2.29289C20.8946 2.48043 21 2.73478 21 3V21C21 21.2652 20.8946 21.5196 20.7071 21.7071C20.5196 21.8946 20.2652 22 20 22ZM19 20V4H5V20H19ZM8 7H16V9H8V7ZM8 11H16V13H8V11ZM8 15H13V17H8V15Z" fill="#828282"/>
      </symbol>
      <symbol id="icon-check" viewBox="0 0 24 24">
        <path d="M10.0007 15.172L19.1927 5.979L20.6077 7.393L10.0007 18L3.63672 11.636L5.05072 10.222L10.0007 15.172Z"/>
      </symbol>
      <symbol id="icon-clock" viewBox="0 0 16 16">
        <path d="M8.00065 14.6666C4.31865 14.6666 1.33398 11.682 1.33398 7.99998C1.33398 4.31798 4.31865 1.33331 8.00065 1.33331C11.6827 1.33331 14.6673 4.31798 14.6673 7.99998C14.6673 11.682 11.6827 14.6666 8.00065 14.6666ZM8.66732 7.99998V4.66665H7.33398V9.33331H11.334V7.99998H8.66732Z" fill="white"/>
      </symbol>
      <symbol id="icon-delivery" viewBox="0 0 24 24">
        <path d="M8.965 18C8.84612 18.8343 8.43021 19.5977 7.79368 20.1499C7.15714 20.7022 6.34272 21.0063 5.5 21.0063C4.65728 21.0063 3.84286 20.7022 3.20632 20.1499C2.56979 19.5977 2.15388 18.8343 2.035 18H1V6C1 5.73478 1.10536 5.48043 1.29289 5.29289C1.48043 5.10536 1.73478 5 2 5H16C16.2652 5 16.5196 5.10536 16.7071 5.29289C16.8946 5.48043 17 5.73478 17 6V8H20L23 12.056V18H20.965C20.8461 18.8343 20.4302 19.5977 19.7937 20.1499C19.1571 20.7022 18.3427 21.0063 17.5 21.0063C16.6573 21.0063 15.8429 20.7022 15.2063 20.1499C14.5698 19.5977 14.1539 18.8343 14.035 18H8.965ZM15 7H3V15.05C3.39456 14.6472 3.8806 14.3457 4.41675 14.1711C4.9529 13.9966 5.52329 13.9541 6.07938 14.0474C6.63546 14.1407 7.16077 14.3669 7.61061 14.7069C8.06044 15.0469 8.42148 15.4905 8.663 16H14.337C14.505 15.647 14.73 15.326 15 15.05V7ZM17 13H21V12.715L18.992 10H17V13ZM17.5 19C17.898 19 18.2796 18.8419 18.561 18.5605C18.8424 18.2791 19.0005 17.8975 19.0005 17.4995C19.0005 17.1015 18.8424 16.7199 18.561 16.4385C18.2796 16.1571 17.898 15.999 17.5 15.999C17.102 15.999 16.7204 16.1571 16.439 16.4385C16.1576 16.7199 15.9995 17.1015 15.9995 17.4995C15.9995 17.8975 16.1576 18.2791 16.439 18.5605C16.7204 18.8419 17.102 19 17.5 19ZM7 17.5C7 17.303 6.9612 17.108 6.88582 16.926C6.81044 16.744 6.69995 16.5786 6.56066 16.4393C6.42137 16.3001 6.25601 16.1896 6.07403 16.1142C5.89204 16.0388 5.69698 16 5.5 16C5.30302 16 5.10796 16.0388 4.92597 16.1142C4.74399 16.1896 4.57863 16.3001 4.43934 16.4393C4.30005 16.5786 4.18956 16.744 4.11418 16.926C4.0388 17.108 4 17.303 4 17.5C4 17.8978 4.15804 18.2794 4.43934 18.5607C4.72064 18.842 5.10218 19 5.5 19C5.89782 19 6.27936 18.842 6.56066 18.5607C6.84196 18.2794 7 17.8978 7 17.5Z" fill="#828282"/>
      </symbol>
      <symbol id="icon-download" viewBox="0 0 12 12">
        <path d="M6.5 5H9L6 8L3 5H5.5V1.5H6.5V5ZM2 9.5H10V6H11V10C11 10.1326 10.9473 10.2598 10.8536 10.3536C10.7598 10.4473 10.6326 10.5 10.5 10.5H1.5C1.36739 10.5 1.24021 10.4473 1.14645 10.3536C1.05268 10.2598 1 10.1326 1 10V6H2V9.5Z"/>
      </symbol>
      <symbol id="icon-heart" viewBox="0 0 12 12">
        <path d="M6.0005 2.26449C7.175 1.20999 8.99 1.24499 10.1215 2.37849C11.2525 3.51249 11.2915 5.31849 10.2395 6.49649L5.9995 10.7425L1.7605 6.49649C0.708503 5.31849 0.748003 3.50949 1.8785 2.37849C3.011 1.24649 4.8225 1.20849 6.0005 2.26449Z" fill="white"/>
      </symbol>
      <symbol id="icon-info" viewBox="0 0 16 16">
        <path d="M8.00065 14.6667C4.31865 14.6667 1.33398 11.682 1.33398 8.00004C1.33398 4.31804 4.31865 1.33337 8.00065 1.33337C11.6827 1.33337 14.6673 4.31804 14.6673 8.00004C14.6673 11.682 11.6827 14.6667 8.00065 14.6667ZM7.33398 7.33337V11.3334H8.66732V7.33337H7.33398ZM7.33398 4.66671V6.00004H8.66732V4.66671H7.33398Z" />
      </symbol>
      <symbol id="icon-insta" viewBox="0 0 16 16">
        <path d="M8.00016 1.3335C9.8115 1.3335 10.0375 1.34016 10.7482 1.3735C11.4582 1.40683 11.9415 1.51816 12.3668 1.6835C12.8068 1.85283 13.1775 2.08216 13.5482 2.45216C13.8872 2.78543 14.1495 3.18856 14.3168 3.6335C14.4815 4.05816 14.5935 4.54216 14.6268 5.25216C14.6582 5.96283 14.6668 6.18883 14.6668 8.00016C14.6668 9.8115 14.6602 10.0375 14.6268 10.7482C14.5935 11.4582 14.4815 11.9415 14.3168 12.3668C14.1499 12.812 13.8876 13.2152 13.5482 13.5482C13.2148 13.887 12.8117 14.1493 12.3668 14.3168C11.9422 14.4815 11.4582 14.5935 10.7482 14.6268C10.0375 14.6582 9.8115 14.6668 8.00016 14.6668C6.18883 14.6668 5.96283 14.6602 5.25216 14.6268C4.54216 14.5935 4.05883 14.4815 3.6335 14.3168C3.18838 14.1498 2.78518 13.8875 2.45216 13.5482C2.1131 13.215 1.85078 12.8118 1.6835 12.3668C1.51816 11.9422 1.40683 11.4582 1.3735 10.7482C1.34216 10.0375 1.3335 9.8115 1.3335 8.00016C1.3335 6.18883 1.34016 5.96283 1.3735 5.25216C1.40683 4.5415 1.51816 4.05883 1.6835 3.6335C1.85032 3.18828 2.1127 2.78504 2.45216 2.45216C2.78528 2.11298 3.18845 1.85065 3.6335 1.6835C4.05883 1.51816 4.5415 1.40683 5.25216 1.3735C5.96283 1.34216 6.18883 1.3335 8.00016 1.3335ZM8.00016 4.66683C7.11611 4.66683 6.26826 5.01802 5.64314 5.64314C5.01802 6.26826 4.66683 7.11611 4.66683 8.00016C4.66683 8.88422 5.01802 9.73206 5.64314 10.3572C6.26826 10.9823 7.11611 11.3335 8.00016 11.3335C8.88422 11.3335 9.73206 10.9823 10.3572 10.3572C10.9823 9.73206 11.3335 8.88422 11.3335 8.00016C11.3335 7.11611 10.9823 6.26826 10.3572 5.64314C9.73206 5.01802 8.88422 4.66683 8.00016 4.66683ZM12.3335 4.50016C12.3335 4.27915 12.2457 4.06719 12.0894 3.91091C11.9331 3.75463 11.7212 3.66683 11.5002 3.66683C11.2791 3.66683 11.0672 3.75463 10.9109 3.91091C10.7546 4.06719 10.6668 4.27915 10.6668 4.50016C10.6668 4.72118 10.7546 4.93314 10.9109 5.08942C11.0672 5.2457 11.2791 5.3335 11.5002 5.3335C11.7212 5.3335 11.9331 5.2457 12.0894 5.08942C12.2457 4.93314 12.3335 4.72118 12.3335 4.50016ZM8.00016 6.00016C8.5306 6.00016 9.0393 6.21088 9.41438 6.58595C9.78945 6.96102 10.0002 7.46973 10.0002 8.00016C10.0002 8.5306 9.78945 9.0393 9.41438 9.41438C9.0393 9.78945 8.5306 10.0002 8.00016 10.0002C7.46973 10.0002 6.96102 9.78945 6.58595 9.41438C6.21088 9.0393 6.00016 8.5306 6.00016 8.00016C6.00016 7.46973 6.21088 6.96102 6.58595 6.58595C6.96102 6.21088 7.46973 6.00016 8.00016 6.00016Z" fill="white"/>
      </symbol>
      <symbol id="icon-mail" viewBox="0 0 24 24">
        <path d="M3 3H21C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V20C22 20.2652 21.8946 20.5196 21.7071 20.7071C21.5196 20.8946 21.2652 21 21 21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3ZM12.06 11.683L5.648 6.238L4.353 7.762L12.073 14.317L19.654 7.757L18.346 6.244L12.061 11.683H12.06Z"/>
      </symbol>
      <symbol id="icon-map" viewBox="0 0 16 16">
        <path d="M12.2427 11.5761L8 15.8188L3.75734 11.5761C2.91823 10.737 2.34679 9.66789 2.11529 8.50401C1.88378 7.34013 2.0026 6.13373 2.45673 5.03738C2.91086 3.94103 3.6799 3.00396 4.66659 2.34467C5.65328 1.68539 6.81332 1.3335 8 1.3335C9.18669 1.3335 10.3467 1.68539 11.3334 2.34467C12.3201 3.00396 13.0891 3.94103 13.5433 5.03738C13.9974 6.13373 14.1162 7.34013 13.8847 8.50401C13.6532 9.66789 13.0818 10.737 12.2427 11.5761ZM8 8.66678C8.35362 8.66678 8.69276 8.5263 8.94281 8.27625C9.19286 8.0262 9.33334 7.68707 9.33334 7.33344C9.33334 6.97982 9.19286 6.64068 8.94281 6.39064C8.69276 6.14059 8.35362 6.00011 8 6.00011C7.64638 6.00011 7.30724 6.14059 7.05719 6.39064C6.80715 6.64068 6.66667 6.97982 6.66667 7.33344C6.66667 7.68707 6.80715 8.0262 7.05719 8.27625C7.30724 8.5263 7.64638 8.66678 8 8.66678Z"/>
      </symbol>
      <symbol id="icon-next" viewBox="0 0 20 20">
        <path d="M10.9766 9.99999L6.85156 5.87499L8.0299 4.69666L13.3332 9.99999L8.0299 15.3033L6.85156 14.125L10.9766 9.99999Z"/>
      </symbol>
      <symbol id="icon-phone" viewBox="0 0 24 24">
        <path d="M21 16.42V19.956C21.0001 20.2092 20.9042 20.453 20.7316 20.6382C20.559 20.8234 20.3226 20.9363 20.07 20.954C19.633 20.984 19.276 21 19 21C10.163 21 3 13.837 3 5C3 4.724 3.015 4.367 3.046 3.93C3.06372 3.67744 3.17658 3.44101 3.3618 3.26841C3.54703 3.09581 3.79082 2.99989 4.044 3H7.58C7.70404 2.99987 7.8237 3.04586 7.91573 3.12902C8.00776 3.21218 8.0656 3.32658 8.078 3.45C8.101 3.68 8.122 3.863 8.142 4.002C8.34073 5.38892 8.748 6.73783 9.35 8.003C9.445 8.203 9.383 8.442 9.203 8.57L7.045 10.112C8.36445 13.1865 10.8145 15.6365 13.889 16.956L15.429 14.802C15.4919 14.714 15.5838 14.6509 15.6885 14.6237C15.7932 14.5964 15.9042 14.6068 16.002 14.653C17.267 15.2539 18.6156 15.6601 20.002 15.858C20.141 15.878 20.324 15.9 20.552 15.922C20.6752 15.9346 20.7894 15.9926 20.8724 16.0846C20.9553 16.1766 21.0012 16.2961 21.001 16.42H21Z"/>
      </symbol>
      <symbol id="icon-prev" viewBox="0 0 20 20">
        <path d="M9.02344 9.99999L13.1484 5.87499L11.9701 4.69666L6.66677 9.99999L11.9701 15.3033L13.1484 14.125L9.02344 9.99999Z"/>
      </symbol>
      <symbol id="icon-search" viewBox="0 0 24 24">
        <path d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.867 18 18 14.867 18 11C18 7.132 14.867 4 11 4C7.132 4 4 7.132 4 11C4 14.867 7.132 18 11 18ZM19.485 18.071L22.314 20.899L20.899 22.314L18.071 19.485L19.485 18.071Z"/>
      </symbol>
      <symbol id="icon-user" viewBox="0 0 24 24">
        <path d="M4 22C4 19.8783 4.84285 17.8434 6.34315 16.3431C7.84344 14.8429 9.87827 14 12 14C14.1217 14 16.1566 14.8429 17.6569 16.3431C19.1571 17.8434 20 19.8783 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z" fill="white"/>
      </symbol>
      <symbol id="icon-vk" viewBox="0 0 16 16">
        <g>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7703 9.22994C14.301 9.74812 14.8612 10.2356 15.3372 10.8061C15.5475 11.0596 15.7466 11.3212 15.8989 11.6153C16.1147 12.0335 15.9192 12.4937 15.5442 12.5187L13.2133 12.5176C12.6121 12.5675 12.1325 12.3255 11.7293 11.9144C11.4066 11.5857 11.1077 11.2359 10.7974 10.8961C10.6702 10.7572 10.537 10.6265 10.3779 10.5232C10.0597 10.3167 9.78353 10.3799 9.60169 10.7118C9.41649 11.0493 9.37448 11.4231 9.35629 11.7993C9.33132 12.3481 9.16542 12.4924 8.61407 12.5176C7.43578 12.5731 6.31753 12.3949 5.2787 11.8005C4.36284 11.2765 3.65263 10.5367 3.03447 9.69923C1.83089 8.06848 0.909193 6.27655 0.0808054 4.43441C-0.105658 4.01938 0.0307068 3.79659 0.488638 3.7887C1.24905 3.77393 2.00936 3.77498 2.77067 3.78765C3.07973 3.79217 3.28433 3.96944 3.40366 4.26141C3.81507 5.273 4.31847 6.23544 4.95035 7.12754C5.11863 7.36505 5.29022 7.60255 5.53456 7.76973C5.80487 7.95482 6.01068 7.89347 6.13784 7.59236C6.21854 7.40143 6.25386 7.19577 6.27205 6.99128C6.3323 6.28774 6.34024 5.58542 6.23457 4.88435C6.1697 4.44682 5.92326 4.16357 5.48667 4.08078C5.26388 4.03857 5.29705 3.95566 5.40492 3.8285C5.59228 3.60918 5.76849 3.47266 6.11976 3.47266H8.75406C9.16878 3.55451 9.26088 3.74081 9.31766 4.15811L9.31992 7.08427C9.3154 7.24582 9.40061 7.7252 9.69158 7.83213C9.92446 7.90825 10.078 7.72194 10.2177 7.57427C10.8484 6.90485 11.2986 6.11374 11.7007 5.29455C11.8792 4.93435 12.0327 4.56026 12.1814 4.1865C12.2916 3.90914 12.4645 3.77267 12.7769 3.77871L15.3122 3.78098C15.3874 3.78098 15.4635 3.78208 15.5363 3.79454C15.9635 3.86735 16.0806 4.05113 15.9486 4.46832C15.7407 5.12286 15.3362 5.66832 14.9407 6.2163C14.5179 6.80135 14.0657 7.36636 13.6464 7.95487C13.2611 8.49229 13.2917 8.76318 13.7703 9.22994Z" fill="white"/>
        </g>
      </symbol>
    </svg>
    <header class="page-header" id="header">
      <div class="page-header__top">
        <div class="page-header__wrapper page-header__wrapper--top">
          <nav class="site-navigation site-navigation--header" role="navigation" aria-label="Навигация по сайту">
    
            <?php 
              wp_nav_menu( 
                array(
                  'theme_location'  => 'top_menu',
                  'container'       => null, 
                  'menu_class'      => 'site-navigation__list site-navigation__list--header', 
                  'depth'           => 0,
                ) 
              );         
            ?>
          </nav>
        </div>
      </div>
      <div class="page-header__middle">
        <div class="page-header__wrapper page-header__wrapper--middle">
          <div class="logo logo--header">
            <?php 
              if ( function_exists( 'the_custom_logo' ) ) {
               the_custom_logo();
              } 
            ?>
          </div>
          <div class="menu">
            <button class="menu__button" type="button" name="catalog">
              <span>Меню</span>
              <span class="menu__toggle"></span>
            </button>
          </div>
          <div class="contacts contacts--header">
            <ul class="contacts__list contacts__list--header">
              <li class="contacts__item contacts__item--header">
                <a class="contacts__link contacts__link--header" href="tel:<?php the_field( 'contact_phone_link_2', 21 ); ?>">
                  <div class="contacts__wrapper contacts__wrapper--header">
                    <svg class="contacts__icon contacts__icon--header" width="16" height="16" aria-label="Телефон">
                      <use xlink:href="#icon-phone"></use>
                    </svg>
                  </div>
                  <?php the_field( 'contact_phone_2', 21 ); ?>
                </a>
              </li>
              <li class="contacts__item contacts__item--header contacts__item--mail">
                <a class="contacts__link contacts__link--header" href="mailto:<?php the_field( 'contact_email_1', 21 ); ?>">
                  <div class="contacts__wrapper contacts__wrapper--header">
                    <svg class="contacts__icon contacts__icon--header" width="16" height="16" aria-label="E-mail">
                      <use xlink:href="#icon-mail"></use>
                    </svg>
                  </div>

                  <?php the_field( 'contact_email_1', 21 ); ?>
                </a>
              </li>
            </ul>
          </div>
          <!-- <div class="my-cart openpopup" data-popup="cart" tabindex="0">
            <svg class="my-cart__icon" width="32" height="32" aria-label="Корзина">
              <use xlink:href="#icon-cart"></use>
            </svg>
            <?php 
              if (function_exists('interpresent_mini_cart')) {
                interpresent_mini_cart();
              }
            ?>
          </div> -->
          <a class="my-cart" href="<?php echo wc_get_cart_url(); ?>">
            <?php 
              if (function_exists('interpresent_mini_cart')) {
                interpresent_mini_cart();
              }
            ?>
          </a>
        </div>
      </div>
      <div class="page-header__bottom">
        <div class="page-header__wrapper page-header__wrapper--bottom">
          <div class="catalog">
            <button class="catalog__button" type="button" name="catalog">
              <span class="catalog__toggle"></span>
              <span>Каталог</span>
            </button>
          </div>
          <div class="my-search my-search--header">            
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
      <div class="category category--header">
        <div class="category__wrapper">
          <div class="category__container">
            <div class="category__scroll">
              
              <ul class="category__list category__list--header">
                <?php
                  $taxonomy     = 'product_cat';
                  $orderby      = 'menu_order';  
                  $show_count   = 1;      // 1 for yes, 0 for no
                  $pad_counts   = 1;      // 1 for yes, 0 for no
                  $hierarchical = 1;      // 1 for yes, 0 for no  
                  $title        = '';  
                  $empty        = 0;
                  $waiting_category_id = 26;

                  $args = array(
                         'taxonomy'     => $taxonomy,
                         'orderby'      => $orderby,
                         'show_count'   => $show_count,
                         'pad_counts'   => $pad_counts,
                         'hierarchical' => $hierarchical,
                         'title_li'     => $title,
                         'hide_empty'   => $empty
                  );
                  $all_categories = get_categories( $args );
                  
                  // Если возникла ошибка запроса или терминов нет - прерываем выполнение функции
                	if ( is_wp_error( $all_categories ) || ! $all_categories ) {
                		return;
                	}
                    
                  foreach ($all_categories as $cat) {
                    if($cat->category_parent == 0) {
                      $category_id = $cat->term_id;                         
                      
                      if ($category_id !== $waiting_category_id) {
                        $args2 = array(
                                'taxonomy'     => $taxonomy,
                                'child_of'     => 0,
                                'parent'       => $category_id,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty
                        );
                        $sub_cats = get_categories( $args2 );
                        if($sub_cats) {
                          ?>
                            <li class="category__item category__item--header category__item--parent">
                              <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">
                                <?php echo $cat->name; ?>
                              </a>
                              <span>
                                <?php echo $cat->count; ?>
                              </span>
                              <ul class="category__children category__children--header">
                                <?php 
                                  foreach($sub_cats as $sub_category) : 
                                ?>
                                  <li>
                                    <a href="<?php echo get_term_link($sub_category->slug, 'product_cat'); ?>"><?php echo $sub_category->name; ?></a>
                                    <span><?php echo $sub_category->count; ?></span>
                                  </li>
                                <?php 
                                  endforeach;
                                ?>
                              </ul>
                            </li>
                          <?php
                        } else {
                          ?>
                            <li class="category__item category__item--header">
                              <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">
                                <?php echo $cat->name; ?>
                              </a>
                              <span>
                                <?php echo $cat->count; ?>
                              </span>
                            </li>
                          <?php
                        }
                      }                        
                    }       
                  }
                  
                ?>              
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="page-header__scroll">
        <div class="page-header__wrapper page-header__wrapper--scroll">
          <a class="my-cart" href="<?php echo wc_get_cart_url(); ?>">
            <?php 
              if (function_exists('interpresent_mini_cart')) {
                interpresent_mini_cart();
              }
            ?>
          </a>
        </div>
      </div>
    </header>
