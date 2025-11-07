<?php
require_once "../php/buscar.php";

$pkUsuario = $_SESSION["pk_usuario"] ?? 0;

// Busca histórico de alertas recebidos pelo usuário
$stmt = $conn->prepare("
  SELECT * FROM alertas_recebidos 
  WHERE fk_usuario = ?
  ORDER BY data_recebido DESC
");
$stmt->bind_param("i", $pkUsuario);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Histórico - FerroviaX</title>
<link rel="stylesheet" href="../css/historico.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<header class="p-3 bg-dark text-white text-center shadow-sm">
  <img src="../imagens/logoBranca.png" style="height:55px;">
</header>

<div class="container py-4">

  <h4 class="text-center mb-3">Histórico de Alertas</h4>

  <div class="card p-3 mb-3 shadow-sm">
    <form method="GET">
      <div class="row g-2">
        <div class="col-12">
          <label class="form-label">Filtrar por linha</label>
          <input type="text" name="linha" class="form-control" placeholder="Linha Azul, Verde, etc.">
        </div>

        <div class="col-6">
          <label class="form-label">Tipo</label>
          <select name="tipo" class="form-select">
            <option value="">Todos</option>
            <option>Atraso</option>
            <option>Manutenção</option>
            <option>Interdição</option>
            <option>Aviso</option>
          </select>
        </div>

        <div class="col-6">
          <label class="form-label">Data</label>
          <input type="date" name="data" class="form-control">
        </div>

        <div class="col-12 mt-2">
          <button class="btn btn-primary w-100">Aplicar Filtros</button>
        </div>
      </div>
    </form>
  </div>

  <div class="d-flex justify-content-between align-items-center mb-2">
    <h6 class="m-0">Resultado</h6>
    <button class="btn btn-sm btn-danger" onclick="location.href='historico.php?limpar=1'">Limpar histórico</button>
  </div>

  <?php if ($result->num_rows == 0): ?>
    <p class="text-center text-muted">Nenhum alerta encontrado.</p>
  <?php endif; ?>

  <?php while ($h = $result->fetch_assoc()): ?>
    <div class="card p-3 mb-2 shadow-sm">
      <div class="d-flex justify-content-between">
        <strong><?= htmlspecialchars($h['titulo']) ?></strong>
        <span class="badge bg-primary"><?= htmlspecialchars($h['tipo']) ?></span>
      </div>

      <small class="text-muted"><?= htmlspecialchars($h['linha']) ?></small>

      <p class="mt-2 mb-1"><?= htmlspecialchars($h['descricao']) ?></p>

      <small class="text-muted">
        Recebido em <?= date("d/m/Y H:i", strtotime($h['data_recebido'])) ?>
      </small>
    </div>
  <?php endwhile; ?>

</div>

<footer class="footer-nav fixed-bottom">
  <div class="nav-container">
    <button class="nav-item" onclick="location.href='geral.php'">
      <img src="https://img.icons8.com/ios/50/home.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/home.png" class="icon active-icon">
      <span>Início</span>
    </button>

    <button class="nav-item active">
      <img src="https://img.icons8.com/ios/50/time-machine.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/time-machine.png" class="icon active-icon">
      <span>Histórico</span>
    </button>

    <button class="nav-item" onclick="location.href='alertas.php'">
      <img src="https://img.icons8.com/ios/50/bell.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/bell.png" class="icon active-icon">
      <span>Alertas</span>
    </button>

    <button class="nav-item" onclick="location.href='usuario.php'">
      <img src="<?php echo htmlspecialchars($imagem_atual ?? ''); ?>" class="user-icon default">
      <span>Perfil</span>
    </button>
  </div>
</footer>

</body>
</html>
