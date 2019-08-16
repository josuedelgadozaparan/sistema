<?php

require_once dirname(__FILE__) . '/../Datos/ProcesoPrestamo.php';

class Prestamo {
    public $vacio=false;
    
    public function ValidarConsultarClientePrestamo($cedula) {
        if($cedula==""){
           
           $this->vacio=true;
            return $this->vacio;
        }else{
        $dato=new ProcesoPrestamo();
        $this->vacio= $dato->ConsultarPretamoCedula($cedula);
        }
           
       
    }

    public function ValidarConsultarClienteP_id($id) {
        
        $dato=new ProcesoPrestamo();
        $json_dato= $dato->ConsultarPretamo_id($id) ;
        return  $json_dato;
        
           
       
    }

    public function ValidarInsertarPrestamo($cod,$fecha,$valor,$estado,$porcentaje,$valortotal,$saldo,$cuotas,$tipo,$cxu,$descripcion,$idcliente){

    $dato=new ProcesoPrestamo();
    $dato->InsertarPrestamo($cod, $fecha, $valor, $estado, $porcentaje, $valortotal, $saldo, $cuotas, $tipo, $cxu, $descripcion, $idcliente);
    

 }
 public function ValidarActualizarPrestamosaldo($saldo,$id){
$dato=new ProcesoPrestamo();
$dato->ActualizarPrestamosaldo($saldo, $id);

 
  

 
 }


public function ValidarActualizarRegistroCuota($id){
$dato=new ProcesoPrestamo();
$dato->ActualizarRegistroCuota($id);

 
  

 
 }
 public function ValidarActualizarEstadoPrestamo($id,$est){

$dato=new ProcesoPrestamo();
$dato->ActualizarEstadoPrestamo($id,$est);
    
}

 public function ValidarEliminarPrestamo($id){

$dato=new ProcesoPrestamo();
$dato->EliminarPrestamo($id);
    
}

 public function ValidarActualizarPrestamo_editar($valor,$valortotal,$saldo,$cod,$id,$cxu){

$dato=new ProcesoPrestamo();
$dato->ActualizarPrestamo_editar($valor,$valortotal,$saldo,$cod,$id,$cxu);
    
}




   
    
}
