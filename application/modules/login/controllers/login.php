<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use login\models\User;

class Login extends MX_Controller {

    public function index() {
         $this->load->helper('url');
          $data['view_page'] ='login';
           $this->load->view('template/master', $data);
    }

}

?>
