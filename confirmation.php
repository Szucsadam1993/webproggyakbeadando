<section class="my-8">
    <h2 class="text-2xl font-bold mb-4 text-pink-500">Üzenet elküldve</h2>
    <p><strong>Név:</strong> <?= htmlspecialchars($name) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Üzenet:</strong> <?= htmlspecialchars($message) ?></p>
    <p><strong>Küldő:</strong> <?= htmlspecialchars($sender) ?></p>
    <p class="mt-4"><a href="<?= $config['site']['base_url'] ?>/index.php?page=contact" class="text-pink-500 hover:underline">Vissza a kapcsolat oldalra</a></p>
</section>