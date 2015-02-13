var passageiro = 2;
var contratar1 = false;
var contratar2 = false;
var slider = {};
$(document).ready(function(e) {


    $(".insp_row, .historico, .col_segurados, .scroll_table, .cota_row, .obs_row02, .scroll_drop, .hist_row03").mCustomScrollbar({
      mouseWheel: true,
      autoDraggerLength: false,
      scrollButtons: false
    }); 

    $(".obs_row").mCustomScrollbar({
      mouseWheel: true,
      autoDraggerLength: false,
      scrollButtons: false,
      set_width: "143px !important"
    });


    /**
     * Menu principal do site
     */
    $('#main_nav > li ').hover( function(){

        $(this).find('ul.submenu').stop(true,false).slideToggle();
    });
    
	// HOME
	if($('body').hasClass('home')){

		$('#nossos_produtos h2').click( function(e){
			obj = $(this);
			$('#nossos_produtos div.content').not(obj.siblings('div.content')).slideUp();
			if(obj.hasClass('active')){
				$('#nossos_produtos h2.active').removeClass('active');
			} else { 
				$('#nossos_produtos h2.active').removeClass('active');
				obj.addClass('active');
			}
			obj.siblings('div.content').slideToggle();
		});
		


    $('a#aba_pf02, a#aba_pj02, a#aba_pe02').click( function(e){
      obj = $(this).prop('id');
      switch(obj){
        case 'aba_pf02':
          $('a#aba_pj02').removeClass('active');
          $('a#aba_pe02').removeClass('active');
          $('a#aba_pf02').addClass('active');
          $('div#pj02').addClass('hidden');
          $('div#pe02').addClass('hidden');
          $('div#pf02').removeClass('hidden');
                                        
                                        $('.imagem').html('<img src="../images/produto-seguro-viagem-turismo.jpg">');
        break;  
        case 'aba_pj02': 
          $('a#aba_pf02').removeClass('active');
          $('a#aba_pe02').removeClass('active');
          $('a#aba_pj02').addClass('active');
          $('div#pf02').addClass('hidden');
          $('div#pe02').addClass('hidden');
          $('div#pj02').removeClass('hidden');
                                        
                                        $('.imagem').html('<img src="../images/produto-seguro-viagem-negocios.jpg">');
        break;  
        case 'aba_pe02': 
          $('a#aba_pf02').removeClass('active');
          $('a#aba_pj02').removeClass('active');
          $('a#aba_pe02').addClass('active');
          $('div#pf02').addClass('hidden');
          $('div#pj02').addClass('hidden');
          $('div#pe02').removeClass('hidden');
                                        
                                        $('.imagem').html('<img src="../images/produto-seguro-viagem-estudos.jpg">');
        break;
      }
    });
		
	}
	
	// DROPDOWN
	if($('body').has('section#dropdown')){
		$("ul#dropdown_pf, ul#dropdown_pj").mCustomScrollbar({
			mouseWheel: true,
			autoDraggerLength: true,
			scrollButtons: false
		});	
		$("ul#dropdown_pf, ul#dropdown_pj").css({'display':'none','visibility':'visible'});
		
		$('h1#but_pf, h1#but_pj').click( function(e){
			var obj = $(this);
			var id = $(this).prop('id');
			var seta = obj.children('span');
			
			if( id == 'but_pf' && $('h1#but_pj span.seta').hasClass('active') ){
				$('#but_pj').click(); console.log('pf');
			} else if( id == 'but_pj' && $('h1#but_pf span.seta').hasClass('active') ){
				$('#but_pf').click(); console.log('pj');
			}	
			
			
			if(seta.hasClass('active')){
				seta.removeClass('active');
			} else {
				seta.addClass('active');
			}
			obj.siblings('ul').slideToggle();
			
		});
		
	}	
	
  
	if($('body').has('section#dropdown.dropdown-cobertura')){
		$("ul#dropdown_cobertura").mCustomScrollbar({
			mouseWheel: true,
			autoDraggerLength: true,
			scrollButtons: false
		});	
    
		$("ul#dropdown_cobertura").css({'display':'none','visibility':'visible'});
		
		$('h1#but_cobertura').click( function(e){
			var obj = $(this);
			var id = $(this).prop('id');
			var seta = obj.children('span');
			
			
			if(seta.hasClass('active')){
				seta.removeClass('active');
			} else {
				seta.addClass('active');
			}
			obj.siblings('ul').slideToggle();
			
		});
		
	}


    /**
     *  Pagina de produtos
     */
	if($('body').has('section#dropdown.dropdown-produtos')){

		$(".dropdown-container").mCustomScrollbar({
			mouseWheel: true,
			autoDraggerLength: true,
			scrollButtons: false
		});

		$(" ul.dropdown-container").css({'display':'none','visibility':'visible'});
		
		$(' h1.dropdown-button').click( function(e){


			var obj = $(this);
			var id = $(this).prop('id');
			var seta = obj.children('span');

            $('#'+ id+ '-ul').slideToggle();

            if(seta.hasClass('active')){
				seta.removeClass('active');
			} else {
				seta.addClass('active');
			}     

			    
		});       
		
	}	
      
  
	// TOOLTIPS
	
		$(".tootlip").tipTip({maxWidth: "290px", edgeOffset: -8});
                $(".tootlip_top").tipTip({maxwidth: "290px",edgeOffset: -1, defaultPosition: "top"});

    $('.custom_select').uniform();
    $('.custom_select_2col').uniform({selectClass: 'selector selector_2col' });
    $('.custom_select_3col').uniform({selectClass: 'selector selector_3col' });
    $('.custom_select_4col').uniform({selectClass: 'selector selector_4col' });
    $('input, textarea').placeholder(); 
    $('.custom_checkbox').uniform();
    $('.custom_checkbox_newsletter').uniform({checkboxClass: 'checker checker_2col' })
    $('.custom_checkbox_sms').uniform({checkboxClass: 'checker checker_3col' })
    $('.custom_checkbox_lightbox').uniform({checkboxClass: 'checker checker_4col' })
    $('.custom_checkbox_relacao').uniform({checkboxClass: 'checker_5col checker' })
    $('.custom_radio').uniform();
    
    $(".datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });

    $(".datepicker_online02").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });
       //
    $( ".btn-datepicker" ).click( function(e){
         console.log(this.value);
         $('#'+ this.value).datepicker( "show" );
        return false;
    
    });
    

    
    

if($('section#produtos').hasClass('comparar')){
              
    slider = $('.bxslider').bxSlider({
      auto: false,
      autoControls: false,
      useCSS: true,
      pager : false,
      controls : false,
      slideWidth : 235,
      minSlides : 2,
      maxSlides : 2,
      moveSlides : 2
                 
     });    
     
     $('#but_cobertura').click( function(e){
         console.log(this.value);
         $('.mais-cobertura').show('slow');
        return false;
    
    });
     //$('.mais-cobertura').hide();   
     
     //$('.table_coberturas2').attr('height', 420); 
     //$('.coberturas_table1').attr('height', 420);
     /*
    var slider2 = $('.bxslider2').bxSlider({
      auto: false,
      autoControls: false,
      useCSS: true,
      pager : false,
      controls : false
                 
     });      
        */
    
    $('#seta-next').click(function(){
      slider.goToPrevSlide();
      return false;
    });  
    
  $('#seta-prev').click(function(){
    slider.goToNextSlide();
    return false;
  });
  
  $("#btn-travar").click(function(){
    
    var current = slider.getCurrentSlide();
    var StartCurrent = current;
    current = current*2;
    var ic = 0;
    console.log('total -- ' + $( ".bxslider li" ).size());
  
    if(!$("#btn-travar").hasClass('btn-ativo')){
      $("#btn-travar").addClass('btn-ativo'); 
      $( ".bxslider li" ).each(function( index ) {
          if($(this).attr('class') != 'bx-clone'){
            if(ic == current){
              contratar1 = true;
              $('#div-contratar').html($(this).html());
              $(this).remove();
              $('#div-contratar').show();
              slider.reloadSlider({
                auto: false,
                autoControls: false,
                useCSS: true,
                pager : false,
                controls : false,
                slideWidth : 235,
                minSlides : 1,
                maxSlides : 1,
                moveSlides : 1            
              
              });
              $('.bx-wrapper').addClass('bx-wrapper-2');
            }  
            ic++;
          }  
       
      });
    }else{
      $("#btn-travar").removeClass('btn-ativo'); 
      $('.bxslider').append('<li>' + $('#div-contratar').html() + '</li>');
      $('#div-contratar').html('');
      $('#div-contratar').hide();
      $('.bx-wrapper').removeClass('bx-wrapper-2'); 
              slider.reloadSlider({
                auto: false,
                autoControls: false,
                useCSS: true,
                pager : false,
                controls : false,
                slideWidth : 235,
                minSlides : 2,
                maxSlides : 2,
                moveSlides : 2               
              
              });   
              
                
        contratar1 = false;
    
    }

  //  return false;
  });    

}

  
   $('.link_remover_passageiro').click(function(){
    $(this).parent().parent().parent().remove();
      return false;
  });
  
  
   $('#add-passageiro').click(function(){
      var html = '';
      passageiro = passageiro + 1;
      html = html + '<div id="pass'+ passageiro  +'">';
      html = html + '<article>';
      html = html + '<form>';
      html = html + '<h2>Segurado '+ passageiro +'</h2>';
      html = html + '<fieldset>';
      html = html + '<input type="text" name="cpf'+ passageiro +'"  id="cpf'+ passageiro +'" placeholder="CPF:">';
      html = html + '<input type="text" name="nome'+ passageiro +'" id="nome'+ passageiro +'" placeholder="Nome:">';
      html = html + '<input type="text" name="sobrenome'+ passageiro +'" id="sobrenome'+ passageiro +'" placeholder="Sobrenome:">';
      html = html + '<input type="text" name="nascimento'+ passageiro +'" id="nascimento'+ passageiro +'" placeholder="Nascimento:" class="datepicker_online02 dates_pag02 dates_pag'+ passageiro +'">';
      html = html + '<button class="datepicker_online02 btn-datepicker" value="nascimento'+ passageiro +'"></button>';
      html = html + '</fieldset>';  
      html = html + '<fieldset class="preco_familiar">';
      html = html + '<input type="email" name="email_passageiro'+ passageiro +'" class="email_passageiro" placeholder="E-mail:">';
      html = html + '<input type="text" name="celular'+ passageiro +'" id="celular'+ passageiro +'" placeholder="(DDD) Celular:">';
      html = html + '<input type="checkbox" id="notificacoes'+ passageiro +'" name="notificacoes'+ passageiro +'" value="notificacoes" class="custom_checkbox_sms notifica_sms">ENVIAR NOTIFICAÇÕES VIA SMS';
      html = html + '</fieldset>';      
      html = html + '</form>';
      html = html + '<div class="remover_passageiro">';
      html = html + '<p><a class="link_remover_passageiro" href="#">Remover segurado</a></p>';
      html = html + '</div>';
      html = html + '</article>';
      html = html + '</div>';
    
      $('#pass-novos').append(html);
      
        $(".datepicker_online02").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
           //
        $( ".btn-datepicker" ).click( function(e){
             console.log(this.value);
             $('#'+ this.value).datepicker( "show" );
            return false;
        
        });    
        
        $('.custom_checkbox_sms').uniform({checkboxClass: 'checker checker_3col' })
    
       $('.link_remover_passageiro').click(function(){
        $(this).parent().parent().parent().remove();
          return false;
      });    
    
      return false;
   });  

});



$(window).load(function() {
	
	if($('body').has('section#destaque')){
		$('#slider').nivoSlider({
			effect: 'fade',
			animSpeed: 400,
			pauseTime: 4000,
			directionNav: false,
			controlNav: true
		});
	}
        
        if($('body').has('section#content')){
            $('#slider-2').nivoSlider({
                effect: 'slideInRight',
                animSpeed: 1000,
                pauseTime: 4000,
                directionNav: false,
                controlNav: false
            });
        }
        

});