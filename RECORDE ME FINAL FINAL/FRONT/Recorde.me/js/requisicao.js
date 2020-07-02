// validar formulario // bootstrap

(function () {
  'use strict';
  window.addEventListener('load', function () {
    // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
    var forms = document.getElementsByClassName('cadastro-form');
    // Faz um loop neles e evita o envio
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else{ // tudo ok envia e recarrega a página
          document.location.reload(true);
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

//quando enviar o formulário irá passar por essa função. 
function enviarForm() {
  var form = document.getElementById('cadastro'); //selecionou o formulário
  var data = {};

  // pega os dados informados no formulario
  data['titulo'] = form.titulo.value;
  data['data'] = form.data.value;
  data['lembrete'] = form.lembrete.value;

  // console.log(JSON.stringify(data)); //envia para o local host (onde está o banco)
  fetch('http://localhost/recorde/lembrete', {
    method: 'POST',
    body: JSON.stringify(data)
  })
    .then((response) => {
      if (response.ok) {

        return response.json()
      } else {

        return Promise.reject({ status: res.status, statusText: res.statusText });
      }

    })
    .then((data) => console.log(data))
    .catch(err => console.log('Error message:', err.statusText));

}


  
// quando abrir a página já mostrar os dados que estão no banco e inserir na tabela
window.onload = function(e) {
	fetch(
		'http://localhost/recorde/lembrete', {		
    }).then(response => response.json())	
    			
	.then(data => { 
        console.log(data);
		data.forEach(lembrete => {  
            var table = document.getElementById("tabela");
            
			var row = table.insertRow(-1);
			var tituloColuna = row.insertCell(0);
			var dataColuna = row.insertCell(1); 
			var lembreteColuna = row.insertCell(2);  
			tituloColuna.innerHTML = lembrete.titulo;
			dataColuna.innerHTML = lembrete.data;
			lembreteColuna.innerHTML = lembrete.lembrete;
			
		})
	}).catch(error => console.error(error))
}


