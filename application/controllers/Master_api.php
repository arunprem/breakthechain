<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Master_api extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function listAllPurpose(){
         $this->load->model('purpose_model');
      
        $ag = $this->purpose_model->getAllPurpose();
        $this->output->set_output(json_encode($ag));
    }
    
    public function listAllVehicleType(){
         $this->load->model('vehicle_model');
      
        $ag = $this->vehicle_model->getAllVechileType();
        $this->output->set_output(json_encode($ag));
    }
}