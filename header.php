<?php
if (!isset($config)) {
    $config = require 'config/config.php';
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $config['site']['title'] ?> - <?= $config['menu'][$_GET['page'] ?? 'home']['title'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= $config['site']['base_url'] ?>/public/css/styles.css">
</head>
<body class="bg-gray-100">
    <header class="bg-pink-500 text-white p-4 flex items-center">
        <img src="<?= $config['site']['base_url'] ?>/public/images/logo.png" alt="Moonlight Szépségszalon Logo" class="h-12 mr-4">
        <h1 class="text-2xl font-bold"><?= $config['site']['title'] ?></h1>
    </header>
    <nav class="bg-pink-400 text-white p-4">
        <ul class="flex space-x-4">
            <?php foreach ($config['menu'] as $key => $menuItem): ?>
                <?php if ($menuItem['visible']): ?>
                    <li>
                        <a href="<?= $config['site']['base_url'] ?>/index.php?page=<?= $key ?>" class="hover:underline <?= (($_GET['page'] ?? 'home') === $key) ? 'font-bold' : '' ?>">
                            <?= $menuItem['title'] ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
    <main class="container mx-auto p-4">