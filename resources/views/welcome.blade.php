<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Vivienda, Compraventa">
    <title>Inicio</title>
    <link rel="icon" type="image/png" href="imagenes/icono.png" />
    <link href="estilos.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- main top menu-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="imagenes/icono.png" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}" title="Inicio">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Gestion</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Crear publicacion</a></li>
                            <li><a class="dropdown-item" href="#">Editar publicacion</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Contactenos">Contactenos</a>
                    </li>
                </ul>
                <div class="d-flex usuario">
                    <ul>
                        @if(Auth::check())
                            <li><a href="/login" class="nav-link"
                            role="button">{{ Auth::user()->name }}</a></li>
                        @else
                        <li><a href="/login" class="nav-link"
                            role="button">Ingresar</a></li>
                        
                        <li><a href="/register" class="nav-link"
                            role="button">Registrarse</a></li>
                        @endif
                    </ul>
                    <img src="imagenes/usuario.png" />
                </div>
            </div>
        </div>
    </nav>
    
    <!-- --------map--------------- -->
    <!-- key: AIzaSyAYvLNR666y22LmyCPbGU8Ws1OuuXfdplY-->
    <!-- email: proyecto.fincaraiz.ingesoft@gmail.com-->
    <!-- pass: ingesoft2021-->
    <div class="container-fluid" id="map-container">
        <div id="map"></div>
    </div>
    


    <script async="false"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYvLNR666y22LmyCPbGU8Ws1OuuXfdplY&callback=initMap">
    </script>


    <!--
    <div class="container-fluid">
        <div class="col-9 border border-dark">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63631.04952501349!2d-74.13487051607082!3d4.604659548467998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f996b4508fa03%3A0x3d84c9f15dc19148!2sUniversidad%20Nacional%20de%20Colombia!5e0!3m2!1ses-419!2sco!4v1639255038954!5m2!1ses-419!2sco" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    -->


    <!--offCanvas login-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarLogin"
    aria-labelledby="sidebar-label">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <!-- -----close button (don´t works i don´t know why)--------
            <button type="button" class="btn-close" data-bs-dimiss="offcanvas"aria-label="Close"></button>-->
        </div>
        <div class="offcanvas-body">
            <div id="login">
                <form action="index.html" method="post">
                    <h4 class="text-center mt-3">Iniciar sesion</h4>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="user" placeholder="Nombre de Usuario" name="user">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="pass" placeholder="Contrasena" name="pass">
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--offCanvas register-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarRegister"
    aria-labelledby="sidebar-label">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <!-- -----close button (don´t works i don´t know why)--------
            <button type="button" class="btn-close" data-bs-dimiss="offcanvas"aria-label="Close"></button>-->
        </div>
        <div class="offcanvas-body">
            <div id="register">
                <form action="index.html" method="post">
                    <h4 class="text-center mt-3">Registro</h4>
                    <div class="mb-3 mt-3">
                        <input type="email" class="form-control" id="email" placeholder="Correo electronico" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="user" placeholder="Nombre de Usuario" name="user">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="pass" placeholder="Contrasena" name="pass">
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>


    <script src="acciones.js"></script>
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>