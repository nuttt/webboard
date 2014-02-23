<?php include('header.php'); ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
							</div>
							<div class="col-xs-8">
								<h4><a href="">Why do we use this specific syntax for defining functions?</a></h4>
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nuttapon P</strong></a>
									<span class="date">14 Dec 13, 15:35</span>
									<a href="" class="tag">Maths</a>
									<a href="" class="tag">Physics</a>
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
									20
								</span>
								<a href="" class="btn btn-success btn-xs vote vote-up">
									<span class="glyphicon glyphicon-thumbs-up"></span>
								</a><!--vote-->
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
							In my class, I was playing around and found out that CSS works with made-up tags.
						
							Example:
						
							<pre>&lt;style&gt;
						imsocool {
						    color:blue;
						}
						&lt;/style&gt;
						
						&lt;body&gt;
						    &lt;imsocool&gt;HELLO&lt;/imsocool&gt;
						&lt;/body&gt;</pre>
						
							When my professor first saw me using this, he was a bit surprised that made-up tags worked and recommended I simply change all of my made up tags to paragraphs with ID's.
						
							Why doesn't my professor want me to use made-up tags? They work effectively.
						
							Also, why didn't he know that made-up tags exist and work with CSS. Are they uncommon?
						</div><!--context-->
					</div><!--thread-->
					<div class="reply media" id="reply-11">
						<div class="context">
							I don't know what I'm doing at all.
						</div><!--context-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
							</div>
							<div class="col-xs-5">
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nut</strong></a>
									<span class="date">14 Dec 13, 21:30</span>
									<a href="" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
								</p>
							</div>
							<div class="col-xs-6 text-right">
								<button type="button" data-reply="11" class="inner-reply-btn btn btn-primary btn-xs">
									<span class="glyphicon glyphicon-plus-sign"></span>
									Reply
								</button>
								<a href="" class="btn btn-danger btn-xs vote vote-down">
									<span class="glyphicon glyphicon-thumbs-down"></span>
								</a><!--vote-->
								<span class="current-score">
									-8
								</span>
								<a href="" class="btn btn-success btn-xs vote vote-up">
									<span class="glyphicon glyphicon-thumbs-up"></span>
								</a><!--vote-->
							</div>
						</div><!--topic-->
						<div class="reply media" id="reply-113">
							<div class="context">
								I don't know what I'm doing at all.
							</div><!--context-->
							<hr class="topic-line">
							<div class="row topic">
								<div class="col-xs-1">
									<img src="img/avatar_test.jpg" class="img-circle">
								</div>
								<div class="col-xs-5">
									<p class="info">
										<a href="member_profile.php" class="name"><strong>Vee Vee</strong></a>
										<span class="date">14 Dec 13, 21:30</span>
										<a href="" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
									</p>
								</div>
								<div class="col-xs-6 text-right">
									<button type="button" data-reply="113" class="inner-reply-btn btn btn-primary btn-xs">
										<span class="glyphicon glyphicon-plus-sign"></span>
										Reply
									</button>
									<a href="" class="btn btn-danger btn-xs vote vote-down">
										<span class="glyphicon glyphicon-thumbs-down"></span>
									</a><!--vote-->
									<span class="current-score">
										-8
									</span>
									<a href="" class="btn btn-success btn-xs vote vote-up">
										<span class="glyphicon glyphicon-thumbs-up"></span>
									</a><!--vote-->
								</div>
							</div><!--topic-->
						</div><!--reply-->
					</div><!--reply-->
					<div class="reply media" id="reply-12">
						<div class="context">
							I don't know what I'm doing at all.
						</div><!--context-->
						<hr class="topic-line">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="img/avatar_test.jpg" class="img-circle">
							</div>
							<div class="col-xs-5">
								<p class="info">
									<a href="member_profile.php" class="name"><strong>Nut</strong></a>
									<span class="date">14 Dec 13, 21:30</span>
									<a href="" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
								</p>
							</div>
							<div class="col-xs-6 text-right">
								<button type="button" data-reply="12" class="inner-reply-btn btn btn-primary btn-xs">
									<span class="glyphicon glyphicon-plus-sign"></span>
									Reply
								</button>
								<a href="" class="btn btn-danger btn-xs vote vote-down">
									<span class="glyphicon glyphicon-thumbs-down"></span>
								</a><!--vote-->
								<span class="current-score">
									-8
								</span>
								<a href="" class="btn btn-success btn-xs vote vote-up">
									<span class="glyphicon glyphicon-thumbs-up"></span>
								</a><!--vote-->
							</div>
						</div><!--topic-->
						<div class="reply media" id="reply-123">
							<div class="context">
								I don't know what I'm doing at all.
							</div><!--context-->
							<hr class="topic-line">
							<div class="row topic">
								<div class="col-xs-1">
									<img src="img/avatar_test.jpg" class="img-circle">
								</div>
								<div class="col-xs-5">
									<p class="info">
										<a href="member_profile.php" class="name"><strong>Vee Vee</strong></a>
										<span class="date">14 Dec 13, 21:30</span>
										<a href="" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
									</p>
								</div>
								<div class="col-xs-6 text-right">
									<button type="button" data-reply="123" class="inner-reply-btn btn btn-primary btn-xs">
										<span class="glyphicon glyphicon-plus-sign"></span>
										Reply
									</button>
									<a href="" class="btn btn-danger btn-xs vote vote-down">
										<span class="glyphicon glyphicon-thumbs-down"></span>
									</a><!--vote-->
									<span class="current-score">
										-8
									</span>
									<a href="" class="btn btn-success btn-xs vote vote-up">
										<span class="glyphicon glyphicon-thumbs-up"></span>
									</a><!--vote-->
								</div>
							</div><!--topic-->
						</div><!--reply-->
					</div><!--reply-->
					<div class="topic-reply">
						<form action="reply/TOPIC_ID" method="POST">
							<p><textarea class="form-control" rows="3"></textarea></p>
							<div class="row">
								<div class="col-sm-6">
									<h5>Reply to the topic</h5>
								</div><!-- /.col-sm-6 -->
								<div class="col-sm-6 text-right">
									<button type="submit" class="btn btn-primary">Reply</button>
								</div><!-- /.col-sm-6 -->
							</div>
						</form>
					</div><!--reply-form-->
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<a type="button" class="reply-click btn btn-primary btn-lg btn-block">
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

<!-- leave this alone -->
<div class="reply-form-original">
	<form action="" method="POST">
		<p><textarea class="form-control" rows="3"></textarea></p>
		<div class="row">
			<div class="col-sm-6">
				<h5>Reply to <span class="author"></span></h5>
			</div><!-- /.col-sm-6 -->
			<div class="col-sm-6 text-right">
				<button type="submit" class="btn btn-primary">Reply</button>
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
		reply.find('form').attr('action', '/reply/'+postID);
		scrollToAnchor('.reply-form');
	});
	$('.reply-click').click(function(e){
		scrollToAnchor('.topic-reply');
	});
});
</script>
<?php include('footer.php'); ?>