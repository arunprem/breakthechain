<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Vehicle_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllVechileType(){
           $this->db->select('vtype_id,vehicle_type,status');
        $this->db->where('status','1');
        $rs = $this->db->get('vehicletype_tbl');
        return $rs->result();
    }
}