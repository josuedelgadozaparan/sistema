<?php
require('fpdf.php');
class PDF extends FPDF
{

	}
	$host="localhost";
    $user="root";
    $pass="";
    $database="sistemaprestamo";
      



           
$idpres=0;
$pdf = new PDF('L','mm','A4');
//$pdf = new PDF('p','mm','Letter'); verical
$pdf->SetMargins(10,10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(0, 126, 216);
$pdf->SetFont("Arial","b",15);
$pdf->Cell(0,5,"REPORTE DE LA CEDULA -----".date("d-m-Y H:i") ,0,1,'C');

$pdf->Ln();


 
$connection = mysqli_connect($host, $user ,  $pass,$database );
$result = mysqli_query($connection,
 "CALL REPORTE_PRESTAMOS_TODOS();") or die("Query fail: " . mysqli_error());
while ($row = mysqli_fetch_array($result)){  
$pdf->SetFont("Arial","b",9);
$pdf->Ln();

$pdf->Cell(50,5,"Cedula",1,0,'C')  ;
$pdf->Cell(20,5,"Nombre",1,0,'C')  ;
$pdf->Cell(30,5,"Apellido",1,0,'C')  ;
$pdf->Ln();
$pdf->Cell(50,5,$row['CedulaCliente'],1,0,'C') ;
$pdf->Cell(20,5,$row['NombreCliente'],1,0,'C')  ;
$pdf->Cell(30,5,$row['ApellidoCliente'],1,0,'C');//CantidadProducto   MarcaProducto
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(50,5,"COD",1,0,'C')  ;
$pdf->Cell(20,5,"Fecha",1,0,'C')  ;
$pdf->Cell(30,5,"Valor",1,0,'C')  ;
$pdf->Cell(20,5,"Estado",1,0,'C') ;
$pdf->Cell(7,5,"%%",1,0,'C')  ;
$pdf->Cell(30,5,"Total",1,0,'C')  ;
$pdf->Cell(30,5,"Saldo",1,0,'C')  ;
$pdf->Cell(12,5,"Cuotas",1,0,'C') ;  //  
$pdf->Cell(12,5,"Abono",1,0,'C')  ;  // 
$pdf->Cell(20,5,"Tipo",1,0,'C') ;  // 
$pdf->Cell(15,5,"CxU",1,0,'C')  ;  //
$pdf->Ln();
$idpres=$row['IdPrestamo'];
$pdf->Cell(50,5,$row['CodigoPrestamo'],1,0,'C') ;
$pdf->Cell(20,5,$row['FechaPrestamo'],1,0,'C')  ;
$pdf->Cell(30,5,$row['ValorPrestamo'],1,0,'C');//CantidadProducto   MarcaProducto
$pdf->Cell(20,5,$row['EstadoPrestamo'],1,0,'C');
$pdf->Cell(7,5,$row['PorcentajePrestamo'],1,0,'C');
$pdf->Cell(30,5,$row['ValorTotalprestamo'],1,0,'C');
$pdf->Cell(30,5,$row['SaldoPrestamo'],1,0,'C');
$pdf->Cell(12,5,$row['CuotasPrestamo'],1,0,'C');
$pdf->Cell(12,5,$row['CuotasAbonadas'],1,0,'C');
$pdf->Cell(20,5,$row['Tipo'],1,0,'C');
$pdf->Cell(15,5,$row['CxU'],1,0,'C');


$pdf->Ln(); 
$pdf->SetFont("Arial","b",9);
$pdf->Cell(0,5,"ABONOS");
$pdf->Ln(); 
$pdf->Cell(40,5,"ValorAbono",1,0,'C') ;
$pdf->Cell(40,5,"PendientePagar",1,0,'C') ;
$pdf->Cell(40,5,"FechaAabono",1,0,'C')  ;
$pdf->Ln(); 



  /*$resultq = mysqli_query($connection,
   "CALL REPORTE_ABONO_TODO('".$idpres."');") or die("Query fail: " . mysqli_error());
  while ($rowq = mysqli_fetch_array($resultq)){  
    $pdf->Cell(40,5,$rowq['ValorAbono'],1,0,'C');
    $pdf->Cell(40,5,$rowq['PendientePagar'],1,0,'C');
    $pdf->Cell(40,5,$rowq['FechaAabono'],1,0,'C');
 
 $pdf->Ln();  
        
  }

*/

  $pdf->Ln();
  $pdf->Ln();
 // $pdf->Cell(180,5,"______________________________________________________________________________________",1,0,'C')  ;
  $pdf->Cell(0,5,"------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------" ,0,1,'C');
  $pdf->Ln();

}


  



$pdf->Ln(); 
$pdf->Ln(); 

$pdf->Output();
/*
SELECT a.ValorAbono,a.PendientePagar,a.FechaAabono from abono a,prestamo p, cliente c where
a.IdPrestamo=p.IdPrestamo and p.Idcliente= c.IdCliente and c.CedulaCliente=10102020 and a.IdPrestamo=20*/
  

       











?>