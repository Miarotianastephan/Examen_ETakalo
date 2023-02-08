<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiche extends CI_Controller {
	public function index()
	{
	
		header("content-Type: application/json");
		$tab = array();
		$tab = $this->GetProduct_model->getMembres();
		$email = $this->input->post('email') ;
		$password = $this->input->post('mdp') ;
		$tablo = null ;
		if(Membres_Exists($tab, $email, $password) == "exists"){
			$id = GetId($tab, $email, $password);
			// $this->session->set_userdata('myid', $id);
			$_SESSION['email'] = $id;
			$tablo = "succes";
		}
		echo json_encode($tablo);
	}
	public function insertMember(){
		header("content-Type: application/json");
		$email = $this->input->post('emailnew') ;
		$nom = $this->input->post('name') ;
		$pwd = $this->input->post('mdpnew') ;
		if($email == "" || $nom == "" || $pwd == ""){
			$tablo = null;
		}
		else{
			$tablo = $this->GetProduct_model->addMember($nom, $email, $pwd);
		}
		echo json_encode($tablo);
	}
	public function getPage(){
		$this->load->view("Page");
	}
	public function getOffre($aa=''){
		$_SESSION['offre'] = $aa;
		$this->load->view("Offre");
	}
	public function getJson(){
		header("content-Type: application/json");
		$tablo = array();
		$tablo = $this->GetProduct_model->get_data_objet();
    	echo json_encode($tablo);
	}

}
