window.addEventListener("load", function() {
function visitas(){
  var visitasUnicasHoy = $('#visitasUnicasHoy');
  var visitasTotalesHoy = $('#visitasTotalesHoy');
  var visitasUnicasTotales = $('#visitasUnicasTotales');
  var visitasTotales = $('#visitasTotales');
  $.get("/visitas/ajax", function(response) {
    visitasUnicasHoy.text(response.visitasUnicasHoy);
    visitasTotalesHoy.text(response.visitasTotalesHoy);
    visitasUnicasTotales.text(response.visitasUnicasTotales);
    visitasTotales.text(response.visitasTotales);
  });
}

setInterval(visitas,2000);
});
