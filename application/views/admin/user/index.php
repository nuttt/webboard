<?php echo $header; ?>
<?php $this->load->view('query'); ?>
<?php if($this->session->flashdata('alert')): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('alert'); ?></div>
<?php endif; ?>
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
            <th width="20%">Edit/ Ban/ Remove/ Promote</td>
          </tr>
        </thead>
        <tbody>
        
          <?php foreach($role_users as $user): ?>
            <tr>
              <td><?php echo $user->PERSON_ID; ?></td>
              <td><a href="<?php echo base_url('person/profile/'.$user->PERSON_ID); ?>"><?php echo $user->DISPLAY_NAME; ?></a></td>
              <td><a href="mailto:<?php echo $user->EMAIL; ?>"><?php echo $user->EMAIL; ?></a></td>
              <td><?php echo $user->JOINED; ?></td>
              <td>
                <a href="<?php echo base_url('person/profile/'.$user->PERSON_ID) ?>" data-toggle="tooltip" data-placement="top" title="Edit profile"><span class="glyphicon glyphicon-pencil"></span></a>
                &nbsp;
                <a href="<?php echo base_url('admin/ban/person/'.$user->PERSON_ID); ?>" data-toggle="tooltip" data-placement="top" title="Ban user"><span class="glyphicon glyphicon-eye-close"></span></a>
                &nbsp;
                <a href="<?php echo base_url('admin/user/remove/'.$user->PERSON_ID); ?>" data-toggle="tooltip" data-placement="top" title="Remove user" class="remove"><span class="glyphicon glyphicon-trash"></span></a>
                &nbsp;
                <?php if($role != 'Members'): ?>
                <a href="<?php echo base_url('admin/user/to_member/'.$user->PERSON_ID); ?>" data-toggle="tooltip" data-placement="top" title="Downgrade to Member"><span class="glyphicon glyphicon-minus"></span></a>
                &nbsp;
                <?php endif; if($role != 'Moderators'): ?>
                <a href="<?php echo base_url('admin/user/to_moderator/'.$user->PERSON_ID); ?>" data-toggle="tooltip" data-placement="top" title="Upgrade to Moderator"><span class="glyphicon glyphicon-plus"></span></a>
                &nbsp;
                <?php endif; if($role != 'Administrators'): ?>
                <a href="<?php echo base_url('admin/user/to_admin/'.$user->PERSON_ID); ?>" data-toggle="tooltip" data-placement="top" title="Upgrade to Admin"><span class="glyphicon glyphicon-star"></span></a>
                &nbsp;
                <?php endif; if($role == 'Moderators'): ?>
                <a href="<?php echo base_url('admin/user/tag/'.$user->PERSON_ID); ?>" data-toggle="tooltip" data-placement="top" title="Manage Tags"><span class="glyphicon glyphicon-th-list"></span></a>
                &nbsp;                
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
<?php endforeach; ?>
    </div><!--context-->
<?php echo $footer; ?>