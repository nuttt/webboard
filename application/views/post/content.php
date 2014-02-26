<?php echo $header; ?>
<?php $this->load->view('query'); ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="<?=base_url()?>uploads/<?php echo $post->AVATAR; ?> " class="img-circle">
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
									 <?php if(is_person($post->PERSON_ID)||is_admin()||is_moderator($post->POST_ID)):  ?>
										<a href="edit_content.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
										<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
									<?php endif ?>
									<a href="<?=base_url()?>report$post->POST_ID/" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
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
								<img src="<?=base_url()?>uploads/<?php echo $reply->AVATAR; ?>" class="img-circle">
							</div>
							<div class="col-xs-8">
								<p class="info">
									<a href="<?=base_url()?>person/profile/<?=$reply->PERSON_ID?>" class="name"><strong><?php echo $reply->DISPLAY_NAME; ?></strong></a>
									<span class="date"><?php echo $reply->TIME; ?></span>
									<?php if(is_person($reply->PERSON_ID)||is_admin()||is_moderator($post->POST_ID)): ?>
										<a href="edit_post.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
										<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
									<?php endif ?>
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
				<h3>Latest Replies</h3>
				<div class="list-group replies">
					<?php foreach($latest_replies as $latest_reply): ?>
					<a href="<?=base_url()?>post/view/<?=$latest_reply->POST_ID?>" class="list-group-item">
						<h4 class="list-group-item-heading"><?=$latest_reply->TITLE?></h4>
						<p class="list-group-item-text">
							<?php echo (strlen($latest_reply->CONTENT) > 100) ? mb_substr($latest_reply->CONTENT,0,100).'...' : $latest_reply->CONTENT; ?>
						</p>
					</a>
					<?php endforeach; ?>
				</div>
				<?php if (count($related_tags)>0): ?>
					<h3>Related Tags</h3>
				<?php endif ?>
				
				<div class="list-group">
					<?php foreach ($related_tags as $related_tag): ?>
						<a href="<?=base_url()?>post/tag/<?=$related_tag->TAG_ID?>" class="list-group-item"><span class="badge"><?php echo $related_tag->NUM ?></span><?php echo $related_tag->NAME ?></a>
					<?php endforeach ?>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php echo $footer; ?>