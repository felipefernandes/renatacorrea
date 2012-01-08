$(document).ready(function() { 		
	
	// declaracao de variaveis
	var portifolio_aba_ativa; //variavel para controlar qual aba conteudo de portifolio esta ativa	
	var altura;
	var alturaTrabalhosInit = $('#portifolio_content_tab').height();
	
	// LOGOTIPO LINK >> RESET TABS
	$('#logotipo').click(function() { resetaTabs() });	
	
	// PORTIFOLIO LINK
	/////
	$("#portifolio_link").click(function() { abreAncora('portifolio'); });

	//Portifolio > OPTS
	$("#eu_sou_link").click(function() { abreAncora("eu-sou"); });
	$("#trabalhos_link").click(function() { abreAncora("trabalhos"); });
	$("#telegrama_link").click(function() { abreAncora("telegrama"); });

	// BLOG LINK
	/////	
	$('#blog_link').click(function() { abreAncora('blog'); })	
		
	
	
	//////////////
	///// FUNCTIONS
	////////////////////////
	
	function resetaTabs() {
		
		if ($('#portifolio_tab').hasClass('aberto')) 
		{
			//fecha o portifolio
			$('#portifolio_tab').removeClass('aberto').animate({ left:-200 }, 1000, function() {
				$(this).addClass('fechado');
				$(this).hide();				
			});

			//fecha o portifolio conteúdo
			$('#portifolio_content_tab').removeClass('aberto').animate({ left:-200 }, 300, function() {
				$(this).addClass('fechado');
				$(this).hide();				
			});
		}
		
		if ($('#blog_tab').hasClass('aberto')) 
		{			
			//fecha o blog
			$('#blog_tab').removeClass('aberto').animate({ left:-300 }, 500, function() {
				$(this).addClass('fechado');
				$(this).hide();	
			});			
		}		 
		
		//set highlight menu >> OFF
		$('#portifolio_link').removeClass('ativo');
		$('#blog_link').removeClass('ativo');		
	}
	
	
	function ativaConteudoPortifolio(conteudo) {
	
			//fecha portfolio content tab
			$('#portifolio_content_tab').removeClass('aberto').animate({ left:-200 }, 500, function() {
				
				//remove todos os conteúdos
				$("#eu_sou").hide();
				$("#trabalhos").hide();
				$("#telegrama").hide();	
				
				//desmarca todas os itens de menu
				$("#eu_sou_link").parent().removeClass('ativo');
				$("#trabalhos_link").parent().removeClass('ativo');
				$("#telegrama_link").parent().removeClass('ativo');
				
				//set class como fechado
				$(this).addClass('fechado');
				$(this).hide();
				
				
				//ativa o conteúdo correto > display:visible
				switch (conteudo) {
					case "eu_sou":
						$("#eu_sou").show();
						if( !($("#eu_sou_link").parent().hasClass('ativo')) ) {
							$("#eu_sou_link").parent().addClass('ativo');
						}
						location.href="#eu-sou";	
						
						altura = $(window).height();
						//$('#menu_principal').height(parseInt(altura));	
						//$('#portifolio_tab').height(parseInt(altura));	
						//$('#portifolio_content_tab').height(parseInt(altura));
						
						break;
						
					case "trabalhos":
						$("#trabalhos").show();
						if( !($("#trabalhos_link").parent().hasClass('ativo')) ) {
							$("#trabalhos_link").parent().addClass('ativo');							
						}
						location.href="#trabalhos";	
						
						//$('#menu_principal').height(parseInt(alturaTrabalhosInit));	
						//$('#portifolio_tab').height(parseInt(alturaTrabalhosInit));
						//$('#portifolio_content_tab').height(parseInt(alturaTrabalhosInit));									
						
						break;
						
					case "telegrama":
						$("#telegrama").show();
						if( !($("#telegrama_link").parent().hasClass('ativo')) ) {
							$("#telegrama_link").parent().addClass('ativo');
						}						
						location.href="#telegrama";	
						
						altura = $(window).height();
						//$('#menu_principal').height(parseInt(altura));	
						//$('#portifolio_tab').height(parseInt(altura));	
						//$('#portifolio_content_tab').height(parseInt(altura));					
												
						break;
				}							
				
				$('#portifolio_content_tab').show();
			});		

			//abre o portifolio conteúdo
			
			$('#portifolio_content_tab').removeClass('fechado').animate({ left:390 }, 500, function() { 
				
				//set a classe como aberto
				$(this).addClass('aberto');					
				
				portifolio_aba_ativa = conteudo;
			});			
	}
	

	function abreAncora( ancora ) {
		
		switch(ancora) 
		{
			case "portifolio":
				if($('#blog_tab').hasClass('aberto') && $('#portifolio_tab').hasClass('fechado')) {
					resetaTabs();						
				} 
				
				//abre o portifolio
				$('#portifolio_tab').show();
				$('#portifolio_tab').removeClass('fechado').animate({ left:222 }, 500, function() { 
					$(this).addClass('aberto');						

					//abre o portifolio conteúdo
					ativaConteudoPortifolio("eu_sou");
										
				});

				//set highlight menu >> PORTIFOLIO
				if( !($('#portifolio_link').hasClass('ativo')) ) {
					$('#portifolio_link').addClass('ativo');
					$('#blog_link').removeClass('ativo');
				}
				break;
				
			case "blog":
				if ($('#blog_tab').hasClass('fechado') && $('#portifolio_tab').hasClass('aberto')) {
					resetaTabs();		
				}

				//redefine tamanho da tab de navegacao
				//$('#menu_principal').height( $(window).height() );

				//abre o blog
				$('#blog_tab').show();
				$('#blog_tab').removeClass('fechado').animate({ left:222 }, 500, function() { 
						$(this).addClass('aberto');					
					});						

				//set highlight menu
				if( !($("#blog_link").hasClass('ativo')) ) {
					$("#blog_link").addClass('ativo');
					$('#portifolio_link').removeClass('ativo');
				}
				break;
				
			case "eu-sou":
				if($('#blog_tab').hasClass('aberto') && $('#portifolio_tab').hasClass('fechado')) {
					resetaTabs();						
				} 

				//abre o portifolio
				$('#portifolio_tab').show();
				$('#portifolio_tab').removeClass('fechado').animate({ left:222 }, 500, function() { 
					$(this).addClass('aberto');						

					//abre o portifolio conteúdo
					ativaConteudoPortifolio("eu_sou");
				});

				//set highlight menu >> PORTIFOLIO
				if( !($('#portifolio_link').hasClass('ativo')) ) {
					$('#portifolio_link').addClass('ativo');
					$('#blog_link').removeClass('ativo');
				}
				break;

			case "trabalhos":
				if($('#blog_tab').hasClass('aberto') && $('#portifolio_tab').hasClass('fechado')) {
					resetaTabs();						
				} 
				
				//abre o portifolio
				$('#portifolio_tab').show();
				$('#portifolio_tab').removeClass('fechado').animate({ left:222 }, 500, function() { 
					$(this).addClass('aberto');						

					//abre o portifolio conteúdo
					ativaConteudoPortifolio("trabalhos");
					
				});

				//set highlight menu >> PORTIFOLIO
				if( !($('#portifolio_link').hasClass('ativo')) ) {
					$('#portifolio_link').addClass('ativo');
					$('#blog_link').removeClass('ativo');
				}
				break;

			case "telegrama":
				if($('#blog_tab').hasClass('aberto') && $('#portifolio_tab').hasClass('fechado')) {
					resetaTabs();						
				} 

				//abre o portifolio
				$('#portifolio_tab').show();
				$('#portifolio_tab').removeClass('fechado').animate({ left:222 }, 500, function() { 
					$(this).addClass('aberto');						

					//abre o portifolio conteúdo
					ativaConteudoPortifolio("telegrama");
										
				});

				//set highlight menu >> PORTIFOLIO
				if( !($('#portifolio_link').hasClass('ativo')) ) {
					$('#portifolio_link').addClass('ativo');
					$('#blog_link').removeClass('ativo');
				}
				break;
		}
		
	}

	
	////////////////////////////////////
	/// NAVEGACAO
	/// Baseada na ancora da URL
	////////////////////////////////////
		
	var url = document.location.toString();
	if (url.match('#')) { // the URL contains an anchor
		// click the navigation item corresponding to the anchor
		var ancora = url.split('#')[1];
		
		abreAncora(ancora);
	} 
	
	
	function getHeightViewPort()
	{
		var e = window
		, a = 'inner';
		if ( !( 'innerWidth' in window ) ) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		return  e[ a+'Height' ];
	}

	
	$('#postPagination a').live('click', function(e){
		e.preventDefault();
		var link = $(this).attr('href');
		$('#content').fadeOut(500).load(link + ' #contentInner', function(){ $('#content').fadeIn(500); });
	});
	
	
	
});