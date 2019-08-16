<?php ob_start(); ?> 
<?php
function asignaEdad(){
    global $vacio;
    global $validar;
    global $cedula_cli;
    
}
?>
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
            var i=0;
            $('#paracrearprestamo').fadeIn() 


            $('#tbcliente tr').each(function () {
            var id = $(this).find("td").eq(0).html();
            var ced = $(this).find("td").eq(1).html();
            var apellidos = $(this).find("td").eq(3).html();
            i = parseInt(i)+1;
            if(i==2)
            {
              document.adder.cedulacliente.value =ced;
              document.adder.idcliente.value =id;
            }
            });

            $('#infoprestamo').fadeOut() 
            })    
           })  
        </script>

        <script type="text/javascript">
         $(document).ready(function(){
            $('#mostrarcrearcliente').click(function(){
            
            $('#paracrearcliente').fadeIn() 


            
            }) 

            $('#frmcedulano').click(function(){
            
            $('#paracrearcliente').fadeOut() 


            
            }) 
            $('#btncrearcliente').click(function(){
            
            $('#paracrearcliente').fadeOut()
            $('#paracrearprestamo').fadeIn() 
           // document.frmcliente.ced_clie.value =id; 


            
            }) 



           })  
        </script>

        <script>
        function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;
        //Tecla de retroceso para borrar, siempre la permite btncrearcliente
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
           
          //$('#someTextBox').val();frmcedulano
            if(($('#valor').val()==1))
            alert('hola');
            })

       </script>

        



<script>
function blurFunction() {
   var fechasistema = new Date();
   var valor=document.getElementById('myInput1').value;
   var porcentaje=document.getElementById('myInput2').value;
   var cuotas=document.getElementById('myInput3').value;
   var fecha=document.getElementById('fechaprestamo').value;
   var cedula =document.getElementById('ced_').value; 
   var hora=fechasistema.getHours();
   var minuto = fechasistema.getMinutes();
   var segundo = fechasistema.getSeconds();
   var interese=0;
   var valortotal=0;
   

   var codigo_completo =cedula+"-"+fecha+"-"+hora+"-"+minuto+"-"+segundo;

   if((valor.length>0)&&(porcentaje.length>0)&&(cuotas.length>0)){
   interese=(valor*porcentaje)/100;
   valortotal=parseInt(valor)+parseInt(cuotas*interese);
   document.adder.valtol.value =valortotal;
    document.adder.codigosistema.value =codigo_completo;

   //codigosistema

   }else
   {
  
   }
}
</script>

 <script>
         function capturacelda(){
          alert("dfs");

         }
         function search(ele) {
         if(event.keyCode == 13) {
        //alert(ele.value);   mostrarinfo  buscarcedula

         $("#mostrarinfo").click();     
    }
}
       
       </script>
        
    </head>   
    <body>
       <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
<br><br>
<div class="container derecha">
              <div class="row">
                     <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                        
                    </div>

              </div>

</div>
            
<div id="esquemausuario" class="container">
                 <div class="row">
                      <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                           <div class="panel panel-primary">
                                <div class="panel-heading">
                                     <h4>INFORMACION DEL CLIENTE</h4>
                                </div>
                           <div class="table-responsive">
                                <table class="table"  id="tbcliente">
                                    <form class="form-horizontal" role="form"  method="POST"><br>
                                            <label for="password" class="col-sm-2 control-label">DIGITE LA CEDULA</label>
                                               <div class="col-sm-10">
                                                   <input type="text" class="form-control" id="buscarcedula" name="cedula" onkeypress="return valida(event)" onkeydown="search(this)"> <br>
                                                   <button type="submit" id="mostrarinfo" class="btn btn-danger" name="buscar" >BUSCAR</button>
                                                
                                                   <br>
                                              </div>
                                              <br>
                                    </form>
                                         <br>
                                       <?php
                                            require_once '../Negocio/Cliente.php';
                                            if ( isset( $_POST['buscar']  ) ) { 
                                            asignaEdad();
                                            $cedula_cli=$_POST['buscar'];


                                            
                                            
                                            $dato = new Cliente();
                                            $vacio=    $dato->ValidarConsultarClienteCedulaPrestamo($_POST['cedula']);
                                            if($vacio==false)
                                       {?>
                                   
                                   
                                           
                                          
                                          <tr>
                                          <td>La cedula con numero  no se encuentra registrada en la base de datos.
                                          ¿Desea agregar la cedula como nuevo cliente?
                                           <button  id="mostrarcrearcliente" class="btn btn-primary btn-sm" name="cedsi">SI</button>
                                           <button  id="frmcedulano" class="btn btn-primary btn-sm" name="cedno">NO</button>
                                           </td>
                                           </tr>
                                           
                                      <?php   
                                       }
                                       else{

                                        asignaEdad();
                                        $validar=true;
                                       }



                                       }
                                       ?>
                                     <br>
                              </table><br>
                        </div>
                  </div> 
          </div> 
    </div> 
