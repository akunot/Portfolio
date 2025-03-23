<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Nuit Noire - Plataforma de cine premium" />
    <meta name="author" content="" />
    <title>Nuit Noire - Películas</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets_movies/css/movie_index.css') }}">
</head>
<body class="bg-dark">
    @include('layouts.header')
    
    <!-- Header Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container px-4 px-lg-5 hero-content">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder mb-4" style="font-family: 'Cinzel', serif;">
                    Cine sin límites<br>
                    <span class="text-warning">reseñas sin filtros</span>
                </h1>
                <p class="lead fw-normal text-white-50 mb-4 fs-5">
                    <i class="bi bi-quote me-2"></i>El cine se ve con los ojos…<br>y se siente con palabras
                </p>
                @if(auth()->user() && auth()->user()->role_id == 1)
                    <a class="btn btn-gold btn-lg px-5 py-3" href="{{route('movies.create')}}">
                        <i class="bi bi-plus-circle me-2"></i>Registrar Película
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- Movie Grid Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
            @foreach($movies as $movie)
                <div class="col mb-5">
                    <div class="card movie-card">
                        <div class="image-container">
                            <img src="{{ asset('assets_movies/'.$movie->image) }}" class="card-img-top" alt="{{ $movie->name }}">
                        </div>
                        <div class="text-center card-content">
                            <h3 class="movie-title">{{ strtoupper($movie->name) }}</h3>
                            <h4 class="movie-subtitle">{{ $movie->tagline }}</h4>
                            <p class="movie-description">
                                {{ Str::limit($movie->description, 120) }}
                            </p>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-details">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>