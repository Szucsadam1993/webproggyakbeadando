<section class="my-8">
    <h2 class="text-2xl font-bold mb-4">Inspirációs Galéria</h2>
    <?php if ($error): ?>
        <p class="text-red-500"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION['user'])): ?>
        <form action="<?php echo $config['site']['base_url']; ?>/index.php?page=gallery" method="post" enctype="multipart/form-data" class="mb-4">
            <div class="mb-4">
                <label for="image" class="block">Kép feltöltése</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-pink-500 text-white p-2 rounded hover:bg-pink-600">Feltöltés</button>
        </form>
    <?php else: ?>
        <p class="text-gray-600">Kérjük, jelentkezzen be a képek feltöltéséhez!</p>
    <?php endif; ?>
    <div class="gallery-grid">
        <?php foreach ($images as $image): ?>
            <img src="<?php echo $config['site']['base_url']; ?>/public/images/uploads/<?php echo htmlspecialchars($image['filename']); ?>" alt="Inspiráció" class="w-full h-auto rounded">
        <?php endforeach; ?>
    </div>
</section>
?>