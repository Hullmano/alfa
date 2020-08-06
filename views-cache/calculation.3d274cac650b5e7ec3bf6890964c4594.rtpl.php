<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<title>Project 01</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" type="text/css" href="resource/css/style.css"> -->
	<!-- <link rel="stylesheet" type="text/css" url="hullmano.github.io/css/style.css"> -->
	<!--<spring:url value="alfa/resource/css/1.css" type="text/css"></spring:url>-->
	<h1>Cálculo</h1>
</head>
<body onload="dateToday()">
 	<div>
 		<a href="/alfa/logout" id="right">Logout</a> 		
 		<ul>
 			 <!-- <li><a href="">Cálculo</a></li> -->
 			<li><a href="/alfa/client">Clientes</a></li>
 			<li><a href="/alfa/bank_check">Cheques </a></li>
 		</ul>
 	</div>	

	<div class="wrap">
		<div class="linha">
			<label for="valChq">Informe o Valor do Cheque:</label>
			<input type="number" step="0.01" id="valChq" placeholder="Valor do Cheque!" onblur="formatMoeda(this)" required="required" maxlength="15"> <br>
			<label>Informe a Data Base e o Vencimento:</label> <br>
			<input type="date" id="dtBase"></input>
			<input type="date" id="dtVenc"></input> <br>
			<!-- <input type="tel" id="valPrazo" placeholder="Prazo do Cheque. Somente Números" required="required" maxlength="15" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" onblur="checkNumber(this.value)"> <br>	 -->
			<label>Informe o Valor da Taxa:</label>     <!--Para add espaços: &nbsp; &ensp; &emsp-->
			<input type="tel" id="valTx" placeholder="Valor da Taxa!" onblur="formatMoeda(this)" required="required" maxlength="15" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$"> <br>			
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
</body>



<style type="text/css">
	@media screen and (min-width: 330px) and (max-width: 568px)
{
     .wrap{width:100%;}
     .wrap{margin:0;}
     .wrap{padding:0;}
     .wrap input[type=tel]{width: 100%;}
     .wrap input[type=tel]{font-size: 16px;}
     .wrap input[type=tel]{width: 100%;}
     .wrap input[type=tel]{font-size: 16px;}
     .wrap{font-size:19px;}


     .linha label{font-size: 16px;}
}

	.wrap{
		width: 320px;
		height: 100%;
		margin: 0 auto;
		padding: 0;
	}

	.wrap input[type=tel]{
		width: 98%;
		font-size: 16px;
	}

	.linha{
		width: 320px;
	}

	.col{
		float: left;
	}


	.col1{
		width: 28%;
	}
	.col2{
		width: 16%;
	}
	.col3{
		width: 28%;
	}
	.col4{
		width: 28%;
	}
	.cRed{
		color: red;
	}	

	#right{
		float: right;
	}

	ul {
		list-style: none;
		font-size: 18px;
	}
	li {
		display: inline;
		padding-right: 10px;
	}
	a {
		text-decoration: none;	
	}	
</style>

