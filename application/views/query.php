	<?php if($this->session->flashdata('query')): ?>
		<div class="alert"><?php echo $this->session->flashdata('query'); ?></div>
	<?php endif; ?>
	<?php if($this->session->flashdata('query2')): ?>
		<div class="alert"><?php echo $this->session->flashdata('query2'); ?></div>
	<?php endif; ?>