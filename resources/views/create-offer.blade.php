<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=5" />
    <link rel="icon" href="../imagenes/icono.png" />
    <link rel="stylesheet" type="text/css" href="../estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <title>Crear oferta</title>
</head>

<body>
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



        <h1 class="titulo display-5 d-flex justify-content-start">Publica tu anuncio</h1>


        <br>
        <br>


        <div class="col-12 d-flex justify-content-center ">

            <div class="content">


                <form action="{!! route('create-offer')!!}" method="POST">
                    @csrf
                    <div class="row" style="width:700px">
                        <div class="col">

                            <label for="direccion" class="form-label">Dirección</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="dirección" id="dirección" placeholder="Avenida Calle 53" value="{{ old('dirección')}}">
                                {!! $errors ->first('dirección', '<small style="color:red">:message</small><br>') !!}
                                <div id="direcciónHelp" class="form-text">Ingresa la dirección de tu inmueble.</div>
                            </div>
                            <br>

                            <label for="localidad" class="form-label">Localidad</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Teusaquillo" value="{{ old('localidad')}}">
                                {!! $errors ->first('localidad', '<small style="color:red">:message</small><br>') !!}
                                <div id="localidadHelp" class="form-text">Ingresa la localidad.</div>
                            </div>
                            <br>

                            <label for="estrato" class="form-label">Estrato</label>
                            <div class="fieldbox">
                                <input type="number" class="form-control" name="estrato" id="estrato" placeholder="3" value="{{ old('estrato')}}">
                                {!! $errors ->first('estrato', '<small style="color:red">:message</small><br>') !!}
                                <div id="estratoHelp" class="form-text">Ingresa el estrato.</div>
                            </div>

                            <br>

                            <label for="pisos" class="form-label">Pisos</label>
                            <div class="fieldbox">
                                <input type="number" class="form-control" name="pisos" id="pisos" placeholder="2" value="{{ old('pisos')}}">
                                {!! $errors ->first('pisos', '<small style="color:red">:message</small><br>') !!}
                                <div id="pisosHelp" class="form-text">Ingresa el número de pisos.</div>
                            </div>

                            <br>

                            <label for="baños" class="form-label">Baños</label>
                            <div class="fieldbox">
                                <input type="number" class="form-control" name="baños" id="baños" placeholder="1" value="{{ old('baños')}}">
                                {!! $errors ->first('baños', '<small style="color:red">:message</small><br>') !!}
                                <div id="bañosHelp" class="form-text">Ingresa el número de baños.</div>
                            </div>

                            <br>

                            <label for="parqueadero" class="form-label">Parqueadero</label>
                            <select name="parqueadero" id="parqueadero" class="form-select" aria-label="Default select example" value="{{ old('parqueadero')}}">
                                {!! $errors ->first('parqueadero', '<small style="color:red">:message</small><br>') !!}
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            <div id="parqueaderoHelp" class="form-text">Ingresa si el inmueble tiene o no parqueadero.</div>
                            <br>

                            <label for="sótano" class="form-label">Sótano</label>
                            <select name="sótano" id="sótano" class="form-select" aria-label="Default select example" value="{{ old('sótano')}}">
                                {!! $errors ->first('sótano', '<small style="color:red">:message</small><br>') !!}
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            <div id="sótanoHelp" class="form-text">Ingresa si el inmueble tiene o no sótano.</div>
                            <br>

                            <label for="seguridad" class="form-label">Seguridad</label>
                            <select name="seguridad" id="sótano" class="form-select" aria-label="Default select example" value="{{ old('seguridad')}}">
                                {!! $errors ->first('seguridad', '<small style="color:red">:message</small><br>') !!}
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            <div id="seguridadHelp" class="form-text">Ingresa si el inmueble tiene o no seguridad.</div>
                            <br>

                        </div>
                        <div class="col">

                            <label for="ciudad" class="form-label">Ciudad</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Bogotá" value="{{ old('ciudad')}}">
                                {!! $errors ->first('ciudad', '<small style="color:red">:message</small><br>') !!}
                                <div id="ciudadHelp" class="form-text">Ingresa la ciudad.</div>
                            </div>

                            <br>

                            <label for="barrio" class="form-label">Barrio</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="barrio" id="barrio" placeholder="Galerías" value="{{ old('barrio')}}">
                                {!! $errors ->first('barrio', '<small style="color:red">:message</small><br>') !!}
                                <div id="barrioHelp" class="form-text">Ingresa el barrio.</div>
                            </div>
                            <br>

                            <label for="área" class="form-label">Área</label>
                            <div class="fieldbox">
                                <input type="number" class="form-control" name="área" id="área" placeholder="70" value="{{ old('área')}}">
                                {!! $errors ->first('área', '<small style="color:red">:message</small><br>') !!}
                                <div id="áreaHelp" class="form-text">Ingresa el área en metros cuadrados.</div>
                            </div>

                            <br>

                            <label for="habitaciones" class="form-label">Habitaciones</label>
                            <div class="fieldbox">
                                <input type="number" class="form-control" name="habitaciones" id="habitaciones" placeholder="3" value="{{ old('habitaciones')}}">
                                {!! $errors ->first('habitaciones', '<small style="color:red">:message</small><br>') !!}
                                <div id="habitacionesHelp" class="form-text">Ingresa el número de habitaciones.</div>
                            </div>

                            <br>
                            <label for="tipo" class="form-label">Tipo</label>

                            <select name="tipo" id="tipo" class="form-select" aria-label="Default select example" value="{{ old('tipo')}}">
                                {!! $errors ->first('tipo', '<small style="color:red">:message</small><br>') !!}
                                <option value="0">Casa</option>
                                <option value="1">Apartamento</option>
                            </select>
                            <div id="tipoHelp" class="form-text">Ingresa si el inmueble es casa o apartamento.</div>
                            <br>

                            <label for="amueblado" class="form-label">Amueblado</label>
                            <select name="amueblado" id="amueblado" class="form-select" aria-label="Default select example" value="{{ old('amueblado')}}">
                                {!! $errors ->first('amueblado', '<small style="color:red">:message</small><br>') !!}
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            <div id="amuebladoHelp" class="form-text">Ingresa si el inmueble está o no amueblado.</div>
                            <br>

                            <label for="terraza" class="form-label">Terraza</label>
                            <select name="terraza" id="terraza" class="form-select" aria-label="Default select example" value="{{ old('terraza')}}">
                                {!! $errors ->first('terraza', '<small style="color:red">:message</small><br>') !!}
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                            <div id="terrazaHelp" class="form-text">Ingresa si el inmueble tiene o no terraza.</div>
                            <br>

                            <label for="valor" class="form-label">Valor</label>
                            <div class="fieldbox input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="valor" id="valor" placeholder="1.800.000" value="{{ old('valor')}}"> 
                            </div>
                            {!! $errors ->first('valor', '<small style="color:red">:message</small><br>') !!}
                            <div id="valorHelp" class="form-text">Ingresa el valor de tu inmueble.</div>

                            <br>

                        </div>

                    </div>


                    <div class="row">

                    <label for="fotos" class="form-label">Fotos</label>
                            <div class="fieldbox">
                                <input type="text" class="form-control" name="foto1" id="foto1" placeholder="URL 1" value="{{ old('foto1')}}">
                                {!! $errors ->first('foto1', '<small style="color:red">:message</small><br>') !!}
                                <div id="foto1Help" class="form-text">Ingresa la URL de la primera foto.</div>
                            </div>
                            <br>
                            <div class="fieldbox mt-3">
                                <input type="text" class="form-control" name="foto2" id="foto2" placeholder="URL 2" value="{{ old('foto2')}}">
                                {!! $errors ->first('foto2', '<small style="color:red">:message</small><br>') !!}
                                <div id="foto2Help" class="form-text">Ingresa la URL de la segunda foto.</div>
                            </div>
                            <br>
                            <div class="fieldbox mt-3">
                                <input type="text" class="form-control" name="foto3" id="foto3" placeholder="URL 3" value="{{ old('foto3')}}">
                                {!! $errors ->first('foto3', '<small style="color:red">:message</small><br>') !!}
                                <div id="foto3Help" class="form-text">Ingresa la URL de la tercera foto.</div>
                            </div>
                            <br>
                    </div>

                    <br>

                    <button class="btn btn-primary boton" type="submit" id="publicar" role="button">Publicar</button>

                </form>

            </div>

        </div>



        <br>
        <br>
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