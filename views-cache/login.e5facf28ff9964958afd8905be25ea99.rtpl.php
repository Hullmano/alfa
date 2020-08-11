<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8" />
 	<link rel="stylesheet" type="text/css" href="resource/login.css">
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">--> 	
 </head>
  <body>
 	<div class="wrap">
	 	<form action="/alfa/" method="post">
		 	<label for="login">Usuário</label>
		 	<input type="text" name="login" id="login" autofocus><br>
		 	
		 	<label for="psw">Senha</label>
		 	<input type="password" name="password" id="psw"><br>
		 	
		 	<input type="submit" value="Login">
		
		 	<a href="/alfa/new_user" id="right">Novo Usuário</a>
		</form>
	</div>
 </body>
 </html>