<?php
require_once "../php/buscar.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['criar_alerta'])) {
  $titulo = trim($_POST['titulo']);
  $descricao = trim($_POST['descricao']);
  $linha = trim($_POST['linha']);
  $tipo = trim($_POST['tipo']);
  $data_alerta = date("Y-m-d H:i:s");
  $stmt = $conn->prepare("INSERT INTO alertas (titulo, descricao, linha, tipo, data_alerta) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $titulo, $descricao, $linha, $tipo, $data_alerta);
  $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_alerta'])) {
  $id = intval($_POST['id_alerta']);
  $titulo = trim($_POST['titulo']);
  $descricao = trim($_POST['descricao']);
  $linha = trim($_POST['linha']);
  $tipo = trim($_POST['tipo']);
  $stmt = $conn->prepare("UPDATE alertas SET titulo=?, descricao=?, linha=?, tipo=? WHERE id_alerta=?");
  $stmt->bind_param("ssssi", $titulo, $descricao, $linha, $tipo, $id);
  $stmt->execute();
}

if (isset($_GET['excluir_alerta'])) {
  $id = intval($_GET['excluir_alerta']);
  $stmt = $conn->prepare("DELETE FROM alertas WHERE id_alerta = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

$alertas = $conn->query("SELECT * FROM alertas ORDER BY data_alerta DESC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Alertas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
html, body { margin: 0; padding: 0; background: #f8f9fa; }
header {
  position: fixed; top: 0; left: 0; width: 100%;
  background: #212529; color: #fff; z-index: 1000;
  padding: 10px 20px; height: 80px;
  display: flex; justify-content: space-between; align-items: center;
}
header img { height: 50px; }
.container { margin-top: 90px; }
table { background: #fff; border-radius: 8px; }
th { background: #f1f1f1; }
select, input, textarea, button { border-radius: 6px !important; }

.footer-nav { background: #fff; border-top: 1px solid #ddd; padding: 6px 0; }
.nav-container { display: flex; justify-content: space-around; align-items: center; }
.nav-item {
  flex: 1; text-align: center; background: none; border: none;
  padding: 6px 0; color: #666; font-size: 12px; position: relative;
}
.nav-item span { display: block; margin-top: 2px; opacity: .6; }
.nav-item .icon { height: 26px; opacity: .6; }
.nav-item .active-icon { display: none; }
.nav-item.active .default { display: none; }
.nav-item.active .active-icon { display: block; }
.nav-item.active span, .nav-item.active .icon { opacity: 1; color: #007bff; transform: scale(1.1); }
.nav-item.active::after {
  content: ""; position: absolute; bottom: 0; left: 30%;
  width: 40%; height: 3px; background: #007bff; border-radius: 2px;
}
</style>
</head>

<body>

<header>
  <img src="../imagens/logoBranca.png">
  <h1 style="font-size:1rem;">Admin - Gerenciamento de Alertas</h1>
</header>

<div class="container">

<ul class="nav nav-tabs mb-4 justify-content-center">
  <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#alertas">Alertas Ativos</button></li>
  <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#novo">Criar Novo</button></li>
</ul>

<div class="tab-content">

<div class="tab-pane fade show active" id="alertas">
  <h4 class="text-center mb-3">Alertas Emitidos</h4>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th><th>Título</th><th>Linha</th><th>Tipo</th><th>Data</th><th>Ação</th>
      </tr>
    </thead>

    <tbody>
    <?php while ($a = $alertas->fetch_assoc()): ?>
      <tr>
        <form method="POST">
          <td><?= $a['id_alerta'] ?></td>
          <input type="hidden" name="id_alerta" value="<?= $a['id_alerta'] ?>">

          <td><input type="text" name="titulo" class="form-control form-control-sm" value="<?= htmlspecialchars($a['titulo']) ?>"></td>
          <td><input type="text" name="linha" class="form-control form-control-sm" value="<?= htmlspecialchars($a['linha']) ?>"></td>

          <td>
            <select name="tipo" class="form-select form-select-sm">
              <option value="Atraso" <?= $a['tipo']=="Atraso"?"selected":"" ?>>Atraso</option>
              <option value="Manutenção" <?= $a['tipo']=="Manutenção"?"selected":"" ?>>Manutenção</option>
              <option value="Interdição" <?= $a['tipo']=="Interdição"?"selected":"" ?>>Interdição</option>
              <option value="Aviso" <?= $a['tipo']=="Aviso"?"selected":"" ?>>Aviso</option>
            </select>
          </td>

          <td><?= $a['data_alerta'] ?></td>

          <td>
            <button name="editar_alerta" class="btn btn-sm btn-secondary">Salvar</button>
            <a href="?excluir_alerta=<?= $a['id_alerta'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir este alerta?')">Excluir</a>
          </td>
        </form>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>

<div class="tab-pane fade" id="novo">
  <h4 class="text-center mb-3">Criar Novo Alerta</h4>

  <div class="card">
    <div class="card-header bg-primary text-white">Novo Alerta</div>
    <div class="card-body">

      <form method="POST">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" required>

        <label class="form-label mt-3">Descrição</label>
        <textarea name="descricao" class="form-control" rows="3" required></textarea>

        <div class="row mt-3">
          <div class="col-6">
            <label class="form-label">Linha</label>
            <input type="text" name="linha" class="form-control" required>
          </div>
          <div class="col-6">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select">
              <option>Atraso</option>
              <option>Manutenção</option>
              <option>Interdição</option>
              <option>Aviso</option>
            </select>
          </div>
        </div>

        <button name="criar_alerta" class="btn btn-primary mt-3">Criar Alerta</button>
      </form>

    </div>
  </div>
</div>

</div>
</div>

<footer class="footer-nav fixed-bottom">
  <div class="nav-container">
    <button class="nav-item" onclick="location.href='geral_admin.php'">
      <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon">
      <span>Início</span>
    </button>

    <button class="nav-item" onclick="location.href='relatorios_admin.php'">
      <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" class="icon active-icon">
      <span>Relatórios</span>
    </button>

    <button class="nav-item active">
      <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/000000/bell.png" class="icon active-icon">
      <span>Alertas</span>
    </button>

    <button class="nav-item" onclick="location.href='configuracoes_admin.php'">
      <img src="https://img.icons8.com/ios/50/000000/settings.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/000000/settings.png" class="icon active-icon">
      <span>Configurações</span>
    </button>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
