<?php
require_once "conexao.php";

// Verifica se as senhas foram enviadas
if (!isset($_POST['senha'], $_POST['repetirSenha'], $_POST['email'], $_POST['token'])) {
    die("Dados incompletos!");
}

$email = $_POST['email'];
$token = $_POST['token'];
$senha = $_POST['senha'];
$repetirSenha = $_POST['repetirSenha'];

// Valida se as senhas são iguais
if ($senha !== $repetirSenha) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'As senhas não coincidem. Tente novamente.',
            confirmButtonText: 'Ok'
        }).then(() => {
            window.history.back();
        });
    </script>";
    die();
}

// Verifica o token no banco
$conexao = conectar();
$sql = "SELECT * FROM recuperar_senha WHERE email=? AND token=? AND usado=0";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $email, $token);
$stmt->execute();
$resultado = $stmt->get_result();
$recuperar = $resultado->fetch_assoc();

if (!$recuperar) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Token inválido ou já utilizado.',
            confirmButtonText: 'Ok'
        }).then(() => {
            window.location.href = '../index.php';
        });
    </script>";
    die();
}

// Gera o hash da nova senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
error_log("Hashed Password: " . $senha_hash); // Log the hashed password

// Atualiza a senha no banco
$sql = "UPDATE usuario SET senha=? WHERE email=?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $senha_hash, $email);
if (!$stmt->execute()) {
    error_log("SQL Error: " . $stmt->error); // Log any SQL errors
}

// Marca o token como usado
$sql2 = "UPDATE recuperar_senha SET usado=1 WHERE email=? AND token=?";
$stmt2 = $conexao->prepare($sql2);
$stmt2->bind_param("ss", $email, $token);
$stmt2->execute();

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: 'Sua senha foi alterada com sucesso.',
        confirmButtonText: 'Ok'
    }).then(() => {
        window.location.href = '../login.php';
    });
</script>";
?>
