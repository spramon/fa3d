window.addEventListener("load", function() {
  // agregar descripcion
  $('.descripciones').next().click(function(){

  var descripciones = $(this).prev().children('input[name=descripciones]').val();
    $(this).prev().append(`<div class='descripcion-${descripciones}'><label for='precio-${descripciones}'>Precio:</label><input type='number' name='precio-${descripciones}' class='form-control' value=''><label for='descripcion-${descripciones}'>Descripción:</label><input type='text' name='descripcion-${descripciones}' class='form-control' value=''></div>`)
    $(this).prev().children('input[name=descripciones]').val(parseInt(descripciones)+1);
  });

  $('.descripciones').next().next().click(function(){
    var descripciones = $(this).prev().prev().children('input[name=descripciones]').val();
    var posicion = parseInt(descripciones)-1;
    if(descripciones == 1) {
      alert('Hay una sola descripción');
    } else {
    $(this).prev().prev().children(`.descripcion-${posicion}`).remove();
    $(this).prev().prev().children('input[name=descripciones]').val(posicion);
    }
  });

});
