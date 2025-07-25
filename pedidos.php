<?php
session_start();
if ($_SESSION['rol'] !== 'preventista') die("Acceso denegado.");
$file = 'data/ventas.csv';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $line = implode(",", [date('Y-m-d H:i'), $_SESSION['usuario'], $_POST['cliente'], $_POST['producto'], $_POST['cantidad']]) . "\n";
    file_put_contents($file, $line, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Pedidos</title></head><body>
<h2>Registrar pedido</h2>
<form method="post">
    Cliente: <input name="cliente"><br>
    Producto: <input name="producto"><br>
    Cantidad: <input name="cantidad" type="number"><br>
    <button>Registrar</button>
</form>
<h3>Mis pedidos</h3>
<ul>
<?php if (file_exists($file)) foreach (file($file, FILE_IGNORE_NEW_LINES) as $line): ?>
    <?php if (str_contains($line, $_SESSION['usuario'])): ?>
        <li><?= htmlspecialchars($line) ?></li>
    <?php endif; ?>
<?php endforeach; ?>
</ul>
<a href="dashboard.php">Volver</a>
</body></html>