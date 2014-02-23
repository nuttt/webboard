<?php echo $header; ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							<img src="<?=base_url()?>uploads/<?php echo $person->AVATAR; ?>" class="img-circle">
						</div>
						<div class="col-xs-9">
							
							<h4><?php echo $person->DISPLAY_NAME; ?></h4>
							<p class="info">
								<a href="mailto:<?php echo $person->EMAIL; ?>" class="name"><strong><?php echo $person->EMAIL ?></strong></a>
								<span class="date">Joined since <?php echo $person->JOINED_DATE; ?></span>
								<?php if(is_person($person->PERSON_ID)||is_admin()): ?>
									<a href="<?=base_url()?>person/edit" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									<!-- for admin only -->
								<?php endif ?>
								<?php if(is_admin()): ?>
								<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
								<!-- for admin only -->
								<a href="admin/ban_user.php" class="tag orange"><span class="glyphicon glyphicon-remove"></span> Ban</a>
								<?php endif ?>
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
							
						<?php endforeach ?>
					</div>
				</div>
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<?php if(is_person($person->PERSON_ID)||is_admin()): ?>
				<a href="<?=base_url()?>person/edit" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-pencil"></span>
					Edit Profile
				</a>
				<?php endif; ?>
				<a href="mailto:nuttt.p@gmail.com" type="button" class="create-btn btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-envelope"></span>
					E-mail <?php echo $person->DISPLAY_NAME ?>
				</a>
				<h3>Latest Replies</h3>
				<div class="list-group replies">
					<?php foreach ($latest_replies as $latest_reply): ?>
						<a href="<?=base_url()?>post/view/<?=$latest_reply->POST_ID?>" class="list-group-item">
							<h4 class="list-group-item-heading"><?=$latest_reply->TITLE?></h4>
							<p class="list-group-item-text"><?php echo (strlen($latest_reply->CONTENT) > 100) ? mb_substr($latest_reply->CONTENT,0,100).'...' : $latest_reply->CONTENT; ?></p>
						</a>
					<?php endforeach ?>
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