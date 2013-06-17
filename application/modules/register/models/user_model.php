<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_model extends CI_Model {

    public function __construct() {
        parent::__construct();
          $this->load->database();
    }

    public function checkUsername($username) {
        $query = $this->db->get_where('user',array('username'=>$username));
        return $query->row_array();
    }

}

?>
