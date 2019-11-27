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
    //enviar();    
    request()
      .then(function(response) {
        console.log('response:'+response);
        obj = Object.values(JSON.parse(response));
        if(obj[0] && obj[1]) {
          console.log('deu certo');
          document.querySelector('.loading').remove();
          campos.forEach(element=> {
            element.value = '';
          });
          setTimeout(function(){ alert("Formulário Enviado Com sucesso!"); }, 100);
        }
      })
      .catch(function(error) {
        console.log(error);
      });
  }
};
function validaForm() {
  invalidos = [];
  campos.forEach(element => {
    if(!element.checkValidity()) {
      element.parentElement.classList.add('required');
      invalidos.push(element);
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
      }
    });
    element.onchange = function(e) {
      this.parentElement.classList.remove('required');
    };
  })
});
//ajax
function enviar() {
  const xml = new XMLHttpRequest();
  xml.open('POST', 'enviar.php', true);
  var data = {
    nome: nome.value,
    email: email.value,
    tel: tel.value,
    estado: UF.value,
    cidade:cidade.value,
    mensagem:mensagem.value
  }
  xml.setRequestHeader('Content-Type', 'application/json');
  xml.send(data);
  xml.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log('recebido');
        console.log(this);
        console.log(this.response);
    }
  };
  // $.ajax({
  //   url:'enviar.php',
  //   type: 'POST',
  //   data: {
  //   'nome': nome.value,
  //   'email': email.value,
  //   'tel': tel.value,
  //   'estado': UF.value,
  //   'cidade':cidade.value,
  //   'mensagem':mensagem.value
  // },
  // success: function(response){
  //   if(response){
  //     obj = Object.values(JSON.parse(response));
  //     if(obj[0] && obj[1]) {

  //       console.log('deu certo');
        
  //       document.querySelector('.loading').remove();
  //       campos.forEach(element=> {
  //         element.value = '';
  //       })
  //       setTimeout(function(){ alert("Formulário Enviado Com sucesso!"); }, 100);
  //     } else {
  //       alert('ERRO: dados invalidos');
  //     }

  //   }else
  //     console.log('erro');
  // }
  // });
}
var request = function() {
  var data = {
    nome: nome.value,
    email: email.value,
    tel: tel.value,
    estado: UF.value,
    cidade:cidade.value,
    mensagem:mensagem.value
  }
  return new Promise(function(resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'enviar.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'); 
    xhr.send(serialize(data));
    console.log(xhr);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if(xhr.status === 200) {
          resolve(xhr.response);
        } else {
          reject('errp de reqiosocao');
        }
      }
    }
  });
}
serialize = function(obj) {
  var str = [];
  for (var p in obj)
    if (obj.hasOwnProperty(p)) {
      str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
    }
  return str.join("&");
}