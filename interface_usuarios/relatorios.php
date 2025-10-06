<?php
require_once "../php/buscar.php";
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FerroviaX - Relatórios</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/relatorios.css" />
</head>

<body class="bg-light" style="min-height:100vh; position:relative;">
  <!-- Cabeçalho fixo (NÃO MEXER) -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container justify-content-center">
      <a class="navbar-brand mx-auto" href="#">
        <img src="../imagens/logoBranca.png" alt="FerroviaX Logo" style="height: 60px;">
      </a>
    </div>
  </nav>

  <!-- CONTEÚDO CENTRAL (APENAS AQUI ALTERADO) -->

  <div class="container pb-5">

<!-- Preview do último relatório -->
<div id="previewCard" class="card mb-4 shadow-sm">
  <div class="card-body">
    <h5 class="card-title">📄 Último Relatório</h5>
    <div id="previewContent" class="small text-muted">
      <p class="mb-1"><strong>Data:</strong> —</p>
      <p class="mb-1"><strong>Tipo:</strong> —</p>
      <p class="mb-0"><strong>Responsável:</strong> —</p>
      <p class="mt-2 mb-0"><strong>Detalhes:</strong> —</p>
    </div>
  </div>
</div>

<!-- Formulário de novo relatório -->
<div class="card shadow-sm">
  <div class="card-body">
    <h5 class="card-title mb-3">➕ Novo Relatório</h5>

    <form id="reportForm" novalidate>
      <!-- Nome do responsável (exigido para todos os tipos) -->
      <div class="mb-3">
        <label for="responsavel" class="form-label">Nome do Responsável <span class="text-danger">*</span></label>
        <input type="text" id="responsavel" name="responsavel" class="form-control" placeholder="Nome completo" required>
        <div class="invalid-feedback">Informe o nome do responsável.</div>
      </div>

      <!-- Tipo (os tipos que você pediu) -->
      <div class="mb-3">
        <label for="tipoRel" class="form-label">Tipo de Relatório <span class="text-danger">*</span></label>
        <select id="tipoRel" name="tipoRel" class="form-select" required>
          <option value="">Selecione...</option>
          <option value="sensores">Gerenciamento de sensores</option>
          <option value="itinerarios">Gerenciamento de itinerários</option>
          <option value="trens">Gerenciamento de trens</option>
          <option value="rotas">Gerenciamento de rotas</option>
          <option value="manutencoes">Gerenciamento de manutenções dos trens</option>
        </select>
        <div class="invalid-feedback">Selecione o tipo de relatório.</div>
      </div>

      <!-- Campos específicos carregados dinamicamente -->
      <div id="camposEspecificos"></div>

      <button type="submit" class="btn btn-primary w-100 mt-2">Enviar Relatório</button>
    </form>

    <!-- Mensagem de sucesso -->
    <div id="successAlert" class="alert alert-success mt-3 d-none" role="alert">
      ✅ Relatório adicionado com sucesso!
    </div>
  </div>
</div>


  </div>

  <!-- FOOTER (NÃO MEXER) -->

  <footer class="footer-nav fixed-bottom">
    <div class="nav-container">
      <button class="nav-item" data-page="geral" onclick="location.href='geral.php'">
        <img src="https://img.icons8.com/ios/50/000000/home.png" class="icon default" />
        <img src="https://img.icons8.com/ios-filled/50/000000/home.png" class="icon active-icon" />
        <span>Início</span>
      </button>


  <button class="nav-item" data-page="relatorios" onclick="location.href='relatorios.php'">
    <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default" />
    <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" class="icon active-icon" />
    <span>Relatórios</span>
  </button>

  <button class="nav-item" data-page="alertas" onclick="location.href='alertas.php'">
    <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default" />
    <img src="https://img.icons8.com/ios-filled/50/000000/bell.png" class="icon active-icon" />
    <span>Alertas</span>
  </button>

  <button class="nav-item" data-page="usuario" onclick="location.href='usuario.php'">
    <img src="<?php echo htmlspecialchars($imagem_atual); ?>" alt="Avatar" class="user-icon default" />
    <span>Perfil</span>
  </button>
