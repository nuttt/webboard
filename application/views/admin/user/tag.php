<?php echo $header; ?>
  <h3><span class="glyphicon glyphicon-tags"></span> &nbsp;Manage Tags of <a href="<?php echo base_url('person/profile/'.$person->PERSON_ID); ?>"><?php echo $person->DISPLAY_NAME; ?></a></h3>
    <?php if($this->session->flashdata('alert')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('alert'); ?></div>
    <?php endif; ?>
    <br>
    <h4>Add Tag</h4>
    <?php echo form_open('admin/user/add_tag/'.$person->PERSON_ID, array('class' => 'form-inline')); ?>
      <div class="form-group">
        <select name="tag" id="tag" class="form-control">
        <?php foreach ($tags as $tag): ?>
          <option value="<?php echo $tag->TAG_ID; ?>"><?php echo $tag->NAME; ?></option>
        <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Add Tag</button>
    <?php echo form_close(); ?>
    <br>
    <div class="context">
      <table class="table">
        <thead>
          <tr>
            <th width="5%">ID</th>
            <th width="15%">Tag Name</td>
            <th width="80%"></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($mod_tags as $tag): ?>
            <tr>
              <td><?php echo $tag->TAG_ID; ?></td>
              <td><?php echo $tag->NAME; ?></td>
              <td>
                <a href="<?=base_url('admin/user/remove_tag/'.$person->PERSON_ID.'/'.$tag->TAG_ID)?>" class="remove"><span class="glyphicon glyphicon-trash"></span></a>
                &nbsp;
                <a href="<?=base_url('post/tag/'.$tag->TAG_ID)?>"><span class="glyphicon glyphicon-eye-open"></span></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div><!--context-->
<?php echo $footer; ?>