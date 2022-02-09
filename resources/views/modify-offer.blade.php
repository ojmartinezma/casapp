<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=5" />
    <link rel="icon" href="../imagenes/icono.png" />
    <link rel="stylesheet" type="text/css" href="../estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <title>Editar oferta</title>
</head>

<body onload="cargarPagina()">
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
                            <!-- <li><a href="/login" class="nav-link"
                            role="button">{{ Auth::user()->name }}</a></li> -->

                            





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
    <div class="container">
        <?php

        use Illuminate\Support\Facades\DB;

        session_start();
        $offer_id = session('offer_id');

        $estate = DB::connection()->table('estates')->where('id', '=', $offer_id)->get();
        $city;
        $neighborhood;
        $area;
        $rooms;
        $type;
        $value;
        $latitude;
        $longitude;
        $Estates_id;
        if (!($estate->isEmpty())) {
            foreach ($estate as $estate) {
                $city = $estate->city;
                $neighborhood = $estate->neighborhood;
                $area = $estate->area;
                $rooms = $estate->rooms;
                $type = $estate->type;
                $value = $estate->value;
                $latitude = $estate->latitude;
                $longitude = $estate->longitude;
                $Estates_id = $estate->id;
        ?>
                <h1 class="titulo display-5 d-flex justify-content-start">Editar anuncio</h1>


                <br>
                <br>

                <div class="col-12 d-flex justify-content-center ">

                    <div class="content-2">

                        <form action="{!! route('modify-offer')!!}" method="POST">
                            @csrf
                            <div class="row" style="width:700px">
                                <div class="col">

                                    <label for="direccion" class="form-label">Dirección</label>
                                    <div class="fieldbox">
                                        <input type="text" class="form-control" name="dirección" id="dirección" placeholder="carrera 43a..." value="<?php echo $estate->address ?>">
                                        {!! $errors ->first('dirección', '<small style="color:red">:message</small><br>') !!}
                                        <div id="direcciónHelp" class="form-text">Ingresa la dirección de tu inmueble.</div>
                                    </div>
                                    <br>

                                    <label for="localidad" class="form-label">Localidad</label>
                                    <div class="fieldbox">
                                        <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Teusaquillo" value="<?php echo $estate->loc ?>">
                                        {!! $errors ->first('localidad', '<small style="color:red">:message</small><br>') !!}
                                        <div id="localidadHelp" class="form-text">Ingresa la localidad.</div>
                                    </div>
                                    <br>

                                    <label for="estrato" class="form-label">Estrato</label>
                                    <div class="fieldbox">
                                        <input type="number" class="form-control" name="estrato" id="estrato" placeholder="3" value="<?php echo $estate->estr ?>">
                                        {!! $errors ->first('estrato', '<small style="color:red">:message</small><br>') !!}
                                        <div id="estratoHelp" class="form-text">Ingresa el estrato.</div>
                                    </div>

                                    <br>

                                    <label for="pisos" class="form-label">Pisos</label>
                                    <div class="fieldbox">
                                        <input type="number" class="form-control" name="pisos" id="pisos" placeholder="2" value="<?php echo $estate->floors ?>">
                                        {!! $errors ->first('pisos', '<small style="color:red">:message</small><br>') !!}
                                        <div id="pisosHelp" class="form-text">Ingresa el número de pisos.</div>
                                    </div>

                                    <br>

                                    <label for="baños" class="form-label">Baños</label>
                                    <div class="fieldbox">
                                        <input type="number" class="form-control" name="baños" id="baños" placeholder="1" value="<?php echo $estate->toilets ?>">
                                        {!! $errors ->first('baños', '<small style="color:red">:message</small><br>') !!}
                                        <div id="bañosHelp" class="form-text">Ingresa el número de baños.</div>
                                    </div>

                                    <br>

                                    <label for="parqueadero" class="form-label">Parqueadero</label>
                                    <select name="parqueadero" id="parqueadero" class="form-select" aria-label="Default select example" value="<?php echo $estate->parking ?>">
                                        {!! $errors ->first('parqueadero', '<small style="color:red">:message</small><br>') !!}
                                        <option value="0" <?php if ($estate->parking == 0) { ?>selected<?php } ?>>No</option>
                                        <option value="1" <?php if ($estate->parking == 1) { ?>selected<?php } ?>>Si</option>
                                    </select>
                                    <div id="parqueaderoHelp" class="form-text">Ingresa si el inmueble tiene o no parqueadero.</div>
                                    <br>
                                    <?php
                                }
                                $features = DB::connection()->table('features')->where('estate_id', '=', $estate->id)->get();
                                if (!($features->isEmpty())) {
                                    foreach ($features as $feature) {
                                    ?>
                                        <label for="sótano" class="form-label">Sótano</label>
                                        <select name="sótano" id="sótano" class="form-select" aria-label="Default select example" value="<?php echo $feature->basement ?>">
                                            {!! $errors ->first('sótano', '<small style="color:red">:message</small><br>') !!}
                                            <option value="0" <?php if ($feature->basement == 0) { ?>selected<?php } ?>>No</option>
                                            <option value="1" <?php if ($feature->basement == 1) { ?>selected<?php } ?>>Si</option>
                                        </select>
                                        <div id="sótanoHelp" class="form-text">Ingresa si el inmueble tiene o no sótano.</div>
                                        <br>

                                        <label for="seguridad" class="form-label">Seguridad</label>
                                        <select name="seguridad" id="sótano" class="form-select" aria-label="Default select example" value="<?php echo $feature->security ?>">
                                            {!! $errors ->first('seguridad', '<small style="color:red">:message</small><br>') !!}
                                            <option value="0" <?php if ($feature->security == 0) { ?>selected<?php } ?>>No</option>
                                            <option value="1" <?php if ($feature->security == 1) { ?>selected<?php } ?>>Si</option>
                                        </select>
                                        <div id="seguridadHelp" class="form-text">Ingresa si el inmueble tiene o no seguridad.</div>
                                        <br>

                                </div>
                                <div class="col">

                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <div class="fieldbox">
                                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Bogotá" value="<?php echo $city ?>">
                                        {!! $errors ->first('ciudad', '<small style="color:red">:message</small><br>') !!}
                                        <div id="ciudadHelp" class="form-text">Ingresa la ciudad.</div>
                                    </div>

                                    <br>

                                    <label for="barrio" class="form-label">Barrio</label>
                                    <div class="fieldbox">
                                        <input type="text" class="form-control" name="barrio" id="barrio" placeholder="San Antonio" value="<?php echo $neighborhood ?>">
                                        {!! $errors ->first('barrio', '<small style="color:red">:message</small><br>') !!}
                                        <div id="barrioHelp" class="form-text">Ingresa el barrio.</div>
                                    </div>
                                    <br>

                                    <label for="área" class="form-label">Área</label>
                                    <div class="fieldbox">
                                        <input type="number" class="form-control" name="área" id="área" placeholder="70" value="<?php echo $area ?>">
                                        {!! $errors ->first('área', '<small style="color:red">:message</small><br>') !!}
                                        <div id="áreaHelp" class="form-text">Ingresa el área en metros cuadrados.</div>
                                    </div>

                                    <br>

                                    <label for="habitaciones" class="form-label">Habitaciones</label>
                                    <div class="fieldbox">
                                        <input type="number" class="form-control" name="habitaciones" id="habitaciones" placeholder="3" value="<?php echo $rooms ?>">
                                        {!! $errors ->first('habitaciones', '<small style="color:red">:message</small><br>') !!}
                                        <div id="habitacionesHelp" class="form-text">Ingresa el número de habitaciones.</div>
                                    </div>

                                    <br>
                                    <label for="tipo" class="form-label">Tipo</label>

                                    <select name="tipo" id="tipo" class="form-select" aria-label="Default select example" value="<?php echo $type ?>">
                                        {!! $errors ->first('tipo', '<small style="color:red">:message</small><br>') !!}
                                        <option value="0" <?php if ($type == 0) { ?>selected<?php } ?>>Casa</option>
                                        <option value="1" <?php if ($type == 1) { ?>selected<?php } ?>>Apartamento</option>
                                    </select>
                                    <div id="tipoHelp" class="form-text">Ingresa si el inmueble es casa o apartamento.</div>
                                    <br>

                                    <label for="amueblado" class="form-label">Amueblado</label>
                                    <select name="amueblado" id="amueblado" class="form-select" aria-label="Default select example" value="<?php echo $feature->furnished ?>">
                                        {!! $errors ->first('amueblado', '<small style="color:red">:message</small><br>') !!}
                                        <option value="0" <?php if ($feature->furnished == 0) { ?>selected<?php } ?>>No</option>
                                        <option value="1" <?php if ($feature->furnished == 1) { ?>selected<?php } ?>>Si</option>
                                    </select>
                                    <div id="amuebladoHelp" class="form-text">Ingresa si el inmueble está o no amueblado.</div>
                                    <br>

                                    <label for="terraza" class="form-label">Terraza</label>
                                    <select name="terraza" id="terraza" class="form-select" aria-label="Default select example" value="<?php echo $feature->terrace ?>">
                                        {!! $errors ->first('terraza', '<small style="color:red">:message</small><br>') !!}
                                        <option value="0" <?php if ($feature->terrace == 0) { ?>selected<?php } ?>>No</option>
                                        <option value="1" <?php if ($feature->terrace == 1) { ?>selected<?php } ?>>Si</option>
                                    </select>
                                    <div id="terrazaHelp" class="form-text">Ingresa si el inmueble tiene o no terraza.</div>
                                    <br>

                                    <label for="valor" class="form-label">Valor</label>
                                    <div class="fieldbox input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" name="valor" id="valor" placeholder="1.800.000" value="<?php echo $value ?>">
                                    </div>
                                    {!! $errors ->first('valor', '<small style="color:red">:message</small><br>') !!}
                                    <div id="valorHelp" class="form-text">Ingresa el valor de tu inmueble.</div>

                                    <br>

                                </div>

                        <?php
                                    }
                                }
                                $images = DB::connection()->table('images')->where('estate_id', '=', $Estates_id)->get();
                                if (!($images->isEmpty())) {
                                    $fotos = array();
                                    $i = 1;
                                    foreach ($images as $image) {
                                        array_push($fotos, $image->url);
                                    }

                        ?>
                            <label for="fotos" class="form-label">Fotos</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="foto1" id="foto1" placeholder="URL 1" value="<?php echo $fotos[0] ?>">
                                {!! $errors ->first('foto1', '<small style="color:red">:message</small><br>') !!}
                                <div id="foto1Help" class="form-text">Ingresa la URL de la primera foto.</div>
                                <img src="<?php echo $fotos[0] ?>" width="100px">
                            </div>
                            <br>
                            <div class="fieldbox mt-3">
                                <input type="text" class="form-control" name="foto2" id="foto2" placeholder="URL 2" value="<?php echo $fotos[1] ?>">
                                {!! $errors ->first('foto2', '<small style="color:red">:message</small><br>') !!}
                                <div id="foto2Help" class="form-text">Ingresa la URL de la segunda foto.</div>
                                <img src="<?php echo $fotos[1] ?>" width="100px">                            </div>
                            <br>
                            <div class="fieldbox mt-3 mb-3">
                                <input type="text" class="form-control" name="foto3" id="foto3" placeholder="URL 3" value="<?php echo $fotos[2] ?>">
                                {!! $errors ->first('foto3', '<small style="color:red">:message</small><br>') !!}
                                <div id="foto3Help" class="form-text">Ingresa la URL de la tercera foto.</div>
                                <img src="<?php echo $fotos[2] ?>" width="100px">                            </div>
                            <br>
                            <label for="coordenadas" class="form-label">Coordenadas</label>
                        <br>
                        <i>
                            Por favor, ingresa la latitud y longitud donde está ubicado tu inmueble, para mostrarlo en el mapa interactivo.
                            Puedes consultarlos en el siguiente <a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">link</a>.
                        </i>
                        <br>
                        <div class="col">
                            <label for="latitud" class="form-label mt-3">Latitud</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="latitud" id="latitud" placeholder="4.680880" value="<?php echo $latitude ?>">
                                {!! $errors ->first('latitud', '<small style="color:red">:message</small><br>') !!}
                                <div id="latitudHelp" class="form-text">Ingresa la latitud donde está ubicado tu inmueble.</div>
                            </div>
                            <br>
                        </div>
                        <div class="col">
                            <label for="longitud" class="form-label mt-3">Longitud</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="longitud" id="longitud" placeholder="-74.114110" value="<?php echo $longitude ?>">
                                {!! $errors ->first('longitud', '<small style="color:red">:message</small><br>') !!}
                                <div id="longitudHelp" class="form-text">Ingresa la longitud donde está ubicado tu inmueble.</div>
                            </div>
                        </div>
                        </div>
                    <?php
                                }
                    ?>
                    <br>
                    <button class="btn btn-primary boton" type="submit" id="actualizar" role="button">Actualizar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteOffer">Eliminar</button>
                        </form>

                    </div>



                </div>

            <?php
        } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Esta oferta no existe, puede crear una en <a href="{{ route('create-offer') }}" class="alert-link">Crear publicacion</a>.
                </div>
            <?php
        }
            ?>
    </div>

    <!--modal delete offer-->
    <div class="modal fade" id="modalDeleteOffer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Eliminar oferta</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3 row">
                            <h6 class="modal-title" id="modalQuestionDelete">¿Está seguro/a de eliminar el anuncio?</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{!! route('modify-offer')!!}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-75" id="modalAnswerDeleteYes" name="modalAnswerDeleteYes" value="Si">Si</button>
                        <button type="button" class="btn btn-secondary w-75" id="modalAnswerDeleteNo" name="modalAnswerDeleteNo" data-bs-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--offCanvas account settings-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarAccSettings" aria-labelledby="sidebar-label">
        <div class="offcanvas-header">
            <h2 class="text-center mt-3">Ajustes de cuenta</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div id="register">
                <form action="#" method="post">
                @csrf
                    <h4 class="text mt-3">Información básica</h4>
                    <div class="container">
                        <!--name-->
                        <div class="mb-3 row">
                            <label for="actualName" class="col-sm-3 col-form-label h3 fw-bold">Nombres:</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="actualName" value="Pepito">
                            </div>
                            <button class="btn btn-primary col-sm-3" type="button" data-bs-toggle="modal" data-bs-target="#modalChangeName">Cambiar</button>
                        </div>
                        <!--last name-->
                        <div class="mb-3 row">
                            <label for="actualLastName" class="col-sm-3 col-form-label h3 fw-bold">Apellidos:</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="actualLastName" value="Pérez">
                            </div>
                            <button class="btn btn-primary col-sm-3" type="button">Cambiar</button>
                        </div>

                    </div>
                    <h4 class="text mt-3">Información de contacto</h4>
                    <div class="container">
                        <!--email-->
                        <div class="mb-3 row">
                            <label for="actualEmail" class="col-sm-3 col-form-label h3 fw-bold">Correo:</label>
                            <div class="col-sm-6">
                                <input type="email" readonly class="form-control-plaintext" id="actualMail" value="pepito@gmail.com">
                            </div>
                            <button class="btn btn-primary col-sm-3" type="button">Cambiar</button>
                        </div>
                        <!--cell phone-->
                        <div class="mb-3 row">
                            <label for="actualCellPhone" class="col-sm-3 col-form-label h3 fw-bold">Celular:</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="actualCellPhone" value="1234567890">
                            </div>
                            <button class="btn btn-primary col-sm-3" type="button">Cambiar</button>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- Modal change name / suername-->
    <div class="modal fade" id="modalChangeName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Cambiar nombre</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3 row">
                            <h6 class="modal-title" id="modalActualName">Pepito Pérez</h6>
                        </div>
                        <div class="mb-3 row">
                            <input type="text" class="form-control" id="modalNewName" placeholder="Nuevo nombre" name="newName">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cambiar</button>
                </div>
            </div>
        </div>
    </div>

    <!--offCanvas contacto-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarContacto" aria-labelledby="sidebar-label">
        <div class="offcanvas-header">
            <h4 class="text-center mt-3">Contáctenos</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
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
                                    <p><strong>Dirección:</strong> Ac. 100 ##No 16-56, Bogotá</p>
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
    </div>
    <script src="../acciones.js"></script>
    <script src="../app.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>