var secciones = [
  [
    "MATES",
    "img/mates.png",
    "html/productos/mates.html"
  ],
  [
    "PERSONAJES",
    "img/wow.png",
    "html/productos/personajes.html"
  ],
  [
    "LLAVEROS",
    "img/llaveros.png",
    "html/productos/llaveros.html"
  ]
];

var indice = 0;
var siguiente = document.getElementById("siguiente");
var anterior = document.getElementById("anterior");

siguiente.addEventListener("click", function(){
 indice = indice + 1
 if (indice > 2){
   indice = 0;
 }
document.querySelector("a").setAttribute("href", secciones[indice][2]);
document.querySelector("img").setAttribute("src", secciones[indice][1]);
document.querySelector("img").setAttribute("alt", "seccion" + secciones[indice][0]);

})
anterior.addEventListener("click", function(){
 indice = indice - 1
 if (indice < 0){
   indice = 2;
 }
document.querySelector("a").setAttribute("href", secciones[indice][2]);
document.querySelector("img").setAttribute("src", secciones[indice][1]);
document.querySelector("img").setAttribute("alt", "seccion" + secciones[indice][0]);

})
