'use strict';

var showOrHideTextNews = function (countPost) {
  let saleCards = document.querySelectorAll('.news');

  if (saleCards) {
    saleCards.forEach(function (item, index) {
      if (index >= countPost) {
        let newsItem = item.querySelector('.news__text');
            
        if (newsItem) {
          let textLong = newsItem.textContent;
          let textShort = textLong.substring(0, 100);
          
          newsItem.textContent = textShort + ' ...';
          
          item.addEventListener('mouseover', function () {
            if (item.classList.contains('news--sale')) {
              newsItem.textContent = textLong;
            }
          });
          
          item.addEventListener('mouseleave', function () {
            if (item.classList.contains('news--sale')) {
              newsItem.textContent = textShort + ' ...';              
            }
          });
          
          item.addEventListener('focus', function () {
            if (item.classList.contains('news--sale')) {
              newsItem.textContent = textLong;
            }
          });
          
          item.addEventListener('blur', function () {
            if (item.classList.contains('news--sale')) {
              newsItem.textContent = textShort + ' ...';              
            }
          });
        }    
      }      
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  try {        
    window.showOrHideTextNews(0);

  } catch (e) {
    console.log(e);
  }
});
