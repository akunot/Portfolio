<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de {{ $user->name }} | Nuit Noire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('assets_user/css/user_show.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    @include('layouts.header')

    <section class="profile-section py-5">
        <div class="container">
            <!-- Encabezado del Perfil -->
            <div class="profile-header mb-5">
            <div class="d-flex align-items-center gap-4">
                <div class="avatar-frame">
                <i class="bi bi-person-circle avatar-icon"></i>
                </div>
                <div>
                <h1 class="profile-title">{{ $user->name }}</h1>
                @if(auth()->user()->id === $user->id)
                    <p class="profile-email">{{ $user->email }}</p>
                @endif
                </div>
            </div>
            <div class="mt-3">
            @if(auth()->user()->id === $user->id)
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-gold btn-lg px-2 ">
                <i class="bi bi-pencil-square me-2"></i>Actualizar Perfil
                </a>
            @endif
            </div>
            </div>

            <!-- Sección de Reservas -->
            @if(auth()->user()->id === $user->id || auth()->user()->role_id == 1)
            <div class="rentals-section mb-5">
                <h2 class="section-title mb-4">
                    <i class="bi bi-clock-history me-2"></i>Historial de Reservas
                </h2>
                
                @forelse($user->rents as $rental)
                <div class="rental-card mb-4">
                    <div class="rental-header d-flex justify-content-between align-items-center mb-3">
                        <span class="badge rental-status">{{ $rental->status }}</span>
                        <div class="rental-dates text-end">
                            <span class="rental-date d-block">Reservado el {{ \Carbon\Carbon::parse($rental->rent_date)->format('d M Y') }}</span>
                            @if ($rental->status == 'devuelta')
                                <span class="rental-date d-block">Devuelto el {{ \Carbon\Carbon::parse($rental->return_date)->format('d M Y') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="rental-movies">
                        @foreach($rental->movie as $movie)
                            <div class="movie-item d-flex align-items-center gap-3">
                                <img src="{{ asset('assets_movies/'.$movie->image) }}" 
                                    alt="{{ $movie->name }}" 
                                    class="movie-thumbnail">
                                <div class="movie-details">
                                    <span class="movie-title">{{ $movie->name }}</span>
                                    <span class="movie-quantity">Cantidad: {{ $movie->pivot->quantity }}</span>
                                </div>
                                @if(auth()->user()->role_id == 1 && $rental->status == 'rentada')
                            <form action="{{ route('rents.return', ['id' => $rental->id, 'userId' => $rental->user_id]) }}" method="POST" class="return-form mt-3" onsubmit="return confirm('¿Estás seguro de que deseas confirmar la devolución?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Confirmar Devolución</button>
                            </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="bi bi-film"></i>
                    <p>No hay reservas registradas</p>
                </div>
                @endforelse
            </div>
            @endif

            <!-- Sección de Comentarios -->
            <div class="reviews-section">
                <h2 class="section-title mb-4">
                    <i class="bi bi-chat-square-text me-2"></i>Mis Reseñas
                </h2>
                
                <div class="reviews-grid">
                    @forelse($reviews as $review)
                    <div class="review-card">
                        <div class="review-header">
                            <a href="{{ route('movies.show', $review->movie_id) }}" 
                               class="movie-link">
                               {{ $review->movie->name }}
                            </a>
                            <div class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star-fill {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="review-content">{{ $review->comment }}</p>
                        <div class="review-footer">
                            <span class="review-date">{{ \Carbon\Carbon::parse($review->review_date)->format('d M Y') }}</span>
                            <div class="review-actions">
                                @if(auth()->user()->id === $user->id || auth()->user()->role_id == 1)
                                <a href="{{ route('reviews.edit', $review->id) }}" 
                                   class="btn btn-sm btn-outline-warning">
                                   <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="delete-review-form d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reseña?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger delete-review-btn">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <i class="bi bi-chat"></i>
                        <p>No hay reseñas publicadas</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('layouts.footer')

    @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Actualizar Dirección</h2>
    
    <!-- Formulario -->
    <form action="{{ route('user.actualizar') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="direccion">Escribe tu dirección:</label>
        <input type="text" id="direccion" name="direccion" value="{{ auth()->user()->direccion }}" required>
        <button type="button" onclick="buscarDireccion()">Buscar en el mapa</button>
        
        <input type="hidden" name="lat" id="lat">
        <input type="hidden" name="lng" id="lng">

        <button type="submit">Guardar Dirección</button>
    </form>

    <h3>Ubicación en el Mapa</h3>
    <div id="map" style="height: 400px; width: 100%; border-radius: 10px;"></div>

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
</div>
@endsection


@section('content')
<div class="container">
    <h2>Ubicación de la Tienda</h2>

    <div id="map" style="height: 400px; width: 100%; border-radius: 10px;"></div>

    <!-- Scripts de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Crear el mapa y establecer la vista inicial
            const map = L.map("map").setView([6.2442, -75.5812], 15); // Medellín

            // Cargar la capa de OpenStreetMap
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "&copy; OpenStreetMap contributors"
            }).addTo(map);

            // Agregar un marcador de la tienda
            L.marker([6.2442, -75.5812])
                .addTo(map)
                .bindPopup("Nuestra Tienda de Alquiler de Películas")
                .openPopup();
        });
    </script>
</div>
@endsection

</body>

</html>