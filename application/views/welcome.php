<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
Hi, <strong><?php echo $username; ?></strong>! You are logged in now. <?php echo anchor('/auth/logout/', 'Logout'); ?>

<br/>
 <?php echo anchor('user', 'UserList'); ?>