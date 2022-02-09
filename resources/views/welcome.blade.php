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
            <a class="navbar-brand" href="{{ route('index') }}"><img src="imagenes/icono.png" height="32"/></a>
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
                            <li><a class="dropdown-item" href="{{ route('create-offer') }}">Crear publicacion</a></li>
                            <li><a class="dropdown-item" href="{{ route('edit-offer') }}">Editar publicacion</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarContacto" data-bs-toggle="offcanvas" role="button" title="Contactenos" aria-controls="sidebar">Contáctenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Filtro"data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
        aria-controls="offcanvasWithBothOptions">Filtros</a>
                    </li>
                </ul>
                <div class="col-md-3 text-end">
                    <!-- <ul> -->
                        @if(Auth::check())
                            <li><a href="/login" class="btn btn-outline-light me-2"
                            role="button">{{ Auth::user()->name }}</a></li>

                                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-primary">
                                    {{ __('Log Out') }}
                            </a>
                            </form>

                            





                        @else
                            <a type="button" class="btn btn-outline-light me-2" href="{{ route('login') }}">Ingresar</a>
                            <a type="button" class="btn btn-primary" href="{{ route('register') }}">Registrarse</a>
                        <!-- <li><a href="/login" class="nav-link"
                            role="button">Ingresar</a></li>
                        
                        <li><a href="/register" class="nav-link"
                            role="button">Registrarse</a></li> -->
                            
                            <!-- <ul>
                                <li><a href="#sidebarLogin" class="d-block mt-3" data-bs-toggle="offcanvas" 
                                    role="button" aria-controls="sidebar">Ingresar</a></li>
                                
                                <li><a href="#sidebarRegister" class="d-block mt-3" data-bs-toggle="offcanvas"
                                    role="button" aria-controls="sidebar">Registrarse</a></li>
                            </ul> -->
                        @endif
                    <!-- </ul> -->
                    <!-- <img src="imagenes/usuario.png" height="32"/> -->
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid" id="map-container">
        <div id="map"></div>
    </div>
    





    <!--
    <div class="container-fluid">
        <div class="col-9 border border-dark">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63631.04952501349!2d-74.13487051607082!3d4.604659548467998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f996b4508fa03%3A0x3d84c9f15dc19148!2sUniversidad%20Nacional%20de%20Colombia!5e0!3m2!1ses-419!2sco!4v1639255038954!5m2!1ses-419!2sco" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    -->


    <!--offCanvas login-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarLogin"    aria-labelledby="sidebar-label">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <!-- -----close button (don´t works i don´t know why)--------
            <button type="button" class="btn-close" data-bs-dimiss="offcanvas"aria-label="Close"></button>-->
        </div>
        <div class="offcanvas-body">
            <div id="login">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <h4 class="text-center mt-3">Iniciar sesion</h4>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="email" placeholder="Correo electrónico" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
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
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <h4 class="text-center mt-3">Registro</h4>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id=name" placeholder="Nombre" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="email" class="form-control" id="email" placeholder="Correo electronico" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirme Contrasena" name="password_confirmation">
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
        @component('components/offcanvas')
        <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarContacto"  aria-labelledby="sidebar-label">
            <div class="offcanvas-header">
                <h4 class="text-center mt-3">Contáctenos</h4>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        
            <div id="login">
                <form action="index.html" method="post">
                    <br>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                              General
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                              <strong>MiCasaYa</strong>
                              <br> 
                              <p>Contacto@micasaya.com</p>
                              <p><strong>Dirección:</strong>  Ac. 100 ##No 16-56, Bogotá</p>
                              <p><strong>Teléfono:</strong> (1) 1501000</p>
                              <p><strong>Fax:</strong> +420313414515</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                              Desarrolladores
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                              <p><strong>Diego Fernando Bello López</strong> <br> Dbello@unal.edu.co</p>
                              <p><strong>Oscar Javier Martinez Martinez</strong> <br> Ojmartinezma@unal.edu.co</p>
                              <p><strong>Santiago Alvarez Ricardo</strong> <br> Salvarezri@unal.edu.co</p>
                              <p><strong>José Ignacio Suárez Montiel</strong> <br> Josuarezm@unal.edu.co</p>
                              <p><strong>Diego Efraín Mojica Mendez</strong> <br> Dmojicam@unal.edu.co</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
        @endcomponent

            <!--offCanvas Marker-->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideBarMarker"
        aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-header">
            <h4 class="text mt-3">Información del inmueble</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imagenes/imagenCasa02.jpg" class="d-block w-100" alt="..." id="img1Marker">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/imagenCasa03.jpg" class="d-block w-100" alt="..." id="img2Marker">
                    </div>
                    <div class="carousel-item">
                        <img src="imagenes/imagenCasa04.jpg" class="d-block w-100" alt="..." id="img3Marker">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br>
        
            </br>

            <div class="container">
                <div class="mb-2 row">
                    <h3 for="neighborMarker"
                        class="col-sm-4  h3 text-secondary">Precio:
                    </h3>
                    <h3 for="neighborMarker"
                        class="col-sm-8  h3 text-primary " id="mainPrice">$100'000.000
                    </h3>
                </div>
                <div class="mb-2 row">
                    <h3 for="neighborMarker"
                        class="col-sm-4  h4 text-secondary">Tipo:
                    </h3>
                    <h3 for="neighborMarker"
                        class="col-sm-8  h4" id="mainType">Apartamento
                    </h3>
                </div>
                <div class="mb-2 row">
                    <h3 for="neighborMarker"
                        class="col-sm-4  h4 text-secondary" >Area:
                    </h3>
                    <h3 for="neighborMarker"
                        class="col-sm-8  h4" id="mainArea">50 m²
                    </h3>
                </div>
                <div class="mb-2 row">
                    <h3 for="neighborMarker"
                        class="col-sm-4  h4 text-secondary text-wrap">Ubicación:
                    </h3>
                    <h3 for="neighborMarker"
                        class="col-sm-8  h4 text-wrap" id="mainUbication">C 28, Ac. 3 #71, Bogotá
                    </h3>
                </div>
                

            </div>
            <br>
        
            </br>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Ubicación
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne">
                        <div class="accordion-body">
                            <div class="container">
                                <!--ciudad-->
                                <div class="mb-2 row">
                                    <label for="cityMarker" class="col-sm-3 col-form-label h3 fw-bold">Ciudad:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="cityMarker"
                                            value="Ciudad del Inmueble asdfasdfasdf asdfasdfasdf">
                                    </div>
                                </div>
                                <!--localidad-->
                                <div class="mb-2 row">
                                    <label for="LocalMarker"
                                        class="col-sm-3 col-form-label h3 fw-bold">Localidad:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="localMarker"
                                            value="Localidad del Inmueble">
                                    </div>
                                </div>
                                <!--barrio-->
                                <div class="mb-2 row">
                                    <label for="neighborMarker"
                                        class="col-sm-3 col-form-label h3 fw-bold">Barrio:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="neighborMarker"
                                            value="Barrio del Inmueble">
                                    </div>
                                </div>
                                <!--dirección-->
                                <div class="mb-2 row">
                                    <label for="dirMarker" class="col-sm-3 col-form-label h3 fw-bold">Dirección:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="dirMarker"
                                            value="Dirección del inmueble">
                                    </div>
                                </div>
                                <!--estrato-->
                                <div class="mb-2 row">
                                    <label for="estrMarker" class="col-sm-3 col-form-label h3 fw-bold">Estrato:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="estrMarker"
                                            value="Estrato del inmueble">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Características
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo">
                        <div class="accordion-body">
                            <div class="container">
                                <!--area-->
                                <div class="mb-2 row">
                                    <label for="areaMarker" class="col-sm-4 col-form-label h3 fw-bold">Área:</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="areaMarker"
                                            value="Área del inmueble">
                                    </div>
                                </div>
                                <!--rooms-->
                                <div class="mb-2 row">
                                    <label for="roomsMarker"
                                        class="col-sm-4 col-form-label h3 fw-bold">Habitaciones:</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="roomsMarker"
                                            value="Habitaciones del inmueble">
                                    </div>
                                </div>
                                <!--bethrooms-->
                                <div class="mb-2 row">
                                    <label for="bathroomMarker"
                                        class="col-sm-4 col-form-label h3 fw-bold">Baños:</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="bathroomMarker"
                                            value="Número de baños del inmueble">
                                    </div>
                                </div>
                                <!--floors-->
                                <div class="mb-2 row">
                                    <label for="floorsMarker"
                                        class="col-sm-4 col-form-label h3 fw-bold">Plantas:</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="floorsMarker"
                                            value="Número de plantas del inmueble">
                                    </div>
                                </div>
                                <!--parking-->
                                <div class="mb-2 row">
                                    <label for="parkingMarker"
                                        class="col-sm-4 col-form-label h3 fw-bold">Parqueadero:</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="parkingMarker"
                                            value="¿Tiene parqueadero?">
                                    </div>
                                </div>
                                <!--features-->
                                <div class="mb-2 row">
                                    <label for="featuresMarker"
                                        class="col-sm-7 col-form-label h4 fw-bold">Otras características:</label>
                                    <ul class="list-group list-group-flush" id="featuresMarker">
                                        <li class="list-group-item">Piscina</li>
                                        <li class="list-group-item">Parrilla</li>
                                        <li class="list-group-item">Amueblado</li>
                                        <li class="list-group-item">Jardín</li>
                                        <li class="list-group-item">Fuente</li>
                                      </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Precio y contacto
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree">
                        <div class="accordion-body">
                            <div class="container">
                                <!--precio-->
                                <div class="mb-2 row">
                                    <label for="priceMarker" class="col-sm-3 col-form-label h3 fw-bold">Precio:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="priceMarker"
                                            value="Precio inmueble">
                                    </div>
                                </div>
                                <!--usuario-->
                                <div class="mb-2 row">
                                    <label for="userMarker" class="col-sm-3 col-form-label h3 fw-bold">Usuario:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="userMarker"
                                            value="Usuario contacto">
                                    </div>
                                </div>
                                <!--celular-->
                                <div class="mb-2 row">
                                    <label for="celMarker" class="col-sm-3 col-form-label h3 fw-bold">Celular:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="celMarker"
                                            value="Celular de contacto">
                                    </div>
                                </div>
                                <!--correo-->
                                <div class="mb-2 row">
                                    <label for="emailMarker" class="col-sm-3 col-form-label h3 fw-bold">email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="emailMarker"
                                            value="correo de contacto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            
        </div>
    </div>
	
	


        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">FILTROS</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Seleccione una opción de filtro y el valor que desea aplicarle. Repita este proceso hasta agregar los
                filtros deseados y presione el botón de filtrar</p>

            <div class="accordion accordion-flush" id="accordionFilters">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseType" aria-expanded="false"
                            aria-controls="flush-collapseType">
                            Tipo
                        </button>
                    </h2>
                    <div id="flush-collapseType" class="accordion-collapse collapse" aria-labelledby="flush-headingType"
                        data-bs-parent="#accordionFilters">
                        <div class="accordion-body">
                            <div id="btnGroupType" class="btn-group" role="group"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradioType" id="btnradioTypeCasa"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioTypeCasa">Casa</label>

                                <input type="radio" class="btn-check" name="btnradioType" id="btnradioTypeApartamento"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioTypeApartamento">Apartamento</label>

                                <input type="radio" class="btn-check" name="btnradioType" id="btnradioTypeOficina"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioTypeOficina">Oficina</label>

                                <input type="radio" class="btn-check" name="btnradioType" id="btnradioTypeBodega"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioTypeBodega">Bodega</label>
                            </div>
                            <p>

                            </p>
                            <input type="radio" class="btn-check" name="btnradioType" id="btnradioTypeAny"
                                autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradioTypeAny">Todos</label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFilters">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapsePrice" aria-expanded="false"
                            aria-controls="flush-collapsePrice">
                            Precio
                        </button>
                    </h2>
                    <div id="flush-collapsePrice" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFilters">
                        <div class="accordion-body">
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white col-sm-5"
                                    id="FiltersminValueText">Valor mínimo</span>
                                <input type="number" id="FiltersminValueInput" aria-label="MinValue"
                                    class="form-control col-sm-7">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white col-sm-5"
                                    id="FiltersmaxValueText">Valor máximo</span>
                                <input type="number" id="FiltersmaxValueInput" aria-label="MaxValue"
                                    class="form-control col-sm-7">
                            </div>
                            <p>

                            </p>
                            <input type="checkbox" class="btn-check" name="btnradioPrice" id="btnradioPriceAny"
                                autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradioPriceAny">Todos</label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingArea">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseArea" aria-expanded="false"
                            aria-controls="flush-collapseArea">
                            Área
                        </button>
                    </h2>
                    <div id="flush-collapseArea" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFilters">
                        <div class="accordion-body">
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white col-sm-5"
                                    id="FiltersminAreaText">Área mínima</span>
                                <input type="number" id="FiltersminAreaInput" aria-label="MinArea"
                                    class="form-control col-sm-7">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white col-sm-5"
                                    id="FiltersmaxAreaText">Área máxima</span>
                                <input type="number" id="FiltersmaxAreaInput" aria-label="MaxArea"
                                    class="form-control col-sm-7">
                            </div>
                            <p>

                            </p>
                            <input type="checkbox" class="btn-check" name="btnradioArea" id="btnradioAreaAny"
                                autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradioAreaAny">Todos</label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseEst" aria-expanded="false" aria-controls="flush-collapseEst">
                            Estrato
                        </button>
                    </h2>
                    <div id="flush-collapseEst" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                        data-bs-parent="#accordionFilters">
                        <div class="accordion-body">
                            <div id="btnGroupType" class="btn-group" role="group"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradioEst" id="btnradioEst1"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioEst1">1</label>

                                <input type="radio" class="btn-check" name="btnradioEst" id="btnradioEst2"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioEst2">2</label>

                                <input type="radio" class="btn-check" name="btnradioEst" id="btnradioEst3"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioEst3">3</label>

                                <input type="radio" class="btn-check" name="btnradioEst" id="btnradioEst4"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioEst4">4</label>

                                <input type="radio" class="btn-check" name="btnradioEst" id="btnradioEst5"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioEst5">5</label>

                                <input type="radio" class="btn-check" name="btnradioEst" id="btnradioEst6"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary" for="btnradioEst6">6</label>
                            </div>
                            <p>

                            </p>
                            <input type="radio" class="btn-check" name="btnradioEst" id="btnradioEstAny"
                                autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradioEstAny">Todos</label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFloors" aria-expanded="false"
                            aria-controls="flush-collapseFloors">
                            Número de plantas
                        </button>
                    </h2>
                    <div id="flush-collapseFloors" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFilters">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-secondary text-white" >
                                    Número de plantas:</span>
                                <input type="number" id="FiltersNumberFloors" class="form-control" aria-label="Plantas"
                                    aria-describedby="FiltersNumberFloors">
                            </div>
                            <p>

                            </p>
                            <input type="checkbox" class="btn-check" name="btnradioFloors" id="btnradioFloorsAny"
                                autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradioFloorsAny">Todos</label>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFeatures" aria-expanded="false"
                            aria-controls="flush-collapseFeatures">
                            Características
                        </button>
                    </h2>
                    <div id="flush-collapseFeatures" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFilters">
                        <div class="accordion-body">
                            <div class="form-floating">
                                <select class="form-select border-secondary" id="floatingSelectFeatures"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Todas</option>
                                    <option value="1">Vigilancia</option>
                                    <option value="2">Parqueadero</option>
                                    <option value="3">Amueblado</option>
                                </select>
                                <label class="" for="floatingSelect">Seleccióne la característica</label>
                            </div>
                            <p>

                            </p>
                            <input type="checkbox" class="btn-check" name="btnradioFeatures" id="btnradioFeaturesAny"
                                    autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradioFeaturesAny">Todos</label>
                        </div>
                    </div>
                </div>
            </div>
            <p>


            </p>
            <div class="container-fluid">
                <div class="row">
                    <button type="button" id="btnCleanFilters" class="btn btn-secondary col-5">Limpiar filtros</button> 
                    <div class="col-2"></div> 
                    <button type="button" id="btnInitFilters" class="btn btn-primary col-5">Filtrar</button>
                </div>
            </div>
        </div>
    </div>

    

        <!--markercluster library-->
        <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <!------------------------------------------------->


    <script src="js/acciones.js"></script>
    <script src="js/filters.js" ></script>
    <script src="js/Property.js"></script>
    <script src="js/AppMarker.js"></script>
    <script src="js/MapApp.js"></script>
    <script src="js/app.js"></script>

    <script async="false"
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>