'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {
    const rootElement = document.documentElement;
    const overlayPopup = document.querySelector('.popup__overlay');

    let pageHeader = document.querySelector('.page-header');
    let catalogButton = pageHeader.querySelector('.catalog__button');
    let catalogCategory = pageHeader.querySelector('.category--header');

    let onPopupEscPress = function (evt) {
      if (evt.keyCode === 27) {
        closePopup();
      }
    }

    let openPopup = function (popup) {
      let allPopup = document.querySelectorAll('.popup');

      if (allPopup) {
        allPopup.forEach(function (item) {
          if (item.classList.contains('active')) {
            item.classList.remove('active');
          }
        });
      }

      if (catalogButton) {
        if (catalogButton.classList.contains('active')) {
          catalogButton.classList.remove('active');
          catalogCategory.classList.remove('active');
        }
      }

      if (rootElement && !rootElement.classList.contains('active')) {
        rootElement.classList.add('active');
      }

      if (overlayPopup && !overlayPopup.classList.contains('active')) {
        overlayPopup.classList.add('active');
      }

      popup.classList.add('active');

      document.addEventListener('keydown', onPopupEscPress, true);
    }

    window.closePopup = function () {
      let allPopup = document.querySelectorAll('.popup');

      if (allPopup) {
        allPopup.forEach(function (item) {
          if (item.classList.contains('active')) {
            item.classList.remove('active');
          }
        });
      }

      if (rootElement && rootElement.classList.contains('active')) {
        rootElement.classList.remove('active');
      }

      if (overlayPopup && overlayPopup.classList.contains('active')) {
        overlayPopup.classList.remove('active');
      }

      document.removeEventListener('keydown', onPopupEscPress, true);
    }

    let popupButtons = document.querySelectorAll('.openpopup');

    if (popupButtons) {
      popupButtons.forEach(function (item) {
        let sufixPopupName = item.getAttribute('data-popup');
        let popupName = '.popup--' + sufixPopupName;

        let popupItem = document.querySelector(popupName);
        
        item.addEventListener('click', function () {
          if (popupName == '.popup--cart') {                
            window.countProduct('.my-basket__item', 0);
            window.cart.qtyChange();
            window.cart.removeItem();      
            window.cart.couponClick();    
            window.cart.couponRemove();  
          } else if (popupName == '.popup--oneclick') {
            let variationId = document.querySelector('input[name="variation_id"]');
            
            if (variationId && variationId.value == 0) {
              return false;
            }
          }

          if (popupItem) {            
            openPopup(popupItem);
          }
        });
        
        var onEnterPressOpen = function (evt) {
          if (evt.keyCode === 13) {
            openPopup(popupItem);
            
            document.removeEventListener('keydown', onEnterPressOpen);
          }
        }
        
        item.addEventListener('focus', function () {
          if (popupItem) {
            document.addEventListener('keydown', onEnterPressOpen);
          }
        });
        
        item.addEventListener('blur', function () {          
          if (popupItem) {
            document.removeEventListener('keydown', onEnterPressOpen);
          }
        });
      });
    }

    let closePopupButtons = document.querySelectorAll('.popup__close');

    if (closePopupButtons) {
      for (var i = 0; i < closePopupButtons.length; i++) {
        closePopupButtons[i].addEventListener('click', closePopup);
        
        var onEnterPressClose = function (evt) {
          if (evt.keyCode === 13) {
            closePopup();
            
            document.removeEventListener('keydown', onEnterPressClose);
          }
        }
        
        closePopupButtons[i].addEventListener('focus', function () {          
          document.addEventListener('keydown', onEnterPressClose);
        });
        
        closePopupButtons[i].addEventListener('blur', function () {          
          document.removeEventListener('keydown', onEnterPressClose);
        });
      }
    }

    if (overlayPopup) {
      overlayPopup.addEventListener('click', closePopup);
    }

  } catch (e) {
    console.log(e);
  }
});
