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
    //var recarga = '0';
         $(document).ready(function(){

          
          if(recarga.length==0){
          window.location.reload();
          recarga='1';
        }



            $('#btnagregar').click(function(){
              
             var nom =document.getElementById('nombre__linea').value;
             document.frmdatos.nombrelinea.value =nom;
             var sub=document.getElementById('subconponentelinea').value;
             if(sub.length==0){
            
               } else{
                 $('#tablalinea > tbody:last').append('<tr><td>'+sub+'</td><td>'+"<button  type="+'button'+"  onclick="+'myFunction(this)'+"></button>"+'</td></tr>')
               }
             $("#subconponentelinea").val('');           
           
            })    
           })
        </script>

         <script type="text/javascript">
         $(document).ready(function(){
            $("#btnlinea").click(function(){
           $("#btnrealizarlinea").click(); 
            }) ;


            })
        </script>
        <script type="text/javascript">
         $(document).ready(function(){
            $('#mostrar').click(function(){

            $('#paracrear').fadeIn() 
            })    
          //esquemalineas



            })
        </script>

        


        <script >
         
             function Procesolinea1(){

              ////////// INSERTA EN LA TABLA LINEA
              var nom_linea =document.getElementById('nombrelinea').value; 
               
              $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja1" : nom_linea,"valorCaja2":'4'},
                            success:  function (response) {
                            if(response==null){
                            alert("vacio");
                            }else{
                            //alert("nombre de linea insertada");
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            alert("Estas viendo esto por que fallé"+valor);
                                        }              });
              ///FIN

            

              
Procesolinea2();
                                         }// fin de la funcion 
    
     function Procesolinea2(){
       /////////HACER EL BUSCO PARA LA TABLA DETALLE LINEA
                  var textos;
               
                  for (var i=1;i<document.getElementById('tablalinea').rows.length;i++) {
                      for (var j=0;j < document.getElementById('tablalinea').rows[i].cells.length-1;j++){
                      textos = document.getElementById('tablalinea').rows[i].cells[j].innerHTML;
                         // alert(textos);       
                  $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja1" : textos,"valorCaja2":'5'},
                            success:  function (response) {
                            if(response==null){
                            alert("vacio");
                            }else{
                             
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            alert("Estas viendo esto por que fallé"+valor);
                                        }

              });
                      }
                    }
               ///FIN
            
     }




        </script>
       

    <body>
       
 <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
 <br><br><br>
<!--  FINI DEL MENU-->
<div class="container">
    <div class="row">
         <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12  ">
              <div class="form-group">
                    
                      <img src="../../img/img_lienas.png" class="img-responsive">
                  
             </div>
        </div>
     </div>
 </div>
<br><br><br>
<div class="container">
          <div class="row">
              <div class="col-xs-10 col-ms-10 col-md-10 col-lg-10 ">
                 <div class="form-group">
                 <label for="password" class="col-sm-2 control-label">LINEA</label>
                      <div class="col-sm-10">
                           <select  name="opcion" id="mySelect" class="form-control" onchange="myFunction1()"> 
                             <option>SELECCIONE</option>
                              <?php
                                 
                                  require_once '../Negocio/Linea.php'; 
                                   $dato=new Liena();
                                   $dato->ValidarConsultartododetalleLinea();
                                ?>
                           </select>
                    </div>
               </div> 
          </div>  
    </div>
</div>
<br><br><br>

