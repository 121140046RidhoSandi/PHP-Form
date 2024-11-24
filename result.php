<?php
session_start();
$data = $_SESSION['data'] ?? null;

if (!$data) {
    die("Data tidak tersedia.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Hasil Pendaftaran</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <th>Biografi</th>
            <td><?= htmlspecialchars($data['bio']) ?></td>
        </tr>
        <tr>
            <th>Informasi Browser</th>
            <td><?= htmlspecialchars($data['browserInfo']) ?></td>
        </tr>
    </table>

    <h3>Isi File:</h3>
    <table border="1">
        <tr>
            <th>Baris</th>
            <th>Konten</th>
        </tr>
        <?php foreach ($data['fileRows'] as $index => $row): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($row) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
