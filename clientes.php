<?php
session_start();
if ($_SESSION['rol'] !== 'admin') die("Acceso denegado.");
$file = 'data/clientes.csv';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $line = implode(",", [$_POST['nombre'], $_POST['direccion'], $_POST['telefono']]) . "\n";
    file_put_contents($file, $line, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Clientes</title></head><body>
<h2>Agregar cliente</h2>
<form method="post">
    Nombre: <input name="nombre"><br>
    Dirección: <input name="direccion"><br>
    Teléfono: <input name="telefono"><br>
    <button>Guardar</button>
</form>
<h3>Lista de clientes</h3>
<ul>
<?php if (file_exists($file)) foreach (file($file, FILE_IGNORE_NEW_LINES) as $line): ?>
    <li><?= htmlspecialchars($line) ?></li>
<?php endforeach; ?>
</ul>
<a href="dashboard.php">Volver</a>
</body></html>