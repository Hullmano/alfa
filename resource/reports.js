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

		document.getElementById('sdtInitial').value = diaAtual;
		document.getElementById('sdtFinal').value = diaAtual;
	}

	function DateCheck(){
		document.getElementById('period').checked = true;
	}