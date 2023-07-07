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

.login {
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

.login ul {
  list-style: none; /* Remover marcadores da lista */
  padding: 10px; /* Espaçamento interno da lista */
}
    
.login li {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  flex-direction: column; /* Alinha os itens em coluna */
  text-align: center; /* Centraliza o conteúdo */
}

.login figure {
  display: flex;
  align-items: center;
  margin-right: 10px;
}

.login figure img.logo {
  width: 200px;
  height: 140px;
  border-radius: 50%;
  margin-right: 5px;
}

.login .login-info {
  display: inline-block;
  padding: 7px;
  margin-top: 5px;
  border-radius: 50px;
}

.login .login-info input {
  width: 250px;
  padding: 7px;
  border-radius: 50px;
  background-color: #d9d9d9;
  border: 1px solid #d9d9d9;
  text-align: center;
}

.btn-entrar {
  margin-top: 20px;
  padding: 10px 40px;
  background-color: #02fefe;
  border: 2px solid #d9d9d9;
  border-radius: 50px;
  color: #020303;
  font-size: 16px;
  cursor: pointer;
}

.link-cadastrar {
  margin-top: 25px;
  color: white;
  text-decoration: none;
  font-size: 22px;
}

</style>
</head>

<body>
  <section class="login">
    <form action="loginDepen.php" method="POST">
      <ul>
        <li>
          <figure>
            <img src="/img/logo.png" alt="Logo" class="logo">
          </figure>
          <span class="login-info">
            <input type="text" placeholder="Insira seu email" class="login-input" name="emailDep" autocomplete="off" required>
          </span>
          <span class="login-info">
            <input type="password" placeholder="Insira sua senha" class="login-input" name="senhaDep" autocomplete="off" required>
          </span>
          <button class="btn-entrar"><b>Logar Dependente</b></button>
          <a href="/cadastro/cadastro.php" class="link-cadastrar"><b>Cadastre-se!</b></a>
        </li>
      </ul>
    </form>
  </section>
</body>

</html>