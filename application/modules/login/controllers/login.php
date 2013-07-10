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
//         $this->load->helper('url');
//         $data['title'] = 'login';
//          $data['view_page'] ='login';
//           $this->load->view('template/master', $data);
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'login';
            $data['view_page'] = 'login';
            $this->load->view('template/master', $data);
        } else {
            $this->load->model('login/login_model', 'user');
            //check username taken n Password
            $data['userrow'] = $this->user->checkUsernameNPassword($this->input->post('username'), $this->input->post('password'));
            if (!empty($data['userrow'])) {
                $this->load->library('session');
                $newdata = array(
                    'userid' => $data['userrow']['id'],
                    'username' => $data['userrow']['username'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);
                $data['title'] = 'Welcome';
                $data['view_page'] = 'template/index';
                $this->load->view('template/master', $data);
            } else {

                $data['title'] = 'Invalid login';
                $data['view_page'] = 'login';
                $this->load->view('template/master', $data);
            }
//            $this->load->library('doctrine');
//            $usernew = new register\models\User;
//            $usernew->setName($this->input->post('name'));
//            $usernew->setAddress($this->input->post('address'));
//            $usernew->setUsername($this->input->post('username'));
//            $usernew->setPassword($this->input->post('password'));
//            $this->doctrine->em->persist($usernew);
//            $this->doctrine->em->flush();
//            if ($usernew->id()) {
//                $data['view_page'] = 'formsuccess';
//                $data['title'] = 'Registerd Success!';
//                $this->load->view('template/master', $data);
//            } else {
//                echo "error in data entry";
//            }
        }
    }

    public function logout() {
         $this->load->helper('url');
        $this->load->library('session');
        $this->session->unset_userdata('userid');
        $this->session->sess_destroy();
        $data['title'] = 'Loggout';
        $data['view_page'] = 'login';
        $this->load->view('template/master', $data);
    }

}

?>
