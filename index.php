<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'];
    $pass = $_POST['clave'];
    $usuarios = [
        'admin1' => ['clave' => '1234', 'rol' => 'admin'],
        'usuario1' => ['clave' => '1357', 'rol' => 'preventista'],
        'usuario2' => ['clave' => '2468', 'rol' => 'preventista']
    ];
    if (isset($usuarios[$user]) && $usuarios[$user]['clave'] === $pass) {
        $_SESSION['usuario'] = $user;
        $_SESSION['rol'] = $usuarios[$user]['rol'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
<h2>Iniciar sesión</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post">
    <input type="text" name="usuario" placeholder="Usuario" required><br>
    <input type="password" name="clave" placeholder="Contraseña" required><br>
    <button type="submit">Entrar</button>
</form>
</body></html>