</div>

  </footer>

  <!-- scripts -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Campos específicos para cada tipo (label, name, type)
    const camposPorTipo = {
      sensores: [
        { label: "ID do Sensor", name: "sensor_id", type: "text", placeholder: "Ex: SNR-001" },
        { label: "Localização", name: "sensor_localizacao", type: "text", placeholder: "Estação / Trecho" },
        { label: "Status", name: "sensor_status", type: "text", placeholder: "ativo / inativo / manutenção" }
      ],
      itinerarios: [
        { label: "Código do Itinerário", name: "iti_codigo", type: "text", placeholder: "Ex: IT-2025-01" },
        { label: "Origem", name: "iti_origem", type: "text", placeholder: "Cidade / Estação" },
        { label: "Destino", name: "iti_destino", type: "text", placeholder: "Cidade / Estação" },
        { label: "Horário (partida)", name: "iti_horario", type: "text", placeholder: "HH:MM" }
      ],
      trens: [
        { label: "Número do Trem", name: "trem_num", type: "text", placeholder: "Ex: TR-045" },
        { label: "Capacidade (passageiros)", name: "trem_capacidade", type: "number", placeholder: "Ex: 240" },
        { label: "Modelo", name: "trem_modelo", type: "text", placeholder: "Ex: X200" }
      ],
      rotas: [
        { label: "Código da Rota", name: "rota_codigo", type: "text", placeholder: "Ex: R-12" },
        { label: "Trechos (origem-destino)", name: "rota_trechos", type: "text", placeholder: "SP-Campinas; Campinas-RJ" },
        { label: "Distância (km)", name: "rota_distancia", type: "number", placeholder: "Ex: 120" }
      ],
      manutencoes: [
        { label: "Trem Alvo (nº)", name: "manut_trem", type: "text", placeholder: "Ex: TR-045" },
        { label: "Tipo de Manutenção", name: "manut_tipo", type: "text", placeholder: "preventiva / corretiva" },
        { label: "Data Prevista", name: "manut_data", type: "date", placeholder: "" },
        { label: "Descrição", name: "manut_descricao", type: "textarea", placeholder: "Detalhes da intervenção" }
      ]
    };

    const tipoSelect = document.getElementById('tipoRel');
    const camposDiv = document.getElementById('camposEspecificos');
    const form = document.getElementById('reportForm');
    const previewContent = document.getElementById('previewContent');
    const successAlert = document.getElementById('successAlert');
    const responsavelInput = document.getElementById('responsavel');

    // Limpa campos específicos
    function limparCamposEspecificos() {
      camposDiv.innerHTML = '';
      // remove estados de validação se houver
      tipoSelect.classList.remove('is-invalid');
    }

    // Gera campos conforme seleção
    tipoSelect.addEventListener('change', () => {
      limparCamposEspecificos();
      const tipo = tipoSelect.value;
      if (!tipo || !camposPorTipo[tipo]) return;

      camposPorTipo[tipo].forEach(c => {
        const wrapper = document.createElement('div');
        wrapper.className = 'mb-3';

        const label = document.createElement('label');
        label.className = 'form-label';
        label.htmlFor = c.name;
        label.textContent = c.label + ' ';

        // estrela obrigatória
        const star = document.createElement('span');
        star.className = 'text-danger';
        star.textContent = '*';
        label.appendChild(star);

        wrapper.appendChild(label);

        if (c.type === 'textarea') {
          const ta = document.createElement('textarea');
          ta.className = 'form-control';
          ta.id = c.name;
          ta.name = c.name;
          ta.placeholder = c.placeholder || '';
          ta.required = true;
          ta.rows = 3;
          wrapper.appendChild(ta);
        } else {
          const inp = document.createElement('input');
          inp.className = 'form-control';
          inp.type = c.type || 'text';
          inp.id = c.name;
          inp.name = c.name;
          if (c.placeholder) inp.placeholder = c.placeholder;
          inp.required = true;
          wrapper.appendChild(inp);
        }

        const invalid = document.createElement('div');
        invalid.className = 'invalid-feedback';
        invalid.textContent = 'Preencha este campo.';
        wrapper.appendChild(invalid);

        camposDiv.appendChild(wrapper);
      });
    });

    // Validação simples e submissão (client-side)
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      // limpar is-invalid anteriores
      Array.from(form.querySelectorAll('.is-invalid')).forEach(el => el.classList.remove('is-invalid'));

      let valido = true;
      // valida nome do responsável
      if (!responsavelInput.value.trim()) {
        responsavelInput.classList.add('is-invalid');
        valido = false;
      }

      // valida tipo
      if (!tipoSelect.value) {
        tipoSelect.classList.add('is-invalid');
        valido = false;
      }

      // valida campos específicos
      const inputsVisiveis = camposDiv.querySelectorAll('input, textarea, select');
      inputsVisiveis.forEach(inp => {
        if (inp.required && !inp.value.toString().trim()) {
          inp.classList.add('is-invalid');
          valido = false;
        }
      });

      if (!valido) return;

      // Monta resumo para o preview
      const details = [];
      inputsVisiveis.forEach(inp => {
        const labelEl = camposDiv.querySelector('label[for="' + inp.id + '"]');
        const labelText = labelEl ? labelEl.firstChild.textContent.trim() : inp.name;
        details.push(`${labelText.replace('*','').trim()}: ${inp.value}`);
      });

      // atualizar preview
      const now = new Date();
      const dataStr = now.toLocaleDateString('pt-BR') + ' ' + now.toLocaleTimeString('pt-BR');
      previewContent.innerHTML = `
        <p class="mb-1"><strong>Data:</strong> ${dataStr}</p>
        <p class="mb-1"><strong>Tipo:</strong> ${tipoSelect.options[tipoSelect.selectedIndex].text}</p>
        <p class="mb-0"><strong>Responsável:</strong> ${responsavelInput.value}</p>
        <p class="mt-2 mb-0"><strong>Detalhes:</strong><br>${details.join('<br>')}</p>
      `;

      // mostrar mensagem de sucesso
      successAlert.classList.remove('d-none');
      successAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });

      // esconder alerta após 3s
      setTimeout(() => {
        successAlert.classList.add('d-none');
      }, 3000);

      // reset do formulário (mantém preview)
      form.reset();
      limparCamposEspecificos();
    });

    // Ativar ícone do menu atual (mantém seu comportamento)
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
