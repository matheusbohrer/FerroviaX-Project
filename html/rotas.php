
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FerroviaX - Rotas</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .map-card-equal {
      height: 100%;
      min-height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    @media (min-width: 992px) {
      .equal-cols {
        height: 500px;
      }
    }
  </style>
</head>

<body class="bg-light" style="min-height:100vh; position:relative;">
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container justify-content-center">
      <a class="navbar-brand mx-auto" href="#">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height: 48px;">
      </a>
      <span class="navbar-text text-white fw-bold ms-2">Rotas</span>
    </div>
  </nav>

  <div class="container pb-5">
    <div class="row mb-3">
      <div class="col-md-6 mb-2">
        <input type="text" class="form-control" placeholder="Localização">
        <small class="text-muted">Sep 12 – 15 • 1 room • 2 guests</small>
      </div>
      <div class="col-md-6 d-flex gap-2 align-items-center justify-content-md-end">
        <button class="btn btn-outline-secondary">Filtrar</button>
        <button class="btn btn-outline-secondary">Organizar</button>
        <span class="ms-2 text-muted">99 resultados</span>
      </div>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-lg-8 col-12 equal-cols">
        <div class="map-card-equal bg-white rounded shadow h-100">
          <img src="../imagens/rotas2.png" alt="Mapa" class="img-fluid rounded" style="max-height:100%; max-width:100%; object-fit:cover;">
        </div>
      </div>
      <div class="col-lg-4 col-12 equal-cols">
        <div class="h-100 d-flex flex-column justify-content-between">
          <div class="card h-100 mb-3 flex-fill">
            <div class="card-body d-flex align-items-center gap-3">
              <span class="badge bg-primary rounded-pill fs-5">1</span>
              <div>
                <strong>Cargas Leves</strong>
                <div class="text-muted">1200 $ • 2-4 dias</div>
              </div>
            </div>
          </div>
          <div class="card h-100 mb-3 flex-fill">
            <div class="card-body d-flex align-items-center gap-3">
              <span class="badge bg-primary rounded-pill fs-5">2</span>
              <div>
                <strong>Cargas Médias</strong>
                <div class="text-muted">1900 $ • 3-6 dias</div>
              </div>
            </div>
          </div>
          <div class="card h-100 mb-3 flex-fill">
            <div class="card-body d-flex align-items-center gap-3">
              <span class="badge bg-primary rounded-pill fs-5">3</span>
              <div>
                <strong>Cargas Pesadas</strong>
                <div class="text-muted">2400 $ • 5-9 dias</div>
              </div>
            </div>
          </div>
          <div class="card h-100 flex-fill">
            <div class="card-body d-flex align-items-center gap-3">
              <span class="badge bg-primary rounded-pill fs-5">4</span>
              <div>
                <strong>Cargas Especiais</strong>
                <div class="text-muted">1200 $ • 3-15 dias</div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
        <button class="btn btn-link" onclick="location.href='usuario.php'">
          <img src="../imagens/perfil.png" alt="Avatar" style="height:32px; border-radius:50%;" />
        </button>
      </div>
    </div>
  </footer>
  <script src