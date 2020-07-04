<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!--<link rel="stylesheet" href="\resource\login\css\style.css">-->
 	<h1>Cadastro de Clientes</h1>
 </head>
 <body onload="Today()">
 	<div>
		<a href="/alfa/logout" id="right">Logout</a>
		<ul>
			 <li><a href="/alfa/bank_check">Cheques</a></li>
			 <li><a href="/alfa/calculation">Cálculo</a></li>
			<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
		</ul>
	</div>

	<div>
		<a href="/alfa/client/search">Listar</a>
	</div>

 	<div class="wrap">
	 	<form action="" method="post">

		 	<label for="name">Nome</label>
		 	<input type="text" name="name" id="name">

		 	<label for="fantasy">Fantasia</label>
		 	<input type="text" name="fantasy" id="fantasy">

		 	<label for="address">Endereço</label>
		 	<input type="text" name="address" id="address">

		 	<label for="district">Bairro</label>
		 	<input type="text" name="district" id="district">

		 	<label for="cpf">Cpf/Cnpj</label>
		 	<input type="text" name="cpf" id="cpf"> 		 	

		 	<label for="complement">Complem</label>
		 	<input type="text" name="complement" id="complement">	

		 	<label for="city">Cidade</label>
		 	<input type="text" name="city" id="city">

		 	<label for="state">UF</label>
			<select name="state" id="state">
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
				<option value="SP">SP</option>
				<option value="SE">SE</option>
				<option value="TO">TO</option>
			</select>	 

		 	<label for="zipcode">Cep</label>
		 	<input type="text" name="zipcode" id="zipcode">	

		 	<label for="phone1">Fone</label>
		 	<input type="tel" name="phone1" id="phone1">

		 	<label for="phone2">Fone</label>
		 	<input type="tel" name="phone2" id="phone2">

		 	<label for="email">E-mail</label>
		 	<input type="email" name="email" id="email"><br>

		 	<label for="register">Data do Cadastro</label>
		 	<input type="date" name="register" id="register">

		 	<label for="limit">Limite Crédito</label>
		 	<input type="tel" name="limit" id="limit">

		 	<label for="others" id="labOthers">Outras Informações</label>
		 	<textarea name="others" id="others"></textarea><br>

		 	<div id="bar">Informações Financeiras</div>

		 	<label for="chkdue">Cheques à Vencer</label>
		 	<input type="text" name="chkdue" id="chkdue">	
		 	
		 	<label for="chkreturned">Cheques Devolvidos</label>
		 	<input type="text" name="chkreturned" id="chkreturned">

		 	<label for="credit">Créd. Atual</label>
		 	<input type="text" name="credit" id="credit">	 

			<label for="chkvalues">Valor em Cheques</label>
		 	<input type="text" name="chkvalues" id="chkvalues">

		 	<label for="chkreceived" id="labChkreceived">Valor Recebido</label>
		 	<input type="text" name="chkreceived" id="chkreceived">

		 	<label for="profit" id="labProfit">Lucro</label>
		 	<input type="text" name="profit" id="profit">	 			 		 	
<!------------------------------------------------------------------->
		 	<input type="submit" value="Ok">

		 	<!--<a href="/alfa/new_user" id="right">Novo Usuário</a>-->
		</form>
	</div>
</body>
	
<style type="text/css">
	.wrap {
		width: 740px;
		height: 100%;
		margin: 100px auto;
		padding: 0;
		line-height: 25px;
	}
	#right{
		float: right;
	}
	#name {
		width: 309px;
	}
	#fantasy {
		width: 309px;
	}
	#cpf, #zipcode {
		width: 120px;
	}
	#city {
		width: 163px;
	}
	#address {
		width: 440px;
	}
	#phone1, #phone2 {
		width: 110px;
	}
	#email {
		width: 206px;
	}
	#limit, #chkdue, #chkreturned, #credit, #chkvalues, #chkreceived, #profit {
		width: 125px;
	}
	#others {
		width: 734px;
		height: 50px;
	}
	#labOthers {
		margin-left: 65px;
	}
	#chkvalues {
		margin-left: -3px;
	}
	#labChkreceived {
		margin-left: 34px;
	}
	#labProfit {
		margin-left: 35px;
	}
	#psw {
		margin-left: 12px;
	}
	#bar {
		background: #4444ff;
		width: 710px;
		text-align: center;
		padding: 0 15px;
		margin: 5px 0;
	}

	input[type=text],[type=tel] {
		text-transform: uppercase;		
	}
	textarea {
		vertical-align: top;
		text-transform: uppercase;
		font-size: 14px;		
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
</style>

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

		document.getElementById('register').value = diaAtual;
	}
</script>

</html>