<?php
require_once "../php/buscar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FerroviaX - Alertas</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

      <!-- Alerta 1 -->
      <div class="alerta-item border rounded p-2 mb-2 bg-white shadow-sm">
        <div class="d-flex align-items-center">
          <span class="text-danger fs-4 me-2">•</span>
          <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem" class="me-2" style="height:40px;">
          <div class="flex-grow-1">
            <div><strong>Novo trem chegando!</strong> <span class="text-muted">1d</span></div>
            <div class="small">Saindo às 11:00</div>
          </div>
          <button class="btn btn-outline-primary btn-sm ver-mais">Ver mais</button>
        </div>
        <div class="info-extra mt-2 text-muted small" style="display: none;">
          <br>
          <div><strong>Origem:</strong> Campo Grande - MS</div>
          <div><strong>Destino:</strong> Corumbá - MS</div>
        </div>
      </div>

      <!-- Avaliação 1 -->
      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://pm1.aminoapps.com/7687/4743f9ffed3bb00d39710c0bfc25bb82a0f43e55r1-304-304v2_00.jpg" alt="Avatar" class="me-2 rounded-circle" style="height:40px; width:40px;">
        <div class="flex-grow-1">
          <div><strong>Moto Moto</strong> <span class="text-muted">1d</span></div>
          <div class="small">Avalie o maquinista</div>
        </div>
        <button class="btn btn-outline-warning btn-sm estrela-btn">☆</button>
      </div>

      <!-- Alerta 2 -->
      <div class="alerta-item border rounded p-2 mb-2 bg-white shadow-sm">
        <div class="d-flex align-items-center">
          <span class="text-danger fs-4 me-2">•</span>
          <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem" class="me-2" style="height:40px;">
          <div class="flex-grow-1">
            <div><strong>Novo trem chegando!</strong> <span class="text-muted">3d</span></div>
            <div class="small">Saindo às 20:00</div>
          </div>
          <button class="btn btn-outline-primary btn-sm ver-mais">Ver mais</button>
        </div>
        <div class="info-extra mt-2 text-muted small" style="display: none;">
          <br>
          <div><strong>Origem:</strong> Dourados - MS</div>
          <div><strong>Destino:</strong> Campo Grande - MS</div>
        </div>
      </div>

      <!-- Avaliação 2 -->
      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://img.freepik.com/vetores-gratis/saudacao-alegre-do-papai-noel-dos-desenhos-animados-para-a-celebracao-do-natal_1308-153957.jpg?semt=ais_hybrid&w=740" alt="Avatar" class="me-2 rounded-circle" style="height:40px; width:40px;">
        <div class="flex-grow-1">
          <div><strong>Santa Claus</strong> <span class="text-muted">3d</span></div>
          <div class="small">Avalie o maquinista</div>
        </div>
        <button class="btn btn-outline-warning btn-sm estrela-btn">☆</button>
      </div>

      <!-- Alerta 3 -->
      <div class="alerta-item border rounded p-2 mb-2 bg-white shadow-sm">
        <div class="d-flex align-items-center">
          <span class="text-danger fs-4 me-2">•</span>
          <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem" class="me-2" style="height:40px;">
          <div class="flex-grow-1">
            <div><strong>Novo trem chegando!</strong> <span class="text-muted">4d</span></div>
            <div class="small">Saindo às 13:30</div>
          </div>
          <button class="btn btn-outline-primary btn-sm ver-mais">Ver mais</button>
        </div>
        <div class="info-extra mt-2 text-muted small" style="display: none;">
          <br>
          <div><strong>Origem:</strong> Três Lagoas - MS</div>
          <div><strong>Destino:</strong> Aquidauana - MS</div>
        </div>
      </div>

      <!-- Avaliação 3 -->
      <div class="d-flex align-items-center border rounded p-2 mb-2 bg-white shadow-sm">
        <span class="text-danger fs-4 me-2">•</span>
        <img src="https://media.formula1.com/image/upload/c_fill,w_720/q_auto/v1740000000/common/f1/2025/redbullracing/maxver01/2025redbullracingmaxver01right.webp" alt="Avatar" class="me-2 rounded-circle" style="height:40px; width:40px;">
        <div class="flex-grow-1">
          <div><strong>Max Verstappen</strong> <span class="text-muted">4d</span></div>
          <div class="small">Avalie o maquinista</div>
        </div>
        <button class="btn btn-outline-warning btn-sm estrela-btn">☆</button>
      </div>
    </div>

    <!-- Popup de Avaliação do Maquinista -->
    <div class="avaliacao-popup" id="avaliacaoPopup" 
         style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; 
                background:rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:9999;">
      <div class="bg-white text-dark p-4 rounded-4 text-center" style="min-width:300px;">
        <p class="fs-5 mb-3">Como você avalia o maquinista?</p>
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
  </main>

  <!-- Rodapé -->
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
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
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const navItems = document.querySelectorAll(".nav-item");
      const path = window.location.pathname.split("/").pop();
      navItems.forEach(item => {
        const page = item.getAttribute("data-page") + ".php";
        item.classList.toggle("active", path === page);
      });

      // Botão "Ver mais"
      const botoes = document.querySelectorAll(".ver-mais");
      botoes.forEach(botao => {
        botao.addEventListener("click", () => {
          const info = botao.closest(".alerta-item").querySelector(".info-extra");
          const visivel = info.style.display === "block";
          info.style.display = visivel ? "none" : "block";
          botao.textContent = visivel ? "Ver mais" : "Ver menos";
        });
      });

      // Botão de Avaliação (estrela)
      const botoesEstrela = document.querySelectorAll(".estrela-btn");
      botoesEstrela.forEach(btn => {
        btn.addEventListener("click", () => {
          document.getElementById("avaliacaoPopup").style.display = "flex";
        });
      });

      // Fechar popup ao clicar fora
      document.getElementById("avaliacaoPopup").addEventListener("click", (e) => {
        if (e.target.id === "avaliacaoPopup") {
          e.target.style.display = "none";
        }
      });

      // Lógica das estrelas dentro do popup
      const estrelas = document.querySelectorAll(".estrela");
      estrelas.forEach(estrela => {
        estrela.addEventListener("click", () => {
          const valor = parseInt(estrela.getAttribute("data-valor"));
          estrelas.forEach(e => e.style.opacity = e.getAttribute("data-valor") <= valor ? "1" : "0.3");
        });
      });
    });

    function enviarAvaliacao() {
      alert("Obrigado pela sua avaliação!");
      document.getElementById("avaliacaoPopup").style.display = "none";
    }
  </script>
</body>
</html>
