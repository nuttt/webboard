<?php 
// Member, mod and admin can create a new topic
 ?>
<?php echo $header; ?>
<?php $this->load->view('query'); ?>
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
								</div>
								<div class="form-group">
									<?=form_label('Content <span class="red">*</span>', 'content')?>
									<?=form_textarea('content', set_value('content'), 'class="form-control" id="post-content" cols="30" rows="10"')?>
								</div>
								<div class="form-group">

									<?=form_label('Tags <span class="red">*</span>', 'tag[]')?>
									<?=form_multiselect('tag[]', $tags, set_value('tag'), 'class="form-control" id="tag-field"')?>
								</div>
								<button type="submit" class="btn btn-primary">Create</button>
						</div><!--context-->
					</div><!--thread-->
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<button type="submit" class="create-btn btn btn-primary btn-lg btn-block">
					<span class="glyphicon glyphicon-floppy-disk"></span>
					Update
				</button>
				<button onclick="window.history.back()" type="button" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-arrow-left"></span>
					Back
				</button>
				<h3>Post Guidelines</h3>
				<div class="replies">
					<p>Make sure you are posting constructive criticism, whether it's negative or positive. Contrary to what some people believe, developers do take feedback from here into account.</p>
					<p>Please note that Administrators/Moderators reserve the right to change/edit/delete/move/merge any content at any time if they feel it is inappropriate or incorrectly categorized.</p>
					<p>Do not post any topics/replies containing the following:</p>
					<ul>
						<li>Porn, inappropriate or offensive content, warez or leaked content or anything else not safe for work</li>
						<li>Threats of violence or harassment, even as a joke</li>
						<li>Racism, discrimination</li>
						<li>Religious, political, and other “prone to huge arguments” threads</li>
					</ul>
				</div>
			</div><!--sidebar-->
			<?php echo form_close(); ?>
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