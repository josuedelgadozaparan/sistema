<?php
require_once 'Conexion.php';

class ProcesoCliente {
    
    
    
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
  
  public function ConsultarClienteCedula($cedula) {
  $this->tipo='0'; 
  $this->ced=$cedula; 
  $this->id=''; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL CLIENTE_CONSULTAR('".$this->tipo."','".$this->ced."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
   echo "<tr><th style=".'display:none;'.">ID</th><th>CEDULA</th><th>NOMBRE</th><th>APELLIDO</th><th>DIRECCION RESIDENCIA</td><th>TELEFONO ESIDENCIA</th><th>DIRECCION DE OFICINA</th><th>TELEFONO DE OFICINA</th><th></tdh</tr>";  
     
  echo "<tr><td style=".'display:none;'.">".$row['IdCliente']."</td><td>".$row['CedulaCliente']."</td><td>".$row['NombreCliente']."</td><td>".$row['ApellidoCliente']."</td><td>".$row['DirResCliente']."</td><td>".$row['TelResCliente']."</td><td>".$row['DirOficliente']."</td><td>".$row['TelOfiCliente']."</td><td><a href=ModuloEditarCliente.php?d11=".$row['IdCliente']. "><img src="."../../ico/edit.png"."></a><a style=".'display:none;'." href="."../../ico/edit.png"."><img src="."../../ico/remove.png"."></a></td></tr>";
   
  $this->vacio=true;    
         
  }
     if($this->vacio == false)// verifico que la consulta no este vacia                                                                                                  
     {
         echo '.';  
     }
     return $this->vacio;
     
 }

 public function ConsultarClienteCedulaPrestamo($cedula) {
  $this->tipo='0'; 
  $this->ced=$cedula; 
  $this->id=''; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL CLIENTE_CONSULTAR('".$this->tipo."','".$this->ced."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
   echo "<tr><th style=".'display:none;'.">ID</th><th>CEDULA</th><th>NOMBRE</th><th>APELLIDO</th><th>DIRECCION RESIDENCIA</th><th>TELEFONO ESIDENCIA</th><th>DIRECCION DE OFICINA</th><th>TELEFONO DE OFICINA</th><th></th></tr>";  
     
  echo "<tr><td style=".'display:none;'.">".$row['IdCliente']."</td><td>".$row['CedulaCliente']."</td><td>".$row['NombreCliente']."</td><td>".$row['ApellidoCliente']."</td><td>".$row['DirResCliente']."</td><td>".$row['TelResCliente']."</td><td>".$row['DirOficliente']."</td><td>".$row['TelOfiCliente']."</td><td><a href=ModuloEditarCliente.php?d11=".$row['IdCliente']. "><img src="."../../ico/edit.png"."></a><a style=".'display:none;'."   href="."../../ico/edit.png"."><img src="."../../ico/remove.png"."></a></td></tr>";
   
  $this->vacio=true;    
         
  }
     if($this->vacio == false)// verifico que la consulta no este vacia                                                                                                  
     {
         echo '.';  
     }
     return $this->vacio;
     
 }
  
 
  public function ConsultarClienteTodos() {
  $this->tipo='1'; 
  $this->ced=''; 
  $this->id=''; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL CLIENTE_CONSULTAR('".$this->tipo."','".$this->ced."','".$this->id."');") or die("Query fail: " . mysqli_error());
  echo "<tr><th style=".'display:none;'.">ID</th><th>CEDULA</th><th>NOMBRE</th><th>APELLIDO</th><th>DIRECCION RESIDENCIA</th><th>TELEFONO RESIDENCIA</th><th>DIRECCION DE OFICINA</th><th>TELEFONO DE OFICINA</th><th></th></tr>";  
    
  while ($row = mysqli_fetch_array($result)){  
     
   echo "<tr><td style=".'display:none;'.">".$row['IdCliente']."</td><td>".$row['CedulaCliente']."</td><td>".$row['NombreCliente']."</td><td>".$row['ApellidoCliente']."</td><td>".$row['DirResCliente']."</td><td>".$row['TelResCliente']."</td><td>".$row['DirOficliente']."</td><td>".$row['TelOfiCliente']."</td><td><a href=ModuloEditarCliente.php?d11=".$row['IdCliente']." ><img src="."../../ico/edit.png"."></a><a style=".'display:none;'." href="."../../ico/edit.png"."><img src="."../../ico/remove.png"."></a></td></tr>";
  $_SESSION["cedulaclienteprestamo"]    = $row['CedulaCliente'];
  $this->vacio=true;    
         
  }
     if($this->vacio == false)// verifico que la consulta no este vacia                                                                                                  
     {
         echo '.';  
     }
     return $this->vacio;
     
 }


 public function ConsultarClienteId($idcli) {
  $this->tipo='2'; 
  $this->usuario=''; 
  $this->cedula=''; 
  $this->id=$idcli; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL CLIENTE_CONSULTAR('".$this->tipo."','".$this->ced."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
    
 $_SESSION["cedcli"]    = $row['CedulaCliente'];
 $_SESSION["nomcli"]    = $row['NombreCliente'];
 $_SESSION["apecli"]    = $row['ApellidoCliente'];
 $_SESSION["dirrescli"] = $row['DirResCliente'];
 $_SESSION["diroficli"] = $row['DirOficliente'];
 $_SESSION["telrescli"] = $row['TelResCliente'];
 $_SESSION["teloficli"] = $row['TelOfiCliente'];
 
 $cedcli    = $row['CedulaCliente'];
 $nomcli    = $row['NombreCliente'];
 $apecli    = $row['ApellidoCliente'];
 $dirrescli = $row['DirResCliente'];
 $diroficli = $row['DirOficliente'];
 $telrescli = $row['TelResCliente'];
 $teloficli = $row['TelOfiCliente'];

 $detalleclienteeditar = array('CedulaCliente'=> $cedcli, 'NombreCliente'=> $nomcli, 'ApellidoCliente'=> $apecli,
     'DirResCliente'=> $dirrescli,'DirOficliente'=> $diroficli, 'TelResCliente'=> $telrescli,
      'TelOfiCliente'=> $teloficli);
 
  $this->vacio=true;    
         
  }
    $json_detalleclienteeditar = json_encode($detalleclienteeditar);
    return $json_detalleclienteeditar;
      
     
 }


 
 
 public function InsertarCliente($ced,$nom,$ape,$dirres,$dirofi,$telres,$telofi,$idusu) {
   //echo $ced.$nom.$dirres.$dirofi.$telres.$telofi.$idusu;
  
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL CLIENTE_INSERTAR('".$ced."','".$nom."','".$ape."','".$dirres."','".$dirofi."','".$telres."','".$telofi."','".$idusu."');") or die("Query fail: " . mysqli_error());
  
   
 
     
 }

 public function ActualizarCliente($ced,$nom,$ape,$dirres,$dirofi,$telres,$telofi,$idusu,$idcli) {
  
    
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL CLIENTE_ACTUALIZAR('".$ced."','".$nom."','".$ape."','".$dirres."','".$dirofi."','".$telres."','".$telofi."','".$idusu."','".$idcli."');") or die("Query fail: " . mysqli_error());
  
  
   
 
     
 }
  
  
  
    
    
}


