<?php
// Verifica se os dados foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados
    $conexao = new mysqli("localhost", "seu_usuario", "sua_senha", "pesquisa_satisfacao");

    // Verifica se a conexão foi bem sucedida
    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    // Obtém os valores do formulário
    $opcao = $_POST["opcao"];
    $comentario = $_POST["comentario"];

    // Prepara e executa a query SQL para inserir os dados
    $sql = "INSERT INTO resultados_pesquisa (opcao, comentario) VALUES ('$opcao', '$comentario')";

    if ($conexao->query($sql) === TRUE) {
        echo "Pesquisa submetida com sucesso!";
    } else {
        echo "Erro ao submeter a pesquisa: " . $conexao->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>
