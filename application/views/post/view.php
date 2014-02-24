<?php echo $header; ?>
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
									<a href="" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
								</p>
							</div>
							<div class="col-xs-3 text-right">
								<?php include('hook-vote-topic.php') ?>
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
							<?php echo $post->CONTENT; ?>
						
						</div><!--context-->
					</div><!--thread-->
					<?php foreach ($replies as $reply): ?>
					<div class="reply media" id="reply-<?php echo $reply->POST_ID; ?>">
						<div class="context">
							<?php echo $reply->CONTENT; ?>
						</div><!--context-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="<?php echo base_url('uploads/'.$reply->AVATAR); ?>" class="img-circle">
							</div>
							<div class="col-xs-5">
								<p class="info">
									<a href="<?php echo base_url('person/profile/'.$reply->PERSON_ID); ?>" class="name"><strong><?php echo $reply->DISPLAY_NAME; ?></strong></a>
									<span class="date"><?php echo $reply->TIME; ?></span>
									<?php if(is_person($reply->PERSON_ID)||is_admin()||is_moderator($post->POST_ID)): ?>
										<a href="edit_post.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
										<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
									<?php endif ?>
								</p>
							</div>
							<div class="col-xs-6 text-right">
								<?php if($person_loggedin): // user logged in ?>
									<button type="button" data-reply="<?php echo $reply->POST_ID; ?>" class="inner-reply-btn btn btn-primary btn-xs">
										<span class="glyphicon glyphicon-plus-sign"></span>
										Reply
									</button>
									<a href="" class="btn btn-danger btn-xs vote vote-down">
										<span class="glyphicon glyphicon-thumbs-down"></span>
									</a><!--vote-->
									<span class="current-score">
										<?php echo $reply->VOTE ?>
									</span>
									<a href="" class="btn btn-success btn-xs vote vote-up">
										<span class="glyphicon glyphicon-thumbs-up"></span>
									</a><!--vote-->
								<?php else: // hasn't logged in ?>
									<a href="<?php echo $login_url; ?>" class="inner-reply-btn btn btn-primary btn-xs">
										<span class="glyphicon glyphicon-plus-sign"></span>
										Reply
									</a>
									<a href="<?php echo $login_url; ?>" class="btn btn-danger btn-xs vote vote-down">
										<span class="glyphicon glyphicon-thumbs-down"></span>
									</a><!--vote-->
									<span class="current-score">
										<?php echo $reply->VOTE ?>
									</span>
									<a href="<?php echo $login_url; ?>" class="btn btn-success btn-xs vote vote-up">
										<span class="glyphicon glyphicon-thumbs-up"></span>
									</a><!--vote-->
								<?php endif; ?>
							</div>
						</div><!--topic-->
					</div><!--reply-->
					<?php endforeach ?>
					<div class="topic-reply">
						<?php echo form_open('post/reply/'.$post->POST_ID.'/'.$post->POST_ID); ?>
							<p><?php echo form_textarea(array('name' => 'content', 'class' => 'form-control', 'rows' => '3')); ?></p>
							<div class="row">
								<div class="col-sm-6">
									<h5>Reply to the topic</h5>
								</div><!-- /.col-sm-6 -->
								<div class="col-sm-6 text-right">
									<button type="submit" class="btn btn-primary submit-validate">Reply</button>
								</div><!-- /.col-sm-6 -->
							</div>
						<?php echo form_close(); ?>
					</div><!--reply-form-->
					
			</div><!--content-->
			<?php include('hook-view-sidebar.php'); ?>
		</div><!--row-->

<!-- leave this alone -->
<div class="reply-form-original">
	<form action="" method="POST">
		<p><textarea name="content" class="form-control" rows="3"></textarea></p>
		<div class="row">
			<div class="col-sm-6">
				<h5>Reply to <span class="author"></span></h5>
			</div><!-- /.col-sm-6 -->
			<div class="col-sm-6 text-right">
				<button type="submit" class="btn btn-primary submit-validate">Reply</button>
			</div><!-- /.col-sm-6 -->
		</div>
	</form>
</div><!--reply-form-->
<script>
$(function(){
	function scrollToAnchor(aid){
    var aTag = $(aid);
	  $('html,body').animate({scrollTop: aTag.offset().top-100},'slow');
	}
	$('.inner-reply-btn').click(function(e){
		$('.reply-form').remove();
		postID = $(this).data('reply');
		author = $('#reply-'+postID+' .name').html();
		reply = $('#reply-'+postID);
		x = $('.reply-form-original').clone().appendTo(reply);
		reply.find('.reply-form-original').attr('class', 'reply-form');
		reply.find('.author').html(author);
		reply.find('form').attr('action', '<?php echo base_url('post/reply/'.$post->POST_ID); ?>/'+postID);
		scrollToAnchor('.reply-form');
	});
	$('.reply-click').click(function(e){
		scrollToAnchor('.topic-reply');
	});
	$('#content-view').on('click', '.submit-validate', function(e){
		if($(this).parents('form').find('.form-control').val().length < 4){
			e.preventDefault();
			alert('Please fill in a comment before submitting');
		}
	});
});
</script>
<?php echo $footer; ?>