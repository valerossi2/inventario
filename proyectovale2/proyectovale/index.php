<?php
require 'conexion.php';

// Sección elegida en el menú: solo se muestra una a la vez
$validas = ['inicio', 'registrar', 'ver', 'modificar'];
$s = $_GET['s'] ?? 'inicio';
if (!in_array($s, $validas, true)) {
    $s = 'inicio';
}

$titulos = [
    'inicio'    => 'Inicio',
    'registrar' => 'Registrar inventario',
    'ver'       => 'Ver inventario',
    'modificar' => 'Modificar inventario',
];
$titulo = $titulos[$s];

$productos = [];
if ($s === 'ver' || $s === 'modificar') {
    $productos = $pdo->query("SELECT * FROM productos ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
}

require 'encabezado.php';
?>

<?php if ($s == 'inicio'): ?>

  <!-- ===== HERO ===== -->
  <div class="hero-wrap">
    <section class="container hero">
      <div>
        <span class="eyebrow">Control de almacén</span>
        <h1>Tu almacén,<br><em>siempre en orden.</em></h1>
        <p class="lead">
          Stockia es un sistema de inventario claro y sencillo para registrar tus artículos,
          conocer sus precios e ITBIS y mantener todo bajo control, sin hojas de cálculo ni complicaciones.
        </p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="index.php?s=registrar">Registrar inventario</a>
          <a class="btn btn-ghost" href="index.php?s=ver">Ver inventario</a>
        </div>
      </div>
      <div class="hero-art">
        <img src="almacen.svg" alt="Ilustración de una tabla de inventario con artículos y cajas de almacén">
      </div>
    </section>
  </div>

  <!-- ===== QUÉ PUEDES HACER ===== -->
  <section class="section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Todo en un lugar</span>
        <h2>Lo esencial para controlar tu inventario</h2>
        <p>Tres acciones simples que cubren el día a día de cualquier almacén.</p>
      </div>

      <div class="features">
        <article class="feature">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
          </div>
          <h3>Registra</h3>
          <p>Guarda cada artículo con su descripción, precio costo, precio de venta e ITBIS en pocos segundos.</p>
          <a href="index.php?s=registrar">Registrar inventario &rarr;</a>
        </article>

        <article class="feature">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h10"/></svg>
          </div>
          <h3>Consulta</h3>
          <p>Revisa todo tu inventario en una tabla ordenada, con la información siempre a la vista.</p>
          <a href="index.php?s=ver">Ver inventario &rarr;</a>
        </article>

        <article class="feature">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20h4L19 9a2.8 2.8 0 0 0-4-4L4 16v4z"/></svg>
          </div>
          <h3>Modifica</h3>
          <p>Corrige precios o elimina artículos cuando algo cambie, todo desde un solo lugar.</p>
          <a href="index.php?s=modificar">Modificar inventario &rarr;</a>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== SOBRE LA MARCA ===== -->
  <section class="section about">
    <div class="container about-grid">
      <div>
        <span class="eyebrow">Sobre Stockia</span>
        <h2>Pensado para que controlar tu almacén sea <em>simple.</em></h2>
        <p>
          Stockia nace de una idea sencilla: llevar el inventario no debería ser complicado.
          Muchos negocios pierden tiempo y dinero por no saber qué tienen, cuánto les costó y a cuánto lo venden.
        </p>
        <p>
          Por eso reunimos esa información en un solo lugar, con una interfaz limpia que cualquiera
          puede usar desde el primer día.
        </p>
      </div>

      <div class="values">
        <div class="value">
          <span class="value-n">01</span>
          <div>
            <h3>Claridad</h3>
            <p>Cada dato en su lugar, sin pantallas llenas de ruido.</p>
          </div>
        </div>
        <div class="value">
          <span class="value-n">02</span>
          <div>
            <h3>Rapidez</h3>
            <p>Registrar, consultar y corregir en pocos clics.</p>
          </div>
        </div>
        <div class="value">
          <span class="value-n">03</span>
          <div>
            <h3>Orden</h3>
            <p>Un inventario ordenado evita pérdidas y errores al vender.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== CÓMO FUNCIONA ===== -->
  <section class="section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Cómo funciona</span>
        <h2>De cero a un almacén ordenado en tres pasos</h2>
      </div>

      <ol class="steps">
        <li>
          <span class="n">01</span>
          <h3>Registra tus artículos</h3>
          <p>Completa el formulario con el nombre, la descripción y los precios.</p>
        </li>
        <li>
          <span class="n">02</span>
          <h3>Consulta tu inventario</h3>
          <p>Mira todos los artículos guardados en una sola tabla.</p>
        </li>
        <li>
          <span class="n">03</span>
          <h3>Actualiza cuando cambie</h3>
          <p>Edita un precio o elimina un artículo en cualquier momento.</p>
        </li>
      </ol>
    </div>
  </section>

  <!-- ===== LLAMADO FINAL ===== -->
  <div class="cta-wrap">
    <div class="container">
      <div class="cta">
        <h2>Empieza a ordenar tu almacén hoy</h2>
        <p>Registra tu primer artículo y ten tu inventario bajo control en minutos.</p>
        <a class="btn btn-primary" href="index.php?s=registrar">Registrar mi primer artículo</a>
      </div>
    </div>
  </div>

<?php elseif ($s == 'registrar'): ?>

  <div class="container narrow page">
    <a class="back" href="index.php?s=inicio">&larr; Volver al inicio</a>
    <div class="page-head">
      <div>
        <h1>Registrar inventario</h1>
        <p>Agrega un nuevo artículo a tu almacén.</p>
      </div>
    </div>

    <form class="card" method="post" action="guardar.php">

      <div class="form-section">
        <div>
          <h2>Información</h2>
          <p class="desc">El nombre y la descripción con los que identificarás el artículo.</p>
        </div>
        <div>
          <div class="field">
            <label for="articulo">Artículo</label>
            <input type="text" id="articulo" name="articulo" maxlength="120" placeholder="Ej: Mouse inalámbrico" required>
          </div>
          <div class="field">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Describe brevemente el artículo" required></textarea>
          </div>
        </div>
      </div>

      <div class="form-section">
        <div>
          <h2>Precios</h2>
          <p class="desc">Lo que te costó, a cuánto lo vendes y el impuesto.</p>
        </div>
        <div class="grid-2">
          <div class="field">
            <label for="precio_costo">Precio costo</label>
            <div class="input-group">
              <span>RD$</span>
              <input type="number" id="precio_costo" name="precio_costo" step="0.01" min="0" placeholder="0.00" required>
            </div>
          </div>
          <div class="field">
            <label for="precio_venta">Precio de venta</label>
            <div class="input-group">
              <span>RD$</span>
              <input type="number" id="precio_venta" name="precio_venta" step="0.01" min="0" placeholder="0.00" required>
            </div>
          </div>
          <div class="field">
            <label for="itbis">ITBIS</label>
            <div class="input-group">
              <span>RD$</span>
              <input type="number" id="itbis" name="itbis" step="0.01" min="0" placeholder="0.00" required>
            </div>
            <p class="hint">Monto del impuesto. Ej: 18.00</p>
          </div>
        </div>
      </div>

      <div class="form-actions">
        <a class="btn btn-ghost" href="index.php?s=ver">Cancelar</a>
        <button class="btn btn-primary" type="submit">Guardar artículo</button>
      </div>
    </form>
  </div>

<?php elseif ($s == 'ver'): ?>

  <div class="container page">
    <?php if (!empty($_GET['ok'])): ?>
      <div class="alert">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
        <?= h($_GET['ok']) ?>
      </div>
    <?php endif; ?>

    <div class="page-head">
      <div>
        <h1>Ver inventario</h1>
        <p>Todos los artículos registrados en tu almacén.</p>
      </div>
      <a class="btn btn-primary" href="index.php?s=registrar">Nuevo artículo</a>
    </div>

    <div class="card">
      <?php if (!$productos): ?>
        <div class="empty">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/></svg>
          </div>
          <h3>Aún no hay artículos</h3>
          <p>Registra el primero para verlo aquí.</p>
          <a class="btn btn-primary" href="index.php?s=registrar">Registrar inventario</a>
        </div>
      <?php else: ?>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Artículo</th>
                <th>Descripción</th>
                <th class="num">Precio costo</th>
                <th class="num">Precio de venta</th>
                <th class="num">ITBIS</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($productos as $p): ?>
                <tr>
                  <td><span class="id-chip"><?= (int)$p['id'] ?></span></td>
                  <td class="name"><?= h($p['articulo']) ?></td>
                  <td class="desc-cell"><?= h($p['descripcion']) ?></td>
                  <td class="num">RD$ <?= number_format($p['precio_costo'], 2) ?></td>
                  <td class="num">RD$ <?= number_format($p['precio_venta'], 2) ?></td>
                  <td class="num">RD$ <?= number_format($p['itbis'], 2) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="table-foot"><?= count($productos) ?> artículo<?= count($productos) == 1 ? '' : 's' ?> registrado<?= count($productos) == 1 ? '' : 's' ?></div>
      <?php endif; ?>
    </div>
  </div>

<?php elseif ($s == 'modificar'): ?>

  <div class="container page">
    <?php if (!empty($_GET['ok'])): ?>
      <div class="alert">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
        <?= h($_GET['ok']) ?>
      </div>
    <?php endif; ?>

    <div class="page-head">
      <div>
        <h1>Modificar inventario</h1>
        <p>Edita los datos de un artículo o elimínalo.</p>
      </div>
    </div>

    <div class="card">
      <?php if (!$productos): ?>
        <div class="empty">
          <div class="icon-box">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/></svg>
          </div>
          <h3>No hay artículos para modificar</h3>
          <p>Registra uno primero.</p>
          <a class="btn btn-primary" href="index.php?s=registrar">Registrar inventario</a>
        </div>
      <?php else: ?>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Artículo</th>
                <th>Descripción</th>
                <th class="num">Precio costo</th>
                <th class="num">Precio de venta</th>
                <th class="num">ITBIS</th>
                <th class="num">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($productos as $p): ?>
                <tr>
                  <td><span class="id-chip"><?= (int)$p['id'] ?></span></td>
                  <td class="name"><?= h($p['articulo']) ?></td>
                  <td class="desc-cell"><?= h($p['descripcion']) ?></td>
                  <td class="num">RD$ <?= number_format($p['precio_costo'], 2) ?></td>
                  <td class="num">RD$ <?= number_format($p['precio_venta'], 2) ?></td>
                  <td class="num">RD$ <?= number_format($p['itbis'], 2) ?></td>
                  <td>
                    <div class="row-actions">
                      <a class="btn btn-soft btn-sm" href="editar.php?id=<?= (int)$p['id'] ?>">Editar</a>
                      <a class="btn btn-danger-soft btn-sm" href="eliminar.php?id=<?= (int)$p['id'] ?>"
                         onclick="return confirm('¿Eliminar este artículo?')">Eliminar</a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="table-foot"><?= count($productos) ?> artículo<?= count($productos) == 1 ? '' : 's' ?> registrado<?= count($productos) == 1 ? '' : 's' ?></div>
      <?php endif; ?>
    </div>
  </div>

<?php endif; ?>

<?php require 'pie.php'; ?>
