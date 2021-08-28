'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {
    const rootElement = document.documentElement;

    let pageHeader = document.querySelector('.page-header');
    let catalogButton = pageHeader.querySelector('.catalog__button');
    let catalogCategory = pageHeader.querySelector('.category--header');
    let catalogList = catalogCategory.querySelector('.category__list--header');
    let catalogItem = catalogList.querySelectorAll('.category__item');

    /* Catalog close/open */

    let toggleCatalog = function () {
      catalogButton.classList.toggle('active');
      catalogCategory.classList.toggle('active');

      if (catalogButton.classList.contains('active')) {
        document.addEventListener('keydown', onCatalogEscPress);
      } else {
        document.removeEventListener('keydown', onCatalogEscPress);
      }
    }

    let onCatalogEscPress = function (evt) {

      if (evt.keyCode === 27) {
        toggleCatalog();
      }
    }

    if (catalogButton && catalogCategory) {
      catalogButton.addEventListener('click', function () {
        if (pageHeader && rootElement) {
          let hightPageHeader = pageHeader.offsetHeight;
          let rootHeight = rootElement.offsetHeight;
            catalogCategory.style.height = rootHeight - hightPageHeader + 'px';
            catalogCategory.style.top = pageHeader.offsetHeight + 'px';
        }
        
        toggleCatalog();
      });

      catalogCategory.addEventListener('click', function (evt) {
        if (evt.target.classList.contains('category--header') || evt.target.classList.contains('category__scroll') || evt.target.classList.contains('category__wrapper')) {
          toggleCatalog();
        }
      });
    }


    /* Submenu display */

    let allCategoryItems = catalogList.querySelectorAll('li');
    let allCategoryLinks = catalogList.querySelectorAll('a');

    if (allCategoryItems) {
      for (var i = 0; i < allCategoryItems.length; i++) {
        allCategoryItems[i].tabIndex = 0;

        if (allCategoryLinks[i]) {
          allCategoryLinks[i].tabIndex = -1;          
        }
      }
    }

    if (catalogItem && allCategoryItems) {
      let countCatalogItems = catalogItem.length;

      allCategoryItems.forEach(function (item, index) {
        var enterLinkClick = function (element) {          
          let childA = element.querySelector('a');
          
          if (childA) {
            
            childA.addEventListener('click', function (evt) {
            
              document.removeEventListener('keypress', onEnterPress);
            });
            
            childA.click();      
          }
          
        }
        
        var onEnterPress = function (evt) {
          if (evt.keyCode === 13) {
            enterLinkClick(item);
          }
        }

        if (screen.width > 1239) {         
          if (index == 0 && !catalogButton.classList.contains('active') && !catalogCategory.classList.contains('active')) {
            item.addEventListener('focus', function () {
              toggleCatalog();
              
              item.addEventListener('focus', function () {
                document.addEventListener('keypress', onEnterPress);
              });
            });
          } else if (index == (allCategoryItems.length - 1)) {
            if (!item.classList.contains('category__item--parent')) {
              item.addEventListener('blur', function () {
                item.addEventListener('focus', function () {
                  document.addEventListener('keypress', onEnterPress);
                });
                
                toggleCatalog();

                document.removeEventListener('keypress', onEnterPress);
              });
            }
          } else {
            item.addEventListener('focus', function () {
              document.addEventListener('keypress', onEnterPress);
            });
          }
        }

        if (item.classList.contains('category__item--parent')) {
          let subCategory = item.querySelector('.category__children');

          if (screen.width > 1239) {
            item.addEventListener('focus', function () {
              this.classList.toggle('active');

              if (subCategory) {
                subCategory.classList.toggle('active');
              }
            });

            if (index > (countCatalogItems - 5)) {
              if (subCategory) {
                subCategory.style.top = 'auto';
                subCategory.style.bottom = '0' + 'px';
              }
            }
          } else if (screen.width <= 1239) {
            item.addEventListener('click', function (evt) {
              if (evt.target.classList.contains('category__item--parent')) {
                if (subCategory) {
                  subCategory.classList.toggle('active');
                }

                this.classList.toggle('active');
              }
            });
          }

        }
      });
    }


    /* Catalog page */
    
    let categoryAside = document.querySelector('.promotion__aside--catalog');

    if (categoryAside && screen.width >= 921) {
      let categoryItems = categoryAside.querySelectorAll('.category__item--catalog');
      let categoryLinksCatalog = categoryAside.querySelectorAll('.category__list--catalog a');
      
      if (categoryItems) {
        for (var i = 0; i < categoryItems.length; i++) {
          categoryItems[i].tabIndex = 0;
  
          if (categoryLinksCatalog[i]) {
            categoryLinksCatalog[i].tabIndex = -1;          
          }
        }
        
        categoryItems.forEach(function (item, index) {
          let isClick = false;

          item.addEventListener('mouseover', function () {
            isClick = true;
          });

          item.addEventListener('mouseout', function () {
            isClick = false;
          });
          
          var enterLinkClick = function (element) {          
            let childA = element.querySelector('a');
            
            if (childA) {
              
              childA.addEventListener('click', function (evt) {
              
                document.removeEventListener('keypress', onEnterPress);
              });
              
              childA.click();      
            }
            
          }
          
          var onEnterPress = function (evt) {
            if (evt.keyCode === 13) {
              enterLinkClick(item);
            }
          }

          item.addEventListener('focus', function () {
            if (!this.classList.contains('active') && isClick === false) {
              if (item.classList.contains('category__item--parent')) {
                let subCategory = item.querySelector('.category__children');

                if (subCategory) {
                  subCategory.classList.toggle('active');
                }

                this.classList.toggle('active');
              }

              document.addEventListener('keypress', onEnterPress);
            }
          });

          if (item.classList.contains('category__item--parent')) {
            item.addEventListener('click', function (evt) {
              if (isClick === true && evt.target.classList.contains('category__item--parent')) {
                let subCategory = item.querySelector('.category__children');

                if (subCategory) {
                  subCategory.classList.toggle('active');
                }

                this.classList.toggle('active');
              }
            });

          }
        });
      }
    } else if (categoryAside && screen.width < 921) {
      categoryAside.remove();
    }
  } catch (e) {
    console.log(e);
  }
});
