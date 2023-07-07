<?php
// Conexão com o banco de dados
$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");

// Recebe os dados do formulário
$email = $_POST["emailDep"];
$senha = $_POST["senhaDep"];

// Verifica se o usuário existe no banco de dados
$query = "SELECT * FROM dep WHERE emailDep = '$email' AND senhaDep = '$senha'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
  // O usuário existe, iniciar sessão
  session_start();
  $_SESSION["emailDep"] = $email;
  header("Location: /menu/menu.php");
  exit();
} else {
  // O usuário não existe, exibir mensagem de erro
  header("Location: /alert/incorreto2.html");
  exit();
}
?>
