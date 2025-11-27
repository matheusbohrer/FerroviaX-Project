<?php
session_start();
require_once "buscar.php";

if (!isset($_SESSION['usuario_id'])) {
    die("Usuário não logado.");
}

$usuario = $_SESSION['usuario_id'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$stmt = $conn->prepare("INSERT INTO suporte (fk_usuario, assunto, mensagem) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $usuario, $assunto, $mensagem);

if ($stmt->execute()) {
    echo "<script>alert('Solicitação enviada com sucesso!'); window.location.href='../interface_usuarios/suporte.php';</script>";
} else {
    echo "<script>alert('Erro ao enviar solicitação'); history.back();</script>";
}
?>