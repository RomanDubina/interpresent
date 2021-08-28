'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {
    let payMethods = document.querySelectorAll('.review__pay');
    
    if (payMethods.length > 0) {
      payMethods.forEach((item, i) => {
        let inputChild = item.querySelector('input[type="radio"]');
      
        if (inputChild.checked) {
          item.classList.add('active');
        }
        
        inputChild.addEventListener('change', function () {
          for (var i = 0; i < payMethods.length; i++) {
            if ((payMethods[i] !== item) && payMethods[i].classList.contains('active')) {
              payMethods[i].classList.remove('active');
            }
          }
          
          item.classList.toggle('active');
        });
      });
      
    }
  } catch (e) {
    console.log(e);
  }
});
