<?php
require_once "../php/buscar.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["usuario_id"], $_POST["novo_cargo"])) {
  $usuario_id = intval($_POST["usuario_id"]);
  $novo_cargo = intval($_POST["novo_cargo"]);
  $stmt = $conn->prepare("UPDATE usuario SET cargo = ? WHERE pk_usuario = ?");
  $stmt->bind_param("ii", $novo_cargo, $usuario_id);
  $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["maq_id"], $_POST["linha_maquinista"], $_POST["horario_maquinista"], $_POST["indentificador"])) {
  $maq_id = intval($_POST["maq_id"]);
  $linha_maquinista = trim($_POST["linha_maquinista"]);
  $horario_maquinista = trim($_POST["horario_maquinista"]);
  $indentificador = trim($_POST["indentificador"]);
  $stmt = $conn->prepare("UPDATE usuario SET linha_maquinista=?, horario_maquinista=?, indentificador=? WHERE pk_usuario=?");
  $stmt->bind_param("sssi", $linha_maquinista, $horario_maquinista, $indentificador, $maq_id);
  $stmt->execute();
}

if (isset($_GET['excluir_maquinista'])) {
  $id = intval($_GET['excluir_maquinista']);
  $stmt = $conn->prepare("DELETE FROM usuario WHERE pk_usuario = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inserir_sensor'])) {
  $tipo_sensor = trim($_POST['tipo_sensor']);
  $local_sensor = trim($_POST['local_sensor']);
  $data_sensor = $_POST['data_sensor'];
  $stmt = $conn->prepare("INSERT INTO sensores (tipo_sensor, local_sensor, data_sensor) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $tipo_sensor, $local_sensor, $data_sensor);
  $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editar_sensor"])) {
  $id_sensor = intval($_POST["id_sensor"]);
  $tipo_sensor = trim($_POST["tipo_sensor"]);
  $local_sensor = trim($_POST["local_sensor"]);
  $data_sensor = $_POST["data_sensor"];
  $stmt = $conn->prepare("UPDATE sensores SET tipo_sensor=?, local_sensor=?, data_sensor=? WHERE id_sensor=?");
  $stmt->bind_param("sssi", $tipo_sensor, $local_sensor, $data_sensor, $id_sensor);
  $stmt->execute();
}

if (isset($_GET['excluir_sensor'])) {
  $id_sensor = intval($_GET['excluir_sensor']);
  $stmt = $conn->prepare("DELETE FROM sensores WHERE id_sensor = ?");
  $stmt->bind_param("i", $id_sensor);
  $stmt->execute();
}

$usuarios = $conn->query("SELECT * FROM usuario ORDER BY pk_usuario ASC");
$maquinistas = $conn->query("SELECT * FROM usuario WHERE cargo=3 ORDER BY pk_usuario ASC");
$sensores = $conn->query("SELECT * FROM sensores ORDER BY id_sensor DESC");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administração - Geral</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      background: #f8f9fa;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: #212529;
      color: #fff;
      z-index: 1000;
      padding: 10px 20px;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    header img {
      height: 50px;
    }

    .container {
      margin-top: 90px;
    }

    table {
      background: #fff;
      border-radius: 8px;
    }

    th {
      background: #f1f1f1;
    }

    select,
    input,
    button {
      border-radius: 6px !important;
    }

.footer-nav {
  background: #fff;
  border-top: 1px solid #ddd;
  padding: 6px 0;
}

.nav-container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  
}

.nav-item {
  flex: 1;
  text-align: center;
  background: none;
  border: none;
  outline: none;
  padding: 6px 0;
  color: #666;
  font-size: 12px;
  transition: color 0.3s ease;
  position: relative;
}

.nav-item span {
  display: block;
  font-size: 11px;
  margin-top: 2px;
  opacity: 0.6;
  transition: 0.3s;
}

.nav-item .icon {
  height: 26px;
  width: 26px;
  display: block;
  margin: auto;
  opacity: 0.6;
  transition: 0.3s;
}

.nav-item .active-icon {
  display: none;
}

.nav-item.active .default {
  display: none;
}

.nav-item.active .active-icon {
  display: block;
}

.nav-item.active .icon,
.nav-item.active span {
  opacity: 1;
  color: #007bff;
  transform: scale(1.1);
}

.nav-item.active::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 30%;
  width: 40%;
  height: 3px;
  background: #007bff;
  border-radius: 2px;
  transition: 0.3s;
}

.user-icon {
  width: 28px;
  height: 28px;
  object-fit: cover;
  border-radius: 50%;
  display: block;
  margin: auto;
  max-width: 32px;
  max-height: 32px;
}

.container.pb-5 {
  padding-bottom: 120px !important;
}

.container {
  padding-bottom: 120px; /* espaço para o footer */
}
    
  </style>
</head>

