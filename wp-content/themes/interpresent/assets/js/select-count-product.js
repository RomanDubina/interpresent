'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {
    // Меняю отображение селекта Количества товаров
    let countProductsOnPageCatalogOptions = document.querySelectorAll('.wppp-select option');
    
    if (countProductsOnPageCatalogOptions && countProductsOnPageCatalogOptions.length > 0) {
      // Отделяю текст для заголовка
      let titleSelectText = countProductsOnPageCatalogOptions[0].textContent.split(':')[0];
      
      // Создаю шаблон html для заголовка
      let titleSelectHTML = `<h4 class="promotion__sort-title promotion__sort-title--count">${titleSelectText}</h4>`;
      
      // Вставляю заголовок перед select  
      countProductsOnPageCatalogOptions[0].parentNode.insertAdjacentHTML('beforeBegin', titleSelectHTML);
      
      // Перебираю все option, чтобф заменить у них подписи
      countProductsOnPageCatalogOptions.forEach((countProductsOnPageCatslogOption, i) => {  
        // Если надо показать Все - меняю текст 
        if ( countProductsOnPageCatslogOption.value !== '-1' ) {
          countProductsOnPageCatslogOption.textContent = countProductsOnPageCatslogOption.value;
        } else {
          // Если определенное количество - по подставляю value
          countProductsOnPageCatslogOption.textContent = 'Все';
        }          
      });
    }
  } catch (e) {
    console.log(e);
  } finally {
    
  }
});
