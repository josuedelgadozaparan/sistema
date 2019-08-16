<?php
    $conexion = new mysqli('localhost','u129906098_pres','a123456789','u129906098_pres',3306);
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}
	$consulta = "SELECT p.IdProducto,p.NombreProducto,p.ValorProducto,p.CantidadProducto,p.CantidadMinima,p.MarcaProducto,p.CodigoProducto,
	 dt.NombreDetalleLinea, l.NombreLinea  from producto p , linea l, detallelinea dt where 
          l.IdLinea=dt.IdLinea and p.IdDetalleLinea=dt.IdDetalleLinea;";
	$resultado = $conexion->query($consulta);
	if($resultado->num_rows > 0 ){
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once './Classes/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
							 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel con PHP y MySQL")
							 ->setSubject("Reporte Excel con PHP y MySQL")
							 ->setDescription("Reporte de alumnos")
							 ->setKeywords("reporte alumnos carreras")
							 ->setCategory("Reporte excel");
                
                $time = time();
               // echo date("d-m-Y (H:i:s)", $time);

		$tituloReporte = "Reporte de inventario de producto  ".date("d-m-Y (H:i:s)", $time);
		$titulosColumnas = array('NOMBRE', 'VALOR', 'CANTIDAD', 'MIN','MARCA','CODIGO','LINEA','SUBLINEA');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:M1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1',  $tituloReporte)
        		    ->setCellValue('A3',  $titulosColumnas[0])
		            ->setCellValue('B3',  $titulosColumnas[1])
        		    ->setCellValue('C3',  $titulosColumnas[2])
            		->setCellValue('D3',  $titulosColumnas[3])
                    ->setCellValue('E3',  $titulosColumnas[4])
                    ->setCellValue('F3',  $titulosColumnas[5])
                    ->setCellValue('G3',  $titulosColumnas[6])
                    ->setCellValue('H3',  $titulosColumnas[7]);
		
		//Se agregan los datos de los alumnos
		$i = 4;
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['NombreProducto'])
		            ->setCellValue('B'.$i,  $fila['ValorProducto'])
        		    ->setCellValue('C'.$i,  $fila['CantidadProducto'])
            		->setCellValue('D'.$i,  $fila['CantidadMinima'])
                    ->setCellValue('E'.$i,  $fila['MarcaProducto'])
                    ->setCellValue('F'.$i,  $fila['CodigoProducto'])
                    ->setCellValue('G'.$i,  $fila['NombreDetalleLinea'])
                    ->setCellValue('H'.$i,  $fila['NombreLinea']);
					$i++;
		}
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size'      => 14,
	            'color'     => array(
    	        'rgb'       => '00000000'
        	       	)
            ),
	            'fill'      => array(
				'type'	    => PHPExcel_Style_Fill::FILL_SOLID,
				'color'	    => array('argb' => 'FFFFFFFF')
			),
                'borders'   => array(
                'allborders'=> array(
                'style'     => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
                'alignment' =>  array(
        	    'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        	    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        		'rotation'  => 0,
        		'wrap'      => TRUE
    		)
        );

		$estiloTituloColumnas = array(
                'font'      => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                'rgb'       => '000000'
                )
            ),
                'fill'   	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'  => 90,
        		'startcolor'=> array(
            		'rgb'   => '000000'
        		),
        		'endcolor'  => array(
            		'argb'  => 'FFFFFFFF'//FFF0F8FF
        		)
			),
               'borders'    => array(
               'top'        => array(
               'style'      => PHPExcel_Style_Border::BORDER_MEDIUM ,
               'color'      => array(
               'rgb'        => 'FFFFFF'
                    )
                ),
                'bottom'    => array(
                'style'     => PHPExcel_Style_Border::BORDER_MEDIUM ,
                'color'     => array(
                 'rgb'      => 'FFFFFF'
                    )
                )
            ),
			    'alignment' =>  array(
        	    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        		'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        		'wrap'          => TRUE
    		));
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FFFFFFFF')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN,
	                'color' => array(
    	            	'rgb' => 'FFFFFFFF'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:H".($i-1));
				
		for($i = 'A'; $i <= 'H'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Alumnos');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reportedealumnos.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>