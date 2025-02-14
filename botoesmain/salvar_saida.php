
<?php
include '../conexao/conexao.php'; // Inclua sua conexão ao banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtendo os dados do formulário
  
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $motivo = $_POST['motivo'];
    $cpf = $_POST['cpf'];
    $tipo = $_POST['tipo'];


 


    // Conectando ao banco de dados
    $conexao = conectar();

 
    $stmt = $conexao->prepare("INSERT INTO registros ( data, horario,   motivo, cpf_aluno, tipo) VALUES (?, ?, ?, ?,  ?)");
    if ($stmt === false) {
        die('Erro ao preparar a query: ' . $conexao->error);
    }

    // Bind dos parâmetros
    $stmt->bind_param('sssss',  $data, $horario,   $motivo, $cpf, $tipo); // Alterado para incluir dois parâmetros adicionais

    // Executa a query
    if ($stmt->execute()) {
        echo "Saida registrada com sucesso!";
    } else {
        echo "Erro ao registrar saida: " . $stmt->error;
    }

    // Fecha o statement e a conexão
    $stmt->close();
    $conexao->close();
}
?>
