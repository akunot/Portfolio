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
