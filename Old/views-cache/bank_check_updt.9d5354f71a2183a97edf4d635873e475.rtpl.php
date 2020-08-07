<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<title>Alfa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<h1>Alterar Cheques</h1>
</head>
<body>
	<div id="header">
		<a href="/alfa/logout" id="right">Logout</a>
		<ul>
			 <li><a href="/alfa/client">Clientes</a></li>
			 <li><a href="/alfa/calculation">Cálculo</a></li>
			<!-- <li><a href="/alfa/bank_check">Cadastro</a></li> -->
		</ul>
	</div>
	
	<div class="wrap">
 		<form action="" method="post">

			<select id="selectBox" onchange="selectClient(this.value)" onclick="setIndex()" onblur="setIndex()">
				<option value="">Selecione o Cliente</option>
				<?php $counter1=-1;  if( isset($Users) && ( is_array($Users) || $Users instanceof Traversable ) && sizeof($Users) ) foreach( $Users as $key1 => $value1 ){ $counter1++; ?>
				<option id="options" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
				<?php } ?>
			</select>

			<?php $counter1=-1;  if( isset($Update) && ( is_array($Update) || $Update instanceof Traversable ) && sizeof($Update) ) foreach( $Update as $key1 => $value1 ){ $counter1++; ?>
			<input type="hidden" id="idClient" name="idClient" value="<?php echo htmlspecialchars( $value1["clientId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	

			<input type="text" name="client" id="client" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onkeypress="return false" required>	

			<input type="checkBox" id="returned" name="returned" <?php if( $value1["checkReturned"] == 1 ){ ?>checked<?php } ?>>Devolvido</input>
			<!--<label for="returned">Devolvido</label>-->

		 	<label for="bank">Banco</label>
		 	<input type="text" name="bank" id="bank" value="<?php echo htmlspecialchars( $value1["checkBank"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
		 	
		 	<label for="agency">Agência</label>
		 	<input type="tel" name="agency" id="agency" value="<?php echo htmlspecialchars( $value1["checkAgency"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
		 	
		 	<label for="account">Conta</label>
		 	<input type="tel" name="account" id="account" value="<?php echo htmlspecialchars( $value1["checkAccount"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>	 	
		 			 	
		 	<label for="numchk">Nº Cheque</label>
		 	<input type="tel" name="numchk" id="numchk" value="<?php echo htmlspecialchars( $value1["checkNumChk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
		 	
		 	<label for="value">Valor</label>
		 	<input type="number" step="0.01" name="value" id="value" value="<?php echo htmlspecialchars( $value1["checkValue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" maxlength="15" required><br>

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
		 	<a href="/alfa/bank_check">Cancelar</a>


		</form>
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
		width: 508px;
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
	#selectBox {
		width: 100px;
		font-size: 14px;
	}
	#issuer {
		width: 304px;
		text-transform: capitalize;
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

	function selectClient($value){
  		//document.getElementById('client').value = $value;
  		var select = document.getElementById('selectBox');
  		document.getElementById('idClient').value = select.options[select.selectedIndex].value;
		document.getElementById('client').value = select.options[select.selectedIndex].text;
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

		if (document.getElementById('value').value == '' || document.getElementById('tax').value == '') {
			alert('Para o Correto Cálculo, os Campos: Valor, Vencimento e Taxa Devem Ser Preenchidos!');

		} else {
			document.getElementById('interest').value = valJuros;
			document.getElementById('liquid').value = liquid;
		}
	}
	
	function calc(){
		var base = document.getElementById('dtToday').value;
		var venc = document.getElementById('dtDue').value;
		base = new Date(base);
		venc = new Date(venc);
		var dif = Math.abs(base.getTime() - venc.getTime());
		var totDias = Math.ceil(dif / (1000 * 60 * 60 * 24));

		document.getElementById('days').value = totDias;


		var valChq   = document.getElementById('value').value;
		var valPrazo = document.getElementById('days').value;
		var valTx    = document.getElementById('tax').value;
		var valJuros = ((parseFloat(valChq) * parseFloat(valTx/100)) /30) * parseFloat(valPrazo);
		var liquid   = (parseFloat(valChq) - ((parseFloat(valChq) * parseFloat(valTx/100)) /30) * parseFloat(valPrazo));

		if (document.getElementById('value').value == '' || document.getElementById('tax').value == '') {
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