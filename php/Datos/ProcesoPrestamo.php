<?php
require_once  'Conexion.php';

class ProcesoPrestamo {
    
    
    
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
  
  public function ConsultarPretamoCedula($cedula) {
  $this->tipo='1'; 
  $this->ced=$cedula;
  $this->id=''; 
  $this->vacio=false; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  echo "<tr><th style=".'display:none;'.">ID</th><th>CEDULA</th><th>CODIGO</th><th>FECHA</th><th>VALOR</th><th>ESTADO</th><th>%%</th><th>TOTAL</th><th>SALDO</th><th>CUOTAS</th><th>ABONADAS</th><th>CxU</th><th></th></th><th></th></tr>";  
   $result = mysqli_query($connection,
  "CALL PRETAMOS_CONSULTAR('".$this->tipo."','".$this->ced."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
   echo "<tr><td style=".'display:none;'.">".$row['IdPrestamo']."</td><td>".$row['CedulaCliente']."</td><td>".$row['CodigoPrestamo']."</td><td>".$row['FechaPrestamo']."</td><td>".$row['ValorPrestamo']."</td><td>".$row['EstadoPrestamo']."</td><td>".$row['PorcentajePrestamo']."</td><td>".$row['ValorTotalprestamo']."</td><td>".$row['SaldoPrestamo']."</td><td>".$row['CuotasPrestamo']."</td><td>".$row['CuotasAbonadas']."</td><td>".$row['CxU']."</td><td><a href=ModuloDetallePrestamo.php?d1=".$row['IdPrestamo']." >Abonar</a></td>"
 ?>
      					
	<td><p  data-placement="top" data-toggle="tooltip" title="Delete"><button class="boton2 btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    
    <?php
   "</tr>";
   
  $this->vacio=true;    
         
  }
     if($this->vacio == false)// verifico que la consulta no este vacia    tree                                                                                                                                                                                                                                             
     {
         echo '.';  
     }
     return $this->vacio;
     
 }
  public function ConsultarPretamo_id($idpres) {
  $this->tipo='2'; 
  $this->ced="";
  $this->id=$idpres; 
  $this->vacio=false; 
  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
  "CALL PRETAMOS_CONSULTAR('".$this->tipo."','".$this->ced."','".$this->id."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  
    $IdPrestamo=$row['IdPrestamo'];
    $CodigoPrestamo=$row['CodigoPrestamo'];
    $FechaPrestamo=$row['FechaPrestamo'];
    $ValorPrestamo=$row['ValorPrestamo'];
    $EstadoPrestamo=$row['EstadoPrestamo'];
    $PorcentajePrestamo=$row['PorcentajePrestamo'];
    $ValorTotalprestamo=$row['ValorTotalprestamo'];
    $SaldoPrestamo=$row['SaldoPrestamo'];
    $CuotasPrestamo=$row['CuotasPrestamo'];
    $CuotasAbonadas=$row['CuotasAbonadas'];
    $Tipo=$row['Tipo'];
    $CxU=$row['CxU'];
    $DescripcionPrestamo=$row['DescripcionPrestamo'];
    $IdCliente=$row['IdCliente'];

    $detalleprestamo = array('IdPrestamo'=> $IdPrestamo, 'CodigoPrestamo'=> $CodigoPrestamo, 'FechaPrestamo'=> $FechaPrestamo,
     'ValorPrestamo'=> $ValorPrestamo,'EstadoPrestamo'=> $EstadoPrestamo, 'PorcentajePrestamo'=> $PorcentajePrestamo,
      'ValorTotalprestamo'=> $ValorTotalprestamo,'SaldoPrestamo'=> $SaldoPrestamo,'CuotasPrestamo'=> $CuotasPrestamo,'CuotasAbonadas'=> $CuotasAbonadas,
      'Tipo'=>$Tipo,'CxU'=>$CxU,'DescripcionPrestamo'=>$DescripcionPrestamo,'IdCliente'=> $IdCliente);



     
         
  }


    $json_detalleprestamo = json_encode($detalleprestamo);
    
    

     
     return $json_detalleprestamo;
     
 }


public function InsertarPrestamo($cod,$fecha,$valor,$estado,$porcentaje,$valortotal,$saldo,$cuotas,$tipo,$cxu,$descripcion,$idcliente){
//echo $cod."....".$fecha."....".$valor."....".$estado."....".$porcentaje.".....".$valortotal."....".$saldo."....".$cuotas."....".$descripcion."....".$idcliente;

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL PRESTAMO_INSERTAR('".$cod."','".$fecha."','".$valor."','".$estado."','".$porcentaje."','".$valortotal."','".$saldo."','".$cuotas."','".$tipo."','".$cxu."','".$descripcion."','".$idcliente."');") or die("Query fail: " . mysqli_error());
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }
    
 
 
public function ActualizarPrestamosaldo($saldo,$id){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $sql="CALL  PRESTAMO_ACTUALIZAR_SALDO('".$saldo."','".$id."');";
  $result = mysqli_query($connection,$sql) or die("Query fail: " . mysqli_error($connection));
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }

public function ActualizarRegistroCuota($id){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $sql="CALL  ABONO_ACTUALIZAR_CUOTAS_PRESTAMOS('".$id."');";
  $result = mysqli_query($connection,$sql) or die("Query fail: " . mysqli_error($connection));
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }


public function ActualizarEstadoPrestamo($id,$est){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $sql="CALL  PRESTAMO_ACTUALIZAR_ESTADO('".$est."','".$id."');";
  $result = mysqli_query($connection,$sql) or die("Query fail: " . mysqli_error($connection));
  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }

 public function EliminarPrestamo($id){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $sql="CALL  PRESTAMO_ELIMINAR('".$id."');";
  $result = mysqli_query($connection,$sql) or die("Query fail: " . mysqli_error($connection));
  
 	echo "<script>";
    echo  "alert('Prestamo  eliminado correctamente')";
    echo "</script>";
    echo ("<script> location.href='../Presentacion/ModuloPrestamo.php' </script>");
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }

public function ActualizarPrestamo_editar($valor,$valortotal,$saldo,$cod,$id,$cxu){

try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $sql="CALL  PRESTAMO_ACTUALIZAR_EDITAR('".$valor."','".$valortotal."','".$saldo."','".$cod."','".$id."','".$cxu."');";
  $result = mysqli_query($connection,$sql) or die("Query fail: " . mysqli_error($connection));
    echo "<script>";
    
    echo  "alert('Prestamo  editado .0. correctamente')";

    echo "</script>";
    echo ("<script> location.href='../Presentacion/ModuloPrestamo.php' </script>");


  
 
 
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 }



    
}

?>


