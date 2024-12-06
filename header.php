<?php 

// Conectar ao banco de dados
require_once "conexao/conexao.php";
$conexao = conectar();

// Consulta SQL para selecionar todos os usuários
$sql = "SELECT * FROM usuario";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

// Fechar a conexão
mysqli_close($conexao);
?>

<link rel="stylesheet" href="css/materialize.css">

<!-- Barra de navegação superior -->
<nav class="green">
<div class="header-logo">
                <img class="right" src="img/assistencia_estudantil.png" alt="Logo da Assistência Estudantil">
            </div>
  <div class="nav-wrapper">
    <!-- Botão de Hambúrguer/Seta -->
    <div class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()">
      &#9776; <!-- Ícone de três barras inicialmente -->
    </div>

    <!-- Nome do usuário e imagem -->
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li>

      </li>
    </ul>
  </div>
</nav>

<!-- Sidebar (menu lateral) -->
<nav id="sidebar">
  <div class="navbar">
    <div class="logo">
      <img src="img/iff.jpg" alt="Logo">
      <h1><?php echo $row['nome']; ?></h1>
    </div>
    <ul>
    <?php 
// Verifica se o perfil é 1 (ou outro perfil desejado)
if ($_SESSION['Perfil'] == 1 ) {
?>
  <li><a href="cadastrar_usuario.php" class="nav-link">
      <i class="fab fa-dochub"></i>
      <span class="nav-item">Cadastro do Servidor</span>
    </a></li>
<?php 
}
?>


      <li><a href="#" class="nav-link">
          <i class="fab fa-dochub"></i>
          <span class="nav-item">Cadastro do discente</span>
        </a></li>

      <li><a href="#" class="nav-link">
          <i class="fab fa-dochub"></i>
          <span class="nav-item">Relatório</span>
        </a></li>
    
      <li><a href="crud/editcad" class="nav-link">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Configurações</span>
        </a></li>

      <li><a href="logout.php" class="nav-link logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Logout</span>
        </a></li>
    </ul>
  </div>

</nav>

<style>
  .header-logo {
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);
            position: absolute;
            top: -10px;
            right: 50px;
            width: 200px;
            height: 160px;
            background-color: white;
            border: 5px solid #006f3c;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            z-index: 2;
            padding: 20px;
        }

        .header-logo img {
            width: 100%;
            height: auto;
        }

  
  .nav-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .toggle-btn {
    font-size: 30px;
    cursor: pointer;
    padding: 15px;
    background: none;
    color: white;
    transition: all 0.3s ease;
    position: relative;
    z-index: 1000;
  }

  #sidebar {
    position: fixed;
    top: 0;
    left: -280px;
    width: 280px;
    height: 100vh;
    background: #39a046;
    color: white;
    padding: 20px 0;
    transition: left 0.3s ease;
  }

  .logo {
    display: flex;
    align-items: center;
    padding-bottom: 2rem;
  }

  .logo img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

  .logo h1 {
    margin-left: 1rem;
    font-size: 18px;
    text-transform: uppercase;
    color: white;
  }

  ul {
    padding-left: 0;
  }

  li {
    margin-bottom: 2rem;
  }

  li a {
    display: flex;
    align-items: center;
    font-size: 16px;
    color: rgb(200, 200, 200);
    padding: 10px 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  li a:hover {
    background-color: #444;
    color: white;
    transform: translateX(10px);
  }

  li a i {
    margin-right: 15px;
    transition: transform 0.3s ease;
  }

  li a:hover i {
    transform: translateX(10px);
  }

  .logout {
    padding: 0 20px;
    width: 100%;
  }

 
</style>

<script>
  // Função para alternar a visibilidade da sidebar
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleBtn');

    if (sidebar.style.left === '0px') {
      sidebar.style.left = '-280px'; // Fecha a sidebar
      toggleBtn.innerHTML = '&#9776;'; // Volta para ícone de hambúrguer
      toggleBtn.style.left = '15px'; // Reposiciona o botão para a esquerda
    } else {
      sidebar.style.left = '0px'; // Abre a sidebar
      toggleBtn.innerHTML = '&#8592;'; // Muda para ícone de seta
      toggleBtn.style.left = '300px'; // Reposiciona o botão após a sidebar
    }
  }
</script>
