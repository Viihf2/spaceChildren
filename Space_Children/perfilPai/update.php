<?php
session_start();

if (!isset($_SESSION['email'])) {
  // Se o usuário não estiver logado, redirecioná-lo para a página de login
  header("Location: /login/logar.php");
  exit();
}

$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
if (!$conn) {
  die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

$login = $_SESSION['email'];
$nome = $_POST['nomeResp'];
$email = $_POST['emailResp'];
$nasc = $_POST['datanasc'];
$senha = $_POST['senha'];
$update = "UPDATE resp SET nomeResp = '$nome', emailResp = '$email', nascResp = '$nasc', senhaResp = '$senha' WHERE emailResp = '$login'";

if (!mysqli_query($conn, $update)) {
  header("Location: /alert/errodado.html");
}

header("Location: /alert/atsucess.html");
exit();
?>