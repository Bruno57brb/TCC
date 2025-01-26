<?php
require_once "../conexao/conexao.php";
$conexao = conectar();

if (isset($_POST['CPF'])) {
    $cpf = $_POST['CPF'];
    $sql = "DELETE FROM alunos WHERE CPF = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $cpf);

    if ($stmt->execute()) {
        header("Location: ../alunos.php?excluido=1");
    } else {
        echo "Erro ao excluir aluno: " . $stmt->error;
    }
}
?>
