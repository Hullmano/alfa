<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" type="text/css" href="/resource/login.css">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">--> 
 	<title>Alfa</title>	
 </head>
  <body>
 	<div class="wrap">
	 	<form action="/" method="post">
		 	<label for="login">Usuário</label>
		 	<input type="text" name="login" id="login" autofocus><br>
		 	
		 	<label for="psw">Senha</label>
		 	<input type="password" name="password" id="psw"><br>
		 	
		 	<input type="submit" value="Login">

		 	<a href="" onclick="mensagem()">Mensagem</a>
		
		 	<a href="/new_user" id="right">Novo Usuário</a>
		</form>
	</div>
 </body>
 <script type="text/javascript">
 	function mensagem() {
		var name = confirm("Deseja Realmente Excluir?")
		if (name==true)
		{
		  //document.write("Você pressionou o botão OK!")
		  alert('Excluído!');
		}
		else
		{
		  //document.write("Você pressionou o botão CANCELAR")
		  alert('Cancelado!');
		}
	}
 </script>
 </html>