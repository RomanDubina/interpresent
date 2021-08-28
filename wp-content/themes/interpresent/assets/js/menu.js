'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {
    if (screen.width <= 735) {
      const rootElement = document.documentElement;

      let pageHeader = document.querySelector('.page-header');
      let menuButton = pageHeader.querySelector('.menu__button');
      let menuWrapper = pageHeader.querySelector('.page-header__top');
      let menuContainer = menuWrapper.querySelector('.page-header__wrapper--top');

      let catalogButton = pageHeader.querySelector('.catalog__button');
      let catalogCategory = pageHeader.querySelector('.category--header');

      /* menu close/open */

      let toggleMenu = function () {
        menuButton.classList.toggle('active');
        menuWrapper.classList.toggle('active');
        rootElement.classList.toggle('active');

        if (catalogButton) {
          if (catalogButton.classList.contains('active')) {
            catalogButton.classList.remove('active');
            catalogCategory.classList.remove('active');
          }
        }
      }

      if (menuButton && menuWrapper && rootElement) {
        menuButton.addEventListener('click', function () {
          toggleMenu();
        });

        menuWrapper.addEventListener('click', function (evt) {
          if (evt.target.classList.contains('page-header__top')) {
            toggleMenu();
          }
        });
      }
    }

  } catch (e) {
    console.log(e);
  }
});
