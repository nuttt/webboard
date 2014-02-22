<?php echo $header; ?>
  <h3><span class="glyphicon glyphicon-tags"></span> &nbsp;Create New Tag</h3>
    <div class="context">
      <?php if(validation_errors()): ?>
        <div class="alert alert-danger">
          <?php echo validation_errors(); ?>
        </div>
      <?php endif; ?>
      <?php echo form_open('', array('class' => 'form-horizontal')); ?>
        <div class="form-group">
          <?php echo form_label('Tag Name', 'name', array('class' => 'col-sm-2 control-label')); ?>
          <div class="col-sm-4">
            <?php echo form_input('name', '', 'class="form-control" placeholder="Enter tag name"'); ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      <?php echo form_close(); ?>
    </div><!--context-->
<?php echo $footer; ?>