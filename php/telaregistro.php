<?php
require "bd.php";

session_start();

$erro = "";

$foto_padrao = "uploads/foto_12_1758981995.png";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST["registrar-se"])) { // Receber e sanitizar dados
    $nome_usuario = trim($_POST['nome_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    // Validações básicas
    if ($nome_usuario === '' || $email === '' || $senha === '') {
      $mensagem = 'Preencha todos os campos.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $mensagem = 'Email inválido.';
    } elseif (strlen($senha) < 6) {
      $mensagem = 'A senha deve ter pelo menos 6 caracteres.';
    } else {

      // Verificar se email ou nome de usuário já existem
      $stmt_check = $conn->prepare("SELECT pk_usuario FROM usuario WHERE email_usuario = ? OR nome_usuario = ?");
      $stmt_check->bind_param('ss', $email, $nome_usuario);
      $stmt_check->execute();
      $resultado = $stmt_check->get_result();

      if ($resultado->num_rows > 0) {
        $mensagem = 'Email ou nome de usuário já cadastrado.';
      } else {

        // Hash da senha (use PASSWORD_DEFAULT)
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir no banco com prepared statement
        $stmt = $conn->prepare("INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, foto_usuario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome_usuario, $email, $hash, $foto_padrao);

        if ($stmt->execute()) {
          header("Location: telaconfirmacao.php");
          exit;
        } else {
          $mensagem = "Erro ao registrar. Tente novamente.";
          $stmt_ins->close();
        }
      }
    }
  }
}

// fechar conexão no final do script
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrar - FerroviaX</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      box-sizing: border-box;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
      background-color: rgba(22, 22, 22, 0.83);
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 360px;
      text-align: center;
    }

    img,
    .logo-img {
      width: 220px;
      margin: 0 auto 20px auto;
      display: block;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    p {
      font-size: 14px;
      margin-bottom: 30px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 14px;
      margin-bottom: 15px;
      border: 1px solid #444;
      border-radius: 8px;
      background-color: #222;
      color: white;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      background-color: white;
      color: black;
      font-weight: 600;
      font-size: 14px;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 10px;
    }

    .login-link {
      margin-top: 15px;
      font-size: 14px;
    }

    .login-link a {
      color: #fff;
      font-weight: bold;
      text-decoration: none;
    }

    .erro,
    .mensagem {
      margin-top: 15px;
      color: #ff4d4d;
      background: #222;
      padding: 10px;
      border-radius: 8px;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="container">
    <img src="../imagens/logoBranca.png" alt="FerroviaX Logo">
    <h1>Bem-vindo!</h1>
    <p>Crie uma conta para continuar</p>
    <form id="registro-form" method="post">
      <input name="nome_usuario" type="text" placeholder="Nome" required />
      <input name="email" type="email" placeholder="E-mail" required />
      <input name="senha" type="password" placeholder="Senha" required />
      <button type="submit" name="registrar-se">Registrar-se</button>
    </form>

    <?php
    if (isset($mensagem)) {
      echo "<div class='mensagem'>$mensagem</div>";
    }
    ?>

    <div class="login-link">
      Já tem uma conta? <a href="telalogin.php">Entrar</a>
    </div>
  </div>
</body>

</html>