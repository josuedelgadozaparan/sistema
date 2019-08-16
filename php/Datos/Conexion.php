<?php

class Conexion{
    private $mySQLI; 
    public  $host;
    public  $user;
    public  $pass;
    public  $database;


 public function __construct()
  {
    /*
    $this->host="mysql.1freehosting.com";
    $this->user="u129906098_pr";
    $this->pass="a123456789";
    $this->database="u129906098_pr";
   */
	  $this->host="localhost";
    $this->user="root";
    $this->pass="";
    $this->database="sistemaprestamo";
     
  }

 
public function conectar(){
 $this->mySQLI = new mysqli($this->host,$this->user,$this->pass,$this->database);
if(mysqli_connect_error()){
  echo"error en la base de datos".$objconexion->connect_errno;
 }else{
    echo".";
   }
}

public function cerrar() {
    $this->mySQLI->close();
   }


   
  public function getHost() {
      return $this->host;
  }

  public function getUser() {
      return $this->user;
  }

  public function getPass() {
      return $this->pass;
  }

  public function getDatabase() {
      return $this->database;
  }

  public function setHost($host) {
      $this->host = $host;
  }

  public function setUser($user) {
      $this->user = $user;
  }

  public function setPass($pass) {
      $this->pass = $pass;
  }

  public function setDatabase($database) {
      $this->database = $database;
  }

    



    ///////////////////////////////////////////////////////////////////////////////
    function logeo($user,$pass) {
      $objconexion=new mysqli("localhost", "root", "", "pruebalogin");
      $sql="SELECT id,password FROM usuario WHERE id='".$user."'AND password='".$pass."' "  ;
      $resultado=$objconexion->query($sql)  ;
      
     while($apre=$resultado->fetch_array()){
         echo $apre['id'];
         echo $apre['password'];
         
         
         if ( ( $apre['id']=$user )&&( $apre['password'] =$pass) ) {
             echo "estamos bn";
               
                $usuario=$user;
             header ("Location:php/pag1.php");
         }
         
         
         
     } }
//////////////////////////////////////////////////////////////////////////////
    

}





?>