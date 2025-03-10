<?php
session_start();
include("languages.php");

$lang = $_GET['lang'] ?? ($_COOKIE['lang'] ?? 'ukr');
setcookie('lang', $lang, time() + (180 * 24 * 60 * 60));

if ($_POST['password'] !== $_POST['confirm_password']) {
    $_SESSION['error'] = $texts[$lang]['password_mismatch'];
    header("Location: index.php");
    exit();
}

$_SESSION['name'] = $_POST['name'] ?? '';
$_SESSION['password'] = $_POST['password'] ?? '';
$_SESSION['email'] = $_POST['email'] ?? '';
$_SESSION['gender'] = $_POST['gender'] ?? '';
$_SESSION['city'] = $_POST['city'] ?? '';
$_SESSION['favorites'] = $_POST['favorites'] ?? '';
$_SESSION['about'] = $_POST['about'] ?? '';

if (!empty($_FILES['photo']['name'])) {
    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $photoName = basename($_FILES["photo"]["name"]);
    $targetFile = $uploadDir . $photoName;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        $_SESSION['photo'] = $targetFile;
    } else {
        $_SESSION['photo'] = '';
    }
}

header("Location: profile.php");
exit();

?>