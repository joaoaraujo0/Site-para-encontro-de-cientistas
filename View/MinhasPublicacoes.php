<!-- 
      * Página MinhasPublicacoes *

          Funções:
            - pagina que mostra as publicacoes que o usuario ja criou
            - tem a opcao de exluir e editar as publicacoes
-->
<?php
  session_start();
  if (empty($_SESSION["login"])) {
    header('location: LoginCadastro.php');
    session_destroy();
  }

  include('../Controllers/PerfilController.php');

  $controller = new PerfilController();

  $action = !empty($_GET['a']) ? $_GET['a'] : 'getAllPerfil';
  $actionNom = !empty($_GET['a']) ? $_GET['a'] : 'getNom';

  $controller->{$action}();
  $controller->{$actionNom}();

  $resultData = $_SESSION['perfil'];
  $resultDataNom = $_SESSION['Nom'];

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Scilink - Plataforma de Cientistas</title>
  <link rel="stylesheet" href="./style/styleDash.css">
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>3
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
  
.modalDialog {
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}

.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}

.modalDialog > div {
  background-color: #f1f1eb;
  padding-top: 15px;

  display: flex;
  align-items: center;
  flex-direction: column;
  font-size: 1rem;
  text-align: left;
  gap: 10px;

	width: 550px;
  height: 350px;
	position: relative;
	margin: 10% auto;
	border-radius: 10px;
}

.cont
{
  margin-top: 20px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  gap: 20px;

  width: 80%;
  height: 50px;
}

.close
{
  text-decoration: none;
  align-items: center;
  border: 2px solid #e9182b;
  padding: 8px 12px;
  color: #e9182b;
  border-radius: 7px;
  font-weight: 700;
}

.botaoexcluir
{
  text-decoration: none;
  align-items: center;
  background-color: #e9182b;
  padding: 8px 12px;
  color: white;
  border-radius: 7px;
}

</style>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="./img/logopb.png">
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
        <span class="dashboard">Minhas Publicações</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Filtrar">
        <i class='bx bx-search' style="background-color: #546CB3; color: rgb(255, 255, 255);"></i>
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


    <?php foreach ($resultData as $data) : ?>
        <table border="0" id="lista" class="tableMinhas">
        <tr>
          <td class="info">
            <h3 style="text-decoration: none; color: #000000;"><?= $data['tit_projeto'] ?></h3>
            <p><b></b class="pub"> Autor: <?= $data ['nom_cientista'] ?></p>
            <p class="pub">• <?= $data ['nom_area_atuacao'] ?></p>
          </td>
          <td class="espaco">
          <a href="#openModal" class="btn1">Excluir Publicacao</a>
                <div id="openModal" class="modalDialog">
                  <div>
                      <img src="./img/—Pngtree—danger icon for your design_5149418.png" width="25%" alt="">
                      <h1>Tem certeza que deseja excluir? </h1>
                      <p><b>Título da Publicação:</b> <?= $data['tit_projeto'] ?></p>
                      <div class="cont">
                      <a href="https://localhost/scilink/app/View/MinhasPublicacoes.php" class="close">Fechar</a>  
                      <a href="../Controllers/EditPubliController.php?id=<?=$data['id_projeto'] ?>" class="botaoexcluir">Excluir Publicação</a>    
                      </div>

                  </div>
                </div>
          </td>
          <td class="data">
            <p><b>Status do projeto: <?php if($data['pub_projeto'] == 1){ echo 'publico';}else{ echo 'privado';} ?></b></p>
            <p>Início do Projeto: <?= $data ['dti_projeto'] ?></p>
            <p>Término do Projeto: <?= $data ['dtt_projeto'] ?></p>
          </td>
        </tr>
      </table>
      </form>
    </a>
    </form>
    
    <?php endforeach; ?>

    

    <div class="espaco-table">

    </div>

  </section>





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
 
</body>

</html>