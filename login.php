<section class="my-8">
    <h2 class="text-2xl font-bold mb-4">Belépés / Regisztráció</h2>
    <?php if ($error): ?>
        <p class="text-red-500"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h3 class="text-xl font-semibold mb-2">Belépés</h3>
            <form id="loginForm" action="<?php echo $config['site']['base_url']; ?>/index.php?page=login" method="post">
                <input type="hidden" name="action" value="login">
                <div class="mb-4">
                    <label for="username" class="block">Felhasználónév</label>
                    <input type="text" id="username" name="username" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block">Jelszó</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border rounded" required>
                </div>
                <button type="submit" class="bg-pink-500 text-white p-2 rounded hover:bg-pink-600">Belépés</button>
            </form>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-2">Regisztráció</h3>
            <form id="registerForm" action="<?php echo $config['site']['base_url']; ?>/index.php?page=login" method="post">
                <input type="hidden" name="action" value="register">
                <div class="mb-4">
                    <label for="reg_username" class="block">Felhasználónév</label>
                    <input type="text" id="reg_username" name="username" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="reg_password" class="block">Jelszó</label>
                    <input type="password" id="reg_password" name="password" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="firstname" class="block">Keresztnév</label>
                    <input type="text" id="firstname" name="firstname" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="lastname" class="block">Vezetéknév</label>
                    <input type="text" id="lastname" name="lastname" class="w-full p-2 border rounded" required>
                </div>
                <button type="submit" class="bg-pink-500 text-white p-2 rounded hover:bg-pink-600">Regisztráció</button>
            </form>
        </div>
    </div>
</section>
?>