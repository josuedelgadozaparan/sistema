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
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="../../js/jquery.1.11.1.js"></script>
        <script type="text/javascript">
         $(document).ready(function(){
            $('#mostrar').click(function(){

            $('#paracrear').fadeIn() 
            })    
           $('#mostrareliminar').click(function(){

            $('#paraeliminarcliente').fadeIn() 
            })    


            })
        </script>


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
        </head>
        <body>
      <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
<div class="container">
    <div class="row">
         <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12  ">
              <div class="form-group">
                    
                      <img src="../../img/img_inventarios_1.png" class="img-responsive">
                  
             </div>
        </div>
     </div>
 </div>


<!--  formulario para eliminar-->
<div id="paraeliminarcliente" style="display:none;">
<div class="container"  >
                   <div class="row">
                      <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">

                        <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ADVERTENVIA</h3>
  </div>
  <div class="panel-body">
    <h4>¿Esta seguro que desea eliminar el usuario?</h4>
                           <button class="btn btn-success btn-sm">ELIMINAR</button>
                           <button  type="submit" class="btn btn-success btn-sm">CANCELAR</button>
  </div>
</div>
                         
                          
                     </div>
                   </div> 
                
                </div>
                </div>



                <!--  formulario para eliminar-->



<!--  FORMULARIO PARA CREAR-->
 <div id="paracrear" style="display:none;">
     <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">INSERTAR UN NUEVO PRODUCTO</h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nombre</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" maxlength="10" name="nombre">
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Valor</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control"  maxlength="10" name="valor" onkeypress="return valida(event)" >
                     </div>
          </div>



           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control"  name="cantidad" onkeypress="return valida(event)"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Cantidad minima</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" maxlength="50"  name="canmini" onkeypress="return valida(event)" >
                    </div>
          </div>

          
     
           <div class="form-group">
                 <label for="password" class="col-sm-2 control-label">Linea</label>
                      <div class="col-sm-10">
                           <select id="mySelect1" name="lineasele" class="form-control" onchange="myFunction1()">
                              <option>SELECCIONE</option>
                              <?php
                                 
                                  require_once '../Negocio/Linea.php'; 
                                   $dato=new Liena();
                                   $dato->ValidarConsultartododetalleLinea();
                                ?>
                           </select>
                      </div>
         </div> 
       <div id="mostrarsublinea" >   
          <div class="form-group">
                 <label for="password" class="col-sm-2 control-label">Componente Linea</label>
                      <div class="col-sm-10">
                           <select  id="mySelect2" name="sublineas" class="form-control"  >
                          <option>SELECCIONE</option>
                              <script>
                              
                        function myFunction1() {
                        var x = document.getElementById("mySelect1").value;
                         if(x=="SELECCIONE"){
                          
                        document.getElementById('mySelect2').innerHTML = "";
                           
                        }else {
                          //alert(x);
                                      

                           
                            $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja1" : x,"valorCaja2":'7'},
                            success:  function (response) {
                            if(response==null){
                            alert("vacio");
                            }else{
                            

                            document.getElementById('mySelect2').innerHTML = "";
                              response = $.parseJSON(response)
                              //alert(response.length);

                             for(var c=0;c<response.length;c++){
                              var xx = document.getElementById("mySelect2");
                              var option = document.createElement("option");
                              
                              option.text = response[c].NombreDetalleLinea;
                              xx.add(option);
                             }

                            
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            alert("Estas viendo esto por que fallé"+valor);
                                        }              });


                            }
                               }



                        </script> 
                           </select>
                      </div>
         </div>
       </div>
       
      <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Marca</label>
                    <div class="col-sm-10">
                           <input type="text" class="form-control"  maxlength="15"  name="marca"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Codigo</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="documento" maxlength="15" name="codigo" onkeypress="return valida(event)" >
                    </div>
          </div>

         

  
                 <div class="panel-footer" style="overflow:hidden;text-align:right;">
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit"   class="btn btn-success btn-sm" name="procesar">Submit</button>
                              <button type="submit" class="btn btn-default btn-sm">Cancel</button>
                        </div>
                   </div>  
                </div>

            </form>
         </div>
  
         </div>
     </div>
</div>                
<?php 
require_once '../Negocio/Inventario.php';
    if ( isset( $_POST['procesar']  ) ) { 
     $nombre= $_POST['nombre'];
     $valor=$_POST['valor'] ;
     $cantidad=$_POST['cantidad'];
     $canmini=$_POST['canmini'];//lineasele  
     $linea=$_POST['lineasele'];
     $componentelinea=$_POST['sublineas'];
     $marca=$_POST['marca'];
     $codigo=$_POST['codigo'];
     
     //header ("Location:php/Presentacion/principal.php");
     $dato = new Inventario();
     $dato->ValidarInsertarProducto($nombre,
                                    $valor,
                                    $cantidad,
                                    $canmini,
                                    $linea, 
                                    $componentelinea,
                                    $marca, 
                                    $codigo);
      }?>


      <div id="esquemausuario" class="container">
                 <div class="row">
                  <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                    <button  id="mostrar" class="btn btn-success btn-sm" name="procesar">CREAR</button>
                            <br>
                    <div class="table-responsive">
                         <table class="table table-striped"><br><br> 

                              <?php
                                   $vacio=false;
                                    //require_once '../Negocio/Inventario.php'; 
                                   $dato=new Inventario();
                                   $dato->Validar_Consultar_tabla_Producto();
                               ?>
                          </table>
                    </div></div>
                </div>
            </div>


<div id="esquemausuario" class="container">
                 <div class="row">
                  <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                      <a class="btn btn-danger primary btn-sm" href="../Reporte/ExcelReporteInventario.php"> Reporte en formato Excel</a>
                   
                  
                      <a class="btn btn-danger primary btn-sm" href="../Reporte/pdf/nueva.php" target="_blank"> Reporte en formato PDF</a>
                   </div>
                </div>
            </div>

     
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

