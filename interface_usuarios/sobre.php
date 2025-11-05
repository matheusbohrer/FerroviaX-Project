<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Diretrizes da Comunidade - FerroviaX</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/diretrizes.css" />
</head>
<?php
session_start();
?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sobre Nós - FerroviaX</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* --- Geral preto e branco --- */
    body {
      background-color: #fff;
      color: #000;
      padding-bottom: 80px; /* espaço para o rodapé fixo */
      overflow-x: hidden;
    }

    header {
      background-color: #000;
      color: #fff;
      padding: 25px 0;
      position: relative;
      overflow: hidden;
      animation: fadeInDown 1s ease;
      text-align: center;
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .logo {
      height: 55px;
      filter: grayscale(100%) brightness(200%);
      transition: transform 0.4s ease;
      display:block;
      margin: 0 auto 8px;
    }
    .logo:hover { transform: scale(1.06); }

    /* --- Título com brilho que acontece 1 vez + fade-out --- */
    .title {
      color: #fff; /* cor padrão após o brilho */
      font-weight: 700;
      margin: 0;
      position: relative;
      display: inline-block;
    }

    .shine {
      /* O efeito usa background-clip para preencher o texto enquanto dura a animação */
      background: linear-gradient(90deg, rgba(255,255,255,0.95) 0%, rgba(200,200,200,0.9) 50%, rgba(255,255,255,0.95) 100%);
      background-size: 200% auto;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: shineOnce 2.2s linear 1 forwards;
    }

    @keyframes shineOnce {
      0% { background-position: -100% 0; opacity: 1; filter: blur(6px); }
      60% { background-position: 120% 0; filter: blur(0px); }
      100% { background-position: 220% 0; opacity: 0.95; }
    }

    /* fade-out suave no fim do efeito (aplicado via JS ao remover classe .shine) */
    .title--final {
      transition: color 450ms ease, text-shadow 450ms ease;
      color: #fff;
      text-shadow: 0 0 6px rgba(255,255,255,0.06);
    }

    /* --- Seções --- */
    .section-title {
      border-left: 5px solid #000;
      padding-left: 12px;
      margin-bottom: 14px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      animation: slideInLeft 0.8s ease;
    }
    @keyframes slideInLeft {
      from { opacity: 0; transform: translateX(-24px); }
      to { opacity: 1; transform: translateX(0); }
    }

    main p, main ul {
      animation: fadeInUp 0.8s ease;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(12px); }
      to { opacity: 1; transform: translateY(0); }
    }

    a { color: #000; text-decoration: underline; }
    a:hover { color: #555; }

   
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
    .nav-item span { display: block; font-size: 11px; margin-top: 2px; opacity: 0.7; }
    .nav-item .icon { height: 26px; width: 26px; display: block; margin: auto; filter: grayscale(100%); opacity: 0.75; }
    .user-icon { height: 28px; width: 28px; border-radius: 50%; object-fit: cover; filter: grayscale(100%); opacity: 0.75; }

    .nav-item.active .default, .nav-item.active .user-icon {
      opacity: 1; transform: scale(1.12); box-shadow: 0 0 8px #000;
    }
    .nav-item.active span { opacity: 1; color: #000; }
    .nav-item.active::after {
      content: ""; position: absolute; bottom: 0; left: 30%; width: 40%; height: 3px; background: #000; border-radius: 2px;
    }

    /* Pequeno ajuste responsivo */
    @media (max-width: 420px) {
      .logo { height: 46px; }
      .section-title { padding-left: 8px; border-left-width: 4px; }
    }

  </style>
</head>
<body>

  <header>
    <img src="../imagens/logoBranca.png" alt="Logo FerroviaX" class="logo">
    <!-- Título com efeito: .shine é aplicada para a animação e removida via JS ao terminar -->
    <h3 class="title title--final"><span id="sobreTitulo" class="shine">Sobre Nós</span></h3>
  </header>

  <main class="container my-4">
    <section class="mb-4">
      <h4 class="section-title">Quem Somos</h4>
      <p>
        A <strong>FerroviaX</strong> é uma empresa dedicada à inovação no transporte ferroviário e logística inteligente.
        Nosso objetivo é otimizar o deslocamento de cargas e pessoas com tecnologia, eficiência e segurança.
      </p>
    </section>

    <section class="mb-4">
      <h4 class="section-title">Nossa Missão</h4>
      <p>
        Garantir soluções de transporte ágeis e sustentáveis, conectando pessoas, empresas e oportunidades
        em todo o território nacional.
      </p>
    </section>

    <section class="mb-4">
      <h4 class="section-title">Nossa Visão</h4>
      <p>
        Ser referência no setor ferroviário brasileiro, reconhecida pela inovação, compromisso ambiental
        e excelência em serviços de mobilidade e logística.
      </p>
    </section>

    <section class="mb-4">
      <h4 class="section-title">Nossos Valores</h4>
      <ul>
        <li>Inovação constante e melhoria contínua;</li>
        <li>Compromisso com a sustentabilidade e o meio ambiente;</li>
        <li>Ética, transparência e respeito;</li>
        <li>Segurança e qualidade em todas as operações.</li>
      </ul>
    </section>

    <section>
      <h4 class="section-title">Contato</h4>
      <p>
        📧 E-mail: <a href="mailto:contato@ferroviax.com">contato@ferroviax.com</a><br>
        📍 Endereço: SESI de Referência Joinville - R. Urussanga, 138 - Bucarein, Joinville - SC,
      </p>
    </section>

    <div class="text-center mt-5">
      <a href="usuario.php" class="btn btn-outline-dark fw-bold">Voltar ao Perfil</a>
    </div>
  </main>

  <!-- Rodapé fixo -->
  <footer class="footer-nav" role="navigation" aria-label="Navegação inferior">
    <div class="nav-container">
      <button class="nav-item" data-page="geral" onclick="location.href='geral.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default" alt="Início"/>
        <span>Início</span>
      </button>

      <button class="nav-item" data-page="relatorios" onclick="location.href='relatorios.php'">
        <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default" alt="Relatórios"/>
        <span>Relatórios</span>
      </button>

      <button class="nav-item" data-page="alertas" onclick="location.href='alertas.php'">
        <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default" alt="Alertas"/>
        <span>Alertas</span>
      </button>

      <button class="nav-item" data-page="usuario" onclick="location.href='usuario.php'">
        <img src="<?php echo htmlspecialchars($_SESSION['imagem_usuario'] ?? '../imagens/default.jpg', ENT_QUOTES, 'UTF-8'); ?>" alt="Avatar" class="user-icon default" />
        <span>Perfil</span>
      </button>
    </div>
  </footer>

  <script>
    (function(){
      const titulo = document.getElementById('sobreTitulo');
      if (!titulo) return;

      function onAnimationEnd() {
        
        titulo.classList.remove('shine');
        
        titulo.parentElement.classList.add('title--final');
        titulo.removeEventListener('animationend', onAnimationEnd);
      }

      // se a animação já estiver definida, escuta o fim
      titulo.addEventListener('animationend', onAnimationEnd);

     
      setTimeout(() => {
        if (titulo.classList.contains('shine')) {
          onAnimationEnd();
        }
      }, 2600);
    })();

    // Marca item ativo no rodapé com base no nome da página
    document.addEventListener("DOMContentLoaded", () => {
      const navItems = document.querySelectorAll(".nav-item");
      const path = window.location.pathname.split("/").pop();
      navItems.forEach(item => {
        const page = item.getAttribute("data-page") + ".php";
        if (path === page) {
          item.classList.add("active");
        } else {
          item.classList.remove("active");
        }
      });
    });
  </script>
</body>
</html>

