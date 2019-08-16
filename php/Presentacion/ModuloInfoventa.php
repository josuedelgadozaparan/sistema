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
                          
                        $('#con_doc').fadeOut()  
                        $('#con_num_fact').fadeOut()
                        $('#con_fecha').fadeOut()
                        

                            
                        }
                        else  if(x=="CEDULA"){
                          
                       // alert("CEDULA");
                        $('#con_doc').fadeIn()  
                        $('#con_num_fact').fadeOut()
                        $('#con_fecha').fadeOut()
                        }
                         else  if(x=="NUMERO-FACTURA"){
                          
                       // alert("NUMERO-FACTURA");
                        $('#con_doc').fadeOut()  
                        $('#con_num_fact').fadeIn()
                        $('#con_fecha').fadeOut()
                        }
                         else  if(x=="FECHA"){
                          
                       // alert("FECHA");
                       $('#con_doc').fadeOut()  
                        $('#con_num_fact').fadeOut()
                        $('#con_fecha').fadeIn()
                        }
                               }



                        </script> 

                        <script>

                         function search(ele) {
         if(event.keyCode == 13) {
        //alert(ele.value);   mostrarinfo  buscarcedula

         $("#buscaxcedula").click();     
    }
}
       </script>
    
       

    <body>
       <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
<br><br><br><br><br><br>
<div class="container">
          <div class="row">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">

<div class="form-group">
                 <label for="password" class="col-sm-2 control-label">OPCION </label>
                      <div class="col-sm-10">
                           <select id="mySelect1" name="lineasele" class="form-control" onchange="myFunction1()">
                              <option>SELECCIONE</option>
                              <option>FECHA</option>
                              <option>NUMERO-FACTURA</option>
                              <option>CEDULA</option>
                           </select>

                      </div>
         </div> </div> </div> 


<br><br><br>
<div class="container" id="con_fecha" style="display:none;">
          <div class="row">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">
             <form class="form-horizontal" role="form" method="GET">
                 <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Fecha inicial</label>
                     <div class="col-sm-4">
                        
                       <input type="date" id="fechaprestamo1" class="form-control" name="fechain" value="11/12/2012">
                     </div>

               </div>
                <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Fecha Final</label>
                     <div class="col-sm-4">
                        
                       <input type="date" id="fechaprestamo2" class="form-control" name="fechaout" value="11/12/2012">
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

<div class="container"  id="con_num_fact" style="display:none;">
          <div class="row">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">
             <form class="form-horizontal" role="form" method="GET">
                 <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Numero de factiura</label>
                     <div class="col-sm-4">
                        
                       <input type="text" id="fechaprestamo" class="form-control" name="numfac" >
                     </div>

               </div>
               
                <div class="form-group">
                
                     <div class="col-sm-4">
                        
                     <button  class="btn btn-primary btn-md" id="paracedula" name="procesar2">Buscar</button>
                     </div>
                     
               </div>
                  </form>
                  
              
               </div> 
          </div>  
    </div>
</div>

<div class="container"  id="con_doc" style="display:none;">
         <div class="container">
          <div class="row">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">
             <form class="form-horizontal" role="form" method="GET">
                 <label for="password" class="col-sm-2 control-label">DIGITE CEDULA</label>
                      <div class="col-sm-10">
                         
                    <input type="text" class="form-control" id="cedulaprestamo" name="ced_con"   onkeypress="return valida(event)"  onkeydown="search(this)">
                    <br><br>
                    <button  class="btn btn-primary btn-md"  id="buscaxcedula" name="procesar3">Buscar</button>
                   
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

  if ( isset( $_GET['procesar3']  ) ) { 
  
     $cedula=$_GET['ced_con'];
     //echo "ced";
   header ("Location:../Reporte/pdf/nuevaventaxcedula.php?ced_con=".$cedula );

      }

       if ( isset( $_GET['procesar1']  ) ) { 
  
     $in=$_GET['fechain'];
     $out=$_GET['fechaout'];
     $nuevafecha = date('Y-m-d', strtotime("$out + 1 day"));
     //echo "ced";
   header ("Location:../Reporte/pdf/nuevaventaxfecha.php?in=".$in."&out=".$nuevafecha);

      }
       if ( isset( $_GET['procesar2']  ) ) { 
  
     $num=$_GET['numfac'];
     
     //echo "ced";
   header ("Location:../Reporte/pdf/nuevaventaxfactura.php?num=".$num);

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
