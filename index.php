<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/repositorios/MySQLProductRepository.php';
require_once __DIR__ . '/servicios/ProductService.php';
require_once __DIR__ . '/controlador/ProductController.php';

$pdo      = Database::connect();
$repo     = new MySQLProductRepository($pdo);
$service  = new ProductService($repo);
$ctrl     = new ProductController($service);

$ctrl->index();
