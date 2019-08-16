<?php @session_start();?>
<?php
require_once 'Conexion.php';
class ProcesoLogin{
              public  $host;
        public  $user;
        public  $password;
        public  $db;
        
        
        public  $login;
        public  $contra;
        
        public  $vacio=false;

   public function __construct( $usuario, $pass)
  {
    $this->login=$usuario;
    $this->contra=$pass;
    
    $dato=new Conexion();
    $this->host=$dato->getHost();
    $this->user=$dato->getUser();
    $this->password =$dato->getPass();
    $this->db=$dato->getDatabase();
      
  }
   
 public function Login() {
     
     try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
   $result = mysqli_query($connection,
  "CALL LOGIN_CONSULTAR('".$this->login."','".$this->contra."');")
   or die("Query fail: " . mysqli_error() ." aqui ".$this->login.$this->contra
  .$this->host. $this->user.$this->password.$this->db);
    while ($row = mysqli_fetch_array($result)){   
      $_SESSION["aaa"]=$row['IdUsuario']; //LoginUsuario @
      $_SESSION["bbb"]=$row['LoginUsuario'];
    
$this->vacio =1;
  }
  echo $_SESSION["aaa"].$_SESSION["bbb"];
     if($this->vacio == false)
     {
         echo '.';  
     }
     return $this->vacio;   
 
} catch (Exception $e) {
    echo $e->getMessage();
}
          
 }
}
?>