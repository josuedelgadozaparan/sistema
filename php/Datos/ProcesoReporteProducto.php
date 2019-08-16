<?php

require_once  'Conexion.php';

class ProcesoReporteProducto {
 
        public  $host;
        public  $usuario;
        public  $password;
        public  $db;
         
        public  $tipo;
        public  $ced;
        public  $id;
        public  $nombre;
        public  $marca;
        public  $tipopro;
        public  $vacio=false;


   public function __construct()
  {
    
    $dato=new Conexion();
    $this->host=$dato->getHost();
    $this->user=$dato->getUser();
    $this->password =$dato->getPass();
    $this->db=$dato->getDatabase();
      
  } 
    
  
  public function Reporte_tabla_Producto() {
 //e conecxion
  $this->tipo='0'; 
  $this->nombre=''; 
  $this->marca=''; 
  $this->tipopro=''; 
  $this->id='';
  
   //Array asociativo que contendrá los datos
        $valores = array();
 
        
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
   $result = mysqli_query($connection,
   "CALL PRODUCTO_CONSULTAR('".$this->tipo."','".$this->nombre."','".$this->marca."','".$this->tipopro."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
     
   //Se crea un arreglo asociativo
                array_push($valores, $row);
 
     
 
  }
  
  return $valores;
}

}