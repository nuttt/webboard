<?php echo $header ?>
  <h3><span class="glyphicon glyphicon-exclamation-sign"></span> Manage Reports</h3>
  <?php if($this->session->flashdata('message')): ?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message'); ?>
  </div>
  <?php endif; ?>
    <div class="context">
      <table class="table">
        <thead>
          <tr>
            <th width="15%">Reported Date</th>
            <th width="40%">Topic Name</td>
            <th width="15%">Posted by</td>
            <th width="15%">Reporter</td>
            <th width="10%">Status</td>
            <th width="5%"></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($reports as $report): ?>
          <tr <?php if($report->STATUS == 'Waiting') echo 'class="warning"' ?>>
            <td><span class="date"><?php echo $report->REPORTED_DATE ?></span></td>
            <td><a href="<?=base_url()?>post/view/<?php echo $report->ROOT_TOPIC_ID; ?>#<?=$report->POST_ID?>"><?php echo $report->REPORT_TITLE ?></a></td>
            <td><a href="<?=base_url()?>person/profile/<?php echo $report->POSTED_BY_PERSON_ID; ?>"><?php echo $report->POSTED_BY ?></a></td>
            <td><a href="<?=base_url()?>person/profile/<?php echo $report->REPORTER_ID; ?>"><?php echo $report->REPORTER_NAME ?></a></td>
            <td><?=$report->STATUS?></td>
            <td>
              <!-- change status of reports -->
              <?php if($report->STATUS == 'Waiting'): ?>
                <a href="<?=base_url()?>admin/report/handle/<?=$report->REPORTER_ID;?>/<?=$report->POST_ID;?>"><span class="glyphicon glyphicon-ok"></span></a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
          
        </tbody>
      </table>
    </div><!--context-->
<?php echo $footer ?>