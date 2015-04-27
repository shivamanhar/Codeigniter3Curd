<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => 'Email'
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<body class="login-page">
    <div class="login-box">
  <div class="login-box-body">
          <div class="form-group has-feedback">
              <?php echo form_input($email); ?>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <span style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
            
          </div>
        
<?php echo form_submit('send', 'Send','class = "btn btn-primary btn-block btn-flat"'); ?>
<?php echo form_close(); ?>
  </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->