<?php 
// Member can edit his own post
// Mod can edit a post of his tag
// Admin can edit everyone's post
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
								<h4>Editing Reply: <a href="content.php">Why do we use this specific syntax for defining functions?</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13, 15:35</span>
									<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
								</p>
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
								<div class="form-group">
									<label for="content">Content <span class="red">*</span></label>
									<textarea name="content" class="form-control" id="" cols="30" rows="10">WYSIWYG</textarea>
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