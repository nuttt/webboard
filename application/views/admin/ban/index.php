<?php echo $header; ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
				<div class="thread">
					<div class="row topic">
						<div class="col-xs-1">
							<img src="<?php echo base_url('uploads/'.$person->AVATAR); ?>" class="img-circle">
						</div>
						<div class="col-xs-9">
							<h4><a href="<?php echo base_url('person/edit_all/'.$person->PERSON_ID); ?>"><?php echo $person->DISPLAY_NAME; ?></a></h4>
							<p class="info">
								<a href="mailto:<?php echo $person->EMAIL; ?>" class="name"><strong><?php echo $person->EMAIL; ?></strong></a>
								<span class="date">Joined since <?php echo $person->JOINED_DATE; ?></span>
							</p>
						</div>
					</div><!--topic-->
					<hr class="topic-line">
					<div class="context">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Start date</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="start-date" value="2014-02-23">
								</div>
								<div class="col-sm-4">
									<input type="time" class="form-control" name="start-time" value="23:00">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">End date</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" name="end-date" value="2014-03-03">
								</div>
								<div class="col-sm-4">
									<input type="time" class="form-control" name="end-time" value="12:00">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary">Ban User</button>
								</div>
							</div>
						</form>
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
											<a href="#"><span class="glyphicon glyphicon-trash"></span></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
				</div>
			</div><!--content-->
			<div class="col-md-3" id="sidebar">
				<a href="<?php echo base_url('person/profile/'.$person->PERSON_ID); ?>" type="button" class="create-btn btn btn-success btn-lg btn-block">
					<span class="glyphicon glyphicon-eye-open"></span>
					View Profile
				</a>
				<h3>Ban Guidelines</h3>
				<div class="replies">
					<p>Users can be banned. When this happens all of their comments will be deleted and they will be unable to add further comments. Users who are spamming the site should be banned. Banning users is not available on older comments because a user account system was not available then. You will need to delete those individually.</p>
					<p>If you are ever uncertain whether it is spam or not, click on their profile and read their other comments. If you are still unsure, leave it alone. We do not want to ban legitimate users.</p>
				</div>
			</div><!--sidebar-->
		</div><!--row-->
<?php echo $footer; ?>