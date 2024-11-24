<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = intval($_POST['age']);
    $bio = trim($_POST['bio']);
    $file = $_FILES['file'];

    if (empty($name) || strlen($name) < 3 || strlen($name) > 50) {
        die("Nama tidak valid.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email tidak valid.");
    }

    if ($age < 1 || $age > 100) {
        die("Umur tidak valid.");
    }

    if (empty($bio) || strlen($bio) > 200) {
        die("Biografi tidak valid.");
    }

    if ($file['size'] > 2 * 1024 * 1024 || $file['type'] !== 'text/plain') {
        die("File tidak valid.");
    }

    $fileContent = file_get_contents($file['tmp_name']);
    $fileRows = explode("\n", $fileContent);

    $browserInfo = $_SERVER['HTTP_USER_AGENT'];

    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'bio' => $bio,
        'fileRows' => $fileRows,
        'browserInfo' => $browserInfo
    ];

    header("Location: result.php");
    exit();
}
?>
