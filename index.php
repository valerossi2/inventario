<?php
require 'conexion.php';
$s=$_GET['s'] ?? 'inicio';
$productos = $pdo->query("SELECT * FROM productos ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="index.php?s=inicio" class="<?= $s == 'inicio'    ? 'activo' : '' ?>">inicio</a>
        <a href="index.php?s=registrar" class="<?= $s == 'registrar' ? 'activo' : '' ?>">Registrar Inventario</a>
        <a href="index.php?s=ver"       class="<?= $s == 'ver'       ? 'activo' : '' ?>">Ver Inventario</a>
        <a href="index.php?s=modificar" class="<?= $s == 'modificar' ? 'activo' : '' ?>">Modificar Inventario</a>
    </nav>

    <main>
    <?php if ($s == 'inicio'): ?>

    
    <section class="hero">
        <span class="badge">Sistema de inventario</span>
        <h1>Control de almacén,<br><em>simple y siempre claro.</em></h1>
        <p class="lead">
            Registra tus artículos y controla costos, precios e ITBIS en un solo lugar.
        </p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="index.php?s=registrar">Registrar inventario</a>
            <a class="btn btn-ghost" href="index.php?s=ver">Ver inventario</a>
        </div>
    </section>
 
    <section class="stats">
        <div class="stat">
            <span>Artículos registrados</span>
            <strong><?= count($productos) ?></strong>
        </div>
        <div class="stat">
            <span>Costo total</span>
            <strong>RD$ <?= number_format(array_sum(array_column($productos, 'precio_costo')), 2) ?></strong>
        </div>
        <div class="stat">
            <span>Valor total con ITBIS</span>
            <strong>RD$ <?= number_format(array_sum(array_column($productos, 'valor_total')), 2) ?></strong>
        </div>
    </section>

    <?php elseif ($s == 'registrar'): ?>

        <h1>Registrar Inventario</h1>
        <form method="post" action="guardar.php">
        <label>Artículo</label>
        <input type="text" name="articulo" required>

        <label>Descripción</label>
        <textarea name="descripcion" required></textarea>

        <label>Precio costo</label>
        <input type="number" step="0.01" min="0" name="precio_costo" required>

        <label>Precio de venta</label>
        <input type="number" step="0.01" min="0" name="precio_venta" required>

        <label>ITBIS (%)</label>
        <input type="number" step="0.01" min="0" name="itbis" required>

        <button type="submit">Guardar</button>
    </form>

<?php elseif ($s == 'ver'): ?>

  <h1>Ver Inventario</h1>
  <table>
    <tr>
      <th>ID</th><th>Artículo</th><th>Descripción</th>
      <th>Precio costo</th><th>Precio de venta</th><th>ITBIS</th><th>valor_total</th>
    </tr>
    <?php if (!$productos): ?>
      <tr><td colspan="7">Aún no hay artículos registrados.</td></tr>
    <?php endif; ?>
    <?php foreach ($productos as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= h($p['articulo']) ?></td>
        <td><?= h($p['descripcion']) ?></td>
        <td><?= number_format($p['precio_costo'], 2) ?></td>
        <td><?= number_format($p['precio_venta'], 2) ?></td>
        <td><?= number_format($p['itbis'], 2) ?>%</td>
        <td><?= number_format($p['valor_total'], 2) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <?php elseif ($s == 'modificar'): ?>

  <h1>Modificar Inventario</h1>
  <table>
    <tr>
      <th>ID</th><th>Artículo</th><th>Descripción</th>
      <th>Precio costo</th><th>Precio de venta</th><th>ITBIS</th><th>valor_total</th><th>Acciones</th>
    </tr>
    <?php if (!$productos): ?>
      <tr><td colspan="8">No hay artículos para modificar.</td></tr>
    <?php endif ?>

     <?php foreach ($productos as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= h($p['articulo']) ?></td>
        <td><?= h($p['descripcion']) ?></td>
        <td><?= number_format($p['precio_costo'], 2) ?></td>
        <td><?= number_format($p['precio_venta'], 2) ?></td>
        <td><?= number_format($p['itbis'], 2) ?></td>
        <td><?= number_format($p['valor_total'], 2) ?></td>

        <td>
          <a class="editar" href="editar.php?id=<?= $p['id'] ?>">Editar</a>
          <a class="eliminar" href="eliminar.php?id=<?= $p['id'] ?>"
             onclick="return confirm('¿Eliminar este artículo?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

<?php endif; ?>

</main>

<footer>&copy; <?= date('Y') ?> Yangelly Pitbit</footer>
</body>
</html>