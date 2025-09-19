<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - FerroviaX</title>
  <link rel="stylesheet" href="../css/telalogin.css">
</head>

<body>
  <div class="container">
    <img src="../imagens/logoBranca.png" alt="FerroviaX Logo">
    <h1>Bem-vindo de volta!</h1>
    <p>Entre com sua conta para continuar</p>
    <form id="login-form">
      <input id="email" type="email" placeholder="E-mail" required />
      <input id="senha" type="password" placeholder="Senha" required />
      <button type="button" onclick="validarLogin()">Entrar</button>
    </form>

    <script>
      function validarLogin() {
        const email = document.getElementById('email').value.trim();
        const senha = document.getElementById('senha').value.trim();

        if (email && senha) {
          location.href = 'geral.html';
        } else {
          alert('Por favor, preencha todos os campos antes de continuar.');
        }
      }
    </script>


    <div class="login-link">
      Ainda não tem uma conta? <a href="telaregistro.php">Registrar</a>
    </div>
  </div>
</body>

</html>