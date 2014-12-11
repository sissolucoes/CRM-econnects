$(“img”).click(function(){ //Aqui é o evento para abrir o lightbox coloquei na pseudo classe img mas pode ser em uma id de uma div por exemplo #imagem_light ou qualquer coisa do genero.
$(“#caixa_total”).fadeTo(1000,0.4).css(“display”,”block”); //Aqui é onde o fundo da tela fica escuro e aparece este é o papel da div com a id caixa_total que também servirá para fechar o lightbox
$(“#conteudo_caixa”).animate({“width”:”650px”,”marginLeft”:”-=300px”},700);//Aqui é a animação onde a caixa aparece na horizontal a caixa assume a dimensão 650 pixels que pode ser alterado sem problemas
$(“#conteudo_caixa”).css(“display”,”block”).animate({“height”:”625px”,”marginTop”:”-=300px”},700,function(){
$(“#fechar “).css(“display”,”block”);
});//Aqui é onde ela aparece na vertical mostrando toda a caixa no centro da tela e é também onde ela mostra o conteudo neste exemplo somente com a div com a id fechar que é o botão para fechar mais é onde você irá colocar todas as ids que tem de aparecer na caixa, aqui eu usei o callback da função animate que é ótimo o botão fechar só irá aparecer quando a caixa abrir por completo (a caixa assume a altura de 625 pixels que também pode ser alterada)
});


$(“#caixa_total, #fechar”).click(function(){ //Evento para fechar tanto clicando fora da caixa branca quanto no botão  fechar
$(“#conteudo_caixa”).animate({“height”:”0px”,”marginTop”:”50%”},700,function(){
$(“#fechar”).css(“display”,”none”);
});//Animação para fechar ela verticalmente com o call back para fazer o conteudo desaparecer
$(“#conteudo_caixa”).animate({“width”:”0px”,”marginLeft”:”50%”},700,function(){
$(“#caixa_total”).fadeTo(1500,0);
$(“#conteudo_caixa”).css(“display”,”none”);
});//Animação para a caixa desaparecer na horizontal e no call back dela eu faço a div caixa total ficar transparente e as duas a caixa total e a div conteudo que é a div branca desaparecerem
});