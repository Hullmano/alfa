<?php if(!class_exists('Rain\Tpl')){exit;}?> <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<title>Alfa</title>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css"> 	
 	<!--<link rel="stylesheet" type="text/css" href="/resource/client.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
 </head>
 <body>
	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="/bank_check">Cheques</a>
			<a class="navbar-brand" href="/calculation">Cálculos</a>
			<a class="navbar-brand ml-auto disabled">Ver.2209</a>
			<a class="navbar-brand ml-auto" href="/logout">Logout</a>
		</nav>
		<div class="p-5 text-center">
			<h2 class="h2">Cadastro de Clientes</h2>
		</div>

		<form action="" method="post">
			<div class="row"><!--row 1-->
				<div class="col-md"><!--col name-->
				 	<label for="name">Nome</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="name" id="name" maxlength="60" required>
			 	</div><!--end col name-->
			 	<div class="col-md"><!--col fantasy-->
				 	<label for="fantasy">Fantasia</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="fantasy" id="fantasy" maxlength="60">
				</div><!--end col fantasy-->
			 	<div class="col-md"><!--col adress-->
				 	<label for="address">Endereço</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="address" id="address" maxlength="60" required>
				</div><!--end col adress-->
			 	<div class="col-md-2"><!--col distric-->
				 	<label for="district">Bairro</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="district" id="district" maxlength="30" required >
				</div><!--end col distric-->
			 	<div class="col-md-2"><!--col complem-->
				 	<label for="complement">Complem</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="complement" id="complement" maxlength="30"><br>
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
				 	<input type="text" class="form-control form-control-sm" name="cpf" id="cpfnj" maxlength="14" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Cpf 11/Cnpj 14 Dig." onblur="cpfCnpj(this.value)" required>
				</div><!--end col cpf--> 
			 	<div class="col-md-3"><!--col city-->					
				 	<label for="city">Cidade</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="city" id="city" maxlength="30" required>
				</div><!--end col city-->
			 	<div class="col-md-1"><!--col state-->
				 	<label for="state">UF</label>
					<select class="form-control form-control-sm" name="state" id="state" required>
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
				</div><!--end col state-->
			 	<div class="col-md"><!--col zipcode-->
				 	<label for="zipcode">Cep</label>
				 	<input type="text" class="form-control form-control-sm" name="zipcode" id="zipcode" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Somente Números" maxlength="8" c onblur="cep(this)" required>
				</div><!--end col zipcoed-->
			 	<div class="col-md"><!--col phone1-->				
				 	<label for="phone1">Fone</label>
				 	<input type="tel" class="form-control form-control-sm" name="phone1" id="phone1" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)" required>
				</div><!--end col phone1-->
			 	<div class="col-md"><!--col phone2-->
				 	<label for="phone2">Fone</label>
				 	<input type="tel" class="form-control form-control-sm" name="phone2" id="phone2" placeholder="Somente Números" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57" onblur="phone(this)"><br>
				</div><!--end col state-->
	 		</div><!--end row 2-->

	 		<div class="row"><!--row 3-->
			 	<div class="col-md-3"><!--col email-->
				 	<label for="email">E-mail</label>
				 	<input type="email" class="form-control form-control-sm text-lowercase" name="email" id="email" maxlength="60"><br>
				</div><!--end col email-->
			 	<div class="col-md-2"><!--col limit-->
				 	<label for="limit">Limite Crédito</label>
				 	<input type="text" class="form-control form-control-sm" name="limit" id="limit" onblur="formatMoeda(this)" maxlength="12" onkeypress="return event.charCode>=46 && event.charCode<=57" required>
				</div><!--end col limit-->
			 	<div class="col-md"><!--col others-->
				 	<label for="others" id="labOthers">Outras Informações</label>
				 	<textarea class="form-control form-control-sm text-capitalize" name="others" id="others" maxlength="250"></textarea><br>
				</div><!--end col phone1-->
			</div><!--end row 3-->
				<button type="submit" class="btn btn-success">Salvar</button>
			 	<!--<input type="submit" value="Salvar">-->
		</form><br>

		<div class="table-responsive-sm table-striped">
			<table border="1px" cellpadding="5px" cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Fantasia</th>
						<th>Cpf/Cnpj</th>
						<th>Fone 1</th>
						<th>Fone 2</th>	
						<th>Cidade</th>
						<th>Email</th>
						<th>Limite</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter1=-1;  if( isset($Data) && ( is_array($Data) || $Data instanceof Traversable ) && sizeof($Data) ) foreach( $Data as $key1 => $value1 ){ $counter1++; ?>
					<tr>
						<td><?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdName" style="text-transform: capitalize"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td style="min-width: 17px; text-transform: capitalize"><?php echo htmlspecialchars( $value1["clientFantasy"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdCpf" style="font-size: 15px"><?php echo htmlspecialchars( $value1["clientCpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["clientPhone1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["clientPhone2"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td style="text-transform: capitalize"><?php echo htmlspecialchars( $value1["clientCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["clientEmail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["clientLimit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdLinks">
							<a class="badge badge-success badge-pill" href="client/<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update">Edit/Info</a>
							<a class="badge badge-danger badge-pill" href="client/<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro? Só é possível excluir clientes que não tenham registros de cheques!')"><i class="fa fa-trash"></i>Excluir</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div><br><br>

		<nav class="navbar fixed-bottom navbar-dark bg-dark">
		  <a class="navbar-brand" href="#"></a>
		</nav>
	</div><!--end container-->
</body>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS --> 
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script> 
	<script src="/resource/client.js"></script>

</html>