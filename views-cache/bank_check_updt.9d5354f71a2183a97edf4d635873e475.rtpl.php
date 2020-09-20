<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alfa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">	
 	<!--<link rel="stylesheet" type="text/css" href="/resource/bank_check_updt.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
</head>
<body>
	<div class="container">
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="/client">Clientes</a>
			<a class="navbar-brand" href="/calculation">Cálculos</a>
			<a class="navbar-brand ml-auto" href="/logout">Logout</a>
		</nav>
		<div class="p-5 text-center">
			<h2>Cadastro de Cheques - Editar</h2>
		</div>
		
 		<form action="" method="post">
 			<div class="row"><!--row 1-->

				<div class="col-md pr-lg-0"><!--col select-->	
					<label for="selectBox">Cliente</label>
					<select class="form-control form-control-sm" id="selectBox" onchange="selectClient(this.value)" onclick="setIndex()" onblur="setIndex()">
						<option value="">Selecione</option>
						<?php $counter1=-1;  if( isset($Users) && ( is_array($Users) || $Users instanceof Traversable ) && sizeof($Users) ) foreach( $Users as $key1 => $value1 ){ $counter1++; ?>
						<option id="options" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
						<?php } ?>
					</select>
				</div><!--end col select-->
					<?php $counter1=-1;  if( isset($Update) && ( is_array($Update) || $Update instanceof Traversable ) && sizeof($Update) ) foreach( $Update as $key1 => $value1 ){ $counter1++; ?>
				<div class="col-md-3 pl-lg-0 pt-lg-4 mt-lg-2"><!--col client-->					
					<input type="hidden" id="idClient" name="idClient" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	

					<input type="text" class="form-control form-control-sm text-capitalize" name="client" id="client" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="return false" required>	
				</div> <!--col client-->

				<div class="col-md-1"> <!--col bank-->
				 	<label for="bank">Banco</label>
				 	<input type="text" class="form-control form-control-sm" name="bank" id="bank" value="<?php echo htmlspecialchars( $value1["checkBank"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div> <!--end col bank-->  
				<div class="col-md-1"> <!--col agency-->
				 	<label for="agency">Agência</label>
				 	<input type="tel" class="form-control form-control-sm" name="agency" id="agency" value="<?php echo htmlspecialchars( $value1["checkAgency"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div> <!--end col agency--> 	
				<div class="col-md"> <!--col account-->	
				 	<label for="account">Conta</label>
				 	<input type="tel" class="form-control form-control-sm" name="account" id="account" value="<?php echo htmlspecialchars( $value1["checkAccount"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>	 	
				</div> <!--end col account-->
				<div class="col-md"> <!--col numchk--> 			 	
				 	<label for="numchk">Nº Cheque</label>
				 	<input type="tel" class="form-control form-control-sm" name="numchk" id="numchk" value="<?php echo htmlspecialchars( $value1["checkNumChk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div> <!--end col numchk-->
			 	<div class="col-md"> <!--col value--> 	
				 	<label for="value">Valor</label>
				 	<input type="number" class="form-control form-control-sm" step="0.01" name="value" id="value" value="<?php echo htmlspecialchars( $value1["checkValue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" maxlength="15" required><br>
				</div> <!--end col value-->
			</div><!--end row 1-->

			<div class="row"><!--row 2-->
				<div class="col-md"> <!--col dtToday-->
				 	<label for="dtToday">Data</label>
				 	<input type="date" class="form-control form-control-sm" name="dtToday" id="dtToday" value="<?php echo htmlspecialchars( $value1["checkToday"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div> <!--end col dtToday-->
				<div class="col-md-3"> <!--col issuer-->
				 	<label for="issuer">Emitente</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="issuer" id="issuer" value="<?php echo htmlspecialchars( $value1["checkIssuer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>	
				</div> <!--end col issuer-->
				<div class="col-md"> <!--col dtDue-->
				 	<label for="dtDue">Venc.</label>
				 	<input type="date" class="form-control form-control-sm" name="dtDue" id="dtDue" value="<?php echo htmlspecialchars( $value1["checkDue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="difDates()" required>
				</div> <!--end col dtDue-->
				 <div class="col-md"> <!--col tax-->
				 	<label for="tax">Taxa</label>
				 	<input type="number" class="form-control form-control-sm" step="0.01" name="tax" id="tax" value="<?php echo htmlspecialchars( $value1["checkTax"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" required>
				</div> <!--end col tax-->
				<div class="col-md"> <!--col days-->
				 	<label for="days">Tot.Dias</label>
				 	<input type="text" class="form-control form-control-sm" name="days" id="days" value="<?php echo htmlspecialchars( $value1["checkDays"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="calcJuros()" readonly required>
				</div> <!--end col days-->
				<div class="col-md"> <!--col interest-->
				 	<label for="interest">Juros</label>
				 	<input type="text" class="form-control form-control-sm" name="interest" id="interest" value="<?php echo htmlspecialchars( $value1["checkIntrst"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" readonly required>
				</div> <!--end col interest-->
				<div class="col-md"> <!--col liquid-->
				 	<label for="liquid">Líquido</label>
				 	<input type="text" class="form-control form-control-sm" name="liquid" id="liquid" value="<?php echo htmlspecialchars( $value1["checkLiquid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" readonly required>
				</div> <!--end col liquid-->
				<div class="col-md-1"> <!--col cod-->
				 	<label for="cod">Cód.Cheque</label>
				 	<input type="text" class="form-control form-control-sm" name="cod" id="cod" value="<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
				</div> <!--end col cod-->				 	
			</div><!--end row 2--><br>
			
			<div class="row"><!--row 3-->
				<div class="checkox mb-3 ml-lg-3"><!--col checkbox-->
					<label for="returned">
						<input type="checkBox" id="returned" name="returned" <?php if( $value1["checkReturned"] == 1 ){ ?>checked<?php } ?>></input>
						Devolvido
					</label>
				</div><!--end col checkbox-->
				<?php } ?>
				<div class="col-md-1"> <!--col submit-->
				 	<!--<input type="submit" value="Alterar" onclick="return calc()">-->
				 	<button type="submit" class="btn btn-success mb-lg-1" onclick="return calc()">Alterar</button>
				</div><!--end col submit-->
				<div class="col-md"> <!--col Cancel--> 	
				 	<a class="btn btn-primary" href="/bank_check">Cancelar</a>
				</div><!--end col Cancel-->
			</div><!--end row 3-->				 	
		</form><br><br>

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
	<script src="/resource/bank_check_updt.js"></script>
</html>