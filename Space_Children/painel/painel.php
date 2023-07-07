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
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="icon" href="/img/logo.png">
  <title>Painel do Responsável</title>
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
      padding: 4px;
      align-items: center;
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

    #conf {
      position: absolute;
      top: 0;
      right: 0;
      width: 80px;
      height: 50px;
      margin: 10px;
      border-radius: 50%;
    }

#perfil {
  margin-top: 50px;
  padding: 10px;
  display: flex;
  align-items: center;
  color: white;
  font-size: 40px;
}

#perfil img {
  width: 100px;
  height: 100px;
  margin-right: 10px;
  border-radius: 10%;
}

#perfil h3 {
  margin-left: 10px;
}

    
    .painel {
      position: relative;
      width: 60%;
      padding: 10px;
      padding-bottom: 1px;
      margin-top: 50px;
      margin-left: 100px;
      background-image: linear-gradient(to left, #5ce1e6, #8c52ff); /* Cor de fundo da caixa de texto */
      border: 3px solid #5ce1e6; /* Borda da caixa de texto */
      border-radius: 40px; /* Arredonda os cantos da caixa de texto */
      overflow: hidden; /* Esconder conteúdo que ultrapasse a área do section */
    }

    .painel ul {
      list-style: none; /* Remover marcadores da lista */
      padding: 20px; /* Espaçamento interno da lista */
      display: flex; /* Exibir os itens em linha */
      justify-content: space-around; /* Espaçamento igual entre os itens */
    }

    .painel li {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      text-align: center; /* Centraliza o conteúdo */
    }

    .painel .painel-info {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      margin-top: 20px;
    }

    .painel .painel-info img {
      width: 170px;
      height: 150px;
    }

     @media (max-width: 768px) {
      .painel {
        width: 90%;
        margin-left: 10px;
        margin-right: 10px;
      }
        
  </style>
</head>

<body>
  <a href="index.php"
  <figure>
    <img src="/img/logo.png" alt="Logo" id="logo">
  </figure>
  </a>

  <body>
  <a href="index.html"
  <figure>
    <img src="/img/conf.png" alt="Conf" id="conf">
  </figure>
  </a>
    
  <section id="perfil">
    <img src="/img/perfil.png" alt="Perfil">
    <h3><?php echo $name; ?></h3>
  </section>
  
  <section class="painel">
    <ul>
      <li>
      <a href="/perfilPai/dashboard.php"
        <span class="painel-info">
            <img src="/img/iconDepen.png" alt="Logo">
        </span>
        </a>
        <span class="painel-info">
          <img src="/img/iconLoca.png" alt="Logo">
        </span>
        <span class="painel-info">
          <img src="/img/iconHist.png" alt="Logo">
        </span>
        <span class="painel-info">
          <img src="/img/iconConfig.png" alt="Logo">
        </span>
      </li>
    </ul>
  </section>
  
</body>

</html>