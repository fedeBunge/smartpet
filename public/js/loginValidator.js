window.addEventListener('load', function(){

  var formulario = document.querySelector('.registro-formulario');
  var campoEmail = formulario.email;
  var campoPassword = formulario.password;

  const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  function validateEmpty () {
    var error = this.parentNode.querySelector('.registro-error');
    // var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
    if (this.value.trim() === '') {
      this.classList.add('registro-borde-error');
      error.innerText = 'Este campo es obligatorio';
    } else {
      error.innerText = '';
      this.classList.remove('registro-borde-error');
    }
  }

  function validateEmptyAndEmail () {
    var error = this.parentElement.querySelector('.registro-error');
    // var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
    if (this.value.trim() === '') {
      this.classList.add('registro-borde-error');
      error.innerText = 'Este campo es obligatorio';
    } else if (!regexEmail.test(this.value.trim())) {
      this.classList.add('registro-borde-error');
      error.innerText = 'Formato de correo inválido';
    } else {
      error.innerText = '';
      this.classList.remove('registro-borde-error');
    }
  }

  campoEmail.addEventListener('blur', validateEmptyAndEmail);
  campoPassword.addEventListener('blur', validateEmpty);

  formulario.addEventListener('submit', function (e) {

    if (campoEmail.value.trim() === '' || campoPassword.value.trim() === '' || !regexEmail.test(campoEmail.value.trim())) {

      e.preventDefault();

      if (campoEmail.value.trim() === '') {
        var error = campoEmail.parentElement.querySelector('.registro-error');
        campoEmail.classList.add('registro-borde-error');
        error.innerText = 'Este campo es obligatorio';
      } else if (!regexEmail.test(campoEmail.value.trim())) {
          var error = campoEmail.parentElement.querySelector('.registro-error');
          campoEmail.classList.add('registro-borde-error');
          error.innerText = 'Formato de correo inválido';
      } else {
        var error = campoEmail.parentElement.querySelector('.registro-error');
        campoEmail.classList.remove('registro-borde-error');
        error.innerText = '';
      }

      if (campoPassword.value.trim() === '') {
        var error = campoPassword.parentElement.querySelector('.registro-error');
        campoPassword.classList.add('registro-borde-error');
        error.innerText = 'Este campo es obligatorio';
      } else {
        var error = campoPassword.parentElement.querySelector('.registro-error');
        campoPassword.classList.remove('registro-borde-error');
        error.innerText = '';
      }

    }

	});

});
