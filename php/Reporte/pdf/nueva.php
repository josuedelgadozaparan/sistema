<?php
require('fpdf.php');
class PDF extends FPDF
{
}
$pdf = new PDF('L','mm','A4');
//$pdf = new PDF('p','mm','Letter'); verical
$pdf->SetMargins(20,18);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(0, 126, 216);
$pdf->SetFont("Arial","b",15);
$pdf->Cell(0,5,'REPORTE DE INVENTARIO DE PRODUCTOS CON FECHA  '.date("d-m-Y H:i") ,0,1,'C');
$pdf->SetFont("Arial","b",9);
$pdf->Ln();
$pdf->Cell(30,5,"NOMBRE",1,0,'C')	;
$pdf->Cell(30,5,"VALOR",1,0,'C')	;
$pdf->Cell(30,5,"CANTIDAD",1,0,'C')	;
$pdf->Cell(30,5,"MIN",1,0,'C')	;
$pdf->Cell(30,5,"MARCA",1,0,'C')	;
$pdf->Cell(30,5,"CODIGO",1,0,'C')	;
$pdf->Cell(30,5,"LINEA",1,0,'C')	;
$pdf->Cell(30,5,"SUBLINEA",1,0,'C')	;  //   
$pdf->Ln();
///////////////////////////////////////////
/*
$conexion = mysql_connect("localhost", "u188606260_venta", "123456");
mysql_select_db("u188606260_venta", $conexion);
$result=@mysql_query('SELECT p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
	 dt.NombreDetalleLinea, l.NombreLinea  from producto p , linea l, detallelinea dt where 
          l.IdLinea=dt.IdLinea and p.IdDetalleLinea=dt.IdDetalleLinea',$conexion); 
while($row =@mysql_fetch_array($result))
{
$pdf->Cell(30,5,$row['NombreProducto'],1,0,'C')	;
$pdf->Cell(30,5,$row['ValorProducto'],1,0,'C')	;
$pdf->Cell(30,5,$row['CantidadProducto'],1,0,'C');//CantidadProducto   MarcaProducto
$pdf->Cell(30,5,$row['CantidadMinima'],1,0,'C');
$pdf->Cell(30,5,$row['MarcaProducto'],1,0,'C');
$pdf->Cell(30,5,$row['CodigoProducto'],1,0,'C');
$pdf->Cell(30,5,$row['NombreDetalleLinea'],1,0,'C');
$pdf->Cell(30,5,$row['NombreLinea'],1,0,'C');
$pdf->Ln();	
}
*/
/////////////////////////////////////////////////
 $conexion = mysqli_connect("mysql.1freehosting.com", "u129906098_pres", "a123456789", "u129906098_pres");
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}
	$consulta = "SELECT p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
	 dt.NombreDetalleLinea, l.NombreLinea  from producto p , linea l, detallelinea dt where 
          l.IdLinea=dt.IdLinea and p.IdDetalleLinea=dt.IdDetalleLinea;";
	$resultado = $conexion->query($consulta);
	while ($row = $resultado->fetch_array()) {
		$pdf->Cell(30,5,$row['NombreProducto'],1,0,'C')	;
		$pdf->Cell(30,5,$row['ValorProducto'],1,0,'C')	;
		$pdf->Cell(30,5,$row['CantidadProducto'],1,0,'C');//CantidadProducto   MarcaProducto
		$pdf->Cell(30,5,$row['CantidadMinima'],1,0,'C');
		$pdf->Cell(30,5,$row['MarcaProducto'],1,0,'C');
		$pdf->Cell(30,5,$row['CodigoProducto'],1,0,'C');
		$pdf->Cell(30,5,$row['NombreDetalleLinea'],1,0,'C');
		$pdf->Cell(30,5,$row['NombreLinea'],1,0,'C');
		$pdf->Ln();		
		}


$pdf->Output();
	
?>