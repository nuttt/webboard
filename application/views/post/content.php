<?php echo $header; ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
							</div>
							<div class="col-xs-8">
								<h4><a href="<?=base_url()?>post/view/<?=$post->POST_ID?>"><?php echo $post->TITLE; ?></a></h4>
								<p class="info">
									<a href="<?=base_url()?>person/profile/<?=$post->PERSON_ID?>" class="name"><strong><?php echo $post->DISPLAY_NAME; ?></strong></a>
									<span class="date"><?php echo $post->TIME; ?></span>
									<?php 
										// var_dump($posts->TAGS);
										foreach ($post->TAGS as $tag):
									 ?>
											<a href="<?=base_url()?>post/tag/<?=$tag->TAG_ID?>" class="tag"><?php echo $tag->NAME; ?></a>
									<?php endforeach; ?>
									
									<?php 
									// Member can edit his own topic
									// Mod can edit a topic of his tag
									// Admin can edit everyone's topic
									 ?>
									<a href="edit_content.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
									<a href="" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
								</p>
							</div>
							<div class="col-xs-3 text-right">
								<a href="" class="btn btn-danger btn-xs vote vote-down">
									<span class="glyphicon glyphicon-thumbs-down"></span>
								</a><!--vote-->
								<span class="current-score">
									<?php echo $post->VOTE; ?>
								</span>
								<a href="" class="btn btn-success btn-xs vote vote-up">
									<span class="glyphicon glyphicon-thumbs-up"></span>
								</a><!--vote-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
							<?php echo $post->CONTENT; ?>
						
						</div><!--context-->
					</div><!--thread-->
					<?php foreach ($replies as $reply): ?>
					<div class="reply">
						<div class="context">
							<?php echo $reply->CONTENT; ?>
						</div><!--context-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
							</div>
							<div class="col-xs-8">
								<p class="info">
									<a href="<?=base_url()?>person/profile/<?=$post->PERSON_ID?>" class="name"><strong><?php echo $reply->DISPLAY_NAME; ?></strong></a>
									<span class="date"><?php echo $reply->TIME; ?></span>
									<?php 
									// Member can edit his own post
									// Mod can edit a post of his tag
									// Admin can edit everyone's post
									 ?>
									<a href="edit_post.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
								</p>
							</div>
							<div class="col-xs-3 text-right">
								<a href="" class="btn btn-danger btn-xs vote vote-down">
									<span class="glyphicon glyphicon-thumbs-down"></span>
								</a><!--vote-->
								<span class="current-score">
									<?php echo $reply->VOTE ?>
								</span>
								<a href="" class="btn btn-success btn-xs vote vote-up">
									<span class="glyphicon glyphicon-thumbs-up"></span>
								</a><!--vote-->
							</div>
						</div><!--topic-->
					</div><!--reply-->
					<?php endforeach ?>
					
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<a type="button" class="create-btn btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-plus-sign"></span>
					Reply
				</a>
				<h3>Related Topics</h3>
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
				<h3>Related Tags</h3>
				<div class="list-group">
					<a href="" class="list-group-item"><span class="badge">114</span> Computer</a>
					<a href="" class="list-group-item"><span class="badge">20</span> Coding</a>
					<a href="" class="list-group-item"><span class="badge">6</span> Programming</a>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php echo $footer; ?>