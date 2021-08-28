jQuery(function($) {
	/* Plus/ Minus*/
	
	window.countProduct = function (parent, countItem) {
		var productCards = document.querySelectorAll(parent);
		
		productCards.forEach(function (item, index) {
			if (index >= countItem) {
				$( item ).on( 'click', 'button[class*="count-product"]', function () {
					
						// Get current quantity values	
						var qty = $( this ).siblings('.quantity').children( '.qty' );
						var val = parseFloat( qty.val() );
						var max = parseFloat( qty.attr( 'max' ) );
						var min = parseFloat( qty.attr( 'min' ) );
						var step = parseFloat( qty.attr( 'step' ) );
			
						// Change the value if plus or minus
						if ( $( this ).is( '.count-product__plus' ) ) {
								if ( max && ( max <= val ) ) {
										qty.val( max );
								} else {
										qty.val( val + step );
								}
						} else if ($( this ).is( '.count-product__minus' )) {
								if ( min && ( min >= val ) ) {
										qty.val( min );
								} else if ( val > 1 ) {
										qty.val( val - step );
								}
						}
						
						qty.trigger("change");
						
				}); 
			}			
		});			  
	}
	
	window.countProduct('.card', 0);
	
	if ($( '.page-main' ).hasClass('cart') || $( '.page-main' ).hasClass('checkout')) {
		//$( '.my-cart' ).addClass('disabled');
		
		if ($( '.page-main' ).hasClass('cart')) {
			var cartContent = $('.my-basket #my-basket__container').remove();
			
			$( '.woocommerce' ).replaceWith(cartContent);
			
			setTimeout(function () {
				window.countProduct('.my-basket__item', 0);
				window.cart.qtyChange();
				window.cart.removeItem();
				window.cart.couponClick();
				window.cart.couponRemove();
			}, 500);
		}		
	}	
});