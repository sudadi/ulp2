<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmain extends CI_Controller {

    public function index()
    {
        $data['banner'] = TRUE;
        $data['page'] = 'Vinfo';
        $data['judul'] = 'Informasi';
        $data['content']= '';
        $this->load->view('main', $data);
                
    }
    
    public function login() {
        $data['banner'] = TRUE;
        $data['page'] = 'Vlogin';
        $data['judul'] = 'Log-In';
        $data['content']= '';
        $data['content']['action'] = site_url('main/login');
        $this->load->view('main', $data);        
    }
}
