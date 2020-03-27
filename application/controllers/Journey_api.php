<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Journey_api extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
     public function registerJourney(){
         $result['success'] = FALSE;
        $result['msg'] = "Error saving data";
        $this->form_validation->set_rules('reg_key', 'API Key', 'trim|required');
        $this->form_validation->set_rules('token_key', 'Token key', 'trim|required');
        $this->form_validation->set_rules('f_purpose_id', 'TPurpose', 'trim|required|integer');
        $this->form_validation->set_rules('vehicle_no', 'Vehicle No', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('f_vtype_id', 'Vehicle Type', 'trim|required|integer');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('place_to', 'Place Visiting', 'trim|required|alpha_space');
        $this->form_validation->set_rules('return_time', 'Retrun Time', 'trim|required');
        $this->form_validation->set_rules('purpose_of_journey', 'Purpose of Journey', 'trim|required|alpha_space');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[0,1]');
        if ($this->form_validation->run()) {
            $reg_key = $this->input->post('reg_key');
            if($reg_key == "d441641ceeb90bf8e0d46aedfe0d16ed"){
            $this->load->model('Journey_model', 'JRM');
            $this->JRM->f_pr_id = base64_decode($this->input->post('token_key'));
            $this->JRM->f_purpose_id = $this->input->post('f_purpose_id');
            $this->JRM->vehicle_no = $this->input->post('vehicle_no');
            $this->JRM->f_vtype_id = $this->input->post('f_vtype_id');
            $this->JRM->address = $this->input->post('address');
            $this->JRM->place_to = $this->input->post('place_to');
            $this->JRM->return_time = $this->input->post('return_time');
            $this->JRM->purpose_of_journey = $this->input->post('purpose_of_journey');
            $this->JRM->status = $this->input->post('status');
            $JourneyToken = $this->JRM->addJourney();
            if ($JourneyToken) {
                $result['success'] = TRUE;
                $result['status']=200;
                $result['JourneyToken']= base64_encode($JourneyToken);
                $result['msg'] = "Journey Added Successfully";
            }
            }else{
                  $result['success'] = TRUE;
                   $result['msg'] = "not a valid key";
            }
        } else {
            $result['msg'] = validation_errors();
        }
        $this->output->set_output(json_encode($result));
    }
}