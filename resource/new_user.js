function formatMoeda(btn){                  //Formata o valor para Moeda.
		if (!btn.value){						//Verifica se value está vazio.
		} else {
			var valor = btn.value.replace('/','.'); //o parseFloat só considera decimal com ponto e nao com virgula
			var novoValor = parseFloat(valor).toFixed(2);
			btn.value = novoValor; 
		}	
	}
	
	function cpfCnpj(i){

		if (document.getElementById('selct').value == 'Cpf') {
			
			//if(cnpj.value) cnpj.value = cnpj.value.match(/.{1,3}/g).join(".").replace(/\.(?=[^.]*$)/,"-");
			if(cpfnj.value) cpfnj.value = cpfnj.value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})/,"$1.$2.$3-$4");
		}

		if (document.getElementById('selct').value == 'Cnpj'){

			if(cpfnj.value) cpfnj.value = cpfnj.value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/,"$1.$2.$3/$4-$5");

		/*var v = i.value;
		if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
		  i.value = v.substring(0, v.length-1);
		  return;
		}
		i.setAttribute("maxlength", "14");
		if (v.length == 3 || v.length == 7) i.value += ".";
		if (v.length == 11) i.value += "-"; */
		}
	}

	function phone(i) {

		if(phone1.value) phone1.value = phone1.value.replace(/^(\d{0})(\d{2})/,"$1($2)");
		if(phone2.value) phone2.value = phone2.value.replace(/^(\d{0})(\d{2})/,"$1($2)");
	}

	function cep(i) {
		if(zipcode.value) zipcode.value = zipcode.value.replace(/^(\d{2})(\d{3})/,"$1.$2-");
	}

	function clearCpf() {
		document.getElementById('cpfnj').value = "";
	}