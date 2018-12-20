// $(window).on("load", function() {


  // Defino las funciones para mostrar y esconder los menús


  var toggleCategorias = function() {
    $(".menu-categorias").slideToggle("fast");
    $(".flecha-abajo-cat").toggleClass("hidden");
    $(".cruz-cat").toggleClass("hidden");
  }

  var toggleUsuario = function() {
    $(".menu-usuario-logueado").slideToggle("fast");
    $(".flecha-abajo-usu").toggleClass("hidden");
    $(".cruz-usu").toggleClass("hidden");
  }

  var toggleMenuHamburguer = function() {
    $(".menu-mobile").slideToggle("fast");
    $(".menu-hamburger").toggleClass("hidden");
    $(".menu-hamburger-close").toggleClass("hidden");
    if ($(".usuario-logueado-mobile").length) {
      if ($(".menu-usuario-logueado-mobile").css("display") != "none") {
        toggleUsuarioMobile();
      }
    }
    if ($(".menu-categorias-mobile").css("display") != "none") {
      toggleCategoriasMobile();
    }
  }

  var toggleUsuarioMobile = function() {
    if ($(".menu-categorias-mobile").css("display") != "none") {
      toggleCategoriasMobile();
    }
    $(".menu-usuario-logueado-mobile").slideToggle("fast");
    $(".flecha-izquierda-usu-mobile").toggleClass("hidden");
    $(".cruz-usu-mobile").toggleClass("hidden");
  }

  var toggleCategoriasMobile = function() {
    if ($(".usuario-logueado-mobile").length) {
      if ($(".menu-usuario-logueado-mobile").css("display") != "none") {
        toggleUsuarioMobile();
      }
    }
    $(".menu-categorias-mobile").slideToggle("fast");
    $(".flecha-izquierda-mobile").toggleClass("hidden");
    $(".cruz-mobile").toggleClass("hidden");
  }


  // Agrego los eventos para la apertura y cierre de todos los menús


  // Apertura y cierre del menú "Todas las categorías" versión DESKTOP

  $(".todas-las-categorias").on("click", toggleCategorias);

  $(document).on("click", function(event) {
    if (!event.target.closest(".todas-las-categorias") && !event.target.closest(".menu-categorias") && $(".menu-categorias").css("display") != "none") {
      toggleCategorias();
    }
  });

  // Apertura y cierre del menú del Usuario versión DESKTOP

  if ($(".usuario-logueado").length) {

    $(".usuario-logueado").on("click", toggleUsuario);

    $(document).on("click", function(event) {
      if (!event.target.closest(".usuario-logueado") && !event.target.closest(".menu-usuario-logueado") && $(".menu-usuario-logueado").css("display") != "none") {
        toggleUsuario();
      }
    });

  }

  // Apertura y cierre del menú "hamburguer" del MOBILE

  $(".area-menu-hamburger").on("click", toggleMenuHamburguer);

  $(document).on("click", function(event) {
    if (!event.target.closest(".area-menu-hamburger") && !event.target.closest(".menu-mobile") && $(".menu-mobile").css("display") != "none") {
      toggleMenuHamburguer();
    }
  });

  // Apertura y cierre del menú Usuario versión MOBILE

  if ($(".usuario-logueado-mobile").length) {
    $(".usuario-logueado-mobile").on("click", toggleUsuarioMobile);
  }

  // Apertura y cierre del menú "Todas las categorías" versión MOBILE

  $(".todas-las-categorias-mobile").on("click", toggleCategoriasMobile);

// })
