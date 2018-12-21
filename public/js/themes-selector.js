

document.getElementById('buttonnavidad').addEventListener('click', function () {
  document.getElementById('theme').href = '/css/styles/paletaColoresNavidad.css';
  // document.cookie = 'theme=navidad; expires=' + now.toUTCString() + ";"
  var id = document.getElementById('idUser').innerText;
  localStorage.setItem(id, "navidad");
  });
document.getElementById('buttonclassic').addEventListener('click', function () {
  document.getElementById('theme').href = '/css/styles/paletaColores.css';
  // document.cookie = 'theme=classic; expires=' + now.toUTCString() + ";"
  var id = document.getElementById('idUser').innerText;
  localStorage.setItem(id, "classic");
});
