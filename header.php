<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config['site']['title']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo $config['site']['base_url']; ?>/public/css/styles.css">
    <script src="<?php echo $config['site']['base_url']; ?>/public/js/scripts.js" defer></script>
</head>
<body class="bg-pink-100">
    <header class="bg-pink-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold"><?php echo htmlspecialchars($config['site']['title']); ?></h1>
            <?php if (isset($_SESSION['user'])): ?>
                <p>Bejelentkezett: <?php echo htmlspecialchars($_SESSION['user']['lastname'] . ' ' . $_SESSION['user']['firstname'] . ' (' . $_SESSION['user']['username'] . ')'); ?></p>
            <?php endif; ?>
        </div>
    </header>
    <nav class="bg-pink-500 text-white p-4">
        <ul class="container mx-auto flex space-x-4">
            <?php foreach ($config['menu'] as $key => $item): ?>
                <?php if ($item['visible']): ?>
                    <li><a href="<?php echo $config['site']['base_url']; ?>/index.php?page=<?php echo $key; ?>" class="hover:underline"><?php echo htmlspecialchars($item['title']); ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
    <main class="container mx-auto p-4">