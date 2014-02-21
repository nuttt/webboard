<?php 
// Member can edit his own profile
// Mod can't edit anyone's profile
// Admin can edit everyone's profile
 ?>
<?php echo $header; ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							<img src="img/avatar_test.jpg" class="img-circle">
						</div>
						<div class="col-xs-9">
							<h4><a href="member_profile.php">Nuttapon</a></h4>
							<p class="info">
								<a href="mailto:nuttt.p@gmail.com" class="name"><strong>nuttt.p@gmail.com</strong></a>
								<span class="date">Joined since 14 Dec 13, 15:35</span>
							</p>
						</div>
					</div><!--topic-->
					<hr class="topic-line">
					<div class="context">
							<?php echo form_open('auth/signup', array('class' => 'form-horizontal', 'role' => 'form')) ?>
							<div class="form-group">
								<?php 
									echo form_label('Name', 'name', array('class' => 'col-sm-4 control-label'));
								 ?>
								<div class="col-sm-8">
									<?php  
										echo form_input('name', set_value('name'), 'class="form-control" placeholder="Name"');
									?> 	
								</div>
							</div><!--form-group-->

							<div class="form-group">
								<?php echo form_label('Email', 'email', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input('email', set_value('email'), 'class="form-control" placeholder="Email"'); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Facebook', 'facebook', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input('facebook', set_value('facebook'), 'class="form-control" placeholder="Facebook"'); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Twitter', 'twitter', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input('twitter', set_value('twitter'), 'class="form-control" placeholder="Twitter"'); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Birthdate', 'birthdate', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input(array('type' => 'date','name' => 'birthdate', 'class' => 'form-control', 'placeholder' => '1992-11-01', 'value' => '1992-11-01')); ?>
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<?php echo form_label('Profile Picture', 'picture', array('class' => 'col-sm-4 control-label')) ?>
								<div class="col-sm-8">
									<?php echo form_input(array('type' => 'file', 'name' => 'picture', 'value' => '')) ?>
									<!-- <input type="file"> -->	
									<br>
									<strong>Current Image:</strong>
									<img src="img/avatar_test.jpg" class="img-circle">
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

									<button type="submit" class="btn btn-primary">Update Profile</button>
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
