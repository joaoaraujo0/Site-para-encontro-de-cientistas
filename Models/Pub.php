<!-- 
      * Página Pub *

          Funções:
            - getters e setters do projeto

-->

<?php
include '../Dao/Publicacao.php';

class Pub{

private $tit_projeto;
private $res_projeto;
private $dti_projeto;
private $dtt_projeto;
private $pub_projeto;
private $Publicacao;


public function __construct($tit_projeto, $res_projeto, $dti_projeto,$dtt_projeto,$pub_projeto)
{
    $this->tit_projeto = $tit_projeto;  
    $this->res_projeto = $res_projeto;
    $this->dti_projeto = $dti_projeto;
    $this->dtt_projeto = $dtt_projeto;
    $this->pub_projeto = $pub_projeto;
    $this->Publicacao=new Publicacao();
}

//Metodos Set
public function settit_projeto($string){
    $this->tit_projeto = $string;
}
public function setres_projeto($string){
    $this->res_projeto = $string;
}
public function setdti_projeto($string){
    $this->dti_projeto = $string;
}

public function setdtt_projeto($string){
    $this->dtt_projeto = $string;
}
public function setpub_projeto($string){
    $this->pub_projeto = $string;
}


//Metodos Get
public function gettit_projeto(){
    return $this->tit_projeto;
}
public function getres_projeto(){
    return $this->res_projeto;
}
public function getdti_projeto(){
    return $this->dti_projeto;
}
public function getdtt_projeto(){
    return $this->dtt_projeto;
}
public function getpub_projeto(){
    return $this->pub_projeto;
}


    public function CadastroPub($id){

          /*Cadastra na tabela projeto*/
        return $this->Publicacao->setCadastroPub($this->gettit_projeto(),$this->getres_projeto(), 
        $this->getdti_projeto(), $this->getdtt_projeto(), $this->getpub_projeto(),$id);
    }  
}
?>