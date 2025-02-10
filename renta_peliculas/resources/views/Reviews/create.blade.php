<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nuit Noire - Review</title>
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
                                <li><a class="dropdown-item" href="{{route('actors.index')}}">Actores</a></li>
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
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="movie_id" class="form-label">Nombre de la Pelicula</label>
                <input type="hidden" id="movie_id" name="movie_id" value="{{ $movie->id }}">
                <p class="form-control w-50 mx-auto" readonly>{{ $movie->name }}</p>
            </div>
            <div>
                <label for="user_id" class="form-label">Usuario</label>
                <select name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Reseña</label>
                <textarea class="form-control w-50 mx-auto" id="comment" name="comment" required> </textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Calificación</label>
                <input type="number" class="form-control w-50 mx-auto" id="rating" name="rating" min="1" max="5" required>
            </div>
            <input type="hidden" name="review_date" value="{{ \Carbon\Carbon::now() }}">
            <button type="submit" class="btn btn-primary">Guardar Reseña</button>
        </form>
        </div>
    </div>