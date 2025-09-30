
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saldo - FerroviaX</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light" style="min-height:100vh; position:relative;">
  <!-- Cabeçalho FerroviaX -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container justify-content-center">
      <button class="btn btn-outline-light me-2" onclick="history.back()" aria-label="Voltar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#fff" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
          <line x1="19" y1="12" x2="5" y2="12" />
          <polyline points="12 19 5 12 12 5" />
        </svg>
      </button>
      <a class="navbar-brand mx-auto" href="#">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height: 40px;">
      </a>
      <span class="navbar-text text-white fw-bold ms-2">Saldo</span>
    </div>
  </nav>

  <div class="container pb-5">
    <section class="text-center mb-4">
      <span class="text-muted">Saldo disponível</span>
      <h2 class="display-5 fw-bold mt-2">R$ 128,75</h2>
    </section>

    <section class="d-flex justify-content-center gap-3 mb-4">
      <button class="btn btn-success px-4" onclick="alert('Recarregar')">Adicionar Saldo</button>
      <button class="btn btn-primary px-4" onclick="alert('Transferir')">Transferir</button>
    </section>

    <section class="mb-4">
      <h3 class="fw-semibold mb-3">Histórico</h3>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>Transferência Recebida</strong>
            <div class="text-muted small">Ontem</div>
          </div>
          <span class="badge bg-success fs-6">+R$ 25,00</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>Compra de Bilhete</strong>
            <div class="text-muted small">15/05/2025</div>
          </div>
          <span class="badge bg-danger fs-6">-R$ 4,50</span>
        </li>
      </ul>
    </section>
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
        <button class="btn btn-link" onclick="location.href='usuario.php'">
          <img src="../imagens/perfil.png" alt="Avatar" style="height:32px; border-radius:50%;" />
        </button>
      </div>
    </div>
  </footer>
  <script src