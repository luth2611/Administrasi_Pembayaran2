<?php
Class VerifyLogin extends CI_Controller{

  function __construct()
  {
    parent:: __construct();
    $this->load->model('user', '', TRUE);
  }

  function cekLogin()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

    if($this->form_validation->run() == FALSE)
    {
      
        //Field validation failed.  User redirected to login page
        $this->load->view('login_view');
    
    
    }
    else
    {
      //Go to private area
      if($this->session->userdata('hak_akses') == "admin"){
        redirect('dashboard', 'refresh');  
      }else if($this->session->userdata('hak_akses') == "walimurid"){
        redirect('walimurid', 'refresh');
      }
      
    }

  }

  // function verifyLoginWaliMurid()
  // {
  //   //This method will have the credentials validation
  //   $this->load->library('form_validation');
  //   $this->form_validation->set_rules('username', 'Username', 'trim|required');
  //   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

  //   if($this->form_validation->run() == FALSE)
  //   {
  //     //Field validation failed.  User redirected to login page
  //     $this->load->view('login_wali_murid');
  //   }
  //   else
  //   {
  //     //Go to private area
  //     if($this->session->userdata('hak_akses') == "admin"){
  //       redirect('dashboard', 'refresh');  
  //     }else if($this->session->userdata('hak_akses') == "walimurid"){
  //       redirect('walimurid', 'refresh');
  //     }
      
  //   }

  // }

  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');

    //query the database
    $result = $this->user->login($username, $password);

    if($result)
    {
      
      $sess_array = array();
      foreach($result as $row)
      {
        if($row->hak_akses == 'walimurid'){
          $walimurid = $this->user->getData('*','siswa',array('no_telp'=>$username))->result_array();
          $sess_array = array(
            'username' => $row->username,
            'hak_akses' => $row->hak_akses,
            'nis' => $walimurid[0]['nis']
          );
        }else{
          $sess_array = array(
            'username' => $row->username,
            'hak_akses' => $row->hak_akses
          );
        }
       
        $this->session->set_userdata($sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Usename atau Password Salah');
      return false;
    }
  }
  
  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('login', 'refresh');
  }


}
 ?>
