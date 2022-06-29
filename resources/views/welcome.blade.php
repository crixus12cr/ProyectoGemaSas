<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TXT A MYSQL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top" style="background-color: #563d7c !important;">
        <ul class="navbar-nav mr-auto collapse navbar-collapse">
            <li class="nav-item active">
                <a href="#">
                    <img src="{{ URL::asset('img/cypher.jpg') }}" width="80">
                </a>
            </li>
        </ul>
        <div class="my-2 my-lg-0">
            <h5 class="navbar-brand">TXT A MYSQL </h5>
        </div>
    </nav>


    <div class="container">
        <br><br><br> <br>
        <h3 class="text-center">
            GEMA SAS Adjuntar Archivo Txt a MYSQL
        </h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('procesar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="file-input text-center">
                        <input type="file" name="file" id="fileInput" accept=".txt" class="btn btn-info" />
                        <label class="file-input__label" for="file-input">
                            <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
                        </label>
                    </div>
                    <div class="text-center mt-5">
                        <input type="submit" name="subir" class="btn btn-warning" value="Enviar Txt" />
                    </div>
                </form>
                <a class="btn btn-success" href="{{ route('archivo.create') }}">Agregar registro</a>
            </div>
            <div class="col-md-12" id="activos">
                <br>
                <a class="btn btn-light" href="#activos">Activos</a>
                <a class="btn btn-light" href="#inactivos">Inactivos</a>
                <a class="btn btn-light" href="#espera">En espera</a>
                <br>
                <h6 class="text-center">
                    Clientes Activos
                </h6>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($archivos as $archivo)
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $archivo->email }}</td>
                            <td>{{ $archivo->nombre }}</td>
                            <td>{{ $archivo->codigo }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('archivo.edit',$archivo) }}">Editar</a>
                                <form action="{{ route('archivo.destroy',$archivo) }}" method="post" style="display:inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit" >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12" id="inactivos">
                <br>
                <a class="btn btn-light" href="#activos">Activos</a>
                <a class="btn btn-light" href="#inactivos">Inactivos</a>
                <a class="btn btn-light" href="#espera">En espera</a>
                <br>
                <h6 class="text-center">
                    Clientes inactivos
                </h6>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($archivos2 as $archivo)
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $archivo->email }}</td>
                            <td>{{ $archivo->nombre }}</td>
                            <td>{{ $archivo->codigo }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('archivo.edit',$archivo) }}">Editar</a>
                                <form action="{{ route('archivo.destroy',$archivo) }}" method="post" style="display:inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit" >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12" id="espera">
                <br>
                <a class="btn btn-light" href="#activos">Activos</a>
                <a class="btn btn-light" href="#inactivos">Inactivos</a>
                <a class="btn btn-light" href="#espera">En espera</a>
                <br>
                <h6 class="text-center">
                    Clientes En Espera
                </h6>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($archivos3 as $archivo)
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $archivo->email }}</td>
                            <td>{{ $archivo->nombre }}</td>
                            <td>{{ $archivo->codigo }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('archivo.edit',$archivo) }}">Editar</a>
                                <form action="{{ route('archivo.destroy',$archivo) }}" method="post" style="display:inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit" >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>

        <footer class="text-center text-white " style="background-color: #21081a;">
            <!-- Grid container -->
            <div class="container p-4"></div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Cristian Perdomo:
                <a class="text-white" href="https://github.com/crixus12cr">cristian2020til@gmail.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>