<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de mensagem e nome estão definidos
    if (isset($_POST["mensagem"]) && isset($_POST["nome"])) {
        // Obtém os valores dos campos de mensagem e nome
        $mensagem = $_POST["mensagem"];
        $nome = $_POST["nome"];

        // Faça o processamento adicional que você desejar com os dados recebidos

        // Exemplo: salvar a mensagem em um arquivo de texto
        $conteudo = "" . $nome . ": " . $mensagem . "\n\n";
        file_put_contents("mensagens.txt", $conteudo, FILE_APPEND);

        // Você pode adicionar outras ações de processamento aqui

        // Redireciona de volta para a página do chat
        header("Location: index.php");
        exit();
    }
}
?>
