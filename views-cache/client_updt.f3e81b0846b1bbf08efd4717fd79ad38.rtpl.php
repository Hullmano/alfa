<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">  	
 	<!--<link rel="stylesheet" href="/resource/client_updt.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
 </head>
 <body onload="limit()">
	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="/bank_check">Cheques</a>
			<a class="navbar-brand" href="/calculation">Cálculos</a>
			<a class="navbar-brand ml-auto" href="/logout">Logout</a>
		</nav>
		<div class="p-5 text-center">
			<h2 class="h2">Cadastro de Clientes - Editar</h2>
		</div>

	 	<form action="" method="post">
			<div class="row"><!--row 1-->
				<div class="col-md"><!--col name-->
			 		<?php $counter1=-1;  if( isset($Update) && ( is_array($Update) || $Update instanceof Traversable ) && sizeof($Update) ) foreach( $Update as $key1 => $value1 ){ $counter1++; ?>
				 	<input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

				 	<label for="name">Nome</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="name" id="name" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
		 		</div><!--end col name-->
		 		<div class="col-md"><!--col fantasy-->
				 	<label for="fantasy">Fantasia</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="fantasy" id="fantasy" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientFantasy"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		 		</div><!--end col fantasy-->
		 		<div class="col-md"><!--col adress-->
				 	<label for="address">Endereço</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="address" id="address" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
		 		</div><!--end col adress-->
		 		<div class="col-md-2"><!--col district-->
				 	<label for="district">Bairro</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="district" id="district" maxlength="30" value="<?php echo htmlspecialchars( $value1["clientDistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
		 		</div><!--end col district-->
		 		<div class="col-md-2"><!--col complem-->
				 	<label for="complement">Complem</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="complement" id="complement" maxlength="30" value="<?php echo htmlspecialchars( $value1["clientComplem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br>
 				</div><!--end col complem-->
		 	</div><!--end row 1-->

		 	<div class="row"><!--row 2-->
		 		<div class="col-md-1 pr-lg-1"><!--col selectCpf-->
				 	<label>Cpf/Cnpj</label>
				 	<select class="form-control form-control-sm" id="selct" onchange="clearCpf()">
				 		<option>Cpf</option>
				 		<option>Cnpj</option>
				 	</select>
				</div><!--end col selectCpf-->
				<div class="col-md-2 pl-lg-0 pt-lg-4 mt-lg-2"><!--col cpf-->				 	
				 	<input type="text" class="form-control form-control-sm" name="cpf" id="cpfnj" maxlength="14" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Cpf 11/Cnpj 14 Dig." onblur="cpfCnpj(this.value)" value="<?php echo htmlspecialchars( $value1["clientCpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div><!--end col cpf--> 
			 	<div class="col-md-3"><!--col city-->	
				 	<label for="city">Cidade</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="city" id="city" maxlength="30" value="<?php echo htmlspecialchars( $value1["clientCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div><!--end col city-->
			 	<div class="col-md-1"><!--col state-->
				 	<label for="state">UF</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize"name="state" id="state" maxlength="2" value="<?php echo htmlspecialchars( $value1["clientState"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				</div><!--end col state-->
			 	<div class="col-md"><!--col zipcode-->
				 	<label for="zipcode">Cep</label>
				 	<input type="text" class="form-control form-control-sm" name="zipcode" id="zipcode" placeholder="Somente Números" maxlength="8" c onblur="cep(this)" value="<?php echo htmlspecialchars( $value1["clientZipecode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div><!--end col zipcoed-->
			 	<div class="col-md"><!--col phone1-->	
				 	<label for="phone1">Fone</label>
				 	<input type="tel" class="form-control form-control-sm" name="phone1" id="phone1" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)" value="<?php echo htmlspecialchars( $value1["clientPhone1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div><!--end col phone1-->
			 	<div class="col-md"><!--col phone2-->
				 	<label for="phone2">Fone</label>
				 	<input type="tel" class="form-control form-control-sm" name="phone2" id="phone2" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)" value="<?php echo htmlspecialchars( $value1["clientPhone2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br>
				</div><!--end col state-->
	 		</div><!--end row 2-->

	 		<div class="row"><!--row 3-->
			 	<div class="col-md-3"><!--col email-->	 		
				 	<label for="email">E-mail</label>
				 	<input type="email" class="form-control form-control-sm text-lowercase" name="email" id="email" maxlength="60" value="<?php echo htmlspecialchars( $value1["clientEmail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br>
				</div><!--end col email-->
			 	<div class="col-md-2"><!--col limit-->
				 	<label for="limit">Limite Crédito</label>
				 	<input type="text" class="form-control form-control-sm" name="limit" id="limit" onblur="formatMoeda(this)" maxlength="12" onkeypress="return event.charCode>=46 && event.charCode<=57" value="<?php echo htmlspecialchars( $value1["clientLimit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div><!--end col limit-->
			 	<div class="col-md"><!--col others-->
				 	<label for="others" id="labOthers">Outras Informações</label>
				 	<textarea class="form-control form-control-sm text-capitalize" name="others" id="others" maxlength="250"><?php echo htmlspecialchars( $value1["clientOthers"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea><br>
				 	<?php } ?>
				</div><!--end col phone1-->
			</div><!--end row 3-->				 	
		 	
		 	<div class="row justify-content-md-center">	
		 		<div id="col-md" onload="limit()">Informações Financeiras</div>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark"></nav><br>
	 		
	 		<div class="row"><!--row 4-->
			 	<div class="col-md"><!--col chkdue-->	 
				 	<?php $counter1=-1;  if( isset($ChkDues) && ( is_array($ChkDues) || $ChkDues instanceof Traversable ) && sizeof($ChkDues) ) foreach( $ChkDues as $key1 => $value1 ){ $counter1++; ?>
				 	<label for="chkdue">Cheques à Vencer</label>
				 	<input type="text" class="form-control form-control-sm" name="chkdue" id="chkdue" value="<?php echo htmlspecialchars( $value1["vals"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>	
				 	<?php } ?>
				</div><!--end col chkdue-->
			 	<div class="col-md"><!--col chkreturned-->
				 	<?php $counter1=-1;  if( isset($ChkRetrnds) && ( is_array($ChkRetrnds) || $ChkRetrnds instanceof Traversable ) && sizeof($ChkRetrnds) ) foreach( $ChkRetrnds as $key1 => $value1 ){ $counter1++; ?>
				 	<label for="chkreturned">Cheques Devolvidos</label>
				 	<input type="text" class="form-control form-control-sm" name="chkreturned" id="chkreturned" value="<?php echo htmlspecialchars( $value1["retrnVals"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
				 	<?php } ?>
				</div><!--end col chkreturned-->
			 	<div class="col-md"><!--col credit-->				 	
				 	<label for="credit">Créd. Atual</label>
				 	<input type="text" class="form-control form-control-sm" name="credit" id="credit" readonly>	 
				</div><!--end col credit-->
			 	<div class="col-md"><!--col chkvalues-->
				 	<?php $counter1=-1;  if( isset($ChkTots) && ( is_array($ChkTots) || $ChkTots instanceof Traversable ) && sizeof($ChkTots) ) foreach( $ChkTots as $key1 => $value1 ){ $counter1++; ?>
					<label for="chkvalues">Total de Cheques</label>
				 	<input type="text" class="form-control form-control-sm" name="chkvalues" id="chkvalues" value="<?php echo htmlspecialchars( $value1["totVals"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
				</div><!--end col chkvalues-->
			 	<div class="col-md"><!--col chkreceived-->
				 	<label for="chkreceived" id="labChkreceived">Total Líquido</label>
				 	<input type="text" class="form-control form-control-sm" name="chkreceived" id="chkreceived" value="<?php echo htmlspecialchars( $value1["totLiquid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
				</div><!--end col chkreceived-->
			 	<div class="col-md"><!--col profit-->
				 	<label for="profit" id="labProfit">Lucro</label>
				 	<input type="text" class="form-control form-control-sm" name="profit" id="profit" value="<?php echo htmlspecialchars( $value1["totIntrst"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly><br>		 		 	
				 	<?php } ?>
				</div><!--end col profit-->
			</div><!--end row 4-->	
					<button type="submit" class="btn btn-success">Salvar</button>	
				 	<!--<input type="submit" value="Salvar">-->
					<a class="btn btn-primary" href="/client">Cancelar</a>
				 	<!--<a href="/alfa/new_user" id="right">Novo Usuário</a>-->
		</form>
	</div><!--end container-->
</body>	
<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS --> 
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script> 
	<script src="/resource/client_updt.js"></script>

</html>