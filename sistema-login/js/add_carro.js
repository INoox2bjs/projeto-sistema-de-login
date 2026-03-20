function validarFormularioCarro(evento) {
   
    var formulario = document.getElementById('addCarroForm');

    var modelo = formulario.modelo.value.trim();
    var marca = formulario.marca.value.trim();
    var ano = formulario.ano.value.trim();
    var preco = formulario.preco.value.trim();

    
    if (modelo === '' || marca === '' || ano === '' || preco === '') {
       
        evento.preventDefault();
       
        alert('Por favor, preencha todos os campos obrigatórios.');
    }
}

function iniciarFormularioCarro() {
  
    var formulario = document.getElementById('addCarroForm');
  
    formulario.addEventListener('submit', validarFormularioCarro);
}

document.addEventListener('DOMContentLoaded', iniciarFormularioCarro);
