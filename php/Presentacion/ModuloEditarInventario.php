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

  
    $d = $_GET['d1'];
  //  echo "hola   ".$id;
   require_once '../Negocio/Inventario.php'; 
   $dato=new Inventario();
  $info_json= $dato->ValidarConsultarProductoId($d);
  $decode= json_decode($info_json);

  $NombreProducto= $decode->NombreProducto; 
  $ValorProducto=$decode->ValorProducto;
  $CantidadProducto=$decode->CantidadProducto;
  $CantidadMinima=$decode->CantidadMinima;
  $MarcaProducto=$decode->MarcaProducto;
  $TipoProducto=$decode->TipoProducto;
  $CodigoProducto=$decode->CodigoProducto;
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
 <div id="paraeditarproducto"  >
     <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">EDITAR UN PRODUCTO</h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nombre</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" maxlength="10" name="nombre" value= <?php  echo  $NombreProducto;     ?>  >
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Valor</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control"  maxlength="10" name="valor" onkeypress="return valida(event)" 
                       value= <?php  echo  $ValorProducto;     ?> >
                     </div>
          </div>



           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control"  name="cantidad" onkeypress="return valida(event)"
                       value=  <?php  echo  $CantidadProducto;     ?>  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Cantidad minima</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" maxlength="50"  name="canmini" onkeypress="return valida(event)"
                      value=  <?php  echo  $CantidadMinima;     ?> >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Marca</label>
                    <div class="col-sm-10">
                           <input type="text" class="form-control"  maxlength="15"  name="marca" 
                        value=   <?php  echo  $MarcaProducto;     ?>  >
                    </div>
          </div>
     
           <div class="form-group">
                 <label for="password" class="col-sm-2 control-label">Perfil</label>
                      <div class="col-sm-10">
                           <select  name="tipopro" class="form-control" value=<?php  echo  $TipoProducto;     ?>>
                              <option select><?php  echo  $TipoProducto;     ?></option>
                              <option>BEBIDA</option>
                              <option>ASEO</option>
                               <option>VERDURA</option>
                              <option>ROPA</option>
                           </select>
                      </div>
         </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Codigo</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="documento" maxlength="15" name="codigo" onkeypress="return valida(event)"

                        value= <?php  echo  $CodigoProducto;     ?> >
                    </div>
          </div>

         

  
                 <div class="panel-footer" style="overflow:hidden;text-align:right;">
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit"   class="btn btn-success btn-sm" name="editar">Submit</button>
                              <button type="submit" class="btn btn-default btn-sm">Cancel</button>
                        </div>
                   </div>  
                </div>

            </form>
         </div>
  
         </div>
     </div>
</div>                 <!-- FIN   FORMULARIO PARA CREAR-->
<?php 
              

        require_once '../Negocio/Inventario.php';
        if ( isset( $_POST['editar']  ) ) { 
     
     
     
     //header ("Location:php/Presentacion/principal.php");
     $dato = new Inventario();
     
                                     

     $dato->ValidarActualizarProducto($_POST['nombre'],
                                     $_POST['valor'] ,
                                     $_POST['cantidad'],
                                     $_POST['canmini'], 
                                     $_POST['marca'], 
                                     $_POST['tipopro'], 
                                     $_POST['codigo'],
                                     //$idusuario,
                                     $d);
     header("Location:ModuloInventario.php");
      
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
