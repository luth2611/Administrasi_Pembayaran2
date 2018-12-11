<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
  }

  public function index()
	{
    if($this->session->userdata('logged_in'))
    {
      redirect('Dashboard', 'refresh');
    }else
    {
      $this->load->helper(array('form'));
    	$this->load->view('login_view');
    }
  }
    
    public function login_wali_murid(){
    if($this->session->userdata('logged_in')){
      redirect('Dashboard', 'refresh');
    }else{
      $this->load->helper(array('form'));
    	$this->load->view('login_wali_murid');
    }

	}

}
 ?>
