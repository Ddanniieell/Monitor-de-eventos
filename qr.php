<?php
// Este archivo simula el escaneo del QR y registra el acceso

$mysqli = new mysqli("localhost", "root", "", "aforo");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$evento = "Concierto Principal";
$hora = date("Y-m-d H:i:s");

$stmt = $mysqli->prepare("INSERT INTO registros (evento, hora_entrada) VALUES (?, ?)");
$stmt->bind_param("ss", $evento, $hora);
$stmt->execute();
$stmt->close();

echo "<h2>¡Acceso Registrado!</h2>";
echo "<p>Gracias por asistir al evento.</p>";
?>
