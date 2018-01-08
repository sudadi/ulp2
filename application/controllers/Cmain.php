<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmain extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('moduser');    
    }
    
    public function index()
    {
        $data['banner'] = TRUE;
        $data['page'] = 'Vinfo';
        $data['judul'] = 'Informasi';
        $data['content']= '';
        $this->load->view('main', $data);
                
    }
    
   
}
