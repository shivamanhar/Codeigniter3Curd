<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|
*/
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = "";  //give your email address here
$config['smtp_pass'] = "";  //give your email password here


/* End of file email.php */
/* Location: ./application/config/email.php */