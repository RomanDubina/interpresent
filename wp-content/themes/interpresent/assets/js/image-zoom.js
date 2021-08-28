'use strict';

(function () {  
  try {
    let deviceWidth = window.innerWidth && document.documentElement.clientWidth ? 
                      Math.min(window.innerWidth, document.documentElement.clientWidth) : 
                      window.innerWidth || 
                      document.documentElement.clientWidth || 
                      document.getElementsByTagName('body')[0].clientWidth;
    
    if (deviceWidth && deviceWidth > 767) {
      console.log(deviceWidth);
      
      var imageZoomItems = document.querySelectorAll('.image-zoom');

      if (imageZoomItems) {
        imageZoomItems.forEach((imageZoomItem, i) => {
          // Инициировать эффект масштабирования:
          imageZoom(imageZoomItem);
        });
      }

      function imageZoom(img) {
        var lens, imageZoomResult, cx, cy;

        /*создать элемент для вывода*/
        imageZoomResult = document.createElement("DIV");
        imageZoomResult.setAttribute("class", "image-zoom__result");

        /*создать линзу:*/
        lens = document.createElement("DIV");
        lens.setAttribute("class", "image-zoom__lens");

        /* добавляем родителю релатив и курсор нан*/
        img.parentElement.style.position = 'relative';
        img.parentElement.style.cursor = 'none';

        /*вставить линзы:*/
        img.parentElement.insertBefore(lens, img);

        /*вставить элемент для вывода:*/
        lens.appendChild(imageZoomResult);

        /*вычислите соотношение между результатом DIV и объективом:*/
        cx = imageZoomResult.offsetWidth / lens.offsetWidth;
        cy = imageZoomResult.offsetHeight / lens.offsetHeight;

        /*задайте свойства фона для результата DIV:*/
        imageZoomResult.style.backgroundImage = "url('" + img.src + "')";
        imageZoomResult.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";

        /*выполните функцию, когда кто-то перемещает курсор на изображение или объектив:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);

        /*а также для сенсорных экранов:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);

        /*старт отслеживания*/
        img.parentElement.addEventListener("mouseenter", onMouseEnter);

        // /*конец отслеживания*/
        // img.parentElement.addEventListener("mouseleave", onMouseLeave);

        function onMouseEnter () {
          //console.log('enter');
          lens.classList.toggle('active');

          /*конец отслеживания*/
          img.parentElement.addEventListener("mouseleave", onMouseLeave);
          img.parentElement.removeEventListener("mouseenter", onMouseEnter);
        }

        function onMouseLeave () {
          //console.log('leave');
          lens.classList.toggle('active');

          /*старт отслеживания*/
          img.parentElement.addEventListener("mouseenter", onMouseEnter);
          img.parentElement.removeEventListener("mouseleave", onMouseLeave);
        }

        function moveLens(evt) {
          var pos, x, y;

          /*предотвратите любые другие действия, которые могут произойти при перемещении по изображению:*/
          evt.preventDefault();

          /*получить позиции курсора x и y:*/
          pos = getCursorPos(evt);

          /*рассчитайте положение объектива:*/
          x = pos.x - (lens.offsetWidth / 2);
          y = pos.y - (lens.offsetHeight / 2);

          /*не допускайте расположения объектива вне изображения:*/
          if (x > img.width - lens.offsetWidth) {
            x = img.width - lens.offsetWidth;
          }
          if (x < 0) {
            x = 0;
          }
          if (y > img.height - lens.offsetHeight) {
            y = img.height - lens.offsetHeight;
          }
          if (y < 0) {
            y = 0;
          }

          /*установите положение объектива:*/
          lens.style.left = x + "px";
          lens.style.top = y + "px";

          /*покажите что такое объектив:*/
          imageZoomResult.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }

        function getCursorPos(evt) {
          var a, x = 0, y = 0;
          evt = evt || window.event;
          /*получить x и y позиции изображения:*/
          a = img.getBoundingClientRect();
          /*вычислите координаты курсора x и y относительно изображения:*/
          x = evt.pageX - a.left;
          y = evt.pageY - a.top;
          /*рассмотрим любую прокрутку страницы:*/
          x = x - window.pageXOffset;
          y = y - window.pageYOffset;
          return {x : x, y : y};
        }
      };
    }
    
  } catch (e) {
    console.log(e);
  }
})();
