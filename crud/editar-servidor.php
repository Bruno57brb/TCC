<?php
require_once "../conexao/conexao.php";
$conexao = conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $SIAPE = mysqli_real_escape_string($conexao, $_POST['SIAPE']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);

    // Corrigindo a query SQL (removendo a vírgula extra)
    $sql = "UPDATE usuario SET 
                nome = '$nome', 
                email = '$email' 
            WHERE SIAPE = '$SIAPE'";

    if (mysqli_query($conexao, $sql)) {
        header("Location: editar-perfil-usuario.php?success=Usuario atualizado com sucesso");
    } else {
        echo "Erro ao atualizar usuario: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>
