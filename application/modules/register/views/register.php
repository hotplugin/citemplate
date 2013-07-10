<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$this->load->helper('form');
echo validation_errors();
echo form_open('register');
echo form_input(array('name' => 'name', 'value' => set_value('name')));
echo form_input('address',set_value('address'));
echo form_input('username',set_value('username'));
echo form_password('password');
echo form_submit('submit', 'Register!');
echo form_close();
?>


