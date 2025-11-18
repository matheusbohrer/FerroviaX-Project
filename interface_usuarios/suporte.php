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
      background-color: #fff; /* Toda a tela branca */
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

    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #fff;
      border-top: 1px solid #ccc;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 10px 0;
    }

    footer div {
      text-align: center;
      font-size: 0.85em;
      color: #555;
    }

    footer img {
      width: 22px;
      height: 22px;
      display: block;
      margin: auto;
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
  <div class="container d-flex flex-wrap justify-content-center align-items-center">
    <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height:48px;">
  </div>
</header>
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
      <strong>Horário:</strong> Segunda a Sexta, das 8h às 18h</p>
      <button class="btn" onclick="alert('Abrindo chat com o suporte...')">Entrar em contato</button>
    </div>
  </main>

  <footer>
    <div><img src="home.png" alt="Início"><span>Início</span></div>
    <div><img src="report.png" alt="Relatórios"><span>Relatórios</span></div>
    <div><img src="alert.png" alt="Alertas"><span>Alertas</span></div>
    <div><img src="profile.png" alt="Perfil"><span>Perfil</span></div>
  </footer>

</body>
</html>
