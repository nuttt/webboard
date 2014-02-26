<?php echo $header; ?>
<?php include('../../query.php'); ?>
	<h3><span class="glyphicon glyphicon-tags"></span> &nbsp;Manage Tags <a href="<?php echo base_url('admin/tag/create'); ?>" class="btn btn-primary">New tag</a></h3>
		<?php if($this->session->flashdata('alert')): ?>
			<div class="alert alert-success"><?php echo $this->session->flashdata('alert'); ?></div>
		<?php endif; ?>
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
					<?php foreach ($tags as $tag): ?>
						<tr>
							<td><?php echo $tag->TAG_ID; ?></td>
							<td><?php echo $tag->NAME; ?></td>
							<td>
								<a href="<?=base_url('admin/tag/edit/'.$tag->TAG_ID)?>"><span class="glyphicon glyphicon-pencil"></span></a>
								&nbsp;
								<a href="<?=base_url('admin/tag/delete/'.$tag->TAG_ID)?>" class="remove"><span class="glyphicon glyphicon-trash"></span></a>
								&nbsp;
								<a href="<?php echo base_url('post/?sortby=&tag_filter='.$tag->NAME); ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!--context-->
<?php echo $footer; ?>