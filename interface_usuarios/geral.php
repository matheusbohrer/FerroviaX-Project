<?php
require_once "../php/buscar.php";

$stmt = $conn->prepare("SELECT * FROM linha WHERE id_linha = 1");
$stmt->execute();
$resultado = $stmt->get_result();

$dados = $resultado->fetch_assoc();
$linha1 = $dados["nome_linha"];

$stmt = $conn->prepare("SELECT * FROM linha WHERE id_linha = 2");
$stmt->execute();
$resultado = $stmt->get_result();

$dados = $resultado->fetch_assoc();
$linha2 = $dados["nome_linha"];

$stmt = $conn->prepare("SELECT * FROM linha WHERE id_linha = 3");
$stmt->execute();
$resultado = $stmt->get_result();

$dados = $resultado->fetch_assoc();
$linha3 = $dados["nome_linha"];

// pausa







?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FerroviaX Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body class="text-light">

  <header class="bg-dark py-3 mb-4 border-bottom position-relative">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
      <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">
      <h1 class="h5 mb-0" id="header-username" style="opacity:0; transition:opacity 0.5s;">
        Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? "$usuario"); ?>
      </h1>
    </div>
    <div id="slide-username" class="slide-username">
      Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? "Bem-vindo $usuario"); ?>
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
    <ul class="nav nav-tabs mb-4 justify-content-center" id="horariosTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="ontem-tab" data-bs-toggle="tab" data-bs-target="#ontem" type="button" role="tab">Ontem</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="hoje-tab" data-bs-toggle="tab" data-bs-target="#hoje" type="button" role="tab">Hoje</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="amanha-tab" data-bs-toggle="tab" data-bs-target="#amanha" type="button" role="tab">Amanhã</button>
      </li>
    </ul>
    <div class="tab-content mb-4" id="horariosTabContent">
      <div class="tab-pane fade show active" id="ontem" role="tabpanel">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title"><?php echo $horario ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title"><?php echo $linha1 ?></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="hoje" role="tabpanel">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">12:00 - 23:00
                </h2>
                <p class="card-text">Linha Verde</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">18:00</h2>
                <p class="card-text">Trem mais Tarde</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="amanha" role="tabpanel">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">10:00</h2>
                <p class="card-text">Trem mais Próximo</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">12:00</h2>
                <p class="card-text">Trem mais Tarde</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Campo de busca + mapa -->
    <div class="mb-3">
      <input type="text" id="search" class="form-control" placeholder="Digite um endereço..." />
    </div>
    <h4 class="mb-3">Mapa de Navegação</h4>
    <div id="map" style="height:400px; border-radius:10px; overflow:hidden;"></div>

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
        <img src="<?php echo htmlspecialchars($imagem_atual); ?>" alt="Avatar" class="user-icon default" />
        <span>Perfil</span>
      </button>
    </div>
  </footer>

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
    .nav-tabs { border-bottom: 1px solid #dee2e6; }
    .slide-username {
      position: absolute;
      left: 30%;
      top: 100%;
      padding: 10px 30px;
      border-radius: 20px;
      font-size: 1.2rem;
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
    .nav-item .active-icon { display: none; }
    .nav-item.active .default { display: none; }
    .nav-item.active .active-icon { display: block; }
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
  </style>

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
    document.getElementById('search').addEventListener('keydown', function (e) {
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
</body>
</html>
