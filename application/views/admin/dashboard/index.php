<?php echo $header; ?>
    <div class="row">
      <div class="col-md-6" id="sidebar">
        <h3><span class="glyphicon glyphicon-stats"></span> Dashboard</h3>
        <div class="box">
          <div class="context">
            <table class="table">
              <tr>
                <th width="50%">Number of members</th>
                <td width="50%"><?php echo $stats['member_num']; ?></td>
              </tr>
              <tr>
                <th>Number of topics/replies</th>
                <td><?php echo $stats['topic_num']; ?>/<?php echo $stats['reply_num']; ?></td>
              </tr>
              <tr>
                <th>Waiting reports/handled reports</th>
                <td>775</td>
              </tr>
            </table>
          </div><!--context-->
        </div><!--box-->
        <h3><span class="glyphicon glyphicon-eye-close"></span> Ban User</h3>
        <div class="box">
            <table class="table">
              <thead>
                <tr>
                  <th width="50%">Display Name</th>
                  <th width="50%">End date</td>
                </tr>
              </thead>
              <tbody>
              <?php foreach($bans as $ban): ?>
                <tr>
                  <th><a href="<?php echo base_url('person/profile/'.$ban->PERSON_ID); ?>"><?php echo $ban->DISPLAY_NAME; ?></a></th>
                  <td><?php echo $ban->END_DATE; ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
        </div><!--box-->
      </div><!--content-->
      <div class="col-md-6" id="sidebar">
        <h3><span class="glyphicon glyphicon-exclamation-sign"></span> Latest Reports</h3>
        <div class="list-group replies">
          <a href="../content.php" class="list-group-item">
            <h4 class="list-group-item-heading">Help with Fix me! code.</h4>
            <p class="list-group-item-text">Reported by Nuttapon</p>
          </a>
          <a href="../content.php" class="list-group-item">
            <h4 class="list-group-item-heading">Help with Fix me! code.</h4>
            <p class="list-group-item-text">Reported by Vee</p>
          </a>
          <a href="../content.php" class="list-group-item">
            <h4 class="list-group-item-heading">Help with Fix me! code.</h4>
            <p class="list-group-item-text">Reported by Nuttapon</p>
          </a>
          <a href="../content.php" class="list-group-item">
            <h4 class="list-group-item-heading">Help with Fix me! code.</h4>
            <p class="list-group-item-text">Reported by Nuttapon</p>
          </a>
          <a href="../content.php" class="list-group-item">
            <h4 class="list-group-item-heading">Help with Fix me! code.</h4>
            <p class="list-group-item-text">Reported by Nuttapon</p>
          </a>
          <a href="manage_report.php" class="list-group-item">
            <h4 class="list-group-item-heading">View all reported topics...</h4>
          </a>
        </div>
      </div><!--sidebar-->
    </div><!--row-->
<?php echo $footer; ?>