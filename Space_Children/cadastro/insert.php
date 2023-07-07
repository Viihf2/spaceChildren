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
error_reporting(E_ALL);
ini_set('display_errors', 1);

$ID = $_POST['ID'];
$nome = $_POST['nome'];
$login = $_POST['email'];
$nasc = $_POST['nasc'];
$senha = $_POST['senha'];

$connect = mysqli_connect('sql306.epizy.com', 'epiz_32954395', 'Gw0vaOuUa5');
$db = mysqli_select_db($connect, 'epiz_32954395_space');
$query_select = "SELECT emailResp FROM resp WHERE emailResp = '$login'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['emailResp'];

// verifica se a data de nascimento é anterior a 18 anos atrás
$idade_minima = date('Y-m-d', strtotime('-18 years'));
if ($nasc > $idade_minima) {
  header("Location: /alert/menor.html");
  exit();
}

if ($login == "" || $login == null) {
  header("Location: /alert/null.html");
  exit();
} else {
  if ($logarray == $login) {
    header("Location: /alert/exist.html");
    exit();
  } else {
    $query = "INSERT INTO resp (nomeResp, emailResp, nascResp, senhaResp) values('$nome', '$login', '$nasc', '$senha')";
    $insert = mysqli_query($connect, $query);

    if ($insert) {
      header("Location: /alert/sucess.html");
      exit();
    } else {
      header("Location: /alert/nfp.html");
      exit();
    }
  }
}
?>
