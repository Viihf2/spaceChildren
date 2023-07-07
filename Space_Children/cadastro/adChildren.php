<style>
.alerta {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: RGB(138, 43, 226);
  display: flex;
  justify-content: center;
  align-items: center;
}

.alerta-box {
  width: 400px;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  text-align: center;
  border-radius: 10px;
  font-family: Arial, sans-serif;
}
</style>

<?php

   session_start();

   if (!isset($_SESSION["email"])) {
      // Se o usuário não estiver logado, redirecioná-lo para a página de login
      header("Location: /login/logarDepen.php");
      exit();
   }

$nomeD = $_POST['nomeD'];
$nascD = $_POST['nascD'];
$emailD = $_POST['emailD'];
$senhaD = $_POST['senhaD'];
$connect = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5");
$db = mysqli_select_db($connect, 'epiz_32954395_space');
$email = $_SESSION['email'];

if($emailD == "" || $emailD == null){
  header("Location: /alert/null2.html");
  exit();
}else{
  $query = "SELECT emailDep FROM dep WHERE emailDep = '$emailD'";
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_assoc($result);
  if($row){
    header("Location: /alert/exit.html");
    exit();
  }else{
    $query = "INSERT INTO dep (nomeDep, nascDep, emailDep, senhaDep, email_resp) VALUES ('$nomeD', '$nascD', '$emailD', '$senhaD', '$email')";
    $insert = mysqli_query($connect, $query);

    if($insert){
      header("Location: /alert/sucess2.html");
      exit();
    }else{
      header("Location: /alert/nfp2.html");
      exit();
    }
  }
}
?>
