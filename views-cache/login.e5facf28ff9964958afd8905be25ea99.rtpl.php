<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!--<link rel="stylesheet" href="\resource\login\css\style.css">-->

 </head>
  <body>
 	<div class="wrap">
	 	<form action="/alfa/" method="post">
		 	<label for="login">Usuário</label>
		 	<input type="text" name="login" id="login"><br>
		 	
		 	<label for="psw">Senha</label>
		 	<input type="password" name="password" id="psw"><br>
		 	
		 	<input type="submit" value="Login">
		
		 	<a href="/alfa/new_user" id="right">Novo Usuário</a>
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

	#right {
		padding-left: 90px;
	}
	#psw {
		margin-left: 12px;
	}

 </style>
 </html>