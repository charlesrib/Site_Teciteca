(function($){	
	$(document).ready(function() {
		// Cria uma div.paginas que receberá os paginadores
		var ul = $('<li></li>');
		// Insere a div criada antes da lista de destaques
		$('#tabs ul').before(ul);		
		// roda o jcycle na ul dentro da div destaques
		$('#tabs ul').cycle({
			pager: 'li', // paginação
			pause: true, // pausa ao deixar o mouse sobre a imagens
			pauseOnPagerHover: true, // pausa ao deixar o mouse sobre a paginação
			speed:  1000,
			timeout: 5000, 			
			// Executa uma função antes de cada troca de slide
			before: function(atual, proximo, opcoes, avancando) {
				 // Esconde o parágrafo e a div.fundo que estão no slide atual
				$('div', atual).fadeIn();
			},			
			// Executa uma função depois de cada troca de slide
			after: function(atual, proximo, opcoes, avancando) {
				// coloca o mesmo titulo do link na etiqueta destaques
				$('a.faixa', '#tabs').attr({
					title: $('a', proximo).attr('title'),
					href: $('a', proximo).attr('href')
				});				
				// mostra o parágrafo e a div.fundo do slide atual
				$('div', atual).fadeIn();
			}
		});	
	});	
})(jQuery);