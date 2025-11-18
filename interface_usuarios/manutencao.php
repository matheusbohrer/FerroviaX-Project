<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FerroviaX - Manutenções</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light" style="min-height:100vh; position:relative;">
  <!-- Cabeçalho FerroviaX -->
<header class="bg-dark py-3 mb-4 border-bottom position-relative">
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
    <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">
  </div>
</header>

  <div class="container pb-5">
    <button class="btn btn-outline-secondary mb-3" onclick="history.back()" aria-label="Voltar">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#111" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
        <line x1="19" y1="12" x2="5" y2="12" />
        <polyline points="12 19 5 12 12 5" />
      </svg>
    </button>

    <ul class="nav nav-tabs mb-3">
      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab">Inspeções</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab">Alertas</button>
      </li>
    </ul>

    <div class="d-flex gap-3 mb-3">
      <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          Todas
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Todas</a></li>
          <li><a class="dropdown-item" href="#">Máquinas</a></li>
          <li><a class="dropdown-item" href="#">Motores</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          Status: Abertas
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Abertas</a></li>
          <li><a class="dropdown-item" href="#">Agendadas</a></li>
          <li><a class="dropdown-item" href="#">Vencidas</a></li>
        </ul>
      </div>
    </div>

    <div class="card mb-4 text-center">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center">
          <div class="rounded-circle border border-3 border-success d-flex flex-column justify-content-center align-items-center" style="width:100px; height:100px;">
            <strong class="fs-2">7</strong>
            <span>de 12</span>
          </div>
          <div class="mt-2">
            <strong>Inspeções comp. let</strong>
            <span class="badge bg-warning text-dark ms-2">Em andamento</span>
          </div>
        </div>
      </div>
    </div>

    <div class="list-group mb-4">
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold">Insp. máquina A</div>
          <div class="text-muted small">30 de abr. de 2024</div>
        </div>
        <span class="badge bg-warning text-dark">Em andamento</span>
      </div>
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold">Inspeção do gerador</div>
          <div class="text-muted small">2 de mai. de 2024</div>
        </div>
        <span class="badge bg-danger">Vencida</span>
      </div>
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold">Inspeção do motor</div>
          <div class="text-muted small">5 de mai. de 2024</div>
        </div>
        <span class="badge bg-primary">Agendada</span>
      </div>
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold">Insp. elevador</div>
          <div class="text-muted small">7 de mai. de 2024</div>
        </div>
        <span class="badge bg-primary">Agendada</span>
      </div>
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold">Inspeção do gerador</div>
          <div class="text-muted small">2 de mai. de 2024</div>
        </div>
        <span class="badge bg-danger">Vencida</span>
      </div>
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <div class="fw-bold">Insp. máquina A</div>
          <div class="text-muted small">30 de abr. de 2024</div>
        </div>
        <span class="badge bg-warning text-dark">Em andamento</span>
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center bg-white border rounded p-3 mb-5">
      <span class="fw-semibold">Agendar nova inspeção</span>
      <button class="btn btn-success">Agendar</button>
    </div>
  </div>

  <!-- Rodapé fixo -->
<footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item active" data-page="geral" onclick="location.href='geral.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon" />
        <span>Início</span>
      </button>

      <button class="nav-item" data-page="historico" onclick="location.href='historico.php'">
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
  <script src=