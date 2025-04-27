<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Crear Película</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets_movies/css/movie_create.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <section class="movie-form-section py-5">
        <div class="container">
            <div class="movie-form-container">
                <h1 class="form-title">
                    <i class="bi bi-film me-2"></i>Nueva Película
                </h1>
                <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name" class="form-label">Título de la Película</label>
                        <input type="text" class="form-input" id="name" name="name" required 
                               placeholder="Ej: El Padrino">
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Sinopsis</label>
                        <textarea class="form-input" id="description" name="description" rows="4"
                                  placeholder="Escribe la sinopsis de la película..."></textarea>
                        <div id="desc-counter" class="text-end mt-1">0/1000 caracteres</div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Precio de la Película</label>
                        <input type="number" class="form-input" id="price" name="price" required
                               placeholder="Ej: 15000">
                    </div>

                    <div class="form-group">
                        <label for="year_release" class="form-label">Fecha de Lanzamiento</label>
                        <input type="date" class="form-input" id="year_release" name="year_release" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="form-label">Actores Principales</label>
                            <div class="selection-container">
                                @foreach($actors as $actor)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               value="{{ $actor->id }}" id="actor{{ $actor->id }}" 
                                               name="actors[]">
                                        <label class="form-check-label" for="actor{{ $actor->id }}">
                                            {{ $actor->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label class="form-label">Directores</label>
                            <div class="selection-container">
                                @foreach($directors as $director)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               value="{{ $director->id }}" id="director{{ $director->id }}" 
                                               name="directors[]">
                                        <label class="form-check-label" for="director{{ $director->id }}">
                                            {{ $director->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label class="form-label">Géneros</label>
                            <div class="selection-container">
                                @foreach($genres as $genre)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               value="{{ $genre->id }}" id="genre{{ $genre->id }}" 
                                               name="genres[]">
                                        <label class="form-check-label" for="genre{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Poster de la Película</label>
                        <input type="file" class="form-control" id="image" name="image" required
                               accept="image/png, image/jpeg" onchange="previewImage(event)">
                        <small class="text-muted">Formatos aceptados: JPEG, PNG (Tamaño máximo: 5MB)</small>
                    </div>

                    <div class="form-group text-center">
                        <label for="image" class="form-label">Vista previa del poster</label>
                        <img id="image-preview" src="#" alt="Vista previa del poster">
                    </div>

                    <div class="form-actions d-flex justify-content-center">
                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-save me-2"></i>Guardar Película
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('layouts.footer')

    <!-- Custom JS -->
    <script src="{{ asset('assets_movies/js/movie_create.js') }}"></script>
</body>
</html>