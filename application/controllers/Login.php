<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
            
    }
    
    public function index() {
        $this->form_validation->set_rules('nmlogin', 'nmlogin', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == TRUE) {
            $username=$this->input->post('nmlogin');
            $password=$this->input->post('password');
            $this->load->model('moduser');
            $this->load->model('modref');
            $result=$this->moduser->login($username, $password);
            if ($result) {
                $this->session->set_userdata('usrmsk', 'TRUE');
                $this->session->set_userdata('iduser', $result->iduser);
                $this->session->set_userdata('nmlogin', $result->nmlogin);
                $this->session->set_userdata('nmasli', $result->nmasli);
                $this->session->set_userdata('passupd', $result->passupd);
                $subunit = $this->modref->getsubunit($result->idsubunit);
                if ($subunit) {
                    foreach ($subunit as $row){
                    $this->session->set_userdata('nmunit', $row->nmunit);
                    $this->session->set_userdata('nmsubunit', $row->nmsubunit);
                    $this->session->set_userdata('idunit', $row->idunit);
                    $this->session->set_userdata('idsubunit', $row->idsubunit);
                    $this->session->set_flashdata('success', 'Selamat datang '.$result->nmasli);
                    }
                } else {
                    $this->session->set_flashdata('warning', 'Satker Tidak Ditemukan!!');
                }
                $this->db->update('tuser', array('lastlog'=>date('Y/m/d h:i:s')), array('nmlogin'=>$result->nmlogin));
                redirect('cmain');	
            } else {			
                $this->session->set_flashdata('error', 'Maaf ID-User atau password anda salah.');
            }
        }   
        $data['banner'] = FALSE;
        $data['page'] = 'Vlogin';
        $data['judul'] = 'Log-In';
        $data['content']= '';
        $data['content']['action'] = site_url('login');
        $this->load->view('main', $data);        
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}