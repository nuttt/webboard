<?php include('header.php'); ?>
	<h3><span class="glyphicon glyphicon-tags"></span> &nbsp;Edit Tag: Computer</h3>
		<div class="context">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label for="tag_name" class="col-sm-2 control-label">Tag Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="tag_name" placeholder="Name" value="Computer">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</form>
		</div><!--context-->
<?php include('footer.php'); ?>