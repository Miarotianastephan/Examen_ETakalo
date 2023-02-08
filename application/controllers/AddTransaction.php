<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddTransaction extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_index');
        $idechange = $_GET['objetEchange'] ;
        $tab = $this->GetProduct_model->get_data_objetbyId($_SESSION['email']);
        for ($i=0; $i <count($tab) ; $i++) {
            if(isset($_GET[$tab[$i]['id']])){
                echo $tab[$i]['id'] ;
                $this->GetProduct_model->insert_proposition($idechange, $tab[$i]['id']);
            }
        }
		redirect("Affiche/getPage");
    
		
	}
	
}
