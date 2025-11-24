<?php
require_once "buscar.php";
session_start();

if (!isset($_POST['estrelas']) || !isset($_SESSION['id_user'])) {
    exit("erro");
}

$estrelas = intval($_POST['estrelas']);
$user_id  = $_SESSION['id_user'];

$stmt = $conn->prepare("INSERT INTO avaliacoes (user_id, estrelas) VALUES (?, ?)");
$stmt->bind_param("ii", $user_id, $estrelas);
$stmt->execute();

echo "ok";