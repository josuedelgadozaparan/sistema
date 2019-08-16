
<?php

require_once  'Conexion.php';

class ProcesoUsuarioTabla{
    
        public  $host;
        public  $usuario;
        public  $password;
        public  $db;
        
        public  $tipo;
        public  $login;
        public  $cedula;
        public  $vacio;
       
       
        
       

        
        
        
    public function __construct()
  {
    
    
    $dato=new Conexion();
    $this->host=$dato->getHost();
    $this->user=$dato->getUser();
    $this->password =$dato->getPass();
    $this->db=$dato->getDatabase();
      
  }
   
  
  public function Consultar_tabla_Usuario() {
  $this->tipo='0'; 
  $this->usuario=''; 
  $this->cedula=''; 
  $this->id=''; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL USUARIO_CONSULTAR('".$this->tipo."','".$this->login."','".$this->cedula."','".$this->id."');") or die("Query fail: " . mysqli_error());
  echo "<tr><th style=".'display:none;'.">ID</th><th>USUARIO</th><th>PASSWORD</th><th>NOMBRE</th><th>CELULAR</th><th>DIRECCION</th><th>DOCUMENTO</th><th  style=".'display:none;'."s>IDPERFIL</th><th>PERFIL</th><th></th></tr>";  
  while ($row = mysqli_fetch_array($result)){  
      
  echo "<tr><td style=".'display:none;'.">".$row['IdUsuario']."</td><td>".$row['LoginUsuario']."</td><td>".$row['ContraseniaUsuario']."</td><td>".$row['NombreUsuario']."</td><td>".$row['CelularUsuario']."</td><td>".$row['DireccionUsuario']."</td><td>".$row['DocumentoUsuario']."</td><td style=".'display:none;'.">".$row['IdPerfil']."</td><td>".$row['NombrePerfil']."</td><td><a  href=ModuloEditarUsuario.php?d1=".$row['IdUsuario']."><img src="."../../ico/edit.png"."></a><a href=http://localhost:8080/tarea/php/Datos/ProcesoAjax.php?valorCaja2=D&valorCaja3=".$row['IdUsuario']."  ><img src="."../../ico/remove.png"."></td></tr>";
   
  $this->vacio=true;    
         
  }
     if($this->vacio == false)// verifico que la consulta no este vacia                                                                                                  
     {
         echo '.';  
     }
     return $this->vacio;
     
 }
  
 
  public function Consultar_Usuario_por_id($idusuario) {
  $this->tipo='1'; 
  $this->usuario=''; 
  $this->cedula=''; 
  $this->id=$idusuario; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL USUARIO_CONSULTAR('".$this->tipo."','".$this->login."','".$this->cedula."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
    
/* $_SESSION["login"] = $row['LoginUsuario'];
 $_SESSION["pass"] = $row['ContraseniaUsuario'];
 $_SESSION["nom"] = $row['NombreUsuario'];
 $_SESSION["cel"]= $row['CelularUsuario'];
 $_SESSION["dir"] = $row['DireccionUsuario'];
 $_SESSION["doc"] = $row['DocumentoUsuario'];
 $_SESSION["per"] = $row['IdPerfil']; */

 $login = $row['LoginUsuario'];
 $pass= $row['ContraseniaUsuario'];
 $nom= $row['NombreUsuario'];
 $cel= $row['CelularUsuario'];
 $dir = $row['DireccionUsuario'];
 $doc = $row['DocumentoUsuario'];
 $per = $row['IdPerfil'];

 $usuarioeditar= array('LoginUsuario'=> $login, 'ContraseniaUsuario'=> $pass, 'NombreUsuario'=> $nom,
     'CelularUsuario'=> $cel,'DireccionUsuario'=> $dir, 'DocumentoUsuario'=> $doc,
      'IdPerfil'=> $per);

  $this->vacio=true;    
         
  }


      $json_detalleusuario = json_encode($usuarioeditar);
    
      
     return $json_detalleusuario;
     
 }
 
 
  public function InsertarUsuario($login,$pass,$nom,$cel,$dir,$doc,$per) {
  
   //echo $login." ".$pass." ".$nom." ".$cel." ".$dir." ".$doc." ".$per." ".$id ;
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL USUARIO_INSERTAR('".$login."','".$pass."','".$nom."','".$cel."','".$dir."','".$doc."','".$per."');") or die("Query fail: " . mysqli_error());
  //echo '<meta http-equiv="refresh" content="1;URL=../Presentacion/ModuloUsusarioTabla.php" />';
   //sleep(3);
 
     
 }
 
 public function ActualizarUsuario($login,$pass,$nom,$cel,$dir,$doc,$per,$id) {
  
     //echo $login." ".$pass." ".$nom." ".$cel." ".$dir." ".$doc." ".$per." ".$id ;
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $sql="CALL USUARIO_ACTUALIZAR('".$login."','".$pass."','".$nom."','".$cel."','".$dir."','".$doc."','".$per."','".$id."');";
  $result = mysqli_query($connection,$sql) or die("Query fail: " . mysqli_error($connection));
  
   
 
     
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
    
}
