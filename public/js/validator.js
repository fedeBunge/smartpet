
window.addEventListener('load', function(){

  // API para la carga de países y provincias (incluyendo validaciones del campo "Provincia", en el caso de que exista)

  var formulario = document.querySelector('.registro-formulario');
  var selectPaises = document.querySelector('.registro-dropdown');
  var campoProvincia = document.getElementById('state');

  var cargarPaises = function(paises) {
    paises.forEach(function(pais) {
      var nuevoOption = document.createElement('option');
      nuevoOption.setAttribute('value', pais);

      if (localStorage.getItem("paisElegido")) {
        if (localStorage.getItem("paisElegido") == pais) {
          nuevoOption.selected = true;
          if (pais == 'Argentina') {
            cargarProvincias();
          }
        }
      }

      nuevoOption.innerText = pais;
      selectPaises.append(nuevoOption);
    });
  }

  var cargarOptionsProvincias = function(provincias) {
    var dropdownProvincias = document.getElementById('dropdown-provincias');
    provincias.forEach(function(provincia) {
      var optionNuevo = document.createElement('option');
      optionNuevo.setAttribute('value', provincia);
      optionNuevo.innerText = provincia;
      dropdownProvincias.append(optionNuevo);
    });
  }

  var cargarProvincias = function() {

    campoProvincia.innerHTML = '<label for="state" class="registro-nombre">Provincia:</label><div class="registro-campo"><select class="registro-dropdown" name="state" id="dropdown-provincias"><option value="">----- Elige una provincia -----</option></select><div class="registro-error-js"></div></div>';

    var campoState = document.getElementById('dropdown-provincias');
    campoState.addEventListener('blur', function(){
      var error = this.parentElement.querySelector('.registro-error-js');
      var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
      if (this.value.trim() === '') {
        this.classList.add('registro-borde-error');
        error.innerText = 'Este campo es obligatorio';
      } else {
        error.innerText = '';
        this.classList.remove('registro-borde-error');
      }
    });

    formulario.addEventListener('submit', function (event) {
      campoState = document.getElementById('dropdown-provincias');
      if (campoState) {
        if (campoState.value.trim() === '') {
          event.preventDefault();
          var error = campoState.parentElement.querySelector('.registro-error-js');
          campoState.classList.add('registro-borde-error');
          error.innerText = 'Este campo es obligatorio';
        }
      }
    });

    fetch('https://dev.digitalhouse.com/api/getProvincias')
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        var provincias = [];
        data.forEach(function(provincia) {
          provincias.push(provincia.state);
        });
        cargarOptionsProvincias(provincias);
      })
      .catch(function(error) {
        console.log("Ocurrió un error: " + error);
      })

  }

  fetch('https://restcountries.eu/rest/v2/all')
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      var paises = [];
      data.forEach(function(paisApi){
        if (paisApi.subregion == 'South America' && (paisApi.languages[0].nativeName == 'Español' || paisApi.languages[0].nativeName == 'Português')) {
          paises.push(paisApi.nativeName)
        }
      })
      cargarPaises(paises);
    })
    .catch(function(error) {
      console.log("Ocurrió un error: " + error);
    })

  selectPaises.addEventListener("change", function() {

    localStorage.setItem("paisElegido", this.options[this.selectedIndex].value);

    if (this.options[this.selectedIndex].value == 'Argentina') {
      cargarProvincias();
    } else {
      campoProvincia.innerHTML = "";
    }

  });

  // Validaciones ontime del formulario de registro

	// var formulario = document.querySelector('.registro-formulario');
  var campoFullName = formulario.name;
  var campoNickname = formulario.nickname;
  var campoCountry = formulario.country;
  var campoEmail = formulario.email;
  var campoPassword1 = formulario.password;
  var campoPassword2 = formulario.password_confirmation;
  var campoAvatar = formulario.avatar
  // var finalData = {};

	var campos = formulario.elements;

	campos = Array.from(campos);
	campos.pop();

	const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	const regexNumbers = /^\d+$/;


	function validateEmpty () {
		var error = this.parentNode.querySelector('.registro-error');
		var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
		if (this.value.trim() === '') {
			this.classList.add('registro-borde-error');
			error.innerText = 'Este campo es obligatorio';
		} else {
			error.innerText = '';
			this.classList.remove('registro-borde-error');
		}
	}

  function validateEmptyAndMax () {

    var error = this.parentElement.querySelector('.registro-error');
    var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;

    if (nombreCampo == "Nombre completo:") {
      var number = 100;
    } else if (nombreCampo == "Nombre de usuario:") {
      var number = 15;
    }

    if (this.value.trim() === '') {
      this.classList.add('registro-borde-error');
      error.innerText = 'Este campo es obligatorio';
    } else if (this.value.trim().length > number) {
      this.classList.add('registro-borde-error');
      error.innerText = 'Máximo: ' + number + ' caracteres';
    } else {
      error.innerText = '';
      this.classList.remove('registro-borde-error');
    }

  }

	function validateEmptyAndEmail () {
    var error = this.parentElement.querySelector('.registro-error');
		var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
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

	campoFullName.addEventListener('blur', validateEmptyAndMax);
  campoNickname.addEventListener('blur', validateEmptyAndMax);
  campoCountry.addEventListener('blur', validateEmpty);
	campoEmail.addEventListener('blur', validateEmptyAndEmail);
  // campoAvatar.addEventListener('blur', validateEmpty);


	campoPassword1.addEventListener('blur', function () {
		var error = this.parentElement.querySelector('.registro-error');
		var nombreCampo = this.parentNode.parentNode.querySelector('label').innerText;
		if (this.value.trim() === '') {
			this.classList.add('registro-borde-error');
			error.innerText = 'Este campo es obligatorio';
		} else if (this.value.trim().length < 4) {
      this.classList.add('registro-borde-error');
			error.innerText = 'La contraseña debe tener al menos 4 caracteres';
		} else {
			error.innerText = '';
			this.classList.remove('registro-borde-error');
		}
	});

	campoPassword2.addEventListener('change', function () {
		var error = this.parentElement.querySelector('.registro-error');
		if (this.value.trim() !== campoPassword1.value.trim()) {
			this.classList.add('registro-borde-error');
			error.innerText = 'Las contraseñas no coinciden';
		} else {
			error.innerText = '';
			this.classList.remove('registro-borde-error');
		}
	});

	formulario.addEventListener('submit', function (e) {

		if (
			campoFullName.value.trim() === '' ||
			campoNickname.value.trim() === '' ||
			campoCountry.value.trim() === '' ||
			campoEmail.value.trim() === '' ||
			campoPassword1.value.trim() === '' ||
      campoPassword2.value.trim() === '' ||
			campoAvatar.value.trim() === ''
		) {
      e.preventDefault();
			campos.forEach(function (campo) {
				var error = campo.parentElement.querySelector('.registro-error');
				if (campo.value.trim() === '') {
					campo.classList.add('registro-borde-error');
					error.innerText = 'Este campo es obligatorio';
				}
			});
    } else if (campoFullName.value.trim().length > 100) {
      e.preventDefault();
      campoFullName.classList.add('registro-borde-error');
      campoFullName.parentElement.querySelector('.registro-error').innerText = 'Máximo: 100 caracteres';
    } else if (campoNickname.value.trim().length > 15) {
      e.preventDefault();
      campoNickname.classList.add('registro-borde-error');
      campoNickname.parentElement.querySelector('.registro-error').innerText = 'Máximo: 15 caracteres';
    } else if (campoPassword1.value.trim().length < 4) {
      e.preventDefault();
      campoPassword1.classList.add('registro-borde-error');
			campoPassword1.parentElement.querySelector('.registro-error').innerText = 'La contraseña debe tener al menos 4 caracteres';
		} else if (campoPassword2.value !== campoPassword1.value) {
      e.preventDefault();
			campoPassword2.classList.add('registro-borde-error');
			campoPassword2.parentElement.querySelector('.registro-error').innerText = 'Las contraseñas no coinciden';
    } else if (!regexEmail.test(campoEmail.value.trim())) {
      campoEmail.classList.add('registro-borde-error');
      e.preventDefault();
			campoEmail.innerText = 'Formato de correo inválido';
    } else {
			campos.forEach(function (campo) {
				// finalData[campo.name] = campo.value;
				var error = campo.parentElement.querySelector('.registro-error');
				campo.classList.remove('registro-borde-error');
				error.innerText = '';
			});
		}
	})

});
