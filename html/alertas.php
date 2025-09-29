<?php
require_once "buscar.php";
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
          <img src="<?php echo htmlspecialchars($imagem_atual); ?>" alt="Avatar" style="height:32px; border-radius:50%;" />
        </button>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>