<!-- 
      * Página PerfilController *

          Funções:
            - Instancia objeto e chama a camada DAO para pegar todas as informacoes para serem
            mostradas na pagina de perfil do cientista
-->

<?php
   
    require_once "../Dao/Perfil.php";
    include '../Controllers/IClientsController.php';

    class PerfilController 
    {
        private $model;

        function __construct()
        {
            $this->model = new PerfilModel();
        }

    function getAllPerfil()
    {
        /*Mostra informações do cientista*/
        $resultData = $this->model->getAllCientista($_SESSION['login']);
        $_SESSION['perfil'] = $resultData;
    }
    function getNom()
    {
         /*Pegar publicação do banco*/
        $resultData = $this->model->getNom($_SESSION['login']);
        $_SESSION['Nom'] = $resultData;
    }

    function getAllPaginaPerfil(){
        $resultData = $this->model->getAllPaginaPerfil($_SESSION['login']);
        $_SESSION['PaginaPerfil'] = $resultData;
    }
}
?>