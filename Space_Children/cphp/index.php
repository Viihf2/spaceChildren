<html>
<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chat - PHP</title>
    <link rel="icon" href="../img/icon.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>

    <style>

    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        position: relative;
        background: linear-gradient(to left, #004aad, #5de0e6);
    }
    
    section{
        display: inline-block;
        vertical-align: top;
        margin-right: 100px;
        margin-top: -100px;
        padding: 5px;
    }

    .tit{
        position: center;
        margin-top: -30px;
        top: 0;
        margin-left: -100px;
        align-items: center;
    }

    .logos{
        width: 15%;
        width: 20%;
        border: 1px solid #5ce1e6;
        border-radius: 360px;
        animation-name: mudarcorvoltando;
        animation-duration: 2s;
    }

    /* Animação logo indo*/
    @keyframes mudarcorindo {
    from {border-color: #5ce1e6;}
    to {border-color: white;}
    }

    /* Animação logo voltando */
    @keyframes mudarcorvoltando {
    from {border-color: white;}
    to {border-color: #5ce1e6;}
    }

    .logos:hover{
        width: 15%;
        width: 20%;
        border: 1px solid white;
        border-radius: 360px;
        animation-name: mudarcorindo;
        animation-duration: 2s;
    }

    .msg{
        position: center;
        width: 70%;
        height: 400px;
        padding: 0 1px;
        margin-top: 100px;
        margin-left: -100px;
        background-image: linear-gradient(to left, #5ce1e6, #8c52ff);
        color: white;
        border: 4px solid #5ce1e6; /* Borda da caixa de texto */
        border-radius: 20px; /* Arredonda os cantos da caixa de texto */
        overflow-y: auto; /* Adiciona uma barra de rolagem quando o conteúdo excede a altura */
        scrollbar-width: thin;
        scrollbar-color: #d9d9d9 transparent;
    }

        /* Estilo da seção do chat */
    .msg::-webkit-scrollbar {
        width: 8px;
    }

    .msg::-webkit-scrollbar-thumb {
        background-color: #d9d9d9;
        border-radius: 30px;
    }

    .msg::-webkit-scrollbar-track {
        background-color: transparent;
    }

    .formmsg{
        text-align: left;
        width: 70%;
        padding: 10px;
        border-radius: 20px;
        margin-top: 5px;
        margin-left: -100px;
        background-image: linear-gradient(to left, #5ce1e6, #8c52ff);
        border: 4px solid #5ce1e6; /* Borda da caixa de texto */
    }

    .text-info{
        display: inline-block;
        padding: 7px;
        margin-top: 5px;
        border-radius: 50px;
    }

    .text-info input {
        width: 270px;
        padding: 7px;
        border-radius: 50px;
        background-color: #d9d9d9;
        border: 1px solid #d9d9d9;
        text-align: center;
    }

    .text-info textarea {
        width: 220%;
        padding: 10px;
        border-radius: 50px;
        background-color: #d9d9d9;
        border: 1px solid #d9d9d9;
        text-align: center;
    }

    .btEnviar{
        background-image: url("/img/enviar.png");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width: 20%;
        padding: 20px;
        border: 2px solid #d9d9d9;
        border-radius: 20px;
        color: #020303;
        font-size: 14px;
        cursor: pointer;
    }

    </style>

</head>
<!-- Final do Head -->
<!-- Inicio do body -->
<body>

<!-- Inicio do container -->
<div class="container">

    <!-- Incio da row -->
    <div class="row">

        <!-- Inicio do col-md-5 -->
        <div class="col-md-5">

            <section class="tit">
                <a href="/index.php"><img src="/img/logo.png" class="logos"></a>
                <h2 class="TextosAparte"> <span id="TituloPrincipal"></span> Chat</h2>
            </section>
        </div>
        <!-- Final do col-md-5 -->

        <!-- Inicio do col-md-7 -->
        <div class="col-md-7">

            <!-- Divisão que renderiza o chat -->
            <section class="msg" id="msg">
                <?php
                // Carregar as mensagens salvas
                $mensagens = file_get_contents("mensagens.txt");
                // Dividir as mensagens em linhas
                $linhas = explode("\n", $mensagens);
                // Exibir cada mensagem em um parágrafo
                foreach ($linhas as $linha) {
                    echo "<p>" . $linha . "</p>";
                }
                ?>
            </section>

            <!-- Formulário de envios das mensagens -->
            <section class="formmsg" id="formmsg">
            <form action="action.php" method="POST">
            <span class="text-info">
                <textarea type="test" name="mensagem" id="msg" class="mensagem" placeholder="Digite sua mensagem aqui."></textarea><br>
            </span>
            <span class="text-info">
                <input type="text" name="nome" id="nome" class="digitarnome" placeholder="Digite Seu nome.">
            </span>
                <button class="btEnviar" type="submit" id="meuBotao"></button>
            </form>
            </section>

        </div>
        <!-- Final do col-md-7 -->

    </div>
    <!-- Final da row -->

</div>
<!-- Final do container -->

</body>
<!-- Final do body -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- /jQuery -->

<script type="text/javascript" src="../js/script.js"></script>

</html>