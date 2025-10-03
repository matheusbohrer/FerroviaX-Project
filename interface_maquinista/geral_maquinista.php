<?php
require_once "../php/buscar.php";


// Garante que só maquinistas (cargo 3) acessem
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 3) {
  header("Location: ../php/telalogin.php");
  exit;
}

$usuario_id = $_SESSION['usuario_id'];
$mensagem = "";

// Atualiza linha_maquinista e horario_maquinista se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["linha_maquinista"], $_POST["horario_maquinista"])) {
  $linha_maquinista = trim($_POST["linha_maquinista"]);
  $horario_maquinista = trim($_POST["horario_maquinista"]);
  $stmt = $conn->prepare("UPDATE usuario SET linha_maquinista = ?, horario_maquinista = ? WHERE pk_usuario = ?");
  $stmt->bind_param("ssi", $linha_maquinista, $horario_maquinista, $usuario_id);
  if ($stmt->execute()) {
    $mensagem = "Dados atualizados com sucesso!";
  } else {
    $mensagem = "Erro ao atualizar dados.";
  }
}

// Busca os dados do maquinista logado
$stmt = $conn->prepare("SELECT nome_usuario, linha_maquinista, horario_maquinista FROM usuario WHERE pk_usuario = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nome_usuario, $linha_maquinista, $horario_maquinista);
$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel do Maquinista - FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">
  <header class="bg-dark py-3 mb-4 border-bottom position-relative">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
      <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">
      <h1 class="h5 mb-0" id="header-username" style="opacity:0; transition:opacity 0.5s; color:white;">
        Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? ""); ?>
      </h1>
    </div>
    <div id="slide-username" class="slide-username">
      Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? ""); ?>
    </div>
  </header>

  <script>
    window.onload = function() {
      const slide = document.getElementById('slide-username');
      const header = document.getElementById('header-username');
      slide.style.transform = 'translateY(0)';
      slide.style.opacity = '1';
      setTimeout(function() {
        slide.style.opacity = '0';
        header.style.opacity = '1';
      }, 2500);
    };
  </script>

  <div class="container">
    <ul class="nav nav-tabs mb-4 justify-content-center" id="horariosTab" role="tablist">
      <li class="nav-item " role="presentation">
        <button class="nav-link active" id="ontem-tab" data-bs-toggle="tab" data-bs-target="#ontem" type="button" role="tab">Ontem</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="hoje-tab" data-bs-toggle="tab" data-bs-target="#hoje" type="button" role="tab">Hoje</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="amanha-tab" data-bs-toggle="tab" data-bs-target="#amanha" type="button" role="tab">Amanhã</button>
      </li>
    </ul>
    
    <div class="tab-content mb-4" id="horariosTabContent">
      <div class="tab-pane fade show active" id="ontem" role="tabpanel">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">20:00</h2>
                <p class="card-text">Trem mais Próximo</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">23:00</h2>
                <p class="card-text">Trem mais Tarde</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="hoje" role="tabpanel">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">15:00</h2>
                <p class="card-text">Trem mais Próximo</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">18:00</h2>
                <p class="card-text">Trem mais Tarde</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="amanha" role="tabpanel">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">10:00</h2>
                <p class="card-text">Trem mais Próximo</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-light">
              <div class="card-body">
                <h2 class="card-title">12:00</h2>
                <p class="card-text">Trem mais Tarde</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

          <table class="table table-striped mt-3">

            </thead>
            <tbody>
              <div class="tab-pane fade" id="maquinistas" role="tabpanel">
                <tr>
                  <form method="post" class="d-flex align-items-center">
                    <div class="mb-3">
                      <label class="form-label ">Nome</label>
                      <input type="text" class="form-control" value="<?= htmlspecialchars($nome_usuario) ?>" disabled>
                    </div>
                    <td>
                      <div class="mb-3">
                        <label class="form-label">Linha</label>
                        <input type="text" name="linha_maquinista" class="form-control" value="<?= htmlspecialchars($linha_maquinista) ?>" required>
                      </div>
                    </td>
                    <td>
                      <div class="mb-3">
                        <label class="form-label">Horário</label>
                        <input type="text" name="horario_maquinista" class="form-control" value="<?= htmlspecialchars($horario_maquinista) ?>" required>
                      </div>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    </td>
                  </form>
                </tr>
              </div>
            </tbody>
          </table>



        </div>
      </div>
    </div>



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
            <img src="<?php echo htmlspecialchars($imagem_atual ?? ''); ?>" alt="Avatar" style="height:32px; border-radius:50%;" />
          </button>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<style>
  .nav-tabs .nav-link {
    color: #212529 !important;
    background-color: transparent !important;
    border: none;
  }

  .nav-tabs .nav-link.active {
    background-color: #fff !important;
    color: white !important;
    border: 1px solid #dee2e6 !important;
    border-bottom: none !important;
  }

  .nav-tabs {
    border-bottom: 1px solid #dee2e6;
  }

  .slide-username {
    color: white;
    position: absolute;
    left: 30%;
    top: 100%;
    padding: 10px 30px;
    border-radius: 20px;
    font-size: 1.2rem;
  }
</style>