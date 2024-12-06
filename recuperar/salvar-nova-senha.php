<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Recuperação</title>
    <!-- Importando o Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!-- Ícones do Materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="green lighten-4">
    <div class="container">
        <div class="row center-align" style="margin-top: 50px;">
            <div class="col s12 m8 offset-m2">
                <div class="card z-depth-3">
                    <div class="card-content">
                        <span class="card-title green-text text-darken-3">Recuperação de Senha</span>
                        <div class="result-message">
                            <?php
                            $email = $_POST['email'];
                            $token = $_POST['token'];
                            $senha = $_POST['senha'];
                            $repetirSenha = $_POST['repetirSenha'];

                            require_once "conexao.php";
                            $conexao = conectar();
                            $sql = "SELECT * FROM `recuperar_senha` WHERE email='$email' AND token='$token'";
                            $resultado = executarSQL($conexao, $sql);
                            $recuperar = mysqli_fetch_assoc($resultado);

                            if ($recuperar == null) {
                                echo "<p class='red-text'>Email ou token incorreto. Tente fazer um novo pedido de recuperação de senha.</p>";
                            } else {
                                date_default_timezone_set('America/Sao_Paulo');
                                $agora = new DateTime('now');
                                $data_criacao = DateTime::createFromFormat('Y-m-d H:i:s', $recuperar['data_criacao']);
                                $umDia = DateInterval::createFromDateString('1 day');
                                $dataExpiracao = date_add($data_criacao, $umDia);

                                if ($agora > $dataExpiracao) {
                                    echo "<p class='red-text'>Essa solicitação de recuperação de senha expirou! Faça um novo pedido de recuperação de senha.</p>";
                                } elseif ($recuperar['usado'] == 1) {
                                    echo "<p class='orange-text'>Esse pedido de recuperação de senha já foi utilizado anteriormente! Para recuperar a senha faça um novo pedido de recuperação de senha.</p>";
                                } elseif ($senha != $repetirSenha) {
                                    echo "<p class='red-text'>A senha que você digitou é diferente da senha que você digitou no campo repetir senha. Por favor tente novamente!</p>";
                                } else {
                                    $hash_senha = password_hash($senha, PASSWORD_DEFAULT);

                                    $sql2 = "UPDATE usuario SET senha='$hash_senha' WHERE email='$email'";
                                    executarSQL($conexao, $sql2);
                                    $sql3 = "UPDATE `recuperar_senha` SET usado=1 WHERE email='$email' AND token='$token'";
                                    executarSQL($conexao, $sql3);

                                    echo "<p class='green-text'>Nova senha cadastrada com sucesso! Faça o login para acessar o sistema.</p>";
                                    echo "<a href='../index.php' class='btn green darken-2'>Acessar sistema</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Importando o Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
