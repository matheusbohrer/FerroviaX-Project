<?php
require_once "../php/buscar.php";

// Atualiza o cargo se o formulário for enviado (primeira aba)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["usuario_id"], $_POST["novo_cargo"])) {
  $usuario_id = intval($_POST["usuario_id"]);
  $novo_cargo = intval($_POST["novo_cargo"]);
  $stmt = $conn->prepare("UPDATE usuario SET cargo = ? WHERE pk_usuario = ?");
  $stmt->bind_param("ii", $novo_cargo, $usuario_id);
  $stmt->execute();
}

// Atualiza linha_maquinista e horario_maquinista se o formulário for enviado (segunda aba)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["maq_id"], $_POST["linha_maquinista"], $_POST["horario_maquinista"], $_POST["indentificador"])) {
  $maq_id = intval($_POST["maq_id"]);
  $linha_maquinista = trim($_POST["linha_maquinista"]);
  $horario_maquinista = trim($_POST["horario_maquinista"]);
  $indentificador = trim($_POST["indentificador"]);
  $stmt = $conn->prepare("UPDATE usuario SET linha_maquinista = ?, horario_maquinista = ?, indentificador = ? WHERE pk_usuario = ?");
  $stmt->bind_param("sssi", $linha_maquinista, $horario_maquinista, $indentificador, $maq_id);
  $stmt->execute();
}

// Consulta todos os usuários
$sql = "SELECT pk_usuario, nome_usuario, email_usuario, cargo, linha_maquinista, horario_maquinista, indentificador FROM usuario";
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
        <button class="nav-link" id="maquinistas-tab" data-bs-toggle="tab" data-bs-target="#maquinistas" type="button" role="tab">Administrar Maquinistas</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="horarios-tab" data-bs-toggle="tab" data-bs-target="#horarios" type="button" role="tab">Horários para Usuários</button>
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
                        <option value="3" <?= $row['cargo'] == 3 ? 'selected' : '' ?>>Maquinista</option>
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
      <!-- Área Administrar Maquinistas -->
      <div class="tab-pane fade" id="maquinistas" role="tabpanel">
        <div class="text-dark text-center mb-6">
          <h2>Maquinistas</h2>
        </div>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Linha</th>
              <th>Horário</th>
              <th>Identificador</th>
              <th>Alterar Dados</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Refaça a consulta para garantir o ponteiro do resultado
            $result2 = $conn->query($sql);
            if ($result2 && $result2->num_rows > 0):
              while ($row = $result2->fetch_assoc()):
                if ($row['cargo'] != 3) continue; // Só mostra maquinistas
            ?>
                <tr>
                  <td><?= $row['pk_usuario'] ?></td>
                  <td><?= htmlspecialchars($row['nome_usuario']) ?></td>
                  <form method="post" class="d-flex align-items-center">
                    <input type="hidden" name="maq_id" value="<?= $row['pk_usuario'] ?>">
                    <td>
                      <input type="text" name="linha_maquinista" class="form-control form-control-sm me-2" value="<?= htmlspecialchars($row['linha_maquinista']) ?>" required>
                    </td>
                    <td>
                      <input type="text" name="horario_maquinista" class="form-control form-control-sm me-2" value="<?= htmlspecialchars($row['horario_maquinista']) ?>" required>
                    </td>
                    <td>
                      <input type="text" name="indentificador" class="form-control form-control-sm me-2" value="<?= htmlspecialchars($row['indentificador']) ?>" required>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    </td>
                  </form>
                </tr>
              <?php
              endwhile;
            else:
              ?>
              <tr>
                <td colspan="6">Nenhum maquinista encontrado.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <!-- Nova Área: Horários para Usuários -->
      <div class="tab-pane fade" id="horarios" role="tabpanel">
        <div class="text-dark text-center mb-6">
          <h2>Horários dos Maquinistas</h2>
        </div>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>Nome do Maquinista</th>
              <th>Linha</th>
              <th>Horário</th>
              <th>Identificador</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Consulta novamente para garantir ponteiro correto
            $result3 = $conn->query($sql);
            if ($result3 && $result3->num_rows > 0):
              $tem_maquinista = false;
              while ($row = $result3->fetch_assoc()):
                if ($row['cargo'] != 3) continue;
                $tem_maquinista = true;
            ?>
                <tr>
                  <td><?= htmlspecialchars($row['nome_usuario']) ?></td>
                  <td><?= htmlspecialchars($row['linha_maquinista']) ?></td>
                  <td><?= htmlspecialchars($row['horario_maquinista']) ?></td>
                  <td><?= htmlspecialchars($row['indentificador']) ?></td>
                </tr>
              <?php
              endwhile;
              if (!$tem_maquinista):
              ?>
                <tr>
                  <td colspan="4">Nenhum horário de maquinista encontrado.</td>
                </tr>
              <?php
              endif;
            else:
              ?>
              <tr>
                <td colspan="4">Nenhum horário de maquinista encontrado.</td>
              </tr>
            <?php endif; ?>
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
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const navItems = document.querySelectorAll(".nav-item");
      const path = window.location.pathname.split("/").pop();
      navItems.forEach(item => {
        const page = item.getAttribute("data-page") + ".php";
        if (path === page) {
          item.classList.add("active");
        } else {
          item.classList.remove("active");
        }
      });
    });

    // Inicializar o mapa
    var map = L.map('map').setView([-23.5505, -46.6333], 12);

    // Tiles do OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker; // marcador global

    // Função de busca
    document.getElementById('search').addEventListener('keydown', function(e) {
      if (e.key === 'Enter') {
        var query = this.value;
        if (!query) return;

        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
          .then(response => response.json())
          .then(data => {
            if (data.length > 0) {
              var lat = data[0].lat;
              var lon = data[0].lon;

              // Centralizar mapa
              map.setView([lat, lon], 14);

              // Colocar marcador
              if (marker) map.removeLayer(marker);
              marker = L.marker([lat, lon]).addTo(map)
                .bindPopup(data[0].display_name)
                .openPopup();
            } else {
              alert("Endereço não encontrado!");
            }
          })
          .catch(err => console.error(err));
      }
    });
  </script>
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