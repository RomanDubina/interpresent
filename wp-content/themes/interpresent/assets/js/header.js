'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {
    if (screen.width <= 566) {
      let middleHeader = document.querySelector('.page-header__wrapper--middle');
      let topHeader = document.querySelector('.page-header__wrapper--top');
      let bottomHeader = document.querySelector('.page-header__wrapper--bottom');

      let contactsHeader = middleHeader.querySelector('.contacts--header');
      let catalogButon = bottomHeader.querySelector('.catalog');

      if (catalogButon) {
        let removeCatalogButton = bottomHeader.removeChild(catalogButon);
        if (removeCatalogButton) {
          middleHeader.appendChild(removeCatalogButton);
        }
      }

      if (contactsHeader) {
        let removeContacts = middleHeader.removeChild(contactsHeader);
        if (topHeader) {
          topHeader.appendChild(removeContacts);
        }
      }
    }
  } catch (e) {
    console.log(e);
  }
  
  try {
    var getCoords = function (elem) {
      var box = elem.getBoundingClientRect();

      var body = document.body;
      var docEl = document.documentElement;

      var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
      var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

      var clientTop = docEl.clientTop || body.clientTop || 0;
      var clientLeft = docEl.clientLeft || body.clientLeft || 0;
    
      var top = box.top + scrollTop - clientTop;
      var left = box.left + scrollLeft - clientLeft;

      return {
        top: top,
        left: left
      };
    };
    
    var header = document.querySelector('.page-header');    
    
    var arrowToTop = document.querySelector('.fly--totop');
    
    if (header && arrowToTop) {
      var headerScroll = header.querySelector('.page-header__scroll');
      
      let headerCoordinate = getCoords(header);
      let headerBottom = headerCoordinate.top + header.offsetHeight;
      let scrollFlag = false;
      
      window.addEventListener('scroll', function () {
        if ((pageYOffset >= headerBottom) && scrollFlag === false) {
          arrowToTop.classList.toggle('active');
          headerScroll.classList.toggle('active');
          
          scrollFlag = true;
        } else if ((pageYOffset <= headerBottom) && scrollFlag === true) {
          arrowToTop.classList.toggle('active');
          headerScroll.classList.toggle('active');
          
          scrollFlag = false;
        }
      });
    }
  } catch (e) {
    
  } finally {
    
  }
});
