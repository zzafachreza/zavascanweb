<?php

class Register extends CI_Controller{

    function __construct(){
        parent::__construct();
          $this->load->model('Register_model');
      
    }

    function index(){
        
         $sql = "SELECT * FROM data_company limit 1";
         $dataCom = $this->db->query($sql);
         $data['company'] = $dataCom->result_array();

        $data['title'] = 'FM | Register';
        $this->load->view('header',$data);
        $this->load->view('register');
        
     
    }

     function add(){
        
        // print_r($_POST);
     	$nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $hasil = $this->Register_model->insert($username,SHA1($password),$nama_lengkap);
       	
       





    }

}