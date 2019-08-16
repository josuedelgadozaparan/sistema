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
    <script>
    function tablas(){
var yea=document.getElementById("tablafactura").rows.length;


</script>
    <script>


function proceso(){


           
           $("#porfin").click(); 
           


           
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
                    
                      <img src="../../img/img_ventas_1.png" class="img-responsive">
                  
             </div>
        </div>
     </div>
 </div>




<!--  FORMULARIO PARA CREAR-->
 <div id="paracrearcliente"  >
     <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center;">FACTURA DE VENTA</h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Codigo</label>

                   <div class="col-sm-4">
                       <input type="text" id="someTextBox"  class="form-control" maxlength="15" name="codigo"  onkeypress="return valida(event)">
                <script type="text/javascript">
                $('#someTextBox').keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    var valor =$('#someTextBox').val();
                    $("#someTextBox").val(''); 
                    $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja1" : valor,"valorCaja2":'1'},
                            success:  function (response) {
                            if(response==null){
                           // alert("vacio");
                            }else{
                            var cantidadajax=0;
                            var cantidadacomuladajax=0;
                            var cantidadllevar =$('#cantidadllevar').val();
                            response = $.parseJSON(response)
                            $("#nombreproducto").val(response.NombreProducto); 
                            $("#valor").val(response.ValorProducto) 
                            var total_acomulado=$('#totalacomulado').val();
                            total_acomulado=parseInt(total_acomulado)+parseInt(response.ValorProducto);
                            $("#totalacomulado").val(total_acomulado); 
                            $('#TablaDatos > tbody:last').append('<tr><td style="display:none;">'+response.IdProducto+'</td><td>'+response.NombreProducto+'</td><td>'+response.ValorProducto+'</td><td>'+cantidadllevar+'</td><td>'+response.ValorProducto*cantidadllevar+'</td><td>'+"<button  type="+'button'+"  onclick="+'myFunction(this)'+"></button>"+'</td></tr>')
                            cantidadajax =$('#cantidadllevar').val();
                            cantidadacomuladajax=$('#total_articulos').val();
                            cantidadacomuladajax=parseInt(cantidadacomuladajax)+parseInt(cantidadajax);
                            $("#total_articulos").val(cantidadacomuladajax) ;
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            //alert("Estas viendo esto por que fallé"+valor);
                                        }

                                          });


                                     }
                              event.stopPropagation(); });
             
           
           
        </script>
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-4">
                        <input type="text" id="nombreproducto"  class="form-control"  maxlength="20" name="nombre" readonly="readonly" >
                     </div>
                     <label for="password" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-4">
                         <input type="text" id="valor" class="form-control" maxlength="10" name="valor" readonly="readonly" >
                    </div>
          </div>



           

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Doc Cliente</label>
                    <div class="col-sm-4">
                        <input type="text" id="documentocliente" class="form-control" maxlength="20"  name="dirres" onkeypress="return valida(event)"  >
                     <script type="text/javascript">
                $('#documentocliente').keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    var valor =$('#documentocliente').val();
                    //$("#documentocliente").val(''); 

                    $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja1" : valor,"valorCaja2":'2'},
                            success:  function (response) {
                            if(response==null){
                          //  alert("vacio");
                            }else{
                            response = $.parseJSON(response)
                            $("#idtxtusuario").val(response.LoginUsuario); 
                            $("#idcliente").val(response.IdCliente);    
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            //alert("Estas viendo esto por que fallé"+valor);
                                        }

                                          });
                                     }
                              event.stopPropagation(); });
             
           
           
        </script>
                    </div>
                     <label for="password" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-4">
                        <input type="text"  id="cantidadllevar" class="form-control" maxlength="20"  name="cantidad" value="1" onkeypress="return valida(event)"  >
                    </div>

          </div>
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Nombre  Cliente</label>
                    <div class="col-sm-4">
                        <input type="text" id="nombre_cliente" class="form-control" maxlength="20"  name="dirres" onkeypress="return valida(event)" readonly="readonly"   >
                    </div>
                    <label for="password"    style="display:none;" class="col-sm-2 control-label">idCliente</label>                    <div class="col-sm-4" >
                        <input type="text" style="display:none;"  id="idcliente" class="form-control" maxlength="20"  name="idcli"  onkeypress="return valida(event)"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-4">
                          <textarea class="form-control" rows="3" id="obse" name="observaciones"
                           ></textarea>
                    </div>
                    <label for="password" class="col-sm-2 control-label">Tipo factura</label>
                    <div class="col-sm-4">
                         <select  id="t_factura" name="opcion1" class="form-control">
                             <option>TIQUETE</option>
                            <option>CARTA-</option>   
                        </select>
                    </div>

          </div>

     
         

          <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Medio de pago
    </label>
    <div class="col-sm-4">
      <select   name="opcion" class="form-control">
          <option select>EFECTIVO</option>
          <option>DEBITO</option>
          <option>CRETIDO</option>
          <option>EFECTIVO - DEBITO</option>
          <option>EFECTIVO - CREDITO</option>
          <option>DEBITO   - CREDITO</option>
          
   
