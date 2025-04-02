<section class="my-8">
    <h2 class="text-3xl font-bold mb-4">Üdvözöljük a Szépségszalonban!</h2>
    <p>Foglaljon időpontot műkörmös, fodrász vagy smink szolgáltatásainkra, és inspirálódjon galériánkból!</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
        <div>
            <h3 class="text-xl font-semibold">Bemutatkozó videó</h3>
            <video controls class="w-full">
                <source src="<?php echo $config['site']['base_url']; ?>/public/videos/sample.mp4" type="video/mp4">
                A böngésző nem támogatja a videót.
            </video>
        </div>
        <div>
            <h3 class="text-xl font-semibold">Inspiráció a YouTube-on</h3>
            <iframe class="w-full" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="my-4">
        <h3 class="text-xl font-semibold">Hol találsz minket?</h3>
        <img src="https://via.placeholder.com/600x400?text=Szalon+Térkép" alt="Térkép" class="w-full">
    </div>
</section>
?>