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
        <script src="../../js/jquery.1.11.1.js"></script>
        <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <script>
        function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
        return true;
         }
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
         }
    </script>
    <script type="text/javascript">
         $(document).ready(function(){
            $('#paracedula').click(function(){
             ///  alert("Digite la cedula");
              var cedula =document.getElementById('cedulaprestamo').value;
              if(cedula.length>0){
                alert(cedula);
              } else {

                alert("Digite la cedula");
              }
            
})

            })
        </script>
    
       

    <body>
        <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->



<br><br><br>
<div class="container">
          <div class="row">
              <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12  ">
                 <div class="form-group">
             <form class="form-horizontal" role="form" method="POST">
                 <label for="password" class="col-sm-2 control-label"></label>
                      <div style="display:none;" class="panel panel-info">
                         <div class="panel-heading">
                              <h4>INFORMACION DE LAS VENTAS </h4>
                         </div>
                           <div class="panel-body">
                            <img src="../../img/img_ventas.png" class="img-responsive">
                              <a id="botonoculto" class="btn btn-info primary btn-md" href="ModuloInfoventa.php" target="_blank"> VENTAS</a>
                       <br>
                       </div>
                     </div>
                     <div style="display:none;" class="panel panel-success">
                         <div class="panel-heading">
                              <h4>INFORMACION DEL INVENTARIO </h4>
                         </div>
                         <div class="panel-body">
                          <img src="../../img/img_inventarios.png" class="img-responsive">
                              <a id="botonoculto" class="btn btn-success primary btn-md" href="ModuloInfoinventario.php" target="_blank"> INVENTARIO</a>
                    <br>
                            </div>   
                     </div>
                    
                    <div class="panel panel-warning">
                         <div class="panel-heading">
                              <h4>INFORMACION DE LOS PRESTAMO</h4>
                         </div>
                         <div class="panel-body">
                           <img src="../../img/img_prestamos.png" class="img-responsive">
                              <a id="botonoculto" class="btn btn-warning primary btn-md" href="ModuloInfoprestamo.php" target="_blank"> PRESTAMO</a>
                    <br>
                      
                             </div>   
                     </div>
                    
                    
                    
                    
                    
                   
                  </form>
                  
              
               </div> 
          </div>  
    </div>
</div>
<br><br><br>

<?php

//href="../Reporte/pdf/nueva.php?ced="<?php   

  if ( isset( $_POST['procesar']  ) ) { 
  
     $cedula=$_POST['ced'];
     echo "ced";
   header ("Location:../Presentacion/ModuloUsusarioTabla.php" );

      }
?>


 


        <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
 <script src="../../js/vendor/bootstrap.js"></script>


        <script src="../../js/plugins.js"></script>
        <script src="../../js/main.js"></script>
        <script src="../../js/bootstrap-modal.js"></script>
        <script src="../../js/jquery.1.11.1.js"></script>

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
