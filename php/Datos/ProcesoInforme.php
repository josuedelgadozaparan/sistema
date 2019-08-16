<?php
require_once 'Conexion.php';


class ProcesoInventario {
   
        public  $host;
        public  $usuario;
        public  $password;
        public  $db;
        
        public  $tipo;
        public  $nombre;
        public  $tipopro;
        public  $id;
        public  $vacio;
    
        
        
        public function __construct()
  {
    
    
    $dato=new Conexion();
    $this->host=$dato->getHost();
    $this->user=$dato->getUser();
    $this->password =$dato->getPass();
    $this->db=$dato->getDatabase();
      
  }
  
   
  public function Consultar_tabla_Producto() {
  $this->tipo='0'; 
  $this->nombre=''; 
  $this->marca=''; 
  $this->tipopro=''; 
  $this->id=''; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL PRODUCTO_CONSULTAR('".$this->tipo."','".$this->nombre."','".$this->marca."','".$this->tipopro."','".$this->id."');") or die("Query fail: " . mysqli_error());
  echo "<tr><td>ID</td><td>NOMBRE</td><td>VALOR</td><td>CANTIDAD</td><td>CANT. MINIMA</td><td>MARCA</td><td>LINEA</td><td>TIPO</td><td>CODIGO</td><td></td></tr>";  
  while ($row = mysqli_fetch_array($result)){  
      
  echo "<tr><td>".$row['IdProducto'].".</td><td>".$row['NombreProducto'].".</td><td>".$row['ValorProducto']."</td><td>".$row['CantidadProducto']."</td><td>".$row['CantidadMinima']."</td><td>".$row['MarcaProducto']."</td><td>".$row['NombreLinea']."</td><td>".$row['NombreDetalleLinea']."</td><td>".$row['CodigoProducto']."</td><td><a  href=ModuloEditarInventario.php?d1=".$row['IdProducto']."><img src="."../../ico/edit.png"."></a><a   href=ModuloEliminarUsuario.php><img src="."../../ico/remove.png"."></a></td></tr>";
   
  $this->vacio=true;    
         
  }
     if($this->vacio == false)// verifico que la consulta no este vacia                                                                                                  
     {
         echo '.';  
     }
     return $this->vacio;
     
 }
 /*
 public function InsertarProducto($nom,$val,$can,$canmin,$marca,$nomlinea,$nomsub,$cod){
//echo $nom."-". $val."-". $can."-". $canmin. "-".$marca. "-".$nomlinea."-". $nomsub."-". $cod;
try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL PRODUCTO_INSERTAR('".$nom."','".$val."','".$can."','".$canmin."','".$marca."','".$nomlinea."','".$nomsub."','".$cod."');") or die("Query fail: " . mysqli_error());
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }
 
 

 public function Consultar_Producto_por_id($idpro) {
  $this->tipo='1'; 
  $this->nombre=''; 
  $this->marca=''; 
  $this->tipopro=''; 
  $this->id=$idpro;  
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
  "CALL PRODUCTO_CONSULTAR('".$this->tipo."','".$this->nombre."','".$this->marca."','".$this->tipopro."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
    


 $NombreProducto = $row['NombreProducto'];
 $ValorProducto= $row['ValorProducto'];
 $CantidadProducto= $row['CantidadProducto'];
 $CantidadMinima= $row['CantidadMinima'];
 $MarcaProducto = $row['MarcaProducto'];
 $TipoProducto = $row['TipoProducto'];
 $CodigoProducto = $row['CodigoProducto'];

 $productoeditar= array('NombreProducto'=> $NombreProducto, 'ValorProducto'=> $ValorProducto, 'CantidadProducto'=> $CantidadProducto,
      'CantidadMinima'=> $CantidadMinima,'MarcaProducto'=> $MarcaProducto, 'TipoProducto'=> $TipoProducto,
      'CodigoProducto'=> $CodigoProducto);

  $this->vacio=true;    
         
  }


      $json_detalleproducto = json_encode($productoeditar);
    
      
     return $json_detalleproducto;
     
 }
 
 

 public function ActualizarProducto($nom,$val,$can,$canmin,$marca,$tipopro,$cod,$id) {
  
    
 
try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL PRODUCTO_ACTUALIZAR('".$nom."','".$val."','".$can."','".$canmin."','".$marca."','".$tipopro."','".$cod."','".$id."');") or die("Query fail: " . mysqli_error());
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
   
 
     
 }
 
 */
 
}
