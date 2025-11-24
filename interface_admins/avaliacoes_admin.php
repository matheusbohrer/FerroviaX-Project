<?php
require_once "../php/buscar.php";

$avaliacoes = $conn->query("
    SELECT a.*, u.nome_usuario
    FROM avaliacoes a
    JOIN usuario u ON u.pk_usuario = a.fk_usuario
    ORDER BY a.data_avaliacao DESC
");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Avaliações dos Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h3 class="mb-4 text-center">Avaliações dos Usuários</h3>

  <?php while($a = $avaliacoes->fetch_assoc()): ?>
    <div class="card mb-3 p-3 shadow-sm">
      <h6><b><?= $a['nome'] ?></b></h6>
      <p>⭐ <?= $a['estrelas'] ?> estrelas</p>
      <small class="text-muted"><?= $a['data_avaliacao'] ?></small>
    </div>
  <?php endwhile; ?>

</div>

</body>
</html>
