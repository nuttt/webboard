
			<div class="col-md-3" id="sidebar">
				<a href="<?php echo base_url('person/profile/'.$person->PERSON_ID); ?>" class="create-btn btn btn-success btn-lg btn-block">
					<span class="glyphicon glyphicon-eye-open"></span>
					View Profile
				</a>
				<a href="<?php echo base_url('person/edit_all/'.$person->PERSON_ID); ?>" class="create-btn btn btn-warning btn-lg btn-block">
					<span class="glyphicon glyphicon-pencil"></span>
					Edit Profile
				</a>
				<h3>Ban Guidelines</h3>
				<div class="replies">
					<p>Users can be banned. When this happens all of their comments will be deleted and they will be unable to add further comments. Users who are spamming the site should be banned. Banning users is not available on older comments because a user account system was not available then. You will need to delete those individually.</p>
					<p>If you are ever uncertain whether it is spam or not, click on their profile and read their other comments. If you are still unsure, leave it alone. We do not want to ban legitimate users.</p>
				</div>
			</div><!--sidebar-->