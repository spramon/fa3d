<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">
    {{-- <link rel="icon" type="image/png" href="/img/faLogo1-04.png" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="fa impresión 3d es un emprendimiento en donde se venden productos hechos con impresión 3D pintados a mano">
    <meta name="keywords" content="impresion3d, impresiones, 3d, mates, llaveros, groot, starwars, avengers, impresion3d, decoración">
    <link rel="stylesheet" href="/css/fontawesome/css/all.css">
    <meta property="og:title" content="Fa. Impresión 3D" />
    <meta property="og:type" content="web" />
    <meta property="og:url" content="http://url" />
    <meta property="og:image:type" content="/img/faLogo1-04.png" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/index.css">



    <title>Fa. Impresión 3D</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @if(Auth::user() && Auth::user()->is_admin)
    <link rel="stylesheet" type="text/css" href="/css/adminNavBar/component.css" />
    <script src="/js/adminNavBar/modernizr-2.6.2.min.js"></script>
    @endif
    <script src="/js/barraDeBusqueda/buscador.js"></script>
    @yield('css')
</head>
<body>
  @yield('gif')
    <div class="cargando">
        <img src="/img/gifdecarga.gif" alt="gif-carga" loop>
    </div>
    <header>
        <nav>
            <div class="menu-mobile">
                <img class="icono-menu" src="/img/menublanco.svg" alt="menu">

                <img class="icono-logo" src="/img/logo.png" alt="logo">

                <img class="icono-lupa" src="/img/lupablanca.png" alt="lupa">

            </div>
            <div class="submenu-mobile">
                <li>
                    <a href="/">INICIO</a>
                </li>
                <li id="productos">
                    <a href="#">PRODUCTOS</a>
                    <ul>
                        <li><a href="/productos/accesorios">Accesorios</a></li>
                        <li><a href="/productos/hogar">Hogar</a></li>
                        <li><a href="/productos/juegos">Juegos</a></li>
                        <li><a href="/productos/llaveros">Llaveros</a></li>
                        <li><a href="/productos/mascaras faciales">Mascaras COVID</a></li>
                        <li><a href="/productos/mates y lapiceros">Mates y Lapiceros</a></li>
                        <li><a href="/productos/pasteleria">Pasteleria</a></li>
                        <li><a href="/productos/personajes">Personajes</a></li>
                        <li><a href="/productos/personalizados">Personalizados</a></li>
                        <li><a href="/productos/señaladores">Señaladores</a></li>
                    </ul>
                </li>
                <li id="servicios">
                    <a href="#">SERVICIOS</a>
                    <ul>
                        <li><a href="/porhora">ImpresiónXhora</a></li>
                        <li><a href="/productos/personalizados">Personalizados</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/comprar">¿CÓMO COMPRAR?</a>
                </li>
                <li>
                    <a href="/contacto">CONTACTO</a>
                </li>

            </div>
            <div class="buscadorbarra-mobile">
                <input type="text" name="buscador" value=@if (isset($busqueda)) {{$busqueda}}@else""@endif placeholder=" ¿Qué estás buscando?">
            </div>
            <div class="menuup">
                <div class="logo">
                    <img src="/img/logo.png" alt="logo">
                </div>
            </div>
            <div class="menu">
                <div class="submenu">
                    <li>
                        <a href="/">INICIO</a>
                    </li>
                    <li id="productos">
                        <a href="/productos">PRODUCTOS</a>
                        <ul>
                            <li></li>
                            <li><a href="/productos/accesorios">Accesorios</a></li>
                            <li><a href="/productos/hogar">Hogar</a></li>
                            <li><a href="/productos/juegos">Juegos</a></li>
                            <li><a href="/productos/llaveros">Llaveros</a></li>
                            <li><a href="/productos/mascaras faciales">Mascaras COVID</a></li>
                            <li><a href="/productos/mates y lapiceros">Mates y Lapiceros</a></li>
                            <li><a href="/productos/pasteleria">Pasteleria</a></li>
                            <li><a href="/productos/personajes">Personajes</a></li>
                            <li><a href="/productos/personalizados">Personalizados</a></li>
                            <li><a href="/productos/señaladores">Señaladores</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">SERVICIOS</a>
                        <ul>
                            <li><a href="/porhora">ImpresiónXhora</a></li>
                            <li><a href="/productos/personalizados">Personalizados</a></li>
                        </ul>
                    </li>
                    <li> <a href="/comprar">¿CÓMO COMPRAR?</a></li>
                    <li><a href="/contacto">CONTACTO</a> </li>

                </div>
                <div class="menuextras">
                    <img class="buscador" src="/img/lupablanca.png" alt="buscador">
                </div>
            </div>
            <div class="buscadorbarra">
                <input type="text" name="buscador" value=@if (isset($busqueda)) {{$busqueda}}@else""@endif placeholder=" ¿Qué estás buscando?">
                <button type="" name="button">BUSCAR</button>
            </div>
            <nav>
    </header>
    <div class="articles">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">COLORES</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="/img/colores.jpg" alt="colores">
                        <div class="descripcion">
                            Todos los producto que tengan la opción <strong>VER COLORES</strong> se pueden elegir el color a elección.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('container')
    @if(Auth::user() && Auth::user()->is_admin)
    <div class="component">
        <!-- Start Nav Structure -->
        <button class="cn-button" id="cn-button" style="outline:none; color:#F5028a;"><i class="fas fa-plus-circle"></i></button>
        <div class="cn-wrapper" id="cn-wrapper">
            <ul>
                <li><a href="/productos/edit"><i class="far fa-edit"></i></a></li>
                <li><a href="/productos/new"><i class="fas fa-plus"></i></a></li>
            </ul>
        </div>
        <div id="cn-overlay" class="cn-overlay"></div>
        <!-- End Nav Structure -->
    </div>
    @endif
    @if(Auth::user() && Auth::user()->is_admin)
    <script src="/js/adminNavBar/polyfills.js"></script>
    <script src="/js/adminNavBar/demo1.js"></script>
    @endif
    <footer>
        <div class="footer1">
            <div class="piedepagina">
                <li>Buenos Aires, Argentina.</li>
                <li><a href="mailto:fa.impresion3d@gmail.com">fa.impresion3d@gmail.com</a></li>
            </div>
            <p>SEGUINOS</p>
            <div class="redessociales">
                <a href="https://www.instagram.com/fa.impresion3d/" target="_blank"><img src="/img/instagram.png" alt="instagram"></a>
                <a href="https://www.facebook.com/fa.impresion3d/" target="_blank"><img src="/img/facebook.png" alt="facebook"></a>
            </div>
        </div>
        <div class="footer2">
            <p>Sitio creado por Sofía Ramón</p>
            <p>© Todos los derechos reservados</p>
        </div>
    </footer>
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
    <script>
        window.onload = function() {
            var load = document.querySelector(".cargando");
            setTimeout(function() {
                load.style.visibility = "hidden";
                load.style.opacity = "0";
            }, 200)

        };
    </script>
</body>

</html>