<div id="esquemalineas" class="container">
    <div class="row">
       <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                    <div  class="table-responsive">
                        <table  id="tablalineaconsulta" class="table table-striped"><br><br> 
                               <tr><th>NOMBRE LINEA </th><th> COMPONENTE</th></tr>
                                <script>
                              
                        function myFunction1() {
                        var x = document.getElementById("mySelect").value;
                         if(x=="SELECCIONE"){
                           $("#tablalineaconsulta").find("tr:gt(0)").remove();
                        }else {

                         $("#tablalineaconsulta").find("tr:gt(0)").remove();
                            

                           
                             $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja1" : x,"valorCaja2":'6'},
                            success:  function (response) {
                            if(response==null){
                            alert("vacio");
                            }else{
                            
                           // for (var i=1;i<document.getElementById('tablalineaconsulta').rows.length;i++) {
                            //for (var j=0;j < document.getElementById('tablalineaconsulta').rows[i].cells.length-1;j++){
                             //document.getElementById("tablalineaconsulta").deleteRow(j+1);
                            

                            //}}
                            response = $.parseJSON(response)
                            for(var c=0;c<response.length;c++){
                            $('#tablalineaconsulta > tbody:last').append('<tr><td>'+response[c].NombreLinea+'</td><td>'+response[c].NombreDetalleLinea+'</td></tr>')
                            }
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            alert("Estas viendo esto por que fallé"+valor);
                                        }              });


                            }
                               }

                        </script> 

                        </table>
                       
                    </div>
                   <br><br><br>

                                <a href="ModuloCrearLinea.php" class="btn btn-primary " role="button">CREAR LINEA</a>
                                  
                            
                         
                   </div>
            </div>
      </div>
</div>

   <br><br><br>                            

 <div id="paracrear" style="display:none;"  >
     <div class="container">
          <div class="row">
              <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12   ">
                 <div class="panel panel-danger">
                      <div class="panel-heading">
                         <h3 class="panel-title">CREACION DE UNA LIENA</h3>
                      </div>
                 <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST">
                         <div class="form-group">
                             <label for="password" class="col-sm-2 control-label">Nombre Linea</label>
                                 <div class="col-sm-4">
                                     <input type="text" id="nombre__linea"  class="form-control"  maxlength="20" name="nombre"  >
                                 </div>
                             <label for="password" class="col-sm-2 control-label">Subcomponente</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="subconponentelinea" class="form-control" maxlength="20" name="valor"  >
                                  </div>
                            <div class="col-sm-4">
                               <button type="button"  class="btn btn-primary btn-sm" id="btnagregar" >Agregar</button>
                           </div>
                      </div>
                </form>
             </div>
           </div>
        </div>
      </div>
   </div>


   <div id="esquemausuario" class="container">
    <div class="row">
       <div class="col-xs-4 col-ms-4 col-md-4 col-lg-4   ">
           <div class="form-group">
            <form class="form-horizontal" name="frmdatos" role="form" method="POST">
                <label for="password" class="col-sm-4 control-label">LINEA</label>
                    <div class="col-sm-10">
                         <input type="text" id="nombrelinea" class="form-control" maxlength="20" name="dir" readonly="readonly">
                      
                    </div>
                    <div class="col-sm-10">
                        
                    </div>
                </form>
          </div> 
      </div>
   </div>
</div>

<div id="esquemausuario" class="container">
    <div class="row">
       <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                    <div  class="table-responsive">
                        <table  id="tablalinea" class="table table-striped"><br><br> 
                               <tr><th>SUBCOMPONENTE</th><th></th></tr>
                        </table>
                        <script>
                              function myFunction(e) {
                              $(e).parent().parent().remove();}
                        </script>  
                    </div>
                    <div class="panel-footer" style="overflow:hidden;text-align:right;">
                         <div class="form-group">
                             <div class="col-sm-offset-2 col-sm-10">
                                 <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" >CREAR</button>
                                 <button type="submit" id="btnprocesar"  class="btn btn-success btn-sm" name="procesar" style="display:none;" >Submit</button>
                                 <button type="submit" class="btn btn-default btn-sm">Cancelar</button>
                             </div>
                         </div>  
                   </div>
            </div>
      </div>
</div>
</div>    
             <!-- FIN   FORMULARIO PARA CREAR-->


<!-- VENTANA MODAL PARA LA CREAACION DE LAS LINEAS DE LOS GRUPOS  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CONFIRMAR</h4>
      </div>
      <div class="modal-body">
      ¿Esta seguro que desea crear una nueva liena de grupo?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">SALIR</button>
        <button id="btnlinea"  class="btn btn-success btn-sm" >CREAR</button>
      </div>
    </div>
  </div>
</div>

 <button id="btnrealizarlinea" style="display:none;" class="btn btn-success btn-sm" onclick="Procesolinea1()">PRUEBA
 </button>
 


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
