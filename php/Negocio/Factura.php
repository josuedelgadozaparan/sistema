<?php

require_once dirname(__FILE__) . '/../Datos/ProcesoFactura.php';

                                    
class Factura{
    public $vacio=false;
    
    

public function ValidarInsertarFactura($numfact,$cantidad,$sub,$iva,$total,$ob,$idcli,$idusu){
$dato = new ProcesoFactura();
$dato->InsertarFactura($numfact, $cantidad, $sub, $iva, $total, $ob, $idcli, $idusu);
      

}

public function ValidarConsultarultimafacturaid() {
$idfactura="";
$dato = new ProcesoFactura();
$idfactura=$dato->Consultarultimafacturaid();

return $idfactura;
}
    
   
}

 
    
   



