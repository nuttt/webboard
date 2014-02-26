<div class="reply media" id="reply-<?php echo $reply->POST_ID; ?>">
  <div class="context">
    <?php echo $reply->CONTENT; ?>
  </div><!--context-->
  <hr class="topic-line">
  <div class="row topic">
    <div class="col-xs-6">
      <img src="<?php echo base_url('uploads/'.$reply->AVATAR); ?>" class="img-circle profile-pic left">
      <p class="info">
        <a href="<?php echo base_url('person/profile/'.$reply->PERSON_ID); ?>" class="name"><strong><?php echo $reply->DISPLAY_NAME; ?></strong></a>
        <span class="date"><?php echo $reply->TIME; ?></span>
        <br>
        <?php if(is_person($reply->PERSON_ID)||is_admin()||is_moderator($post->POST_ID)): ?>
          <a href="edit_post.php" class="tag yellow"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
          <a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
        <?php endif ?>
        <?php if(!is_person($reply->PERSON_ID)): ?>
        <a href="<?php echo base_url('post/report/'.$reply->POST_ID.'?return=post/view/'.$post->POST_ID) ?>" class="tag orange"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
        <?php endif; ?>
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
  <?php
    $reply_view = array();
    if(isset($replies[$reply->POST_ID])){
      foreach($replies[$reply->POST_ID] as $reply){
        $rdata = array(
          'replies' => $replies,
          'reply' => $reply,
          'post' => $post,
          'person_loggedin' => $person_loggedin,
          'login_url' => $login_url
        );
        echo $this->load->view('post/reply-element', $rdata, TRUE);
        //$reply_view[] = $this->load->view('post/reply-element', $rdata, TRUE);
      }
    }
  ?>
</div><!--reply-->