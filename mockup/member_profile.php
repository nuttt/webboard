<?php include('header.php'); ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							<img src="img/avatar_test.jpg" class="img-circle">
						</div>
						<div class="col-xs-9">
							<?php 
							// Member can edit his own profile
							// Mod can't edit anyone's profile
							// Admin can edit everyone's profile
							 ?>
							<h4><a href="edit_profile.php">Nuttapon [Edit Profile]</a></h4>
							<p class="info">
								<a href="mailto:nuttt.p@gmail.com" class="name"><strong>nuttt.p@gmail.com</strong></a>
								<span class="date">Joined since 14 Dec 13, 15:35</span>
								<a href="edit_profile.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
								<!-- for admin only -->
								<a href="edit_profile.php" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
								<!-- for admin only -->
								<a href="admin/ban_user.php" class="tag orange"><span class="glyphicon glyphicon-remove"></span> Ban</a>
							</p>
						</div>
					</div><!--topic-->
					<div class="context">
						<table class="table">
							<tr>
								<th width="30%">Display Name</th>
								<td width="70%">Nuttapon</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><a href="mailto:nuttt.p@gmail.com">nuttt.p@gmail.com</a></td>
							</tr>
							<tr>
								<th>Name</th>
								<td>Nuttapon Pattanavijit</td>
							</tr>
							<tr>
								<th>Birthdate</th>
								<td>November 16th, 1992</td>
							</tr>
						</table>
					</div><!--context-->
				</div><!--thread-->
				<br>
				<div id="content-list">
					<div class="list">
						<div class="helper">
							<span class="right">
								<div class="btn-group">
									<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
										Sort by <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Sort by Date</a></li>
										<li><a href="#">Sort by Views</a></li>
										<li><a href="#">Sort by Votes</a></li>
									</ul>
								</div><!--btn-group-->
								<div class="btn-group">
									<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
										Tags <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Computer</a></li>
										<li><a href="#">Computer Engineering</a></li>
										<li><a href="#">Coding</a></li>
										<li><a href="#">Maths</a></li>
										<li><a href="#">Physics</a></li>
									</ul>
								</div><!--btn-group-->
							</span><!--text-right-->
							<span class="text-left">
								<a name="topics"></a>Topic posted by this member
							</span>
							<div class="clear"></div>
						</div><!--helper-->
						<hr>
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="content.php">Why do we use this specific syntax for defining functions?</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13</span>
									<a href="" class="tag">Maths</a>
									<a href="" class="tag">Physics</a>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="content.php" class="btn btn-primary btn-lg comment">
									<span>3 replies</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="">Why do we create functions as variables?</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13</span>
									<a href="" class="tag">Computer</a>
									<a href="" class="tag">JavaScript</a>
									<a href="" class="tag">Coding</a>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="" class="btn btn-primary btn-lg comment">
									<span>5 replies</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="">You have &lt; 7 hours left to extend your streak??what does it means??</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13</span>
									<a href="" class="tag">Computer Engineering</a>
									<a href="" class="tag">Maths</a>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="" class="btn btn-warning btn-lg comment">
									<span>no reply</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="">I wrote this code. It worked great. But the website says that it is incorrect.</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13</span>
									<a href="" class="tag">Maths</a>
									<a href="" class="tag">Physics</a>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="" class="btn btn-warning btn-lg comment">
									<span>no reply</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="">Why do we create functions as variables?</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13</span>
									<a href="" class="tag">Computer</a>
									<a href="" class="tag">JavaScript</a>
									<a href="" class="tag">Coding</a>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="" class="btn btn-primary btn-lg comment">
									<span>5 replies</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="">Could someone help me on exercise 5?</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13</span>
									<a href="" class="tag">Computer Engineering</a>
									<a href="" class="tag">Maths</a>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="" class="btn btn-primary btn-lg comment">
									<span>1 reply</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="text-center">
							<ul class="pagination">
								<li class="disabled"><a href="#">«</a></li>
								<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">»</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<a href="edit_profile.php" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-pencil"></span>
					Edit Profile
				</a>
				<a href="mailto:nuttt.p@gmail.com" type="button" class="create-btn btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-envelope"></span>
					E-mail Nuttapon
				</a>
				<h3>Latest Replies</h3>
				<div class="list-group replies">
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Help with Fix me! code.</h4>
						<p class="list-group-item-text">The problem you have is that your function is inside a block-comment...</p>
					</a>
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Answer for 1.4 Fix Me</h4>
						<p class="list-group-item-text">What do you understand so far? Can we look at your work from the previous...</p>
					</a>
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">What name do i enter????</h4>
						<p class="list-group-item-text">This code works but it and I can type in the "prompt" box on the screen...</p>
					</a>
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Answer for 1.4 Fix Me</h4>
						<p class="list-group-item-text">The string method might be your issue: firstLetter . toUpperCase() cannot...</p>
					</a>
				</div>
				<h3>Top Tags Used</h3>
				<div class="list-group">
					<a href="" class="list-group-item"><span class="badge">114</span> Computer</a>
					<a href="" class="list-group-item"><span class="badge">20</span> Coding</a>
					<a href="" class="list-group-item"><span class="badge">6</span> Programming</a>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php include('footer.php'); ?>