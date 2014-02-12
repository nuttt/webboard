<?php 
// Member, mod and admin can create a new topic
 ?>
<?php include('header.php'); ?>
		<div class="row">
			<form role="form">
			<div class="col-md-9" id="content-view">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
							</div>
							<div class="col-xs-11">
								<h4>Create a new topic</h4>
								<p class="info">
									<a href="member_profile.php" class="name">by <strong>Nuttapon P</strong></a>
								</p>
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
								<div class="form-group">
									<label for="title">Title <span class="red">*</span></label>
									<input type="text" class="form-control" id="title" placeholder="Title">
								</div>
								<div class="form-group">
									<label for="content">Content <span class="red">*</span></label>
									<textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
								</div>
								<div class="form-group">
									<label for="tag">Tags <span class="red">*</span></label>
									<input type="text" class="form-control" id="tag" placeholder="Tag1, Tag2, Tag3">
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
						</div><!--context-->
					</div><!--thread-->
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<button type="submit" class="create-btn btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-floppy-disk"></span>
					Update
				</button>
				<a href="content.php" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-arrow-left"></span>
					Back
				</a>
				<h3>Guidelines</h3>
				<div class="replies">
					<p>Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here  Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here   </p>
				</div>
			</div><!--sidebar-->
			</form>
		</div><!--row-->
<?php include('footer.php'); ?>