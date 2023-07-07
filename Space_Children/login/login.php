<?php
// Conexão com o banco de dados
$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");

// Recebe os dados do formulário
$email = $_POST["email"];
$senha = $_POST["senha"];

// Verifica se o usuário existe no banco de dados
$query = "SELECT * FROM resp WHERE emailResp = '$email' AND senhaResp ='$senha'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
  // O usuário existe, iniciar sessão
  session_start();
  $_SESSION["email"] = $email;
  header("Location: /painel/painel.php");
} else {
  header("Location: /alert/incorreto.html");
}
?>
