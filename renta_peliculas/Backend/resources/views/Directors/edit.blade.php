<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Editar Director</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets_director/css/director_edit.css') }}" rel="stylesheet" />
</head>
<body class="bg-dark">
    @include('layouts.header')

    <section class="director-form-section py-5">
        <div class="container">
            <div class="director-form-container">
                <h1 class="form-title">
                    <i class="bi bi-pencil-square me-2"></i>Editar Director
                </h1>
                
                <form action="{{ route('directors.update', $directors->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="form-label">Nombre del Director</label>
                        <input type="text" class="form-input" id="name" name="name" 
                               value="{{ $directors->name }}" required placeholder="Ej: Christopher Nolan">
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="date_birth" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-input" id="date_birth" name="date_birth" 
                                   value="{{ $directors->date_birth }}" required>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label for="nationality" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-input" id="nationality" name="nationality"
                                   value="{{ $directors->nationality }}" required placeholder="Ej: Británico">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="biography" class="form-label">Biografía</label>
                        <textarea class="form-input" id="biography" name="biography" rows="4"
                                  placeholder="Escribe una breve biografía del director...">{{ $directors->biography }}</textarea>
                        <div id="bio-counter" class="text-end mt-1">{{ strlen($directors->biography) }}/500 caracteres</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Películas Dirigidas</label>
                        <div class="movies-checkbox-container">
                            @foreach($movies as $movie)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $movie->id }}" 
                                           id="movie{{ $movie->id }}" name="movies[]"
                                           {{ $directors->movies->contains($movie->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="movie{{ $movie->id }}">
                                        {{ $movie->name }} ({{ $movie->year_release }})
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Imagen del Director</label>
                        <input type="file" class="form-control" id="image" name="image" 
                               accept="image/png, image/jpeg" onchange="previewImage(event)">
                        <small class="text-muted">Formatos aceptados: JPEG, PNG (Tamaño máximo: 5MB)</small>
                    </div>

                    <div class="form-group text-center">
                    @if($directors->image)
                            <label class="form-label">Imagen Actual</label>
                            <img src="{{ asset('assets_director/' . $directors->image) }}" class="img-preview" alt="Imagen actual del director">
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
    <script src="{{ asset('assets_director/js/director_edit.js') }}"></script>
</body>
</html>