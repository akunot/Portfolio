<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Nuit Noire - Plataforma de cine premium" />
    <meta name="author" content="" />
    <title>Nuit Noire - Directores</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets_director/css/director_index.css') }}">
</head>
<body class="bg-dark">

@include('layouts.header')
    <!-- Header-->
    <section class="hero-section d-flex align-items-center justify-content-center">
        <div class="container px-4 px-lg-5 hero-content">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder mb-4" style="font-family: 'Cinzel', serif;">
                    Acción, drama, suspenso...<br>
                    <span class="text-warning">el director es el mago del guion</span>
                </h1>
                <p class="lead fw-normal text-white-50 mb-4 fs-5">
                    <i class="bi bi-star-fill me-2"></i>¿Un Oscar? Solo es la cereza del pastel...
                </p>
                @if(auth()->user() && auth()->user()->role_id == 1)
                <a class="btn btn-gold btn-lg px-5 py-3" href="{{route('directors.create')}}">
                    <i class="bi bi-person-plus me-2"></i>Registrar Director
                </a>
                @endif
            </div>
        </div>
    </section>

    <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
            @foreach($directors as $director)
                <div class="col mb-5">
                    <div class="card director-card">
                        <div class="director-image-container">
                            <img src="{{ asset('assets_director/'.$director->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $director->name }}">
                        </div>
                        <div class="text-center card-content">
                            <h3 class="director-title">{{ strtoupper($director->name) }}</h3>
                            <h4 class="director-subtitle">{{ $director->nationality }}</h4>
                            <p class="director-description">
                                {{ Str::limit($director->biography, 120) }}
                            </p>
                            <a href="{{ route('directors.show', $director->id) }}" class="btn btn-details">
                                <i class="bi bi-camera-reels me-2"></i>Filmografía
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