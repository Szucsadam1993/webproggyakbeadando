<!-- A bejelentkezés/regisztráció most a modalban történik -->
<?php if (isset($error) && $error): ?>
    <script>
        alert("<?= htmlspecialchars($error) ?>");
        window.location.href = "<?= $config['site']['base_url'] ?>/index.php?page=home";
    </script>
<?php endif; ?>