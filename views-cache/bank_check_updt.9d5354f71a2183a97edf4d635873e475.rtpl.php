<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alfa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">	
 	<!--<link rel="stylesheet" type="text/css" href="/resource/bank_check_updt.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
	<h1>Alterar Cheques</h1>
</head>
<body>
	<div class="container">
		<div id="header">
			<a href="/logout" id="right">Logout</a>
			<ul>
				 <li><a href="/client">Clientes</a></li>
				 <li><a href="/calculation">Cálculo</a></li>
				<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
			</ul>
		</div>
		
 		<form action="" method="post">
 			<div class="row"><!--row 1-->

				<div class="col"><!--col select-->	
					<label for="selectBox">Cliente</label>
					<select class="form-control form-control-sm text-capitalize" id="selectBox" onchange="selectClient(this.value)" onclick="setIndex()" onblur="setIndex()">
						<option value="">Selecione o Cliente</option>
						<?php $counter1=-1;  if( isset($Users) && ( is_array($Users) || $Users instanceof Traversable ) && sizeof($Users) ) foreach( $Users as $key1 => $value1 ){ $counter1++; ?>
						<option id="options" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
						<?php } ?>
					</select>
				</div><!--end col select-->
				<div class="col-md-3 pl-lg-0 pt-lg-4 mt-lg-2"><!--col client-->
					<?php $counter1=-1;  if( isset($Update) && ( is_array($Update) || $Update instanceof Traversable ) && sizeof($Update) ) foreach( $Update as $key1 => $value1 ){ $counter1++; ?>
					<input type="hidden" id="idClient" name="idClient" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	

					<input type="text" class="form-control form-control-sm" name="client" id="client" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="return false" required>	
				</div> <!--col client-->
				<div class="col">
					<input class="form-control form-control-sm" type="checkBox" id="returned" name="returned" <?php if( $value1["checkReturned"] == 1 ){ ?>checked<?php } ?>>Devolvido</input>
					<!--<label for="returned">Devolvido</label>-->
				</div>
				<div class="col-md-1"> <!--col bank-->
				 	<label for="bank">Banco</label>
				 	<input type="text" name="bank" id="bank" value="<?php echo htmlspecialchars( $value1["checkBank"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div> <!--end col bank-->  
				<div class="col-md-1"> <!--col agency-->
				 	<label for="agency">Agência</label>
				 	<input type="tel" name="agency" id="agency" value="<?php echo htmlspecialchars( $value1["checkAgency"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div> <!--end col agency--> 	
				<div class="col"> <!--col account-->	
				 	<label for="account">Conta</label>
				 	<input type="tel" name="account" id="account" value="<?php echo htmlspecialchars( $value1["checkAccount"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>	 	
				</div> <!--end col account-->
				<div class="col"> <!--col numchk--> 			 	
				 	<label for="numchk">Nº Cheque</label>
				 	<input type="tel" name="numchk" id="numchk" value="<?php echo htmlspecialchars( $value1["checkNumChk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
				</div> <!--end col numchk-->
			 	<div class="col"> <!--col value--> 	
				 	<label for="value">Valor</label>
				 	<input type="number" step="0.01" name="value" id="value" value="<?php echo htmlspecialchars( $value1["checkValue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" maxlength="15" required><br>
				</div> <!--end col value-->
			</div><!--end row 1-->
				 	<label for="dtToday">Data</label>
				 	<input type="date" name="dtToday" id="dtToday" value="<?php echo htmlspecialchars( $value1["checkToday"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>

				 	<label for="issuer">Emitente</label>
				 	<input type="text" name="issuer" id="issuer" value="<?php echo htmlspecialchars( $value1["checkIssuer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>	

				 	<label for="dtDue">Venc.</label>
				 	<input type="date" name="dtDue" id="dtDue" value="<?php echo htmlspecialchars( $value1["checkDue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="difDates()" required>

				 	<label for="cod">Cód.Cheque</label>
				 	<input type="text" name="cod" id="cod" value="<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>

				 	<label for="tax">Taxa</label>
				 	<input type="number" step="0.01" name="tax" id="tax" value="<?php echo htmlspecialchars( $value1["checkTax"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" required>

				 	<label for="days">Tot.Dias</label>
				 	<input type="text" name="days" id="days" value="<?php echo htmlspecialchars( $value1["checkDays"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="calcJuros()" readonly required>

				 	<label for="interest">Juros</label>
				 	<input type="text" name="interest" id="interest" value="<?php echo htmlspecialchars( $value1["checkIntrst"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" readonly required>

				 	<label for="liquid">Líquido</label>
				 	<input type="text" name="liquid" id="liquid" value="<?php echo htmlspecialchars( $value1["checkLiquid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" readonly required>
				 	<?php } ?>

				 	<input type="submit" value="Alterar" onclick="return calc()">
				 	<a href="/bank_check">Cancelar</a>
		 	</div>
		</form>
	</div>		
</body>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS --> 
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script> 
	<script src="/resource/bank_check_updt.js"></script>
</html>