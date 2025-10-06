<?php
require_once "../php/buscar.php";

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Usuário - FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .perfil-foto {
      position: relative;
      width: 120px;
      margin: 0 auto;
      cursor: pointer;
      transition: box-shadow 0.2s;
    }

    .perfil-foto img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #dee2e6;
      transition: filter 0.2s;
    }

    .perfil-foto:hover img {
      filter: brightness(0.8);
      box-shadow: 0 0 0 4px #0d6efd;
    }

    .perfil-foto .trocar-imagem {
      display: none;
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(13, 110, 253, 0.9);
      color: #fff;
      padding: 4px 12px;
      border-radius: 12px;
      font-size: 0.9rem;
      pointer-events: none;
    }

    .perfil-foto:hover .trocar-imagem {
      display: block;
      pointer-events: auto;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container py-4">
    <header class="mb-4">
      <div class="d-flex justify-content-between align-items-center">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">

      </div>
    </header>

    <div class="text-center mb-4">
      <div class="perfil-foto" onclick="window.location.href='perfil_maquinista.php'">
        <img src="<?php echo htmlspecialchars($imagem_atual); ?>" alt="Foto atual" class="rounded-circle border" style="width:120px;height:120px;object-fit:cover;">
        <span class="trocar-imagem">Trocar imagem</span>
      </div>
      <h2 class="mt-3 mb-1"><?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? "Bem-vindo $usuario"); ?></h2>
      <span class="badge bg-warning text-dark">⭐ 5.00</span>
    </div>

    <div class="row mb-4">
      <div class="col-4">
        <div class="card text-center h-100" onclick="location.href='manutencao.php'" style="cursor:pointer;">
          <div class="card-body">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="Manutenção" class="mb-2" style="width:32px; height:32px;">
            <div>Manutenção</div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-center h-100" onclick="location.href='saldo.php'" style="cursor:pointer;">
          <div class="card-body">
            <img src="https://cdn-icons-png.flaticon.com/512/126/126083.png" alt="Saldo" class="mb-2" style="width:32px; height:32px;">
            <div>Saldo</div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-center h-100" onclick="location.href='relatorios.php'" style="cursor:pointer;">
          <div class="card-body">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Relatórios" class="mb-2" style="width:32px; height:32px;">
            <div>Relatórios</div>
          </div>
        </div>
      </div>
    </div>

    <div class="opcoes-lista mb-4">
      <ul class="list-group">
        <li class="list-group-item" onclick="location.href='configuracoes.php'">Configurações de Conta</li>
        <li class="list-group-item" onclick="location.href='mensagens.php'">Mensagens</li>
        <li class="list-group-item" onclick="location.href='presente.php'">Cartão Presente</li>
        <li class="list-group-item" onclick="location.href='promocoes.php'">Promoções</li>
        <li class="list-group-item" onclick="location.href='familia.php'">Família e Adolescentes</li>
        <li class="list-group-item" onclick="location.href='diretrizes.php'">Diretrizes da Comunidade</li>
        <li class="list-group-item" onclick="abrirPopupAvaliacao()">Avalie nosso site</li>
      </ul>
      <div class="avaliacao-popup" id="avaliacaoPopup" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:9999;">
        <div class="bg-white text-dark p-4 rounded-4 text-center" style="min-width:300px;">
          <p class="fs-5 mb-3">Como você avalia nosso site?</p>
          <div class="estrelas mb-3" id="estrelas">
            <span class="estrela" data-valor="1" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="2" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="3" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="4" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="5" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
          </div>
          <button class="btn btn-primary" onclick="enviarAvaliacao()">Enviar</button>
        </div>
      </div>
    </div>
  </div>

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