<?php echo $header; ?>
<?php $this->load->view('query'); ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<?php if($this->session->flashdata('query')): ?>
					<div class="alert"><?php echo $this->session->flashdata('query'); ?></div>
				<?php endif; ?>
				<?php if($this->session->flashdata('alert')): ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('alert'); ?></div>
				<?php endif; ?>
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							<img src="<?php echo base_url('uploads/'.$person->AVATAR); ?>" class="img-circle">
						</div>
						<div class="col-xs-9">
							<h4><a href="<?php echo base_url('person/profile/'.$person->PERSON_ID); ?>"><?php echo $person->DISPLAY_NAME; ?></a></h4>
							<p class="info">
								<a href="mailto:<?php echo $person->EMAIL; ?>" class="name"><strong><?php echo $person->EMAIL; ?></strong></a>
								<span class="date">Joined since <?php echo $person->JOINED_DATE; ?></span>
							</p>
						</div>
					</div><!--topic-->
					<hr class="topic-line">
					<div class="context">
						<?php if(validation_errors()): ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<?php echo form_open(uri_string(), array('class' => 'form-horizontal')); ?>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Start date</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="start-date" value="<?php echo $start_date; ?>">
								</div>
								<div class="col-sm-4">
									<input type="time" class="form-control" name="start-time" value="<?php echo $start_time; ?>">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">End date</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="end-date" min="<?php echo $tmr_date; ?>" value="<?php echo $end_date; ?>">
								</div>
								<div class="col-sm-4">
									<input type="time" class="form-control" name="end-time" value="<?php echo $start_time; ?>">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary">Ban User</button>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div><!--context-->
				</div><!--thread-->
				<!-- for admin only -->
				<h3>Ban History</h3>
				<div class="box">
					
							<table class="table">
								<tr>
									<th width="10%">#</th>
									<th width="25%">Begin date</th>
									<th width="25%">End date</td>
									<th width="20%">By</td>
									<th width="20%">Manage</td>
								</tr>
								<?php $i = 1; foreach($bans as $ban): ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $ban->START_DATE; ?></td>
										<td><?php echo $ban->END_DATE; ?></td>
										<td><a href="<?php echo base_url('person/profile/'.$ban->ADMIN_ID); ?>"><?php echo $ban->ADMIN_NAME; ?></a></td>
										<td>
											<a href="<?php echo base_url('admin/ban/view/'.$ban->BAN_LOG_ID) ?>"><span class="glyphicon glyphicon-pencil"></span></a>
											&nbsp;
											<a href="<?php echo base_url('admin/ban/remove/'.$ban->BAN_LOG_ID) ?>" class="remove"><span class="glyphicon glyphicon-trash"></span></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
				</div>
			</div><!--content-->
			<?php include('sidebar.php'); ?>
		</div><!--row-->
<?php echo $footer; ?>