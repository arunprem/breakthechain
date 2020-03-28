<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Publicregistrationdetails_model extends CI_Model {

    var $reg_id;
    var $journy_id;

    public function __construct() {
        parent::__construct();
    }

    public function getPersonalJouneyDetails() {
        $this->db->select('pr.pr_id,jr.j_id,pr.mob_no,pr.aadhar_no,pr.name,jr.address,pt.purpose,jr.purpose_of_journey,vt.vehicle_type,jr.return_time');
        $this->db->join('journey_tbl jr', 'jr.f_pr_id = pr.pr_id', 'left');
        $this->db->join('purpose_tbl pt', 'pt.purpose_id = jr.f_purpose_id', 'left');
        $this->db->join('vehicletype_tbl vt', 'vt.vtype_id = jr.f_vtype_id', 'left');
        $this->db->from('public_register_tbl pr');
        $this->db->where('pr.pr_id', $this->reg_id);
        $this->db->where('jr.j_id', $this->journy_id);
        $rs = $this->db->get();
        return $rs->result();
    }

}
