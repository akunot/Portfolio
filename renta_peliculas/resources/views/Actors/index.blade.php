<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nuit Noire - Actores</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />
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
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mostrar Mas</a>
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
                            Carrito
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5 d-flex align-items-center justify-content-center" style="background-image: url('assets_home/img/header_actor.jpg'); background-size: cover; background-position: center; height: 70vh; background-color: rgba(0, 0, 0, 0.5);">
            <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Ellos interpretan. Tú decides.</h1>
                <p class="lead fw-normal text-white-50 mb-0">Detrás de cada gran película, hay un actor que la hace eterna.</p>
            </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col-12 text-center mb-4">
                        <a class="btn btn-primary btn-lg" href="{{route('actors.create')}}">Registrar Actor</a>
                    </div>
                @foreach($actors as $actor)
                    <div class="col mb-5">
                    <div class="card h-300">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('assets_actor/'. $actor->image)  }}" alt="{{ $actor->name }}" />
                        <!-- Product details-->
                        <div class="card-body p-30">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $actor->name }}</h5>
                        </div>
                        <div class="text-center">
                            <!-- Product name-->
                            <h6 class="fw-normal">{{ $actor->biography }}</h6>
                        </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route ('actors.show', $actor->id)}}">Mostrar mas</a></div>
                        </div>
                    </div>
                    </div>
                @endforeach
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