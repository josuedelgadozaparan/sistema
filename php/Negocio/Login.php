<?php

require_once dirname(__FILE__) . '/../Datos/ProcesoLogin.php';


class Login {
   public $vacio=false;
   
    
    public function ValidarLogin($user,$pass){
        
        if (empty($user)||empty($pass)){
            echo 'esta vacia';
         } else{
         $dato=new ProcesoLogin($user, $pass);
         $this->vacio=$dato->Login();
        }
        return $this->vacio;
    }
    
    
    
}
?>