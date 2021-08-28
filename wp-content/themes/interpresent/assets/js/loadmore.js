jQuery(function($){
	$('#true_loadmore').click(function(){
		var pagination = $( this ).siblings('.woocommerce-pagination');
		
		$(this).children('span').text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
		$(this).addClass('active');
		var data = {
			'action': 'loadmore',
			'query': true_posts,
			'page' : current_page,
			'single': single
		};
		
		$.ajax({
			url: interpresent_ajax.url, // обработчик
			data: data, // данные
			type: 'POST', // тип запроса
			success: function(data){
				new_items_on_page++;
				
				if( data ) { 					
					$('#true_loadmore').removeClass('active');
					$('#true_loadmore').children('span').text('Загрузить ещё');
					$('#true_loadmore').siblings('.promotion__list').append(data); // вставляем новые посты
					
					var new_items_on_page = current_page * parseInt(post_on_page);
					
					//console.log(current_page, new_items_on_page);
					
					if (post_type === 'product') {
						// Глобальная функция изменения количества для добавленных товаров
						window.countProduct('.card', new_items_on_page);
						window.cart.addToCart();
					} else if (post_type === 'post') {
						// Глобальная функция изменения длины текста в новостях
						window.showOrHideTextNews(new_items_on_page);
					}	
					
					current_page++; // увеличиваем номер страницы на единицу
					
					if (pagination) {
						var allItems = $( pagination ).find('a');
						
						for (var i = 0; i < allItems.length; i++) {
							if (allItems[i].textContent == current_page) {
								allItems[i].classList.add('current');
							}
							//console.log(allItems[i].textContent);
						}
										
					}
					
					if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку					
				} else {
					$('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
				}
			}
		});
	});
});