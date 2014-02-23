<?php echo $header; ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
					<?php if(validation_errors()): ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php endif; ?>
				<div class="thread">
					<div class="topic">
						<h4>Create an account</h4>
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
									<!-- <img src="img/avatar_test.jpg" class="img-circle"> -->
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

									<button type="submit" class="btn btn-primary">Sign up</button>
								</div>
							</div>
						</form>
					</div><!--context-->
				</div><!--thread-->
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<h3>Agreement</h3>
				<div class="replies">
					<p>You agree, through your use of this forum, that you will not post any material which is false, defamatory, inaccurate, abusive, vulgar, hateful, harassing, obscene, profane, sexually oriented, threatening, invasive of a person's privacy, adult material, or otherwise in violation of any International or United States Federal law. You also agree not to post any copyrighted material unless you own the copyright or you have written consent from the owner of the copyrighted material. Spam, flooding, advertisements, chain letters, pyramid schemes, and solicitations are also forbidden on this forum.</p>
					<p>You remain solely responsible for the content of your posted messages. Furthermore, you agree to indemnify and hold harmless the owners of this forum, any related websites to this forum, its staff, and its subsidiaries. The owners of this forum also reserve the right to reveal your identity (or any other related information collected on this service) in the event of a formal complaint or legal action arising from any situation caused by your use of this forum.</p>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php echo $footer; ?>
