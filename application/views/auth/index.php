<?php echo $header; ?>
		<div class="row">
			<div class="col-md-4 col-md-offset-4" id="signin">
				<?php echo form_open('auth?return='.$return, array('class' => 'form-signin')); ?>
				<h2 class="form-signin-heading">Please sign in</h2>
					<?php if(validation_errors()): ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<?php 
						echo form_label('Email address', 'email');
						echo form_input('email', set_value('email'), 'class="form-control" placeholder="Enter email"');
						?>
					</div>
					<div class="form-group">
						<?php 
						echo form_label('Password', 'password');
						echo form_password('password', '', 'class="form-control" placeholder="Password"');
						?>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-ok"></span> Sign in</button>
				<?php echo form_close(); ?>
			</div>
		</div><!--row-->
<?php echo $footer; ?>