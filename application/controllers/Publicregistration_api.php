<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Publicregistration_api extends CI_Controller{
    public function __construct() {
        
      
        parent::__construct();
        
         $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('&#x26A1;', '<br>');
    }
    public function register(){
         $result['success'] = FALSE;
        $result['msg'] = "Error saving data";
        $this->form_validation->set_rules('reg_key', 'API Key', 'trim|required');
        $this->form_validation->set_rules('mob_no', 'Mobile Number', 'trim|required|is_unique[public_register_tbl.mob_no]|isMob');
        $this->form_validation->set_rules('aadhar_no', 'Aadhar', 'trim|required|is_aadhar|is_unique[public_register_tbl.aadhar_no]');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_space');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[0,1]');
        if ($this->form_validation->run()) {
            $reg_key = $this->input->post('reg_key');
            if($reg_key == "d441641ceeb90bf8e0d46aedfe0d16ed"){
            $this->load->model('Publicregistration_model', 'PRM');
            $this->PRM->mob_no = $this->input->post('mob_no');
            $this->PRM->aadhar_no = $this->input->post('aadhar_no');
            $this->PRM->name = $this->input->post('name');
            $this->PRM->status = $this->input->post('status');
            if ($this->PRM->addRegPublic()) {
                $result['success'] = TRUE;
                $result['status']=200;
                $result['msg'] = "Successfully Registerd";
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

