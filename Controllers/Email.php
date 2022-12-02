<!-- 
      * Página Email *

          Funções:
            - Controller que linka com os arquivos do PHPMailer, instancia o objeto, cria o token
            de autentificacao, envia o email do cientista cadastro no banco
-->

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../Dao/Email.php';
require_once "../View/email/PHPMailer/src/PHPMailer.php";
require_once "../View/email/PHPMailer/src/SMTP.php";
require_once "../View/email/PHPMailer/src/Exception.php";    


global $recuperaEmail;
global $tokenUsuario;
class Email
{
    private $token;
    private $em;
    
    public function __construct()
    {
        
        $this->em = new EnviarEmail();
        $this->token = rand(11111, 99999);
    }
     
    public function Verifica()
    {
        global $recuperaEmail;
                /*Verificar se email digitado pelo usuario bate com o do banco*/
            if ($this->em->verificaEmail($recuperaEmail) == true) 
            {
                /*Mudar a senha para um token*/
                if($this->em->token($this->token,$recuperaEmail)==true)
                { 
                    return true;
                }
                else{
                    echo 'erro';exit;
                }
            }
            else {
                echo 'erro2';exit;
            }
    }

    public function VerificaToken()
    {
        if (isset($_POST["tokenUsuario"])) 
        { 
            $tokenUsuario = addslashes($_POST["tokenUsuario"]);
                /*Verificar se o token que o usuario digitou esta igual ao do banco*/
                if($this->em->verificaToken($tokenUsuario)==true)
                    { 
                        header('location:../View/TrocarSenha.php');
                    }  
                    else{
                        echo ('token digitado errado');exit;
                    }
            
        }
    }
    
    public function MudarSenha()
    {
        if (isset($_POST["novaSenha"])) 
        { 
        $novaSenha = mb_strimwidth(addslashes (md5($_POST['novaSenha'])), 0, 10);
        
        /*Mudar senha do token para a senha digitada pelo usuario*/
        if($this->em->novaSenha($novaSenha,$_SESSION['recuperaEmail'])==true){
            echo "<SCRIPT> //not showing me this
            alert('Senha trocada com sucesso')
            window.location.replace('../../app/View/LoginCadastro.php');
            </SCRIPT>";
         }
        }
    }

    public function EnviarEmail()
    {
        global $recuperaEmail;
        $this->token = rand(11111, 99999);
        
        /*Verifica se email bate com o digitado no banco*/
        if ($this->Verifica() == true) {

            $mail = new PHPMailer(true);

            //Enable SMTP debugging.
            $mail->SMTPDebug = 0;

            //Set PHPMailer to use SMTP.
            $mail->isSMTP();

            //Set SMTP host name                          
            $mail->Host = "smtp.gmail.com";

            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Provide username and password     
            $mail->Username = "scilinktrab@gmail.com";
            $mail->Password = "ynxgturznxvpcnmt";

            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";

            //Set TCP port to connect to
            $mail->Port = 587;

            $mail->From = "scilinktrab@gmail.com";
            $mail->FromName = "Scilink";

            $mail->addAddress($recuperaEmail, "");

            $mail->isHTML(true);

            $mail->Subject = "Token - Recuperar Senha";

            $mail->Body = "<h2>Seu token para recuperar a senha é :{$this->token}</h2>";
            
            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }

            header('location: ../View/Token.php');


        }
    }
}
/*Receber chamado de funções*/
$acao = $_POST['acao'];

  if (isset($_POST["recuperaEmail"])) {
    $recuperaEmail = addslashes($_POST["recuperaEmail"]);
    $_SESSION['recuperaEmail'] =($_POST["recuperaEmail"]);
  }
if ($acao == "EnviarEmail") 
{
    $controle = new Email();
    $controle->EnviarEmail();
} 
else if ($acao == "VerificaToken") 
{
    $controle = new Email();
    $controle->VerificaToken();
}
else if ($acao == "novaSenha") 
{
    $controle = new Email();
    $controle->MudarSenha();
}

