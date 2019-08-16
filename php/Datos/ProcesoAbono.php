<?php
require_once 'Conexion.php';

class ProcesoAbono {
    
    
    
        public  $host;
        public  $usuario;
        public  $password;
        public  $db;
         
        public  $tipo;
        public  $cod;
        public  $id;
        public  $vacio=false;


   public function __construct()
  {
    
    $dato=new Conexion();
    $this->host=$dato->getHost();
    $this->user=$dato->getUser();
    $this->password =$dato->getPass();
    $this->db=$dato->getDatabase();
      
  }
  
  
 
 
  public function ConsultarAbonos($idprestamo) {
  $this->tipo='1'; 
  $this->cod="";
  $this->id=$idprestamo; 
  $this->vacio=false; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  
   
  $result = mysqli_query($connection,
  "CALL ABONO_CONSULTAR('".$this->tipo."','".$this->cod."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
    echo "<tr><td style=".'display:none;'.">".$row['IdAbono']."</td><td style=".'display:none;'.">".$row['IdPrestamo']."</td><td>".$row['ValorAbono']."</td><td>".$row['PendientePagar']."</td><td>".$row['FechaAabono']."</td>"
    
    ?>
      					
	<td><p  data-placement="top" data-toggle="tooltip" title="Delete"><button class="boton2 btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    
    <?php

    "</tr>";
  
    


     
         
  }


    
     
 }



 public function InsertarAbono($idpre,$valor,$pendiente,$fecha){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL ABONO_INSERTAR('".$idpre."','".$valor."','".$pendiente."','".$fecha."');") or die("Query fail: " . mysqli_error());
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }


public function EliminarAbono($ida,$idp,$valor){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL ELIMINAR_ABONO('".$ida."','".$idp."','".$valor."');") or die("Query fail: " . mysqli_error());
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }

 public function EditarAbono($ida,$idp,$valororiginal,$nuevovalor){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL EDITAR_ABONO('".$ida."','".$idp."','".$valororiginal."','".$nuevovalor."');") or die("Query fail: " . mysqli_error());
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }

    
}

?>


