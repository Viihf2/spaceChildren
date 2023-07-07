<?php
   session_start();

    if (!isset($_SESSION['email'])) {
      // Se o usuário não estiver logado, redirecioná-lo para a página de login
      header("Location: /login/logarDepen.php");
    }

$emailDep = $_POST['email'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$nasc = $_POST['datanasc'];
$senha = $_POST['senha'];
$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
$login = $_SESSION['email'];
$update = "UPDATE dep SET nomeDep = '$nome', emailDep = '$email', nascDep = '$nasc', senhaDep = '$senha' WHERE emailDep = '$emailDep' AND email_resp = '$login'"; 
$result = mysqli_query($conn, $update);
$row = mysqli_fetch_assoc($result);


// Consulta SQL para buscar os dependentes do usuário logado
$query_depen = "SELECT emailDep, email_resp FROM dep WHERE email_resp = '$login'";
$result_depen = mysqli_query($conn, $query_depen); 


if (mysqli_query($conn, $update))
{
    header("Location: /alert/atsucess2.html");
} else{
    
    header("Location: /alert/errodado2.html");
}
?>