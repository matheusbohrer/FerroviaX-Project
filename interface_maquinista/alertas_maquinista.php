<?php
require_once "../php/buscar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Maquinista - FerroviaX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
+   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
+     integrity="sha256-o9N1j7kGk7b3fZs+0kq2qfQbQkQ5xY1LZ+3f2RkEMkM=" crossorigin=""/>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

  </head>

<body class="bg-light" style="min-height:100vh; position:relative;">
  <!-- Cabeçalho FerroviaX -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container justify-content-center">
      <a class="navbar-brand mx-auto" href="#">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height: 60px;">
      </a>
    </div>
  </nav>

  <main class="container pb-5">
    <h2 class="mb-4 text-center fw-bold">Alertas e Notificações</h2>

    <div class="mb-3">
      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem" class="me-2" style="height:40px;">
        <div class="flex-grow-1">
          <div><strong>Novo trem chegando!</strong> <span class="text-muted">1d</span></div>
          <div class="small">Saindo às 11:00</div>
        </div>
        <button class="btn btn-outline-primary btn-sm">Ver mais</button>
      </div>

      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://pm1.aminoapps.com/7687/4743f9ffed3bb00d39710c0bfc25bb82a0f43e55r1-304-304v2_00.jpg" alt="Avatar" class="me-2 rounded-circle" style="height:40px; width:40px;">
        <div class="flex-grow-1">
          <div><strong>Moto Moto</strong> <span class="text-muted">1d</span></div>
          <div class="small">Avalie o maquinista</div>
        </div>
        <button class="btn btn-warning btn-sm">☆</button>
      </div>

      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://img.freepik.com/vetores-gratis/saudacao-alegre-do-papai-noel-dos-desenhos-animados-para-a-celebracao-do-natal_1308-153957.jpg?semt=ais_hybrid&w=740" alt="Avatar" class="me-2 rounded-circle" style="height:40px; width:40px;">
        <div class="flex-grow-1">
          <div><strong>Santa Claus</strong> <span class="text-muted">3d</span></div>
          <div class="small">Avalie o maquinista</div>
        </div>
        <button class="btn btn-warning btn-sm">☆</button>
      </div>

      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem" class="me-2" style="height:40px;">
        <div class="flex-grow-1">
          <div><strong>Novo trem chegando!</strong> <span class="text-muted">3d</span></div>
          <div class="small">Saindo às 20:00</div>
        </div>
        <button class="btn btn-outline-primary btn-sm">Ver mais</button>
      </div>

      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem" class="me-2" style="height:40px;">
        <div class="flex-grow-1">
          <div><strong>Novo trem chegando!</strong> <span class="text-muted">4d</span></div>
          <div class="small">Saindo às 13:30</div>
        </div>
        <button class="btn btn-outline-primary btn-sm">Ver mais</button>
      </div>

      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://lojaautoformula.com.br/cdn/shop/collections/AF_FEED_IG_REDBULL_-_2023-10-10T221600.481.png?v=1741615741&width=1296" alt="Avatar" class="me-2 rounded-circle" style="height:40px; width:40px;">
        <div class="flex-grow-1">
          <div><strong>Max Verstappen</strong> <span class="text-muted">4d</span></div>
          <div class="small">Avalie o maquinista</div>
        </div>
        <button class="btn btn-warning btn-sm">☆</button>
      </div>
    </div>

    <!-- Popup de avaliação (exemplo visual, sem JS) -->
    <div class="modal fade" id="avaliacaoModal" tabindex="-1" aria-labelledby="avaliacaoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="avaliacaoModalLabel">Avalie nosso Aplicativo!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <p>E ganhe recompensas!</p>
            <div class="d-flex gap-2">
              <button class="btn btn-primary flex-fill">Quero avaliar!</button>
              <button class="btn btn-secondary flex-fill" data-bs-dismiss="modal">Mais tarde</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item" data-page="geral" onclick="location.href='geral_maquinista.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon" />
        <span>Início</span>
      </button>

      <button class="nav-item" data-page="relatorios" onclick="location.href='relatorios_maquinista.php'">
        <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" class="icon active-icon" />
        <span>Relatórios</span>
      </button>

      <button class="nav-item" data-page="alertas" onclick="location.href='alertas_maquinista.php'">
        <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/bell.png" class="icon active-icon" />
        <span>Alertas</span>
      </button>

      <button class="nav-item" data-page="usuario" onclick="location.href='usuario_maquinista.php'">
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

    .nav-tabs {
      border-bottom: 1px solid #dee2e6;
    }

    .slide-username {
      color: white;
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