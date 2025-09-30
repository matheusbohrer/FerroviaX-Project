<?php
session_start();
require_once "../php/bd.php";

$mensagem = "";
$usuario_id = $_SESSION['usuario_id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["foto"]) && $usuario_id) {
    $arquivo = $_FILES["foto"];
    if ($arquivo["error"] === UPLOAD_ERR_OK) {
        $extensao = pathinfo($arquivo["name"], PATHINFO_EXTENSION);
        $nome_arquivo = "foto_" . $usuario_id . "_" . time() . "." . $extensao;
        $destino = "../uploads/" . $nome_arquivo;

        // Cria a pasta se não existir
        if (!is_dir("../uploads")) {
            mkdir("../uploads", 0777, true);
        }

        if (move_uploaded_file($arquivo["tmp_name"], $destino)) {
            $caminho_bd = "uploads/" . $nome_arquivo;
            $stmt = $conn->prepare("UPDATE usuario SET foto_usuario=? WHERE pk_usuario=?");
            $stmt->bind_param("si", $caminho_bd, $usuario_id);
            if ($stmt->execute()) {
                $mensagem = "Imagem enviada e salva no banco com sucesso!";
            } else {
                $mensagem = "Erro ao salvar no banco de dados.";
            }
        } else {
            $mensagem = "Erro ao salvar o arquivo.";
        }
    } else {
        $mensagem = "Erro no upload da imagem.";
    }
}

// Busca imagem atual do usuário
$imagem_atual = "https://via.placeholder.com/120"; // Imagem padrão
if ($usuario_id) {
    $stmt = $conn->prepare("SELECT foto_usuario FROM usuario WHERE pk_usuario=?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $row = $result->fetch_assoc()) {
        if (!empty($row['foto_usuario'])) {
            $imagem_atual = "../" . $row['foto_usuario'];
        }
    }
}
