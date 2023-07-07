<?php
session_start();

if (!isset($_SESSION["email"])) {
   // Se o usuário não estiver logado, redirecioná-lo para a página de login
   header("Location: /login/logar.php");
   exit();
}

$emailResp = $_SESSION['email'];
$conn = mysqli_connect("sql306.epizy.com", "epiz_32954395", "Gw0vaOuUa5", "epiz_32954395_space");
if (!$conn) {
   die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

$query_depen = "SELECT emailDep FROM dep WHERE email_resp = '$emailResp'";
$result_depen = mysqli_query($conn, $query_depen);
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <link rel="icon" href="/img/logo.png">
      <title>Deletar Dependente</title>
      <style>
         body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
            background: linear-gradient(to left, #004aad, #5de0e6);
         }

         section {
            display: inline-block;
            vertical-align: top;
            margin-right: 100px;
            margin-top: -100px;
            padding: 4px;
            align-items: center;
         }

         #logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 80px;
            height: 50px;
            margin: 10px;
            border-radius: 50%;
         }

         .del {
            position: relative;
            width: 40%;
            padding: 20 20px;
            padding-bottom: 10px;
            margin-top: 50px;
            margin-left: 200px;
            border: 2px solid #5ce1e6;
            border-radius: 40px;
            background-image: linear-gradient(to left, #5ce1e6, #8c52ff);
            color: white;
            align-itens: center;
            background-color: #d9d9d9;
            border: 4px solid #5ce1e6;
            border-radius: 60px;
            overflow: hidden;
         }

         input[name="BTDel"] {
            margin-top: 20px;
            padding: 2px 10px;
            background-color: #02fefe;
            border: 2px solid #d9d9d9;
            border-radius: 50px;
            color: #020303;
            font-size: 12px;
            cursor: pointer;
         }

         input[name="BTDel"]:hover {
            background-color: #d9d9d9;
         }
      </style>
   </head>

   <body>
      <center>
         <form action="deleteDep.php" method="post">
            <a href="/index.html">
               <figure>
                  <img src="/img/logo.png" alt="Logo" id="logo">
               </figure>
            </a>

            <section class="del">
               <h2>Deletar Dependente</h2>

               <label for="dependente">Selecione o dependente:</label>
               <select name="emailDep" id="dependente">
                  <?php
                     while ($row_depen = mysqli_fetch_assoc($result_depen)) {
                        echo '<option value="' . $row_depen['emailDep'] . '">' . $row_depen['emailDep'] . '</option>';
                     }
                  ?>
               </select>

               <input type="submit" name="BTDel" value="Deletar">
            </section>
         </form>
      </center>
   </body>
</html>