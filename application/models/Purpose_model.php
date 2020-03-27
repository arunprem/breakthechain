<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Purpose_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllPurpose() {
        $this->db->select('purpose_id,purpose,status');
        $this->db->where('status','1');
        $rs = $this->db->get('purpose_tbl');
        return $rs->result();
    }

}
