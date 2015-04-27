<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
                'class' => 'form-control',
                'placeholder' => 'Username'
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => 'Email'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => 'Password'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => 'Confirm Password'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
        'class' =>'form-control'
);
?>


  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
       <?php echo form_open($this->uri->uri_string()); ?>
          <div class="form-group has-feedback">
            <?php echo form_input($username); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
	    <span style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></span>
          </div>
          <div class="form-group has-feedback">
            <?php echo form_input($email); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
          </div>
          <div class="form-group has-feedback">
            <?php echo form_password($password); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span style="color: red;"><?php echo form_error($password['name']); ?></span>
          </div>
          <div class="form-group has-feedback">
           <?php echo form_password($confirm_password); ?>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <span style="color: red;"><?php echo form_error($confirm_password['name']); ?></span>
          </div>
        
       
        <?php if ($captcha_registration) { ?>
          <div class="form-group ">
                 <label>Enter the code exactly as it appears:</label>
		  	<?php echo $captcha_html; ?>
             </div>
             <div class="form-group">
		<?php echo form_label('Confirmation Code', $captcha['id']); ?>
		<?php echo form_input($captcha); ?>
		<span style="color: red;"><?php echo form_error($captcha['name']); ?></span>
	     </div>
	<?php } ?>
        
          <div class="row">
            <div class="col-xs-7 col-xs-offset-1">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <?php echo form_submit('register', 'Register','class="btn btn-primary btn-block btn-flat"'); ?>
              <?php echo form_close(); ?>
            </div><!-- /.col -->
          </div>
        </form>        
        <a href="<?php echo base_url('auth/login') ?>" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

<table>

    

	
</table>
