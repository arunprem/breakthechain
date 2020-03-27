<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Journey_model extends CI_Model {
    

    var $f_pr_id;
    var $f_purpose_id;
    var $vehicle_no;
    var $f_vtype_id;
    var $address;
    var $place_to;
    var $return_time;
    var $purpose_of_journey;
    var $status;
    var $table ="journey_tbl";

    public function __construct() {
        parent::__construct();
    }

    public function addJourney() {
          $data = array(
            'f_pr_id' => $this->f_pr_id,
            'f_purpose_id' => $this->f_purpose_id,
            'vehicle_no' => $this->vehicle_no,
            'f_vtype_id' => $this->f_vtype_id,
            'address' => $this->address,
            'place_to' => $this->place_to,
            'return_time' => $this->return_time,
            'purpose_of_journey' => $this->purpose_of_journey,
            'status' => $this->status,
           
        );
        //echo $sql;
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();;
        } else {
            return false;
        }
    }

}
