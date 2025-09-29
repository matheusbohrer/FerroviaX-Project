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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container justify-content-center">
      <a class="navbar-brand mx-auto" href="#">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height: 60px;">
      </a>
    </div>
  </nav>

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
  <footer class="bg-white border-top py-2 fixed-bottom">
    <div class="container">
      <div class="d-flex justify-content-around">
        <button class="btn btn-link" onclick="location.href='geral.php'">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Home-icon.svg/1024px-Home-icon.svg.png" style="height:32px;" />
        </button>
        <button class="btn btn-link" onclick="location.href='relatorios.php'">
          <img src="https://cdn-icons-png.flaticon.com/512/49/49116.png" style="height:32px;" />
        </button>
        <button class="btn btn-link" onclick="location.href='alertas.php'">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/OOjs_UI_icon_bell.svg/2048px-OOjs_UI_icon_bell.svg.png" style="height:32px;" />
        </button>
        <button class="btn btn-link" onclick="location.href='usuario.html'">
          <img src="../imagens/perfil.png" alt="Avatar" style="height:32px; border-radius:50%;" />
        </button>
      </div>
    </div>
  </footer>
  <script src=