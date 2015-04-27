<?php
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
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

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
        'class' => 'form-control',
        'placeholder' => 'Password'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
        'class' =>'form-control'
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.html"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
          <div class="form-group has-feedback">
              <?php echo form_input($login); ?>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
            
          </div>
          <div class="form-group has-feedback">
            <?php echo form_password($password); ?>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
             <span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
            
          </div>
              <?php if ($show_captcha) {
		?>
             <div class="form-group ">
                 <label>Enter the code exactly as it appears:</label>
		  	<?php echo $captcha_html; ?>
             </div>
             <div class="form-group">
		<?php echo form_label('Confirmation Code', $captcha['id']); ?>
		<?php echo form_input($captcha); ?>
		<span style="color: red;"><?php echo form_error($captcha['name']); ?></span>
	     </div>
	<?php }
	 ?>
         
            <div class="clearfix"></div>
            
          <div class="row">
            <div class="col-xs-7 col-xs-offset-1 ">    
              <div class="checkbox icheck">
                <label>
                  <?php echo form_checkbox($remember); ?> Remember me
                </label>
              </div>                        
            </div><!-- /.col -->
            
            <div class="col-xs-4">
             
              <?php echo form_submit('submit', 'Let me in','class = "btn btn-primary btn-block btn"'); ?>
              <?php echo form_close(); ?>
            </div><!-- /.col -->
          </div>
        </form>

      <?php echo anchor('/auth/forgot_password/', 'I forgot my password'); ?><br/>
      <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register a new membership'); ?>

      

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->



	


