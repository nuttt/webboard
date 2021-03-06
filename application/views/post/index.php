<?php echo $header; ?>
<?php $this->load->view('query'); ?>
		<div class="row">
			<div class="col-md-9" id="content-list">
			  <?php if($this->session->flashdata('message')): ?>
			  <div class="alert alert-success">
			    <?php echo $this->session->flashdata('message'); ?>
			  </div>
			  <?php endif; ?>
				<?php if($this->session->flashdata('alert')): ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('alert'); ?></div>
				<?php endif; ?>
				<div class="list">
					<div class="helper">
						<span class="right">
							<div class="btn-group">
								<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
									Sort by <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url()?>post/?sortby=date&tag_filter=<?php echo $tag_filter;?>">Sort by Date</a></li>
									<li><a href="<?=base_url()?>post/?sortby=views&tag_filter=<?php echo $tag_filter;?>">Sort by Views</a></li>
									<li><a href="<?=base_url()?>post/?sortby=votes&tag_filter=<?php echo $tag_filter;?>">Sort by Votes</a></li>
								</ul>
							</div><!--btn-group-->
							<div class="btn-group">
								<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
									Tags <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<?php 
										$tags = get_tags();
										foreach($tags as $tag):
									?>
										<li><a href="<?=base_url()?>post/?sortby=<?php echo $sort_by;?>&tag_filter=<?php echo $tag->NAME; ?>"><?php echo $tag->NAME; ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div><!--btn-group-->
						</span><!--text-right-->
						<span class="text-left">
							<?php echo $Title ?>
						</span>
						<div class="clear"></div>
					</div><!--helper-->
					<hr>
					<?php foreach ($posts as $post): ?>
						<div class="row topic">
							<div class="col-xs-10">
								<h4><a href="<?=base_url()?>post/view/<?=$post->POST_ID?>"><?=$post->TITLE?></a></h4>
								<p class="info">
									<a href="<?=base_url()?>person/profile/<?=$post->PERSON_ID?>" class="name"><strong><?=$post->DISPLAY_NAME?></strong></a>
									<span class="date"><?=$post->TIME?></span>
									<span class="date"><?php echo $post->VISIT; ?> views</span>
									<?php 
										// var_dump($posts->TAGS);
										foreach ($post->TAGS as $tag):
									 ?>
									<a href="<?=base_url()?>post/tag/<?=$tag->TAG_ID?>" class="tag"><?php echo $tag->NAME; ?></a>
									<?php endforeach; ?>
								</p>
							</div>
							<div class="col-xs-2 text-right">
								<a href="<?=base_url()?>post/view/<?=$post->POST_ID?>" class="btn btn-primary btn-lg comment">
									<span><?php echo $post->COUNT_REPLY; ?> replies</span>
								</a><!--comment-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
					<?php endforeach; ?>
				</div>
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<a href="<?php echo base_url('post/create'); ?>" class="create-btn btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-plus-sign"></span>
					Create a Topic
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
				<h3>Related Tags</h3>
				<div class="list-group">
				<?php 
					$tags2 = get_tags_with_topic_num();
					foreach($tags2 as $tag):
				?>
					<a href="<?php echo base_url('post/?sortby=&tag_filter='.$tag->NAME); ?>" class="list-group-item"><span class="badge"><?php echo $tag->NUM; ?></span> <?php echo $tag->NAME; ?></a>
				<?php endforeach; ?>
				</div>
			</div><!--sidebar-->
		</div><!--row-->

<?php echo $footer; ?>