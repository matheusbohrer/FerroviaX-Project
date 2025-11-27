<?php
require_once "../php/buscar.php";

$suportes = $conn->query("
    SELECT s.*, u.nome_usuario 
    FROM suporte s
    JOIN usuario u ON u.pk_usuario = s.fk_usuario
    ORDER BY s.data_envio DESC
");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gerenciar Suporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
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
            </tr>
        </thead>

        <tbody>
            <?php while ($s = $suportes->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($s['nome_usuario']) ?></td>
                    <td><?= htmlspecialchars($s['assunto']) ?></td>
                    <td><?= htmlspecialchars($s['mensagem']) ?></td>
                    <td><?= $s['data_envio'] ?></td>
                    <td><span class="badge bg-primary"><?= $s['status'] ?></span></td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>

</body>

</html>