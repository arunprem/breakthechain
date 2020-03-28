<?php 
   class VerifyLogModel extends CI_Model {

    var $f_pr_id;
    var $f_j_id;
    var $f_permission_id;
    var $verify_flag;
    var $latitude;
    var $longitude;
    var $status;
    var $verified_by;

    var $table ="verify_log_tbl";

      function __construct() { 
         parent::__construct(); 
         
      } 

      public function log_verify() { 

        $data = array(
            'f_pr_id' => $this->f_pr_id,
            'f_j_id' => $this->f_j_id,
            'f_permission_id' => $this->f_permission_id,
            'verify_flag' => $this->verify_flag,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'status' => $this->status,
            'verified_by' => $this->verified_by,
          
        );

        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();;
        } else {
            return false;
        }       
     }

     public function viewVerifyLog()
     {
        

        // SELECT * FROM verify_log_tbl as vl join journey_tbl as j on vl.f_j_id=j.j_id join public_register_tbl as pbr on vl.f_pr_id=pbr.pr_id join permission_tbl as prs on vl.f_permission_id=prs.permission_id join police_register_tbl as pl on vl.verified_by=pl.police_id  

        $response = array();
        $this->db->select('j.vehicle_no,j.address,j.place_to,j.return_time,j.purpose_of_journey,pbr.mob_no,pbr.aadhar_no,pbr.name,vl.latitude,vl.longitude,pl.pen_no');
        $this->db->from('verify_log_tbl as vl');
        $this->db->join('journey_tbl as j', 'vl.f_j_id=j.j_id','left');
        $this->db->join('public_register_tbl as pbr', 'vl.f_pr_id=pbr.pr_id','left');
        $this->db->join('permission_tbl as prs', 'vl.f_permission_id=prs.permission_id','left');
        $this->db->join('police_register_tbl as pl', 'vl.verified_by=pl.police_id','left');

        $query = $this->db->get();
          $response = $query->result_array();
          return $response;
       
        }
    } 
    
?> 