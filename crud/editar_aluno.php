<?php
require_once "../conexao/conexao.php";
$conexao = conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = mysqli_real_escape_string($conexao, $_POST['CPF']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $matricula = mysqli_real_escape_string($conexao, $_POST['matricula']);
    $turma = mysqli_real_escape_string($conexao, $_POST['turma']);
    $dataNasc = mysqli_real_escape_string($conexao, $_POST['dataNasc']);

    $sql = "UPDATE alunos SET 
                nome = '$nome', 
                email = '$email', 
                matricula = '$matricula', 
                turma = '$turma', 
                dataNasc = '$dataNasc' 
            WHERE CPF = '$cpf'";

    if (mysqli_query($conexao, $sql)) {
        header("Location: ../alunos.php?success=Aluno atualizado com sucesso");
    } else {
        echo "Erro ao atualizar aluno: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>
