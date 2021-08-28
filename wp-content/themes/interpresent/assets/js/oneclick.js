jQuery(function($) {
  $( '#oneclick' ).click(function () {
    if (!$( this ).hasClass('active')) {
      $( this ).addClass('active');
      
      $( '.card__button--product' ).trigger('click');  
    }    
  });
  
  $( '#oneclick-submit' ).click(function (evt) {
    evt.preventDefault();
    
    $this = $( this );
    
    var phoneVal,
      emailVal,
      nameVal;
      
    phoneVal = $this.siblings('input[name*="phone"]').val();
    emailVal = $this.siblings('input[name*="email"]').val();
    nameVal = $this.siblings('input[name*="name"]').val();
    messageVal = $this.siblings('textarea[name*="message"]').val();
    
    var data = {
            action: 'roomble_ajax_create_order',
            nonce: interpresent_ajax.nonce,
            phone: phoneVal,
            email: emailVal,
            name: nameVal,
            message: messageVal
        };
    
    $.ajax({
      url: interpresent_ajax.url, // обработчик
      data: data, // данные
      type: 'POST', // тип запроса
      beforeSend: function (response) {
        $( '.popup__wrapper--oneclick' ).children('.popup__title').remove();
        $( '.popup__wrapper--oneclick' ).children('.popup__text').remove();
        $( '.popup__wrapper--oneclick' ).children('.review').remove();  
        
        let templateThankyou = $( '#wait-oneclick' ).html();
        
        $( '.popup__wrapper--oneclick' ).html(templateThankyou);     
      },
      success: function(response){
        if( response ) {
          var fragments = response.fragments;

          if ( fragments ) {
            jQuery.each(fragments, function(key, value) {
                jQuery(key).replaceWith(value);
          });              
          
          let templateThankyou = $( '#thankyou-oneclick' ).html();
          
          $( '.popup__wrapper--oneclick' ).html(templateThankyou);
          
          $( '.thankyou__button--oneclick' ).click(function () {
            closePopup();
            
            $( '#oneclick' ).css({
              'pointer-events': 'none',
              'opacity': 0.7
            });
          });
          
          $( 'body' ).trigger( 'wc_cart_emptied' );
         }
        }
      },
      error: function (error) {
        console.log(error);
        
        let templateThankyou = $( '#error-oneclick' ).html();
        
        $( '.popup__wrapper--oneclick' ).html(templateThankyou);
        
        $( '.thankyou__button--oneclick' ).click(function () {
          closePopup();
        });
      }
    });
    
    return false;
  });
  
  // Aside usefull information moving  
  try {    
    let MOBILE_WIDTH = 1199;
    
    let deviceWidth = window.innerWidth && document.documentElement.clientWidth ?
                      Math.min(window.innerWidth, document.documentElement.clientWidth) :
                      window.innerWidth ||
                      document.documentElement.clientWidth ||
                      document.getElementsByTagName('body')[0].clientWidth;
    if (deviceWidth > MOBILE_WIDTH) {
      $('.sidebar--product').detach().insertAfter('.product__container');
    }         
  } catch (e) {
    console.log(e);  
  }
});