<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Permission_api extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('&#x26A1;', '<br>');
       
    }
    public function register_permissions(){

        $result['success'] = FALSE;
        $result['msg'] = "Error saving data";
        $this->form_validation->set_rules('reg_key', 'API Key', 'trim|required');
        $this->form_validation->set_rules('mob_no', 'Mobile Number', 'trim|required|is_unique[public_register_tbl.mob_no]|isMob');
        $this->form_validation->set_rules('aadhar_no', 'Aadhar','trim|required|integer|is_unique[public_register_tbl.aadhar_no]|min_length[12]|max_length[12]|is_aadhar');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_space');
        $this->form_validation->set_rules('purpose_of_journey', 'Purpose of Journey', 'trim|required|alpha_space'); 
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[0,1]');
        if ($this->form_validation->run()) {
            $reg_key = $this->input->post('reg_key');
            if($reg_key == "d441641ceeb90bf8e0d46aedfe0d16ed"){
                $this->load->model('PermissionModel', 'PRM');
                $this->PRM->mob_no = $this->input->post('mob_no');
                $this->PRM->aadhar_no = $this->input->post('aadhar_no');
                $this->PRM->name = $this->input->post('name');
                $this->PRM->purpose_of_journey = $this->input->post('purpose_of_journey');
                $this->PRM->status = $this->input->post('status');

                $token_key = $this->PRM->register_permissions();
                if ($token_key) {
                    $result['success'] = TRUE;
                    $result['status']=200;
                    $result['regToken']= base64_encode($token_key);
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