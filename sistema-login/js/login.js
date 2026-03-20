
function validarFormulario(evento) {
   
    var formulario = document.getElementById('loginForm');
    
    var email = formulario.email.value.trim();
  
    var senha = formulario.senha.value.trim();

  
    if (email === '' || senha === '') {
      
        evento.preventDefault();
      
        alert('Por favor, preencha todos os campos.');
    }
}


function iniciarFormulario() {
    
    var formulario = document.getElementById('loginForm');

    formulario.addEventListener('submit', validarFormulario);
}


document.addEventListener('DOMContentLoaded', iniciarFormulario);
