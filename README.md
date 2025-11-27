FerroviaX – Sistema Inteligente de Mobilidade Ferroviária

🎯 Objetivo do projeto

Desenvolver um sistema inteligente de mobilidade urbana voltado ao monitoramento de linhas férreas e à comunicação rápida com usuários, fornecendo alertas, notificações, localização de trens e funcionalidades para administração do sistema.

📌 Contexto

O projeto foi criado para atender a desafios de mobilidade urbana, permitindo maior segurança, acessibilidade e eficiência no transporte ferroviário. O sistema conta com interfaces específicas para usuários e administradores, integradas a um back-end responsável por gerenciar alertas, avaliações e dados operacionais.

✨ Funcionalidades principais

1. Visualização de alertas em tempo real por linha ferroviária.
2. Painel do administrador para criação e envio de alertas aos usuários.
3. Sistema de avaliação do app (com 5 estrelas).
4. Cadastro e login responsivos.
5. Tela de saldo inspirada no padrão Uber.
6. Busca de endereço com atualização dinâmica do mapa.
7. Interface mobile-first otimizada para diferentes tamanhos de tela.
8. Gerenciamento de usuários, alertas e avaliações no banco de dados.

🛠️ Tecnologias utilizadas

Front-end
1. HTML5
2. CSS3 (Mobile First)
3. JavaScript

Back-end
1. PHP (versão 7+ ou 8+)
2. MySQL / MariaDB

Infraestrutura

1. XAMPP / Apache
2. Git + GitHub
3. MQTT (para comunicação entre placas, caso aplicável)
4. ESP32 / Arduino IDE (para placas físicas do sistema da SA)

👥 Equipe de desenvolvimento

-Matheus Alves Bohrer
-Cauã Matheus Chupel
-Felipe Lucas Bauer dos Reis

```
📂 Estrutura do repositório
/FerroviaX
│
├── css/
│   ├── alertas.css
│   ├── cartao.css
│   └── configuracoes.css
│   ├── diretrizes.css
│   ├── familia.css
│   ├── historico.css
│   ├── manutencao.css
│   ├── mensagens.css
│   ├── promocoes.css
│   ├── rotas.css
│   ├── saldo.css
│   ├── telainicial.css
│   ├── telaopcao.css
│   ├── usuario.css

├── imagens/
│   ├── perfil_usuarios/
│   ├── analize.png
│   ├── confirmacao.png
│   ├── FerroviaPreto.png
│   ├── FerroviaX.png
│   ├── foto_padrão.png
│   ├── image.png
│   ├── local.png
│   ├── logoBranca.png
│   ├── manutencao.png
│   ├── ModeloConnectMySQL.png
│   ├── perfil.png
│   ├── rotas2.png
│   ├── suport.png
│   ├── trem-branco-cinza.png
│   ├── trem-preto(branco).png

│
├── interface_admins/
│   ├── alertas_admin.php
│   ├── avaliacoes_admin.php
│   ├── configuracoes_admin.php
│   ├── geral_admin.php
│   ├── relatorios_admin.php

│
├── interface_usuarios/
  ├─ alertas.php
  ├─ configuracoes.php
  ├─ diretrizes.php
  ├─ familia.php
  ├─ geral.php
  ├─ historico.php
  ├─ manutencao.php
  ├─ perfil.php
  ├─ promocoes.php
  ├─ saldo.php
  ├─ sobre.php
  ├─ suporte.php
  └─ usuario.php
│
├── php/
  ├─ api_rotas.php
  ├─ bd.php
  ├─ buscar.php
  ├─ salvar_avaliacao.php
  ├─ telaconfirmacao.php
  ├─ telainicial.php
  ├─ telalogin.php
  ├─ telaopcao.php
  ├─ telaregistro.php
│
├── sql/
  ├─ ferroviax.sql
  ├─ popular_banco.sql
  └─ trem.sql
│
├── uploads/
│  ...
│
├── README.md
└── index.php
```
📄 Licença

Este projeto está licenciado sob a MIT License.
Sinta-se livre para usar, modificar e distribuir conforme necessário.

ℹ️ Informações complementares

1. O projeto utiliza arquitetura responsiva focada em mobile.
2. O painel do administrador e o painel do usuário possuem permissões distintas.
3. Parte do sistema foi desenvolvido como projeto acadêmico dentro de uma Situação de Aprendizagem (SA).
