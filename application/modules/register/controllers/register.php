<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use register\models\User;

class Register extends MX_Controller {

    public function index() {
       $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');
        if ($this->form_validation->run() === FALSE) {
            $data['view_page'] = 'register';
            $data['title'] = 'register';
//                        $this->form_validation->set_message('required', 'Error Message');
            $this->load->view('template/master', $data);
        } else {
            $this->load->model('register/user_model', 'user');
            $data['userrow'] = $this->user->checkUsername($this->input->post('username'));
            if (!empty($data['userrow'])) {
                echo 'user existss';
                $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
                $this->form_validation->set_message('abc', 'Error Message');
                $data['view_page'] = 'register';
                $data['title'] = 'register';
                $this->load->view('template/master', $data);
                return;
            }
            $this->load->library('doctrine');
            $usernew = new register\models\User;
            $usernew->setName($this->input->post('name'));
            $usernew->setAddress($this->input->post('address'));
            $usernew->setUsername($this->input->post('username'));
            $usernew->setPassword($this->input->post('password'));
            $this->doctrine->em->persist($usernew);
            $this->doctrine->em->flush();
            if ($usernew->id()) {
                $data['view_page'] = 'formsuccess';
                $data['title'] = 'Registerd Success!';
                $this->load->view('template/master', $data);
            } else {
                echo "error in data entry";
            }
        }
    }

    public function install() {
        // Load Doctrine library
        $this->load->library('doctrine');

        $this->doctrine->tool->createSchema(array(
            $this->doctrine->em->getClassMetadata('register\models\User')));
    }

}

?>
