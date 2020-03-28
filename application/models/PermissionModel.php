<?php 
   class PermissionModel extends CI_Model {

    var $mob_no;
    var $aadhar_no;
    var $name;
    var $status;
    var $purpose_of_journey;
    var $table = "permission_tbl";

      function __construct() { 
         parent::__construct(); 
         
      } 

      public function register_permissions() {
        $data = array(
            'mob_no' => $this->mob_no,
            'aadhar_no' => $this->aadhar_no,
            'name' => $this->name,
            'purpose_of_journey' => $this->purpose_of_journey,
            'status' => $this->status,
           
        );
        if ($this->db->insert($this->table, $data)) { 
            return $this->db->insert_id();
       }
       else
       {
           return false; 
       }
     }

    } 
    
?> 