<!-- 
      * Página Cadastro *

          Funções:
            - Cadastro o cientista no banco
-->

<?php
//echo ("Cadastro");
require_once '../Conection/Conn.php';

    class Cadastro extends Conn
    {

        private $tableCientista;
        
        function __construct(){
            parent::__construct();
             $this->tableCientista ='cientista';
            
        }
                                              
        function setCadastroBanco($nom_cientista, $cpf_cientista, $dtn_cientista, $email_cientista,
        $email_alternativo_cientista, $lattes_cientista, $snh_cientista)
        {
            

            $sql = $this->pdo->prepare("SELECT *FROM $this->tableCientista
            WHERE cpf_cientista = :b");
            $sql->bindValue(":b", $cpf_cientista);
            $sql->execute();

            //veficar se já esta cadastrado, contando as linhas
            if($sql->rowCount() > 0)
            {
                return false;
            }
            else
            {
                //caso não, cadastrar   
                $sql = $this->pdo->prepare("INSERT INTO $this->tableCientista (nom_cientista, cpf_cientista, dtn_cientista, 
                email_cientista, email_alternativo_cientista, lattes_cientista, snh_cientista) 
                VALUES (:a, :b, :c, :d, :e, :f, :g)");

                $sql->bindValue(":a", $nom_cientista);
                $sql->bindValue(":b", $cpf_cientista);
                $sql->bindValue(":c", $dtn_cientista);
                $sql->bindValue(":d", $email_cientista);
                $sql->bindValue(":e", $email_alternativo_cientista);
                $sql->bindValue(":f", $lattes_cientista);
                $sql->bindValue(":g", $snh_cientista);
                $sql->execute();
                return true; 
                
            }
            return false;
            }
        }
?>