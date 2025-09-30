<?php
require_once "../php/buscar.php";

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
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Imagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="mb-4 text-center">Alterar Foto de Perfil</h2>
                    <?php if ($mensagem): ?>
                        <div class="alert alert-info"><?php echo $mensagem; ?></div>
                    <?php endif; ?>
                    <div class="text-center mb-3">
                        <img src="<?php echo htmlspecialchars($imagem_atual); ?>" alt="Foto atual" class="rounded-circle border" style="width:120px;height:120px;object-fit:cover;">
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Selecione uma imagem:</label>
                            <input class="form-control" type="file" id="foto" name="foto" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>