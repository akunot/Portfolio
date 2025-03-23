<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nuit Noire</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets_home/css/header.css') }}">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand fw-bold" href="{{ route('movies.index') }}" style="letter-spacing: 2px;">
            <i class="bi bi-film me-2"></i>NUIT NOIRE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('movies.index') }}">
                <i class="bi bi-house-door me-1"></i>Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">
                <i class="bi bi-info-circle me-1"></i>Sobre Nosotros
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-collection me-1"></i>Catálogo
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{route('movies.index')}}">
                    <i class="bi bi-camera-reels me-2"></i>Películas
                </a></li>
                <li><a class="dropdown-item" href="{{route('actors.index')}}">
                    <i class="bi bi-person-square me-2"></i>Actores
                </a></li>
                <li><a class="dropdown-item" href="{{route('directors.index')}}">
                    <i class="bi bi-person-badge me-2"></i>Directores
                </a></li>
                </ul>
            </li>
            </ul>
            
            @auth
            <div class="d-flex">
            <a class="btn btn-warning position-relative" href="{{ route('rents.index') }}">
                <i class="bi bi-cart3"></i>
                <span class="visually-hidden">items en carrito</span>
                </span>
            </a>
            </div>
            @endauth
            @guest
            <div class="d-flex ms-3">
            <a class="btn btn-outline-light me-2" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
            </a>
            <a class="btn btn-outline-light" href="{{ route('register') }}">
                <i class="bi bi-person-plus"></i> Registrarse
            </a>
            </div>
            @else
            <div class="d-flex ms-3">
            <a class="btn btn-outline-light me-2" href="{{ route('users.show', Auth::user()->id) }}">
                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
            </a>
            @if(auth()->user() && auth()->user()->role_id == 1)
            <a class="btn btn-outline-light me-2" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            @endif
            <a class="btn btn-outline-light" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
            @endguest
        </div>
    </div>
</nav>

