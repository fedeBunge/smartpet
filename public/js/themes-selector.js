

document.getElementById('buttonnavidad').addEventListener('click', function () {
  document.getElementById('theme').href = 'css/paletaColoresNavidad.css';
  document.cookie = 'theme=navidad; expires=' + now.toUTCString() + ";"

  });
document.getElementById('buttonclassic').addEventListener('click', function () {
  document.getElementById('theme').href = 'css/paletaColores.css';
  document.cookie = 'theme=classic; expires=' + now.toUTCString() + ";"
});
