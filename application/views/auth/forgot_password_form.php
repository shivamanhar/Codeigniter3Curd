<?php
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => $login_label
);

?>
<?php echo form_open($this->uri->uri_string()); ?>
<body class="login-page">
    <div class="login-box">
  <div class="login-box-body">
          <div class="form-group has-feedback">
		<?php echo form_input($login); ?>
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		<spna style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></spna>
 </div>
<?php echo form_submit('reset', 'Get a new password','class = "btn btn-primary btn-block btn-flat"'); ?>
<?php echo form_close(); ?>
  </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->