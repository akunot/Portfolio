<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Perfil de {{ $directors->name }}" />
    <meta name="author" content="" />
    <title>{{ $directors->name }} | Nuit Noire</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets_individual/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_director/css/director_show.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <!-- Sección Principal -->
    <section class="director-hero py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-5 align-items-center">
                <!-- Imagen del Director -->
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="director-portrait-frame">
                        <img class="director-portrait" 
                             src="{{ asset('assets_director/'.$directors->image) }}" 
                             alt="{{ $directors->name }}">
                    </div>
                </div>
                
                <!-- Información del Director -->
                <div class="col-md-6">
                    <h1 class="director-name display-2 fw-bolder mb-4">{{ $directors->name }}</h1>
                    
                    <!-- Detalles -->
                    <div class="director-meta mb-5">
                        <div class="meta-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>{{ $directors->nationality }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-calendar-event"></i>
                            <span>Nacimiento: {{ $directors->date_birth }}</span>
                        </div>
                    </div>

                    <!-- Biografía -->
                    <div class="director-bio mb-5">
                        <h3 class="section-title mb-3"><i class="bi bi-file-text"></i> Biografía</h3>
                        <p class="text-light">{{ $directors->biography }}</p>
                    </div>

                    <!-- Acciones -->
                    @if(auth()->user() && auth()->user()->role_id == 1)
                    <div class="director-actions d-flex gap-3">
                        <a href="{{ route('directors.edit', $directors->id) }}" 
                           class="btn btn-outline-warning px-4 py-2">
                           <i class="bi bi-pencil-square me-2"></i>Editar
                        </a>
                        <form action="{{ route('directors.destroy', $directors->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-outline-danger px-4 py-2"
                                    onclick="return confirm('¿Estás seguro de eliminar este director?')">
                                <i class="bi bi-trash me-2"></i>Eliminar
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Filmografía -->
    <section class="filmography-section py-5 bg-black">
        <div class="container px-4 px-lg-5">
            <h2 class="section-title mb-5 text-center">
                <i class="bi bi-camera-reels me-2"></i>Filmografía destacada
            </h2>
            
            <div class="filmography-grid">
                @foreach($directors->movies as $movie)
                <div class="film-card">
                    <div class="film-poster">
                        <img src="{{ asset('assets_movies/'.$movie->image) }}" 
                             alt="{{ $movie->name }}">
                    </div>
                    <div class="related-info">
                        <h5 class='movie-title'>{{ $movie->name }}</h5>
                        <p class="movie-description">{{ Str::limit($movie->description, 80) }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" 
                           class="btn btn-details">
                           Ver Detalles
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>
