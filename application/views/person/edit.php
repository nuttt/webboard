<?php 
// Member can edit his own profile
// Mod can't edit anyone's profile
// Admin can edit everyone's profile
 ?>
<?php echo $header; ?>
<?php 
	if($type == 'signup'){
		$profile->AVATAR = NULL;
		$profile->DISPLAY_NAME = NULL;
		$profile->EMAIL = NULL;
		$profile->TWITTER = NULL;
		$profile->BIRTH = NULL;
	}
 ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
					<?php if(validation_errors()): ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							
							<img src=<?php echo base_url('uploads/'.$profile->AVATAR);?> class="img-circle"> 
						</div>
						<div class="col-xs-9">
							<h4>

								<a href="member_profile.php"><?php echo $profile->DISPLAY_NAME ?></a></h4>
							<p class="info">
								<?php echo anchor('mailto:'.$profile->EMAIL, '<strong>'.$profile->EMAIL.'</strong>',array('class' => 'name') ) ?>
								<!-- <a href="mailto:nuttt.p@gmail.com" class="name"><strong>nuttt.p@gmail.com</strong></a> -->
								<span class="date">Joined since <?php echo $profile->JOINED ?></span>
							</p>
						</div>
					</div><!--topic-->
					<hr class="topic-line">
					<div class="context">
							<?php echo form_open_multipart('auth/signup', array('class' => 'form-horizontal', 'role' => 'form')) ?>
							<div class="form-group">
								<?php 
									echo form_label('Name', 'name', array('class' => 'col-sm-4 control-label'));
								 ?>
								<div class="col-sm-8">
									<?php  
										echo form_input('name', $profile->DISPLAY_NAME,'class="form-control" placeholder="Name"');
									?> 	
								</div>
							</div><!--form-group-->

							<div class="form-group">
								<?php echo form_label('Email', 'email', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input('email', $profile->EMAIL, 'class="form-control" placeholder="Email"'); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Facebook', 'facebook', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input('facebook', $profile->FACEBOOK, 'class="form-control" placeholder="Facebook"'); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Twitter', 'twitter', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input('twitter', $profile->TWITTER, 'class="form-control" placeholder="Twitter"'); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Birthdate', 'birthdate', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input(array('type' => 'date','name' => 'birthdate', 'class' => 'form-control', 'placeholder' => $profile->BIRTH, 'value' => $profile->BIRTH)); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Profile Picture', 'picture', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input(array('type' => 'file', 'name' => 'picture', 'value' => '')) ?>
									<!-- <input type="file"> -->	
									<br>
									<strong>Current Image:</strong>
									<img src=<?php echo base_url('uploads/'.$profile->AVATAR);?> class="img-circle"> 
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Password', 'password', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input(array('type' => 'password', 'name' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter your password')) ?>
									
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Confirm password', 'password2', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input(array('type' => 'password','name' => 'password2', 'class' => 'form-control', 'placeholder' => '')) ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">

									<button type="submit" class="btn btn-primary"><?php echo ($type=='signup')?'Signup!!!':'Edit' ?></button>
								</div>
							</div>
						</form>
					</div><!--context-->
				</div><!--thread-->
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<a href="member_profile.php" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-eye-open"></span>
					View Profile
				</a>
				<a href="member_profile.php" type="button" class="create-btn btn btn-success btn-lg btn-block">
					<span class="glyphicon glyphicon-pencil"></span>
					Update Profile
				</a>
				<h3>Guidelines</h3>
				<div class="replies">
					<p>Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here  Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here   </p>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php echo $footer; ?>
