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
         <script>
                              
                        function myFunction1() {
                        var x = document.getElementById("mySelect1").value;
                        if(x=="SELECCIONE"){
                          
                        //$('#con_doc').fadeOut()  
                        $('#con_linea').fadeOut()
                        $('#con_cod').fadeOut()
                        

                            
                        }
                        else  if(x=="CODIGO"){
                          
                       // alert("CEDULA");
                        $('#con_cod').fadeIn()  
                        $('#con_linea').fadeOut()
                      
                        }
                         else  if(x=="LINEA"){
                          
                       // alert("NUMERO-FACTURA");
                        $('#con_cod').fadeOut()  
                        $('#con_linea').fadeIn()
                       
                        }
                        
                               }



                        </script> 
    
    
       

    <body>
      <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
 <br><br><br>

<div class="container">
    <div class="row">
         <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12  ">
              <div class="form-group">
                    
                      <img src="../../img/img_inventarios_1.png" class="img-responsive">
                  
             </div>
        </div>
     </div>
 </div>
<!--  FINI DEL MENU-->
 <br><br> <br><br>
<div class="container"  >
          <div class="row">
            <form class="form-horizontal" role="form" method="GET">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">

                 <label for="password" class="col-sm-2 control-label">LINEA</label>
                      <div class="col-sm-10">
                           <select id="mySelect1" name="lineasele" class="form-control" onchange="myFunction1()">
                             <option>SELECCIONE</option>
                            <option>CODIGO</option>
                            <option>LINEA</option>
                           </select>
                           
                    </div>
                    <br><br>
                     
               </div> 
          </div> 
          </form> 
    </div>
</div>


<br><br><br>
<div class="container"  id="con_cod" style="display:none;">
          <div class="row">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">
             <form class="form-horizontal" role="form" method="GET">
                 <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Codigo de barra</label>
                     <div class="col-sm-4">
                        
                       <input type="text" id="fechaprestamo" class="form-control" name="codigo" >
                     </div>

               </div>
               
                <div class="form-group">
                
                     <div class="col-sm-4">
                        
                     <button  class="btn btn-primary btn-md" id="paracedula" name="procesar1">Buscar</button>
                     </div>
                     
               </div>
                  </form>
                  
              
               </div> 
          </div>  
    </div>
</div>
<br>
<div class="container" id="con_linea" style="display:none;">
          <div class="row">
            <form class="form-horizontal" role="form" method="GET">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">

                 <label for="password" class="col-sm-2 control-label">LINEA</label>
                      <div class="col-sm-10">
                           <select  name="opcion" id="mySelect" class="form-control"  onchange="myFunction1()"> 
                             <option>SELECCIONE</option>
                              <?php
                                 
                                  require_once '../Negocio/Linea.php'; 
                                   $dato=new Liena();
                                   $dato->ValidarConsultartododetalleLinea();
                                ?>
                           </select>
                           
                    </div>
                    <br><br>
                     <div class="form-group">
                
                     <div class="col-sm-4">
                        
                     <button  class="btn btn-primary btn-md" id="paracedula" name="procesar2">Buscar</button>
                     </div>
                     
               </div>
               </div> 
          </div> 
          </form> 
    </div>
</div>
<br><br><br>

<?php

//href="../Reporte/pdf/nueva.php?ced="<?php   

  if ( isset( $_GET['procesar1']  ) ) { 
  
     $cod=$_GET['codigo'];
     //echo "ced";
   header ("Location:../Reporte/pdf/nuevainventarioxcodifo.php?cod=".$cod );

      }

      if ( isset( $_GET['procesar2']  ) ) { 
  
     $linea=$_GET['opcion'];
     //echo "ced";
   header ("Location:../Reporte/pdf/nuevainventarioxlinea.php?linea=".$linea);

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
