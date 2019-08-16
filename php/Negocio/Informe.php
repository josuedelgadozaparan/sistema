<?php

require_once __DIR__ . '/../Datos/ProcesoInventario.php';
require_once '../Datos/ProcesoReporteProducto.php';

                                    


class Inventario {
   
    public function Validar_Consultar_tabla_Producto(){
        
        $dato = new ProcesoInventario();
        $dato->Consultar_tabla_Producto();
        
        
    }
    
    public function ValidarInsertarProducto($nom,$val,$can,$canmin,$marca,$nomlinea,$nomsub,$cod){
     
        
        $dato = new ProcesoInventario();
        $dato->InsertarProducto($nom, $val, $can, $canmin, $marca, $nomlinea, $nomsub, $cod);
        
    }
    
    public function ValidarConsultarproductoId($idpro){
       $dato=new ProcesoInventario();
        $json= $dato->Consultar_Producto_por_id($idpro);
    return $json;
        
    }
    

public function ValidarActualizarProducto($nom,$val,$can,$canmin,$marca,$tipopro,$cod,$id) {
$dato=new ProcesoInventario();
        $dato->ActualizarProducto($nom, $val, $can, $canmin, $marca, $tipopro, $cod,$id);
}



public function ValidadReporteProducto() {
                                    
                                    $seleccion = new ProcesoReporteProducto();
                                    $datosReporte = $seleccion->Reporte_tabla_Producto();
                                    $pdf = new PDF();
                                    $pdf->AddPage();
                                    $miCabecera = array( 'Nombre', 'Nick', 'Correo');
                                    $pdf->tablaHorizontal($miCabecera, $datosReporte);
                                    //$pdf->Output(); //Salida al navegador
    
}



}
