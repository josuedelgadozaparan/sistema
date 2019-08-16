<?php ob_start(); ?> 




<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/main.css">

        <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
       <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
<?php

  
    $d = $_GET['d11'];
  //  echo "hola   ".$id;
   require_once '../Negocio/Cliente.php'; 
   $dato=new Cliente();
  $info_json= $dato->ValidarConsultarClienteId($d);
   $decode= json_decode($info_json);
  $cedcli= $decode->CedulaCliente; 
  $nomcli=$decode->NombreCliente;
  $apecli=$decode->ApellidoCliente;
  $dirrescli=$decode->DirResCliente;
  $diroficli=$decode->DirOficliente;
  $telrescli=$decode->TelResCliente;
  $teloficli=$decode->TelOfiCliente;
  $idusuario=$_SESSION["aaa"]  ;

  /*
  $cedcli= $_SESSION["cedcli"] ;
  $nomcli=$_SESSION["nomcli"] ;
  $apecli=$_SESSION["apecli"]  ;
  $dirrescli=$_SESSION["dirrescli"];
  $diroficli=$_SESSION["diroficli"] ;
  $telrescli=$_SESSION["telrescli"] ;
  $teloficli=$_SESSION["teloficli"] ;
  $idusuario=$_SESSION["aaa"]  
  */




   
 

  ?>

            
<!--  FORMULARIO PARA CREAR-->
 <div id="paracrearcliente"  >
     <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">EDITAR   CLIENTE</h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Cedula</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" maxlength="15" name="ced"
                              value="<?php  echo $cedcli; ?>">
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control"  maxlength="20" name="nom" 
                               value="<?php  echo $nomcli; ?>">
                     </div>
          </div>



           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Apellido</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="ape" 
                                value="<?php  echo $apecli; ?>">
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Direccion residencia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" maxlength="20"  name="dirres" 
                               value="<?php  echo $dirrescli; ?>">
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Telefono residencia</label>
                    <div class="col-sm-10">
                           <input type="text" class="form-control"  maxlength="20"  name="telres"
                                  value="<?php  echo $telrescli; ?>">
                    </div>
          </div>
     
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Direccion oficina</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="dirofi"
                                value="<?php  echo $diroficli; ?>">
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Telefono oficina</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="documento" maxlength="20 " name="telofi" 
                                value="<?php  echo $teloficli; ?>">
                    </div>
          </div>

          

  
                 <div class="panel-footer" style="overflow:hidden;text-align:right;">
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit"  class="btn btn-primary btn-md" name="editar">CREAR</button>
                              <button type="submit" class="btn btn-default btn-md">CANCELAR</button>
                        </div>
                   </div>  
                </div>

            </form>
         </div>
  
         </div>
     </div>
 
</div>                 <!-- FIN   FORMULARIO PARA CREAR-->
<?php 
              

        require_once '../Negocio/Cliente.php';
        if ( isset( $_POST['editar']  ) ) { 
     
     
     
     //header ("Location:php/Presentacion/principal.php");
     $dato = new Cliente();
     echo $_POST['ced'].
                                     $_POST['nom'] .
                                     $_POST['ape'].
                                     $_POST['dirres'].
                                     $_POST['telres'].
                                     $_POST['dirofi']. 
                                     $_POST['telofi'].
                                     
                                    $d;
     $dato->ValidarActualizarCliente($_POST['ced'],
                                     $_POST['nom'] ,
                                     $_POST['ape'],
                                     $_POST['dirres'], 
                                     $_POST['telres'], 
                                     $_POST['dirofi'], 
                                     $_POST['telofi'],
                                     $idusuario,
                                     $d);
     header("Location:ModuloCliente.php");
      
       }
      
?>    
        <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
 <script src="../../js/vendor/bootstrap.js"></script>


        <script src="../../js/plugins.js"></script>
        <script src="../../js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
<?php ob_end_flush(); ?> 
