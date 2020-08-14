<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!--<link rel="stylesheet" href="\resource\login\css\style.css">-->
 	<link rel="stylesheet" href="css/bootstrap.min.css">

 </head>
  <body>
  	<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
    </nav>  		
  	</header>
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
 <!--<style type="text/css">

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

 </style>-->
 </html>