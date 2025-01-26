<?php session_start();
$login = "";
if (isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
  unset($_SESSION['login']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

  <title>Painel de Administração</title>
</head>

<?php include_once "header.php"; ?>

<style>
  <?php include_once "css/main.css" ?>
</style>

<body class="white">
  <div class="container center-align">
    <h1>Bem-vindo ao Painel de Administração do IFFar</h1>
    <div class="row">

      <!--ENTRADA-->
      <div class="col s12 m6 l4">
        <div class="card blue darken-2 custom-card">
          <div class="card-content white-text">
            <i class="fas fa-sign-in-alt"></i>

            <h5>Entrada em atraso</h5>
          </div>

          <a href="#modal-entrada" class="white-text modal-trigger">
            <div class="card-action">
              ACESSAR
            </div>
          </a>
        </div>
      </div>


      <div id="modal-entrada" class="modal">
        <div class="modal-content">
          <h4 class="center-align">Registrar Entrada Em Atraso</h4>
          <form id="form-entrada">



            <!-- Campo Matricula -->
            <div class="input-field col s12 ">
              <i class="material-icons prefix"></i> <!-- Ícone opcional -->
              <input id="registroAtrasoMatricula" name="matricula" type="text" class="validate" required>
              <label for="registroAtrasoMatricula">Matrícula</label>
              <button type="button" onclick="pesquisarMatricula('entrada')" class="btn waves-effect waves-light blue">
                <i class="material-icons left"></i>Pesquisar
              </button>
            </div>


            <!-- Campo Nome -->
            <div class="input-field col s12 m6 ">
              <i class="material-icons prefix"></i>
              <input type="text" id="registroAtrasoNome" name="nome" placeholder disabled class="validate" required>
              <label for="nome">Nome completo</label>
            </div>


                    <!-- Campo Turma -->
                    <div class="input-field col s12 m6">
              <i class="material-icons prefix"></i>
              <input type="text" id="registroAtrasoTurma" name="turma" placeholder disabled class="validate" required>
              <label for="turma">Turma</label>
            </div>
 
            <input type="hidden" id="registroAtrasoCPF" name="cpf" required>

            <!-- Campo Data -->
            <div class="input-field col s12 m6">
              <i class="material-icons prefix"></i>
              <input type="date" id="registroAtrasoData" name="data" required>
              <label for="data">Data</label>
            </div>

            <!-- Campo Horário -->
            <div class="input-field col s12 m6">
              <i class="material-icons prefix"></i>
              <input type="time" id="registroAtrasoHorario" name="horario" required>
              <label for="horario">Horário</label>
            </div>

    
            <!-- Campo Motivo -->
            <div class="input-field col s12">
              <i class="material-icons prefix"></i>
              <textarea id="motivo" name="motivo" class="materialize-textarea" required></textarea>
              <label for="motivo">Motivo do atraso</label>
            </div>


            
            <input type="hidden" name="tipo" value="entrada">




            <!-- Botão Registrar -->
            <div class="center-align">
              <button type="submit" class="btn waves-effect waves-light">
                <i class="material-icons left"></i>Registrar
              </button>
            </div>
          </form>
        </div>

        <!-- Rodapé do Modal -->
        <div class="modal-footer">
          <a href="#!" class="modal-close btn red lighten-1 waves-effect waves-light">
            <i class="material-icons left"></i>Fechar
          </a>
        </div>
      </div>




</html>
<!-- FIM da ENTRADA -->







<!-- SAÍDA -->
<div class="col s12 m6 l4">
  <div class="card pink darken-2 custom-card">
    <div class="card-content white-text">
      <i class="fas fa-sign-out-alt"></i>
      <h5>Saída fora de horário</h5>
    </div>

    <a href="#modal-saida" class="white-text modal-trigger">
      <div class="card-action">
        ACESSAR
      </div>
    </a>
  </div>
</div>

<!-- Modal de Saída -->
<div id="modal-saida" class="modal">
  <div class="modal-content">
    <h4 class="center-align">Registrar Saída Fora de Horário</h4>
    <form id="form-saida">



      <!-- Campo Matricula -->


      <!-- Campo Matricula -->
      <div class="input-field col s12 ">
        <i class="material-icons prefix"></i> <!-- Ícone opcional -->
        <input id="registroSaidaMatricula" name="matricula" type="text" class="validate" required>
        <label for="registroSaidaMatricula">Matrícula</label>
        <button type="button" onclick="pesquisarMatricula('saida')" class="btn waves-effect waves-light blue">
          <i class="material-icons left"></i>Pesquisar
        </button>
      </div>



      <!-- Campo Nome -->
      <div class="input-field col s12 m6 ">
        <i class="material-icons prefix"></i>
        <input type="text" id="registroSaidaNome" name="nome" placeholder disabled class="validate" required>
        <label for="nome">Nome completo</label>
      </div>

      <input type="hidden" id="registroSaidaCPF" name="cpf" required>

          <!-- Campo Turma -->
          <div class="input-field col s12 m6">
        <i class="material-icons prefix"></i>
        <input type="text" id="registroSaidaTurma" name="turma" placeholder disabled class="validate" required>
        <label for="turma">Turma</label>
      </div>
      
      <!-- Campo Data -->
      <div class="input-field col s12 m6">
        <i class="material-icons prefix"></i>
        <input type="date" id="registroSaidaData" name="data" required>
        <label for="data">Data</label>
      </div>

      <!-- Campo Horário -->
      <div class="input-field col s12 m6">
        <i class="material-icons prefix"></i>
        <input type="time" id="registroSaidaHorario" name="horario" required>
        <label for="horario">Horário</label>
      </div>

  

      <!-- Campo Motivo -->
      <div class="input-field col s12">
        <i class="material-icons prefix"></i>
        <textarea id="motivo" name="motivo" class="materialize-textarea" required></textarea>
        <label for="motivo">Motivo da saída</label>
      </div>


      <input type="hidden" name="tipo" value="saida">

      <!-- Botão Registrar -->
      <div class="center-align">
        <button type="submit" class="btn waves-effect waves-light">
          <i class="material-icons left"></i>Registrar
        </button>
      </div>
    </form>
  </div>

  <!-- Rodapé do Modal -->
  <div class="modal-footer">
    <a href="#!" class="modal-close btn red lighten-1 waves-effect waves-light">
      <i class="material-icons left"></i>Fechar
    </a>
  </div>
</div>


<!-- FIM da SAÍDA -->


<!--relatorio diario-->



<div class="col s12 m6 l4">
  <div class="card orange darken-2 custom-card">
    <div class="card-content white-text">
      <i class="fas fa-file-alt"></i>
      <h5>Relatório diario</h5>
    </div>

    <a href="#modal_relatorio_diario" class="white-text modal-trigger">
      <div class="card-action">
        ACESSAR
      </div>
    </a>

  </div>
</div>


<div id="modal_relatorio_diario" class="modal">
  <div class="modal-content">
    <h4 class="center-align">Relatório diário</h4>
    <!-- Barra de Pesquisa -->
    <div class="input-field">
      <i class="material-icons prefix"></i>
      <input type="text" id="busca-Relatorio_diario" placeholder="Digite para buscar (nome, matrícula, turma)">
    </div>

    <table class="highlight">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Matrícula</th>
          <th>Turma</th>
          <th>Tipo</th>
          <th>Data</th>
          <th>Horário</th>
          <th>Motivo</th>
        </tr>
      </thead>
      <tbody id="tabela-Relatorio_diario">
      </tbody>
    </table>
  </div>

  <div class="modal-footer">
    <a href="#!" class="modal-close btn red lighten-1 waves-effect waves-light">
      <i class="material-icons left"></i>Fechar
    </a>
  </div>
</div>
<!-- Final relatorio diario -->



<div class="col s12 m6 l4">
  <div class="card grey darken-2 custom-card">
    <div class="card-content white-text">
      <i class="fas fa-calendar-alt"></i>
      <h5>Calendário</h5>
    </div>
    <div class="card-action">
      <a href="#" class="white-text">Acessar</a>
    </div>
  </div>
</div>

<div class="col s12 m6 l4">
  <div class="card green darken-2 custom-card">
    <div class="card-content white-text">
      <i class="fas fa-user-graduate"></i>
      <h5>Alunos</h5>
    </div>

    <a href="alunos.php" class="white-text">
      <div class="card-action">
        ACESSAR

      </div>
    </a>
  </div>
</div>







<!-- inicio relatorio -->

<div class="col s12 m6 l4">
  <div class="card cyan darken-2 custom-card">
    <div class="card-content white-text">
      <i class="fas fa-file-alt"></i>
      <h5>Relatório</h5>
    </div>
    <a href="#modal-Relatorio" class="white-text modal-trigger">
      <div class="card-action">
        ACESSAR
      </div>
    </a>
  </div>
</div>
</div>
</div>


<div id="modal-Relatorio" class="modal">
  <div class="modal-content">
    <h4 class="center-align">Relatório </h4>


    <div class="input-field">
      <i class="material-icons prefix"></i>
      <input type="text" id="busca-Relatorio" placeholder="Digite para buscar (nome, matrícula, turma)">
    </div>


    <table class="highlight">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Matrícula</th>
          <th>Turma</th>
          <th>Tipo</th>
          <th>Data</th>
          <th>Horário</th>
          <th>Motivo</th>
        </tr>
      </thead>
      <tbody id="tabela-Relatorio">

      </tbody>
    </table>
  </div>


  <div class="modal-footer">
    <a href="#!" class="modal-close btn red lighten-1 waves-effect waves-light">
      <i class="material-icons left"></i>Fechar
    </a>
  </div>
</div>

<?php include_once "footer.php" ?>










<script>
  //inicio form entrada
  document.addEventListener('DOMContentLoaded', () => {
  // Inicializa os modais
  M.Modal.init(document.querySelectorAll('.modal'));

  // Envio do formulário via AJAX para entrada
  const formEntrada = document.getElementById('form-entrada');
  formEntrada?.addEventListener('submit', async (e) => {
    e.preventDefault();
    try {
      const formData = new FormData(formEntrada);
      formData.append('tipo', 'entrada'); // Certifique-se de que o tipo seja enviado
      const response = await fetch('botoesmain/salvar_entrada.php', {
        method: 'POST',
        body: formData
      });
      const data = await response.text();
      Swal.fire('Sucesso!', data, 'success');
      M.Modal.getInstance(document.querySelector('#modal-entrada')).close();
      formEntrada.reset();
    } catch {
      Swal.fire('Erro!', 'Houve um problema ao salvar a entrada.', 'error');
    }
  });
});




  //inicio from saida
  document.addEventListener('DOMContentLoaded', () => {
  // Inicializa os modais
  M.Modal.init(document.querySelectorAll('.modal'));

  // Envio do formulário via AJAX para saída
  const formSaida = document.getElementById('form-saida');
  formSaida?.addEventListener('submit', async (e) => {
    e.preventDefault();
    try {
      const formData = new FormData(formSaida);
      formData.append('tipo', 'saida'); // Certifique-se de que o tipo seja enviado
      const response = await fetch('botoesmain/salvar_saida.php', {
        method: 'POST',
        body: formData
      });
      const data = await response.text();
      Swal.fire('Sucesso!', data, 'success');
      M.Modal.getInstance(document.querySelector('#modal-saida')).close();
      formSaida.reset();
    } catch {
      Swal.fire('Erro!', 'Houve um problema ao salvar a saída.', 'error');
    }
  });
});




  //pesquisa por matricula parte dos form 

  async function pesquisarMatricula(contexto) {
  try {
    const matriculaId = contexto === "saida" ? "registroSaidaMatricula" : "registroAtrasoMatricula";
    const nomeId = contexto === "saida" ? "registroSaidaNome" : "registroAtrasoNome";
    const cpfId = contexto === "saida" ? "registroSaidaCPF" : "registroAtrasoCPF";
    const turmaId = contexto === "saida" ? "registroSaidaTurma" : "registroAtrasoTurma";
    const diaId = contexto === "saida" ? "registroSaidaDia" : "registroAtrasoDia";

    const matricula = document.getElementById(matriculaId).value.trim();
    
    if (!matricula) {
      exibirModalSaida("Por favor, insira uma matrícula válida.");
      return;
    }

    const response = await fetch(`botoesmain/pesq_matricula.php?matricula=${matricula}`);
    if (!response.ok) {
      throw new Error("Erro na resposta do servidor");
    }

    const data = await response.json();

    if (!data || !data.nome || !data.turma) {
      exibirModalSaida("Nenhum dado encontrado para a matrícula informada.");
      return;
    }

    // Preenchendo os campos com os dados do servidor
    document.getElementById(nomeId).value = data.nome;
    document.getElementById(cpfId).value = data.cpf || ""; // Caso CPF não seja obrigatório
    document.getElementById(turmaId).value = data.turma;

    // Obtendo a data atual
    const dataAtual = new Date();
    const diaFormatado = dataAtual.toLocaleDateString("pt-BR", {
      day: "2-digit",
      month: "2-digit",
      year: "numeric",
    });

    // Preenchendo o campo do dia
    document.getElementById(diaId).value = diaFormatado;

    console.log("Dados carregados com sucesso:", data);

    exibirModalSaida("Dados carregados com sucesso!");
  } catch (error) {
    console.error("Erro ao pesquisar matrícula:", error.message);
    exibirModalSaida("Ocorreu um erro ao pesquisar a matrícula. Tente novamente.");
  }
}
 





 






  //inicio relatorio

  <?php if ($login != "") { ?>
    window.addEventListener("load", (event) => {
      Swal.fire(
        <?= json_encode($login) ?>
      )
    });
  <?php } ?>

  document.addEventListener('DOMContentLoaded', () => {
    // Inicializa os modais
    const modals = M.Modal.init(document.querySelectorAll('.modal'), {
      onOpenStart: (modalElement) => {
        if (modalElement.id === 'modal_relatorio_diario') {
          carregarRelatorio_diario(); // Carrega os dados do Relatório Diário quando o modal é aberto
        } else if (modalElement.id === 'modal-Relatorio') {
          carregarRelatorio(); // Carrega os dados do Relatório quando o modal é aberto
        }
      }
    });

    // Função para carregar os dados do Relatório Diário
    const carregarRelatorio_diario = async (busca = '') => {
      try {
        const response = await fetch(`botoesmain/relatorio_diario.php?busca=${encodeURIComponent(busca)}`);
        if (!response.ok) {
          throw new Error('Erro na resposta do servidor');
        }
        const registros = await response.json();

        const tabela = document.getElementById('tabela-Relatorio_diario');
        if (!tabela) return; // Verifica se a tabela existe
        tabela.innerHTML = ''; // Limpa a tabela

        // Popula a tabela com os registros
        if (registros.length > 0) {
          registros.forEach((registro) => {
            tabela.innerHTML += `
            <tr>
              <td>${registro.nome}</td>
              <td>${registro.matricula}</td>
              <td>${registro.turma}</td>
              <td>${registro.tipo}</td>
              <td>${registro.data}</td>
              <td>${registro.horario}</td>
              <td>${registro.motivo || '-'}</td>
            </tr>
          `;
          });
        } else {
          tabela.innerHTML = `
          <tr>
            <td colspan="7" class="center-align">Nenhum registro encontrado</td>
          </tr>
        `;
        }
      } catch (error) {
        console.error('Erro ao carregar o relatório diário:', error);
      }
    };

    // Função para carregar os dados do Relatório
    const carregarRelatorio = async (busca = '') => {
      try {
        const response = await fetch(`botoesmain/relatorio.php?busca=${encodeURIComponent(busca)}`);
        if (!response.ok) {
          throw new Error('Erro na resposta do servidor');
        }
        const registros = await response.json();

        const tabela = document.getElementById('tabela-Relatorio');
        if (!tabela) return; // Verifica se a tabela existe
        tabela.innerHTML = ''; // Limpa a tabela


        if (registros.length > 0) {
          registros.forEach((registro) => {
            tabela.innerHTML += `
            <tr>
              <td>${registro.nome}</td>
              <td>${registro.matricula}</td>
              <td>${registro.turma}</td>
              <td>${registro.tipo}</td>
              <td>${registro.data}</td>
              <td>${registro.horario}</td>
              <td>${registro.motivo || '-'}</td>
            </tr>
          `;
          });
        } else {
          tabela.innerHTML = `
          <tr>
            <td colspan="7" class="center-align">Nenhum registro encontrado</td>
          </tr>
        `;
        }
      } catch (error) {
        console.error('Erro ao carregar o relatório:', error);
      }
    };

    // Evento para buscar enquanto digita no campo de pesquisa
    const buscaInputDiario = document.getElementById('busca-Relatorio_diario');
    if (buscaInputDiario) {
      buscaInputDiario.addEventListener('input', () => {
        carregarRelatorio_diario(buscaInputDiario.value);
      });
    }

    const buscaInputRelatorio = document.getElementById('busca-Relatorio');
    if (buscaInputRelatorio) {
      buscaInputRelatorio.addEventListener('input', () => {
        carregarRelatorio(buscaInputRelatorio.value);
      });
    }
  });
</script>