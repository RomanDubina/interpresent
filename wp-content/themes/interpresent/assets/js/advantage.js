'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {        
    let advantages = document.querySelectorAll('.advantages__text--short');
  
    if (advantages) {
      advantages.forEach(function (item, index) {
        let textLong = item.textContent;
        let textShort = textLong.substring(0, 165);
        
        item.textContent = textShort + ' ...';     
      });
    }

  } catch (e) {
    console.log(e);
  }
});
