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
		
		<div class="d-flex">	   
		    <!-- Sidebar -->
		    <div class="bg-light border-right" id="sidebar-wrapper">
		      <div class="list-group list-group-flush">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios</a>
				<!--<a href="#" class="list-group-item list-group-item-action bg-light">Relatórios</a>-->
		        <!--<a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>-->
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="/bank_check/reports/paid_check_rp">Cheques À Vencer</a>
		          <a class="dropdown-item" href="#">Cheques Compensados</a>
		          <a class="dropdown-item" href="#">Cheques Devolvidos</a>
		          <!--<div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Algo mais aqui</a>-->
		        </div>
		      </div>
		    </div>
	  	</div>
	    <!-- /#sidebar-wrapper -->

		<div class="p-5 text-center">
			<h2 class="h2">Cadastro de Cheques</h2>
		</div>    

 		<form action="" method="post">
	 		<div class="row"><!--row 1-->
	 			
	 			<div class="col pr-lg-0"><!--col select-->
					<label for="selectBox">Cliente</label>
					<select class="form-control form-control-sm" id="selectBox" onchange="selectClient(this)" onclick="setIndex()" onblur="setIndex()">
						<option value="">Selecione</option>
						<?php $counter1=-1;  if( isset($Users) && ( is_array($Users) || $Users instanceof Traversable ) && sizeof($Users) ) foreach( $Users as $key1 => $value1 ){ $counter1++; ?>
						<option id="options" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
						<?php } ?>
					</select>
				</div> <!--end col select-->
				<div class="col-md-3 pl-lg-0 pt-lg-4 mt-lg-2"><!--col client-->
					<input type="hidden" id="idClient" name="idClient">	
					<input type="text" class="form-control form-control-sm text-capitalize" name="client" id="client" onkeypress="return false" required><br>
				</div> <!--col client-->
				<div class="col-md-1"> <!--col bank-->
				 	<label for="bank">Banco</label>
				 	<input type="text" class="form-control form-control-sm" name="bank" id="bank" maxlength="3" required>
				</div> <!--end col bank-->  
				<div class="col-md-1"> <!--col agency-->	
				 	<label for="agency">Agência</label>
				 	<input type="tel" class="form-control form-control-sm" name="agency" id="agency" maxlength="6" required>
				</div> <!--end col agency--> 	
				<div class="col"> <!--col account-->
				 	<label for="account">Conta</label>
				 	<input type="tel" class="form-control form-control-sm" name="account" id="account" maxlength="14" required=>	
				</div> <!--end col account-->
				<div class="col"> <!--col numchk-->		 	
				 	<label for="numchk">Nº Cheque</label>
				 	<input type="tel" class="form-control form-control-sm" name="numchk" id="numchk" maxlength="14" required>
			 	</div> <!--end col numchk-->
			 	<div class="col"> <!--col value-->
				 	<label for="value">Valor</label>
				 	<input type="number" class="form-control form-control-sm" step="0.01" name="value" id="value" onblur="formatMoeda(this)" required><br>
				</div> <!--end col value-->
			</div><!--end row 1-->
			
			<div class="row"><!--row 2-->
				<div class="col"> <!--col dtToday-->
				 	<label for="dtToday">Data</label>
				 	<input type="date" class="form-control form-control-sm" name="dtToday" id="dtToday" required>
				</div> <!--end col dtToday-->
				<div class="col-md-3"> <!--col issuer-->
				 	<label for="issuer">Emitente</label>
				 	<input type="text" class="form-control form-control-sm text-capitalize" name="issuer" id="issuer" maxlength="60" required>	
				</div> <!--end col issuer-->
				<div class="col"> <!--col dtDue-->
				 	<label for="dtDue">Venc.</label>
				 	<input type="date" class="form-control form-control-sm" name="dtDue" id="dtDue" onblur="difDates()" required>
				</div> <!--end col dtDue-->
				 <div class="col"> <!--col tax-->
				 	<label for="tax">Taxa</label>
				 	<input type="number" class="form-control form-control-sm" step="0.01" name="tax" id="tax" onblur="formatMoeda(this)" required>
				</div> <!--end col tax-->
				<div class="col"> <!--col days-->
				 	<label for="days">Tot.Dias</label>
				 	<input type="text" class="form-control form-control-sm" name="days" id="days" onblur="cJuros()" onkeypress="return false" required>
				 	<!--<input type="text" class="form-control form-control-sm" name="days" id="days" readonly required>	--> 	
				</div> <!--end col days-->
				<div class="col"> <!--col interest-->
				 	<label for="interest">Juros</label>
				 	<input type="text" class="form-control form-control-sm" name="interest" id="interest" onblur="formatMoeda(this)" onkeypress="return false" required>
				</div> <!--end col interest-->
				<div class="col"> <!--col liquid-->
				 	<label for="liquid">Líquido</label>
				 	<input type="text" class="form-control form-control-sm" name="liquid" id="liquid" onblur="formatMoeda(this)" onkeypress="return false" required>		 	
				</div> <!--end col liquid-->
			</div><!--end row 2-->	

			<div class="row pt-lg-4"><!--row 3-->
				<div class="col-2"> <!--col cod-->
				 	<label for="cod">Cód.Cheque</label>
				 	<input type="text" class="form-control form-control-sm" name="cod" id="cod" tabindex="-1" readonly>
				</div> <!--end col cod-->
				<div class="col-md-2"> <!--col submit-->
				 	<button type="submit" class="btn btn-success my-lg-4" onclick="return calc()">Salvar</button>
				</div><!--end col submit-->
			</div><!--end row 3-->
		</form>

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