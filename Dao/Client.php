<!-- 
      * Página Client *

          Funções:
            - Pega as informacoes do projeto para guardar na session para ser mostradas na home
-->

<?php

     include ('../Conection/Conn.php');

    class ClientModel extends Conn
    {
        private $tableProjeto;
        private $tableCientista;
        private $tableArea_atuacao_cientista;
        private $tableArea_atuacao;


        function __construct()
        {
            parent::__construct();
            $this->tableProjeto = 'projeto';
            $this->tableCientista = 'cientista';
            $this->tableFormacao = 'formacao';
            $this->tableArea_atuacao_cientista = 'area_atuacao_cientista';
            $this->tableArea_atuacao = 'area_atuacao';


        }

        
        function getNom($id)
        { 
            /*Query para pegar nome*/
            $sqlSelect = $this->pdo->query("SELECT nom_cientista FROM $this->tableCientista WHERE id_cientista = $id ");
            $sqlSelect ->execute();
            return $sqlSelect;        
        }    

        function getAll($id)
        { 
            /*Query para pegar todas publicações do banco*/
            $sqlSelect = $this->pdo->query("SELECT cientista.nom_cientista,projeto.id_projeto,
            projeto.tit_projeto,projeto.dti_projeto,projeto.dtt_projeto,
            area_atuacao_cientista.fk_id_area_atuacao,area_atuacao.nom_area_atuacao,projeto.pub_projeto
            from $this->tableCientista
            INNER JOIN $this->tableProjeto on projeto.fk_id_cientista=cientista.id_cientista
            INNER JOIN $this->tableArea_atuacao_cientista on area_atuacao_cientista.fk_id_cientista=cientista.id_cientista
            INNER JOIN $this->tableArea_atuacao on area_atuacao.id_area_atuacao=area_atuacao_cientista.fk_id_area_atuacao
            WHERE cientista.id_cientista=$id AND projeto.pub_projeto=1");
            $sqlSelect ->execute();
            return $sqlSelect;        
        }     

          
        function getUser($id)
        {
            /*Pegar informaçoes do usuario */
            $sql = "SELECT * FROM $this->tableProjeto WHERE fk_id_cientista = $id";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            return $query;
        }

        function getModal($id)
        {
            /* Verifiar se o usuário ja cadastrou o perfil dele */

            $sql = "SELECT * FROM $this->tableFormacao WHERE fk_id_cientista = $id";
            $query = $this->pdo->prepare($sql);
            $query->execute();

            if($query->rowCount() > 0)
            {
                return 'true';
          
            }
            else
            {
                return 'false';
            }
        }
    }
    
?>