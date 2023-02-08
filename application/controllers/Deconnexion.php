<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deconnexion extends CI_Controller {

	public function index()
	{
        session_destroy();
        redirect("begin");
	}
	
}
