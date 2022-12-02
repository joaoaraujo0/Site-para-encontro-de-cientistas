<!-- 
      * Página ClientsController *

          Funções:
            - Instanciar objeto e chamar a funcao do DAO para mostrar o projeto
-->

<?php

   
    require_once "../Dao/Client.php";
    include '../Controllers/IClientsController.php';

    class ClientsController 
    {
        private $model;
        function __construct()
        {
            $this->model = new ClientModel();
        }
    

    function getAll()
    {
         /*Pegar publicação do banco*/
        $resultData = $this->model->getAll($_SESSION['login']);
        $_SESSION['var'] = $resultData;
    }

    function getNom()
    {
         /*Pegar publicação do banco*/
        $resultData = $this->model->getNom($_SESSION['login']);
        $_SESSION['Nom'] = $resultData;
    }

    function getModal()
    {
        $resultModal = $this->model->getModal($_SESSION['login']);
 
        if($resultModal == 'false')
        {
            /* session para verificar se precisa do codigo */
            $_SESSION['ModalVerifica'] = $resultModal;
        }
    }
}

?>