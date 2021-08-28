jQuery(function($) {
	searchProduct('.my-search--header');
	searchProduct('.my-search--catalog');
	
	function searchProduct (element) {
		let searchTerm = '';
		
		$(element).find('.my-search__input').keydown( function() {
			$this = $(this);
			
			searchTerm = $.trim($this.val());
		});
		
		var ajaxSearchRequest = function (st) {
      console.log('ajax request');
      
			$.ajax({
				url : interpresent_ajax.url, // Ссылка на AJAX обработчик WP
				type: 'POST', // Отправляем данные методом POST
				data: {
					'action' : 'new_ajax_search', // Вызываемое действие, которое мы описали в functions.php
					'term' : st // Отправляемые данные поля ввода
				},
				beforeSend: function() { // Перед отправкой данных
					$(element).find('.my-search__list').fadeOut(); // Скроем блок результатов
					$(element).find('.my-search__list').empty(); // Очистим блок результатов
					$(element).find('.my-search__preloader').show(); // Покажем загрузчик
				},
				success: function(result) { // После выполнения поиска
          
					$(element).find('.my-search__preloader').hide(); // Скроем загрузчик
					$(element).find('.my-search__list').fadeIn().html(result); // Покажем блок результатов и добавим в него полученные данные
				},
				error: function(result) {
					console.log(result);
				}
			});
		}
		
		var lastTimeout;
		
		var onSearchKeyUp = function() {
      $this = $(this);
			
			if ($.trim($this.val()) != searchTerm) { // Если новое значение не равно старому, идем дальше
				searchTerm = $.trim($this.val());
				
				if(searchTerm.length > 2){ // Если введено больше 2-х символов, идем дальше
					if (lastTimeout) {
		        clearTimeout(lastTimeout);
		      }
					
					lastTimeout = setTimeout(function () {
						ajaxSearchRequest(searchTerm);
					}, 500);	
				} else if (searchTerm.length < 2) {
					$(element).find('.my-search__list').empty(); // Очистим блок результатов
				}
			}  	
      
      return false;
		}
			
		$(element).find('.my-search__input').keyup( onSearchKeyUp );
		
		$(element).find('.my-search__input').focusin(function() {
			$(element).find('.my-search__result').fadeIn();		
		});
		
		$(document).mouseup(function(e) {
			if ((!$(element).find('.my-search__result').is(e.target) && $(element).find('.my-search__result').has(e.target).length === 0) && (!$(element).find('.my-search__input').is(e.target) && $(element).find('.my-search__input').has(e.target).length === 0)) {
				$(element).find('.my-search__result').fadeOut();
				$(element).find('.my-search__list').empty(); // Очистим блок результатов
				//$(element).find('.my-search__input').val('');
			}
		});
	}	
});