<!-- 
      * Página CadastroController *

          Funções:
            - Receber os inputs por POST para cadastro do cientista, login, publicacao e para
            o perfil do cientista
-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />


<div id="myModal" class="modal mx-auto" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success">Cadastrado com sucesso!!</h5>
          
        </div>
        <div class="modal-body">
          <p class="h5">Faça o login e entre na plataforma!!</p>
          <footer class="blockquote-footer">Bem vindo!!</footer>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="../View/LoginCadastro.php" role="button">OK</a>
          
        </div>
      </div>
    </div>
  </div>

<?php
include '../Models/User.php';
include '../Dao/Login.php';
include '../Models/Pub.php';
include '../Controllers/IClientsController.php';
include '../Models/UserPerfil.php';
require_once '../Conection/Conn.php';

class CadastroController{
  
  function Cadastro(){
    $nom_cientista =addslashes( $_POST["nom_cientista"]);
    $cpf_cientista =addslashes( $_POST["cpf_cientista"]);
    $dtn_cientista =addslashes( $_POST["dtn_cientista"]);
    $email_cientista =addslashes( $_POST["email_cientista"]);
    $email_alternativo_cientista =addslashes( $_POST["email_alternativo_cientista"]);
    $lattes_cientista =addslashes( $_POST["lattes_cientista"]);
    $snh_cientista = mb_strimwidth(addslashes(md5($_POST['snh_cientista'])), 0, 10);
    
    $user = new User($nom_cientista, $cpf_cientista, $dtn_cientista
    ,$email_cientista, $email_alternativo_cientista, $lattes_cientista, $snh_cientista  );

    /*Cadastrar dados no banco*/
    if($user->CadastroBanco()==true)
    {
      /*Cadastrar cpf no banco*/
      //$user->CadastraCpf($cpf_cientista);
      ?>
      <script>
        /*Chama funcao do modal*/ 
        function abreModal() {
        $("#myModal").modal({
        show: true
  });
}

      setTimeout(abreModal, 1);
      </script><?php
    }
    else{
      echo "<SCRIPT> //not showing me this
      alert('Senha ou CPF incorreto')
      window.location.replace('../../app/View/LoginCadastro.php');
      </SCRIPT>";

    }
  
  }
  
  function Login()
  {
    
    if (isset($_POST['cpf_cientista'])){
      $nom_cientista = $_POST["cpf_cientista"];
      $snh_cientista =mb_strimwidth(addslashes(md5($_POST['snh_cientista'])), 0, 10);
      $log=new Login();
      
          /*Faz login */
         if($log->Login($nom_cientista,$snh_cientista)==true)
         {
           header('Location: ../View/Home.php');
         }
           echo "<SCRIPT> //not showing me this
           alert('Senha ou CPF incorreto')
           window.location.replace('../../app/View/LoginCadastro.php');
           </SCRIPT>";
         
     }
  }

  function CadastroPub()
  {
      session_start();
      if (isset($_POST['tit_projeto'])){
      $tit_projeto = $_POST["tit_projeto"];
      $dti_projeto = $_POST["dti_projeto"];
      $dtt_projeto = $_POST["dtt_projeto"];
      $res_projeto = $_POST["res_projeto"];
      $pub_projeto = $_POST["pub_projeto"];
      
      $user = new Pub($tit_projeto, $dti_projeto, $dtt_projeto,$res_projeto,$pub_projeto);
      
      /*Cadastra publicação no banco*/
      if($user->CadastroPub($_SESSION['login'])==true)
      {
        header('Location: ../View/Home.php');
      }
    }
  }


  function CadastroPerfil()
  {
      
      if (isset($_POST['nom_titulacao']))
      {
        session_start();
        $nom_titulacao = $_POST["nom_titulacao"];
        $nom_area_atuacao = $_POST["nom_area_atuacao"];
        $end_rede_social = $_POST["end_rede_social"];
        $dti_formacao = $_POST["dti_formacao"];
        $dtt_formacao = $_POST["dtt_formacao"];
        $ddd_telefone = $_POST["ddd_telefone"];
        $num_telefone = $_POST["num_telefone"];
    
      $user = new UserPerfil($nom_titulacao, $nom_area_atuacao, $end_rede_social, $dti_formacao,$ddd_telefone, $dtt_formacao, $num_telefone);
      
       /*Cadastra dados do perfil no banco*/
      $user->CadastraPerfil($_SESSION['login']);
      
      header('Location: ../View/PaginaPerfil.php');
    }
  }

}

/*Receber chamado de funções*/
  $acao = $_POST['acao'];

  if($acao=="cadastro")
  {
    $controle = new CadastroController();
    $controle->Cadastro();
  }
  else if($acao=="login")
  {
    $controle = new CadastroController();
    $controle->login();
  }
  else if($acao=="cadastroPub")
  {
    $controle = new CadastroController();
    $controle->CadastroPub();
  }
  else if($acao=="cadastraPerfil")
  {
    $controle = new CadastroController();
    $controle->CadastroPerfil();
  }

?>