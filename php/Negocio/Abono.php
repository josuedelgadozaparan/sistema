<?php

require_once dirname(__FILE__) .'/../Datos/ProcesoAbono.php';

class Abono {
    public $vacio=false;
    
    

    public function ValidarConsultarAbonos($id) {
        
        $dato=new ProcesoAbono();
        $dato->ConsultarAbonos($id) ;
         }

    public function ValidarInsertarAbono($idpre,$valor,$pendiente,$fecha){
        
        $dato=new ProcesoAbono();
        $dato->InsertarAbono($idpre, $valor, $pendiente, $fecha);
         
    }
   
    public function ValidarEliminarAbono($ida,$idp,$valor){
        
        $dato=new ProcesoAbono();
        $dato->EliminarAbono($ida,$idp,$valor);
         
    }

 public function ValidarEditarAbono($ida,$idp,$valororiginal,$nuevovalor){
        
        $dato=new ProcesoAbono();
        $dato->EditarAbono($ida,$idp,$valororiginal,$nuevovalor);
         
    }

}
