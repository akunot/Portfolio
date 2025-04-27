<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Crear Director</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets_director/css/director_create.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <section class="director-form-section py-5">
        <div class="container">
            <div class="director-form-container">
                <h1 class="form-title">
                    <i class="bi bi-camera-reels me-2"></i>Nuevo Director
                </h1>
                <form action="{{ route('directors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name" class="form-label">Nombre del Director</label>
                        <input type="text" class="form-input" id="name" name="name" required 
                               placeholder="Ej: Christopher Nolan">
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="date_birth" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-input" id="date_birth" name="date_birth" required>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label for="nationality" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-input" id="nationality" name="nationality" required
                                   placeholder="Ej: Británico">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="biography" class="form-label">Biografía</label>
                        <textarea class="form-input" id="biography" name="biography" rows="4"
                                  placeholder="Escribe una breve biografía del director..."></textarea>
                        <div id="bio-counter" class="text-end mt-1">0/500 caracteres</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Películas Dirigidas</label>
                        <div class="movies-checkbox-container">
                            @foreach($movies as $movie)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $movie->id }}" 
                                           id="movie{{ $movie->id }}" name="movies[]">
                                    <label class="form-check-label" for="movie{{ $movie->id }}">
                                        {{ $movie->name }} ({{ $movie->year_release }})
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Imagen del Director</label>
                        <input type="file" class="form-control" id="image" name="image" required
                               accept="image/png, image/jpeg" onchange="previewImage(event)">
                        <small class="text-muted">Formatos aceptados: JPEG, PNG (Tamaño máximo: 5MB)</small>
                    </div>

                    <div class="form-group text-center">
                        <label class="form-label text-center">Vista previa de la imagen </label>
                        <img id="image-preview" src="#" alt="Vista previa de la imagen" class="img-preview">
                    </div>

                    <div class="form-actions d-flex justify-content-center">
                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-save me-2"></i>Guardar Director
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('layouts.footer')

    <!-- Custom JS -->
    <script src="{{ asset('assets_director/js/director_create.js') }}"></script>
</body>
</html>