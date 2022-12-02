<!-- 
      * Página User *

          Funções:
            - getters e setters do cientista

-->

<?php
include '../Dao/CadastraPerfil.php';

class UserPerfil extends CadastraPerfil{
    private $nom_titulacao;
    private $nom_area_atuacao;
    private $end_rede_social;
    private $dti_formacao;
    private $ddd_telefone;
    private $dtt_formacao;
    private $num_telefone;
    private $CadastraPer;

    public function __construct($nom_titulacao, $nom_area_atuacao, $end_rede_social, $dti_formacao,
    $ddd_telefone,$dtt_formacao ,$num_telefone)
    {
        $this->nom_titulacao = $nom_titulacao;
        $this->nom_area_atuacao = $nom_area_atuacao;
        $this->end_rede_social = $end_rede_social;
        $this->dti_formacao = $dti_formacao;
        $this->ddd_telefone = $ddd_telefone;
        $this->dtt_formacao = $dtt_formacao;
        $this->num_telefone = $num_telefone;
        $this->CadastraPer=new CadastraPerfil();
    }

    //Metodos Set
    public function setnom_titulacao($string){
        $this->nom_titulacao = $string;
    }
    public function setnom_area_atuacao($string){
        $this->nom_area_atuacao = $string;
    }
    public function setend_rede_social($string){
        $this->end_rede_social = $string;
    }
    public function setdti_formacao($string){
        $this->dti_formacao = $string;
    }
    public function setddd_telefone($string){
        $this->ddd_telefone = $string;
    }
    public function setdtt_formacao($string){
        $this->dtt_formacao = $string;
    }
    public function setnum_telefone($string){
        $this->num_telefone = $string;  
    }
 
    
    //Metodos Get
    public function getnom_titulacao(){
        return $this->nom_titulacao;
    }
    public function getnom_area_atuacao(){
        return $this->nom_area_atuacao;
    }
    public function getend_rede_social(){
        return $this->end_rede_social;
    }
    public function getdti_formacao(){
        return $this->dti_formacao;
    }
    public function getddd_telefone(){
        return $this->ddd_telefone;
    }
    public function getdtt_formacao(){
        return $this->dtt_formacao;
    }
    public function getnum_telefone(){
        return $this->num_telefone;
    }
   
    
    public function CadastraPerfil($id)
    {
        /*Cadastra nas tabelas area_atuacao, formacao, rede_sociais, telefone, titulacao */
        return $this->CadastraPer->setCadastroPerfil($this->getnom_titulacao(), $this->getnom_area_atuacao(),
        $this->getend_rede_social(), $this->getdti_formacao(),
        $this->getdtt_formacao(), $this->getddd_telefone(), $this->getnum_telefone(),$id);
    }
}










?>