<?php
require_once "../php/buscar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Configurações</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      background: #f8f9fa;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: #212529;
      color: #fff;
      padding: 10px 20px;
      height: 80px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 1000;
    }

    header img {
      height: 50px;
    }

    .container {
      margin-top: 90px;
    }

    .card-setting {
      border: none;
      border-radius: 10px;
      transition: .2s;
      cursor: pointer;
    }

    .card-setting:hover {
      background: #e9ecef;
    }

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

    .container.pb-5 {
      padding-bottom: 120px !important;
    }
  </style>
</head>

<body>

  <header>
    <img src="../imagens/logoBranca.png">
    <h1 style="font-size:1rem;">Configurações do Sistema</h1>
  </header>

  <div class="container">

    <h4 class="text-center mb-4">Gerenciamento do Sistema</h4>

    <div class="row g-3">

      <div class="col-12">
        <div class="card card-setting p-3">
          <h6 class="mb-1">Configurações Gerais</h6>
          <p class="mb-0 text-muted">Horários, timezone, idioma e parâmetros básicos.</p>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-setting p-3">
          <h6 class="mb-1">Segurança e Permissões</h6>
          <p class="mb-0 text-muted">Controle de acesso, níveis de administrador e proteção do sistema.</p>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-setting p-3">
          <h6 class="mb-1">Backup e Restauração</h6>
          <p class="mb-0 text-muted">Exportação dos dados e restauração de arquivos do sistema.</p>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-setting p-3">
          <h6 class="mb-1">Logs do Sistema</h6>
          <p class="mb-0 text-muted">Histórico de eventos, erros, acessos e auditoria.</p>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-setting p-3" onclick="location.href='avaliacoes_admin.php'">
          <h6 class="mb-1">Avaliações dos Usuários</h6>
          <p class="mb-0 text-muted">Veja as notas e feedbacks enviados pelos usuários.</p>
        </div>
      </div>
      
      <div class="col-12">
        <div class="card card-setting p-3">
          <h6 class="mb-1">Preferências da Interface</h6>
          <p class="mb-0 text-muted">Ajustes visuais e preferências do painel admin.</p>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-setting p-3">
          <h6 class="mb-1">Integrações e API</h6>
          <p class="mb-0 text-muted">Chaves, conexões IoT, HiveMQ e sincronização externa.</p>
        </div>
      </div>

      <div class="col-12">
        <div class="card card-setting p-3">
          <h6 class="mb-1">Sobre o Sistema</h6>
          <p class="mb-0 text-muted">Versão, licenças, equipe e informações técnicas.</p>
        </div>
      </div>

    </div>
  </div>

  <footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item" onclick="location.href='geral_admin.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon">
        <span>Início</span>
      </button>

      <button class="nav-item" onclick="location.href='relatorios_admin.php'">
        <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" class="icon active-icon">
        <span>Relatórios</span>
      </button>

      <button class="nav-item" onclick="location.href='alertas_admin.php'">
        <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/000000/bell.png" class="icon active-icon">
        <span>Alertas</span>
      </button>

      <button class="nav-item active" onclick="location.href='configuracoes_admin.php'">
        <img src="https://img.icons8.com/ios/50/000000/settings.png" class="icon default">
        <img src="https://img.icons8.com/ios-filled/50/000000/settings.png" class="icon active-icon">
        <span>Config.</span>
      </button>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>