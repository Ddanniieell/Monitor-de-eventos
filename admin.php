<?php
$mysqli = new mysqli("localhost", "root", "", "aforo");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM registros ORDER BY hora_entrada DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Aforo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container p-4">
    <h1 class="mb-4">Monitor de Aforo</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Hora Entrada</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["evento"] ?></td>
                <td><?= $row["hora_entrada"] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
