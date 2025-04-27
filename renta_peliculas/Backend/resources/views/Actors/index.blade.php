<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nuit Noire - Actores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets_home/css/styles.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets_actor/css/actor_index.css') }}" rel="stylesheet"/>
</head>
<body class="bg-dark">
    @include('layouts.header')
    
    <!-- Header-->
    <section class="hero-section d-flex align-items-center justify-content-center">
        <div class="container px-4 px-lg-5 hero-content">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder mb-4" style="font-family: 'Cinzel', serif;">
                    Ellos interpretan.<br>
                    <span class="text-warning">Tú decides.</span>
                </h1>
                <p class="lead fw-normal text-white-50 mb-4 fs-5">
                    <i class="bi bi-film-star me-2"></i>Detrás de cada gran película, hay un actor que la hace eterna.
                </p>
                @if(auth()->user() && auth()->user()->role_id == 1)
                    <a class="btn btn-gold btn-lg px-5 py-3" href="{{route('actors.create')}}">
                        <i class="bi bi-person-plus me-2"></i>Registrar Actor
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- Actors Grid -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
                @foreach($actors as $actor)
                <div class="col mb-5">
                    <div class="card actor-card">
                        <div class="actor-image-container">
                            <img src="{{ asset('assets_actor/'.$actor->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $actor->name }}">
                        </div>
                        <div class="text-center card-content">
                            <h3 class="actor-title">{{ $actor->name }}</h3>
                            <h4 class="actor-subtitle">{{ $actor->nationality }}</h4>
                            <p class="actor-description">{{ Str::limit($actor->biography, 120) }}</p>
                            <a href="{{ route('actors.show', $actor->id) }}" class="btn btn-details">
                                <i class="bi bi-file-person me-2"></i>Ver Filmografía
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>