<?php
require "bd.php";

session_start();

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["login"])) {
    $email = trim($_POST["email"] ?? "");
    $senha = trim($_POST["senha"] ?? "");

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE email_usuario = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();


    if ($resultado->num_rows === 1) {
      $dados = $resultado->fetch_assoc();
      $senha_armazenada_rash = $dados["senha_usuario"];

      if (password_verify($senha, $senha_armazenada_rash)) {

        $_SESSION["nome_usuario"] = $dados["nome_usuario"];
        $_SESSION["usuario_id"] = $dados["pk_usuario"];
        $_SESSION["email_usuario"] = $dados["email_usuario"];
        $_SESSION["conectado"] = true;
        $_SESSION["cargo"] = $dados["cargo"]; // Salva o cargo na sessão

        if ($dados["cargo"] == 1) {
          header("Location: ../interface_usuarios/geral.php");
        } elseif ($dados["cargo"] == 2) {
          header("Location: ../interface_admins/geral_admin.php");
        } elseif ($dados["cargo"] == 3) {
          header("Location: ../interface_maquinista/geral_maquinista.php");
        } else {
          $erro = "Cargo inválido.";
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - FerroviaX</title>
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

    img {
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

    .erro {
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
    <h1>Bem-vindo de volta!</h1>
    <p>Entre com sua conta para continuar</p>

    <form id="login-form" method="post">
      <input id="email" type="email" placeholder="E-mail" name="email" required />
      <input id="senha" type="password" placeholder="Senha" name="senha" required />
      <button type="submit" name="login">Entrar</button>
    </form>

    <div class="login-link">
      Ainda não tem uma conta? <a href="telaregistro.php">Registrar</a>
    </div>
    <?php if ($erro): ?>
      <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>
  </div>
</body>

</html>