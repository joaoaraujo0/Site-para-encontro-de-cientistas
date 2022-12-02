<!-- 
      * Página PubliController *

          Funções:
            - Instancia objeto e chama a camada DAO para pegar todas as informacoes para serem
            mostradas quando o usuario clicar na publicacao da Home
-->

<?php

include '../Dao/Publicacao.php';

session_start();
$id=$_GET['id'];
$_SESSION['idPub'] = $id;

class PubliController 
{
    private $model;

    function __construct()
    {
        $this->model = new Publicacao();
        $this->getAllPubli();
    }

    function getAllPubli()
    {
        /*Pega informações da publicacao para mostrar na view*/
        $this->model->getPubli($_SESSION['idPub']);
        /*Pega area do cientista*/
        $this->model->getAreaPubli($_SESSION['idPub']);

        header('location: ../View/Pub.php');
    }

}

new PubliController();
?>