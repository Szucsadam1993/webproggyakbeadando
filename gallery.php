<h2 class="text-2xl font-bold mb-4 text-pink-500">Munkáink</h2>
<?php if (isset($error) && $error): ?>
    <p class="text-red-500 mb-4"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<?php if (isset($success) && $success): ?>
    <p class="text-green-500 mb-4"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>
<?php if (isset($_SESSION['user'])): ?>
    <form method="post" enctype="multipart/form-data" class="mb-8">
        <label for="image" class="block mb-2">Kép feltöltése:</label>
        <input type="file" name="image" id="image" accept="image/*" class="mb-4">
        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">Feltöltés</button>
    </form>
<?php endif; ?>
<div class="gallery-grid">
    <?php foreach ($images as $image): ?>
        <div class="border p-4">
            <img src="<?= $config['site']['base_url'] ?>/public/images/uploads/<?= htmlspecialchars($image['filename']) ?>" alt="Galéria kép" class="w-full h-48 object-cover">
            <p class="mt-2">Feltöltötte: <?= htmlspecialchars($image['user_id']) ?></p>
            <!-- Megjegyzések megjelenítése -->
            <div class="mt-4">
                <h3 class="text-lg font-semibold">Megjegyzések</h3>
                <?php if (!empty($image['comments'])): ?>
                    <?php foreach ($image['comments'] as $comment): ?>
                        <div class="border-t pt-2 mt-2">
                            <p><strong><?= htmlspecialchars($comment['user_id']) ?>:</strong> <?= htmlspecialchars($comment['comment']) ?></p>
                            <p class="text-sm text-gray-500"><?= $comment['created_at'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-500">Még nincsenek megjegyzések.</p>
                <?php endif; ?>
            </div>
            <!-- Megjegyzés hozzáadása űrlap -->
            <?php if (isset($_SESSION['user'])): ?>
                <form method="post" class="mt-4">
                    <input type="hidden" name="action" value="add_comment">
                    <input type="hidden" name="image_id" value="<?= $image['id'] ?>">
                    <label for="comment-<?= $image['id'] ?>" class="block mb-2">Hozzászólás:</label>
                    <textarea name="comment" id="comment-<?= $image['id'] ?>" class="w-full p-2 border rounded" rows="3" placeholder="Írd meg a véleményed..."></textarea>
                    <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 mt-2">Küldés</button>
                </form>
            <?php else: ?>
                <p class="text-gray-500 mt-2">Jelentkezz be a hozzászóláshoz!</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>