<?php

require_once dirname(__FILE__) . '/../Datos/ProcesoConsecutivo.php';

class Consecutivo {
    public  $nomcon=null;
    
    

    public function ValidarConsultarNombre() {
        
        $dato=new ProcesoConsecutivo();
        $this->nomcon=$dato->ConsultarNombre() ;
        return $this->nomcon;

         }

   public function ValidarActualizarConsecutivo($nombre) {
        
         $dato=new ProcesoConsecutivo();
         $dato->ActualizarConsecutivo($nombre);
        

         }
   
}
