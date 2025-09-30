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
  <link rel="stylesheet" href="../css/telalogin.css">
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