<body>

  <header>
    <img src="../imagens/logoBranca.png">
    <h1 style="font-size:1rem;">Administração do Sistema FerroviaX</h1>
  </header>

  <div class="container">
    <ul class="nav nav-tabs mb-4 justify-content-center">
      <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#usuarios">Usuários</button></li>
      <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#maquinistas">Maquinistas</button></li>
      <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#sensores">Sensores</button></li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane fade show active" id="usuarios">
        <h4 class="text-center mb-3">Gerenciamento de Usuários</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Cargo</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($u = $usuarios->fetch_assoc()): ?>
              <tr>
                <td><?= $u['pk_usuario'] ?></td>
                <td><?= htmlspecialchars($u['nome_usuario']) ?></td>
                <td><?= htmlspecialchars($u['email_usuario']) ?></td>
                <td><?= htmlspecialchars($u['cargo']) ?></td>
                <td>
                  <form method="post" style="display:flex;">
                    <input type="hidden" name="usuario_id" value="<?= $u['pk_usuario'] ?>">
                    <select name="novo_cargo" class="form-select form-select-sm me-2">
                      <option value="1" <?= $u['cargo'] == 1 ? 'selected' : '' ?>>Usuário</option>
                      <option value="2" <?= $u['cargo'] == 2 ? 'selected' : '' ?>>Admin</option>
                      <option value="3" <?= $u['cargo'] == 3 ? 'selected' : '' ?>>Maquinista</option>
                    </select>
                    <button class="btn btn-sm btn-secondary">Salvar</button>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <div class="tab-pane fade" id="maquinistas">
        <h4 class="text-center mb-3">Gerenciamento de Maquinistas</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Linha</th>
              <th>Horário</th>
              <th>Identificador</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($m = $maquinistas->fetch_assoc()): ?>
              <tr>
                <form method="post">
                  <td><?= $m['pk_usuario'] ?></td>
                  <td><?= htmlspecialchars($m['nome_usuario']) ?></td>
                  <input type="hidden" name="maq_id" value="<?= $m['pk_usuario'] ?>">
                  <td><input type="text" name="linha_maquinista" class="form-control form-control-sm" value="<?= htmlspecialchars($m['linha_maquinista']) ?>"></td>
                  <td><input type="text" name="horario_maquinista" class="form-control form-control-sm" value="<?= htmlspecialchars($m['horario_maquinista']) ?>"></td>
                  <td><input type="text" name="indentificador" class="form-control form-control-sm" value="<?= htmlspecialchars($m['indentificador']) ?>"></td>
                  <td>
                    <button class="btn btn-sm btn-primary">Salvar</button>
                    <a href="?excluir_maquinista=<?= $m['pk_usuario'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</a>
                  </td>
                </form>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <div class="tab-pane fade" id="sensores">
        <h4 class="text-center mb-3">Gerenciamento de Sensores</h4>

        <div class="card mb-4">
          <div class="card-header bg-primary text-white">Inserir Novo Sensor</div>
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Tipo</label>
                  <select name="tipo_sensor" class="form-select" required>
                    <option value="">Selecione...</option>
                    <option value="Temperatura">Temperatura</option>
                    <option value="Umidade">Umidade</option>
                    <option value="Pressão">Pressão</option>
                    <option value="Luz">Luz</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Local</label>
                  <input type="text" name="local_sensor" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Data</label>
                  <input type="date" name="data_sensor" class="form-control" required>
                </div>
              </div>
              <button name="inserir_sensor" class="btn btn-primary mt-3">Inserir</button>
            </form>
          </div>
        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo</th>
              <th>Local</th>
              <th>Data</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($s = $sensores->fetch_assoc()): ?>
              <tr>
                <form method="post">
                  <td><?= $s['id_sensor'] ?></td>
                  <input type="hidden" name="id_sensor" value="<?= $s['id_sensor'] ?>">
                  <td><input type="text" name="tipo_sensor" class="form-control form-control-sm" value="<?= htmlspecialchars($s['tipo_sensor']) ?>"></td>
                  <td><input type="text" name="local_sensor" class="form-control form-control-sm" value="<?= htmlspecialchars($s['local_sensor']) ?>"></td>
                  <td><input type="date" name="data_sensor" class="form-control form-control-sm" value="<?= htmlspecialchars($s['data_sensor']) ?>"></td>
                  <td>
                    <button name="editar_sensor" class="btn btn-sm btn-secondary">Editar</button>
                    <a href="?excluir_sensor=<?= $s['id_sensor'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</a>
                  </td>
                </form>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item active" onclick="location.href='geral_admin.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon">
        <span>Início</span>
      </button>

      <button class="nav-item" onclick="location.href='relatorios_admin.php'">
        <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" class="icon active-icon">
        <span>Relatórios</span>
      </button>

      <button class="nav-item" onclick="location.href='alertas_admin.php'">
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