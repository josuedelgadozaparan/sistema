<?php
class Plantilla extends CI_Controller{
	public function Recursos(){
	$data['titulo']='Recursos';
	$this->load->view('Plantilla/Header', $data);
	$this->load->view('Plantilla/Recursos');
	$this->load->view('Plantilla/Footer');
}
}

?>