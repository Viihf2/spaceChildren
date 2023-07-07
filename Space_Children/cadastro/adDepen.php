<?php

   session_start();

   if (!isset($_SESSION["email"])) {
      // Se o usuário não estiver logado, redirecioná-lo para a página de login
      header("Location: /login/logar.php");
      exit();
   }

$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
$email = $_SESSION['email'];
$query = "SELECT emailResp FROM resp WHERE emailResp = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result); 
$emailR = $row['emailResp']; 

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Cadastro do Responsável</title>
  <!--<link href="style.css" rel="stylesheet" type="text/css" />-->
  <style>

  body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  position: relative;
  background: linear-gradient(to left, #004aad, #5de0e6); /* Adicione a cor gradiente aqui */
}

  section {
  display: inline-block;
  vertical-align: top;
  margin-right: 100px;
  margin-top: -100px;
  padding: 5px;
  border: 2px solid #5ce1e6;
  border-radius: 40px;
  background-image: linear-gradient(to left, #5ce1e6, #8c52ff);
  color: #737373;
  align-itens: center;
}

.cadastroDepen {
  position: relative;
  width: 30%;
  padding: 0 1px;
  padding-bottom: 10px;
  margin-top: 50px;
  margin-left: 200px;
  background-color: #d9d9d9; /* Cor de fundo da caixa de texto */
  border: 4px solid #5ce1e6; /* Borda da caixa de texto */
  border-radius: 60px; /* Arredonda os cantos da caixa de texto */
  overflow: hidden; /* Esconder conteúdo que ultrapasse a área do section */
}

.cadastroDepen ul {
  list-style: none; /* Remover marcadores da lista */
  padding: 10px; /* Espaçamento interno da lista */
}
    
.cadastroDepen li {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  flex-direction: column; /* Alinha os itens em coluna */
  text-align: center; /* Centraliza o conteúdo */
}

.cadastroDepen figure {
  display: flex;
  align-items: center;
  margin-right: 10px;
}

.cadastroDepen figure img.logo {
  width: 150px;
  height: 100px;
  border-radius: 50%;
  margin-right: 5px;
}

.cadastroDepen .cadastroDepen-info {
  display: inline-block; /* Torna o elemento um bloco inline */
  padding: 7px;
  margin-top: 5px;
  border-radius: 50px;
}

.cadastroDepen .cadastroDepen-info input {
  width: 250px;
  padding: 10px;
  border-radius: 50px;
  background-color: #d9d9d9;
  border: 1px solid #d9d9d9;
  text-align: center;
}

.btn-cadastrarDepen {
  margin-top: 20px;
  padding: 10px 30px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 14px;
  cursor: pointer;
}

.link-entrar {
  margin-top: 25px;
  color: white;
  text-decoration: none;
  font-size: 22px;
}

</style>
</head>

<body>
<section class="cadastroDepen">
<form action="adChildren.php" method="POST">
  <ul>
    <li>
      <figure>
        <img src="/img/logo.png" alt="Logo" class="logo">
      </figure>
           <!--<p>Email do Responsável: <?php echo $emailR; ?></p>-->
      <span class="cadastroDepen-info">
        <input type="text" placeholder="Insira o nome do dependente" class="cadastro-input" name="nomeD" autocomplete="off" required>
      </span>
       <span class="cadastroDepen-info">
        <input type="date" placeholder="Data de nascimento do dependente" class="cadastro-input" name="nascD" autocomplete="off" required> 
      </span>
      <span class="cadastroDepen-info">
        <input type="email" placeholder="Insira o email do dependente" class="cadastro-input" name="emailD" autocomplete="off" required>
      </span>
      <span class="cadastroDepen-info">
        <input type="password" placeholder="Insira a senha do dependente" class="cadastro-input" name="senhaD" autocomplete="off" required>
      </span>
      <button class="btn-cadastrarDepen" type="submit" id="meuBotao"><b>Cadastrar</b></button>
      <a href="/cadastro/adChilden.php" class="link-entrar"><b>Entrar</b></a>
    </li>
  </ul>
</section>
</body>
