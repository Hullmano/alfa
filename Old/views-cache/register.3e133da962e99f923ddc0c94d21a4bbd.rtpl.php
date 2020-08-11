<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 	<div class="wrap">
	 	<form action="/alfa/register" method="post">
		 	<label for="login">Novo Usuário</label>
		 	<input type="text" name="newUser" id="login"><br>
		 	
		 	<label for="psw">Nova Senha</label>
		 	<input type="password" name="newPsw" id="psw"><br>
		 	
		 	<label for="cpsw">Conf. Senha</label>		 	
		 	<input type="password" name="confPsw" id="cpsw"><br>
		 	
		 	<input type="submit" value="Ok">

		 	<a href="/alfa/" id="right">Login</a>
		</form>
	</div>
 </body>
 <style type="text/css">

	.wrap {
		width: 320px;
		height: 100%;
		margin: 100px auto;
		padding: 0;
	}

	#login {
		margin-left: 0px;
	}
	#psw {
		margin-left: 12px;
	}
	#cpsw {
		margin-left: 11px;
	}
	#right {
		padding-left: 195px;
	}

 </style>
 </html>