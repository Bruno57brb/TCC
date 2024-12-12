<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <?php
    session_start();
    include_once "header.php";
    require_once "conexao/conexao.php";
    $conexao = conectar();
    ?>

    <main class="container">
        <h1>Clientes</h1>
        <a href='forminsere.php' class="brown lighten-3 waves-effect waves-light btn">
            <i class="material-icons right">add</i>Inserir
        </a>

        <table class="highlight">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Matrícula</th>
                    <th>Turma</th>
                    <th>Data Nascimento</th>
                    <th>Operação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT CPF, nome, email, matricula, turma, dataNasc FROM alunos";
                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        $dataNasc = date('d/m/Y', strtotime($linha['dataNasc']));
                        ?>
                        <tr>
                            <td><?php echo $linha['CPF']; ?></td>
                            <td><?php echo $linha['nome']; ?></td>
                            <td><?php echo $linha['email']; ?></td>
                            <td><?php echo $linha['matricula']; ?></td>
                            <td><?php echo $linha['turma']; ?></td>
                            <td><?php echo $dataNasc; ?></td>
                            <td>
                                <a href="#modal<?php echo $linha['CPF']; ?>" class="btn-floating btn-small waves-effect waves-light red modal-trigger">
                                    <i class="material-icons">delete</i>
                                </a>
                                <!-- Modal Structure -->
                                <div id="modal<?php echo $linha['CPF']; ?>" class="modal">
                                    <div class="modal-content">
                                        <h2>Atenção!</h2>
                                        <p>Você confirma a exclusão do cliente: <?php echo $linha['nome']; ?>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="excluir.php" method="POST">
                                            <input type="hidden" name="CPF" value="<?php echo $linha['CPF']; ?>">
                                            <button type="submit" name="btn-deletar" class="modal-action modal-close waves-red btn red darken-1">Excluir</button>
                                            <button type="button" class="modal-action modal-close btn waves-light green">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>Erro ao buscar dados: " . mysqli_error($conexao) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
        <a href='relatorio.php' class="brown lighten-3 waves-effect waves-light btn">
            <i class="material-icons right">add</i>Gerar relatório
        </a>
        <a href='main.php' class="red 3 waves-effect waves-light btn right">
            <i class="material-icons right">arrow_back</i>Voltar
        </a>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            M.Modal.init(elems, {
                opacity: 0.7,
                inDuration: 100,
                outDuration: 120,
                dismissible: true,
                startingTop: '10%',
                endingTop: '15%'
            });
        });
    </script>
</body>
</html>
