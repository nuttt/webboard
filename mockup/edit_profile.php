<?php 
// Member can edit his own profile
// Mod can't edit anyone's profile
// Admin can edit everyone's profile
 ?>
<?php include('header.php'); ?>
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
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Name</label>
								<div class="col-sm-8">
									<input type="name" class="form-control" id="inputEmail3" placeholder="Name" value="Nuttapon Pattanavijit">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Email</label>
								<div class="col-sm-8">
									<input type="email" class="form-control" id="inputEmail3" placeholder="Email" value="nuttt.p@gmail.com">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Birthdate</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="inputEmail3" placeholder="1992-11-01" value="1992-11-01">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Profile Picture</label>
								<div class="col-sm-8">
									<input type="file">
									<br>
									<strong>Current Image:</strong>
									<img src="img/avatar_test.jpg" class="img-circle">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">New Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="inputEmail3" placeholder="123456">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Confirm new password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="inputEmail3" placeholder="123456">
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
<?php include('footer.php'); ?>