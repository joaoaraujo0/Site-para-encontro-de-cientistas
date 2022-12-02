<!-- 
      * Página Login *

          Funções:
            - faz login
            - verifica o login do usuario 
-->

<?php
require_once '../Conection/Conn.php';


    class Login extends Conn {
        
        public $msgErro = "";   
        private $tableCientista;

        public function __construct(){
            parent::__construct();
            $this->tableCientista = 'cientista';
        }
                                              
        public function Login($cpf_cientista, $snh_cientista)
        {
            $sql = $this->pdo->prepare("SELECT * FROM $this->tableCientista WHERE
            cpf_cientista = :b AND snh_cientista = '$snh_cientista'");
            $sql->bindValue(":b", $cpf_cientista);
            $sql->execute();

            /* se achar o usuario com cpf e senha digitado */
            if($sql->rowCount() > 0)
            { 
                $sql = $this->pdo->prepare(("SELECT id_cientista FROM $this->tableCientista WHERE cpf_cientista = :b; "));
                $sql->bindValue(":b", $cpf_cientista);
                $sql->execute();
                $id=$sql->fetch();
    
                if($sql->rowCount() > 0)
                {
                    session_start();
                    $_SESSION['login'] = $id['id_cientista'];
                    return true; 
                }
                else
                {
                    return false; 
                }
            }        
            return false;      
        }
    }

?>