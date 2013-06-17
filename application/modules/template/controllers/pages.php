<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pages extends MX_Controller {

   public function index($page = 'index') {
       
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->helper('url');
         $data['view_page'] = $page;
         $this->load->view('template/master', $data);
    }

}