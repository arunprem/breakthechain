<?php


class Verifylog_api extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('VerifyLogModel');
    }


    public function log_verify(){
        $result['success'] = FALSE;
        $result['msg'] = "Error saving data";
        $this->form_validation->set_rules('reg_key', 'API Key', 'trim|required');
        $this->form_validation->set_rules('token_key', 'Token key', 'trim|required');
        $this->form_validation->set_rules('f_j_id', 'Journey', 'trim|required|integer');
        $this->form_validation->set_rules('f_permission_id', 'Permission', 'trim|required|integer');
        $this->form_validation->set_rules('verify_flag', 'Verify Flag', 'trim|required|integer');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|decimal');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|decimal');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[0,1]');
        $this->form_validation->set_rules('verified_by', 'Verified by', 'trim|required|integer');
        if ($this->form_validation->run()) {
            $reg_key = $this->input->post('reg_key');
            if($reg_key == "d441641ceeb90bf8e0d46aedfe0d16ed"){
            $this->load->model('VerifyLogModel', 'JRM');

            $this->JRM->f_pr_id = base64_decode($this->input->post('token_key'));
            $this->JRM->f_j_id = $this->input->post('f_j_id');
            $this->JRM->f_permission_id = $this->input->post('f_permission_id');
            $this->JRM->verify_flag = $this->input->post('verify_flag');
            $this->JRM->latitude = $this->input->post('latitude');
            $this->JRM->longitude = $this->input->post('longitude');
            $this->JRM->status = $this->input->post('status');
            $this->JRM->verified_by = $this->input->post('verified_by');

            $LogVerifyToken = $this->JRM->log_verify();
            if ($LogVerifyToken) {
                $result['success'] = TRUE;
                $result['status']=200;
                $result['LogVerifyToken']= base64_encode($LogVerifyToken);
                $result['msg'] = "Verify Log Added Successfully";
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

    public function viewVerifyLog(){
        $result=$this->VerifyLogModel->viewVerifyLog();
        echo json_encode($result);
    }

}