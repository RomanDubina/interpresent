jQuery( function( $ ) {  
    // wc_cart_params is required to continue, ensure the object exists
    if ( typeof interpresent_ajax.cart === 'undefined' ) {
        return false;
    }
    
    let toggleDisabledSubmitButton = function () {
      if ($( '.promotion--cart' ).length > 0) {
        $( '.promotion--cart' ).toggleClass( 'disabled' );
      }      
    }; 
    
    window.cart = {
      // Coupon ajax apply
  
      couponClick : function () {
        $( '.coupon__button' ).click( function (evt) {
          evt.preventDefault();
          
          $this = $( this );
          
          var couponVal = $this.siblings('input[name=coupon_code]').val();
          
          if (couponVal && couponVal !== '') {
            var data = {
                    action: 'apply_coupon_ajax',
                    coupon_val: couponVal
                };
            
            $.ajax({
              url: interpresent_ajax.url, // обработчик
              data: data, // данные
              type: 'POST', // тип запроса
              beforeSend: function () {
                toggleDisabledSubmitButton();
              },
              complete: function () {
                toggleDisabledSubmitButton();
              },
              success: function(response){
                if( response ) {
                  var fragments = response.fragments;
  
                  if ( fragments ) {
                    jQuery.each(fragments, function(key, value) {
                        jQuery(key).replaceWith(value);
                  });                       
                  
                  window.countProduct('.my-basket__item', 0);
                  window.cart.qtyChange();
                  window.cart.removeItem();
                  window.cart.couponClick();
                  window.cart.couponRemove();
                  
                  $( 'body' ).trigger( 'update_total_price' );
                 }
                }
              },
              error: function (error) {
                console.log(error);
              }
            });
            
            return false;
          } else {
            console.log('Пустое значение');
            
            return false;
          }
        });
      },
      
      
      // Coupon ajax remove
      
      couponRemove : function () {
        $( '.woocommerce-remove-coupon' ).click( function (evt) {
          evt.preventDefault();
          
          $this = $( this );
          
          var couponVal = $this.data('coupon');
          
          if (couponVal) {
            var data = {
                    action: 'apply_coupon_ajax',
                    coupon_val: couponVal
                };
            
            $.ajax({
              url: interpresent_ajax.url, // обработчик
              data: data, // данные
              type: 'POST', // тип запроса
              beforeSend: function () {
                toggleDisabledSubmitButton();
              },
              complete: function () {
                toggleDisabledSubmitButton();
              },
              success: function(response){
                if( response ) {
                  var fragments = response.fragments;
  
                  if ( fragments ) {
                    jQuery.each(fragments, function(key, value) {
                        jQuery(key).replaceWith(value);
                  });                       
                  
                  window.countProduct('.my-basket__item', 0);
                  window.cart.qtyChange();
                  window.cart.removeItem();
                  window.cart.couponClick();
                  window.cart.couponRemove();
                  
                  $( 'body' ).trigger( 'update_total_price' );
                 }
                }
              },
              error: function (error) {
                console.log(error);
              }
            });
            
            return false;
          } else {
            console.log('Пустое значение');
            
            return false;
          }
        });
      },
      
      // Cart price update depends on quantity
  
      qtyChange : function () {
        var ajaxRequestQty = function (data) {
          console.log('ajax request');
          $.ajax({
            url: interpresent_ajax.url, // обработчик
            data: data, // данные
            type: 'POST', // тип запроса
            beforeSend: function () {
              toggleDisabledSubmitButton();
            },
            complete: function () {
              toggleDisabledSubmitButton();
            },
            success: function(response){
              if( response ) {
                //console.log(response);
                /*var subtotal = $this.parent('.quantity').parent('td').siblings('.product-subtotal');
                
                if (subtotal) {
                  subtotal.html(data.sub_total); 
                }	  
                    
                var totalsSection = $( 'div.cart_totals' );
                
                var subTotals = totalsSection.find('.cart-subtotal').children('td');
                    subTotals.html(data.sub_totals);
                var orderTotals = totalsSection.find('.order-total').children('td');
                    orderTotals.html(data.totals);
                $( 'body' ).trigger( 'rf_update_total_price' );*/
                var fragments = response.fragments;

                if ( fragments ) {
                  jQuery.each(fragments, function(key, value) {
                      jQuery(key).replaceWith(value);
                });                       
                
                window.countProduct('.my-basket__item', 0);
                window.cart.qtyChange();
                window.cart.removeItem();
                window.cart.couponClick();
                window.cart.couponRemove();
                
                $( 'body' ).trigger( 'update_total_price' );
               }
              }
            },
            error: function (error) {
              console.log(error);
            }
          });
        }
        
        var lastTimeout;
        
        var onChangeValueQty = function() {        
            $this = $( this );
            var qty = $this.val();
            var currentVal  = parseFloat( qty);
          
            var item_hash = $this.attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
            var data = {
                    action: 'update_total_price',
                    quantity: currentVal,
                    hash : item_hash 
                };
            
            if (lastTimeout) {
              clearTimeout(lastTimeout);
            }
            
            lastTimeout = setTimeout(function () {
              ajaxRequestQty(data);
            }, 500);
            
            return false;
        }
        
        $( '.my-basket__form .qty' ).on( 'change', onChangeValueQty);
      },
      
      // Cart update product list after remove button click
      
      removeItem : function () {
        $( '.my-basket__delete' ).click( function (evt) {
          evt.preventDefault();
          $this = $( this );
          
          var productId = $this.data('product_id');
          var item_hash = $this.parent().parent('tr').find('.qty').attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
          
          var data = {
                  action: 'update_total_price',
                  quantity: 0, // '0' удалит елемент из списка
                  hash : item_hash 
              };
          
          $.ajax({
            url: interpresent_ajax.url, // обработчик
            data: data, // данные
            type: 'POST', // тип запроса
            beforeSend: function () {
              toggleDisabledSubmitButton();
            },
            complete: function () {
              toggleDisabledSubmitButton();
            },
            success: function(response){
              if( response ) { 			
                var fragments = response.fragments;
  
                if ( fragments ) {
                  jQuery.each(fragments, function(key, value) {
                      jQuery(key).replaceWith(value);
                  });                       
                  
                  window.countProduct('.my-basket__item', 0);
                  window.cart.qtyChange();
                  window.cart.removeItem();
                  window.cart.couponClick();
                  window.cart.couponRemove();
                  
                  $( 'body' ).trigger( 'update_total_price' );
                  
                  $( '.card__button' ).each(function() {
                    if ($( this ).parent().hasClass('active') && $( this ).data('product_id') == productId) {
                      $( this ).text('В корзину');
                      $( this ).parent().removeClass('active');
                    }
                  }); 
                }
              }
            },
            error: function (error) {
              console.log(error);
            }
          });
          
          return false; 
        });
      },
      
      // Cart update after add_to_cart button click
      
      addToCart : function () {
        $( '.add_to_cart_button' ).click( function (evt) {
          if ($( this ).hasClass('ajax_add_to_cart')) {
            evt.preventDefault();
            
            var $this = $(this),
                product_qty = $this.siblings().find('input[name=quantity]').val() || 1,
                product_id = $this.data('product_id'); 
            
            var data = {
                action: 'woocommerce_ajax_add_to_cart',
                product_id: product_id,
                product_sku: '',
                quantity: product_qty,
            };
    
            $(document.body).trigger('adding_to_cart', [$this, data]);
    
            $.ajax({
                type: 'POST',
                url: interpresent_ajax.url, // обработчик
                data: data,
                beforeSend: function (response) {
                    $this.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    $this.addClass('added').removeClass('loading');
                },
                success: function (response) {
    
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    } else {
                      $this.text('В корзине');
                      $this.parent('.card__right').addClass('active');
                      
                      $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $this]);
                      
                    }
                },
            });
    
            return false;
          }
        });
      }
      
    }
    
    
    window.cart.addToCart();
  
    // Single product page
    
    $( '.card__button--product' ).click( function (evt) {
      evt.preventDefault();
      
      var $this = $(this),
          product_qty,
          product_id,
          variation_id,
          selected_option = false;
      
      if ($this.hasClass('card__button--simple')) {
        product_qty = $this.parent().siblings('.count-product').find('input[name=quantity]').val() || 1;
        product_id = $this.val();
        variation_id = 0;
        selected_option = true;
      } else if ($this.hasClass('card__button--variable')) {
        product_qty = $this.parent().parent().parent().siblings('.count-product').find('input[name=quantity]').val() || 1;
        product_id = $this.siblings('input[name=product_id]').val();
        variation_id = $this.siblings('input[name=variation_id]').val();
        
        if (variation_id > 0) {
          selected_option = true;
        }
      }

      if (selected_option) {
        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: product_id,
            variation_id: variation_id,
            product_sku: '',
            quantity: product_qty,
        };
  
        $(document.body).trigger('adding_to_cart', [$this, data]);
  
        $.ajax({
            type: 'POST',
            url: interpresent_ajax.url, // обработчик
            data: data,
            beforeSend: function (response) {
                $this.toggleClass('active');
            },
            complete: function (response) {
                $this.toggleClass('active');
            },
            success: function (response) {
  
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {                
                  $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $this]);    
                }
            },
        });
      }      

      return false;
    });
});