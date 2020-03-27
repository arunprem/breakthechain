<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Publicregistration_model extends CI_Model{
    
    var $mob_no;
    var $aadhar_no;
    var $name;
    var $status;
    var $table = "public_register_tbl";
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function addRegPublic(){
        $data = array(
            'mob_no' => $this->mob_no,
            'aadhar_no' => $this->aadhar_no,
            'name' => $this->name,
            'status' => $this->status,
           
        );
        //echo $sql;
        if ($this->db->insert($this->table, $data)) {
            return true;
        } else {
            return false;
        }
    }
    
    
}