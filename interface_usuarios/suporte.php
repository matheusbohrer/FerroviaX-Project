<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suporte FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">


  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #fff;
      /* Toda a tela branca */
      color: #111;
    }

    header {
      background-color: #fff;
      padding: 15px;
      text-align: center;
      font-size: 1.4em;
      font-weight: bold;
      border-bottom: 1px solid #ddd;
      position: relative;
    }



    /* Botão de voltar */
    .back-button {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      font-size: 1.5em;
      cursor: pointer;
      color: #333;

    }

    .back-button:hover {
      color: #000;
    }

    main {
      padding: 20px;
      max-width: 800px;
      margin: auto;
    }

    h3 {
      border-left: 3px solid #222;
      padding-left: 10px;
      margin-top: 25px;
      color: #222;
    }

    .faq-item {
      background-color: #333;
      color: #fff;
      padding: 14px;
      border-radius: 8px;
      margin: 10px 0;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: background 0.3s;
    }

    .faq-item:hover {
      background-color: #555;
    }

    .faq-answer {
      display: none;
      padding: 10px 15px;
      background-color: #f4f4f4;
      border-left: 3px solid #333;
      border-radius: 0 0 8px 8px;
      color: #222;
      font-size: 0.95em;
    }

    .contact-card {
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      margin-top: 15px;
    }

    .contact-card strong {
      color: #000;
    }

    .btn {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px 18px;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
      transition: background 0.3s;

    }

    .btn:hover {
      background-color: #555;
    }





    /* Responsividade */
    @media (max-width: 600px) {
      main {
        padding: 15px;
      }

      .faq-item {
        font-size: 0.9em;
        padding: 12px;
      }

      .btn {
        width: 100%;
      }

      .back-button {
        font-size: 1.4em;
      }
    }
  </style>

  <script>
    function toggleFAQ(element) {
      const answer = element.nextElementSibling;
      answer.style.display = answer.style.display === "block" ? "none" : "block";
    }

    function voltarPagina() {
      window.history.back();
    }
  </script>
</head>


<header class="bg-dark py-3 mb-4 border-bottom position-relative">
  <!-- Logo centralizada -->
  <div class="container d-flex justify-content-center align-items-center">
    <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">
  </div>
</header>

<button class="btn btn-outline-secondary mb-3" onclick="history.back()" aria-label="Voltar">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#111" stroke-width="2"
    stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
    <line x1="19" y1="12" x2="5" y2="12" />
    <polyline points="12 19 5 12 12 5" />
  </svg>
</button>


<body class="bg-light">
  <main>
    <h3>Perguntas Frequentes</h3>
    <br>

    <div class="faq-item" onclick="toggleFAQ(this)">
      Como atualizar o status da minha entrega? <span>+</span>
    </div>
    <div class="faq-answer">
      Acesse o aplicativo FerroviaX, vá até “Minhas Entregas” e selecione a entrega desejada. Em seguida, toque em “Atualizar Status”.
    </div>

    <div class="faq-item" onclick="toggleFAQ(this)">
      O aplicativo está travando, o que posso fazer? <span>+</span>
    </div>
    <div class="faq-answer">
      Verifique sua conexão com a internet e reinicie o aplicativo. Caso o problema continue, entre em contato com o suporte técnico.
    </div>

    <div class="faq-item" onclick="toggleFAQ(this)">
      Como entro em contato com o suporte técnico? <span>+</span>
    </div>
    <div class="faq-answer">
      Você pode entrar em contato diretamente pelo e-mail ou telefone disponíveis abaixo.
    </div>

    <br>
    <h3>Contato do Suporte</h3>
    <div class="contact-card">
      <p><strong>Fale Conosco</strong></p>
      <p><strong>Email:</strong> suporte@ferroviax.com<br>
        <strong>Telefone:</strong> (47) 91234-5678<br>
        <strong>Horário:</strong> Segunda a Sexta, das 8h às 18h
      </p>
      <button class="btn" onclick="abrirSuporte()">Abrir suporte</button>
    </div>
  </main>

  <footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item" onclick="location.href='geral.php'">
        <img src="https://img.icons8.com/ios/50/home.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/home.png" class="icon active-icon">
        <span>Início</span>
      </button>

      <button class="nav-item">
        <img src="https://img.icons8.com/ios/50/time-machine.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/time-machine.png" class="icon active-icon">
        <span>Histórico</span>
      </button>

      <button class="nav-item" onclick="location.href='alertas.php'">
        <img src="https://img.icons8.com/ios/50/bell.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/bell.png" class="icon active-icon">
        <span>Alertas</span>
      </button>

      <button class="nav-item active" onclick="location.href='usuario.php'">
        <img src="<?php echo htmlspecialchars($imagem_atual ?? ''); ?>" class="user-icon default">
        <span>Perfil</span>
      </button>
    </div>
  </footer>

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
      max-width: 32px;
      max-height: 32px;
    }


    .modal-suporte {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(3px);
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .modal-content {
      background: #fff;
      width: 90%;
      max-width: 380px;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
  </style>

  <!-- MODAL DE SUPORTE -->
  <div id="modalSuporte" class="modal-suporte">
    <div class="modal-content">

      <h4 class="mb-3">Solicitar Suporte</h4>

      <form action="../php/enviar_suporte.php" method="POST">
        <label for="assunto">Assunto</label>
        <input type="text" id="assunto" name="assunto" required class="form-control mb-2">

        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" rows="4" required class="form-control mb-3"></textarea>

        <button type="submit" class="btn w-100" style="background:#222;color:#fff;">Enviar Solicitação</button>
      </form>

      <button class="btn btn-danger w-100 mt-2" onclick="fecharSuporte()">Cancelar</button>

    </div>
  </div>

  <script>
    function abrirSuporte() {
      document.getElementById('modalSuporte').style.display = 'flex';
    }

    function fecharSuporte() {
      document.getElementById('modalSuporte').style.display = 'none';
    }
  </script>

</body>

</html>