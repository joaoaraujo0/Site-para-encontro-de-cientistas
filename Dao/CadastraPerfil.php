<!-- 
      * Página CadastraPerfil *

          Funções:
            - Inserir os dados do cientista
            - cadastrar as fk's
-->

<?php

require_once '../Conection/Conn.php';

    class CadastraPerfil extends Conn{

        private $tableArea_atuacao;
        private $tableFormacao;
        private $tablerede_Sociais;
        private $tableTelefone;
        private $tableTitulacao;

        function __construct()
        {
            parent::__construct();
            $this->tableArea_atuacao = 'area_atuacao';
            $this->tableFormacao = 'formacao';
            $this->tablerede_Sociais = 'rede_sociais';
            $this->tableTelefone = 'telefone';
            $this->tableTitulacao = 'titulacao';
        }

        public function setCadastroPerfil($nom_titulacao, $nom_area_atuacao, $end_rede_social, $dti_formacao,
        $dtt_formacao, $ddd_telefone, $num_telefone,$id)
        {
                $sql = $this->pdo->prepare("INSERT INTO $this->tableArea_atuacao (nom_area_atuacao) 
                VALUES (:a)");      
                
                $sql->bindValue(":a", $nom_area_atuacao);
                $sql->execute();

                /* pegar id da area que acabou de ser inserida */

                $sqlPegarIdArea = $this->pdo->prepare("SELECT id_area_atuacao FROM $this->tableArea_atuacao 
                WHERE nom_area_atuacao = :a"); 

                $sqlPegarIdArea->bindValue(":a", $nom_area_atuacao);

                $sqlPegarIdArea->execute(); 

                $teste=$sqlPegarIdArea->fetch();
                
                $id_area = $teste['id_area_atuacao'];

                /* update na tabela para inserir o id */

                $sqlInsertId = $this->pdo->prepare("INSERT INTO area_atuacao_cientista (fk_id_cientista)
                VALUES ($id)");   
                
                $sqlInsertId->execute();

                $sqlUpdateId = $this->pdo->prepare("UPDATE area_atuacao_cientista SET 	
                fk_id_area_atuacao = $id_area WHERE fk_id_cientista = $id");    

                $sqlUpdateId->execute();
                
                $sql2 = $this->pdo->prepare("INSERT INTO  $this->tablerede_Sociais (end_rede_social, fk_id_cientista) 
                VALUES (:d, :z)");
    
                $sql3 = $this->pdo->prepare("INSERT INTO $this->tableTelefone (ddd_telefone, num_telefone, fk_id_cientista) 
                VALUES (:e, :f, :z)");
    
                $sql4 = $this->pdo->prepare("INSERT INTO $this->tableTitulacao (nom_titulacao) 
                VALUES (:g)");
                $sql4->bindValue(":g", $nom_titulacao);
                $sql4->execute();

                $sqlPegarIdTitulacao = $this->pdo->prepare("SELECT id_titulacao FROM $this->tableTitulacao 
                WHERE nom_titulacao = :x"); 
    
                $sqlPegarIdTitulacao->bindValue(":x", $nom_titulacao);
                
                $sqlPegarIdTitulacao->execute(); 
                
                $teste=$sqlPegarIdTitulacao->fetch();
                
                $id_Titulacao = $teste['id_titulacao'];
                
                $sql1 = $this->pdo->prepare("INSERT INTO  $this->tableFormacao (dti_formacao, dtt_formacao,fk_id_titulacao,fk_id_cientista) 
                VALUES (:b, :c, :z, :x)");
                
               
                $sql2->execute(array(
                    ':d' => $end_rede_social,
                    ':z' => $id
                ));
                
                $sql3->execute(array(
                    ':e' =>  $ddd_telefone,
                    ':f' => $num_telefone,
                    ':z' => $id
                ));
                $sql1->execute(array(
                    ':b' => $dti_formacao,
                    ':c' => $dtt_formacao,
                    ':z' => $id,
                    ':x' => $id_Titulacao
                ));

               

                return true;
            }
    }

    
?>