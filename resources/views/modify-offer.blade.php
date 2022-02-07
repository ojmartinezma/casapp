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
            <a class="navbar-brand" href="{{ route('index') }}"><img src="../imagenes/icono.png" /></a>
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
                </ul>
                <div class="navbar-nav d-flex usuario">
                    <ul>
                        <li><a class="d-block mt-3" id="userName" aria-controls="sidebar">Nombre de usuario</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Cuenta</a>
                            <ul class="dropdown-menu">
                                <li><a href="#sidebarAccSettings" class="dropdown-item d-block text-dark" data-bs-toggle="offcanvas" role="button" aria-controls="sidebar">Ajustes de cuenta</a></li>
                                <li><a class="dropdown-item text-dark" href="{{ route('index') }}">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                    <img src="../imagenes/usuario.png" />
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php

        use Illuminate\Support\Facades\DB;

        session_start();
        $offer_id = session('offer_id');

        $estate = DB::connection('mysql2')->table('estates')->where('id', '=', $offer_id)->get();
        if (!($estate->isEmpty())) {
            foreach ($estate as $estate) {
        ?>
                <h1 class="titulo display-5 d-flex justify-content-start">Editar anuncio</h1>


                <br>
                <br>

                <div class="col-12 d-flex justify-content-center ">

                    <div class="content-2">

                        <form action="{!! route('modify-offer')!!}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">




                                    <label for="nombre" class="form-label">Nombre</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">mail</span> -->
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Se vende apartamento en Bogotá..." value="{{ old('nombre')}}">
                                        {!! $errors ->first('nombre', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa el nombre tu anuncio. </div>
                                    </div>
                                    <br>
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">mail</span> -->
                                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="carrera 43a..." value="<?php echo $estate->address ?>">
                                        {!! $errors ->first('direccion', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa la direccion de tu inmueble.</div>
                                    </div>
                                    <br>

                                    <label for="area" class="form-label">Area</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">mail</span> -->
                                        <input type="number" class="form-control" name="area" id="area" placeholder="70.00" value="<?php echo $estate->area ?>">
                                        {!! $errors ->first('area', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa el area en metros cuadrados.</div>
                                    </div>
                                    <br>

                                    <label for="barrio" class="form-label">Barrio</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">account_circle</span> -->
                                        <input type="text" class="form-control" name="barrio" id="barrio" placeholder="San Antonio" value="<?php echo $estate->neighborhood ?>">
                                        {!! $errors ->first('barrio', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa el barrio</div>
                                    </div>

                                    <br>

                                    <label for="estrato" class="form-label">Estrato</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">account_circle</span> -->
                                        <input type="number" class="form-control" name="estrato" id="estrato" placeholder="3" value="<?php echo $estate->estr ?>">
                                        {!! $errors ->first('estrato', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa el estrato</div>
                                    </div>

                                    <br>

                                </div>
                                <div class="col">


                                    <label for="habitaciones" class="form-label">Habitaciones</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">phone</span> -->
                                        <input type="number" class="form-control" name="habitaciones" id="habitaciones" placeholder="3" value="<?php echo $estate->rooms ?>">
                                        {!! $errors ->first('habitaciones', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa el numero de habitaciones</div>
                                    </div>

                                    <br>


                                    <label for="banos" class="form-label">Baños</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">account_circle</span> -->
                                        <input type="number" class="form-control" name="baños" id="baños" placeholder="Ingrese el numero de baños" value="<?php echo $estate->toilets ?>">
                                        {!! $errors ->first('baños', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa el numero de baños</div>
                                    </div>

                                    <br>


                                    <label for="garajes" class="form-label">Garajes</label>
                                    <div class="fieldbox">
                                        <!-- <span class="material-icons">account_circle</span> -->
                                        <input type="number" class="form-control" name="garajes" id="garajes" placeholder="0" value="<?php echo $estate->parking ?>">
                                        {!! $errors ->first('garajes', '<small style="color:red">:message</small><br>') !!}
                                        <div id="nombreHelp" class="form-text">Ingresa el numero de garajes</div>
                                    </div>

                                    <br>


                                    <label for="precio" class="form-label">Precio</label>
                                    <div class="fieldbox input-group mb-2">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" name="precio" id="precio" placeholder="1.800.000" value="<?php echo $estate->value ?>">
                                        {!! $errors ->first('precio', '<small style="color:red">:message</small><br>') !!}
                                    </div>
                                    <div id="nombreHelp" class="form-text">Ingresa el precio, si el contrato es de arriendo, ingrese la renta mensual.</div>
                                </div>
                                <br>
                            </div>
                            <label for="tipo" class="form-label">Tipo</label>

                            <select name="tipo" id="tipo" class="form-select" aria-label="Default select example" value="<?php echo $estate->type ?>">
                                {!! $errors ->first('tipo', '<small style="color:red">:message</small><br>') !!}
                                <option value="1" <?php if ($estate->type == 1) { ?>selected<?php } ?>>Arriendo</option>
                                <option value="2" <?php if ($estate->type == 2) { ?>selected<?php } ?>>Venta</option>
                            </select>



                            <br>

                            <div class="col-7">


                                <label for="foto" class="form-label">Foto</label>
                                <div class="fieldbox">
                                    <!-- <span class="material-icons">account_circle</span> -->
                                    <input type="file" class="form-control" name="foto" id="foto" size="48" maxlength="25" placeholder="Ingrese una foto" value="{{ old('foto')}}">
                                    {!! $errors ->first('foto', '<small style="color:red">:message</small><br>') !!}
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary boton" type="submit" id="actualizar" role="button">Actualizar</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteOffer">Eliminar</button>
                        </form>

                    </div>



                </div>

            <?php
            }
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
                <form action="index.html" method="post">
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