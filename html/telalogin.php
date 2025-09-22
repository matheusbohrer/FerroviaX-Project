 <?php
  require "bd.php";

  session_start();

  if (isset($_SESSION["nome_usuario"])) {
    header("Location: usuario.php");
    exit;
  }

  $erro = "";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $senha = trim($_POST["senha"] ?? "");

    $stmt = $conn->prepare("SELECT pk_usuario, nome_usuario, senha_usuario FROM usuario WHERE email_usuario = ? AND senha_usuario= ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
      $dados = $resultado->fetch_assoc();
      $_SESSION["nome_usuario"] = $dados["nome_usuario"];
      $_SESSION["usuario_id"] = $dados["pk_usuario"];
      $_SESSION["conectado"] = true;


      header("Location: geral.php");
      exit;
    } else {
      $erro = "E-mail ou senha inválidos.";
    }
  } ?>
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
       <button type="submit">Entrar</button>
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