
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