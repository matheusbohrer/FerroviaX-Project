<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FerroviaX - Alertas</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/alertas.css">
</head>

<body>
  <header class="d-flex align-items-center justify-content-between p-2 bg-dark">
    <div class="logo-container">
      <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height: 48px;">
    </div>
    <div id="menu-toggle"></div>
  </header>

  <main>
    <div class="usuarios">

      <h2 class="titulo">Alertas e Notificações</h2>
      <div class="alerta">

        <span class="ponto-vermelho">•</span>
        <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem">
        <div class="info">
          <div><strong>Novo trem chegando!</strong> <span class="tempo">1d</span></div>
          <div>Saindo às 11:00</div>
        </div>
        <button class="botao-ver">Ver mais</button>
      </div>

      <div class="alerta">
        <span class="ponto-vermelho">•</span>
        <img src="https://pm1.aminoapps.com/7687/4743f9ffed3bb00d39710c0bfc25bb82a0f43e55r1-304-304v2_00.jpg"
          alt="Avatar">
        <div class="info">
          <div><strong>Moto Moto</strong> <span class="tempo">1d</span></div>
          <div>Avalie o maquinista</div>
        </div>
        <button class="estrela">☆</button>
      </div>

      <div class="alerta">
        <span class="ponto-vermelho">•</span>
        <img
          src="https://img.freepik.com/vetores-gratis/saudacao-alegre-do-papai-noel-dos-desenhos-animados-para-a-celebracao-do-natal_1308-153957.jpg?semt=ais_hybrid&w=740"
          alt="Avatar">
        <div class="info">
          <div><strong>Santa Claus</strong> <span class="tempo">3d</span></div>
          <div>Avalie o maquinista</div>
        </div>
        <button class="estrela">☆</button>
      </div>

      <div class="alerta">
        <span class="ponto-vermelho">•</span>
        <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem">
        <div class="info">
          <div><strong>Novo trem chegando!</strong> <span class="tempo">3d</span></div>
          <div>Saindo às 20:00</div>
        </div>
        <button class="botao-ver">Ver mais</button>
      </div>

      <div class="alerta">
        <span class="ponto-vermelho">•</span>
        <img src="https://img.icons8.com/ios-filled/50/000000/train.png" alt="Trem">
        <div class="info">
          <div><strong>Novo trem chegando!</strong> <span class="tempo">4d</span></div>
          <div>Saindo às 13:30</div>
        </div>
        <button class="botao-ver">Ver mais</button>
      </div>

      <div class="alerta">
        <span class="ponto-vermelho">•</span>
        <img
          src="https://lojaautoformula.com.br/cdn/shop/collections/AF_FEED_IG_REDBULL_-_2023-10-10T221600.481.png?v=1741615741&width=1296"
          alt="Avatar">
        <div class="info">
          <div><strong>Max Verstappen</strong> <span class="tempo">4d</span></div>
          <div>Avalie o maquinista</div>
        </div>
        <button class="estrela">☆</button>
      </div>
    </div>
    <div class="popup-avaliacao">
      <div class="topo-popup">
        <strong>Avalie nosso Aplicativo!</strong>
        <button class="botao-fechar-popup">✕</button>
      </div>
      <p>E ganhe recompensas!</p>
      <div class="botoes-popup">
        <button class="primario">Quero avaliar!</button>
        <button class="secundario" id="btn-mais-tarde">Mais tarde</button>
      </div>

  </main>

  <footer>
    <div class="footer">
      <div><button onclick="location.href='geral.html'"><img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Home-icon.svg/1024px-Home-icon.svg.png"></button>
      </div>
      <div><button onclick="location.href='rotas.html'"><img
            src="https://cdn-icons-png.flaticon.com/512/49/49116.png"></button></div>
      <div><button onclick="location.href='alertas.html'"><img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/OOjs_UI_icon_bell.svg/2048px-OOjs_UI_icon_bell.svg.png"></button>
      </div>
      <div><button onclick="location.href='usuario.html'">
          <img src="../imagens/perfil.png" alt="Avatar" style="border-radius: 50%; width: 32px; height: 32px;">
        </button></div>
    </div>
  </footer>
  </div>

  <script src="../js/alertas.js"></script>
</body>

</html>