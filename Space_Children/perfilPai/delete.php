<?php
session_start();

if (!isset($_SESSION["email"])) {
  // Se o usuário não estiver logado, redirecioná-lo para a página de login
  header("Location: /login/logar.php");
  exit();
}

$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
$login = $_SESSION['email'];

// Verificar se o responsável existe na tabela resp
$query_resp = "SELECT emailResp FROM resp WHERE emailResp = '$login'";
$result_resp = mysqli_query($conn, $query_resp);

if (mysqli_num_rows($result_resp) == 0) {
  die('<br>Error: Registro do responsável não encontrado');
}

// Deletar a conta do responsável
$delete_resp = "DELETE FROM resp WHERE emailResp = '$login'";
if (!mysqli_query($conn, $delete_resp)) {
  die('<br>Error: Erro ao excluir a conta do responsável: ' . mysqli_error($conn));
}

// Deletar as contas dos dependentes relacionados
$delete_dep = "DELETE FROM dep WHERE email_resp = '$login'";
if (!mysqli_query($conn, $delete_dep)) {
  die('<br>Error: Erro ao excluir as contas dos dependentes: ' . mysqli_error($conn));
}

// Redirecionar para a página de login após a exclusão
header("Location: /alert/delete.html");
exit();
?>