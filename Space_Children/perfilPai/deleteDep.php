<?php

session_start();

   if (!isset($_SESSION["email"])) {
      // Se o usuário não estiver logado, redirecioná-lo para a página de login
      header("Location: /login/logar.php");
      exit();
   }

$emailDep = $_POST["emailDep"];
$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
$login = $_SESSION['email'];

// Consulta SQL para buscar os dependentes do usuário logado
$query_depen = "SELECT emailDep, email_resp FROM dep WHERE email_resp = '$login'";
$result_depen = mysqli_query($conn, $query_depen);

$delete = "DELETE FROM dep WHERE emailDep = '$emailDep' AND email_resp = '$login'";

if (mysqli_affected_rows($conn) === 0) {
    echo "<script>alert('Não foi possível excluir o dependente. Verifique se o email informado está correto.');</script>";
} else if (!mysqli_query($conn, $delete)) {
        die('<br>Error: Erro ao excluir o dependente. ' . mysqli_error($conn));
    } else{
        header("Location: /alert/delete2.html");
    }

?>