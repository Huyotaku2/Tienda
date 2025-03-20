<?php

$servername = "localhost";  // Servidor (localhost en XAMPP)
$username = "root";         // Usuario de MySQL (por defecto en XAMPP)
$password = "";             // Contraseña (vacía por defecto en XAMPP)
$database = "productos";       // Nombre de la base de datos


    ini_set('session.use_cookies', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_trans_sid', 0);
    ini_set('session.cookie_lifetime', 0);
    ini_set('session.gc_maxlifetime', 1440);
    session_start();

    


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}


if (!mysqli_set_charset($conn, "utf8mb4")) {
    die("❌ Error al establecer charset: " . mysqli_error($conn));
}
?>
