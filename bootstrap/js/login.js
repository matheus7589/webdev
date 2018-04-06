$(function(){
	$('#logar').on('click', function(){
		var dados = {}
		dados.user = $('#userName').val();
		dados.pass = $('#userPassword').val();
		

		$.post( "loginController.php/", dados)
		  .done(function( data ) {
		  	data = JSON.parse(data);
		    if(data.success === true){
		    	// window.location.replace("./list.php");
		    	window.location = 'http://localhost/Vendas/list.php';
		    }else{
		    	alert("login falhou!");
		    }
		  });
	});

}); 
