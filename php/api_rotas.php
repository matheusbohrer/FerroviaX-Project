<?php
require_once "../php/buscar.php";

$acao = $_GET['acao'] ?? '';

switch ($acao) {
  case 'listar_estacoes':
    $sql = "SELECT * FROM estacoes";
    $res = $conn->query($sql);
    echo json_encode($res->fetch_all(MYSQLI_ASSOC));
    break;

  case 'salvar_estacao':
    $nome = $_POST['nome'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $stmt = $conn->prepare("INSERT INTO estacoes (nome, latitude, longitude) VALUES (?, ?, ?)");
    $stmt->bind_param("sdd", $nome, $lat, $lng);
    $stmt->execute();
    echo json_encode(["status" => "ok"]);
    break;

  case 'deletar_estacao':
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM estacoes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo json_encode(["status" => "deleted"]);
    break;

  default:
    echo json_encode(["erro" => "Ação inválida"]);
}
