<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nuit Noire - Peliculas</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset ('assets_individual/css/styles.css')}}" rel="stylesheet" />
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
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
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
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <img src="{{ $movie->image }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body text-center">
                            <h2 class="fw-bold">{{ $movie->title }}</h2>
                            <p class="lead">{{ $movie->description }}</p>

                            <div class="row justify-content-center">
                                <h5 class="fw-bold">Géneros:</h5>
                                @if($movie->genres->isNotEmpty())
                                    @foreach($movie->genres as $genre)
                                        <span class="badge bg-secondary">{{ $genre->name }}</span>
                                    @endforeach
                                @else
                                    <p>No genres available</p>
                                @endif
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary me-2">Editar</a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection


        
        
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src=" {{ asset('assets_movies/'. $movie->image)}}" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"> {{ $movie->name}}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">$45.00</span>
                            <span>$40.00</span>
                        </div>
                    
                        <p class="lead">{{ $movie->description }}</p>
                        <div class="d-flex justify-content-center text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($averageRating))
                                        <i class="bi-star-fill"></i> <!-- Full Star -->
                                    @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                                        <i class="bi-star-half"></i> <!-- Half Star -->
                                    @else
                                        <i class="bi-star"></i> <!-- Empty Star -->
                                    @endif
                                @endfor
                        </div>
                        <div class="mt-4">
                            <h5 class="fw-bold text-start">Géneros:</h5>
                            <div class="d-flex justify-content-start flex-wrap">
                                @if($movie->genres->isNotEmpty())
                                    @foreach($movie->genres as $genre)
                                        <span class="badge bg-secondary m-1">{{ $genre->name }}</span>
                                    @endforeach
                                @else
                                    <p class="text-end">No genres available</p>
                                @endif
                            </div>
                        </div>

                        <br>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <div class="d-flex justify-content-center my-4">
            <a href="{{ route('reviews.create', ['id' => $movie->id]) }}" class="btn btn-primary">Agregar Reseña</a>
        </div>
        

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="fw-bolder mb-4 text-center">Reseñas de Usuarios</h2>
            @if($movie->reviews->isNotEmpty())
                @foreach($movie->reviews as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->user->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ \Carbon\Carbon::parse($review->review_date)->format('d M Y') }}</h6>
                            <p class="card-text">{{ $review->comment }}</p>
                            <div class="text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="bi-star-fill"></i> <!-- Full Star -->
                                    @else
                                        <i class="bi-star"></i> <!-- Empty Star -->
                                    @endif
                                @endfor
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary me-2">Editar</a>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No hay reseñas disponibles para esta película.</p>
            @endif
        </div>
    </section>
        
    <div class="container px-4 px-lg-5 mt-5">
        @if($movie->genres->isNotEmpty())
            <h2 class="fw-bolder mb-4 text-center">
                Películas relacionadas con los géneros: {{ $movie->genres->pluck('name')->join(', ') }}
            </h2>
            <br>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @php
                    $relatedMovies = collect();
                    foreach($movie->genres as $genre) {
                        $relatedMovies = $relatedMovies->merge($genre->movies->where('id', '!=', $movie->id));
                    }
                    $relatedMovies = $relatedMovies->unique('id');
                @endphp
                @foreach($relatedMovies as $relatedMovie)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('assets_movies/' . $relatedMovie->image) }}" 
                                alt="{{ $relatedMovie->title }}" style="height: 300px; object-fit: cover;" />
                            
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $relatedMovie->name }}</h5>
                                    <h6 class="fw-normal">{{ Str::limit($relatedMovie->description, 100) }}</h6>
                                </div>
                            </div>
                            
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('movies.show', $relatedMovie->id) }}">
                                        Mostrar más
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2 class="fw-bolder mb-4 text-center">No hay películas relacionadas</h2>
        @endif
    </div>

                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>