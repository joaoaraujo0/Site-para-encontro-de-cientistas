<!-- 
      * Página CadastraPub *

          Funções:
            - Inserir os dados na publicacao que o cientista criou
-->

<?php

require_once '../Conection/Conn.php';
    class CadastraPub extends Conn{
        private $tableProjeto;

        function __construct()
        {
            parent::__construct();
            $this->tableProjeto = 'projeto';
        }

        public function setCadastroPub($tit_projeto, $dti_projeto, $dtt_projeto,$res_projeto, $pub_projeto)
        {

                $sql = $this->pdo->prepare("INSERT INTO $this->tableProjeto (tit_projeto,dti_projeto,dtt_projeto,res_projeto,pub_projeto) 
                VALUES (:a, :b,:c,:d,:e)");

                $sql->bindValue(":a", $tit_projeto);
                $sql->bindValue(":b", $dti_projeto);
                $sql->bindValue(":c", $dtt_projeto);
                $sql->bindValue(":d", $res_projeto);
                $sql->bindValue(":e", $pub_projeto);
                $sql->execute();
                
                return true;
                 
            }
}
    
?>