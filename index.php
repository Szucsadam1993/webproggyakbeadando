<?php
session_start();
require_once __DIR__ . '/config/config.php'; 
require_once __DIR__ . '/controllers/MainController.php';
$controller = new MainController();
$controller->handleRequest();
?>