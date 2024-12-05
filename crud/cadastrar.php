<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Cadastrar Usuário</title>
</head>
<body>
</body>
</html>

<?php
// Verificar se todos os dados foram enviados pelo formulário
if (isset($_POST['Nome'], $_POST['SIAPE'], $_POST['Email'], $_POST['Senha'], $_POST['Perfil'])) {
    // Receber os dados do formulário
    $Nome = $_POST['Nome'];
    $SIAPE = $_POST['SIAPE'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
    $Perfil = $_POST['Perfil'];

    // Conectar ao BD
    require_once "../conexao/conexao.php";
    $conexao = conectar();

    // Preparar a consulta para verificar se o usuário já existe
    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE SIAPE = ?");
    $stmt->bind_param("s", $SIAPE); // 's' indica que o parâmetro é uma string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário já cadastrado
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Erro ao cadastrar',
            text: 'Usuário já cadastrado.',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = '../cadastrar_usuario.php'; // Redireciona de volta para o formulário
        });
        </script>";
    } else {
        // Cadastrar no banco
        $sql = "INSERT INTO usuario (Nome, SIAPE, Email, Perfil, Senha) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssss", $Nome, $SIAPE, $Email, $Perfil, $Senha); // 'ssss' indica que todos os parâmetros são strings

        if ($stmt->execute()) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso! Usuário Cadastrado',
                text: 'Pessoa cadastrada com sucesso.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = '../main.php';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Erro ao cadastrar',
                text: 'Falha ao cadastrar.',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = '../cadastrar_usuario.php'; // Redireciona de volta para o formulário
            });
            </script>";
        }
    }

    // Fecha o statement
    $stmt->close();
    // Fecha a conexão
    $conexao->close();
} 
?>