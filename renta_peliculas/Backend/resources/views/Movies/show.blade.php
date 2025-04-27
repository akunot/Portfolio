<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Detalles de {{ $movie->name }}" />
    <meta name="author" content="" />
    <title>{{ $movie->name }} | Nuit Noire</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets_individual/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets_movies/css/movie_show.css') }}">
</head>
<body class="bg-dark">
    @include('layouts.header')

    <!-- Sección Principal -->
    <section class="movie-detail-section py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-5 align-items-center">
                <!-- Columna Izquierda - Poster -->
                <div class="col-md-6 mb-5 mb-md-0">
                    <img class="movie-poster w-100" 
                         src="{{ asset('assets_movies/'.$movie->image) }}" 
                         alt="{{ $movie->name }}">
                </div>
                
                <!-- Columna Derecha - Información -->
                <div class="col-md-6">
                    <h1 class="movie-title display-3 fw-bolder mb-4">{{ $movie->name }}</h1>
                    
                    <!-- Rating -->
                    <div class="rating-stars mb-4">
                        @php $rating = $averageRating ?? 0; @endphp
                        <div class="d-flex align-items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star-fill fs-3 {{ $i <= $rating ? 'text-warning' : 'text-secondary' }}"></i>
                            @endfor
                            <span class="ms-3 text-warning fs-4">{{ number_format($rating, 1) }}/5</span>
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="price-box mb-5">
                        <h3 class="section-title mb-3"><i class="bi bi-currency-dollar me-2"></i>Precio</h3>
                        <p class="text-light mb-0">${{ $movie->price }}</p>
                    </div>

                    <!-- Sinopsis -->
                    <div class="sinopsis-box mb-5">
                        <h3 class="section-title mb-3"><i class="bi bi-film me-2"></i>Sinopsis</h3>
                        <p class="text-light mb-0">{{ $movie->description }}</p>
                    </div>

                    <!-- Géneros -->
                    <div class="genres-box mb-5">
                        <h3 class="section-title mb-3"><i class="bi bi-tags me-2"></i>Géneros</h3>
                        <div class="d-flex flex-wrap">
                            @forelse($movie->genres as $genre)
                                <span class="genre-badge rounded-pill fs-6 px-3 py-2">{{ $genre->name }}</span>
                            @empty
                                <p class="text-light">Sin géneros registrados</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Acciones -->
                    @if(auth()->user() && auth()->user()->role_id == 1)
                    <div class="action-buttons d-flex gap-3 mb-5">
                        <a href="{{ route('movies.edit', $movie->id) }}" 
                           class="btn btn-outline-warning px-4 py-2">
                           <i class="bi bi-pencil-square me-2"></i>Editar
                        </a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger px-4 py-2">
                                <i class="bi bi-trash me-2"></i>Eliminar
                            </button>
                        </form>
                    @elseif(auth()->user() && auth()->user()->role_id == 2)
                        <form action="{{ route('rents.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="bi bi-cart-plus"></i> Añadir al carrito
                            </button>
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </form>
                        
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Relaciones -->
    <section class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <div class="row g-4">
                <!-- Directores -->
                <div class="col-md-6">
                    <div class="cinematic-box">
                        <h3 class="section-title mb-4"><i class="bi bi-camera-reels me-2"></i>Directores</h3>
                        <ul class="cinematic-list">
                            @forelse($movie->directors as $director)
                            <li>
                                <a href="{{ route('directors.show', $director->id) }}" 
                                   class="link-item">
                                   {{ $director->name }}
                                   <span class="nationality">{{ $director->nationality }}</span>
                                </a>
                            </li>
                            @empty
                            <li class="text-light">No hay directores registrados</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Actores -->
                <div class="col-md-6">
                    <div class="cinematic-box">
                        <h3 class="section-title mb-4"><i class="bi bi-person-square me-2"></i>Reparto</h3>
                        <ul class="cinematic-list">
                            @forelse($movie->actors as $actor)
                            <li>
                                <a href="{{ route('actors.show', $actor->id) }}" 
                                   class="link-item">
                                   {{ $actor->name }}
                                   <span class="nationality">{{ $actor->nationality }}</span>
                                </a>
                            </li>
                            @empty
                            <li class="text-light">No hay actores registrados</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <!-- Reseñas -->
      <section class="py-5 bg-black">
        <div class="container px-4 px-lg-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 class="movie-title">Reseñas</h2>
                @if(auth()->check())
                    <a href="{{ route('reviews.create', $movie->id) }}" 
                       class="btn btn-warning px-4 py-2">
                       <i class="bi bi-plus-circle me-2"></i>Nueva Reseña
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="btn btn-warning px-4 py-2">
                       <i class="bi bi-plus-circle me-2"></i>Inicia Sesión para Comentar
                    </a>
                @endif
            </div>

            <div class="row g-4">
                @forelse($movie->reviews as $review)
                <div class="col-12">
                    <div class="review-card p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="text-warning mb-0">
                                    <a href="{{ route('users.show', $review->user->id) }}" class="text-warning text-decoration-none">
                                        {{ $review->user->name }}
                                    </a>
                                </h4>
                                <small class="text-light">{{ \Carbon\Carbon::parse($review->review_date)->format('d M Y') }}</small>
                            </div>
                            <div class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star-fill {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-light mb-4">{{ $review->comment }}</p>
                        @if(auth()->user() && (auth()->user()->id == $review->user_id || auth()->user()->role_id == 1))
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('reviews.edit', $review->id) }}" 
                               class="btn btn-sm btn-outline-warning">
                               <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-light">Sé el primero en escribir una reseña</h4>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Películas Relacionadas -->
    @if($movie->genres->isNotEmpty())
    <section class="related-section py-5">
        <div class="container px-4 px-lg-5">
            <h2 class="section-title mb-5 text-center"><i class="bi bi-collection-play me-2"></i>Películas relacionadas</h2>
            <div class="related-grid">
            @php
                $relatedMovies = collect();
                foreach($movie->genres as $genre) {
                    $relatedMovies = $relatedMovies->merge($genre->movies->where('id', '!=', $movie->id));
                }
                $relatedMovies = $relatedMovies->unique('id');
            @endphp
                @foreach($relatedMovies as $relatedMovie)
                <div class="related-card">
                    <img src="{{ asset('assets_movies/'.$relatedMovie->image) }}" 
                         alt="{{ $relatedMovie->name }}">
                    <div class="related-info">
                        <h5 class='movie-title'>{{ $relatedMovie->name }}</h5>
                        <p class="movie-description">{{ Str::limit($relatedMovie->description, 80) }}</p>
                        <a href="{{ route('movies.show', $relatedMovie->id) }}" 
                           class="btn btn-details">
                           Ver Detalles
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @include('layouts.footer')
</body>
</html>