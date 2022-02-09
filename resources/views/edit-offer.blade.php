<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Vivienda, Compraventa">
    <title>Editar Oferta</title>
    <link rel="icon" type="image/png" href="../imagenes/icono.png" />
    <link href="../estilos.css" rel="stylesheet" type="text/css" />
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

    <div class="container-fluid">
        <?php

        use Illuminate\Support\Facades\DB;
        //$estates = DB::connection()->table('estates')->where('user_id', '=', auth()->user()->id)->get();
        $estates = DB::connection()->table('estates')->where('user_id',Auth::user()->id)->get();
        if (!($estates->isEmpty())) {

        ?>
            <table class="table table-striped w-75 mx-auto text-center">
                <thead>
                    <tr>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Localidad</th>
                        <th>Barrio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($estates as $estate) {
                        $offer_id = $estate->id;
                    ?>
                        <tr>
                            <td><?php echo $estate->address ?></td>
                            <td><?php echo $estate->city ?></td>
                            <td><?php echo $estate->loc ?></td>
                            <td><?php echo $estate->neighborhood ?></td>
                            <td>
                                <form action="{!! route('edit-offer')!!}" method="POST">
                                    @csrf
                                    <input type="text" value="<?php echo $offer_id ?>" name="editar" id="editar" class="d-none">
                                    <button class="btn btn-info" type="submit">Editar</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                No tiene ofertas, puede crear una en <a href="{{ route('create-offer') }}" class="alert-link">Crear publicacion</a>.
            </div>
        <?php
        }
        ?>
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
</body>

</html>