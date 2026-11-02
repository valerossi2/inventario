<?php
// Parte superior que comparten todas las páginas: <head> + barra de navegación.
// Cada página define $s (sección activa) y $titulo antes de incluir este archivo.
require_once __DIR__ . '/conexion.php';

$s      = $s ?? 'inicio';
$titulo = $titulo ?? 'Stockia';

$menu = [
    'inicio'    => 'Inicio',
    'registrar' => 'Registrar inventario',
    'ver'       => 'Ver inventario',
    'modificar' => 'Modificar inventario',
];
$activo = ($s === 'editar') ? 'modificar' : $s;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= h($titulo) ?> · Stockia</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="topbar">
  <div class="topbar-in">
    <a class="brand" href="index.php?s=inicio">
      <span class="brand-mark">
        <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg>
      </span>
      <span>Stock<b>ia</b></span>
    </a>

    <nav class="menu" aria-label="Menú principal">
      <?php foreach ($menu as $clave => $texto): ?>
        <a href="index.php?s=<?= $clave ?>" class="<?= $activo === $clave ? 'activo' : '' ?>"><?= h($texto) ?></a>
      <?php endforeach; ?>
    </nav>

    <a class="btn btn-primary" href="index.php?s=registrar">Nuevo artículo</a>
  </div>
</header>

<main>
