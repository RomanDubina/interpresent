'use strict';

document.addEventListener("DOMContentLoaded", function () {
  // Promo
  try {
    let promoSlider = document.querySelector('.promo__slider');

    if (promoSlider) {
      let promoSwiper = new Swiper('.promo__slider', {
        slidesPerView: 1,
        loop: true,
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        pagination: {
          el: '.promo__pagination',
          type: 'bullets',
          clickable: true,
        },
        autoplay: {
          delay: 8000,
        },
      });
    }
  } catch (e) {
    console.log(e);
  }


  // Products catalog
  try {
    let sufixPromotionSections = ['--sale', '--latest', '--news', '--related'];

    for (var i = 0; i < sufixPromotionSections.length; i++) {
      let promotionSlider = document.querySelector(`.promotion__slider${sufixPromotionSections[i]}`);

      if (promotionSlider) {
        let promotionSliderSlides = promotionSlider.querySelectorAll('.swiper-slide');

        if (window.innerWidth < 620) {
          if (promotionSliderSlides.length > 1) {
            mySwiperInit();
          } else {
            noMySwiperInit();
          }
        } else if (window.innerWidth >= 620 && window.innerWidth < 1230) {
          if (promotionSliderSlides.length > 2) {
            mySwiperInit();
          } else {
            noMySwiperInit();
          }
        } else if (window.innerWidth >= 1230) {
          if (promotionSliderSlides.length > 3) {
            mySwiperInit();
          } else {
            noMySwiperInit();
          }
        }

        function noMySwiperInit () {
          let promotionHeader = promotionSlider.previousElementSibling;

          if (promotionHeader.classList.contains('promotion__header')) {
            let navigBlock = promotionHeader.querySelector('.slider-navigation');
              navigBlock.style.display = 'none';
          }

          promotionSliderSlides.forEach((item, i) => {
            item.classList.add('no-slider');
          });

        }

        function mySwiperInit () {
          let promotionSwiper = new Swiper(`.promotion__slider${sufixPromotionSections[i]}`, {
            loop: true,
            spaceBetween: 30,
            effect: 'slide',
            freeMode: true,
            navigation: {
              nextEl: `.slider-navigation--next${sufixPromotionSections[i]}`,
              prevEl: `.slider-navigation--prev${sufixPromotionSections[i]}`,
            },
            // Responsive breakpoints
            breakpoints: {
              // when window width is >= 320px
              320: {
                slidesPerView: 1,
                autoHeight: true,
                //slidesPerGroup: 1,
              },
              // when window width is >= 620px
              620: {
                slidesPerView: 2,
                autoHeight: false,
                //slidesPerGroup: 2,
              },
              // when window width is >= 1230px
              1230: {
                slidesPerView: 3,
                //slidesPerGroup: 3,
              }
            }
          });
        }
      }
    }

  } catch (e) {
    console.log(e);
  }

  // Reviews
  try {
    let reviewSlider = document.querySelector('.review__slider');

    if (reviewSlider) {
      let reviewSwiper = new Swiper('.review__slider', {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 15,
        effect: 'slide',
        navigation: {
          nextEl: '.review__next',
          prevEl: '.review__prev',
        },
        // Responsive breakpoints
        breakpoints: {
          // when window width is >= 500px
          500: {
            slidesPerView: 80,
          },
          // when window width is >= 860px
          860: {
            spaceBetween: 123,
          }
        }
      });
    }
  } catch (e) {
    console.log(e);
  }

  // Single product
  try {
    let productSliderThumb = document.querySelector('.product__slider--thumb');

    if (productSliderThumb) {
      var promoThumbSwiper = new Swiper(productSliderThumb, {
        slidesPerView: 3,        
        clickable: true,
        spaceBetween: 20,
        // Responsive breakpoints
        breakpoints: {
          // when window width is >= 1024px
          1024: {
            spaceBetween: 14.43,
            direction: 'vertical',
          },
        }
      });

      let productSliderMain = document.querySelector('.product__slider--main');

      if (productSliderMain && promoThumbSwiper) {
        var promoMainSwiper = new Swiper(productSliderMain, {
          slidesPerView: 1,
          effect: 'fade',
          fadeEffect: {
            crossFade: true
          },
          thumbs: {
            swiper: promoThumbSwiper
          }
        });
      }
    }
  } catch (e) {
    console.log(e);
  }
});
