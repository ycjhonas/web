<?php
session_start();
if ($_SESSION['rol'] !== 'admin') die("Acceso denegado.");
$file = 'data/productos.csv';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $line = implode(",", [$_POST['codigo'], $_POST['nombre'], $_POST['stock'], $_POST['precio']]) . "\n";
    file_put_contents($file, $line, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Productos</title></head><body>
<h2>Agregar producto</h2>
<form method="post">
    Código: <input name="codigo"><br>
    Nombre: <input name="nombre"><br>
    Stock: <input name="stock" type="number"><br>
    Precio: <input name="precio" type="number" step="0.01"><br>
    <button>Guardar</button>
</form>
<h3>Lista de productos</h3>
<ul>
<?php if (file_exists($file)) foreach (file($file, FILE_IGNORE_NEW_LINES) as $line): ?>
    <li><?= htmlspecialchars($line) ?></li>
<?php endforeach; ?>
</ul>
<a href="dashboard.php">Volver</a>
</body></html>