<?php echo $header; ?>
<?php foreach($users as $role => $role_users): ?>
  <h3><span class="glyphicon glyphicon-user"></span> Manage <?php echo $role; ?></h3>
    <div class="context">
      <table class="table">
        <thead>
          <tr>
            <th width="5%">ID</th>
            <th width="20%">Display Name</td>
            <th width="30%">E-mail</td>
            <th width="25%">Joined Date</td>
            <th width="20%">Edit/ View/ Ban/ Remove</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($role_users as $user): ?>
            <tr>
              <td><?php echo $user->PERSON_ID; ?></td>
              <td><?php echo $user->DISPLAY_NAME; ?></td>
              <td><a href="mailto:<?php echo $user->EMAIL; ?>"><?php echo $user->EMAIL; ?></a></td>
              <td><?php echo $user->JOINED; ?></td>
              <td>
                <a href="<?php echo base_url('person/profile/'.$user->PERSON_ID) ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                &nbsp;
                <a href="<?php echo base_url('person/profile/'.$user->PERSON_ID) ?>"><span class="glyphicon glyphicon-user"></span></a>
                &nbsp;
                <a href="<?php echo base_url('person/profile/'.$user->PERSON_ID) ?>"><span class="glyphicon glyphicon-eye-close"></span></a>
                &nbsp;
                <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
<?php endforeach; ?>
    </div><!--context-->
<?php echo $footer; ?>