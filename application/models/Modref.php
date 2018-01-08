<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modref extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function getpegawai($idunit=null) {
        if ($idunit != null){
            $this->db->join('refsatker', 'refsatker.id_satuan_kerja=refpegawai.id_satuan_kerja');
            $this->db->where('refsatker.id_unit', $idunit);
            
        }
        $this->db->where('refpegawai.id_satuan_kerja !=', '99');
        return $this->db->get('refpegawai')->result_array();
    }
            
    function getunit($idunit=null) {
        if ($idunit != null){
            $this->db->where('idunit', $idunit);
        }
        return $this->db->get('refunit')->result();
    }
    
    function getsubunit($idsubunit=null) {
        if ($idsubunit != null){
            $this->db->join('refunit', 'refunit.idunit=refsubunit.idunit');
            $this->db->where('idsubunit', $idsubunit);
        }
        return $this->db->get('refsubunit')->result();
    }
    
    function getstatusplt($idstatus) {
        $this->db->where('idstatus', $idstatus);
        return $this->db->get('refstatus')->row();
    }
    
}
?>