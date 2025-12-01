<?php
require_once "../php/buscar.php";

// Consulta para listar os suportes
$suportes = $conn->query("
    SELECT s.*, u.nome_usuario 
    FROM suporte s
    JOIN usuario u ON u.pk_usuario = s.fk_usuario
    ORDER BY s.data_envio DESC
");

// Lidar com exclusão (se o botão excluir for clicado)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $stmt = $conn->prepare("DELETE FROM suporte WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    // Redirecionar para recarregar a página após exclusão
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Lidar com edição (se o formulário de edição for submetido)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $edit_id = intval($_POST['edit_id']);
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];
    $status = $_POST['status'];
    
    $stmt = $conn->prepare("UPDATE suporte SET assunto = ?, mensagem = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssi", $assunto, $mensagem, $status, $edit_id);
    $stmt->execute();
    $stmt->close();
    // Redirecionar para recarregar a página após edição
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Gerenciar Suporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light p-3">

    <h2 class="mb-4">Solicitações de Suporte</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Assunto</th>
                <th>Mensagem</th>
                <th>Data</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($s = $suportes->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($s['nome_usuario']) ?></td>
                    <td><?= htmlspecialchars($s['assunto']) ?></td>
                    <td><?= htmlspecialchars($s['mensagem']) ?></td>
                    <td><?= $s['data_envio'] ?></td>
                    <td><span class="badge bg-primary"><?= htmlspecialchars($s['status']) ?></span></td>
                    <td>
                        <!-- Botão para editar (abre modal) -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" 
                                onclick="fillEditForm(<?= $s['id'] ?>, '<?= htmlspecialchars($s['assunto']) ?>', '<?= htmlspecialchars($s['mensagem']) ?>', '<?= htmlspecialchars($s['status']) ?>')">Editar</button>
                        <!-- Formulário para excluir -->
                        <form method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este chamado?')">
                            <input type="hidden" name="delete_id" value="<?= $s['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>

    <!-- Modal para Editar -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Chamado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="mb-3">
                            <label for="assunto" class="form-label">Assunto</label>
                            <input type="text" class="form-control" id="assunto" name="assunto" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensagem" class="form-label">Mensagem</label>
                            <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Aberto">Aberto</option>
                                <option value="Em Andamento">Em Andamento</option>
                                <option value="Fechado">Fechado</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Função para preencher o modal de edição
        function fillEditForm(id, assunto, mensagem, status) {
            document.getElementById('edit_id').value = id;
            document.getElementById('assunto').value = assunto;
            document.getElementById('mensagem').value = mensagem;
            document.getElementById('status').value = status;
        }
    </script>

</body>

</html>
