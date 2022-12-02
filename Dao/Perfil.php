<!-- 
      * Página Perfil *

          Funções:
            - faz um join entre tabelas para pegar todas as informacoes a serem guardadas na session
            para serem mostradas na home

-->

<?php

     include ('../Conection/Conn.php');

    class PerfilModel extends Conn
    {
        private $tableProjeto;
        private $tableCientista;

        function __construct()
        {
            parent::__construct();
            $this->tableProjeto = 'projeto';
            $this->tableCientista = 'cientista';

        }
        
        function getAllCientista($id)
        {   
            $sqlSelect = $this->pdo->query("SELECT projeto.tit_projeto, projeto.pub_projeto, projeto.dti_projeto, 
            projeto.dtt_projeto, projeto.res_projeto, projeto.id_projeto,cientista.nom_cientista, cientista.email_cientista
            ,area_atuacao_cientista.fk_id_area_atuacao,area_atuacao.nom_area_atuacao
                        FROM projeto 
                        INNER JOIN cientista on projeto.fk_id_cientista=cientista.id_cientista 
                        INNER JOIN area_atuacao_cientista on area_atuacao_cientista.fk_id_cientista=cientista.id_cientista
                        INNER JOIN area_atuacao on area_atuacao.id_area_atuacao=area_atuacao_cientista.fk_id_area_atuacao
                        WHERE cientista.id_cientista=$id");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        function getAllPaginaPerfil($id)
        {
            $sqlSelect = $this->pdo->query("SELECT cientista.nom_cientista,cientista.email_cientista,telefone.ddd_telefone,telefone.num_telefone,
            telefone.fk_id_cientista,formacao.dti_formacao,formacao.dtt_formacao,
            rede_sociais.end_rede_social,area_atuacao_cientista.fk_id_area_atuacao,area_atuacao.nom_area_atuacao
            from cientista
            INNER JOIN telefone on telefone.fk_id_cientista = cientista.id_cientista 
            INNER JOIN formacao on formacao.fk_id_cientista = cientista.id_cientista
            INNER JOIN rede_sociais on rede_sociais.fk_id_cientista = cientista.id_cientista
            INNER JOIN area_atuacao_cientista on area_atuacao_cientista.fk_id_cientista=cientista.id_cientista
            INNER JOIN area_atuacao on area_atuacao.id_area_atuacao=area_atuacao_cientista.fk_id_area_atuacao
            WHERE cientista.id_cientista=$id");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;

            // ,nom_area_atuacao
        }
        
        function getNom($id)
        { 
            /*Query para pegar nome*/
            $sqlSelect = $this->pdo->query("SELECT nom_cientista FROM $this->tableCientista WHERE id_cientista =$id ");
            $sqlSelect ->execute();
            return $sqlSelect;        
        } 

    }
?>

