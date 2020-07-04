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
		<select id="selectBox" onchange="selectClient(this.value)" onclick="setIndex()">
			<option value="">Selecione o Cliente</option>
			<?php $counter1=-1;  if( isset($Usuario) && ( is_array($Usuario) || $Usuario instanceof Traversable ) && sizeof($Usuario) ) foreach( $Usuario as $key1 => $value1 ){ $counter1++; ?>
			<option id="options" value="<?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["clientName"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="wrap">
 		<form action="" method="post">
			
			<label>Cliente:</label>
			<input type="text" name="client" id="client"><br>	

		 	<label for="bank">Banco</label>
		 	<input type="text" name="bank" id="bank">
		 	
		 	<label for="agency">Agência</label>
		 	<input type="tel" name="agency" id="agency">
		 	
		 	<label for="account">Conta</label>
		 	<input type="tel" name="account" id="account">	 	
		 			 	
		 	<label for="numchk">Nº Cheque</label>
		 	<input type="tel" name="numchk" id="numchk">
		 	
		 	<label for="value">Valor</label>
		 	<input type="tel" name="value" id="value"><br>

		 	<label for="dtToday">Data</label>
		 	<input type="date" name="dtToday" id="dtToday">

		 	<label for="issuer">Emitente</label>
		 	<input type="text" name="issuer" id="issuer">	

		 	<label for="dtDue">Venc.</label>
		 	<input type="date" name="dtDue" id="dtDue">

		 	<label for="cod">Cód.Cheque</label>
		 	<input type="text" name="cod" id="cod">

		 	<label for="days">Tot.Dias</label>
		 	<input type="text" name="days" id="days">

		 	<label for="tax">Taxa</label>
		 	<input type="text" name="tax" id="tax">

		 	<label for="interest">Juros</label>
		 	<input type="text" name="interest" id="interest">

		 	<label for="liquid">Líquido</label>
		 	<input type="text" name="liquid" id="liquid">		 			 			 			 	 		 	

		 	<input type="submit" value="Login">
		
		 	<!--<a href="/alfa/new_user" id="right">New User</a>-->
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
		width: 653px;
	}
	#bank, #tax, #days {
		width: 40px;
	}
	#agency, #cod{
		width: 60px;
	}

	#account, #numchk {
		width: 90px;
	}
	#value, #interest{
		width: 125px;
	}
	#liquid{
		width: 127px;
	} 
	#issuer {
		width: 304px;
		text-transform: uppercase;
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
	input, option {
		text-transform: uppercase;		
	}
	input[type=date] {
		width: 125px;
	}
</style>

<script type="text/javascript">
	
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
		var opt = document.getElementById('selectBox').value = "";

	}
</script>
</html>