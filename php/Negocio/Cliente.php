<?php

require_once dirname(__FILE__) . '/../Datos/ProcesoCliente.php';
 
class Cliente {
    public $vacio=false;
    
    public function ValidarConsultarClienteCedula($cedula) {
        if($cedula==""){
             echo '<h4>Favor ingrese el numero de cedula</h4>';
           $this->vacio=true;
            return $this->vacio;
        }else{
        $dato=new ProcesoCliente();
        $this->vacio= $dato->ConsultarClienteCedula($cedula);
        return $this->vacio;
        }
           
       
    }

    public function ValidarConsultarClienteCedulaPrestamo($cedula) {
        if($cedula==""){
            echo '<h4>Favor ingrese el numero de cedula</h4>';
           $this->vacio=true;
            return $this->vacio;
        }else{
        $dato=new ProcesoCliente();
        $this->vacio= $dato->ConsultarClienteCedulaPrestamo($cedula);
        return $this->vacio;
        }
           
       
    }
    
    public function ValidarConsultarClienteId($idcli){
       $dato=new ProcesoCliente();
        $json= $dato->ConsultarClienteId($idcli);
    return $json;
        
    }
    
    
    public function ValidarConsultarClienteTodos() {
        $dato=new ProcesoCliente();
        $this->vacio= $dato->ConsultarClienteTodos();
        return $this->vacio;
    }
    
    
     public function ValidarInsertarCliente($ced,$nom,$ape,$dirres,$dirofi,$telres,$telofi,$idusu){
        $dato=new ProcesoCliente();
        $dato->InsertarCliente($ced, $nom, $ape, $dirres, $dirofi, $telres, $telofi, $idusu);
        
    }
    
    
    public function ValidarActualizarCliente($ced,$nom,$ape,$dirres,$dirofi,$telres,$telofi,$idusu,$id){
        $dato=new ProcesoCliente();
        $dato->ActualizarCliente($ced, $nom, $ape, $dirres, $dirofi, $telres, $telofi, $idusu, $id);
        
    }
    
}
