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
            $('#mensaje').fadeOut() 
           }) 
            $('#frmcedulano').click(function(){
            $('#mensaje').fadeOut() 
            }) 
            $('#btncrearcliente').click(function(){
            $('#paracrearcliente').fadeOut()
            $('#paracrearprestamo').fadeIn() 
              
            }) 
           })  
        </script>

        <script>
	function myFunction1() {
		var x = document.getElementById("mySelect1").value;
		if(x=="EDITAR")
		{
           $('#id_modal_valor_configurar').attr('disabled', false); 
           $("#id_modal_valor_configurar").val(global_abono);  
           $("#id_modalBtnConfigurar").html('EDITAR');
           $('#mostrar_eliminar').hide()
           $('#mostrar_editar').show() 
           $('#mostrar_mensaje_alerta').hide()


//
        }
        else if(x=="ELIMINAR")
        {
         $('#id_modal_valor_configurar').attr('disabled', true);    
         $("#id_modal_valor_configurar").val(global_abono); 
         $("#id_modalBtnConfigurar").html('ELIMINAR');
         $('#mostrar_editar').hide()
         $('#mostrar_eliminar').show() 
         $('#mostrar_mensaje_alerta').show() 
        
             
         }


         }
           </script> 

  <script type="text/javascript">
	var global_abono=0;
	$(document).ready(function(){
		$(".boton2").click(function(){
			 var valor = [];
			var i=0;
            $(this).parents("tr").find("td").each(function(){
             valor[i]=$(this).html();
             i++;
             });
             $("#id_modal_idprestamo_eliminar").val(valor[0]);
             $("#id_modal_fechaprestamo_eliminar").val(valor[1]);
         	 $("#id_modal_codprestamo_eliminar").val(valor[2]);//
         	 $("#id_modal_valorprestamo_eliminar").val(valor[3]);
         	 ///////////////////////////////////////////////////////////
         	 $("#id_modal_idprestamo_editar").val(valor[0]);
             $("#id_modal_cedula_editar").val(valor[1]);
         	 $("#id_modal_fecha_editar").val(valor[3]);//
         	 $("#id_modal_valor_editar").val(valor[4]);
         	 $("#id_modal_valor_editar_oculto").val(valor[4]);
         	 $("#id_modal_porcentaje_editar").val(valor[6]);
             $("#id_modal_meses_editar").val(parseInt(valor[9])-parseInt(valor[10]));
         	 $("#id_modal_valortotal_editar").val(valor[7]);//id_modal_saldo_editar
         	  $("#id_modal_saldo_editar").val(valor[8]);//id_modal_saldo_editar
         	 $("#id_modal_valorcadacuota_editar").val(valor[11]);//

           	 $("#id_modal_codigo_editar").val(valor[2]);
           
			


       });
	});

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
   //
    //var radio =document.getElementById('tipo').value; 
    var hora=fechasistema.getHours();
    var minuto = fechasistema.getMinutes();
    var segundo = fechasistema.getSeconds();
    var interese=0;
    var valortotal=0;
    var valordecadacuota;
    //adder nombre del formulario
    var codigo_completo =cedula+"-"+fecha+"-"+hora+"-"+minuto+"-"+segundo;
    if((valor.length>0)&&(porcentaje.length>0)&&(cuotas.length>0)){
    interese=(valor*porcentaje)/100;
    //alert(radio);
    valortotal=parseInt(valor)+parseInt(cuotas*interese);
    document.adder.valtol.value =valortotal;
    document.adder.codigosistema.value =codigo_completo;
    valordecadacuota=parseInt(valortotal)/parseInt(cuotas);
    document.adder.cadacuota.value =valordecadacuota;
    //codigosistema  valor_quincena
    document.adder.valor_quincena.value =parseInt(cuotas)*2;
   }else
   {
      
   }
  }
</script>

