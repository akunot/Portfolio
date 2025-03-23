<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $actors->name }} | Nuit Noire</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets_individual/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_actor/css/actor_show.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <!-- Sección Principal -->
    <section class="actor-hero py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-5 align-items-center">
                <!-- Imagen del Actor -->
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="actor-portrait-frame">
                        <img class="actor-portrait" 
                             src="{{ asset('assets_actor/'.$actors->image) }}" 
                             alt="{{ $actors->name }}">
                    </div>
                </div>
                
                <!-- Información del Actor -->
                <div class="col-md-6">
                    <h1 class="actor-name display-2 fw-bolder mb-4">{{ $actors->name }}</h1>
                    
                    <!-- Detalles -->
                    <div class="actor-meta mb-5">
                        <div class="meta-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>{{ $actors->nationality }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-calendar-event"></i>
                            <span>Nacimiento: {{ $actors->date_birth }}</span>
                        </div>
                    </div>

                    <!-- Biografía -->
                    <div class="actor-bio mb-5">
                        <h3 class="section-title mb-3"><i class="bi bi-file-text"></i> Biografía</h3>
                        <p class="text-light">{{ $actors->biography }}</p>
                    </div>

                    <!-- Acciones -->
                    @if(auth()->user() && auth()->user()->role_id == 1)
                    <div class="actor-actions d-flex gap-3">
                        <a href="{{ route('actors.edit', $actors->id) }}" 
                           class="btn btn-outline-warning px-4 py-2">
                           <i class="bi bi-pencil-square me-2"></i>Editar
                        </a>
                        <form action="{{ route('actors.destroy', $actors->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-outline-danger px-4 py-2"
                                    onclick="return confirm('¿Estás seguro de eliminar este actor?')">
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
            
            @if($actors->movies->isEmpty())
            <div class="empty-state">
                <i class="bi bi-exclamation-circle display-4"></i>
                <p class="mt-3">No hay películas relacionadas con este actor.</p>
            </div>
            @else
            <div class="filmography-grid">
                @foreach($actors->movies as $movie)
                <div class="film-card">
                    <div class="film-poster">
                        <img src="{{ asset('assets_movies/'.$movie->image) }}" 
                             alt="{{ $movie->name }}">
                    </div>
                    <div class="film-info">
                        <h5 class="film-title">{{ $movie->name }}</h5>
                        <p class="film-description">{{ Str::limit($movie->description, 80) }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" 
                           class="btn btn-details">
                           Ver Detalles
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>