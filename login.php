<?php
session_start();
require_once 'include/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $pdo->prepare("SELECT * FROM Administrateur WHERE login = ? AND mot_de_passe = ?");
    $stmt->execute([$login, $mot_de_passe]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $_SESSION['admin'] = $admin['id_admin'];
        header('Location: tableau_bord.php');
        exit;
    } else {
        echo "<script>alert('Identifiants incorrects.'); window.location='index.php';</script>";
    }
}
