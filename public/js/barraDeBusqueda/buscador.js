window.addEventListener("load", function() {

    function buscar(){
      var busqueda = $("input[name='buscador']");
      busqueda.change(function() {
        var keywords = $(this).val();
        $('.cargando').html("<img src='/img/gifs/loading_icon.gif' alt='gif-carga' style='width:10vh;'>");
        var gif = document.querySelector(".cargando");
        gif.style.backgroundColor= 'rgba(0,0,0,0.5)';
        gif.style.visibility = "visible";
        gif.style.opacity = "1";
        setTimeout(function(){
          window.location.href = "/productos/buscar/" + keywords + "";
        },1500)
      });
    }
    buscar();

});