</div>

 <!--  FORMULARIO PARA CREAR-->
 <div id="paracrearcliente" style="display:none;" >
     <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">CREACION DE  CLIENTE</h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" name="frmcliente" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Cedula</label>
                   <div class="col-sm-10">
                       <input type="text"  id="ced_clie" class="form-control" maxlength="15" name="ced" onkeypress="return valida(event)">
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control"  maxlength="20" name="nom"  >
                     </div>
          </div>



           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Apellido</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="ape"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Direccion residencia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" maxlength="20"  name="dirres"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Telefono residencia</label>
                    <div class="col-sm-10">
                           <input type="text" class="form-control"  maxlength="20"  name="telres" onkeypress="return valida(event)">
                    </div>
          </div>
     
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Direccion oficina</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="dirofi">
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Telefono oficina</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="documento" maxlength="20 " name="telofi" onkeypress="return valida(event)" >
                    </div>
          </div>

          

  
                 <div class="panel-footer" style="overflow:hidden;text-align:right;">
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit" id="btncrearcliente" class="btn btn-success btn-sm" name="crearcliente">Submit</button>
                              <button type="submit" class="btn btn-default btn-sm">Cancel</button>
                        </div>
                   </div>  
                </div>

            </form>
         </div>
  
         </div>
     </div>

</div>                 <!-- FIN   FORMULARIO PARA CREAR CLIENTE--> 


<div id="infoprestamo"  >
           <div id="esquemausuario" class="container">
                 <div class="row">
                      <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                          <div class="panel panel-success">
                             <div class="panel-heading"><h4>INFORMACION DEL PRESTAMO</h4>
                             </div>
                          <div class="table-responsive">
                              <table class="table" >
                                   
                                    <?php
                                            require_once '../Negocio/Prestamo.php';
                                            $dato = new Prestamo();
                                            asignaEdad();

                                            if($validar==true){
                                               $vacio=    $dato->ValidarConsultarClientePrestamo( $_POST['cedula']);
                                            
                                                if($vacio==false){
                                                   ?>
                                              <br> <br>
                                                <button  id="mostrar" class="btn btn-danger" name="buscar" >NUEVO PRESTAMO</button>
                                                 <br> <br>
                                                   <?php
                                                                 }
                                            }
                                 ?>
                                      
                                 </table>
                         </div>
                </div>
          </div>
     </div>
</div>     
</div>    



          <!-- FIN   FORMULARIO PARA CREAR PRESTAMO-->   