<script>
function blurFunction2() {

	
	var valor2=document.getElementById('id_modal_valor_editar').value;
	var valor2_oculto=document.getElementById('id_modal_valor_editar_oculto').value;
	if(parseInt(valor2)>=parseInt(valor2_oculto)){
	valor2=document.getElementById('id_modal_valor_editar').value;
	var valor_adicional=document.getElementById('id_modal_valor_nuevo_adicional').value;
    var porcentaje2=document.getElementById('id_modal_porcentaje_editar').value;
    var cuotas2=document.getElementById('id_modal_meses_editar').value;
   
   if((valor2.length>0)&&(porcentaje2.length>0)&&(cuotas2.length>0)){
    var interese2=(valor2*porcentaje2)/100;
    var  valortotal2=parseInt(parseInt(valor2)+parseInt(valor_adicional))+parseInt(cuotas2*interese2);
    document.adder_2.id_modal_valortotal_nuevo.value =valortotal2;
    var valordecadacuota2=parseInt(valortotal2)/parseInt(cuotas2);
    document.adder_2.id_modal_valorcadacuota_editar.value =valordecadacuota2;

	}
	else{
	alert("NO SE PUEDE INGRESAR UN VALOR MENOR A "+valor2_oculto);
	}


   



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
       <?php 
       include_once(dirname(__FILE__).'/plantilla.php');
       ?>
<br><br><br>

<div class="container">
    <div class="row">
         <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12  ">
              <div class="form-group">
                      <img src="../../img/img_prestamos_1.png" class="img-responsive">
             </div>
        </div>
     </div>
 </div>
<br><br>
<div id="esquemausuario" class="container">
      <div class="row">
            <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                  <div class="panel panel-primary">
                       <div class="panel-heading">
                             <h4>INFORMACION DEL CLIENTE</h4>
                       </div>
                         <div class="panel-body">
                        <form class="form-horizontal" role="form"  method="POST"><br>
                                        <label for="password" class="col-sm-2 control-label">DIGITE LA CEDULA</label>
                                           <div class="col-sm-10">
                                              <input type="text" class="form-control" id="buscarcedula" name="cedula" onkeypress="return valida(event)" onkeydown="search(this)"> <br>
                                              <button type="submit" id="mostrarinfo" class="btn btn-primary btn-md" name="buscar" >BUSCAR CLIENTE</button>
                                           </div>

                                         <br>
                                </form>
                        </div> 
                  </div> 
          </div> 
    </div> 
</div>

<div id="mensaje" class="container">
      <div class="row">
            <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                 <div class="table-responsive">
                              <table class="table"  id="tbcliente">
                                
                                         

                                       <?php
                                            require_once '../Negocio/Cliente.php';
                                            if ( isset( $_POST['buscar']  ) ) 
                                            { 
                                            asignaEdad();
                                            $cedula_cli=$_POST['cedula'];
                                              $dato = new Cliente();
                                            $vacio=    $dato->ValidarConsultarClienteCedulaPrestamo($_POST['cedula']);
                                            if($vacio==false)
                                            {

                                        ?>
                                   
                                                                         
                                          
                                          <tr>
                                          <td>La cedula con numero  <?php echo $cedula_cli;  ?>   no se encuentra registrada en la base de datos.
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
                        </div> </div> </div> </div>

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
                               <button type="submit" id="btncrearcliente" class="btn btn-success btn-sm" name="crearcliente">CREAR</button>
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
                                             $ced_=$_POST['cedula'];
                                                if($vacio==false){
                                                   ?>
                                              <br> <br>
                                               <div class="form-group">
                                                  <button  id="mostrar" class="btn btn-success" name="buscar" >NUEVO PRESTAMO</button>
                                                   <div class="col-sm-10">
                                                   </div>
                                                       </div>
                                                
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
                         <input type="text" id="ced_" class="form-control" maxlength="20" name="cedulacliente" readonly="readonly" 
                         value= <?php  echo $ced_    ?> >

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
                <label for="password" class="col-sm-2 control-label">Meses</label>

                    <div class="col-sm-10">
                         <input type="text" class="form-control"  maxlength="20 " name="cuotaspres"  onkeypress="return valida(event)"
                               id="myInput3"  onblur="blurFunction()" >
                              
                                
                        </div>
                         
                    </div>
                   
                   
          <div class="form-group">
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
                <label for="password" class="col-sm-2 control-label">Valor de cada cuota</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" id="cadacuota" name="unidad" readonly="readonly"
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

          <div class="form-group" style="display:none;">
                <label for="name" class="col-sm-2 control-label">cuotas  quiencenales</label>
                   <div class="col-sm-10">
                       <input type="text" id="valor_quincena" class="form-control" maxlength="15" name="quincena" readonly="readonly"
                       >
                    </div>
           </div>
          
            <div class="panel-footer" style="overflow:hidden;text-align:right;">
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit"   class="btn btn-warning btn-smd" name="crearprestamo">Crear prestamo</button>
                              <button type="submit" class="btn btn-default btn-md">Cancel</button>
                        </div>
                   </div>  
                </div>
  
                
            </form>
         </div>
  
         </div>
     </div>

</div>                 <!-- FIN   FORMULARIO PARA CREAR-->

<!-- MODAL PARA REALIZAR ABONOS DE UN PRESTAMO DE UN CLIENTE -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">INFORMACION PARA EL ABONO</h4>
      </div>
      <div class="modal-body">
      
        <form class="form-horizontal" role="form" NAME="adderdddd" method="POST">
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Valora sugerido</label>
                    <div class="col-sm-10">
                         <input type="text"  class="form-control"    readonly="readonly" 
                    >
                    </div>
                    
           </div>
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Valora  abonar </label>
                    <div class="col-sm-10">
                         <input type="text"  class="form-control" maxlength="20" name="valorabonar" onkeypress="return valida(event)"
                  id="txtabono"  >
                    </div>

           </div>
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">id prestamo </label>
                    <div class="col-sm-10">
                         <input type="text"  class="form-control" maxlength="20" name="idprestamo"  readonly="readonly"
                  id="txtidprestamo"  >
                    </div>

           </div>
           
        </form> 

      </div>
      <div class="modal-footer">
        <button id="btnprocesarjs"  class="btn btn-success btn-md" >CREAR</button>
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">SALIR</button>
       
        
      </div>
    </div>
  </div>
</div>

<!-- /.MODAL ELIMINAR ABONO --> 
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">CONFIGURACION DEL PRESTAMO</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form"  NAME="adder_2" method="POST">
					<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span><b> SELECCIONE LA OPCION </b>
					</div>
					<div class="form-group">

						<div class="col-sm-12">
							<select id="mySelect1" name="opcion_configuracion" class="form-control" onchange="myFunction1()">
								<option>EDITAR</option>
								<option>ELIMINAR</option>
							</select>
						</div>
					</div>
					<div id="mostrar_eliminar" style="display:none";>
						
						 <input id="id_modal_idprestamo_eliminar" style="display:none;"   type="text"  class="form-control" maxlength="10" name="modal_idprestamo_eliminar" readonly="readonly"/>
					     <label for="password" class="col-sm-1 control-label">Fecha  </label>
						 <input id="id_modal_fechaprestamo_eliminar"   type="text"  class="form-control" maxlength="10"  name="" readonly="readonly"/>
						 <label for="password" class="col-sm-1 control-label">Codigo  </label>
						 <input id="id_modal_codprestamo_eliminar"        type="text"  class="form-control" maxlength="10"  name="" readonly="readonly"/>
						 <label for="password" class="col-sm-1 control-label">Valor  </label>
						 <input id="id_modal_valorprestamo_eliminar"        type="text"  class="form-control" maxlength="10"  name="" readonly="readonly"/>
					</div>
					<div id="mostrar_editar">
					<div class="row">
					<div class="col-md-6">
						 <input id="id_modal_idprestamo_editar"  style="display:none;"   type="text"  class="form-control" maxlength="10" name="txt_id_modal_idprestamo_editar" readonly="readonly"/>
						 <label for="password" class="col-sm-1 control-label">Cedula  </label>
						 <input id="id_modal_cedula_editar"    type="text"  class="form-control" maxlength="10" name="" readonly="readonly"/>
						 <label for="password" class="col-sm-1 control-label">Fecha  </label>
						 <input id="id_modal_fecha_editar"   type="text"  class="form-control" maxlength="10"  name="" readonly="readonly"/>
						 <input id="id_modal_valor_editar_oculto"   style="display:none;"      type="text"  class="form-control" maxlength="10"  name=""  onkeypress="return valida(event)" readonly="readonly"//>
						 <label for="password" class="col-sm-1 control-label">%%  </label>
						 <input id="id_modal_porcentaje_editar"    type="text"  class="form-control" maxlength="3" name=""  onkeypress="return valida(event)" readonly="readonly"/>
					     <label for="password" class="col-sm-10 control-label">Valor inicial prestamo </label>
						 <input id="id_modal_valor_editar"        type="text"  class="form-control" maxlength="10"  name=""  onkeypress="return valida(event)" readonly="readonly"/  />
				    </div>
					<div class="col-md-6">
						 <label for="password" class="col-sm-1 control-label">Cuotas  </label>
						 <input id="id_modal_meses_editar"   type="text"  class="form-control" maxlength="2"  name=""  onkeypress="return valida(event)" readonly="readonly"/>
						 <label for="password" class="col-sm-10 control-label"> total valor   a cancelar inicial </label>
						 <input id="id_modal_valortotal_editar"        type="text"  class="form-control" maxlength="10"  name="txt_modal_valortotal_editar" readonly="readonly"/>
						 <label for="password" class="col-sm-10 control-label">valor de cada cuota inicial </label>
						 <input id="id_modal_valorcadacuota_editar"        type="text"  class="form-control" maxlength="10"  name="txt_modal_valorcadacuota_editar" readonly="readonly"/>
						 <label for="password" class="col-sm-1 control-label">Codigo  </label>
						 <input id="id_modal_codigo_editar"        type="text"  class="form-control" maxlength="10"  name="txt_id_modal_codigo_editar" readonly="readonly"/>
						 <label for="password" class="col-sm-10 control-label">Saldo inicial </label>
						 <input id="id_modal_saldo_editar"        type="text"  class="form-control" maxlength="10"  name="txt_id_modal_saldo_editar" readonly="readonly"/>
					</div>
						<div class="col-md-6">
						<label for="password" class="col-sm-10 control-label" style="color:red;" >Valor adicional a prestar  </label>
						<input id="id_modal_valor_nuevo_adicional"        type="text"  class="form-control" maxlength="10"  name="" onblur="blurFunction2()"  onkeypress="return valida(event)" />
						
						</div>
						<div class="col-md-6">
						 <label for="password" class="col-sm-10 control-label" style="color:red;"> nuevo valor   a cancelar  </label>
						 <input id="id_modal_valortotal_nuevo"        type="text"  class="form-control" maxlength="10"  name="" readonly="readonly"/>
						 
						</div>
				


					</div>
					</div>
				</div>
				<div class="modal-footer ">
				
				 

				<div id="mostrar_mensaje_alerta" style="display:none;">  <b style="color:red;" >¡ESTA SEGURO QUE DESEA ELIMINAR EL PRESTAMO?</b>  </div><br> 
					<button type="submit" class="btn btn-danger" id="id_modalBtnConfigurar" name="modalBtnConfigurar"></span>EDITAR</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
				</div>
			</form>
		</div>

	</div>
	<!-- /.fin --> 



<?php 
              

    require_once '../Negocio/Prestamo.php';
    if ( isset( $_POST['crearprestamo']  ) ) { 
     $codifopres         = $_POST['codigo'];
     $fechapres          = $_POST['fecha'] ;
     $valorpres          = $_POST['valorpres'];
     $estado             = "ACTIVO";
     $porcentajepres     = $_POST['porcentajepres'];
     $valortalpres       = $_POST['valtol'];
     $saldoprestamo      = $_POST['valtol'];
     $cuotaspres         = $_POST['cuotaspres'];//alumno
   //  $tipo               = $_POST['alumno'];
     $cunidad            = $_POST['unidad'];
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
                                       "MENSUAL",
                                       $cunidad,
                                       $descripcionpres,        
                                       $idcliente);
     
    
     
       }


      
?>


           

           

           <?php 
              

    require_once '../Negocio/Cliente.php';
    if ( isset( $_POST['crearabono']  ) ) { 
         
     
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
 <?php 
              

    require_once '../Negocio/Abono.php';
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

 <?php 
              

    require_once '../Negocio/Abono.php';
    require_once '../Negocio/Prestamo.php';
    if ( isset( $_POST['modalBtnConfigurar']  ) ) { 
         
   		if(!strcmp($_POST['opcion_configuracion'], "ELIMINAR"))//modal_idprestamo
           {
            $datopre = new Prestamo();
            $datopre->ValidarEliminarPrestamo($_POST['modal_idprestamo_eliminar']);
                                          					
                     }
            else if(!strcmp($_POST['opcion_configuracion'], "EDITAR"))
            {

            		    
//echo '<script>alert (" Ha respondido '.$_POST['id_modal_valor_editar'].' respuestas afirmativas");</script>';
									   $datopres = new Prestamo();
				                       $datopres->ValidarActualizarPrestamo_editar(
				                       $_POST['txt_modal_valor_editar'],
				                       $_POST['txt_modal_valortotal_editar'],
				                       $_POST['txt_modal_valortotal_editar'],
                                       "E-".$_POST['txt_id_modal_codigo_editar'],
                                       $_POST['txt_id_modal_idprestamo_editar'],
                                       $_POST['txt_modal_valorcadacuota_editar']
                                        );

            }
    
     
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
    
?>x|