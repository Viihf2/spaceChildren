<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Cadastro do Responsável</title>
  <link rel="stylesheet" href="/css/style.css">
  <style>


    .cadastro {
      position: relative;
      width: 30%;
      padding: 0 1px;
      padding-bottom: 10px;
      margin-top: 50px;
      margin-left: 200px;
      border: 2px solid #5ce1e6;
      border-radius: 40px;
      background-image: linear-gradient(to left, #5ce1e6, #8c52ff);
      color: #737373;
      align-itens: center;
      background-color: #d9d9d9;
      border: 4px solid #5ce1e6;
      border-radius: 60px;
      overflow: hidden;
    }

    .cadastro ul {
      list-style: none;
      padding: 10px;
    }

    .cadastro li {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      flex-direction: column;
      text-align: center;
    }

    .cadastro figure {
      display: flex;
      align-items: center;
      margin-right: 10px;
    }

    .cadastro figure img.logo {
      width: 150px;
      height: 100px;
      border-radius: 50%;
      margin-right: 5px;
    }

    .cadastro .cadastro-info {
      display: inline-block;
      padding: 7px;
      margin-top: 5px;
      border-radius: 50px;
    }

    .cadastro .cadastro-info input {
      width: 250px;
      padding: 10px;
      border-radius: 50px;
      background-color: #d9d9d9;
      border: 1px solid #d9d9d9;
      text-align: center;
    }

    .btn-cadastrar {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #02fefe;
      border: 2px solid #d9d9d9;
      border-radius: 50px;
      color: #020303;
      font-size: 16px;
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
  <section class="cadastro">
  <form action="insert.php" method="POST">
    <ul>
      <li>
        <figure>
          <img src="/img/logo.png" alt="Logo" class="logo">
        </figure>
        <span class="cadastro-info">
          <input type="text" placeholder="Insira seu nome" class="cadastro-input" name="nome" autocomplete="off" required>
        </span>
        <span class="cadastro-info">
          <input type="date" placeholder="Data de nascimento" class="cadastro-input" name="nasc" autocomplete="off" required>
        </span>
        <span class="cadastro-info">
          <input type="email" placeholder="Insira seu email" class="cadastro-input" name="email" autocomplete="off" required>
        </span>
        <span class="cadastro-info">
          <input type="password" placeholder="Insira sua senha" class="cadastro-input" name="senha" autocomplete="off" required>
        </span>
        <button class="btn-cadastrar" type="submit" id="meuBotao"><b>Cadastrar</b></button>
        <a href="/login/logar.php" class="link-entrar"><b>Entrar</b></a>
      </li>
    </ul>
  </section>
</body>
</html>