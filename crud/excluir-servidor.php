<?php

require_once "../conexao/conexao.php";
$conexao = conectar();

if (isset($_POST['SIAPE'])) {  // Alterado CPF para SIAPE
    $siape = $_POST['SIAPE'];
    $sql = "DELETE FROM usuario WHERE SIAPE = ?";  // Alterado CPF para SIAPE
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $siape);  // "s" indica que SIAPE é uma string

    if ($stmt->execute()) {
        header("Location: editar-perfil-usuario.php?excluido=1");
    } else {
        echo "Erro ao excluir usuario: " . $stmt->error;
    }
}

?>
