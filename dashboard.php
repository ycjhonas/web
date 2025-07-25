<?php
session_start();
if (!isset($_SESSION['usuario'])) header('Location: index.php');
$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Panel</title></head>
<body>
<h2>Bienvenido <?= $_SESSION['usuario'] ?> (<?= $rol ?>)</h2>
<ul>
<?php if ($rol === 'admin'): ?>
    <li><a href="productos.php">Gestionar productos</a></li>
    <li><a href="clientes.php">Gestionar clientes</a></li>
    <li><a href="exportar.php">Exportar datos</a></li>
<?php else: ?>
    <li><a href="pedidos.php">Registrar pedido</a></li>
<?php endif; ?>
    <li><a href="logout.php">Cerrar sesión</a></li>
</ul>
</body></html>