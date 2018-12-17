// window.onload = function() {
//
//   var selectPaises = document.querySelector('.registro-dropdown');
//   var campoProvincia = document.getElementById('state');
//
//   var cargarPaises = function(paises) {
//     paises.forEach(function(pais) {
//       var nuevoOption = document.createElement('option');
//       nuevoOption.setAttribute('value', pais);
//       nuevoOption.innerText = pais;
//       selectPaises.append(nuevoOption);
//     });
//   }
//
//   var cargarProvincias = function(provincias) {
//     var dropdownProvincias = document.getElementById('dropdown-provincias');
//     provincias.forEach(function(provincia) {
//       var optionNuevo = document.createElement('option');
//       optionNuevo.setAttribute('value', provincia);
//       optionNuevo.innerText = provincia;
//       dropdownProvincias.append(optionNuevo);
//     });
//   }
//
//   fetch('https://restcountries.eu/rest/v2/all')
//     .then(function(response) {
//       return response.json();
//     })
//     .then(function(data) {
//       var paises = [];
//       data.forEach(function(paisApi){
//         if (paisApi.subregion == 'South America' && (paisApi.languages[0].nativeName == 'Español' || paisApi.languages[0].nativeName == 'Português')) {
//           paises.push(paisApi.nativeName)
//         }
//       })
//       cargarPaises(paises);
//     })
//     .catch(function(error) {
//       console.log("Ocurrió un error: " + error);
//     })
//
//   selectPaises.addEventListener("change", function(){
//
//     if (this.options[this.selectedIndex].value == 'Argentina') {
//
//       campoProvincia.innerHTML = '<label for="state" class="registro-nombre">Provincia:</label><div class="registro-campo"><select class="registro-dropdown" name="state" id="dropdown-provincias"><option value="">----- Elige una provincia -----</option></select></div>';
//
//       fetch('https://dev.digitalhouse.com/api/getProvincias')
//         .then(function(response) {
//           return response.json();
//         })
//         .then(function(data) {
//           var provincias = [];
//           data.forEach(function(provincia) {
//             provincias.push(provincia.state);
//           });
//           cargarProvincias(provincias);
//         })
//         .catch(function(error) {
//           console.log("Ocurrió un error: " + error);
//         })
//
//     } else {
//       campoProvincia.innerHTML = "";
//     }
//
//   });
//
// }
