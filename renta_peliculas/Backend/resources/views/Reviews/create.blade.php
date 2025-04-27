<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crear Reseña | Nuit Noire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_review/css/review_create.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <!-- Sección Principal -->
    <section class="cinematic-form-section py-5">
        <div class="container">
            <div class="cinematic-form-container">
                <div class="form-header mb-5">
                    <h1 class="cinematic-title">
                        <i class="bi bi-pen-fill me-2"></i>Nueva Reseña
                    </h1>
                    <div class="gold-bar"></div>
                </div>

                <form action="{{ route('reviews.store') }}" method="POST" class="cinematic-form">
                    @csrf
                    
                    <!-- Película -->
                    <div class="form-group mb-4 text-center">
                        <label class="form-label">
                            <i class="bi bi-camera-reels me-2"></i>Película
                        </label>
                        <div class="input-group">
                            <input type="hidden" id="movie_id" name="movie_id" value="{{ $movie->id }}">
                            <div class="form-control-plaintext">{{ $movie->name }}</div>
                        </div>
                    </div>

                    <!-- Usuario -->
                    <div class="form-group mb-4" style="display: none;">
                        <label class="form-label">
                            <i class="bi bi-person-circle me-2"></i>Usuario
                        </label>
                        <div class="input-group">
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-control-plaintext">{{ Auth::user()->name }}</div>
                        </div>
                    </div>

                    <!-- Reseña -->
                    <div class="form-group mb-4">
                        <label class="form-label text-center">
                            <i class="bi bi-chat-text-fill me-2"></i>Comentario
                        </label>
                        <textarea class="form-textarea" 
                                id="comment" 
                                name="comment" 
                                rows="2" 
                                required></textarea>
                    </div>

                    <!-- Calificación -->
                    <div class="form-group mb-5 text-center">
                        <label class="form-label">
                            <i class="bi bi-star-fill me-2"></i>Calificación
                        </label>
                        <div class="rating-input d-flex justify-content-center">
                            <input type="number" 
                                id="rating" 
                                name="rating" 
                                min="1" 
                                max="5" 
                                class="form-rating" 
                                required>
                        </div>
                    </div>

                    <input type="hidden" name="review_date" value="{{ \Carbon\Carbon::now() }}">

                    <!-- Botones -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gold">
                            <i class="bi bi-save-fill me-2"></i>Guardar Reseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>