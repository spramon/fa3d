var login = document.querySelector(".buscador");
login.onclick = function(){
  document.querySelector(".buscadorbarra").style.display = "flex";

}

var section = document.querySelector("section");
section.onclick = function(){
  document.querySelector(".buscadorbarra").style.display = "none";
  document.querySelector(".phoneytablet-submenu").style.display = "none";

}

var menu = document.querySelector(".menuphoneboton");
menu.onclick = function(){
  document.querySelector(".phoneytablet-submenu").style.display = "block";
}
