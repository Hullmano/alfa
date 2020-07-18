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
		<!--<tbody>
			<?php $counter1=-1;  if( isset($Usuario) && ( is_array($Usuario) || $Usuario instanceof Traversable ) && sizeof($Usuario) ) foreach( $Usuario as $key1 => $value1 ){ $counter1++; ?>
		 	<tr>
		 		<td><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		 	</tr>
		 	<?php } ?>
		</tbody> -->
		<select id="selectBox" onchange="selectClient(this.value)" onclick="setIndex()">
			<option value="">Selecione o Cliente</option>
			<?php $counter1=-1;  if( isset($Users) && ( is_array($Users) || $Users instanceof Traversable ) && sizeof($Users) ) foreach( $Users as $key1 => $value1 ){ $counter1++; ?>
			<option id="options" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
			<?php } ?>
		</select>
	</div>
	
	<div class="wrap">
 		<form action="" method="post">
			<?php $counter1=-1;  if( isset($Update) && ( is_array($Update) || $Update instanceof Traversable ) && sizeof($Update) ) foreach( $Update as $key1 => $value1 ){ $counter1++; ?>
			<label>Cliente</label>
			<input type="text" name="client" id="client" value="<?php echo htmlspecialchars( $value1["checkClient"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly><br>	

		 	<label for="bank">Banco</label>
		 	<input type="text" name="bank" id="bank" value="<?php echo htmlspecialchars( $value1["checkBank"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		 	
		 	<label for="agency">Agência</label>
		 	<input type="tel" name="agency" id="agency" value="<?php echo htmlspecialchars( $value1["checkAgency"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		 	
		 	<label for="account">Conta</label>
		 	<input type="tel" name="account" id="account" value="<?php echo htmlspecialchars( $value1["checkAccount"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	 	
		 			 	
		 	<label for="numchk">Nº Cheque</label>
		 	<input type="tel" name="numchk" id="numchk" value="<?php echo htmlspecialchars( $value1["checkNumChk"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		 	
		 	<label for="value">Valor</label>
		 	<input type="number" step="0.01" name="value" id="value" value="<?php echo htmlspecialchars( $value1["checkValue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onblur="formatMoeda(this)" required="required" maxlength="15"><br>

		 	<label for="dtToday">Data</label>
		 	<input type="date" name="dtToday" id="dtToday" value="<?php echo htmlspecialchars( $value1["checkToday"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="issuer">Emitente</label>
		 	<input type="text" name="issuer" id="issuer" value="<?php echo htmlspecialchars( $value1["checkIssuer"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	

		 	<label for="dtDue">Venc.</label>
		 	<input type="date" name="dtDue" id="dtDue" value="<?php echo htmlspecialchars( $value1["checkDue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="cod">Cód.Cheque</label>
		 	<input type="text" name="cod" id="cod" value="<?php echo htmlspecialchars( $value1["checkId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>

		 	<label for="tax">Taxa</label>
		 	<input type="number" step="0.01" name="tax" id="tax" value="<?php echo htmlspecialchars( $value1["checkTax"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="days">Tot.Dias</label>
		 	<input type="text" name="days" id="days" value="<?php echo htmlspecialchars( $value1["checkDays"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="interest">Juros</label>
		 	<input type="text" name="interest" id="interest" value="<?php echo htmlspecialchars( $value1["checkIntrst"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

		 	<label for="liquid">Líquido</label>
		 	<input type="text" name="liquid" id="liquid" value="<?php echo htmlspecialchars( $value1["checkLiquid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		 	<?php } ?>

		 	<input type="submit" value="Alterar">
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
		width: 658px;
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
  		document.getElementById('client').value = $value;
  		//alert($value);
	}

	function setIndex(){
		document.getElementById('selectBox').value = "";
	}
</script>
</html>