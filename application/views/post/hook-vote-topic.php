
							<?php if($person_loggedin): // user logged in ?>
								<a href="" class="btn btn-danger btn-xs vote vote-down">
									<span class="glyphicon glyphicon-thumbs-down"></span>
								</a><!--vote-->
								<span class="current-score">
									<?php echo $post->VOTE; ?>
								</span>
								<a href="" class="btn btn-success btn-xs vote vote-up">
									<span class="glyphicon glyphicon-thumbs-up"></span>
								</a><!--vote-->
							<?php else: ?>
								<a href="<?php echo $login_url; ?>" class="btn btn-danger btn-xs vote vote-down">
									<span class="glyphicon glyphicon-thumbs-down"></span>
								</a><!--vote-->
								<span class="current-score">
									<?php echo $post->VOTE; ?>
								</span>
								<a href="<?php echo $login_url; ?>" class="btn btn-success btn-xs vote vote-up">
									<span class="glyphicon glyphicon-thumbs-up"></span>
								</a><!--vote-->
							<?php endif; ?>