
//   Mascara para o Telefone 
function mascararTelefone() {
    var telefone = document.getElementById('telefone');
    var valor = telefone.value;
    valor = valor.replace(/\D/g, '');
    valor = valor.replace(/^(\d{2})(\d)/g, '($1) $2');
    valor = valor.replace(/(\d)(\d{4})$/, '$1-$2');
    telefone.value = valor;
}

//   Mascara para o CPF 
function mascararCPF() {
    var cpf = document.getElementById('cpf');
    var valor = cpf.value;
    valor = valor.replace(/\D/g, '');
    valor = valor.replace(/^(\d{3})(\d)/g, '$1.$2');
    valor = valor.replace(/^(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3');
    valor = valor.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3-$4');
  
    cpf.value = valor;
}

//   Mascara para o CEP 
function mascararCEP() {
    var cep = document.getElementById('cep');
    var valor = cep.value;
    valor = valor.replace(/\D/g, ''); 
    valor = valor.replace(/^(\d{5})(\d)/g, '$1-$2');
    cep.value = valor;
  }

  function verificarCheckbox() {
    var checkbox = document.getElementById("checkbox");
    var resultadoLabel = document.getElementById("resultado");
    if (checkbox.checked) {
      resultadoLabel.textContent = "Sim";
    } else {
      resultadoLabel.textContent = "Não";
    }
  }
