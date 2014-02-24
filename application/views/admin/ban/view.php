<?php echo $header; ?>
		<div class="row">
			<div class="col-md-9" id="content-view">
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
									<input type="date" class="form-control" name="end-date" min="<?php echo $start_date; ?>" value="<?php echo $end_date; ?>">
								</div>
								<div class="col-sm-4">
									<input type="time" class="form-control" name="end-time" value="<?php echo $end_time; ?>">
								</div>
							</div><!--form-group-->
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div><!--context-->
				</div><!--thread-->
				<!-- for admin only -->
				
			</div><!--content-->
			<?php include('sidebar.php'); ?>
		</div><!--row-->
<?php echo $footer; ?>