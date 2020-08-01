<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!--<link rel="stylesheet" href="\resource\login\css\style.css">-->
 	<h1>Cadastro de Clientes</h1>
 </head>
 <body>
 	<div>
		<a href="/alfa/logout" id="right">Logout</a>
		<ul>
			 <li><a href="/alfa/bank_check">Cheques</a></li>
			 <li><a href="/alfa/calculation">Cálculo</a></li>
			<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
		</ul>
	</div>

	<!--<div>
		<a href="/alfa/client/search">Listar</a>
	</div>-->

 	<div class="wrap">
	 	<form action="" method="post">

		 	<label for="name">Nome</label>
		 	<input type="text" name="name" id="name" maxlength="60" required>

		 	<label for="fantasy">Fantasia</label>
		 	<input type="text" name="fantasy" id="fantasy" maxlength="60">

		 	<label for="address">Endereço</label>
		 	<input type="text" name="address" id="address" maxlength="60" required>

		 	<label for="district">Bairro</label>
		 	<input type="text" name="district" id="district" maxlength="30" required >

		 	<!--<label for="cpf">Cpf/Cnpj</label>-->
		 	<select id="selct" onchange="clearCpf()">
		 		<option>Cpf</option>
		 		<option>Cnpj</option>
		 	</select>
		 	<input type="text" name="cpf" id="cpfnj" maxlength="14" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Cpf 11/Cnpj 14 Dig." onblur="cpfCnpj(this.value)" required>

		 	<label for="complement">Complem</label>
		 	<input type="text" name="complement" id="complement" maxlength="30">	

		 	<label for="city">Cidade</label>
		 	<input type="text" name="city" id="city" maxlength="30" required>

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
		 	<input type="text" name="zipcode" id="zipcode" placeholder="Somente Números" maxlength="8" c onblur="cep(this)" required>

		 	<label for="phone1">Fone</label>
		 	<input type="tel" name="phone1" id="phone1" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)" required>

		 	<label for="phone2">Fone</label>
		 	<input type="tel" name="phone2" id="phone2" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)">

		 	<label for="email">E-mail</label>
		 	<input type="email" name="email" id="email" maxlength="60"><br>

		 	<label for="limit">Limite Crédito</label>
		 	<input type="text" name="limit" id="limit" onblur="formatMoeda(this)" maxlength="12" onkeypress="return event.charCode>=46 && event.charCode<=57" required>

		 	<label for="others" id="labOthers">Outras Informações</label>
		 	<textarea name="others" id="others" maxlength="250"></textarea><br>

		 	<input type="submit" value="Salvar">

		 	<!--<a href="/alfa/new_user" id="right">Novo Usuário</a>-->
		</form>
	</div>

	<div class="data">
		<table border="1px" cellpadding="5px" cellspacing="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Cpf/Cnpj</th>
					<th>Fone 1</th>
					<th>Limite</th>	
					<th>Cheques à Vencer</th>
					<th>Cheques à Vencer</th>
					<th>Cheques à Vencer</th>
					<th>Cheques à Vencer</th>
					<th>Cheques à Vencer</th>
					<th>Cheques à Vencer</th>
				</tr>
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($Data) && ( is_array($Data) || $Data instanceof Traversable ) && sizeof($Data) ) foreach( $Data as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td><?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdName" style="text-transform: capitalize"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdCpf" style="font-size: 15px"><?php echo htmlspecialchars( $value1["clientCpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["clientPhone1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["clientLimit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td>1000.00</td>
					<td>1000.00</td>
					<td>1000.00</td>
					<td>1000.00</td>
					<td>1000.00</td>
					<td>1000.00</td>
					<td id="tdLinks">
						<a href=client/<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update>Editar</a>
						<a href=client/<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete>Excluir</a>
					</td>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
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
	#tdName {
		max-width: 180px;
	}
	#tdCpf {
		width: 122px;
	}
	#tdLinks {
		width: 95px;
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
			var valor = btn.value.replace('/','.'); //o parseFloat só considera decimal com ponto e nao com virgula
			var novoValor = parseFloat(valor).toFixed(2);
			btn.value = novoValor; 
		}	
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