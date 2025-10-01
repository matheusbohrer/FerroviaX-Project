<?php
require_once "../php/buscar.php";

// Atualiza o cargo se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["usuario_id"], $_POST["novo_cargo"])) {
  $usuario_id = intval($_POST["usuario_id"]);
  $novo_cargo = intval($_POST["novo_cargo"]);
  $stmt = $conn->prepare("UPDATE usuario SET cargo = ? WHERE pk_usuario = ?");
  $stmt->bind_param("ii", $novo_cargo, $usuario_id);
  $stmt->execute();
}

// Consulta todos os usuários
$sql = "SELECT pk_usuario, nome_usuario, email_usuario, cargo FROM usuario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administração FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="text-light">
  <header class="bg-dark py-3 mb-4 border-bottom position-relative">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
      <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">
      <h1 class="h5 mb-0" id="header-username" style="opacity:0; transition:opacity 0.5s;">
        Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? ""); ?>
      </h1>
    </div>
    <div id="slide-username" class="slide-username">
      Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? ""); ?>
    </div>
  </header>

  <script>
    window.onload = function() {
      const slide = document.getElementById('slide-username');
      const header = document.getElementById('header-username');
      slide.style.transform = 'translateY(0)';
      slide.style.opacity = '1';
      setTimeout(function() {
        slide.style.opacity = '0';
        header.style.opacity = '1';
      }, 2500);
    };
  </script>

  <div class="container">
    <ul class="nav nav-tabs mb-4 justify-content-center" id="adminTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab">Administrar Usuários</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="area2-tab" data-bs-toggle="tab" data-bs-target="#area2" type="button" role="tab">Área em Branco</button>
      </li>
    </ul>
    <div class="tab-content mb-4" id="adminTabContent">
      <!-- Área Administrar Usuários -->
      <div class="tab-pane fade show active" id="usuarios" role="tabpanel">
        <div class="text-dark text-center mb-6">
          <h2>Usuários cadastrados</h2>
        </div>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Cargo</th>
              <th>Alterar Cargo</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= $row['pk_usuario'] ?></td>
                  <td><?= htmlspecialchars($row['nome_usuario']) ?></td>
                  <td><?= htmlspecialchars($row['email_usuario']) ?></td>
                  <td><?= htmlspecialchars($row['cargo']) ?></td>
                  <td>
                    <form method="post" style="display:inline-flex;">
                      <input type="hidden" name="usuario_id" value="<?= $row['pk_usuario'] ?>">
                      <select name="novo_cargo" class="form-select form-select-sm me-2">
                        <option value="1" <?= $row['cargo'] == 1 ? 'selected' : '' ?>>Usuário</option>
                        <option value="2" <?= $row['cargo'] == 2 ? 'selected' : '' ?>>Admin</option>
                      </select>
                      <button type="submit" class="btn btn-secondary btn-sm">Salvar</button>
                    </form>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="5">Nenhum usuário encontrado.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <!-- Área em Branco -->
      <div class="tab-pane fade" id="area2" role="tabpanel">
        <div class="text-dark text-center mb-6">
          <h2>Área em Branco</h2>
        </div>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Outro</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Exemplo</td>
              <td>Dados</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Teste</td>
              <td>Info</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <footer class="bg-white border-top py-2 fixed-bottom">
    <div class="container">
      <div class="d-flex justify-content-around">
        <button class="btn btn-link" onclick="location.href='geral_admin.php'">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Home-icon.svg/1024px-Home-icon.svg.png" style="height:32px;" />
        </button>
        <button class="btn btn-link" onclick="location.href='relatorios_admin.php'">
          <img src="https://cdn-icons-png.flaticon.com/512/49/49116.png" style="height:32px;" />
        </button>
        <button class="btn btn-link" onclick="location.href='alertas_admin.php'">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/OOjs_UI_icon_bell.svg/2048px-OOjs_UI_icon_bell.svg.png" style="height:32px;" />
        </button>
        <button class="btn btn-link" onclick="location.href='usuario_admin.php'">
          <img src="<?php echo htmlspecialchars($imagem_atual ?? ''); ?>" alt="Avatar" style="height:32px; border-radius:50%;" />
        </button>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<style>
  .nav-tabs .nav-link {
    color: #212529 !important;
    background-color: transparent !important;
    border: none;
  }

  .nav-tabs .nav-link.active {
    background-color: #fff !important;
    color: #212529 !important;
    border: 1px solid #dee2e6 !important;
    border-bottom: none !important;
  }

  .nav-tabs {
    border-bottom: 1px solid #dee2e6;
  }

  .slide-username {
    position: absolute;
    left: 30%;
    top: 100%;
    padding: 10px 30px;
    border-radius: 20px;
    font-size: 1.2rem;
  }
</style>