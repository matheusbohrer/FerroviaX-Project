<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Configurações de Conta - FerroviaX</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/configuracoes.css" />
</head>
<body>
<header class="bg-dark py-3 mb-4 border-bottom position-relative">

  <!-- Botão voltar -->
  <button onclick="history.back()" 
          class="btn btn-outline-secondary position-absolute" 
          style="left: 15px; top: 50%; transform: translateY(-50%);">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" 
         stroke="#fff" stroke-width="2" stroke-linecap="round" 
         stroke-linejoin="round">
      <line x1="19" y1="12" x2="5" y2="12" />
      <polyline points="12 19 5 12 12 5" />
    </svg>
  </button>

  <!-- Logo centralizada -->
  <div class="container d-flex justify-content-center align-items-center">
    <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">
  </div>

</header>

<!-- TÍTULO DA PÁGINA -->
<div class="app">
  <header class="config-header text-center mb-3">
    <h1>Configurações de Conta</h1>
  </header>
</div>



    <main class="config-container">
      <section class="config-opcoes">
        <div class="config-item" onclick="alert('Alterar nome')">
          <span>Nome</span>
          <span class="seta">›</span>
        </div>
        <div class="config-item" onclick="alert('Alterar e-mail')">
          <span>E-mail</span>
          <span class="seta">›</span>
        </div>
        <div class="config-item" onclick="alert('Alterar senha')">
          <span>Senha</span>
          <span class="seta">›</span>
        </div>
        <div class="config-item" onclick="alert('Gerenciar notificações')">
          <span>Notificações</span>
          <span class="seta">›</span>
        </div>
        <div class="config-item" onclick="alert('Privacidade')">
          <span>Privacidade</span>
          <span class="seta">›</span>
        </div>
        <div class="config-item sair" onclick="alert('Sair da conta')">
          <span>Sair</span>
        </div>
      </section>
    </main>
    
  <footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item active" data-page="geral" onclick="location.href='geral.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon" />
        <span>Início</span>
      </button>

      <button class="nav-item active" data-page="historico" onclick="location.href='historico.php'">
        <img src="https://img.icons8.com/ios/50/time-machine.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/time-machine.png" class="icon active-icon">
        <span>Histórico</span>
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