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
		 	<input type="text" name="name" id="name" required>

		 	<label for="fantasy">Fantasia</label>
		 	<input type="text" name="fantasy" id="fantasy">

		 	<label for="address">Endereço</label>
		 	<input type="text" name="address" id="address" required>

		 	<label for="district">Bairro</label>
		 	<input type="text" name="district" id="district" required >

		 	<!--<label for="cpf">Cpf/Cnpj</label>-->
		 	<select id="selct" onchange="clearCpf()">
		 		<option>Cpf</option>
		 		<option>Cnpj</option>
		 	</select>
		 	<input type="text" name="cpf" id="cpfnj" maxlength="14" placeholder="Cpf 11/Cnpj 14 Dig." onblur="cpfCnpj(this.value)" required>

		 	<label for="complement">Complem</label>
		 	<input type="text" name="complement" id="complement">	

		 	<label for="city">Cidade</label>
		 	<input type="text" name="city" id="city" required>

		 	<label for="state">UF</label>
			<select name="state" id="state" required>
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
		 	<input type="text" name="zipcode" id="zipcode" maxlength="8" pattern="({1,3})" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="cep(this)" required>

		 	<label for="phone1">Fone</label>
		 	<input type="tel" name="phone1" id="phone1" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)" required>

		 	<label for="phone2">Fone</label>
		 	<input type="tel" name="phone2" id="phone2" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)">

		 	<label for="email">E-mail</label>
		 	<input type="email" name="email" id="email"><br>

		 	<label for="limit">Limite Crédito</label>
		 	<input type="number" step="0.01" name="limit" id="limit" onblur="formatMoeda(this)" maxlength="15" required>

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
		 	<input type="submit" value="Salvar">

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
	#zipcode {
		width: 120px;
	}
	#cpfnj {
		width: 127px;
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
		text-transform: capitalize;		
	}
	textarea {
		vertical-align: top;
		text-transform: capitalize;
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
	function formatMoeda(btn){                  //Formata o valor para Moeda.
		if (!btn.value){						//Verifica se value está vazio.
		} else {
			var valor = btn.value.replace(',','.'); //o parseFloat só considera decimal com ponto e nao com virgula
			var novoValor = parseFloat(valor).toFixed(2);
			btn.value = novoValor; 
		}	
	}
	
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

	function cpfCnpj(i){

		if (document.getElementById('selct').value == 'Cpf') {
			
			//if(cnpj.value) cnpj.value = cnpj.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/,"-");
			if(cpfnj.value) cpfnj.value = cpfnj.value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/,"$1.$2.$3-$4");
		}

		if (document.getElementById('selct').value == 'Cnpj'){

			if(cpfnj.value) cpfnj.value = cpfnj.value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,"$1.$2.$3/$4-$5");

		/*var v = i.value;
		if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
		  i.value = v.substring(0, v.length-1);
		  return;
		}
		i.setAttribute("maxlength", "14");
		if (v.length == 3 || v.length == 7) i.value += ".";
		if (v.length == 11) i.value += "-"; */
		}
	}

	function phone(i) {

		if(phone1.value) phone1.value = phone1.value.replace(/^(\d{0})(\d{2})/,"$1($2)");
		if(phone2.value) phone2.value = phone2.value.replace(/^(\d{0})(\d{2})/,"$1($2)");
	}

	function cep(i) {
		if(zipcode.value) zipcode.value = zipcode.value.replace(/^(\d{2})(\d{3})/,"$1.$2-");
	}

	function clearCpf() {
		document.getElementById('cpfnj').value = "";
	}
	
</script>

</html>