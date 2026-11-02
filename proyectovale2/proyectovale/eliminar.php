<?php
require 'conexion.php';

$pdo->prepare("DELETE FROM productos WHERE id = ?")->execute([$_GET['id'] ?? 0]);

header('Location: index.php?s=modificar&ok=' . urlencode('Artículo eliminado correctamente.'));
exit;
