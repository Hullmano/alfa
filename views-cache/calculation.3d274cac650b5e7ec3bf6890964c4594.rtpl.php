<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Project 01</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">	
 	<!--<link rel="stylesheet" type="text/css" href="resource/calculation.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
</head>
<body onload="dateToday()">
 	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="/client">Clientes</a>
			<a class="navbar-brand" href="/bank_check">Cheques</a>
			<a class="navbar-brand ml-auto" href="/logout">Logout</a>
		</nav>
		<div class="p-5 text-center">
			<h2>Cálculos</h2>
		</div>
	
		<div class="row justify-content-md-center">
			<div class="col-md-4"><!--end row-->
				<label for="valChq">Informe o Valor do Cheque:</label> 
				<input type="number" class="form-control form-control-sm" step="0.01" id="valChq" placeholder="Valor do Cheque!" onblur="formatMoeda(this)" required autofocus>
			</div><!--end col-md-4-->	
		</div><!--end row 1-->			
		<div class="row justify-content-md-center"><!--row dates-->
			<div class="col-md-2"><!--col date 1-->
				<label>Data Base</label>
				<input type="date" class="form-control form-control-sm" id="dtBase"></input>
			</div><!--end row date 1-->	
			<div class="col-md-2"><!--col date 2-->	
				<label>Data Vencimento</label>			
				<input type="date" class="form-control form-control-sm" id="dtVenc"></input> 
			</div><!--end row date 2-->	
		</div><!--end row dates-->
		<div class="row justify-content-md-center">
			<div class="col-md-4">
				<label>Valor da Taxa</label>
				<input type="number" class="form-control form-control-sm" step="0.01" id="valTx" placeholder="Valor da Taxa!" onblur="formatMoeda(this)"><br> 		
				<button type="submit" class="btn btn-success my-lg-4" onclick="calcular()">Calcular</button>
				<button type="submit" class="btn btn-secondary my-lg-4" onclick="limpar()">Limpar</button>
			</div><!--end col-md-4-->
		</div><br>

		<div class="row justify-content-md-center">
			<div class="col-md-8 mx-auto">
				<div class="row justify-content-md-center">
					<!--Cabeçalhos-->
					<div class="col"><!--col 1-->
						<label>V. Bruto</label><br>
						<label id="valBruto1">.</label><br>
						<label id="valBruto2">.</label><br>
						<label id="valBruto3">.</label><br>
						<label id="valBruto4">.</label><br>
						<label id="valBruto5">.</label><br>
						<label id="valBruto6">.</label><br>
						<label id="valBruto7">.</label><br>
						<label id="valBruto8">.</label><br>
						<label id="valBruto9">.</label><br>
						<label><strong>T.Bruto</strong></label><br>
						<label id="totBruto">.</label>
					</div> <!--end col 1-->	

					<div class="col"><!--col 2-->
						<label>Prazo</label><br>
						<label id="valPrazo1">.</label><br>
						<label id="valPrazo2">.</label><br>
						<label id="valPrazo3">.</label><br>
						<label id="valPrazo4">.</label><br>
						<label id="valPrazo5">.</label><br>
						<label id="valPrazo6">.</label><br>
						<label id="valPrazo7">.</label><br>
						<label id="valPrazo8">.</label><br>
						<label id="valPrazo9">.</label><br>
						<label><strong>P.Méd</strong></label><br>
						<label id="totPrazo">.</label>
					</div> <!--end col 2-->

					<div class="col"><!--col 3-->
						<label>V. Juros</label><br>
						<label id="valJuros1">.</label><br>
						<label id="valJuros2">.</label><br>
						<label id="valJuros3">.</label><br>
						<label id="valJuros4">.</label><br>
						<label id="valJuros5">.</label><br>
						<label id="valJuros6">.</label><br>
						<label id="valJuros7">.</label><br>
						<label id="valJuros8">.</label><br>
						<label id="valJuros9">.</label><br>
						<label><strong>T.Juros</strong></label><br>
						<label id="totJuros">.</label>
					</div> <!--end col 3-->

					<div class="col"><!--col 4-->
						<label>V. Líqui</label> <br>
						<label id="valLiqui1">.</label><br>
						<label id="valLiqui2">.</label><br>
						<label id="valLiqui3">.</label><br>
						<label id="valLiqui4">.</label><br>
						<label id="valLiqui5">.</label><br>
						<label id="valLiqui6">.</label><br>
						<label id="valLiqui7">.</label><br>
						<label id="valLiqui8">.</label><br>
						<label id="valLiqui9">.</label><br>
						<label><strong>T.Líqui</strong></label><br>
						<label id="totLiqui">.</label>
					</div> <!--end col 4-->
				</div><!--end row 1-->
			</div><!--end col-dm-10-->
		</div><!--end row 2--><br><br>

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
	<script src="resource/calculation.js"></script>

</html>