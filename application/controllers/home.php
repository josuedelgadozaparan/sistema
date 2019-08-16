<?php
class home extends CI_Controller{
	public function Index(){
		$data['titulo']='Servicio de Reserva';
	$this->load->view('Plantilla/Header' , $data);
	$this->load->view('Home/Index');
	$this->load->view('Plantilla/Footer');
	}
}


?>