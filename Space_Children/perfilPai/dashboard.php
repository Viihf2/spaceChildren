<style>
td form {
  display: inline;
  margin-right: 5px;
}

/* Estilo para o botão de adicionar filho */
input[name="BTAdfilho"] {
  margin-top: 20px;
  padding: 2px 10px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 12px;
  cursor: pointer;
}

input[name="BTAdfilho"]:hover {
  background-color: #d9d9d9;
}

/* Estilo para o botão de adicionar filho */
input[name="BTAtualizar"] {
  margin-top: 20px;
  padding: 2px 10px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 12px;
  cursor: pointer;
}

input[name="BTAtualizar"]:hover {
  background-color: #d9d9d9;
}

/* Estilo para o botão de adicionar filho */
input[name="BTDeletar"] {
  margin-top: 20px;
  padding: 5px 15px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 12px;
  cursor: pointer;
}

input[name="BTDeletar"]:hover {
  background-color: #d9d9d9;
}

/* Estilo para o botão de adicionar filho */
input[name="BTLogout"] {
  margin-top: 20px;
  padding: 5px 15px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 12px;
  cursor: pointer;
}

input[name="BTLogout"]:hover {
  background-color: #d9d9d9;
}

input[name="BTAddepen"] {
  margin-top: 20px;
  padding: 5px 15px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 12px;
  cursor: pointer;
  align-itens: right;
}

input[name="BTAddepen"]:hover {
  background-color: #d9d9d9;
}

input[name="BTAtdepen"] {
  margin-top: 20px;
  padding: 5px 15px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 12px;
  cursor: pointer;
}

input[name="BTAtdepen"]:hover {
  background-color: #d9d9d9;
}

input[name="BTDeldepen"] {
  margin-top: 20px;
  padding: 5px 15px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 12px;
  cursor: pointer;
}

input[name="BTDeldepen"]:hover {
  background-color: #d9d9d9;
}

</style>

<?php

   session_start();

   if (!isset($_SESSION["email"])) {
      // Se o usuário não estiver logado, redirecioná-lo para a página de login
      header("Location: /login/logar.php");
      exit();
   }

$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
$email = $_SESSION['email'];
$query = "SELECT nomeResp FROM resp WHERE emailResp = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$name = $row['nomeResp']; 
#$email = $row['email']; 

