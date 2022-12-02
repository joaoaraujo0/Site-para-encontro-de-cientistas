<?php 
    /* definir a url padrao */
    
    define('APP', dirname(__FILE__));
    define('URL', 'http://localhost/crudizinho_php_mvc_pdo/index.php');

    /* conectar no banco */

    global $msgErro;   
    
    define('HOST','localhost');
    define('DATABASENAME','projeto_scilink');
    define('USER','root');
    define('PASSWORD','');
    class Conn{

        protected $pdo;

        function __construct()
        {
            $this->conectar();
        }
        
        function conectar() 
        {
            
            global $msgErro;
            try 
            {
                $this->pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);
            } catch (PDOException $e) 
            {
                $msgErro = $e->getMessage();
            }
        }
    }
?>