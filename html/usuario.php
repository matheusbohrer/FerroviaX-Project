<?php
require_once "buscar.php";

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Usuário - FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .perfil-foto {
      position: relative;
      width: 120px;
      margin: 0 auto;
      cursor: pointer;
      transition: box-shadow 0.2s;
    }

    .perfil-foto img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #dee2e6;
      transition: filter 0.2s;
    }

    .perfil-foto:hover img {
      filter: brightness(0.8);
      box-shadow: 0 0 0 4px #0d6efd;
    }

    .perfil-foto .trocar-imagem {
      display: none;
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(13, 110, 253, 0.9);
      color: #fff;
      padding: 4px 12px;
      border-radius: 12px;
      font-size: 0.9rem;
      pointer-events: none;
    }

    .perfil-foto:hover .trocar-imagem {
      display: block;
      pointer-events: auto;
    }
  </style>
</head>

<body class="bg-light">

  <div class="container py-4">
    <header class="mb-4">
      <div class="d-flex justify-content-between align-items-center">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">

      </div>
    </header>

    <div class="text-center mb-4">
      <div class="perfil-foto" onclick="window.location.href='perfil.php'">
        <img src="<?php echo htmlspecialchars($imagem_atual); ?>" alt="Foto atual" class="rounded-circle border" style="width:120px;height:120px;object-fit:cover;">
        <span class="trocar-imagem">Trocar imagem</span>
      </div>
      <h2 class="mt-3 mb-1"><?php echo htmlspecialchars($_SESSION['nome_usuario'] ?? "Bem-vindo $usuario"); ?></h2>
      <span class="badge bg-warning text-dark">⭐ 5.00</span>
    </div>

    <div class="row mb-4">
      <div class="col-4">
        <div class="card text-center h-100" onclick="location.href='manutencao.php'" style="cursor:pointer;">
          <div class="card-body">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="Manutenção" class="mb-2" style="width:32px; height:32px;">
            <div>Manutenção</div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-center h-100" onclick="location.href='saldo.php'" style="cursor:pointer;">
          <div class="card-body">
            <img src="https://cdn-icons-png.flaticon.com/512/126/126083.png" alt="Saldo" class="mb-2" style="width:32px; height:32px;">
            <div>Saldo</div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card text-center h-100" onclick="location.href='relatorios.php'" style="cursor:pointer;">
          <div class="card-body">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Relatórios" class="mb-2" style="width:32px; height:32px;">
            <div>Relatórios</div>
          </div>
        </div>
      </div>
    </div>

    <div class="opcoes-lista mb-4">
      <ul class="list-group">
        <li class="list-group-item" onclick="location.href='configuracoes.php'">Configurações de Conta</li>
        <li class="list-group-item" onclick="location.href='mensagens.php'">Mensagens</li>
        <li class="list-group-item" onclick="location.href='presente.php'">Cartão Presente</li>
        <li class="list-group-item" onclick="location.href='promocoes.php'">Promoções</li>
        <li class="list-group-item" onclick="location.href='familia.php'">Família e Adolescentes</li>
        <li class="list-group-item" onclick="location.href='diretrizes.php'">Diretrizes da Comunidade</li>
        <li class="list-group-item" onclick="abrirPopupAvaliacao()">Avalie nosso site</li>
      </ul>
      <div class="avaliacao-popup" id="avaliacaoPopup" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:9999;">
        <div class="bg-white text-dark p-4 rounded-4 text-center" style="min-width:300px;">
          <p class="fs-5 mb-3">Como você avalia nosso site?</p>
          <div class="estrelas mb-3" id="estrelas">
            <span class="estrela" data-valor="1" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="2" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="3" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="4" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
            <span class="estrela" data-valor="5" style="font-size:2rem;cursor:pointer;opacity:0.3;">⭐</span>
          </div>
          <button class="btn btn-primary" onclick="enviarAvaliacao()">Enviar</button>
        </div>
      </div>
    </div>
  </div>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let avaliacaoSelecionada = 0;

    function abrirPopupAvaliacao() {
      document.getElementById('avaliacaoPopup').style.display = 'flex';
    }

    function enviarAvaliacao() {
      if (avaliacaoSelecionada > 0) {
        alert(`Obrigado pela sua avaliação de ${avaliacaoSelecionada} estrela(s)!`);
        document.getElementById('avaliacaoPopup').style.display = 'none';
      } else {
        alert('Por favor, selecione uma quantidade de estrelas.');
      }
    }

    document.querySelectorAll('.estrela').forEach(star => {
      star.addEventListener('click', function() {
        avaliacaoSelecionada = parseInt(this.getAttribute('data-valor'));
        atualizarEstrelas(avaliacaoSelecionada);
      });
    });

    function atualizarEstrelas(valor) {
      document.querySelectorAll('.estrela').forEach(star => {
        const starValue = parseInt(star.getAttribute('data-valor'));
        star.style.opacity = starValue <= valor ? '1' : '0.3';
      });
    }
  </script>
</body>

</html>