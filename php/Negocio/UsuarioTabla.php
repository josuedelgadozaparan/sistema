<?php

require_once dirname(__FILE__)  . '/../Datos/ProcesoUsuarioTabla.php';

class UsuarioTabla {
    
    
       
    
    
    public function Validar_Consultar_tabla_Usuario() {
        $dato=new ProcesoUsuarioTabla();
        $dato->Consultar_tabla_Usuario();
        
    }
    
    public function Validar_Consultar_Usuario_por_id($id) {
        $dato=new ProcesoUsuarioTabla();
       $json= $dato->Consultar_Usuario_por_id($id);
       return $json;

        
    }
 
public function ValidarInsertarUsuario($login,$pass,$cpass,$nom,$cel,$dir,$doc,$per) {

if($login==""||$pass==""||$nom==""||$cel==""||$dir==""||$doc=="")
{


}
else
{
 if($per=="ADMINISTRADOR")
 {
   $perfil=1;
 }
 else
 {
   $perfil=2;
       
 }
 if($pass==$cpass)
 {
  //usleep(9000000);
    $dato=new ProcesoUsuarioTabla();
    $dato->InsertarUsuario($login, $pass, $nom, $cel, $dir, $doc, $perfil);
   }
   else
   {
    echo "LAS CONTRASEÑAS NO COINCIDE";
   }
 }
   
}

public function ValidarActualizarUsuario($login,$pass,$nom,$cel,$dir,$doc,$per,$id) {
   if($per=="ADMINISTRADOR"){
       $perfil=1;
   }else{
         $perfil=2;
       
   }
    
    $dato=new ProcesoUsuarioTabla();
    $dato->ActualizarUsuario($login, $pass, $nom, $cel, $dir, $doc, $perfil, $id);
    
}
 
    
}
?>