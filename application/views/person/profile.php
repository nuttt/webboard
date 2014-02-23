<?php echo $header; ?>
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
							<h4><a href="edit_profile.php"><?php echo $person->DISPLAY_NAME; ?>[Edit Profile]</a></h4>
							<p class="info">
								<a href="mailto:<?php echo $person->EMAIL; ?>" class="name"><strong><?php echo $person->EMAIL ?></strong></a>
								<span class="date">Joined since <?php echo $person->JOINED_DATE; ?></span>
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
								<td width="70%"><?php echo $person->DISPLAY_NAME; ?></td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><a href="mailto:<?php echo $person->EMAIL; ?>"><?php echo $person->EMAIL; ?></a></td>
							</tr>
							<tr>
								<th>Birthdate</th>
								<td><?php echo $person->BIRTHDATE; ?></td>
							</tr>
							<tr>
								<th width="30%">Facebook</th>
								<td width="70%"><a href="http://facebook.com/<?php echo $person->FACEBOOK;?>"><?php echo $person->FACEBOOK; ?></a><td>
							</tr>
							<tr>
								<th width="30%">Twitter</th>
								<td width="70%"><a href="http://twitter.com/<?php echo $person->TWITTER;?>"><?php echo $person->TWITTER; ?></a><td>
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
										<li><a href="<?=base_url()?>person/profile/<?=$person->PERSON_ID?>?sortby=date&tag_filter=<?php echo $tag_filter;?>">Sort by Date</a></li>
										<li><a href="<?=base_url()?>person/profile/<?=$person->PERSON_ID?>?sortby=views&tag_filter=<?php echo $tag_filter; ?>">Sort by Views</a></li>
										<li><a href="<?=base_url()?>person/profile/<?=$person->PERSON_ID?>?sortby=votes&tag_filter=<?php echo $tag_filter;?>">Sort by Votes</a></li>
									</ul>
								</div><!--btn-group-->
								<div class="btn-group">
									<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
										Tags <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<?php foreach ($tags as $tag): ?>
											<li><a href="<?=base_url()?>person/profile/<?=$person->PERSON_ID?>?sortby=<?php echo $sort_by;?>&tag_filter=<?php echo $tag->NAME;?>"><?php echo $tag->NAME;?></a></li>
										<?php endforeach ?>
									</ul>
								</div><!--btn-group-->
							</span><!--text-right-->
							<span class="text-left">
								<a name="topics"></a>Topic posted by this member
							</span>
							<div class="clear"></div>
						</div><!--helper-->
						<?php if (count($topics)==0): ?>
							<hr>
							<p>No Post</p>
						<?php endif ?>
							
						<?php foreach ($topics as $topic): ?>
						<hr>
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="<?=base_url()?>post/view/<?=$topic->POST_ID;?>"><?php echo $topic->TITLE; ?></a></h4>
								<p class="info">
									<a href="<?=base_url()?>person/profile/<?=$topic->PERSON_ID;?>" class="name"><strong><?php echo $topic->DISPLAY_NAME; ?></strong></a>
									<span class="date"><?php echo $topic->TIME; ?></span>
									<?php foreach ($topic->TAGS as $tag): ?>
									<a href="<?=base_url()?>post/tag/<?=$tag->TAG_ID;?>" class="tag"><?php echo $tag->NAME; ?></a>
									<?php endforeach; ?>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="<?=base_url()?>post/view/<?=$topic->POST_ID;?>" class="btn btn-primary btn-lg comment">
									<span><?php echo $topic->COUNT_REPLY; ?> replies</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr>		
						<?php endforeach ?>
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
				<?php if (count($top_tags)>0): ?>
					<h3>Top Tags Used</h3>
				<?php endif ?>
				
				<div class="list-group">
					<?php foreach ($top_tags as $top_tag): ?>
						<a href="<?=base_url()?>post/tag/<?=$top_tag->TAG_ID?>" class="list-group-item"><span class="badge"><?php echo $top_tag->NUM ?></span><?php echo $top_tag->NAME ?></a>
					<?php endforeach ?>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php echo $footer; ?>