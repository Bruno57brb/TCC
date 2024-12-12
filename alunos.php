<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<body>
<?php 
    include_once "header.php" ;
    require_once "conexao/conexao.php";
?>
<main class="container"> 
 <h1> Clientes </h1> 
 <a href='forminsere.php' class="brown lighten-3 waves-effect waves-light btn"><i class="material-icons right">add</i>Inserir</a>
<table class="highlight">
        <thead>
          <tr>
              <th>ID</th>
              <th>CPF</th>
              <th>Nome</th>
              <th>Data nasc</th>  
              <th>Operação </th>       
          </tr>
        </thead>
        <tbody>
  <?php
  $sql = "SELECT CPF,nome,email,matricula,turma FROM alunos";
  $resultado = mysqli_query($conexao,$sql); 
  //var_dump($resultado);
  while($linha = mysqli_fetch_assoc($resultado))
  {
  ?>
      <tr>
      <td> <?php echo $linha['CPF']; ?> </td>
      <td> <?php echo $linha['nome']; ?> </td>
      <td> <?php echo $linha['email']; ?> </td>
      <td> <?php echo $linha['matricula']; ?> </td>
      <td> <?php echo $linha['turma']; ?> </td>
      <td> <?php echo $linha['dataNasc']; ?> </td>
      <td><?php  $dataNasc = date('d/m/Y',strtotime($linha['dataNasc'])); echo $dataNasc; ?></td>
      <td> <a href="#modal<?php echo $linha['CPF']; ?>" class="btn-floating btn-small waves-effect waves-light red modal-trigger"><i class="material-icons">delete</i></a> </td>
      
   <!-- Modal Structure -->
  <div id="modal<?php echo $linha['CPF']; ?>" class="modal">
    <div class="modal-content">   
      <h2> Atenção! </h2>
      <p>Você confirma a exclusão do cliente:  <?php echo $linha['nome'];?> ?</p>
    </div>

    <div class="modal-footer"> 
     <form action = "excluir.php" method ="POST">
     <input type = "hidden" name ="CPF" value="<?php echo $linha['CPF'];?>">    
    
     <button type="submit" name="btn-deletar" class="modal-action modal-close waves-red btn red darken-1"> 
      Excluir </button>

      <button type="button" name="btn-cancelar" class="modal-action modal-close  btn waves-light green"> 
      Cancelar </button> 
    </form> 

  </div>
  </div>
  
  </tr>
   <?php 
  }
  ?>
          
       
        
         
      </tbody>
      </table>
  

 <br>
      <a href='relatorio.php' class="brown lighten-3 waves-effect waves-light btn"><i class="material-icons right">add</i>Gerar relatório</a>
      <table class="highlight">
</main>



<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
// M.AutoInit();
   document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems, {
        opacity: 0.7,        // Opacidade do background (0.0 a 1.0)
        inDuration: 1000,     // Duração da animação de abertura em milissegundos
        outDuration: 1200,    // Duração da animação de fechamento em milissegundos
        dismissible: true,   // Permite fechar ao clicar fora do modal
        startingTop: '10%',  // Posição inicial do modal em relação ao topo
        endingTop: '15%'     // Posição final do modal em relação ao topo
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
            // Inicializa a sidenav
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, {
                edge: 'left'});

            // Configura a largura da sidenav
            var sidenav = document.querySelector('.sidenav');
            sidenav.style.width = '250px'; // Ajuste a largura conforme necessário
        });



    
</script>

</body>
</html>