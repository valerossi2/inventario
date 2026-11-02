<?php
// Cambia 'inventario' por el nombre de tu base de datos si es otro
$pdo = new PDO('mysql:host=localhost;dbname=inventario;charset=utf8mb4', 'root', '');

// Muestra texto de forma segura en HTML
function h($texto) {
    return htmlspecialchars((string)$texto);
}
