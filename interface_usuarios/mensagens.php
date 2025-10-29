<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mensagens - FerroviaX</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/mensagens.css" />
</head>

<button class="voltar-btn" onclick="history.back()" aria-label="Voltar">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#111" stroke-width="2"
    stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
    <line x1="19" y1="12" x2="5" y2="12" />
    <polyline points="12 19 5 12 12 5" />
  </svg>
</button>

<body>
  <div class="app">
    <header class="mensagens-header">
      <h1>Mensagens</h1>
    </header>
    <main class="mensagens-container">
      <section class="mensagem-item" onclick="alert('Abrir conversa')">
        <div class="mensagem-dados">
          <h3>FerroviaX Suporte</h3>
          <p>Olá! Como podemos te ajudar hoje?</p>
        </div>
        <span class="mensagem-hora">10:45</span>
      </section>

      <section class="mensagem-item" onclick="alert('Abrir conversa')">
        <div class="mensagem-dados">
          <h3>Central de Alertas</h3>
          <p>⚠️ Atenção: Interrupção na Linha Azul</p>
        </div>
        <span class="mensagem-hora">09:20</span>
      </section>

      <section class="mensagem-item" onclick="alert('Abrir conversa')">
        <div class="mensagem-dados">
          <h3>Equipe FerroviaX</h3>
          <p>Seu relatório mensal está disponível.</p>
        </div>
        <span class="mensagem-hora">Ontem</span>
      </section>
    </main>

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
</body>

</html>

<style>
  .nav-tabs .nav-link {
    color: #212529 !important;
    /* texto preto */
    background-color: transparent !important;
    border: none;
  }

  .nav-tabs .nav-link.active {
    background-color: #fff !important;
    /* fundo branco */
    color: #212529 !important;
    /* texto preto */
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
    /* azul de destaque */
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
    /* Garante que nunca fique gigante */
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
</script>
  </div>
</body>

</html>