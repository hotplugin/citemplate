
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/normalize.css" rel="stylesheet" type="text/css" />
        <title><?php echo $title ?> - Test App</title>
    </head>

    <body>
        <div id="wrapper">

            <header>
                <div id="logo">
                    <?php echo anchor('', 'logo') ?>
                </div>
                <div id="usermeta">
                    <?php
                    $this->load->library('session');
                    if ($this->session->userdata('userid')) {
                        echo 'Welcome ' . $this->session->userdata('username');
                        echo anchor('login/logout', ' Logoout!');
                    } else {
                        echo anchor('register', 'Signup!');
                        echo anchor('login', '  Login!');
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </header>
            <div class="mainmenu">
                <ul>
                    <li><?php echo anchor('', 'HOME'); ?></li>
                    <li><?php echo anchor('aboutus', 'ABOUT US'); ?></li>
                    <li><?php echo anchor('aboutus', 'CONTACT US'); ?></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div id="contentwrap">


