<?php
    require_once 'Conexion.php';

    class ProcesoAjax{
        public  $host;
        public  $usuario;
        public  $password;
        public  $db;
        public  $tipo;

        public  $cod;
        public  $id;
        public  $vacio;


        public function __construct()
        {
            $dato           = new Conexion();
            $this->host     = $dato->getHost();
            $this->user     = $dato->getUser();
            $this->password = $dato->getPass();
            $this->db       = $dato->getDatabase();
        }

        public function ConsultarProducto() 

        {
        if($_GET['valorCaja2']=='1'){///////////CONSULTA DE LA TABLA PRODUCTOS.. ES LLAMADA  DEL MODULO FACTURA

           $co=$_GET['valorCaja1'];
            $this->cod=$co; 

            $this->tipo='0'; 
            
            $this->id=''; 
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query(
              $connection,
              "CALL FACTURA_CONSULTAR('".$this->tipo."','".$this->cod."','".$this->id."');"
            ) or die("Query fail: " . mysqli_error());

            while ($row = mysqli_fetch_array($result))
            {  
                $IdProducto         = $row['IdProducto'];
                $NombreProducto     = $row['NombreProducto'];
                $ValorProducto      = $row['ValorProducto'];
                $CantidadProducto   = $row['CantidadProducto'];
                $CantidadMinima     = $row['CantidadMinima'];
                $MarcaProducto      = $row['MarcaProducto'];
                $CodigoProducto     = $row['CodigoProducto'];
                //echo $ValorProducto.$ValorProducto.$ValorProducto.$ValorProducto.$ValorProducto."czczxczcz";
                $detallepriducti  = 
                    array(
                        'IdProducto'        => $IdProducto, 
                        'NombreProducto'    => $NombreProducto, 
                        'ValorProducto'     => $ValorProducto,
                        'CantidadProducto'  => $CantidadProducto,
                        'CantidadMinima'    => $CantidadMinima,
                        'MarcaProducto'     => $MarcaProducto,
                        'CodigoProducto'    => $CodigoProducto
                );
            }
            return json_encode($detallepriducti);

}//fin del if 1
else if($_GET['valorCaja2']=='2'){///////////CONSULTA DE LA TABLA CLIENTES.. ES LLAMADA  DEL MODULO FACTURA


$co=$_GET['valorCaja1'];
            $this->tipo='0'; 
            $this->ced=$co; 
            $this->id=''; 
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query($connection,
            "CALL CLIENTE_CONSULTAR('".$this->tipo."','".$this->ced."','".$this->id."');") or die("Query fail: " . mysqli_error());

            while ($row = mysqli_fetch_array($result))
            {  
                $cedcli    = $row['CedulaCliente'];
                $nomcli    = $row['NombreCliente'];
                $apecli    = $row['ApellidoCliente'];
                $dirrescli = $row['DirResCliente'];
                $diroficli = $row['DirOficliente'];
                $telrescli = $row['TelResCliente'];
                $teloficli = $row['TelOfiCliente'];
                $IdCliente = $row['IdCliente'];

                $detallecli  = 
                    array(
                        'CedulaCliente'        => $cedcli, 
                        'NombreCliente'        => $nomcli, 
                        'ApellidoCliente'      => $apecli,
                        'DirResCliente'        => $dirrescli,
                        'DirOficliente'        => $diroficli,
                        'TelResCliente'        => $telrescli,
                        'TelOfiCliente'        => $teloficli,
                        'IdCliente'            => $IdCliente
                        
                );
            }
            return json_encode($detallecli);


}
   else   if($_GET['valorCaja2']=='3'){///////////CONSULTA DE LA TABLA ABONO.. ES LLAMADA  DEL MODULO ABONO

            $idprestamo=$_GET['valorCaja1'];
            $this->tipo='1'; 
            $this->cod="";
            $this->id=$idprestamo; 
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query(
              $connection,
              "CALL ABONO_CONSULTAR('".$this->tipo."','".$this->cod."','".$this->id."');") or die("Query fail: " . mysqli_error());

            while ($row = mysqli_fetch_array($result))
            {  
                $IdAbono             = $row['IdAbono'];
                $IdPrestamo          = $row['IdPrestamo'];
                $ValorAbono          = $row['ValorAbono'];
                $PendientePagar      = $row['PendientePagar'];
                $FechaAabono         = $row['FechaAabono'];
                
                $detalleabono  = 
                    array(
                        'IdAbono'           => $IdAbono, 
                        'IdPrestamo'        => $IdPrestamo, 
                        'ValorAbono'        => $ValorAbono,
                        'PendientePagar'    => $PendientePagar,
                        'FechaAabono'       => $FechaAabono
                        
                );
            }
            return json_encode($detalleabono);

}//fin del if 3

 else if($_GET['valorCaja2']=='4'){///////////INSERTA  TABLA LINEA PARA CREAR EL NOMBRE DE LA LINEA.. ES LLAMADA  DEL MODULO LIENA

            $nombrelinea=$_GET['valorCaja1'];
            try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query($connection,
            "CALL LINEA_INSERTAR('".$nombrelinea."');") or die("Query fail: " . mysqli_error());
            } catch (Exception $e) {
                echo $e->getMessage();
                        }

}//fin del if 4


else if($_GET['valorCaja2']=='5'){///////////INSERTA  TABLA LINEA PARA CREAR EL NOMBRE DE LA LINEA.. ES LLAMADA  DEL MODULO LIENA
            
            $texto=$_GET['valorCaja1'];
            $id="ji";
            try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query($connection,
            "CALL DETALLELINEA_INSERTAR('".$id."','".$texto."');") or die("Query fail: " . mysqli_error());



            } catch (Exception $e) {
                echo $e->getMessage();
                        }

                        
        

}//fin del if 4


