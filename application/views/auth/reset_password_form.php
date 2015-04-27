<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => 'New password'
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
        'class' => 'form-control',
        'placeholder' => 'Confirm new password'
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<body class="login-page">
    <div class="login-box">
  <div class="login-box-body">
          <div class="form-group has-feedback">
		
		<?php echo form_password($new_password); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></span>
          </div>
	 <div class="form-group has-feedback">
		<?php echo form_password($confirm_new_password); ?>
                 <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                <span style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></span>
	</div>
</table>
<?php echo form_submit('change', 'Change Password','class = "btn btn-primary btn-block btn-flat"'); ?>
<?php echo form_close(); ?>
  </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->