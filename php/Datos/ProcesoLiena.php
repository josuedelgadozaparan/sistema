<?php
require_once 'Conexion.php';

class ProcesoLiena {
    
    
    
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
  
  

 
  public function ConsultartododetalleLinea() {
  $this->tipo='1'; 
  $this->nom="";
  $this->id=""; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
  "CALL DETALLELINEA_CONSULTAR('".$this->tipo."','".$this->nom."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
   echo "<option >".$row['NombreLinea']."</option>";
            
  }
   
 }






 

 public function ConsultarnombredetalleLinea($nombre) {
  $this->tipo='3'; 
  $this->nom=$nombre;
  $this->id=""; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
  "CALL DETALLELINEA_CONSULTAR('".$this->tipo."','".$this->nom."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
   echo "<option >".$row['NombreLinea']."</option>";
            
  }
   
 }



 public function InsertarLinea($nom){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL LINEA_INSERTAR('".$nom."');") or die("Query fail: " . mysqli_error());
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }


    
}

?>