// Consulta SQL para buscar os dependentes do usuário logado
$query_depen = "SELECT nomeDep, emailDep, senhaDep, nascDep FROM dep WHERE email_resp = '$email'";
$result_depen = mysqli_query($conn, $query_depen);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="/img/logo.png">
  <title>Perfil do Responsável</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      position: relative;
      background: linear-gradient(to left, #004aad, #5de0e6);
      color: white;
    }

    #logo {
        position: absolute;
        top: 0;
        left: 0;
        width: 80px;
        height: 50px;
        margin: 10px;
        border: 1px solid #5ce1e6;
        border-radius: 360px;
        animation-name: mudarcorvoltando;
        animation-duration: 2s;
    }

    /* Animação logo indo */
    @keyframes mudarcorindo {
    from {
        border-color: #5ce1e6;
    }
    to {
        border-color: white;
    }
    }

    /* Animação logo voltando */
    @keyframes mudarcorvoltando {
    from {
        border-color: white;
    }
    to {
        border-color: #5ce1e6;
    }
    }

    #logo:hover {
        width: 80px;
        height: 50px;
        border: 1px solid white;
        border-radius: 360px;
        animation-name: mudarcorindo;
        animation-duration: 2s;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .profile-wrapper {
      display: flex;
      justify-content: flex-end;
    }

    .profile-pic img {
      max-width: 200px;
    }

    .profile-pic {
        margin-top: 50px;
        padding: 10px;
        display: flex;
        align-items: center;
        color: white;
        font-size: 40px;
    }

    .profile-pic h3 {
    margin-left: 10px;
    }

    .profile-buttons {
      display: inline-block;
      margin-top: -160px;
      margin-left: 2000px;
      top: 0;
      right: 0;
    }

    .user-info {
      margin-top: 10px;
    }

    .user-info h2 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .user-info p {
      font-size: 18px;
      margin-bottom: 5px;
    }

    .panel {
      display: inline-block;
      width: 900px;
      vertical-align: top;
      margin-left: -60px;
      margin-top: 5px;
      padding: 50px;
      border: 2px solid #5ce1e6;
      border-radius: 20px;
      background-image: linear-gradient(to left, #5ce1e6, #8c52ff);
      color: white;
      align-itens: center;
    }

    .panel table {
      width: 100%;
    }

    .panel th,
    .panel td {
      padding: 10px;
      text-align: center;
    }

    /* Estilo para o botão de ações */
    .action-button {
      padding: 5px 15px;
      background-color: #02fefe;
      border: 2px solid #d9d9d9;
      border-radius: 50px;
      color: #020303;
      font-size: 12px;
      cursor: pointer;
      margin-right: 5px;
    }

    .action-button:hover {
      background-color: #d9d9d9;
    }

    .cadasDep {
        margin-top: -20px;
        align-items: right;
    }
  </style>
</head>
<body>
    <a href="/index.php">
  <figure>
    <img src="/img/logo.png" alt="Logo" id="logo">
  </figure>
  </a>
  <div class="container">
    <section class="profile-pic">
      <img src="/img/perfil.png" alt"imagem de perfil">
      <h3><?php echo $name; ?></h3>
    </section>
    <div class="profile-wrapper">
      <section class="profile-buttons">
        <form action="atDados.php" method="POST">
          <input type="Submit" name="BTAtualizar" value="Atualizar Dados">
        </form>
        <form action="deletarConta.php" method="POST">
          <input type="Submit" name="BTDeletar" value="Deletar Conta">
        </form>
        <form action="/login/logout.php" method="POST">
          <input type="Submit" name="BTLogout" value="Logout">
        </form>
      </section>
    </div>
    <section class="user-info">
      <p>Email: <?php echo $email; ?></p>
    </div>
    <br>
    <h2>Meus Dependentes</h2>
    <section class="panel">
      <?php if (mysqli_num_rows($result_depen) > 0) { ?>
        <table>
          <tr>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ações</th>
          </tr>
          <?php while ($row_depen = mysqli_fetch_assoc($result_depen)) { ?>
            <tr>
              <td><?php echo $row_depen['nomeDep']; ?></td>
              <td><?php echo $row_depen['nascDep']; ?></td>
              <td><?php echo $row_depen['emailDep']; ?></td>
              <td class="password-field"><?php echo str_repeat('*', strlen($row_depen['senhaDep'])); ?></td>
              <td>
                <form action="atDadosDep.php" method="POST">
                  <input type="hidden" name="emailDep" value="<?php echo $row_depen['emailDep']; ?>">
                  <input type="Submit" name="BTAtdepen" class="action-button" value="Atualizar Dependente">
                </form>
                <form action="deletarDep.php" method="POST">
                  <input type="hidden" name="emailDep" value="<?php echo $row_depen['emailDep']; ?>">
                  <input type="Submit" name="BTDeldepen" class="action-button" value="Deletar Dependente">
                </form>
                <button class="action-button" onclick="revealPassword('<?php echo $row_depen['senhaDep']; ?>', this)">Mostrar Senha</button>
              </td>
            </tr>
          <?php } ?>
        </table>
      <?php } else { ?>
        <p>Você ainda não adicionou nenhum dependente.</p>
      <?php } ?>
    </section>
    <br>
    <div class="cadasDep">
    <form action="/cadastro/adDepen.php" method="POST">
      <input type="Submit" name="BTAddepen" value="Adicionar Dependente">
    </form>
    </div>
  </div>
  <script>
    function revealPassword(password, button) {
      const passwordField = button.parentNode.previousElementSibling;
      if (passwordField) {
        passwordField.textContent = password;
      }
    }
  </script>
</body>
</html>