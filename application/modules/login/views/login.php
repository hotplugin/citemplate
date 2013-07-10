<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$this->load->helper('form');
echo validation_errors();
echo form_open('login');
echo form_input('username');
echo form_password('password');
echo form_submit('submit', 'Login');
echo form_close();
?>
