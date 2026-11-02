<?php
require 'conexion.php';

// Si se envió el formulario, actualizar y volver a Modificar
if (isset($_POST['actualizar'])) {
    $sql = "UPDATE productos
            SET articulo = ?, descripcion = ?, precio_costo = ?, precio_venta = ?, itbis = ?
            WHERE id = ?";
    $pdo->prepare($sql)->execute([
        $_POST['articulo'],
        $_POST['descripcion'],
        $_POST['precio_costo'],
        $_POST['precio_venta'],
        $_POST['itbis'],
        $_POST['id'],
    ]);
    header('Location: index.php?s=modificar&ok=' . urlencode('Artículo actualizado correctamente.'));
    exit;
}

// Si no, buscar el artículo por su ID para llenar el formulario
$st = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$st->execute([$_GET['id'] ?? 0]);
$p = $st->fetch(PDO::FETCH_ASSOC);

if (!$p) {
    header('Location: index.php?s=modificar');
    exit;
}

$s      = 'editar';
$titulo = 'Editar artículo';
require 'encabezado.php';
?>

<div class="container narrow page">
  <a class="back" href="index.php?s=modificar">&larr; Volver a modificar inventario</a>
  <div class="page-head">
    <div>
      <h1>Editar artículo</h1>
      <p>Cambia los datos que necesites y guarda los cambios.</p>
    </div>
  </div>

  <form class="card" method="post" action="editar.php">
    <input type="hidden" name="id" value="<?= (int)$p['id'] ?>">

    <div class="form-section">
      <div>
        <h2>Información</h2>
        <p class="desc">El nombre y la descripción del artículo.</p>
      </div>
      <div>
        <div class="field">
          <label for="articulo">Artículo</label>
          <input type="text" id="articulo" name="articulo" maxlength="120" value="<?= h($p['articulo']) ?>" required>
        </div>
        <div class="field">
          <label for="descripcion">Descripción</label>
          <textarea id="descripcion" name="descripcion" required><?= h($p['descripcion']) ?></textarea>
        </div>
      </div>
    </div>

    <div class="form-section">
      <div>
        <h2>Precios</h2>
        <p class="desc">Costo, venta e impuesto del artículo.</p>
      </div>
      <div class="grid-2">
        <div class="field">
          <label for="precio_costo">Precio costo</label>
          <div class="input-group">
            <span>RD$</span>
            <input type="number" id="precio_costo" name="precio_costo" step="0.01" min="0" value="<?= h($p['precio_costo']) ?>" required>
          </div>
        </div>
        <div class="field">
          <label for="precio_venta">Precio de venta</label>
          <div class="input-group">
            <span>RD$</span>
            <input type="number" id="precio_venta" name="precio_venta" step="0.01" min="0" value="<?= h($p['precio_venta']) ?>" required>
          </div>
        </div>
        <div class="field">
          <label for="itbis">ITBIS</label>
          <div class="input-group">
            <span>RD$</span>
            <input type="number" id="itbis" name="itbis" step="0.01" min="0" value="<?= h($p['itbis']) ?>" required>
          </div>
          <p class="hint">Monto del impuesto. Ej: 18.00</p>
        </div>
      </div>
    </div>

    <div class="form-actions">
      <a class="btn btn-ghost" href="index.php?s=modificar">Cancelar</a>
      <button class="btn btn-primary" type="submit" name="actualizar">Guardar cambios</button>
    </div>
  </form>
</div>

<?php require 'pie.php'; ?>
