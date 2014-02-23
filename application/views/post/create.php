<?php 
// Member, mod and admin can create a new topic
 ?>
<?php echo $header; ?>
		<div class="row">
			<?php echo form_open('post/create', array('role' => 'form')); ?>
			
			<div class="col-md-9" id="content-view">
				<div class="thread">
						<div class="row topic">
							<div class="col-xs-11">
								<h4>Create a new topic</h4>
							</div>
						</div><!--topic-->
						<?php if(validation_errors()): ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<hr class="topic-line">
						<div class="context">
								<div class="form-group">
									<?=form_label('Title <span class="red">*</span>', 'title')?>
									<?=form_input('title', set_value('title'), 'class="form-control" id="title" placeholder="Title"')?>
									<!-- <label for="title">Title <span class="red">*</span></label>
									<input type="text" class="form-control" id="title" placeholder="Title"> -->
								</div>
								<div class="form-group">
									<?=form_label('Content <span class="red">*</span>', 'content')?>
									<?=form_textarea('content', set_value('content'), 'class="form-control" id="" cols="30" rows="10"')?>
									<!-- <label for="content">Content <span class="red">*</span></label>
									<textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea> -->
								</div>
								<div class="form-group">

									<?=form_label('Tags <span class="red">*</span>', 'tag')?>
									<?=form_multiselect('tag', $tags, set_value('tag'), 'class="form-control" id="tag-field"')?>
									<!-- <label for="tag">Tags <span class="red">*</span></label>
									<input type="text" class="form-control" id="tag" placeholder="Tag1, Tag2, Tag3"> -->
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
			<?php echo form_close(); ?>
		</div><!--row-->
<script type="text/javascript">
	$('#tag-field').chosen({no_results_text: "ไม่มี tag ที่คุณต้องการ"});
</script>
<?php echo $footer; ?>