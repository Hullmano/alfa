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
  		//document.getElementById('client').value = $value.value;
  		//document.getElementById('client').value = document.getElementById('options').innerHTML;
  		//alert($value);
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