<?php
class Plantilla extends CI_Controller{
	public function Index(){
	$data['titulo']='Pagina Principal';
	$this->load->view('Plantilla/Header' , $data);
	$this->load->view('Platilla/Index');
	$this->load->view('plantilla/Footer');
	
	}
	public function Recursos(){
		$data['titulo']='Recursos';
	$this->load->view('Plantilla/Header' , $data);
	$this->load->view('Plantilla/Recursos');
	$this->load->view('Plantilla/Footer');
	}
	public function Disponibilidad(){
		$data['titulo']='Disponibilidad';
		$this->load->view('Plantilla/Header', $data);
		$this->load->view('Plantilla/Disponibilidad');
		$this->load->view('Plantilla/Footer');

	}
	public function Estadistica(){
		$data['titulo']='Estadistica';
		$this->load->view('Plantilla/Header', $data);
		$this->load->view('Plantilla/Estadistica');
		$this->load->view('Plantilla/Footer');
	}
	public function Sidebar(){
		$data['titulo']='Sidebar';
		$this->load->view('Plantilla/Header', $data);
		$this->load->view('Plantilla/Sidebar');
		
	}
}
?>