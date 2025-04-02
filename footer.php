</main>
<footer class="bg-pink-500 text-white p-4 text-center">
    <p>© <?= date('Y') ?> <?= $config['site']['title'] ?>. Minden jog fenntartva.</p>
    <p>Cím: <?= $config['site']['address'] ?></p>
    <div id="map" class="w-full h-48 mt-4"></div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script>
        var map = L.map('map').setView([47.497912, 19.039132], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([47.497912, 19.039132]).addTo(map)
            .bindPopup('Szépségszalon')
            .openPopup();
    </script>
</footer>
</body>
</html>