<script type="text/javascript">
	function formatMoeda(btn){                  //Formata o valor para Moeda.
		if (!btn.value){						//Verifica se value está vazio.
		} else {
			var valor = btn.value.replace(',','.'); //o parseFloat só considera decimal com ponto e nao com virgula
			var novoValor = parseFloat(valor).toFixed(2);
			btn.value = novoValor; 
		}	
	}

	function calcular(){
		var valChq   = document.getElementById('valChq').value;
		//var valPrazo = document.getElementById('valPrazo').value;		
		var valPrazo = difDates();
		var valTx    = document.getElementById('valTx').value;
		var valJuros = ((parseFloat(valChq) * parseFloat(valTx/100)) /30) * parseFloat(valPrazo);
		var liquid   = (parseFloat(valChq) - ((parseFloat(valChq) * parseFloat(valTx/100)) /30) * parseFloat(valPrazo));
		//Imprime os valores nos labels
		if(document.getElementById('valBruto1').innerHTML == '.'){
			document.getElementById('valBruto1').innerHTML = valChq;
			document.getElementById('valPrazo1').innerHTML = valPrazo;
			document.getElementById('valJuros1').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui1').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = document.getElementById('valBruto1').innerHTML;
			document.getElementById('totPrazo').innerHTML = document.getElementById('valPrazo1').innerHTML;
			document.getElementById('totJuros').innerHTML = document.getElementById('valJuros1').innerHTML;
			document.getElementById('totLiqui').innerHTML = document.getElementById('valLiqui1').innerHTML;

		} else if(document.getElementById('valBruto2').innerHTML == '.'){
			document.getElementById('valBruto2').innerHTML = valChq;
			document.getElementById('valPrazo2').innerHTML = valPrazo;
			document.getElementById('valJuros2').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui2').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto2').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat(document.getElementById('totPrazo').innerHTML) + parseFloat(document.getElementById('valPrazo2').innerHTML))/2).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros2').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui2').innerHTML)).toFixed(2);								

		} else if(document.getElementById('valBruto3').innerHTML == '.'){
			document.getElementById('valBruto3').innerHTML = valChq;
			document.getElementById('valPrazo3').innerHTML = valPrazo;
			document.getElementById('valJuros3').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui3').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto3').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat((document.getElementById('totPrazo').innerHTML)*2) + parseFloat(document.getElementById('valPrazo3').innerHTML))/3).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros3').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui3').innerHTML)).toFixed(2);

		} else if(document.getElementById('valBruto4').innerHTML == '.'){
			document.getElementById('valBruto4').innerHTML = valChq;
			document.getElementById('valPrazo4').innerHTML = valPrazo;
			document.getElementById('valJuros4').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui4').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto4').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat((document.getElementById('totPrazo').innerHTML)*3) + parseFloat(document.getElementById('valPrazo4').innerHTML))/4).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros4').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui4').innerHTML)).toFixed(2);

		} else if(document.getElementById('valBruto5').innerHTML == '.'){
			document.getElementById('valBruto5').innerHTML = valChq;
			document.getElementById('valPrazo5').innerHTML = valPrazo;
			document.getElementById('valJuros5').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui5').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto5').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat((document.getElementById('totPrazo').innerHTML)*4) + parseFloat(document.getElementById('valPrazo5').innerHTML))/5).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros5').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui5').innerHTML)).toFixed(2);

		} else if(document.getElementById('valBruto6').innerHTML == '.'){
			document.getElementById('valBruto6').innerHTML = valChq;
			document.getElementById('valPrazo6').innerHTML = valPrazo;
			document.getElementById('valJuros6').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui6').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto6').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat((document.getElementById('totPrazo').innerHTML)*5) + parseFloat(document.getElementById('valPrazo6').innerHTML))/6).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros6').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui6').innerHTML)).toFixed(2);

		} else if(document.getElementById('valBruto7').innerHTML == '.'){
			document.getElementById('valBruto7').innerHTML = valChq;
			document.getElementById('valPrazo7').innerHTML = valPrazo;
			document.getElementById('valJuros7').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui7').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto7').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat((document.getElementById('totPrazo').innerHTML)*6) + parseFloat(document.getElementById('valPrazo7').innerHTML))/7).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros7').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui7').innerHTML)).toFixed(2);

		} else if(document.getElementById('valBruto8').innerHTML == '.'){
			document.getElementById('valBruto8').innerHTML = valChq;
			document.getElementById('valPrazo8').innerHTML = valPrazo;
			document.getElementById('valJuros8').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui8').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto8').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat((document.getElementById('totPrazo').innerHTML)*7) + parseFloat(document.getElementById('valPrazo8').innerHTML))/8).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros8').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui8').innerHTML)).toFixed(2);

		} else if(document.getElementById('valBruto9').innerHTML == '.'){
			document.getElementById('valBruto9').innerHTML = valChq;
			document.getElementById('valPrazo9').innerHTML = valPrazo;
			document.getElementById('valJuros9').innerHTML = valJuros.toFixed(2);
			document.getElementById('valLiqui9').innerHTML = liquid.toFixed(2);
			//Mostra a soma dos valores
			document.getElementById('totBruto').innerHTML = (parseFloat(document.getElementById('totBruto').innerHTML) + parseFloat(document.getElementById('valBruto9').innerHTML)).toFixed(2);
			document.getElementById('totPrazo').innerHTML = ((parseFloat((document.getElementById('totPrazo').innerHTML)*8) + parseFloat(document.getElementById('valPrazo9').innerHTML))/9).toFixed(1);
			document.getElementById('totJuros').innerHTML = (parseFloat(document.getElementById('totJuros').innerHTML) + parseFloat(document.getElementById('valJuros9').innerHTML)).toFixed(2);
			document.getElementById('totLiqui').innerHTML = (parseFloat(document.getElementById('totLiqui').innerHTML) + parseFloat(document.getElementById('valLiqui9').innerHTML)).toFixed(2);	

		}
	}
	
	function limpar(){
		document.getElementById('valChq').value     = "";
		document.getElementById('valTx').value      = "";
		dateToday();
		
		document.getElementById('valBruto1').innerHTML = ".";
		document.getElementById('valPrazo1').innerHTML = ".";
		document.getElementById('valJuros1').innerHTML = ".";
		document.getElementById('valLiqui1').innerHTML = ".";

		document.getElementById('valBruto2').innerHTML = ".";
		document.getElementById('valPrazo2').innerHTML = ".";
		document.getElementById('valJuros2').innerHTML = ".";
		document.getElementById('valLiqui2').innerHTML = ".";

		document.getElementById('valBruto3').innerHTML = ".";
		document.getElementById('valPrazo3').innerHTML = ".";
		document.getElementById('valJuros3').innerHTML = ".";
		document.getElementById('valLiqui3').innerHTML = ".";

		document.getElementById('valBruto4').innerHTML = ".";
		document.getElementById('valPrazo4').innerHTML = ".";
		document.getElementById('valJuros4').innerHTML = ".";
		document.getElementById('valLiqui4').innerHTML = ".";

		document.getElementById('valBruto5').innerHTML = ".";
		document.getElementById('valPrazo5').innerHTML = ".";
		document.getElementById('valJuros5').innerHTML = ".";
		document.getElementById('valLiqui5').innerHTML = ".";

		document.getElementById('valBruto6').innerHTML = ".";
		document.getElementById('valPrazo6').innerHTML = ".";
		document.getElementById('valJuros6').innerHTML = ".";
		document.getElementById('valLiqui6').innerHTML = ".";

		document.getElementById('valBruto7').innerHTML = ".";
		document.getElementById('valPrazo7').innerHTML = ".";
		document.getElementById('valJuros7').innerHTML = ".";
		document.getElementById('valLiqui7').innerHTML = ".";

		document.getElementById('valBruto8').innerHTML = ".";
		document.getElementById('valPrazo8').innerHTML = ".";
		document.getElementById('valJuros8').innerHTML = ".";
		document.getElementById('valLiqui8').innerHTML = ".";

		document.getElementById('valBruto9').innerHTML = ".";
		document.getElementById('valPrazo9').innerHTML = ".";
		document.getElementById('valJuros9').innerHTML = ".";
		document.getElementById('valLiqui9').innerHTML = ".";

		document.getElementById('totBruto').innerHTML = ".";
		document.getElementById('totPrazo').innerHTML = ".";
		document.getElementById('totJuros').innerHTML = ".";
		document.getElementById('totLiqui').innerHTML = ".";		
	}

	function dateToday(dBase = new Date()){
		var dia = dBase.getDate();
		var mes = dBase.getMonth()+1;
		var ano = dBase.getFullYear();

		if (dia.toString().length == 1){
			dia = '0' + dia;
		}
		if (mes.toString().length == 1){
			mes = '0' + mes;
		}		

		//return ano + '-' + mes + '-' + ano;
		var diaAtual = ano + '-' + mes + '-' + dia;
		
		document.getElementById('dtBase').value = diaAtual;
		document.getElementById('dtVenc').value = diaAtual;
	}

	function difDates(){
		var base = document.getElementById('dtBase').value;
		var venc = document.getElementById('dtVenc').value;
		base = new Date(base);
		venc = new Date(venc);
		var dif = Math.abs(base.getTime() - venc.getTime());
		var totDias = Math.ceil(dif / (1000 * 60 * 60 * 24));

		return totDias;
	}

	/*function checkNumber(num){         Função para checar se foi digitado somente núm.
		if (num.match(/^[0-9]+$/)){
		} else {
			alert('Digite Somente Números(Sem Ponto/Vírgula).');
		}
	} */
</script>
</html>