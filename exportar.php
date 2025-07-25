<?php
session_start();
if ($_SESSION['rol'] !== 'admin') die("Acceso denegado.");
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="exportacion.csv"');
foreach (['productos.csv', 'clientes.csv', 'ventas.csv'] as $f) {
    echo strtoupper(str_replace('.csv','',$f)) . "\n";
    if (file_exists("data/$f")) echo file_get_contents("data/$f") . "\n";
}
exit;