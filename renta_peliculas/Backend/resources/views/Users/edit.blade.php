<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil | Nuit Noire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('assets_profile/css/profile_styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_user/css/user_edit.css') }}">
</head>
<body class="bg-dark">
    @include('layouts.header')

    <section class="profile-edit-section py-5">
        <div class="container">
            <div class="edit-form-container">
                <h1 class="form-title">
                    <i class="bi bi-person-gear me-2"></i>Editar Perfil
                </h1>
                
                <form method="POST" action="{{ route('users.update', $users->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="bi bi-person-circle me-2"></i>Nombre
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="form-input @error('name') input-error @enderror" 
                               value="{{ $users->name }}"
                               required>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Campo Correo (No editable) -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-2"></i>Correo Electrónico
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-input" 
                               value="{{ $users->email }}" 
                               readonly>
                    </div>

                    <!-- Campo Nueva Contraseña -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock me-2"></i>Nueva Contraseña
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-input @error('password') input-error @enderror">
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <i class="bi bi-lock-fill me-2"></i>Confirmar Contraseña
                        </label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               class="form-input">
                    </div>

                    /<!-- Campo Rol -->
                    @if(Auth::user()->role_id == 1)
                        <div class="form-group">
                            <label for="role" class="form-label">
                                <i class="bi bi-person-circle me-2"></i>Rol
                            </label>
                            <select name="role" id="role" class="form-select">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $users->role_id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <!-- Botones -->
                    <div class="form-actions d-flex justify-content-center">
                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-save me-2"></i>Guardar Cambios
                        </button>
                        <a href="{{ route('users.show', Auth::id()) }}" class="btn btn-cancel">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

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

</body>

    @include('layouts.footer')
</html>

    