else if($_GET['valorCaja2']=='6'){///////////INSERTA  TABLA LINEA PARA CREAR EL NOMBRE DE LA LINEA.. ES LLAMADA  DEL MODULO LIENA
            
 $this->nom=$_GET['valorCaja1'];
 $this->tipo='2'; 
   
  
  

  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL DETALLELINEA_CONSULTAR('".$this->tipo."','".$this->nom."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  

                $NombreLinea                 = $row['NombreLinea'];
                $NombreDetalleLinea          = $row['NombreDetalleLinea'];
                
                
                $detallelinea[]   = 
                    array(
                        'NombreLinea'           => $NombreLinea, 
                        'NombreDetalleLinea'        => $NombreDetalleLinea
                        
                        
                );   
  
 
  
  }
  return json_encode($detallelinea);

}//fin del if 6


else if($_GET['valorCaja2']=='7'){///////////INSERTA  TABLA LINEA PARA CREAR EL NOMBRE DE LA LINEA.. ES LLAMADA  DEL MODULO LIENA
            
 $this->nom=$_GET['valorCaja1'];
 $this->tipo='3'; 
   
  
  

  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL DETALLELINEA_CONSULTAR('".$this->tipo."','".$this->nom."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  

                
                $NombreDetalleLinea          = $row['NombreDetalleLinea'];
                $IdDetalleLinea          = $row['IdDetalleLinea'];
                
                
                $detallelinea[]   = 
                    array(
                        'IdDetalleLinea'        => $IdDetalleLinea,
                        'NombreDetalleLinea'        => $NombreDetalleLinea
                        
                        
                );   
  
 
  
  }
  return json_encode($detallelinea);

}//fin del if 7

else if($_GET['valorCaja2']=='8'){///////////INSERTA  TABLA LINEA PARA CREAR EL NOMBRE DE LA LINEA.. ES LLAMADA  DEL MODULO LIENA
            
 $this->nom=$_GET['valorCaja1'];
 $this->tipo='4'; 
   
  
  

  $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL DETALLELINEA_CONSULTAR('".$this->tipo."','".$this->nom."');") or die("Query fail: " . mysqli_error());
  while ($row = mysqli_fetch_array($result)){  

                
                $NombreLinea          = $row['NombreLinea'];
                
                
                $detallelinea[]   = 
                    array(
                        
                        'NombreLinea'        => $NombreLinea
                        
                        
                );   
  
 
  
  }
  return json_encode($detallelinea);

}//fin del if 8

