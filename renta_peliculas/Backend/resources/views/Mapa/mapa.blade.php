<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Leaflet</title>
    
    <!-- Estilos de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    
    <!-- Script de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    
    <style>
        #map {
            height: 400px;
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <h2>Ubicación de la Tienda</h2>
    <div id="map"></div>

    <script>
        // Crear el mapa y establecer la vista inicial
        const map = L.map("map").setView([6.2442, -75.5812], 15); // Medellín, Colombia

        // Agregar la capa de OpenStreetMap
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "&copy; OpenStreetMap contributors"
        }).addTo(map);

        // Agregar un marcador en la ubicación
        L.marker([6.2442, -75.5812])
            .addTo(map)
            .bindPopup("Nuestra Tienda de Películas")
            .openPopup();
    </script>

<input type="text" id="direccion" placeholder="Escribe una dirección..." style="width: 300px; padding: 5px;">
<button onclick="buscarDireccion()">Buscar</button>

<script>
    function buscarDireccion() {
        const direccion = document.getElementById("direccion").value;
        if (!direccion) return alert("Ingresa una dirección");

        const url = `https://nominatim.openstreetmap.org/search?format=json&q=${direccion}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const lat = data[0].lat;
                    const lon = data[0].lon;

                    map.setView([lat, lon], 15);
                    L.marker([lat, lon])
                        .addTo(map)
                        .bindPopup(`Ubicación: ${direccion}`)
                        .openPopup();
                } else {
                    alert("Dirección no encontrada");
                }
            })
            .catch(error => console.error("Error:", error));
    }
</script>

</body>
</html>
