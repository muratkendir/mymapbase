<div id="login_form">
<h1> Please Login  
<a href="http://www.mymapbase.com/cms/index.php/en/join-to-mymapbase" target="_blank">
<span class="hint--rounded" data-hint="If you want to register, click here." style="color:#FE5928;vertical-align:super;font-size:12px;">?</span>
</a>
</h1>
	<?php
	
	echo form_open('login/validate_credentials');
	
	echo form_label('Username', 'username');
	echo form_input('username');
	
	echo form_label('Password', 'password');
	echo form_password('password');
	
	echo form_submit('submit', 'Login', 'id="submit"');
	
	
	echo anchor('login/signup', 'Create Account');
	
	echo '<div style="text-align:right;font-size:12px;"></br>Username: demo</br>Password: 123456</div>';
	?>
</div>
