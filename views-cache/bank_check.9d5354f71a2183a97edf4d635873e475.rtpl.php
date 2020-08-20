<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="/resource/bank_check.css">
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
	<title>Alfa</title>
	<h1>Cadastro de Cheques</h1>
</head>
<body onload="Today()">
	<div id="header">
		<a href="/logout" id="right">Logout</a>
		<ul>
			 <li><a href="/client">Clientes</a></li>
			 <li><a href="/calculation">Cálculo</a></li>
			<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
		</ul>
	</div>
	
	<div class="wrap">
 		<form action="" method="post">

			<select id="selectBox" onchange="selectClient(this)" onclick="setIndex()" onblur="setIndex()">
				<option value="">Cliente</option>
				<?php $counter1=-1;  if( isset($Users) && ( is_array($Users) || $Users instanceof Traversable ) && sizeof($Users) ) foreach( $Users as $key1 => $value1 ){ $counter1++; ?>
				<option id="options" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
				<?php } ?>
			</select>

		 	<input type="hidden" id="idClient" name="idClient">	

			<input type="text" name="client" id="client" onkeypress="return false" required><br>

		 	<label for="bank">Banco</label>
		 	<input type="text" name="bank" id="bank" required>
		 	
		 	<label for="agency">Agência</label>
		 	<input type="tel" name="agency" id="agency" required>
		 	
		 	<label for="account">Conta</label>
		 	<input type="tel" name="account" id="account" required=>	 	
		 			 	
		 	<label for="numchk">Nº Cheque</label>
		 	<input type="tel" name="numchk" id="numchk" required>
		 	
		 	<label for="value">Valor</label>
		 	<input type="number" step="0.01" name="value" id="value" onblur="formatMoeda(this)" maxlength="15" required><br>

		 	<label for="dtToday">Data</label>
		 	<input type="date" name="dtToday" id="dtToday" required>

		 	<label for="issuer">Emitente</label>
		 	<input type="text" name="issuer" id="issuer" required>	

		 	<label for="dtDue">Venc.</label>
		 	<input type="date" name="dtDue" id="dtDue" onblur="difDates()" required>

		 	<label for="cod">Cód.Cheque</label>
		 	<input type="text" name="cod" id="cod" tabindex="-1" readonly>

		 	<label for="tax">Taxa</label>
		 	<input type="number" step="0.01" name="tax" id="tax" onblur="formatMoeda(this)" required>

		 	<label for="days">Tot.Dias</label>
		 	<input type="text" name="days" id="days" onblur="calcJuros()" readonly required>

		 	<label for="interest">Juros</label>
		 	<input type="text" name="interest" id="interest" onblur="formatMoeda(this)" readonly required>

		 	<label for="liquid">Líquido</label>
		 	<input type="text" name="liquid" id="liquid" onblur="formatMoeda(this)" readonly required>		 	

		 	<input type="submit" onclick="return calc()" value="Salvar">
		</form>
	</div>

	<div class="data">
		<table border="1px" cellpadding="5px" cellspacing="0">
			<thead>
				<tr>
					<th>Cód.</th>
					<th>Cliente</th>
					<th>Banco</th>
					<th>Agência</th>
					<th>C/Corrente</th>
					<th>NºCheque</th>
					<th>Valor</th>
					<th>Dt.Base</th>
					<th>Emitente</th>
					<th>Vencim.</th>
					<th>Dias</th>
					<th>Taxa</th>
					<th>Juros</th>
					<th>Líquido</th>
					<th>Devol</th>
				</tr>	
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($Data) && ( is_array($Data) || $Data instanceof Traversable ) && sizeof($Data) ) foreach( $Data as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td id="tdId"><?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td style="text-transform: capitalize" id="tdClient"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdBank"><?php echo htmlspecialchars( $value1["checkBank"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdAgency"><?php echo htmlspecialchars( $value1["checkAgency"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdAccount"><?php echo htmlspecialchars( $value1["checkAccount"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdNumChk"><?php echo htmlspecialchars( $value1["checkNumChk"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdValue"><?php echo htmlspecialchars( $value1["checkValue"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdToday"><?php echo htmlspecialchars( $value1["checkToday"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdIssuer" style="text-transform: capitalize"><?php echo htmlspecialchars( $value1["checkIssuer"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["checkDue"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["checkDays"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["checkTax"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["checkIntrst"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php echo htmlspecialchars( $value1["checkLiquid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td><?php if( $value1["checkReturned"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
					<td>
						<!--<a href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/edit" onclick="update()">Editar</a>-->
						<a href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update">Editar</a>
						
						<a href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/resource/bank_check.js"></script>
</html>