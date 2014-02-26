<?php 
// Member can edit his own topic
// Mod can edit a topic of his tag
// Admin can edit everyone's topic
 ?>
<?php echo $header; ?>
		<div class="row">
			<?php echo form_open('post/edit/'.$post->POST_ID, array('role' => 'form')); ?>

			<div class="col-md-9" id="content-view">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-1">
								<img src="<?=base_url()?>uploads/<?php echo $post->AVATAR; ?> " class="img-circle profile-pic left">
							</div>
							<div class="col-xs-11">
								<h4>Editing Topic: <a href="<?php echo base_url('post/view/'.$post->POST_ID); ?>"><?=$post->TITLE?></a></h4>
								<p class="info">
									<a href="<?php echo base_url('person/profile/'.$post->PERSON_ID); ?>" class="name"><strong><?=$post->DISPLAY_NAME?></strong></a>
									<span class="date"><?=$post->TIME?></span>
									<a href="" class="tag red"><span class="glyphicon glyphicon-trash"></span> Remove</a>
								</p>
							</div>
						</div><!--topic-->
						<hr class="topic-line">
						<div class="context">
								<div class="form-group">
									<?=form_label('Title <span class="red">*</span>', 'title')?>
									<?=form_input('title', $post->TITLE, 'class="form-control" id="title" placeholder="Title"')?>
									<!-- <label for="title">Title <span class="red">*</span></label>
									<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?=$post->TITLE?>"> -->
								</div>
								<div class="form-group">
									<?=form_label('Content <span class="red">*</span>', 'content')?>
									<?=form_textarea('content', $post->CONTENT, 'class="form-control" id="post-content" cols="30" rows="10"')?>
									<!-- <label for="content">Content <span class="red">*</span></label>
									<textarea name="content" class="form-control" id="" cols="30" rows="10"><?=$post->CONTENT?></textarea> -->
								</div>
								<div class="form-group">
									
									<?=form_label('Tags <span class="red">*</span>', 'tag[]')?>
									<?=form_multiselect('tag[]', $tags, $related_tags, 'class="form-control" id="tag-field"')?>
									<!-- <label for="tag">Tags <span class="red">*</span></label>
									<input type="text" class="form-control" id="tag" value="Physics, Maths, Computer"> -->
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
						</div><!--context-->
					</div><!--thread-->
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<button type="submit" class="create-btn btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-floppy-disk"></span>
					Update
				</button>
				<a href="content.php" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-arrow-left"></span>
					Back
				</a>
				<h3>Guidelines</h3>
				<div class="replies">
					<p>Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here  Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here Text goes here   </p>
				</div>
			</div><!--sidebar-->
			</form>
		</div><!--row-->
<script type="text/javascript">

	$('#tag-field').chosen({no_results_text: "ไม่มี tag ที่คุณต้องการ"});
	$('#post-content').wysihtml5({
	"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
	"emphasis": true, //Italics, bold, etc. Default true
	"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
	"html": false, //Button which allows you to edit the generated HTML. Default false
	"link": false, //Button to insert a link. Default true
	"image": false, //Button to insert an image. Default true,
	"color": false //Button to change color of font  
});

</script>
<?php echo $footer; ?>