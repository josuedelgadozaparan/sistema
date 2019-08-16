<?php
require_once 'Conexion.php';

class ProcesoFactura {
 
 public  $host;
        public  $usuario;
        public  $password;
        public  $db;
         
        public  $tipo;
        public  $ced;
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
  
  
public function InsertarFactura($numfact,$cantidad,$sub,$iva,$total,$ob,$idcli,$idusu){
//echo $numfact."-".$cantidad."-".$sub."-".$iva."-".$total."-".$ob."-".$idcli."-".$idusu;
try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL FACTURA_INSERTAR('".$numfact."','".$cantidad."','".$sub."','".$iva."','".$total."','".$ob."','".$idcli."','".$idusu."');") or die("Query fail: " . mysqli_error());
  
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }
    
 
 public function Consultarultimafacturaid() {

            $idfactura="";
            $this->cod=" ";
            $this->tipo='1'; 
            $this->id=''; 
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query(
              $connection,
              "CALL FACTURA_CONSULTAR('".$this->tipo."','".$this->cod."','".$this->id."');"
            ) or die("Query fail: " . mysqli_error());

            while($row = mysqli_fetch_array($result))
            {  
              $idfactura=$row['MAX(IdFactura)'];
            }
            return $idfactura;
           
}

    
    
}
