<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Moduser extends CI_Model {
     function __construct() {
         parent:: __construct();
    }

    function login($username, $password){
        $this->db->from('tuser');
        $this->db->where('nmlogin', $username);
        $this->db->where('password', sha1($password));
        $this->db->where('status', 1);
        $qry = $this->db->get();
        if ($qry->num_rows() == 1) return $qry->row(); 
    }
        
    function getakses ($iduser){
        $this->db->select('idmenu');
        $this->db->where('iduser', $iduser);
        $qry = $this->db->get('takses');
        if ($qry->num_rows() > 0) {
             foreach ($qry->result_array() as $row){
                    $aksesmenu[] = $row['idmenu'];
                }
            }
            return $aksesmenu;
    }    
    
    //function getmenu($sub) {
    //    $this->db->where('sub', $sub);
    //    return $this->db->get('refmenu')->result_array();
    //}
    
    function getmenu ($iduser, $sub){
        $this->db->select('refmenu.idmenu, menu, link, icon, sub');
        $idsubunit = $this->session->userdata('idsubunit');
        if ($idsubunit != 1) {
            $this->db->join('takses', 'refmenu.idmenu=takses.idmenu', 'left');
            $this->db->where('iduser', $iduser);
            $this->db->where('takses.active', 1);
        }
        $this->db->where('sub', $sub);
        $this->db->where('refmenu.active', 1);
        $qry = $this->db->get('refmenu');
        if ($qry->num_rows() > 0) return $qry->result_array();
    }
    
    function getuser() {
        $this->db->join('refunitkerja', 'tuser.idunit = refunitkerja.id_unit_kerja');
        return $this->db->get('tuser')->result_array();
    }
}