else if($_GET['valorCaja2']=='9'){///////////INSERTA  TABLA LINEA PARA CREAR EL NOMBRE DE LA LINEA.. ES LLAMADA  DEL MODULO LIENA
            
 $this->idfactura_=$_GET['valorCaja3'];
 $this->idproducto_=$_GET['valorCaja4'];
 $this->cantidad_=$_GET['valorCaja5'];
 $this->subtotal_=$_GET['valorCaja6'];
 $this->tipo='4'; 
   
  
  

   try {
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query($connection,
            "CALL DETALLELINEA_INSERTAR('".$id."','".$texto."');") or die("Query fail: " . mysqli_error());



            } catch (Exception $e) {
                echo $e->getMessage();
                        }
  
 
  
  
  return json_encode($detallelinea);

}//fin del if 9


else if($_GET['valorCaja2']=='A'){///////////IINSERTA LAA TABLA FACTURA
            session_start();
 $this->numerodefactura_=$_GET['valorCaja4'];
 $this->cantidadtotal_=$_GET['valorCaja5'];
 $this->valortotal_=$_GET['valorCaja6'];
 $this->valoriva_=$this->valortotal_*0.16;
 $this->subtotal_=$this->valortotal_-$this->valoriva_;
 $this->observaciones_=$_GET['valorCaja7'];
 $this->idcliente_=$_GET['valorCaja8'];
 $this->recibido_=$_GET['valorCaja9'];
 $this->entregado_=$this->recibido_-$this->valortotal_;
 $this->idusuario_=$_SESSION["aaa"] ;
 
  
   
  
  

   try {$connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);

  $result = mysqli_query($connection,

   "CALL FACTURA_INSERTAR(
    '".$this->numerodefactura_."',
    '".$this->cantidadtotal_."',
    '".$this->subtotal_."',
    '".$this->valoriva_."',
    '".$this->valortotal_."',
    '".$this->observaciones_."',
    '".$this->recibido_."',
    '".$this->entregado_."',
    '".$this->idcliente_."',
    '".$this->idusuario_."');
     ") or die("Query fail: " . mysqli_error());
  
} catch (Exception $e) {
    echo $e->getMessage();
}
 
 
  
 
  
  
 

}//fin del if 9

else if($_GET['valorCaja2']=='B'){///////////BUSCRA EL ID
            usleep(2000000);
            $idfactura="";
            $this->cod=" ";
            $this->tipo='1'; 
            $this->id=''; 
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            $result = mysqli_query(
              $connection,
              "CALL FACTURA_CONSULTAR('".$this->tipo."','".$this->cod."','".$this->id."');"
            ) or die("Query fail: " . mysqli_error());

           
  while ($row = mysqli_fetch_array($result)){  

                
                $IdFactura          = $row['MAX(IdFactura)'];
                
                
                $detallefac   = 
                    array(
                        
                        'IdFactura'        => $IdFactura
                        
                        
                );   
  
 
  
  }
  return json_encode($detallefac);

}//fin del if B


else if($_GET['valorCaja2']=='C'){///////////BUSCRA EL ID
            
 $this->idfactura_=$_GET['valorCaja3'];
 $this->idproducto_=$_GET['valorCaja4'];
 $this->cantidad_=$_GET['valorCaja5'];
 $this->subtotal_=$_GET['valorCaja6'];

           
   try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL FACTURA_DETALLE_INSERTAR('".$this->idfactura_."','". $this->idproducto_."','".$this->cantidad_."','".$this->subtotal_."');") or die("Query fail: " . mysqli_error());
  
} catch (Exception $e) {
    echo $e->getMessage();
}

}//fin del if B


else if($_GET['valorCaja2']=='D'){//////////ELIMINAR EL USUARIO
            
 $this->idusuario_=$_GET['valorCaja3'];

           
   try {
 $connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
  $result = mysqli_query($connection,
   "CALL USUARIO_ELIMINAR('".$this->idusuario_."');") or die("Query fail: " . mysqli_error());
  
} catch (Exception $e) {
    echo $e->getMessage();
}

header ("Location:../Presentacion/ModuloUsusarioTabla.php");

}//fin del if B



        }

    }// Fin de la clase ProcesoFactura
    $dato = new ProcesoAjax();
    echo $dato->ConsultarProducto();
    exit;
 ?>