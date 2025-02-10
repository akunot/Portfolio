<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nuit Noire - Actores</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('movies.index') }}">Nuit Noire</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('movies.index') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Sobre Nosotros</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mostrar Mas</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('movies.index')}}">Peliculas</a></li>
                                <li><a class="dropdown-item" href="{{route('actors.index')}}">actorses</a></li>
                                <li><a class="dropdown-item" href="{{route('directors.index')}}">Directores</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carrito
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-md">
            <div class="text-center mt-5" style="border: 1px solid #ccc; padding: 15px; border-radius: 10px;">
            <form action="{{ route('actors.update', $actors->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del actors</label>
                    <input type="text" class="form-control w-50 mx-auto" id="name" name="name" value="{{ $actors->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="date_birth" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control w-50 mx-auto" id="date_birth" name="date_birth" value="{{ $actors->date_birth }}" required>
                </div>
                <div class="mb-3">
                    <label for="nationality" class="form-label">Nacionalidad del actors</label>
                    <input type="text" class="form-control w-50 mx-auto" id="nationality" name="nationality" value="{{ $actors->nationality }}" required>
                </div>
                <div class="mb-3">
                    <label for="biography" class="form-label">Biografia</label>
                    <textarea class="form-control w-50 mx-auto" id="biography" name="biography">{{ $actors->biography }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control w-50 mx-auto" id="image" name="image">
                    @if ($actors->image)
                        <div class="mt-3">
                            <img src="{{ asset('assets_actor/' . $actors->image) }}" alt="Imagen del actors" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @endif
                </div>
                <button id='boton1' type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </body>
</html>