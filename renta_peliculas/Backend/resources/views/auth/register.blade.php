@extends('layouts.app', ['invisible' => true])
@include('layouts.header')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets_auth/css/register.css') }}">
<link href="{{asset ('assets_home/css/styles.css')}}" rel="stylesheet" />

<div class="auth-container" style="margin-top: 0;">
    <div class="cinematic-card">
        <div class="auth-header">
            <h2 class="cinematic-title">{{ __('Registro de Usuario') }}</h2>
            <div class="gold-bar"></div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <div class="input-group">
                    <i class="bi bi-person-circle input-icon"></i>
                    <input id="name" type="text" class="form-input @error('name') input-error @enderror" 
                           name="name" value="{{ old('name') }}" placeholder="Nombre completo" required autofocus>
                </div>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-group">
                    <i class="bi bi-envelope input-icon"></i>
                    <input id="email" type="email" class="form-input @error('email') input-error @enderror" 
                           name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-group">
                    <i class="bi bi-lock input-icon"></i>
                    <input id="password" type="password" class="form-input @error('password') input-error @enderror" 
                           name="password" placeholder="Contraseña" required>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-group">
                    <i class="bi bi-lock-fill input-icon"></i>
                    <input id="password-confirm" type="password" class="form-input" 
                           name="password_confirmation" placeholder="Confirmar contraseña" required>
                </div>
            </div>

            <input type="hidden" name="role_id" value="2">

            <div class="form-group">
                <button type="submit" class="auth-button">
                    <i class="bi bi-door-open me-2"></i>{{ __('Crear Cuenta') }}
                </button>
            </div>

            <div class="auth-footer">
                <span class="text-muted">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="gold-link">Inicia Sesión</a></span>
            </div>
        </form>
    </div>
</div>


<!-- Formulario -->
<form action="{{ route('user.actualizar') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="direccion">Escribe tu dirección:</label>
        <input type="text" id="direccion" name="direccion" value="{{ auth()->check() ? auth()->user()->direccion : '' }}" required>
        <button type="button" onclick="buscarDireccion()">Buscar en el mapa</button>
        
        <input type="hidden" name="lat" id="lat">
        <input type="hidden" name="lng" id="lng">

        <button type="submit">Guardar Dirección</button>
    </form>
<!-- Mapa debajo del formulario -->
<div class="container">
    <h3>Ubicación en el Mapa</h3>
    <div id="map" style="height: 400px; width: 100%; border-radius: 10px;"></div>
</div>

<!-- Scripts de Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const lat = {{ auth()->user()->lat ?? 6.2442 }}; // Default en Medellín
        const lng = {{ auth()->user()->lng ?? -75.5812 }};

        const map = L.map("map").setView([lat, lng], 15);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; OpenStreetMap contributors"
        }).addTo(map);

        let marker = L.marker([lat, lng]).addTo(map);

        window.buscarDireccion = function() {
            const direccion = document.getElementById("direccion").value;
            if (!direccion) return alert("Ingresa una dirección");

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${direccion}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const lat = data[0].lat;
                        const lng = data[0].lon;

                        map.setView([lat, lng], 15);
                        marker.setLatLng([lat, lng]);

                        document.getElementById("lat").value = lat;
                        document.getElementById("lng").value = lng;
                    } else {
                        alert("Dirección no encontrada");
                    }
                })
                .catch(error => console.error("Error:", error));
        };
    });
</script>

@include('layouts.footer')
@endsection
