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
//	<input type="hidden" name="redirect_to" value="http://www.rajesharma.com/blog/wp-admin/">
echo form_submit('submit', 'Login');
echo form_close();
?>
