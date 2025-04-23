<?php
if (!isset($config)) {
    $config = require 'config/config.php';
}
session_start();
?>
<!DOCTYPE html>
<html lang="hu" class="min-h-screen">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config['site']['title'] ?> - <?= $config['menu'][$_GET['page'] ?? 'home']['title'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= $config['site']['base_url'] ?>/public/css/styles.css">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="bg-pink-500 text-white p-4 flex items-center justify-between">
        <div class="flex items-center">
            <img src="<?= $config['site']['base_url'] ?>/public/images/logo.png" alt="Moonlight Szépségszalon Logo" class="h-12 mr-4">
            <h1 class="text-2xl font-bold"><?= $config['site']['title'] ?></h1>
        </div>
        <?php if (isset($_SESSION['user'])): ?>
            <div class="text-right">
                <p class="text-sm"><?= htmlspecialchars($_SESSION['user']['username']) ?> <span class="font-bold">Bejelentkezve</span></p>
            </div>
        <?php endif; ?>
    </header>
    <nav class="bg-pink-400 text-white p-4">
        <ul class="flex space-x-4">
            <?php foreach ($config['menu'] as $key => $menuItem): ?>
                <?php if ($menuItem['visible']): ?>
                    <li class="relative dropdown">
                        <?php if ($key === 'home'): ?>
                            <a href="<?= $config['site']['base_url'] ?>/index.php?page=<?= $key ?>" class="hover:underline <?= (($_GET['page'] ?? 'home') === $key) ? 'font-bold' : '' ?>">
                                <?= $menuItem['title'] ?>
                            </a>
                            <!-- Lenyíló menü -->
                            <ul class="absolute hidden dropdown-menu bg-pink-400 text-white p-2 mt-0 space-y-2 rounded shadow-lg w-48">
                                <li><a href="#bemutatkozas" class="block hover:underline scroll-smooth">Bemutatkozás</a></li>
                                <li><a href="#szolgaltatasaink" class="block hover:underline scroll-smooth">Szolgáltatásaink</a></li>
                                <li><a href="#kapcsolat" class="block hover:underline scroll-smooth">Kapcsolat</a></li>
                            </ul>
                        <?php elseif ($key === 'login'): ?>
                            <a href="#" onclick="openModal()" class="hover:underline <?= (($_GET['page'] ?? 'home') === $key) ? 'font-bold' : '' ?>">
                                <?= $menuItem['title'] ?>
                            </a>
                        <?php else: ?>
                            <a href="<?= $config['site']['base_url'] ?>/index.php?page=<?= $key ?>" class="hover:underline <?= (($_GET['page'] ?? 'home') === $key) ? 'font-bold' : '' ?>">
                                <?= $menuItem['title'] ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>

    <!-- Modal a bejelentkezéshez/regisztrációhoz -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 id="modalTitle" class="text-xl font-bold">Bejelentkezés</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">×</button>
            </div>
            <!-- Bejelentkezési űrlap -->
            <div id="loginForm">
                <form method="post" action="<?= $config['site']['base_url'] ?>/index.php?page=login">
                    <input type="hidden" name="action" value="login">
                    <div class="mb-4">
                        <label for="username" class="block mb-2">Felhasználónév:</label>
                        <input type="text" name="username" id="username" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2">Jelszó:</label>
                        <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
                    </div>
                    <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 w-full">Bejelentkezés</button>
                </form>
                <p class="mt-4 text-center">
                    Még nincs fiókod? <a href="#" onclick="showRegisterForm()" class="text-pink-500 hover:underline">Regisztrálj!</a>
                </p>
            </div>
            <!-- Regisztrációs űrlap -->
            <div id="registerForm" class="hidden">
                <form method="post" action="<?= $config['site']['base_url'] ?>/index.php?page=login">
                    <input type="hidden" name="action" value="register">
                    <div class="mb-4">
                        <label for="reg-username" class="block mb-2">Felhasználónév:</label>
                        <input type="text" name="username" id="reg-username" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="reg-password" class="block mb-2">Jelszó:</label>
                        <input type="password" name="password" id="reg-password" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="firstname" class="block mb-2">Keresztnév:</label>
                        <input type="text" name="firstname" id="firstname" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="lastname" class="block mb-2">Vezetéknév:</label>
                        <input type="text" name="lastname" id="lastname" class="w-full p-2 border rounded" required>
                    </div>
                    <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 w-full">Regisztráció</button>
                </form>
                <p class="mt-4 text-center">
                    Már van fiókod? <a href="#" onclick="showLoginForm()" class="text-pink-500 hover:underline">Jelentkezz be!</a>
                </p>
            </div>
        </div>
    </div>

    <main class="container mx-auto p-4 flex-grow">

    <!-- JavaScript a modal kezeléséhez -->
    <script>
        function openModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            showLoginForm();
        }

        function closeModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }

        function showLoginForm() {
            document.getElementById('modalTitle').textContent = 'Bejelentkezés';
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('registerForm').classList.add('hidden');
        }

        function showRegisterForm() {
            document.getElementById('modalTitle').textContent = 'Regisztráció';
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.remove('hidden');
        }

        // Modal bezárása, ha a felhasználó a háttérre kattint
        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>

    <!-- CSS a lenyíló menü javításához -->
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu {
            top: 100%; /* Közvetlenül a "Főoldal" link alatt jelenik meg */
            left: 0;
        }
    </style>