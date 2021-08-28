'use strict';

document.addEventListener("DOMContentLoaded", function () {
  try {
    const URL_SITE = window.location.href;
    
    const MAIL_FORMAT = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,10}))$/;
    
    const TEXT_NAME_ERROR = 'Неверный формат имени';
    const TEXT_PHONE_ERROR = 'Неверный формат телефона';
    const TEXT_EMAIL_ERROR = 'Неверный формат e-mail';
    const TEXT_COMPANY_ERROR = 'Введите название компании';
    const TEXT_ADDRESS_ERROR = 'Введите адрес и способ доставки';
    
    const TEXT_NAME_VALID = 'Имя';
    const TEXT_ADDRESS_VALID = 'Адрес';
    
    var check_fields = function (field, form) {
  
      if (field.value === '' && (field.required || field.getAttribute('aria-required') === 'true' || field.closest('.validate-required'))) {
        if (field.name.indexOf('name') > -1) {
          field.placeholder = TEXT_NAME_ERROR;
        } else if (field.name.indexOf('phone') > -1) {
          field.placeholder = TEXT_PHONE_ERROR;
        } else if (field.name.indexOf('email') > -1) {
          field.placeholder = TEXT_EMAIL_ERROR;
        } else if (field.name.indexOf('company') > -1) {
          field.placeholder = TEXT_COMPANY_ERROR;
        } else if (field.name.indexOf('address') > -1) {
          field.placeholder = TEXT_ADDRESS_ERROR;
        } else if (field.name.indexOf('post_content') > -1) {
          field.placeholder = 'Отзыв не может быть пустым';          
        } else if (field.name.indexOf('message') > -1) {
          field.placeholder = 'Укажите желаемый способ и адрес доставки. Или задайте интересующий Вас вопрос';
        }
        
        if (!field.classList.contains('error-field')) {
          field.classList.add('error-field');
        }
      } else {
        if (field.name.indexOf('email') > -1) {
          if (!field.value.match(MAIL_FORMAT)) {
            field.placeholder = 'Неверный формат e-mail';
            
            if (!field.classList.contains('error-field')) {
              field.classList.add('error-field');
            }
          } 
        }               
      }
      
      formSubmit(form);
    }
    
    var formSubmit = function (form) {
      let formItem = document.querySelector(form);
      
      if (formItem) {
        var allInputs = formItem.querySelectorAll('input');
        var textAreaFields = formItem.querySelectorAll('textarea');
        
        var buttonDisabled = false;
        
        let enableSubmit = 1;
        
        for (var i = 0; i < allInputs.length; i++) {
          if ((allInputs[i].type !== 'submit') && (allInputs[i].type !== 'hidden')) {
            if (allInputs[i].value === '' && (allInputs[i].required || allInputs[i].getAttribute('aria-required') === 'true' || allInputs[i].closest('.validate-required'))) {
              enableSubmit *= 0;
            } else if (allInputs[i].name.indexOf('email') > -1) {
              if (!allInputs[i].value.match(MAIL_FORMAT)) {
                enableSubmit *= 0;
              }  
            } else {
              enableSubmit *= 1;
            } 
          }         
        }
        
        for (var k = 0; k < textAreaFields.length; k++) {
          if ((textAreaFields[k].required === true || textAreaFields[k].getAttribute('aria-required') === 'true' || textAreaFields[k].closest('.validate-required')) && textAreaFields[k].value === '') {
            enableSubmit *= 0;    
          }
        }
        
        if (enableSubmit === 1) {
          buttonDisabled = true;
        }
        
        let inputSubmit = formItem.querySelector('input[type="submit"]');
        let buttonSubmit = formItem.querySelector('button[type="submit"]');
        
        if (!buttonDisabled) {
          if (inputSubmit) {
            inputSubmit.style.pointerEvents = 'none';
            inputSubmit.style.opacity = 0.5;
            
            let parentInput = inputSubmit.parentNode;
            
            if (parentInput.tagName === 'LABEL') {
              parentInput.style.pointerEvents = 'none';
              parentInput.style.opacity = 0.5;
            }
          } else if (buttonSubmit) {
            buttonSubmit.style.pointerEvents = 'none';
            buttonSubmit.style.opacity = 0.5;
          }
        } else if (buttonDisabled) {
          if (inputSubmit) {
            inputSubmit.style.pointerEvents = 'all';
            inputSubmit.style.opacity = 1;
            
            let parentInput = inputSubmit.parentNode;
            
            if (parentInput.tagName === 'LABEL') {
              parentInput.style.pointerEvents = 'all';
              parentInput.style.opacity = 1;
            }
          } else if (buttonSubmit) {
            buttonSubmit.style.pointerEvents = 'all';
            buttonSubmit.style.opacity = 1;
          }
        }
      }      
    }
    
    var validationForm = function (form) {
      let formItem = document.querySelector(form);
      
      if (formItem) {
        var allInputs = formItem.querySelectorAll('input');
        
        var textAreaFields = formItem.querySelectorAll('textarea');
        
        allInputs.forEach((item, i) => {
          if ((item.type !== 'submit') && (item.type !== 'hidden')) {
            let placeholderItem = item.placeholder;
             
            item.onblur = function () {  
              check_fields(this, form);
            };
            
            item.onfocus = function (evt) {          
              this.placeholder = placeholderItem;
              
              if (this.classList.contains('error-field')) {
                this.classList.remove('error-field');
              }
            };
            
            item.onkeypress = function(evt) { 
              if (this.name.indexOf('name') > -1) {
                return (/[a-zA-Zа-яА-Я ]/.test(String.fromCharCode(evt.charCode)));
              } else if (this.name.indexOf('phone') > -1) {
                return (/[0-9 -+()]/.test(String.fromCharCode(evt.charCode)));
              }          
            }
          }        
        });
      
        textAreaFields.forEach((item, i) => {
          let placeholderItem = item.placeholder;
          
          item.onblur = function () {
            check_fields(this, form);
          };
          
          item.onfocus = function (evt) {          
            item.placeholder = placeholderItem;
            
            if (item.classList.contains('error-field')) {
              item.classList.remove('error-field');
            }  
          };
        });
        
        formItem.onclick = function (evt) {
          if (evt.target.tagName === 'FORM' || evt.target.classList.contains('wpmtst-submit') || evt.target.classList.contains('review__submit') || evt.target.classList.contains('my-basket__line')) {
            allInputs.forEach((item, i) => {
              if ((item.type !== 'submit') && (item.type !== 'hidden')) {
                check_fields(item, form);
              }        
            });
          
            textAreaFields.forEach((item, i) => {
              check_fields(item, form);
            });
          }          
        }
      }
    }    
    
    // Купить в один клик
    
    if (URL_SITE.indexOf('product') > 0) {      
      formSubmit('#oneclick-form');
      validationForm('#oneclick-form');
    }    
    
    // Чекаут
    
    if (URL_SITE.indexOf('checkout') > 0) {
      formSubmit('form[name="checkout"]');
      validationForm('form[name="checkout"]');
      
      // Исключаю поля Шиппинга из обязательных в зависимости от состояния чекбокса
      
      let otherAddress = document.querySelector('#ship-to-different-address-checkbox');
      let allFields = document.querySelectorAll('.review--shipping .validate-required');
      
      var refreshRequiredFlagShippingFields = function () {
        allFields.forEach((item, i) => {
          item.classList.toggle('validate-required');  
          
          if (!item.classList.contains('validate-required')) {
            let inputField = item.querySelector('input');
            
            if (inputField) {
              if (inputField.name.indexOf('name') > 1) {
                inputField.placeholder = TEXT_NAME_VALID;
              } else if (inputField.name.indexOf('address') > 1) {
                inputField.placeholder = TEXT_ADDRESS_VALID;
              } 
              
              if (inputField.classList.contains('error-field')) {
                inputField.classList.remove('error-field');
              }            
            }
          }     
        });      
      }
      
      if (otherAddress) {
        if (!otherAddress.checked) {
          refreshRequiredFlagShippingFields();
        }
        
        otherAddress.onchange = function () {
          refreshRequiredFlagShippingFields();
          
          formSubmit('form[name="checkout"]');
          validationForm('form[name="checkout"]');
        }
      }    
    }     
    
  
    // Отзыв
    
    if (URL_SITE.indexOf('about') > 0 && URL_SITE.indexOf('success') === -1) {
      formSubmit('#wpmtst-submission-form');
      validationForm('#wpmtst-submission-form');
    } else if (URL_SITE.indexOf('about') > 0 && URL_SITE.indexOf('success') > 0) {
      let popupReview = document.querySelector('.popup--review');
      let popupOverlay = document.querySelector('.popup__overlay');
      let titleReviewPopup = popupReview.querySelector('.popup--review .popup__title');
      
      if (titleReviewPopup) {
        titleReviewPopup.remove();
      }
      
      let reviewPopup = popupReview.querySelector('.review--popup');
      
      if (reviewPopup) {
        let buttonOk = document.createElement('button');
          buttonOk.textContent = 'Хорошо';
          buttonOk.className = 'success-button popup__close';
        
        let privacyReviewPopup = reviewPopup.querySelector('.privacy');
        
        if (privacyReviewPopup && popupOverlay) {
          reviewPopup.replaceChild(buttonOk, privacyReviewPopup);
          
          popupReview.classList.add('active');
          popupOverlay.classList.add('active');
          
          buttonOk.addEventListener('click', function () {
            closePopup();
          });        
        }
      }
    }
  
    // Оптовикам
    
    formSubmit('#wpcf7-f162-o1 .wpcf7-form');
    validationForm('#wpcf7-f162-o1 .wpcf7-form');
  } catch (e) {
    console.log(e);
  }
});

