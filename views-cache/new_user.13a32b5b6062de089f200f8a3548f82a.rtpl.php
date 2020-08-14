<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="resource/new_user.css">
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
 </head>
 <body>
 	<div class="wrap">
	 	<form action="/alfa/new_user" method="post">
		 	<label for="login">Novo Usuário</label>
		 	<input type="text" name="newUser" id="login"><br>
		 	
		 	<label for="psw">Nova Senha</label>
		 	<input type="password" name="newPsw" id="psw"><br>
		 	
		 	<label for="cpsw">Conf. Senha</label>		 	
		 	<input type="password" name="confPsw" id="cpsw"><br>
		 	
		 	<input type="submit" value="Ok">

		 	<a href="/" id="right">Login</a>
		</form>
	</div>
 </body>

 </html>