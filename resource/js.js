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