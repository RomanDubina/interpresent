'use strict';

(function () {
  let deviceWidthDefault = window.innerWidth && document.documentElement.clientWidth ?
                    Math.min(window.innerWidth, document.documentElement.clientWidth) :
                    window.innerWidth ||
                    document.documentElement.clientWidth ||
                    document.getElementsByTagName('body')[0].clientWidth;

  window.addEventListener('resize', function () {
    let deviceWidthResize = window.innerWidth && document.documentElement.clientWidth ?
                      Math.min(window.innerWidth, document.documentElement.clientWidth) :
                      window.innerWidth ||
                      document.documentElement.clientWidth ||
                      document.getElementsByTagName('body')[0].clientWidth;
    if (deviceWidthDefault && deviceWidthResize) {
      if ( deviceWidthDefault === deviceWidthResize ) {
        return;
      }

      deviceWidthDefault = deviceWidthResize;

      console.log('resize horisontal');
      document.location.reload();
    }
  })
})();
