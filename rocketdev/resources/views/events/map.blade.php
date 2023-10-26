<!DOCTYPE html>
<html>
<head>
    <title>Carte avec Recherche de Trajet</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map { height: 400px; }
    </style>
</head>
<body>
    <div id="map"></div>
    <form id="route-form">
        <label for="start-point">Point de départ :</label>
        <input type="text" id="start-point" placeholder="Saisir les coordonnées du point de départ">

        <label for="end-point">Point d'arrivée :</label>
        <input type="text" id="end-point" placeholder="Saisir les coordonnées du point d'arrivée">

        <button type="submit">Trouver l'itinéraire</button>
    </form>
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.0/mapbox-gl-directions.js"></script>

    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.0/mapbox-gl-directions.css"
    />

    <script>
        var map = L.map('map').setView([48.8566, 2.3522], 6); // Coordonnées de Paris et niveau de zoom
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var directions = new MapboxDirections({
            accessToken: 'sk.eyJ1IjoiYm91bGlmaSIsImEiOiJjbG56eHowd3kwYXQ1MmtvNzh1ZDVlMnBrIn0.JKgsGv2FhqeNwIFli6zsUQ',
            unit: 'metric',
        });

        directions.setOrigin([2.3522, 48.8566]); // Coordonnées de Paris (point de départ par défaut)
        directions.setDestination([4.85, 45.75]); // Coordonnées de Lyon (point d'arrivée par défaut)

        map.addControl(directions);

        document.getElementById('route-form').addEventListener('submit', function (e) {
            e.preventDefault();

            var startPointInput = document.getElementById('start-point');
            var endPointInput = document.getElementById('end-point');

            var startPoint = startPointInput.value;
            var endPoint = endPointInput.value;

            directions.setOrigin(startPoint); // Définir le point de départ saisi
            directions.setDestination(endPoint); // Définir le point d'arrivée saisi
        });
    </script>
</body>
</html>
