<?php
require_once "../php/buscar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FerroviaX - Relatórios</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/relatorios.css">
<style>
html, body { margin: 0; padding: 0; background: #f8f9fa; }
.footer-nav { background: #fff; border-top: 1px solid #ddd; padding: 6px 0; }
.nav-container { display: flex; justify-content: space-around; align-items: center; }
.nav-item { flex: 1; text-align: center; background: none; border: none; padding: 6px 0; color: #666; font-size: 12px; position: relative; }
.nav-item span { display: block; margin-top: 2px; opacity: .6; }
.nav-item .icon { height: 26px; opacity: .6; }
.nav-item .active-icon { display: none; }
.nav-item.active .default { display: none; }
.nav-item.active .active-icon { display: block; }
.nav-item.active span, .nav-item.active .icon { opacity: 1; color: #007bff; transform: scale(1.1); }
.nav-item.active::after { content: ""; position: absolute; bottom: 0; left: 30%; width: 40%; height: 3px; background: #007bff; border-radius: 2px; }
</style>
</head>

<body class="bg-light" style="min-height:100vh; position:relative;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container justify-content-center">
    <a class="navbar-brand mx-auto" href="#">
      <img src="../imagens/logoBranca.png" style="height:60px;">
    </a>
  </div>
</nav>

<div class="container pb-5">

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

<div class="card shadow-sm">
  <div class="card-body">
    <h5 class="card-title mb-3">➕ Novo Relatório</h5>

    <form id="reportForm" novalidate>
      <div class="mb-3">
        <label class="form-label">Nome do Responsável <span class="text-danger">*</span></label>
        <input type="text" id="responsavel" name="responsavel" class="form-control" required>
        <div class="invalid-feedback">Informe o nome do responsável.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Tipo de Relatório <span class="text-danger">*</span></label>
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

      <div id="camposEspecificos"></div>

      <button type="submit" class="btn btn-primary w-100 mt-2">Enviar Relatório</button>
    </form>

    <div id="successAlert" class="alert alert-success mt-3 d-none">✅ Relatório adicionado com sucesso!</div>
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

    <button class="nav-item active" onclick="location.href='relatorios_admin.php'">
      <img src="https://img.icons8.com/ios/50/000000/combo-chart.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/000000/combo-chart.png" class="icon active-icon">
      <span>Relatórios</span>
    </button>

    <button class="nav-item" onclick="location.href='alertas_admin.php'">
      <img src="https://img.icons8.com/ios/50/000000/bell.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/000000/bell.png" class="icon active-icon">
      <span>Alertas</span>
    </button>

    <button class="nav-item" onclick="location.href='configuracoes_admin.php'">
      <img src="https://img.icons8.com/ios/50/000000/settings.png" class="icon default">
      <img src="https://img.icons8.com/ios-filled/50/000000/settings.png" class="icon active-icon">
      <span>Configurações</span>
    </button>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const camposPorTipo = {
  sensores: [
    { label: "ID do Sensor", name: "sensor_id", type: "text" },
    { label: "Localização", name: "sensor_localizacao", type: "text" },
    { label: "Status", name: "sensor_status", type: "text" }
  ],
  itinerarios: [
    { label: "Código do Itinerário", name: "iti_codigo", type: "text" },
    { label: "Origem", name: "iti_origem", type: "text" },
    { label: "Destino", name: "iti_destino", type: "text" },
    { label: "Horário (partida)", name: "iti_horario", type: "text" }
  ],
  trens: [
    { label: "Número do Trem", name: "trem_num", type: "text" },
    { label: "Capacidade", name: "trem_capacidade", type: "number" },
    { label: "Modelo", name: "trem_modelo", type: "text" }
  ],
  rotas: [
    { label: "Código da Rota", name: "rota_codigo", type: "text" },
    { label: "Trechos", name: "rota_trechos", type: "text" },
    { label: "Distância (km)", name: "rota_distancia", type: "number" }
  ],
  manutencoes: [
    { label: "Trem Alvo (nº)", name: "manut_trem", type: "text" },
    { label: "Tipo de Manutenção", name: "manut_tipo", type: "text" },
    { label: "Data Prevista", name: "manut_data", type: "date" },
    { label: "Descrição", name: "manut_descricao", type: "textarea" }
  ]
};

const tipoSelect = document.getElementById('tipoRel');
const camposDiv = document.getElementById('camposEspecificos');
const previewContent = document.getElementById('previewContent');
const form = document.getElementById('reportForm');
const successAlert = document.getElementById('successAlert');
const responsavelInput = document.getElementById('responsavel');

function limpar() { camposDiv.innerHTML = ''; tipoSelect.classList.remove('is-invalid'); }

tipoSelect.addEventListener('change', () => {
  limpar();
  const tipo = tipoSelect.value;
  if (!tipo || !camposPorTipo[tipo]) return;
  camposPorTipo[tipo].forEach(c => {
    const wrap = document.createElement('div');
    wrap.className = 'mb-3';
    const label = document.createElement('label');
    label.className = 'form-label';
    label.innerHTML = c.label + ' <span class="text-danger">*</span>';
    wrap.appendChild(label);
    if (c.type === 'textarea') {
      const ta = document.createElement('textarea');
      ta.className = 'form-control';
      ta.name = c.name;
      ta.required = true;
      ta.rows = 3;
      wrap.appendChild(ta);
    } else {
      const inp = document.createElement('input');
      inp.className = 'form-control';
      inp.type = c.type;
      inp.name = c.name;
      inp.required = true;
      wrap.appendChild(inp);
    }
    const invalid = document.createElement('div');
    invalid.className = 'invalid-feedback';
    invalid.textContent = 'Preencha este campo.';
    wrap.appendChild(invalid);
    camposDiv.appendChild(wrap);
  });
});

form.addEventListener('submit', (e) => {
  e.preventDefault();
  Array.from(form.querySelectorAll('.is-invalid')).forEach(el => el.classList.remove('is-invalid'));
  let ok = true;

  if (!responsavelInput.value.trim()) { responsavelInput.classList.add('is-invalid'); ok = false; }
  if (!tipoSelect.value) { tipoSelect.classList.add('is-invalid'); ok = false; }

  const inputs = camposDiv.querySelectorAll('input, textarea');
  inputs.forEach(inp => { if (inp.required && !inp.value.trim()) { inp.classList.add('is-invalid'); ok = false; } });

  if (!ok) return;

  const details = [];
  inputs.forEach(inp => { details.push(`${inp.name}: ${inp.value}`); });
  const now = new Date();
  previewContent.innerHTML = `
    <p class="mb-1"><strong>Data:</strong> ${now.toLocaleString('pt-BR')}</p>
    <p class="mb-1"><strong>Tipo:</strong> ${tipoSelect.options[tipoSelect.selectedIndex].text}</p>
    <p class="mb-0"><strong>Responsável:</strong> ${responsavelInput.value}</p>
    <p class="mt-2 mb-0"><strong>Detalhes:</strong><br>${details.join('<br>')}</p>
  `;

  successAlert.classList.remove('d-none');
  setTimeout(() => successAlert.classList.add('d-none'), 3000);
  form.reset();
  limpar();
});
</script>

</body>
</html>
