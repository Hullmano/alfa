<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<title>Alfa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<h1>Cadastro de Cheques</h1>
</head>
<body onload="Today()">
	<div id="header">
		<a href="/alfa/logout" id="right">Logout</a>
		<ul>
			 <li><a href="/alfa/client">Clientes</a></li>
			 <li><a href="/alfa/calculation">Cálculo</a></li>
			<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
		</ul>
		<!--<tbody>
			<?php $counter1=-1;  if( isset($Usuario) && ( is_array($Usuario) || $Usuario instanceof Traversable ) && sizeof($Usuario) ) foreach( $Usuario as $key1 => $value1 ){ $counter1++; ?>
		 	<tr>
		 		<td><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		 	</tr>
		 	<?php } ?>
		</tbody> -->
	</div>
	
	<div class="wrap">
 		<form action="" method="post">

			<select id="selectBox" onchange="selectClient(this.value)" onclick="setIndex()">
				<option value="">Cliente</option>
				<?php $counter1=-1;  if( isset($Users) && ( is_array($Users) || $Users instanceof Traversable ) && sizeof($Users) ) foreach( $Users as $key1 => $value1 ){ $counter1++; ?>
				<option id="options" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
				<?php } ?>
			</select>

			<!--<label>Cliente</label>-->
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
		 	<input type="number" step="0.01" name="value" id="value" onblur="formatMoeda(this)" required maxlength="15"><br>

		 	<label for="dtToday">Data</label>
		 	<input type="date" name="dtToday" id="dtToday" required>

		 	<label for="issuer">Emitente</label>
		 	<input type="text" name="issuer" id="issuer" required>	

		 	<label for="dtDue">Venc.</label>
		 	<input type="date" name="dtDue" id="dtDue" required onblur="difDates()">

		 	<label for="cod">Cód.Cheque</label>
		 	<input type="text" name="cod" id="cod" tabindex="-1" readonly>

		 	<label for="tax">Taxa</label>
		 	<input type="number" step="0.01" name="tax" id="tax" onblur="formatMoeda(this)" required>

		 	<label for="days">Tot.Dias</label>
		 	<input type="text" name="days" id="days" onblur="calcJuros()" required readonly>

		 	<label for="interest">Juros</label>
		 	<input type="text" name="interest" id="interest" onblur="formatMoeda(this)" required readonly>

		 	<label for="liquid">Líquido</label>
		 	<input type="text" name="liquid" id="liquid" onblur="formatMoeda(this)" required readonly>		 			 			 	 		 	

		 	<input type="submit" value="Salvar">
		</form>
	</div>

	<div class="data">
		<table border="1px" cellpadding="5px" cellspacing="0">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Id</th>
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
				</tr>	
			</thead>
			<tbody>
				<?php $counter1=-1;  if( isset($Data) && ( is_array($Data) || $Data instanceof Traversable ) && sizeof($Data) ) foreach( $Data as $key1 => $value1 ){ $counter1++; ?>
				<tr>
					<td style="text-transform: capitalize" id="tdClient"><?php echo htmlspecialchars( $value1["checkClient"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					<td id="tdId"><?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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
					<td>
						<!--<a href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/edit" onclick="update()">Editar</a>-->
						<a href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update">Editar</a>
						<a href="bank_check/<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete">Excluir</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

<style type="text/css">
	.wrap {
		width: 720px;
		height: 100%;
		margin: 100px auto;
		padding: 0;
		line-height: 30px;
	}

	#right{
		float: right;
	}
	#client {
		width: 604px;
	}
	#bank, #days {
		width: 40px;
	}
	#tax {
		width: 48px;
	}
	#agency, #cod{
		width: 60px;
	}
	#account, #numchk {
		width: 90px;
	}
	#value{
		width: 125px;
	}
	#interest{
		width: 120px;
	}
	#liquid{
		width: 124px;
	} 
	#issuer {
		width: 304px;
		text-transform: capitalize;
	}
	#selectBox {
		width: 100px;
		font-size: 14px;
	}
	#tdClient, #tdIssuer {
		max-width: 200px;
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
	input[type=text],[type=tel], option {
		text-transform: capitalize;		
	}
	input[type=date] {
		width: 125px;
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
	
	function Today(dBase = new Date()){
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

		document.getElementById('dtToday').value = diaAtual;
		document.getElementById('dtDue').value = diaAtual;
	}

	function selectClient($value){
  		document.getElementById('client').value = $value;
  		//alert($value);
	}

	function setIndex(){
		document.getElementById('selectBox').value = "";
	}
	
	function difDates(){
		var base = document.getElementById('dtToday').value;
		var venc = document.getElementById('dtDue').value;
		base = new Date(base);
		venc = new Date(venc);
		var dif = Math.abs(base.getTime() - venc.getTime());
		var totDias = Math.ceil(dif / (1000 * 60 * 60 * 24));

		document.getElementById('days').value = totDias;
	}

	function calcJuros(){
		var valChq   = document.getElementById('value').value;
		var valPrazo = document.getElementById('days').value;
		var valTx    = document.getElementById('tax').value;
		var valJuros = ((parseFloat(valChq) * parseFloat(valTx/100)) /30) * parseFloat(valPrazo);
		var liquid   = (parseFloat(valChq) - ((parseFloat(valChq) * parseFloat(valTx/100)) /30) * parseFloat(valPrazo));

		if (document.getElementById('value').value == ''  || document.getElementById('tax').value == '') {
			alert('Para o Correto Cálculo, os Campos: Valor, Vencimento e Taxa Devem Ser Preenchidos!');

		} else {
			document.getElementById('interest').value = valJuros;
			document.getElementById('liquid').value = liquid;
		}
	}
	
	function formatMoeda(btn){                  //Formata o valor para Moeda.
		if (!btn.value){						//Verifica se value está vazio.
		} else {
			var valor = btn.value.replace(',','.'); //o parseFloat só considera decimal com ponto e nao com virgula
			var novoValor = parseFloat(valor).toFixed(2);
			btn.value = novoValor; 
		}	
	}

</script>
</html>