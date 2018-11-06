<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		// Call the CI_Controller constructor
		parent::__construct();

		$this->load->helper('url');

	}

	public function index()
	{	
		//$data['siswa'] = $this->get();
		// print_r($data);

		
		$this->load->view('header.php');
		$this->load->view('dashboard_view.php');
		$this->load->view('footer.php');
	}
	

  
	
}
