<?php
  require "bd.php";

  session_start();

  $erro = "";

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
          $stmt = $conn->prepare("INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)");
          $stmt->bind_param("sss", $nome_usuario, $email, $hash);

          if ($stmt->execute()) {
            header("Location: telalogin.php");
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
   <link rel="stylesheet" href="../css/telaregistro.css">
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