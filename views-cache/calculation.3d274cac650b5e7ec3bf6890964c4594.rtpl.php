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
			<h2>Cálculo</h2>
		</div>
	
		<div class="row"></div><!--end row-->
			<div class="linha">
				<label for="valChq">Informe o Valor do Cheque:</label> 
				<input type="number" step="0.01" id="valChq" placeholder="Valor do Cheque!" onblur="formatMoeda(this)" required maxlength="15" autofocus> <br>
				<label>Informe a Data Base e o Vencimento:</label> <br>
				<input type="date" id="dtBase"></input>
				<input type="date" id="dtVenc"></input> <br>
				<!-- <input type="tel" id="valPrazo" placeholder="Prazo do Cheque. Somente Números" required="required" maxlength="15" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" onblur="checkNumber(this.value)"> <br>	 -->
				<label>Informe o Valor da Taxa:</label>  <!--Para add espaços: &nbsp; &ensp; &emsp-->
				<input type="number" step="0.01" id="valTx" placeholder="Valor da Taxa!" onblur="formatMoeda(this)" required maxlength="15" autofocus> <br>		
				<input type="submit" value="Calcular" onclick="calcular()"></input>
				<input type="submit" value="Limpar" onclick="limpar()"></input> <br>

			</div>

			<div class="linha">
				<!--Cabeçalhos-->
				<label class="lblTitVals col col1">Valor Bruto</label>
				<label class="lblTitVals col col2">Prazo </label>
				<label class="lblTitVals col col3">Valor Juros</label>
				<label class="lblTitVals col col4">Val Líquido</label> <br>
				<!--1º Linha-->
				<label class="col col1" id="valBruto1">.</label>
				<label class="col col2" id="valPrazo1">.</label>
				<label class="col col3" id="valJuros1">.</label>
				<label class="col col4" id="valLiqui1">.</label>
				<!--2º Linha-->
				<label class="col col1" id="valBruto2">.</label>
				<label class="col col2" id="valPrazo2">.</label>
				<label class="col col3" id="valJuros2">.</label>
				<label class="col col4" id="valLiqui2">.</label>
				<!--3º Linha-->
				<label class="col col1" id="valBruto3">.</label>
				<label class="col col2" id="valPrazo3">.</label>
				<label class="col col3" id="valJuros3">.</label>
				<label class="col col4" id="valLiqui3">.</label>
				<!--4º Linha-->
				<label class="col col1" id="valBruto4">.</label>
				<label class="col col2" id="valPrazo4">.</label>
				<label class="col col3" id="valJuros4">.</label>
				<label class="col col4" id="valLiqui4">.</label>
				<!--5º Linha-->
				<label class="col col1" id="valBruto5">.</label>
				<label class="col col2" id="valPrazo5">.</label>
				<label class="col col3" id="valJuros5">.</label>
				<label class="col col4" id="valLiqui5">.</label>
				<!--6º Linha-->
				<label class="col col1" id="valBruto6">.</label>
				<label class="col col2" id="valPrazo6">.</label>
				<label class="col col3" id="valJuros6">.</label>
				<label class="col col4" id="valLiqui6">.</label>
				<!--7º Linha-->
				<label class="col col1" id="valBruto7">.</label>
				<label class="col col2" id="valPrazo7">.</label>
				<label class="col col3" id="valJuros7">.</label>
				<label class="col col4" id="valLiqui7">.</label>
				<!--8º Linha-->
				<label class="col col1" id="valBruto8">.</label>
				<label class="col col2" id="valPrazo8">.</label>
				<label class="col col3" id="valJuros8">.</label>
				<label class="col col4" id="valLiqui8">.</label>
				<!--9º Linha-->
				<label class="col col1" id="valBruto9">.</label>
				<label class="col col2" id="valPrazo9">.</label>
				<label class="col col3" id="valJuros9">.</label>
				<label class="col col4" id="valLiqui9">.</label>
				<!--Total-->
				<label class="col col1 cRed">T.Bruto</label>
				<label class="col col2 cRed">P.Méd</label>
				<label class="col col3 cRed">T.Juros</label>
				<label class="col col4 cRed">T.Líqui</label>

				<label class="col col1" id="totBruto">.</label>
				<label class="col col2" id="totPrazo">.</label>
				<label class="col col3" id="totJuros">.</label>
				<label class="col col4" id="totLiqui">.</label>
			</div>
		</div>
	</div><!--end container-->
</body>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS --> 
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script> 
	<script src="resource/calculation.js"></script>

</html>