<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sobre Nós - FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
      color: #000;
      font-family: 'Inter', sans-serif;
      overflow-x: hidden;
      padding-bottom: 80px;
      /* espaço para o rodapé fixo */
    }

    header {
      background-color: #000;
      color: #fff;
      text-align: center;
      padding: 25px 0;
      animation: fadeInDown 1s ease;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .logo {
      height: 55px;
      display: block;
      margin: 0 auto 10px;
      filter: brightness(200%) grayscale(100%);
      transition: transform 0.4s ease;
    }

    .logo:hover {
      transform: scale(1.06);
    }

    h3.title {
      font-weight: 700;
      margin: 0;
      color: #fff;
    }

    /* --- Imagem principal FerroviaX.png --- */
    .main-image {
      display: block;
      max-width: 880px;
      width: 85%;
      height: auto;
      margin: 20px auto 35px;
      animation: fadeInUp 1s ease;
      border-radius: 8px;
    }

    /* --- Seções --- */
    main section {
      margin-bottom: 35px;
      padding: 0 10px;
    }

    .section-title {
      border-left: 5px solid #000;
      padding-left: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 14px;
      animation: slideInLeft 0.8s ease;
    }

    p,
    ul {
      animation: fadeInUp 0.8s ease;
      line-height: 1.6;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-20px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    a {
      color: #000;
      text-decoration: underline;
    }

    a:hover {
      color: #555;
    }

    /* --- Rodapé fixo --- */
    .footer-nav {
      background: #fff;
      border-top: 1px solid #000;
      padding: 6px 0;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
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
      padding: 6px 0;
      color: #000;
      font-size: 12px;
      transition: all 0.25s ease;
      position: relative;
    }

    .nav-item span {
      display: block;
      font-size: 11px;
      margin-top: 2px;
      opacity: 0.7;
    }

    .icon {
      height: 26px;
      width: 26px;
      display: block;
      margin: auto;
      filter: grayscale(100%);
      opacity: 0.75;
    }

    .user-icon {
      height: 28px;
      width: 28px;
      border-radius: 50%;
      object-fit: cover;
      filter: grayscale(100%);
      opacity: 0.75;
    }

    .nav-item.active .default,
    .nav-item.active .user-icon {
      opacity: 1;
      transform: scale(1.12);
      box-shadow: 0 0 8px #000;
    }

    .nav-item.active span {
      opacity: 1;
      color: #000;
    }

    .nav-item.active::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 30%;
      width: 40%;
      height: 3px;
      background: #000;
      border-radius: 2px;
    }

    /* --- Responsividade --- */
    @media (max-width: 768px) {
      .main-image {
        max-width: 220px;
        margin: 16px auto 28px;
      }

      .section-title {
        border-left-width: 4px;
        padding-left: 8px;
      }
    }

    @media (max-width: 420px) {
      .logo {
        height: 46px;
      }

      h3.title {
        font-size: 1.25rem;
      }

      .main-image {
        max-width: 180px;
      }
    }
  </style>
</head>

<body>

  <header>
    <img src="../imagens/logoBranca.png" alt="Logo FerroviaX" class="logo">
    <h3 class="title">Sobre Nós</h3>
  </header>

  <button class="btn btn-outline-secondary mb-3" onclick="history.back()" aria-label="Voltar" style="margin-left: 20px; margin-top: 12px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#111" stroke-width="2"
      stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
      <line x1="19" y1="12" x2="5" y2="12" />
      <polyline points="12 19 5 12 12 5" />
    </svg>
  </button>

  <main class="container my-4 text-center">
    <img src="../imagens/FerroviaX.png" alt="FerroviaX" class="main-image">

    <section>
      <h4 class="section-title text-start">Quem Somos</h4>
      <p class="text-start">
        A <strong>FerroviaX</strong> é uma empresa dedicada à inovação no transporte ferroviário e logística inteligente.
        Nosso objetivo é otimizar o deslocamento de cargas e pessoas com tecnologia, eficiência e segurança.
      </p>
    </section>

    <section>
      <h4 class="section-title text-start">Nossa Missão</h4>
      <p class="text-start">
        Garantir soluções de transporte ágeis e sustentáveis, conectando pessoas, empresas e oportunidades
        em todo o território nacional.
      </p>
    </section>

    <section>
      <h4 class="section-title text-start">Nossa Visão</h4>
      <p class="text-start">
        Ser referência no setor ferroviário brasileiro, reconhecida pela inovação, compromisso ambiental
        e excelência em serviços de mobilidade e logística.
      </p>
    </section>

    <section>
      <h4 class="section-title text-start">Nossos Valores</h4>
      <ul class="text-start">
        <li>Inovação constante e melhoria contínua;</li>
        <li>Compromisso com a sustentabilidade e o meio ambiente;</li>
        <li>Ética, transparência e respeito;</li>
        <li>Segurança e qualidade em todas as operações.</li>
      </ul>
    </section>

    <section>
      <h4 class="section-title text-start">Contato</h4>
      <p class="text-start">
        📧 E-mail: <a href="mailto:contato@ferroviax.com">contato@ferroviax.com</a><br>
        📍 Endereço: SESI de Referência Joinville - R. Urussanga, 138 - Bucarein, Joinville - SC
      </p>
    </section>

    <div class="mt-4 mb-5">
      <a href="usuario.php" class="btn btn-outline-dark fw-bold">Voltar ao Perfil</a>
    </div>
  </main>

  <!-- Rodapé fixo -->
  <footer class="footer-nav" role="navigation" aria-label="Navegação inferior">
    <div class="nav-container">
      <button class="nav-item" data-page="geral" onclick="location.href='geral.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default" alt="Início" />
        <span>Início</span>
      </button>

      <button class="nav-item" data-page="relatorios" onclick="location.href='relatorios.php'">
        <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default" alt="Relatórios" />
        <span>Relatórios</span>
      </button>

      <button class="nav-item" data-page="alertas" onclick="location.href='alertas.php'">
        <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default" alt="Alertas" />
        <span>Alertas</span>
      </button>

      <button class="nav-item" data-page="usuario" onclick="location.href='usuario.php'">
        <img src="<?php echo htmlspecialchars($_SESSION['imagem_usuario'] ?? '../imagens/default.jpg', ENT_QUOTES, 'UTF-8'); ?>" alt="Avatar" class="user-icon default" />
        <span>Perfil</span>
      </button>
    </div>
  </footer>

  <script>
    // Ativar item do rodapé conforme página
    document.addEventListener("DOMContentLoaded", () => {
      const navItems = document.querySelectorAll(".nav-item");
      const path = window.location.pathname.split("/").pop();
      navItems.forEach(item => {
        const page = item.getAttribute("data-page") + ".php";
        if (path === page) item.classList.add("active");
      });
    });
  </script>
</body>

</html>