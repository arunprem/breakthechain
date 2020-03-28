<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Policeverifyweb extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function searchPass(){
       $this->load->view("search/pass");
    }
    
    
}