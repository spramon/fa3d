var login = document.querySelector(".buscador");
login.onclick = function(){
  document.querySelector(".buscadorbarra").style.display = "flex";

}

var section = document.querySelector("section");
section.onclick = function(){
  document.querySelector(".buscadorbarra").style.display = "none";
  document.querySelector(".submenu-mobile").style.display = "none";

}

var menu = document.querySelector(".icono-menu");
document.querySelector(".submenu-mobile").style.display = "none";
menu.onclick = function(){
  var estado = document.querySelector(".submenu-mobile").style.display;
  if (estado == "none") {
    document.querySelector(".submenu-mobile").style.display = "block";
  }
  else {
    document.querySelector(".submenu-mobile").style.display = "none";
  }
  };

var buscadormobile = document.querySelector(".icono-lupa");
document.querySelector(".buscadorbarra-mobile").style.display = "none";
buscadormobile.onclick = function(){
  var estado = document.querySelector(".buscadorbarra-mobile").style.display;
  if (estado == "none") {
    document.querySelector(".buscadorbarra-mobile").style.display = "flex";
  }
  else {
    document.querySelector(".buscadorbarra-mobile").style.display = "none";
  }
}

var productosmenu = document.getElementById("productos");
productosmenu.querySelector("ul").style.display = "none"

productosmenu.onclick = function submenu(){
  var estado = productosmenu.querySelector("ul").style.display;
  if (estado == "none") {
    productosmenu.querySelector("ul").style.display = "block";
  }
  else {
    productosmenu.querySelector("ul").style.display = "none";
  }
};


var serviciosmenu = document.getElementById("servicios");
serviciosmenu.querySelector("ul").style.display = "none"

serviciosmenu.onclick = function submenu(){
  var estado = serviciosmenu.querySelector("ul").style.display;
  if (estado == "none") {
    serviciosmenu.querySelector("ul").style.display = "block";
  }
  else {
    serviciosmenu.querySelector("ul").style.display = "none";
  }
};
