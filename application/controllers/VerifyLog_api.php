<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class VerifyLog_api extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('VerifyLogModel');
    }


    public function log_verify(){
        echo "verification of log";
        $pr_id = $this->input->post('pr_id');
        $j_id = $this->input->post('j_id');
        $permission_id = $this->input->post('permission_id');
        $verify_flag = $this->input->post('verify_flag');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $status = $this->input->post('status');
        $verified_by = $this->input->post('verified_by');
        $flag=0;
        // $pr_id = 1;
        // $j_id = 1;
        // $permission_id = 1;
        // $verify_flag = 1;
        // $latitude = "ase";
        // $longitude = "wer";
        // $status = 1;
        // $verified_by = 1;
        if($pr_id == null || $j_id == null || $permission_id == null || $verify_flag == null || $latitude == null || $longitude == null || $status == null || $verified_by == null){
            $flag++;
        }
        // else{
        //     $flag=0;
        // }
        if($flag>0)
        {
        $result['msg']="Value Cannot be null";
        $result['status']=0;
        }
        else{
        $data=array(
          'f_pr_id' => $pr_id,
          'f_j_id' => $j_id,
          'f_permission_id' => $permission_id,
          'verify_flag' => $verify_flag,
          'latitude' => $latitude,
          'longitude' => $longitude,
          'status' => $status,
          'verified_by' => $verified_by,
        );
        $result['value'] = $this->VerifyLogModel->log_verify($data); 
        if($result['value']==1)
        {
            $result['msg']="Insertion succesful";
        }
        else{
            $result['msg']="Insertion failed";
        }
           $result['status']=1;
        } 
        echo json_encode($result);

        
    }

    public function viewVerifyLog(){
        $result=$this->VerifyLogModel->viewVerifyLog();
        echo json_encode($result);
    }

}