<?php 
// Admin is the only one that can ban a member
 ?>
<?php include('header.php'); ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							<img src="../img/avatar_test.jpg" class="img-circle">
						</div>
						<div class="col-xs-9">
							<h4><a href="../member_profile.php">Nuttapon</a></h4>
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
								<label for="inputEmail3" class="col-sm-4 control-label">Begin date</label>
								<div class="col-sm-8">
									<!-- auto set today's date/time -->
									<input type="date" class="form-control" id="begin">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">End date</label>
								<div class="col-sm-8">
									<!-- auto set next seven day's date/time -->
									<input type="date" class="form-control" id="end">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary">Ban User</button>
								</div>
							</div>
						</form>
					</div><!--context-->
				</div><!--thread-->
				<!-- for admin only -->
				<h3>Ban History</h3>
				<div class="box">
					
							<table class="table">
								<tr>
									<th width="10%">#</th>
									<th width="45%">Begin date</th>
									<th width="45%">End date</td>
								</tr>
								<tr>
									<td>1</td>
									<td>14 Dec 13, 15:35</td>
									<td>18 Dec 13, 15:35</td>
								</tr>
								<tr>
									<td>2</td>
									<td>14 Dec 13, 15:35</td>
									<td>18 Dec 13, 15:35</td>
								</tr>
								<tr class="success">
									<td>3</td>
									<td>14 Dec 13, 15:35</td>
									<td>18 Dec 13, 15:35</td>
								</tr>
							</table>
				</div>
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<a href="" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-remove"></span>
					Ban this user
				</a>
				<a href="../member_profile.php" type="button" class="create-btn btn btn-success btn-lg btn-block">
					<span class="glyphicon glyphicon-eye-open"></span>
					View Profile
				</a>
				<h3>Guidelines</h3>
				<div class="replies">
					<p>Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here  Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here   </p>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php include('footer.php'); ?>