<html>
  <head>
    <meta charset="UTF-8">
    <title>Atualizar Dados do Dependente</title>
    <style>
      body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      position: relative;
      background: linear-gradient(to left, #004aad, #5de0e6); /* Adicione a cor gradiente aqui */
      color: white;
       font-weight: bold;
    }

    section {
      display: inline-block;
      vertical-align: top;
      margin-right: 100px;
      margin-top: -100px;
      padding: 5px;
    }

    #logo {
      position: absolute;
      top: 0;
      left: 0;
      width: 80px;
      height: 50px;
      margin: 10px;
      border-radius: 50%;
    }

    .table {
      position: relative;
      width: 70%;
      padding: 10px;
      padding-bottom: 10px;
      margin-top: 50px;
      margin-left: 200px;
      border: 2px solid #5ce1e6;
      border-radius: 40px;
      background-image: linear-gradient(to left, #5ce1e6, #8c52ff);
      color: white;
      align-itens: center;
      background-color: #d9d9d9;
      border: 4px solid #5ce1e6;
      border-radius: 60px;
      overflow: hidden;
    }
    
    .table ul {
    list-style: none; /* Remover marcadores da lista */
    padding: 10px; /* Espaçamento interno da lista */
    }
    
    .table li {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    flex-direction: column; /* Alinha os itens em coluna */
    text-align: center; /* Centraliza o conteúdo */
    }

    .table .table-info {
    display: inline-block; /* Torna o elemento um bloco inline */
    padding: 5px;
    margin-top: 5px;
    border-radius: 50px;
    }

    .table .table-info input {
    width: 200px;
    padding: 10px;
    border-radius: 50px;
    background-color: #d9d9d9;
    border: 1px solid #d9d9d9;
    text-align: center;
    }

    .butt {
        align-itens: center;
    }

    input[name="BTAtual"] {
        margin-top: 20px;
        padding: 2px 15px;
        background-color: #02fefe;
        border: 2px solid #d9d9d9;
        border-radius: 50px;
        color: #020303;
        font-size: 12px;
        cursor: pointer;
    }

    input[name="BTAtual"]:hover {
        background-color: #d9d9d9;
    }



    input[name="BTVolta"] {
        margin-top: 20px;
        padding: 2px 10px;
        background-color: #02fefe;
        border: 2px solid #d9d9d9;
        border-radius: 50px;
        color: #020303;
        font-size: 12px;
        cursor: pointer;
    }

    input[name="BTVolta"]:hover {
        background-color: #d9d9d9;
    }

    </style>
  </head>
  <a href="/index.php"
  <figure>
    <img src="/img/logo.png" alt="Logo" id="logo">
  </figure>
  </a>
   <?php

session_start();

if (!isset($_SESSION["email"])) {
  // Se o usuário não estiver logado, redirecioná-lo para a página de login
  header("Location: /login/logar.php");
  exit();
}

$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
$login = $_SESSION['email'];
$query = "SELECT emailResp, nomeResp, nascResp, senhaResp FROM resp WHERE emailResp = '$login'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$emailResp = $row['emailResp'];
$nameRes = $row['nomeResp']; 
$nascResp = $row['nascResp'];
$passwRes = $row['senhaResp'];


?> 
    <center>
      <div style="background-color: linear-gradient">
        <font face="arial" color="#000000" size="03"></font>
        <form name="dados" method="post" action="update.php">
        <section class="table">
            <ul>
                <li>
                <h2>Atualizar</h2>
                <span class="table-info">
                    Nome:
                    <input type="text" size="30" name="nomeResp" autocomplete="off" required value="<?php echo $nameRes; ?>">
                </span>
                <span class="table-info">
                    Email:
                    <input type="text" size="30" name="emailResp" autocomplete="off" required value="<?php echo $emailResp; ?>">
                </span>
                <span class="table-info">
                    Data de nasc:
                    <input type="date" size="10" name="datanasc" autocomplete="off" required value="<?php echo $nascResp; ?>">
                </span>
                <span class="table-info">
                    Senha:
                    <input type="password" size="30" name="senha" autocomplete="off" required value="<?php echo $passwRes; ?>">
                </span>
                <span class="butt">
          <input type="submit" name="BTAtual" value="Atualizar"></form><form name="back" action="/perfilPai/dashboard.php"><input type="submit" name="BTVolta" value="Voltar"></form>
        </span>
                </li>
            </ul>
        </section>
      </div>
    </center>
  </body>
</html>