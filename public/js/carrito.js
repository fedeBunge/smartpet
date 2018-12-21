window.onload=function() {


  let buttonCarrito = document.querySelector('.buttonCarrito');
  let imgCarrito = document.querySelector('#imgCarrito');
  let imgCarritoMobile = document.querySelector('#imgCarritoMobile');
  let vaciarCarrito = document.querySelector('#vaciarCarrito');
  imageRefresh();

    if (document.querySelector('.buttonCarrito')) {

      buttonCarrito.addEventListener('click',(event)=>{
        event.preventDefault();
        let id = buttonCarrito.getAttribute('data-id');
        let name = buttonCarrito.getAttribute('data-name');
        let carrito = {
          productos: []
        };



      if (leerCookie('carrito')) {
          carrito= JSON.parse(leerCookie('carrito'));
          carrito.productos.push(id);
          guardarCookie('carrito',carrito);
      }else {

        carrito.productos.push(id);
        guardarCookie('carrito',carrito);
      }
      swal({
      title: name,
      text: "Fue agregado a tu carrito de compras",
      icon: "success",
      button: "Continuar con mis compras",
      });

      imageRefresh();
  });

}

if (document.querySelector('#vaciarCarrito')) {
  vaciarCarrito.addEventListener('click', (event)=>{
    event.preventDefault();
    if (leerCookie('carrito')) {

      document.cookie = "carrito=0; max-age=0; path=/";
      location.reload();
    }
  });
}

function imageRefresh(){

  if (leerCookie("carrito")) {

    let carrito= leerCookie("carrito");
    carrito=JSON.parse(leerCookie('carrito'));
    switch (carrito.productos.length) {
      case 1: imgCarrito.setAttribute("src","/images/carrito-blanco-1.png");
              imgCarritoMobile.setAttribute("src","/images/carrito-blanco-1.png");
              break;
      case 2: imgCarrito.setAttribute("src","/images/carrito-blanco-2.png");
              imgCarritoMobile.setAttribute("src","/images/carrito-blanco-2.png");
              break;
      case 3: imgCarrito.setAttribute("src","/images/carrito-blanco-3.png");
              imgCarritoMobile.setAttribute("src","/images/carrito-blanco-3.png");
              break;
      case 4: imgCarrito.setAttribute("src","/images/carrito-blanco-4.png");
              imgCarritoMobile.setAttribute("src","/images/carrito-blanco-4.png");
              break;
      case 5: imgCarrito.setAttribute("src","/images/carrito-blanco-5.png");
              imgCarritoMobile.setAttribute("src","/images/carrito-blanco-5.png");
              break;
      default:imgCarrito.setAttribute("src","/images/carrito-blanco.png");
              imgCarritoMobile.setAttribute("src","/images/carrito-blanco.png");
    }
  }

}

function guardarCookie(clave,valor){

  let json= JSON.stringify(valor);
  document.cookie =""+clave+"="+json+"; max-age=3600; path=/";

}

function leerCookie(clave) {
 let lista = document.cookie.split(";");
 let micookie= null;
 for (i in lista) {
     let busca = lista[i].search(clave);
     if (busca > -1) { micookie=lista[i];}
   }
  if (micookie == null) {
      return false;
   }else {
     let igual = micookie.indexOf("=");
     let valor = micookie.substring(igual+1);
     return valor;
   }

 }


};


//document.cookie = "nombrecookie=valorcookie; max-age=3600; path=/";
