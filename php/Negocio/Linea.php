<?php

require_once dirname(__FILE__) . '/../Datos/ProcesoLiena.php';


                                    


class Liena {
   
    public function Validar_InsertarLinea($nom){
      $dato = new ProcesoLiena();
      $dato->InsertarLinea($nom);
            
    }

    public function ValidarConsultartododetalleLinea(){
      $dato = new ProcesoLiena();
      $dato->ConsultartododetalleLinea();
            
    }

     public function ValidarConsultarnombredetalleLinea($nombre){
      $dato = new ProcesoLiena();
      $dato->ConsultarnombredetalleLineaa($nombre);
            
    }
    



}
