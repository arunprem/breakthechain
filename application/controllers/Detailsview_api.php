<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Detailsview_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function listPublicRegisteredJourney() {
        //$this->output->enable_profiler(TRUE);
        $result['success'] = FALSE;
        $result['msg'] = "Error saving data";
        $this->form_validation->set_rules('reg_key', 'API Key', 'trim|required');
        $this->form_validation->set_rules('reg_token', 'Registration token', 'trim|required');
        $this->form_validation->set_rules('journey_token', 'Journey token', 'trim|required');
        if ($this->form_validation->run()) {
            $reg_key = $this->input->post('reg_key');
            if ($reg_key == "d441641ceeb90bf8e0d46aedfe0d16ed") {
                $this->load->model('Publicregistrationdetails_model', 'PRD');
                $this->PRD->reg_id = base64_decode($this->input->post('reg_token'));
                $this->PRD->journy_id = base64_decode($this->input->post('journey_token'));

                $result = $this->PRD->getPersonalJouneyDetails();
             
            } else {
                $result['success'] = TRUE;
                $result['msg'] = "not a valid key";
            }
        } else {
            $result['msg'] = validation_errors();
        }
        $this->output->set_output(json_encode($result));
    }

}
