$(window).on("load", function() {

  $(".cancel-button").on("click", function(event){
    event.preventDefault();
    history.back();
  })

})
