<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html>
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="/resource/client_updt.css">
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
 	<h1>Cadastro de Clientes</h1>
 </head>
 <body onload="limit()">
 	<div>
		<a href="/logout" id="right">Logout</a>
		<ul>
			 <li><a href="/bank_check">Cheques</a></li>
			 <li><a href="/calculation">Cálculo</a></li>
			<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
		</ul>
	</div>

	<!--<div>
		<a href="/alfa/client/search">Listar</a>
	</div>-->

 	<div class="wrap">
	 	<form action="" method="post">

	 		<?php $counter1=-1;  if( isset($Update) && ( is_array($Update) || $Update instanceof Traversable ) && sizeof($Update) ) foreach( $Update as $key1 => $value1 ){ $counter1++; ?>
		 	<input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="name">Nome</label>
		 	<input type="text" name="name" id="name" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

		 	<label for="fantasy">Fantasia</label>
		 	<input type="text" name="fantasy" id="fantasy" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientFantasy"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="address">Endereço</label>
		 	<input type="text" name="address" id="address" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

		 	<label for="district">Bairro</label>
		 	<input type="text" name="district" id="district" maxlength="30" value="<?php echo htmlspecialchars( $value1["clientDistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >

		 	<!--<label for="cpf">Cpf/Cnpj</label>-->
		 	<select id="selct" onchange="clearCpf()">
		 		<option>Cpf</option>
		 		<option>Cnpj</option>
		 	</select>
		 	<input type="text" name="cpf" id="cpfnj" maxlength="14" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Cpf 11/Cnpj 14 Dig." onblur="cpfCnpj(this.value)" value="<?php echo htmlspecialchars( $value1["clientCpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

		 	<label for="complement">Complem</label>
		 	<input type="text" name="complement" id="complement" maxlength="30" value="<?php echo htmlspecialchars( $value1["clientComplem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	

		 	<label for="city">Cidade</label>
		 	<input type="text" name="city" id="city" maxlength="30" value="<?php echo htmlspecialchars( $value1["clientCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

		 	<label for="state">UF</label>
		 	<input type="text" name="state" id="state" maxlength="2" value="<?php echo htmlspecialchars( $value1["clientState"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			<!--<select name="state" id="state" value="<?php echo htmlspecialchars( $value1["clientState"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
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
			</select>-->

		 	<label for="zipcode">Cep</label>
		 	<input type="text" name="zipcode" id="zipcode" placeholder="Somente Números" maxlength="8" c onblur="cep(this)" value="<?php echo htmlspecialchars( $value1["clientZipecode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

		 	<label for="phone1">Fone</label>
		 	<input type="tel" name="phone1" id="phone1" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)" value="<?php echo htmlspecialchars( $value1["clientPhone1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

		 	<label for="phone2">Fone</label>
		 	<input type="tel" name="phone2" id="phone2" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)" value="<?php echo htmlspecialchars( $value1["clientPhone2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="email">E-mail</label>
		 	<input type="email" name="email" id="email" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientEmail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br>

		 	<label for="limit">Limite Crédito</label>
		 	<input type="text" name="limit" id="limit" onblur="formatMoeda(this)" maxlength="12" onkeypress="return event.charCode>=46 && event.charCode<=57" value="<?php echo htmlspecialchars( $value1["clientLimit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

		 	<label for="others" id="labOthers">Outras Informações</label>
		 	<textarea name="others" id="others" maxlength="250"><?php echo htmlspecialchars( $value1["clientOthers"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea><br>
		 	<?php } ?>
		 	<div id="bar" onload="limit()">Informações Financeiras</div>

		 	<?php $counter1=-1;  if( isset($ChkDues) && ( is_array($ChkDues) || $ChkDues instanceof Traversable ) && sizeof($ChkDues) ) foreach( $ChkDues as $key1 => $value1 ){ $counter1++; ?>
		 	<label for="chkdue">Cheques à Vencer</label>
		 	<input type="text" name="chkdue" id="chkdue" value="<?php echo htmlspecialchars( $value1["vals"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>	
		 	<?php } ?>

		 	<?php $counter1=-1;  if( isset($ChkRetrnds) && ( is_array($ChkRetrnds) || $ChkRetrnds instanceof Traversable ) && sizeof($ChkRetrnds) ) foreach( $ChkRetrnds as $key1 => $value1 ){ $counter1++; ?>
		 	<label for="chkreturned">Cheques Devolvidos</label>
		 	<input type="text" name="chkreturned" id="chkreturned" value="<?php echo htmlspecialchars( $value1["retrnVals"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
		 	<?php } ?>
		 	<label for="credit">Créd. Atual</label>
		 	<input type="text" name="credit" id="credit" readonly>	 

		 	<?php $counter1=-1;  if( isset($ChkTots) && ( is_array($ChkTots) || $ChkTots instanceof Traversable ) && sizeof($ChkTots) ) foreach( $ChkTots as $key1 => $value1 ){ $counter1++; ?>
			<label for="chkvalues">Total de Cheques </label>
		 	<input type="text" name="chkvalues" id="chkvalues" value="<?php echo htmlspecialchars( $value1["totVals"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>

		 	<label for="chkreceived" id="labChkreceived">Total Líquido</label>
		 	<input type="text" name="chkreceived" id="chkreceived" value="<?php echo htmlspecialchars( $value1["totLiquid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>

		 	<label for="profit" id="labProfit">Lucro</label>
		 	<input type="text" name="profit" id="profit" value="<?php echo htmlspecialchars( $value1["totIntrst"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>	 			 		 	
		 	<?php } ?>

		 	<input type="submit" value="Salvar">
			<a href="/client">Cancelar</a>
		 	<!--<a href="/alfa/new_user" id="right">Novo Usuário</a>-->
		</form>
	</div>

</body>	

<script type="text/javascript" src="/resource/client_updt.js">
</script>

</html>