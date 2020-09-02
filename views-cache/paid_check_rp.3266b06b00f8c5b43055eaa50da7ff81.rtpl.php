<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">
 	<!--<link rel="stylesheet" type="text/css" href="/resource/bank_check.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
</head>
<body onload="Today()">
	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="/client">Clientes</a>
			<a class="navbar-brand" href="/calculation">Cálculos</a>
			<a class="navbar-brand ml-auto" href="/logout">Logout</a>
		</nav>
		
		<div class="p-5 text-center">
			<h2 class="h2">Relatório de Cheques Compensados</h2>
		</div>    

		<div class="table-responsive-sm table-striped text-capitalize">
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
						<td id="tdClient" style="font-size: 13px;"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdBank"><?php echo htmlspecialchars( $value1["checkBank"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdAgency"><?php echo htmlspecialchars( $value1["checkAgency"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdAccount"><?php echo htmlspecialchars( $value1["checkAccount"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdNumChk"><?php echo htmlspecialchars( $value1["checkNumChk"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdValue"><?php echo htmlspecialchars( $value1["checkValue"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdToday" style="font-size: 14px;"><?php echo htmlspecialchars( $value1["checkToday"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td id="tdIssuer" style="font-size: 14px;"><?php echo htmlspecialchars( $value1["checkIssuer"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td style="font-size: 14px;"><?php echo htmlspecialchars( $value1["checkDue"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["checkDays"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["checkTax"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["checkIntrst"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["checkLiquid"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php if( $value1["checkReturned"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
						<td>
							<a class="badge badge-success badge-pill" href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update">Editar</a>
							
							<a class="badge badge-danger badge-pill" href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')"><i class="fa fa-trash"></i> Excluir</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS --> 
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script> 
	<script src="/resource/bank_check.js"></script>
</html>