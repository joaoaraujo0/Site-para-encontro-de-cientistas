<!-- 
      * Página Dashboard *

          Funções:
            - Mostrar as publicações que os usuarios fizeram e proporcionar navegação ao usuario 

-->
<?php
  session_start();

  
  if (empty($_SESSION["login"])) {
    header('location: LoginCadastro.php');
    session_destroy();
  }

  include('../Dao/Client.php');
  include('../Controllers/clientsController.php');
  
  $controller = new ClientsController();
  
  $action = !empty($_GET['a']) ? $_GET['a'] : 'getAll';
  $actionNom = !empty($_GET['a']) ? $_GET['a'] : 'getNom';
  $actionModalVerifica = !empty($_GET['a']) ? $_GET['a'] : 'getModal';

  
  $controller->{$action}();
  $controller->{$actionNom}();
  $controller->{$actionModalVerifica}();
  
  $resultData = $_SESSION['var'];
  $resultDataNom = $_SESSION['Nom'];
  $resultModalVerifica = $_SESSION['ModalVerifica']; 

?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html>

<head>
  <meta charset="UTF-8">
  <title> Scilink - Plataforma de Cientistas</title>
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
  <link rel="stylesheet" href="./style/styleDash.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div class="sidebar">
    <div class="logo-details">
      <img src="./img/logopb.png" alt="">
      <span class="logo_name">SciLink</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="Home.php" class="active">
          <i class='bx bx-message-square-dots'></i>
          <span class="links_name">Publicações</span>
        </a>
      </li>
      <li>
        <a href="FomularioPubli.php">
          <i class='bx bx-edit-alt'></i>
          <span class="links_name">Criar Publicação</span>
        </a>
      </li>
      <li>
        <a href="MinhasPublicacoes.php">
          <i class='bx bx-library'></i>
          <span class="links_name">Minhas Publicações</span>
        </a>
      </li>
      <li>
        <a href="PaginaPerfil.php">
          <i class='bx bx-group'></i>
          <span class="links_name">Meu Perfil</span>
        </a>
      </li>
      <li class="log_out">
        <a href="LoginCadastro.php">
          <i class='bx bx-door-open'></i>
          <span class="links_name">Sair</span>
        </a>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Perguntas</span>
      </div>
      <div class="search-box">
      <input type="text" placeholder="Filtre por Tema, Cientista ou Área de Atuação!" id="searchbar" onkeyup="search_animal()">
        <i class='bx bx-search' style="background-color: #546CB3; color: rgb(255, 255, 255);"></i></a>
      </div>


      <div class="profile-details">
        <img src="./img/iconCientista.png" alt="">

        <div class="dropdown">

        <?php foreach ($resultDataNom as $data) : ?>
          <span><?= $data['nom_cientista'] ?></span>
          <?php endforeach; ?>

        <div class="dropdown-content">
            <div class="teste">
              <a href="CadastroPerfil.php" class="son">Editar Perfil</a><br>
              <a href="LoginCadastro.php" class="son">Sair</a>
            </div>
          </div>
        </div>
        

        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

      
    <div class="espaco-table">

    </div>

    



 <!-- ********************************************************************* -->




 
 <?php if ($resultModalVerifica == 'false') { ?>

<!-- ******************************* MODAL ******************************* -->
  <a href="#openModal" class="anchor">Open Modal</a>

  <div id="openModal" class="modalDialog">
    <div>
      
      <div class="modalContent">
        <h2>Bem vindo a plataforma Scilink!</h2>
        
        <p>Para voce continuar navegando precisamos que complete seu perfil, é rápido e fácil!</p>
        <form class="form">

          <a href="./CadastroPerfil.php" class="btnPerfil">Completar Perfil</a>
          <style>
            .btnPerfil
            {
              background-color: #000;
              padding: 10px;
              color: white;
              width: 150px;
              text-align: center;
              text-decoration: none;
              border-radius: 7px;
            }
          </style>
          
        </form>
      </div>

    </div>
  </div>

  <br />
  <br />

<style>

 .modalDialog {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99999;
    opacity: 0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
  }

  .modalDialog:target {
    opacity: 1;
    pointer-events: auto;
  }

  .modalDialog > div {
    width: 400px;
    position: relative;
    margin: 10% auto;
    padding: 20px 20px;
    border-radius: 10px;
    background: #fff;
    border: 2px solid #1960aa;
  }

  .close {
    background: #1960aa;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    -moz-box-shadow: 1px 1px 3px #000;
    -webkit-box-shadow: 1px 1px 3px #000;
    box-shadow: 1px 1px 3px #000;
  }

  .close:hover {
    background: #6195ED;
  }

  .anchor {
    visibility: hidden;
  }

  .btn-1 {
    background: #1960aa;
    color: #fff;
    padding: 13px 40px;
    outline: none;
    border: none;
    margin-left: 40px;
  }


  .form {
    display: flex;
    flex-direction: column;
  }



  .form-row {
    width: 100%;
    padding-bottom: 10px;
  }

  .btn-2 {
    background-color: #ff2d30;
    color: #fff;
    padding: 13px 40px;
    text-align: center;
  }
</style>

<script>
  function openPopup() {
    window.location.hash = 'openModal';
  }

  window.onload = openPopup;
</script>


<?php } ?>
 

    <?php foreach ($resultData as $data) : ?>
      <a style="text-decoration: none;" href="../Controllers/PubliController.php?id=<?= $data['id_projeto'] ?>" >
        <table border="0" id="lista" class="pub">
        <tr>
          <td class="info">
            <h3 style="text-decoration: none; color: #000000;"><?= $data['tit_projeto'] ?></h3>
            <p><b></b class="pub"> Autor: <?= $data ['nom_cientista'] ?></p>
            <p class="pub">• <?= $data ['nom_area_atuacao'] ?></p>
          </td>
          <td class="espaco"></td>
          <td class="data">
            <p>Início do Projeto: <?= $data ['dti_projeto'] ?></p>
            <p>Término do Projeto: <?= $data ['dtt_projeto'] ?></p>

          </td>
        </tr>
      </table>
      </form>
    </a>
    </form>
    
    <?php endforeach; ?>

  </section>


  <div class="botao__flutuante">
    <button class="botao__flutuante-cadastro btn-primario">
      <span>

      </span>
    </button>

    <ul class="botao__flutuante-opcoes">

      <li>
        <span>
          Criar Publicação
        </span>
        <a href="FormularioPubli.php">
          <button class="botao__flutuante-item btn-primario local"><span class="local"></span></button>
        </a>
      </li>
      <li>
        <span>
          Editar Perfil
        </span>
        <a href="CadastroPerfil.php">
          <button class="botao__flutuante-item btn-primario local"><span class="perfil"></span></button>
        </a>
      </li>

      <li>
        <span>
          Sair
        </span>
        <a href="LoginCadastro.php">
          <button class="botao__flutuante-item btn-primario"><span class="sair"></span></button>
        </a>
      </li>
    </ul>

  </div>

  

</body>

</html>



<script>
    var el = document.getElementById('pegarID');
      el.addEventListener('click', function(e) {
      alert(e.target.id);
  });
</script>

<script>
 $(document).ready(function(){
   $("#resposta").find("input[type='hidden']").click(function(){
    console.log($(this).attr("id"));
   });
});
  
</script>

<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>
<script>
  // JavaScript code
  function search_animal() {
    let input = document.getElementById('searchbar').value
    input = input.toLowerCase();
    let x = document.getElementsByClassName('pub');

    for (i = 0; i < x.length; i++) {
      if (!x[i].innerHTML.toLowerCase().includes(input)) {
        x[i].style.display = "none";
      } else {
        x[i].style.display = "table";
      }
    }
  }
</script>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/jquery-3.5.1.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/jquery.dataTables.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/dataTables.bootstrap5.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/script.js"></script>
</body>
</php>