<div id="paracrearprestamo" style="display:none;" >
     <div class="container">

        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><b>DETALLES DEL PRESTAMO</b></h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" NAME="adder" method="POST">
           
    
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Cedula</label>
                    <div class="col-sm-10">
                         <input type="text" id="ced_" class="form-control" maxlength="20" name="cedulacliente" readonly="readonly" >
                    </div>
          </div> 
           <div class="form-group"  style="display:none;">
                <label for="password" class="col-sm-2 control-label">id</label>
                    <div class="col-sm-10">
                         <input type="text" id="idcliente" class="form-control" maxlength="20" name="idcli"  readonly="readonly" >
                    </div>
          </div> 


           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Fecha</label>
                     <div class="col-sm-10">
                        
                       <input type="date" id="fechaprestamo" class="form-control" name="fecha" value="11/12/2012">
                     </div>
          </div>



           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Valor </label>
                    <div class="col-sm-10">
                         <input type="text"  class="form-control" maxlength="20" name="valorpres" onkeypress="return valida(event)"
                         id="myInput1"  onblur="blurFunction()">
                    </div>
          </div>

           
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Porcentaje</label>
                    <div class="col-sm-10">
                          <input type="text" class="form-control"  maxlength="20 " name="porcentajepres"  onkeypress="return valida(event)"
                            id="myInput2"  onblur="blurFunction()"    >
                    </div>
          </div>
             
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Cuotas</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control"  maxlength="20 " name="cuotaspres"  onkeypress="return valida(event)"
                               id="myInput3"  onblur="blurFunction()" >
                                <div class="radio">
                                   <label>
                                      <input type="radio" name="opciones" id="opciones_1" value="opcion_1" checked>
                                       Mensual
                                    </label>
                                </div>
                                <div class="radio">
                                  <label>
                                      <input type="radio" name="opciones" id="opciones_2" value="opcion_2">
                                      Quincenal
                                 </label>
                        </div>
                    </div>
                   
          </div><div class="form-group">
                <label for="password" class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-10">
                          <textarea class="form-control" rows="5" id="comment" name="descripcionpres"
                           ></textarea>
                    </div>
          </div>

           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Valor Total</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="valtol" readonly="readonly"
                               >
                    </div>
          </div> 

          

          <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Codigo</label>
                   <div class="col-sm-10">
                       <input type="text" id="codigosistema" class="form-control" maxlength="15" name="codigo" readonly="readonly"
                       >
                    </div>
           </div>

          
            <div class="panel-footer" style="overflow:hidden;text-align:right;">
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit"   class="btn btn-success btn-sm" name="crearprestamo">Crear prestamo</button>
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
              

        require_once '../Negocio/Prestamo.php';
        if ( isset( $_POST['crearprestamo']  ) ) { 

    $selected_radio = $_POST['opciones'];
    if ($selected_radio == 'Mensual') {
    $quincenal = '0';

}else{
   $quincenal = '1';
        }
         
     
     $codifopres         = $_POST['codigo'];
     $fechapres          = $_POST['fecha'] ;
     $valorpres          = $_POST['valorpres'];
     $estado             = "ACTIVO";
     $porcentajepres     = $_POST['porcentajepres'];
     $valortalpres       = $_POST['valtol'];
     $saldoprestamo      = $_POST['valtol'];
     $cuotaspres         = $_POST['cuotaspres'];
     $descripcionpres    = $_POST['descripcionpres'];
     $idcliente          = $_POST['idcli'];
     
      //echo   $codifopres. $fechapres. $valorpres. $estado. $porcentajepres. $valortalpres. $saldoprestamo. $cuotaspres. $descripcionpres. $idcliente;

     $datopre = new Prestamo();
     $datopre->ValidarInsertarPrestamo($codifopres,
                                       $fechapres, 
                                       $valorpres,
                                       $estado, 
                                       $porcentajepres, 
                                       $valortalpres, 
                                       $saldoprestamo, 
                                       $cuotaspres, 
                                       $quincenal,
                                       $descripcionpres,        
                                       $idcliente);
     
    
     
       }
      
?>


           

           

           <?php 
              

    require_once '../Negocio/Cliente.php';
    if ( isset( $_POST['crearcliente']  ) ) { 
         
     
     $ced    = $_POST['ced'];
     $nom    = $_POST['nom'] ;
     $ape    = $_POST['ape'];
     $dirres = $_POST['dirres'];
     $telres = $_POST['telres'];
     $dirofi = $_POST['dirofi'];
     $telofi = $_POST['telofi'];
     $idusu  = $_SESSION["aaa"] ;
     
     //header ("Location:php/Presentacion/principal.php");
     $dato = new Cliente();
     $dato->ValidarInsertarCliente($ced, $nom, $ape, $dirres, $dirofi, $telres, $telofi, $idusu);
   //  header ("Location:ModuloCliente.php");
     
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
<?php
    
?>

