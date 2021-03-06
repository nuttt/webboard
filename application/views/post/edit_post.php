<?php 
// Member can edit his own post
// Mod can edit a post of his tag
// Admin can edit everyone's post
 ?>
<?php echo $header; ?>
<?php $this->load->view('query'); ?>
		<div class="row">
			<?php echo form_open('post/edit_reply/'.$reply->POST_ID, array('role' => 'form')); ?>
			<div class="col-md-9" id="content-view">
				<div class="thread">
						<div class="topic">
							<h4>Editing Reply: <a href="<?php echo base_url('post/view/'.$post->POST_ID); ?>"><?=$post->TITLE?></a></h4>
						</div><!--topic-->
						<?php if(validation_errors()): ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<hr class="topic-line">
						<div class="context">
								<div class="form-group">
									<?=form_label('Content <span class="red">*</span>', 'content')?>
									<?=form_textarea('content', set_value('content', $reply->CONTENT), 'class="form-control" id="post-content" cols="30" rows="10"')?>
									<!-- <label for="content">Content <span class="red">*</span></label>
									<textarea name="content" class="form-control" id="" cols="30" rows="10">WYSIWYG</textarea> -->
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