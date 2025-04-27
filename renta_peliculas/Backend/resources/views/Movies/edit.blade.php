<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Editar Película</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets_movies/css/movie_edit.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <section class="movie-form-section py-5">
        <div class="container">
            <div class="movie-form-container">
                <h1 class="form-title">
                    <i class="bi bi-film me-2"></i>Editar Película
                </h1>
                
                <form action="{{ route('movies.update', $movies->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="form-label">Título de la Película</label>
                        <input type="text" class="form-input" id="name" name="name" 
                               value="{{ $movies->name }}" required placeholder="Ej: El Padrino">
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Sinopsis</label>
                        <textarea class="form-input" id="description" name="description" rows="4"
                                  placeholder="Escribe la sinopsis de la película...">{{ $movies->description }}</textarea>
                        <div id="desc-counter" class="text-end mt-1">{{ strlen($movies->description) }}/1000 caracteres</div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="year_release" class="form-label">Fecha de Lanzamiento</label>
                            <input type="date" class="form-input" id="year_release" name="year_release" 
                                   value="{{ $movies->year_release }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Precio de la Película</label>
                        <input type="number" class="form-input" id="price" name="price" 
                               value="{{ $movies->price }}" required>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="form-label">Actores</label>
                            <div class="selection-container">
                                @foreach($actors as $actor)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               value="{{ $actor->id }}" id="actor{{ $actor->id }}" 
                                               name="actors[]" {{ $movies->actors->contains($actor->id) ? 'checked' : '' }}>
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
                                               name="directors[]" {{ $movies->directors->contains($director->id) ? 'checked' : '' }}>
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
                                               name="genres[]" {{ $movies->genres->contains($genre->id) ? 'checked' : '' }}>
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
                        <input type="file" class="form-control" id="image" name="image" 
                               accept="image/png, image/jpeg" onchange="previewImage(event)">
                        <small class="text-muted">Formatos aceptados: JPEG, PNG (Tamaño máximo: 5MB)</small>
                    </div>

                    <div class="form-group text-center">
                        @if($movies->image)
                            <label class="form-label">Imagen Actual</label>
                            <img id="image-preview" src="{{ asset('assets_movies/' . $movies->image) }}" class="img-preview" alt="Imagen actual de la película">
                        @endif
                        <img id="image-preview" src="#" alt="Nueva imagen preview" 
                             class="img-preview" style="display: none;">
                    </div>

                    <div class="form-actions d-flex justify-content-center">
                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('layouts.footer')

    <!-- Custom JS -->
    <script src="{{ asset('assets_movies/js/movie_edit.js') }}"></script>
</body>
</html>