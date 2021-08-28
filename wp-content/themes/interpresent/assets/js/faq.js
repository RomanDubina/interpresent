'use strict';

document.addEventListener("DOMContentLoaded", function () {
  var toggleItems = function (element, arrayElements) {
    element.addEventListener('click', function () {
      for (var i = 0; i < arrayElements.length; i++) {
        if (arrayElements[i].classList.contains('active') && arrayElements[i] !== this) {
          arrayElements[i].classList.toggle('active');
        } else if (arrayElements[i].classList.contains('active') && arrayElements[i] == this) {
          this.classList.remove('active');
        } else if (!arrayElements[i].classList.contains('active') && arrayElements[i] == this) {
          this.classList.add('active');
        }
      }
    });
  };

  // FAQ
  try {
    let faqItems = document.querySelectorAll('.faq__item');

    if (faqItems) {
      faqItems.forEach(function (item) {
        toggleItems(item, faqItems);
      });
    }

  } catch (e) {
    console.log(e);
  }

  // Usefull information on the Single Product Page

  try {
    let sidebarItems = document.querySelectorAll('.sidebar__item-toggle');

    if (sidebarItems) {
      sidebarItems.forEach(function (item) {
        toggleItems(item, sidebarItems);
      });
    }

  } catch (e) {
    console.log(e);
  }
});
