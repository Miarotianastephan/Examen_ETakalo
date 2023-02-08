<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accept extends CI_Controller {

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
	public function index($id)
	{
        $tab = $this->GetProduct_model->getObjet($id);

        $_SESSION['idobj'] = $id;
        $_SESSION['membre'] = $tab['idMembre'];

        // echo$_SESSION['idobj'];
        // echo $_SESSION['membre'].'<br>';
        
        $tab = $this->GetProduct_model->verifPropostion($_SESSION['email']); 
        
        for ($i=0; $i < count($tab) ; $i++) { 
            //     if($id == $tab[$i]['idA_echanger']){
            // $tab2 = $this->GetProduct_model->getObjet($tab[$i]['idB_echanger']);
            // echo $tab2['idMembre'];
            // echo $tab[$i]['idB_echanger'].'<br>';
                $this->GetProduct_model->update_objet($_SESSION['membre'],$_SESSION['idobj'], $tab[$i]['idB_echanger']);
        //         // $this->GetProduct_model->update_objet(7, 5);
        //     }
        }
        redirect("Affiche/getPage");
	}
	
}
