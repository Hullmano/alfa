<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<title>Alfa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="Today()">
	 <div>
		<ul>
			 <li><a href="/alfa/calculation">Cálculo</a></li>
			<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
		</ul>
	</div>
	<div class="wrap">
 		<form action="" method="post">
		 	<label for="login">Banco</label>
		 	<input type="text" name="login" id="login">
		 	
		 	<label for="agency">Agência</label>
		 	<input type="tel" name="agency" id="agency">
		 	
		 	<label for="account">Conta</label>
		 	<input type="tel" name="account" id="account">	 	
		 			 	
		 	<label for="numchk">Nº Cheque</label>
		 	<input type="tel" name="numchk" id="numchk">
		 	
		 	<label for="value">Valor</label>
		 	<input type="tel" name="value" id="value"><br>

		 	<label for="dtToday">Data</label>
		 	<input type="date" name="dtToday" id="dtToday">

		 	<label for="issuer">Emitente</label>
		 	<input type="text" name="issuer" id="issuer">	

		 	<label for="dtDue">Venc.</label>
		 	<input type="date" name="dtDue" id="dtDue">		 		 	

		 	<input type="submit" value="Login">
		
		 	<a href="/alfa/new_user" id="right">New User</a>
		</form>
	</div>
</body>

<script type="text/javascript">
	
	function Today(dBase = new Date()){
		var dia = dBase.getDate();
		var mes = dBase.getMonth()+1;
		var ano = dBase.getFullYear();

		if (dia.toString().length == 1){
			dia = '0' + dia;
		}
		if (mes.toString().length == 1){
			mes = '0' + mes;
		}		

		//return ano + '-' + mes + '-' + ano;
		var diaAtual = ano + '-' + mes + '-' + dia;

		document.getElementById('dtToday').value = diaAtual;
		document.getElementById('dtDue').value = diaAtual;
	}
</script>

<style type="text/css">
	.wrap {
		width: 720px;
		height: 100%;
		margin: 100px auto;
		padding: 0;
	}

	#right {
		padding-left: 115px;
	}

	#login {
		width: 40px;
	}
	#agency {
		width: 60px;
	}

	#account, #numchk {
		width: 90px;
	}
	#value {
		width: 125px;
	}
	#issuer {
		width: 304px;
		text-transform: uppercase;
	}
	
	ul {
		list-style: none;
		font-size: 18px;
	}
	li {
		display: inline;
		padding-right: 10px;
	}	
	a {
		text-decoration: none;	
	}
	input[type=date] {
		width: 125px;
	}

 </style>
 </html>