</select>

    </div>
    <label for="password" class="col-sm-2 control-label">Total articulos</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" id="total_articulos" maxlength="20 " value="0" name="cantidadtotal" onkeypress="return valida(event)" 
                         readonly="readonly" >

                    </div>
  </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" id="totalacomulado" maxlength="20 " name="valortotal"  onkeypress="return valida(event)" 
                         readonly="readonly" value="0">
                    </div>
                    <label for="password" class="col-sm-2 control-label">Recibido</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" id="recibido" maxlength="20 " name="telofi" onkeypress="return valida(event)" 
                         >

                    </div>
                     <div class="col-sm-4">
                         <input type="text" style="display:none;" class="form-control" id="idfactura" maxlength="20 " value="0"  onkeypress="return valida(event)" 
                         readonly="readonly" >

                    </div>
          </div>

          
                
        <button type="button" class="btn btn-danger primary btn-sm" data-toggle="modal" data-target="#myModal">
       GENERAR FACTURAR
        </button>


               
                  

                  <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                    <div  class="table-responsive">
                         <table  id="TablaDatos" class="table table-striped" name="tablafactura"><br><br> 
                            
                            <tr><th style="display:none;">ID</th><th>NOMBRE</th><th>VALOR</th><th>CANTIDAD</th><th>SUBTOTAL</th><th></th></tr>


                          </table>
                          <script>
                          function myFunction(e) {
                          
                          $(e).parent().parent().remove();

                          

                                                    }
                          </script>    

                           <script>
                          function cargarinsertar() {
                            
                            var numerodefactura_="cam";
                            var cantidadtotal_=document.getElementById('total_articulos').value; 
                            var valortotal_=document.getElementById('totalacomulado').value; 
                            var observaciones_=document.getElementById('obse').value; 
                            var idcliente_=document.getElementById('idcliente').value;
                            var recibido_=document.getElementById('recibido').value;  
                            
                          $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja2":'A',"valorCaja4" : numerodefactura_,"valorCaja5" : cantidadtotal_,"valorCaja6" : valortotal_,"valorCaja7" : observaciones_,"valorCaja8" : idcliente_,"valorCaja9" : recibido_},
                            success:  function (response) {
                            if(response==null){
                            //alert("vacio");
                            }else{
                            
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                           // alert("Estas viendo esto por que fallé"+valor);
                                        }

                                          });    
                          


                         

                                  ////////////////////////////////////////////////////////////////////////////



                          $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja2":'B'},
                            success:  function (response) {
                            if(response==null){
                          //  alert("vacio");
                            }else{
                            response = $.parseJSON(response)
                            $("#idfactura").val(response.IdFactura);  
                            var idfinal=response.IdFactura;
                           // alert(response.IdFactura);

                            ///////////////////////////////////////////////
                          var idfactura_fd=response.IdFactura;
                             // idfactura_fd=parseInt(idfactura_fd)+1;
                          var idproducto_fd=0;  ////para factura_detalle
                          var cantidad_fd=0;  ////para factura_detalle
                          var subtotal_fd=0;  ////para factura_detalle
                          var textos = '';
                          var cantidad=0;
                          var cantidad_acomulada=0;
                          var valores='';
                          var total_acomulado=0;
                          for (var i=1;i<document.getElementById('TablaDatos').rows.length;i++) {
                              for (var j=0;j < document.getElementById('TablaDatos').rows[i].cells.length-1;j++)
                                   {
                                      textos = document.getElementById('TablaDatos').rows[i].cells[j].innerHTML ;
                                      valores=document.getElementById('TablaDatos').rows[i].cells[2].innerHTML;
                                      cantidad= document.getElementById('TablaDatos').rows[i].cells[3].innerHTML;//OK
                                      idproducto_fd= document.getElementById('TablaDatos').rows[i].cells[0].innerHTML;//OK
                                      subtotal_fd= document.getElementById('TablaDatos').rows[i].cells[4].innerHTML;//OK


                                   }
                             
                               /////////////////////////////ajax envio a factura_detalle////////////////////////
                              
                            $.ajax({
                            type:  "GET",
                            url:   "../Datos/ProcesoAjax.php",
                            data: {"valorCaja2":'C',"valorCaja3" : idfactura_fd,"valorCaja4" : idproducto_fd,"valorCaja5" : cantidad,"valorCaja6" : subtotal_fd},
                            success:  function (response) {
                            if(response==null){
                          //  alert("vacio");
                            }else{
                            
                             }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            //alert("Estas viendo esto por que fallé"+valor);
                                        }

                                          });    

                              /////////////////////////////ajax envio a factura_detalle////////////////////////
                              

                              total_acomulado=parseInt(valores)+parseInt(total_acomulado);
                              cantidad_acomulada=parseInt(cantidad_acomulada)+parseInt(cantidad);
                              textos='';
                                   
                                         }
                                        
                                  $("#totalacomulado").val(total_acomulado) ;
                                  $("#total_articulos").val(cantidad_acomulada) ;

                                  //idfinal=parseInt(idfinal)+1;
                                  var tipo_factura= document.getElementById('t_factura').value; 
                                 // alert($("#t_factura").val());
                                  //$("#myCombo").val()


                                  if(tipo_factura=="TIQUETE"){
                                   //   alert(tipo_factura);
                                   var ti="../Reporte/pdf/nuevafacturaxtiquete.php?id="+idfinal;
                                       
                                    window.open(ti,'_blank');
                                     //header ("Location:../Reporte/pdf/nuevafacturaxtiquete.php?id="+idfinal);
                                     


                                  }else{
                                 
                                  var ca="../Reporte/pdf/nuevafacturaxcarta.php?id="+idfinal;
                                       
                                    window.open(ca,'_blank');
                                  //    window.open("../Reporte/pdf/nuevafacturaxcarta.php?id="+idfinal);
                                    // header ("Location:../Reporte/pdf/nuevafacturaxcarta.php?id="+idfinal);
                                  }

                                 

                            //////////////////////////////////////////////
                            }
                              },  
                             error: function(objeto, quepaso, otroobj){
                            //alert("Estas viendo esto por que fallé"+valor);
                                        }

                                          }); 
                            ////////////////////////////////////// 
                          

                                                    }
                          </script>    
                    </div>
                  </div>
                   
<button type="submit" id="porfin"   onclick="cargarinsertar()" style="display:none;" >

       REGISTRAR FACTURA
        </button>
       
            </form>
         </div>
  
         </div>
     </div>

</div>  




           <!-- FIN   FORMULARIO PARA CREAR-->


           <!-- FORMULARIO PARA CUANDO SE PRASIONE EL BOTON GENERAR FACTURA     VENTANA MODAL -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CONFIRMACION</h4>
      </div>
      <div class="modal-body">
      ¿Esta seguro de generar la factura?
      </div>
      <div class="modal-footer">
         <form class="form-horizontal" role="form" method="POST">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        
         
        <button type="button" class="btn btn-default"   data-dismiss="modal" onclick="proceso()">SI</button>
         </from>



      </div>
    </div>
 
  </div>



 


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


        <script src="../../js/plugins.js"></script>
        <script src="../../js/main.js"></script>
        <script src="../../js/bootstrap-modal.js"></script>
        <script src="../../js/jquery.1.11.1.js"></script>

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
