<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
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
            <h5 class="navbar-brand">Editar </h5>
        </div>
    </nav>

    <div class="container">
        <br><br><br> <br>
        <h3 class="text-center">Editar A = <i>{{ $archivo->nombre }}</i></h3>
        <hr>
        <form action="{{ route('archivo.update',$archivo) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-sm-7">
                    <label for="InputEmail" class="form-label"><strong>* Email:</strong> </label>
                    <input type="text" name="email" id="InputEmail" class="form-control" require>
                </div>
                <div class="col-sm-7">
                <label for="InputNombre" class="form-label"><strong>* Nombre:</strong> </label>
                    <input type="text" name="nombre" id="InputNombre" class="form-control" require>
                </div>
                <div class="col-sm-6">
                    <label for="InputCodigo" class="form-label"><strong>* Codigo:</strong> </label>
                    <select name="codigo" id="codigo" class="form-select" require>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                        <option value="3">En Espera</option>
                    </select>
                </div>
                <div class="col-sm-12 text-center my-4">
                    <button type="submit" class="btn btn-primary">
                        Guardar Cliente
                    </button>

                </div>
            </div>
        </form>
        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
    </div>


</body>

</html>