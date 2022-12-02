<!-- 
      * Página Pub *

          Funções:
            - Pagina da publicação, mostrando seus detalhes
-->

<?php
session_start();

if (empty($_SESSION["login"])) {
  header('location: LoginCadastro.php');
  session_destroy();
}

$resultData = $_SESSION["queryTabela"];
$resultData2 = $_SESSION["queryTabela2"];

?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Scilink - Plataforma de Cientistas</title>
  <link rel="stylesheet" href="./style/stylepubli.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
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



      <div class="profile-details">
        <img src="./img/iconcientista.png" alt="">


        <div class="dropdown">  
          <?php foreach ($resultData as $data) : ?>
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



    <table border="0" class="tableMinhasPublicacoes">
      <tr>
          <td class="titulo">
             
              <h3><?= $data['tit_projeto'] ?></h3>
          </td>
      </tr>  
      <tr>
        <td class="info">
            <p>Início do Projeto: <?= $data['dti_projeto'] ?></p>
            <p>Início do Projeto: <?= $data['dtt_projeto'] ?></p>
            
        </td>
    </tr>  
    <tr>

      </tr>  
      <tr>
        <td class="resumo">
          <p><?= $data['res_projeto'] ?></p>
        </td>
    </tr>  
    <tr>
      <td class="registro">
        <div class="info-pessoa">
          <div>
            <?php foreach ($resultData2 as $data2) : ?>
              <p><?= $data['nom_cientista'] ?> • <?= $data2['nom_area_atuacao'] ?> </p>
              <?php endforeach; ?>
              <div class="redes">
                <div class="linkedin">
                  <img src="./img/bxl-linkedin.svg" alt="Linkedin logo">
                  <p><?= $data['end_rede_social'] ?> </p>
                </div>
                <div class="email">
                  <img src="./img/bx-envelope.svg" alt="email logo">
                <p><?= $data['nom_cientista'] ?> </p>
              </div>
              </div>
          </div>
            <div class="botoes">
              <a href="#openModal" class="btn1">Entre em Contato</a>
              <a href="./FomularioPubli.php" class="btn2">Crie sua Publicação</a>           
            </div>
            
                <div id="openModal" class="modalDialog" onclick="onclick=window.location = 'https://localhost/scilink/app/View/Pub.php'">
                  <div>

                      <img src="./img/—Pngtree—personal personalization profile user blue_4790575.png" width="25%" alt="">

                      <h1><?= $data['nom_cientista'] ?> • <?= $data2['nom_area_atuacao'] ?></h1>

                      <div class="cont">
                        <h4>Telefone: <span>(<?= $data['ddd_telefone'] ?>) <?= $data['num_telefone'] ?> </span></h4>
                        <h4>Email Principal: <?= $data['email_cientista'] ?></h4>
                        <h4>Email Secundário: <?= $data['email_alternativo_cientista'] ?></h4>
                        <h4>Lattes: <?= $data['lattes_cientista'] ?></h4>
                        <h4>Linkedin: <?= $data['end_rede_social'] ?></h4>                   
                      </div>

                  </div>
                </div>
          </div>
      </td>
    </tr>
   
  </table>




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