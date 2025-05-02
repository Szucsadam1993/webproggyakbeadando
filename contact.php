<section class="my-8">
    <h2 class="text-2xl font-bold mb-4">Foglalás / Kapcsolat</h2>
    <?php if ($error): ?>
        <p class="text-red-500"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form id="contactForm" action="<?php echo $config['site']['base_url']; ?>/index.php?page=contact" method="post">
        <div class="mb-4">
            <label for="name" class="block">Név</label>
            <input type="text" id="name" name="name" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="message" class="block">Üzenet / Foglalási kérés</label>
            <textarea id="message" name="message" class="w-full p-2 border rounded"></textarea>
        </div>
        <button type="submit" class="bg-pink-500 text-white p-2 rounded hover:bg-pink-600">Küldés</button>
    </form>
</section>