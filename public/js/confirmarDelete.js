$(".boton-borrar-producto").on("click", function(event){
  if (!confirm('Está seguro de que desea eliminar este producto?')) {
    event.preventDefault();
    throw new Error("Proceso cancelado");
  }

})
