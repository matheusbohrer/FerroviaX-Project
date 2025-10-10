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
    <!-- Abas -->
    <ul class="nav nav-tabs">
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

    <!-- KPIs -->
    <div class="card mb-4 mt-3">
      <div class="card-body text-center">
        <h4 class="card-title mb-3">KPIs de Desempenho</h4>
        <img src="../imagens/analize.png" alt="Gráfico" class="img-fluid" />
      </div>
    </div>

    <!-- Tabela de viagens -->
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

    <!-- Subtotais -->
    <div class="mb-4">
      <p>Subtotal (2): <strong>R$41.98</strong></p>
      <p>Taxas: <strong>R$9.00</strong></p>
      <p>Total: <strong>R$50.98</strong></p>
    </div>

    <!-- SEÇÃO DE GERENCIAMENTO DE MANUTENÇÕES (visualização apenas) -->
    <div class="card mb-5 shadow-sm">
      <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Gerenciamento de Manutenções</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>ID Trem</th>
                <th>Data</th>
                <th>Status</th>
                <th>Descrição</th>
                <th>Custo (R$)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>TREM-008</td>
                <td>09/10/2025</td>
                <td><span class="badge bg-warning text-dark">Em manutenção</span></td>
                <td>Troca de sistema elétrico</td>
                <td>4.500</td>
              </tr>
              <tr>
                <td>TREM-003</td>
                <td>08/10/2025</td>
                <td><span class="badge bg-success">Concluída</span></td>
                <td>Revisão completa</td>
                <td>3.200</td>
              </tr>
              <tr>
                <td>TREM-007</td>
                <td>6/10/2025</td>
                <td><span class="badge bg-danger">Pendente por falta de peças</span></td>
                <td>Troca de freios</td>
                <td>2.500</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Rodapé -->
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
          <img src="<?php echo htmlspecialchars($imagem_atual); ?>" alt="Avatar" style="height:32px; border-radius:50%;" />
        </button>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
