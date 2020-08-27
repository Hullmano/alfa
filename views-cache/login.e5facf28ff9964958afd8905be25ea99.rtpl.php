<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">
 	<!--<link rel="stylesheet" type="text/css" href="/resource/login.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">--> 
 	<title>Alfa</title>	
 </head>
  <body>
 	<div class="container">
	 	<form action="/" method="post">
		 	<div class="row justify-content-md-center">
		 		<div class="col-md-auto">
				 	<label for="login">Usuário</label>
				 	<input type="text" class="form-control form-control-sm" name="login" id="login" autofocus><br>
				 	
				 	<label for="psw">Senha</label>
				 	<input type="password" class="form-control form-control-sm" name="password" id="psw"><br>
				 	
				 	<!--<input type="submit" value="Login">-->
				 	<button class="btn btn-success" type="submit">Login</button>

				 	<a class="btn btn-primary" href="/new_user" id="right">Novo Usuário</a>
			 	</div>
			</div>
		</form>
	</div>
 </body>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS --> 
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script> 
	<!--<script src="/resource/bank_check.js"></script>-->
 </html>