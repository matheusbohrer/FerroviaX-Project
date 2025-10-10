<?php
require_once "../php/buscar.php";

// Garante que só maquinistas (cargo 3) acessem
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
  header("Location: ../php/telalogin.php");
  exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Busca todos os maquinistas para montar as abas de dias (com nome)
$stmt = $conn->prepare("SELECT nome_usuario, linha_maquinista, horario_maquinista, indentificador FROM usuario WHERE cargo = 3 AND indentificador IS NOT NULL ORDER BY indentificador ASC");
$stmt->execute();
$result = $stmt->get_result();
$maquinistas = [];
while ($row = $result->fetch_assoc()) {
  $maquinistas[] = $row;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel do Usuário - FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> 
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
    <!-- Abas de dias iguais à tela geral.php -->
    <ul class="nav nav-tabs mb-4 justify-content-center" id="horariosTab" role="tablist">
      <?php foreach ($maquinistas as $idx => $maq): ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link<?= $idx === 0 ? ' active' : '' ?>" id="dia<?= $maq['indentificador'] ?>-tab" data-bs-toggle="tab" data-bs-target="#dia<?= $maq['indentificador'] ?>" type="button" role="tab">
            Dia <?= htmlspecialchars($maq['indentificador']) ?>
          </button>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="tab-content mb-4" id="horariosTabContent">
      <?php foreach ($maquinistas as $idx => $maq): ?>
        <div class="tab-pane fade<?= $idx === 0 ? ' show active' : '' ?>" id="dia<?= $maq['indentificador'] ?>" role="tabpanel">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card bg-secondary text-light">
                <div class="card-body">
                  <h6 class="card-title mb-1">Maquinista</h6>
                  <div><?= htmlspecialchars($maq['nome_usuario']) ?></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card bg-secondary text-light">
                <div class="card-body">
                  <h6 class="card-title mb-1">Linha</h6>
                  <div><?= htmlspecialchars($maq['linha_maquinista']) ?></div>
                </div>
              </div>
            </div>
            <div class="col-md-2 mb-3">
              <div class="card bg-secondary text-light">
                <div class="card-body">
                  <h6 class="card-title mb-1">Horário</h6>
                  <div><?= htmlspecialchars($maq['horario_maquinista']) ?></div>
                </div>
              </div>
            </div>
            <div class="col-md-2 mb-3">
              <div class="card bg-secondary text-light">
                <div class="card-body">
                  <h6 class="card-title mb-1">Identificador</h6>
                  <div><?= htmlspecialchars($maq['indentificador']) ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mb-3">
      <input type="text" id="search" class="form-control" placeholder="Digite um endereço..." />
    </div>
    <h4 class="mb-3">Mapa de Navegação</h4>
    <div id="map" style="height:400px; border-radius:10px; overflow:hidden;"></div>

    <!-- ================= GERENCIADOR DE TRENS (CINZA) ================= -->
    <h4 class="mt-5 mb-3">Gerenciador de Trens</h4>
    <div class="card bg-secondary text-light mb-4">
      <div class="card-body">
        <table class="table table-bordered align-middle mb-0 train-table">
          <thead>
            <tr>
              <th scope="col">Trem</th>
              <th scope="col">Status</th>
              <th scope="col">Horário de Saída</th>
              <th scope="col">Destino</th>
              <th scope="col">Última Atualização</th>
            </tr>
          </thead>
          <tbody id="train-table-body">
            <tr>
              <td>Trem 001</td>
              <td><span class="badge bg-success">Ativo</span></td>
              <td>08:30</td>
              <td>Estação Central</td>
              <td>Há 5 minutos</td>
            </tr>
            <tr>
              <td>Trem 002</td>
              <td><span class="badge bg-danger">Inativo</span></td>
              <td>10:00</td>
              <td>Porto belo</td>
              <td>Há 8 minutos</td>
            </tr>
            <tr>
              <td>Trem 003</td>
              <td><span class="badge bg-success">Ativo</span></td>
              <td>09:15</td>
              <td>São Paulo</td>
              <td>Há 2 minutos</td>
            </tr>
            <tr>
              <td>Trem 004</td>
              <td><span class="badge bg-secondary">Manutenção</span></td>
              <td>--</td>
              <td>--</td>
              <td>Há 1 hora</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- ================================================================ -->

    <h4 class="mb-3 mt-4">Maquinistas Disponíveis</h4>
    <div class="row mb-5">
      <!-- Cards de maquinistas -->
    </div>
  </div>

  <footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item" data-page="geral" onclick="location.href='geral.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon" />
        <span>Início</span>
      </button>

      <button class="nav-item" data-page="relatorios" onclick="location.href='relatorios.php'">
        <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" class="icon active-icon" />
        <span>Relatórios</span>
      </button>

      <button class="nav-item" data-page="alertas" onclick="location.href='alertas.php'">
        <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/bell.png" class="icon active-icon" />
        <span>Alertas</span>
      </button>

      <button class="nav-item" data-page="usuario" onclick="location.href='usuario.php'">
        <img src="<?php echo htmlspecialchars($imagem_atual ?? ''); ?>" alt="Avatar" class="user-icon default" />
        <span>Perfil</span>
      </button>
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
      color: white;
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

    /* ======== Tabela Cinza (Gerenciador de Trens) ======== */
    .train-table {
      background-color: #b0b0b0;
      color: #212529;
      border-radius: 8px;
      overflow: hidden;
    }

    .train-table th {
      background-color: #6c757d;
      color: #fff;
    }

    .train-table tr:nth-child(even) {
      background-color: #c8c8c8;
    }

    .train-table tr:hover {
      background-color: #a8a8a8;
    }
  </style>
</body>
</html>
