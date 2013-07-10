<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
          $this->load->database();
    }

    public function checkUsernameNPassword($username,$password) {
        $query = $this->db->get_where('user',array('username'=>$username,'password'=>$password));
        return $query->row_array();
    }

}

?>
