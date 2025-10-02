<?php
require_once "../php/buscar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FerroviaX - Relatórios</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light" style="min-height:100vh; position:relative;">
  <!-- Cabeçalho fixo -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container justify-content-center">
      <a class="navbar-brand mx-auto" href="#">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height: 60px;">
      </a>
    </div>
  </nav>

  <div class="container pb-5">
    <ul class="nav nav-tabs ">
      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab">Hoje</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab">Semana</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab">Mês</button>
      </li>
      <li class="nav-item ms-auto">
        <button class="btn btn-success"><span class="me-1">⬇️</span>Download</button>
      </li>
    </ul>

    <div class="card mb-4">
      <div class="card-body text-center">
        <h4 class="card-title mb-3">KPIs de Desempenho</h4>
        <img src="../imagens/analize.png" alt="Gráfico" class="img-fluid" />
      </div>
    </div>

    <div class="d-flex align-items-center mb-3 gap-2">
      <button class="btn btn-dark">Detalhes</button>
      <input type="text" class="form-control w-auto" placeholder="🔍 Data (viagem)" />
    </div>

    <div class="table-responsive mb-4">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Data</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Consumo</th>
            <th>Tempo Total</th>
            <th>Atraso</th>
            <th>Custo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>24/03</td>
            <td>SP</td>
            <td>Campinas</td>
            <td>500 kWh</td>
            <td>1h30m</td>
            <td>10 min</td>
            <td>R$ 120</td>
          </tr>
          <tr>
            <td>27/03</td>
            <td>SP</td>
            <td>RJ</td>
            <td>700 kWh</td>
            <td>3h</td>
            <td>20 min</td>
            <td>R$ 130</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mb-4">
      <p>Subtotal (2): <strong>R$41.98</strong></p>
      <p>Taxas: <strong>R$9.00</strong></p>
      <p>Total: <strong>R$50.98</strong></p>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

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
    /* azul destaque */
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