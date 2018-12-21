// fullName
// nickname
// country
// state
// email
// password1
// password2
// avatar

window.onload = function () {

  // Api para la carga de paises

  var formulario = document.querySelector('.registro-formulario');
  var campoFullName = formulario.fullname;
  var campoNickname = formulario.nickname;
  var campoCountry = formulario.country;
  var campoState = document.getElementById('dropdown-provincias');
  var campoEmail = formulario.email;
  var campoPassword1 = formulario.password1;
  var campoPassword2 = formulario.password2;
  var campoAvatar = formulario.avatar
  var finalData = {};


	var campos = formulario.elements;

	campos = Array.from(campos);
	campos.pop();

	const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	const regexNumbers = /^\d+$/;


	function validateEmpty () {
		var error = this.parentElement.querySelector('.registro-error-js');
		var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
		if (this.value.trim() === '') {
			this.classList.add('is-invalid');
			error.innerText = 'El campo es obligatorio';
		} else {
			error.innerText = '';
			this.classList.remove('is-invalid');
		}
	}

	function validateEmptyAndEmail () {
		var error = this.parentElement.querySelector('.registro-error-js');
		var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
		if (this.value.trim() === '') {
			this.classList.add('is-invalid');
			error.innerText = 'El campo es obligatorio';
		} else if (!regexEmail.test(this.value.trim())) {
			error.innerText = 'Escribí un formato de email valido';
		} else {
			error.innerText = '';
			this.classList.remove('is-invalid');
		}
	}


	campoFullName.addEventListener('blur', validateEmpty);
	campoNickname.addEventListener('blur', validateEmpty);
  campoCountry.addEventListener('blur', validateEmpty);
	campoEmail.addEventListener('blur', validateEmptyAndEmail);
  // if (campoCountry.options[campoCountry.selectedIndex].value == 'Argentina') {
  //   campoState.addEventListener('blur', validateEmpty);
  // }
  // if (campoState) {
  // campoState.addEventListener('blur', validateEmpty);
  // }
  campoState.addEventListener('blur', validateEmpty);

  campoAvatar.addEventListener('blur', validateEmpty);


	campoPassword1.addEventListener('blur', function () {
		var error = this.parentElement.querySelector('.registro-error-js');
		var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
		if (this.value.trim() === '') {
			this.classList.add('is-invalid');
			error.innerText = 'El campo es obligatorio';
		} else if (this.value.trim().length < 4) {
			error.innerText = 'La contraseña debe tener más de 4 caracteres';
		} else {
			error.innerText = '';
			this.classList.remove('is-invalid');
		}
	});

	campoPassword2.addEventListener('change', function () {
		var error = this.parentElement.querySelector('.registro-error-js');
		if (this.value.trim() !== campoPassword1.value.trim()) {
			this.classList.add('is-invalid');
			error.innerText = 'Las contraseñas no coinciden';
		} else {
			error.innerText = '';
			this.classList.remove('is-invalid');
		}
	});

	formulario.addEventListener('submit', function (e) {


		if (
			campoFullName.value.trim() === '' ||
			campoNickname.value.trim() === '' ||
			campoCountry.value.trim() === '' ||
			campoState.value.trim() === '' ||
			campoEmail.value.trim() === '' ||
			campoPassword1.value.trim() === '' ||
      campoPassword2.value.trim() === '' ||
			campoAvatar.value.trim() === ''
		) {
      e.preventDefault();
			campos.forEach(function (campo) {
				var error = campo.parentElement.querySelector('.registro-error-js');
				if (campo.value.trim() === '') {
					campo.classList.add('is-invalid');
					error.innerText = 'El campo es obligatorio';
				}
			});
		} else if (campoPassword2.value !== campoPassword1.value) {
      e.preventDefault();
			campoPassword2.classList.add('is-invalid');
			campoPassword2.parentElement.querySelector('.registro-error-js').innerText = 'Las contraseñas no coinciden';
    } else if (!regexEmail.test(campoEmail.value.trim())) {
      e.preventDefault();
			campoEmail.innerText = 'Escribí un formato de email valido';
    } else {
			campos.forEach(function (campo) {
				var error = campo.parentElement.querySelector('.registro-error-js');
				campo.classList.remove('is-invalid');
				error.innerText = '';
			});
		}
	})

}
