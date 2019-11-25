const form = document.getElementById('form');
//campos
const nome = document.getElementById('nome');
const email = document.getElementById('email');
const tel = document.getElementById('telefone');
const UF = document.getElementById('estado');
const cidade = document.getElementById('cidade');
const mensagem = document.getElementById('mensagem');
const campos = document.querySelectorAll('#form .form-control');
var invalidos = [];

form.onsubmit = e => {
  e.preventDefault();
  validaForm();
  if(form.checkValidity()) {
    var loading = document.createElement('img');
    loading.setAttribute('class', 'loading');
    loading.setAttribute('src', 'img/loading.gif');
    form.appendChild(loading);
    enviar();    
  }
};
function validaForm() {
  invalidos = [];
  campos.forEach(element => {
    if(!element.checkValidity()) {
      element.parentElement.classList.add('required');
      invalidos.push(element);
      //console.log(element);
    }
  });
  if(invalidos.length>0)
  invalidos[0].focus();
}


document.addEventListener("DOMContentLoaded", function() {
  campos.forEach(element=> {
    element.addEventListener("keyup", function(e) {
      if(this.checkValidity()){
        this.parentElement.classList.remove('required');
        //nvalidos.pop(element);
      }
    });
    element.onchange = function(e) {
      this.parentElement.classList.remove('required');
      //invalidos.pop(element);
    };
  })
});

function enviar() {
  $.ajax({
    url:'enviar.php',
    type: 'POST',
    data: {
    'nome': nome.value,
    'email': email.value,
    'tel': tel.value,
    'estado': UF.value,
    'cidade':cidade.value,
    'mensagem':mensagem.value
  },
  success: function(response){
    if(response){
      document.querySelector('.loading').remove();
      campos.forEach(element=> {
        element.value = '';
      })
      setTimeout(function(){ alert("Formulário Enviado Com sucesso!"); }, 100);
      console.log(response);

    }else
      console.log('erro');
  }
  });
}