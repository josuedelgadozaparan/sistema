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
               // alert(cedula);
              } else {

                alert("Digite la cedula");
              }
            
})

            })
        </script>

<script>
         function search(ele) {
         if(event.keyCode == 13) {
        //alert(ele.value);   mostrarinfo  buscarcedula

         $("#paracedula").click();     
    }
}
    </script>
       

    <body>
    <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
<br><br><br>
<div id="porcedula">
<div class="container">
          <div class="row">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">
             <form class="form-horizontal" role="form" method="GET">
                 <label for="password" class="col-sm-2 control-label">DIGITE CEDULA</label>
                      <div class="col-sm-10">
                         
                    <input type="text" class="form-control" id="cedulaprestamo" name="ced"   onkeypress="return valida(event)" onkeydown="search(this)" >
                    <br><br>
                    <div class="col-sm-12">
                    <button  class="btn btn-warning btn-md" id="paracedula" name="procesar">REPORTE DETALLADO POR NUMERO DE CEDULA</button>
                   
                    </div>
                   <br><br><br>
                    <div class="col-sm-12">
                    <button  class="btn btn-primary btn-md" id="parageneral" name="procesar2">REPORTE GENERAL DE TODOS LOS PRESTAMOS</button>
                 
                    </div>
                     <br><br><br>
                    <div class="col-sm-12">
                    <button  class="btn btn-danger btn-md" id="" name="procesar3">REPORTE CARTERA DE TODOS LOS PRESTAMOS</button>
                 
                    </div>

                    <br><br><br>
                    <div class="col-sm-12">
                    <button  class="btn btn-danger btn-md" id="" name="procesar4">REPORTE CARTERA DE TODOS LOS PRESTAMOS ACTIVOS</button>
                 
                    </div>

                    <br><br><br>
                    <div class="col-sm-12">
                    <button  class="btn btn-danger btn-md" id="" name="procesar5">REPORTE CARTERA DE TODOS LOS PRESTAMOS TERMINADOS</button>
                 
                    </div>
                    </div>
                     
                     
                    </form>
                   
              
               </div> 

          </div>  
    </div>
</div>
</div>
<br><br><br>

<?php

//href="../Reporte/pdf/nueva.php?ced="<?php 

require_once '../Datos/Conexion.php'; 

  if ( isset( $_GET['procesar']  ) ) { 
  
     $cedula =$_GET['ced'] ;
     
     header ("Location:../Reporte/pdf/nuevaprestamo.php?ced=".$cedula );

      }
       if ( isset( $_GET['procesar2']  ) ) { 
    
        $cone=new Conexion();

     header ("Location:../Reporte/pdf/nuevaprestamotodo1.php" );

      }
       if ( isset( $_GET['procesar3']  ) ) { 
    
        $cone=new Conexion();

     header ("Location:../Reporte/pdf/nuevaprestamotodo2.php" );

      }

       if ( isset( $_GET['procesar4']  ) ) { 
    
        $cone=new Conexion();

     header ("Location:../Reporte/pdf/nuevaprestamotodo_activos.php" );

      }

       if ( isset( $_GET['procesar5']  ) ) { 
    
        $cone=new Conexion();

     header ("Location:../Reporte/pdf/nuevaprestamotodo_terminados.php" );

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
