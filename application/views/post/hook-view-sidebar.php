
			<div class="col-md-3" id="sidebar">
			<?php if($person_loggedin): // user logged in ?>
				<button type="button" class="reply-click btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-plus-sign"></span>
					Reply
				</button>
			<?php else: ?>
				<a href="<?php echo $login_url; ?>#reply" type="button" class="reply-click btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-plus-sign"></span>
					Reply
				</a>
			<?php endif; ?>
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