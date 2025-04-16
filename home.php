<!-- Videók -->
<div class="mb-8 flex space-x-4">
    <div class="video-container w-1/2 h-48">
        <video controls class="w-full h-full object-cover">
            <source src="<?= $config['site']['base_url'] ?>/public/videos/moonlight-promo.mp4" type="video/mp4">
            A böngésző nem támogatja a videó lejátszását.
        </video>
    </div>
    <div class="video-container w-1/2">
        <iframe src="https://www.youtube.com/embed/lFcSrYw-ARY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<!-- Almenü -->
<nav class="mb-8">
    <ul class="flex space-x-4 justify-center">
        <li><a href="#bemutatkozas" class="text-pink-500 hover:underline scroll-smooth">Bemutatkozás</a></li>
        <li><a href="#szolgaltatasaink" class="text-pink-500 hover:underline scroll-smooth">Szolgáltatásaink</a></li>
        <li><a href="#kapcsolat" class="text-pink-500 hover:underline scroll-smooth">Kapcsolat</a></li>
    </ul>
</nav>

<!-- Bemutatkozás szekció -->
<section id="bemutatkozas" class="mb-12">
    <h2 class="text-2xl font-bold mb-4 text-pink-500">Bemutatkozás</h2>
    <p class="mb-2"><strong>Moonlight Szépségszalon – A Te ragyogásod a mi küldetésünk</strong></p>
    <p class="mb-2">Szeretettel várunk Budapest egyik legbájosabb utcájában, a Szépség utca 1. szám alatt, ahol a szépségápolás nem csupán szolgáltatás, hanem élmény. A Moonlight Szépségszalonban egy helyen találod meg mindazt, amire a teljes megújuláshoz szükséged van: profi műköröm, fodrász és kozmetikai szolgáltatásaink személyre szabottan, odafigyeléssel és magas szakmai színvonalon készülnek.</p>

</section>

<!-- Szolgáltatásaink szekció -->
<section id="szolgaltatasaink" class="mb-12">
    <h2 class="text-2xl font-bold mb-4 text-pink-500">Szolgáltatásaink</h2>
    <p class="mb-2"><strong>💅 Műköröm</strong><br>
    Tapasztalt körmösünk modern technikákkal és kreatív dizájnokkal dolgozik, hogy körmeid ne csak szépek, de tartósak is legyenek.<br>
    <strong>Szolgáltatásaink:</strong><br>
    - Gél lakkozás<br>
    - Épített műköröm<br>
    - Díszítés, festés, trendi minták<br>
    - Erősített manikűr, ápolás</p>
    <p class="mb-2"><strong>💇‍♀️ Fodrászat</strong><br>
    Legyen szó frissítő hajvágásról, teljes átalakulásról vagy egy elegáns alkalmi frizuráról, fodrászaink segítenek megtalálni a stílusod.<br>
    <strong>Szolgáltatásaink:</strong><br>
    - Női, férfi és gyermek hajvágás<br>
    - Hajfestés, melír, balayage<br>
    - Hajregeneráló kezelések<br>
    - Alkalmi frizurák, fonások</p>
    <p class="mb-2"><strong>💆‍♀️ Kozmetika</strong><br>
    Bőröd megérdemli a legjobb törődést. Személyre szabott arckezeléseink segítenek megőrizni bőröd egészségét és ragyogását.<br>
    <strong>Szolgáltatásaink:</strong><br>
    - Klasszikus és tisztító arckezelések<br>
    - Hidratáló és anti-aging kezelések<br>
    - Szemöldökformázás és festés<br>
    - Szempillafestés, lifting</p>
</section>

<!-- Kapcsolat szekció -->
<section id="kapcsolat">
    <h2 class="text-2xl font-bold mb-4 text-pink-500">Kapcsolat</h2>
    <p class="mb-2"><strong>🕒 Nyitvatartás</strong><br>
    Hétfő – Péntek: 9:00 – 19:00<br>
    Szombat: 9:00 – 14:00<br>
    Vasárnap: Zárva</p>
    <p>Lépj be hozzánk, és tapasztald meg a Moonlight Szépségszalon varázslatos világát! Foglalj időpontot még ma, és add meg magadnak azt a törődést, amit megérdemelsz!</p>
    <p class="mb-4">Látogass el hozzánk: <?= $config['site']['address'] ?></p>
    <div id="map" class="w-full h-64 mb-4"></div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script>
        var map = L.map('map').setView([47.497912, 19.039132], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([47.497912, 19.039132]).addTo(map)
            .bindPopup('Moonlight Szépségszalon')
            .openPopup();
    </script>
</section>

<!-- Görgetés simítása -->
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>