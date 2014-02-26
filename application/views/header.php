<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Board</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet/less" type="text/css" href="<?php echo base_url('assets/css/style.less'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/chosen.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-wysihtml5-0.0.2.css') ?>">
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/less.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/chosen.jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/wysihtml5-0.3.0_rc2.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-wysihtml5-0.0.2.min.js'); ?>" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo base_url(); ?>">Webboard</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="activex"><a href="<?php echo base_url(); ?>">Home</a></li>
			<li><a href="<?php echo base_url('post/create'); ?>">New Topic</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tags <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<?php 
					$tags = get_tags();
					foreach($tags as $tag):
				?>
					<li><a href="<?php echo base_url('post/?sortby=&tag_filter='.$tag->NAME); ?>"><?php echo $tag->NAME; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</li>
			<?php if($is_admin = is_admin()): ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Report Management <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<?php $all_tags = get_tags(); ?>
				<?php foreach($all_tags as $tag): ?>
					<li><a href="<?php echo base_url('mod/report/tag/'.$tag->TAG_ID); ?>"><?php echo $tag->NAME; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Management <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>
					<li><a href="<?php echo base_url('admin/user'); ?>">Users</a></li>
					<li><a href="<?php echo base_url('admin/tag'); ?>">Tags</a></li>
					<li><a href="<?php echo base_url('admin/report'); ?>">Reports</a></li>
				</ul>
			</li>
			<?php endif; ?>
			<?php if(is_moderator2()): ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Report Management <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<?php $mod_tags = get_mod_tags(); ?>
				<?php foreach($mod_tags as $tag): ?>
					<li><a href="<?php echo base_url('mod/report/tag/'.$tag->TAG_ID); ?>"><?php echo $tag->NAME; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</li>
			<?php endif; ?>
		</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if(isset($user) && $user): // show this to logged in user only ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->DISPLAY_NAME; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('person/edit'); ?>">Edit Profile</a></li>
							<li><a href="<?php echo base_url('person/profile/'.$this->session->userdata('person_id')); ?>">View Profile</a></li>
							<li><a href="<?php echo base_url('person/profile/'.$this->session->userdata('person_id')); ?>#topics">View your posts</a></li>
							<li class="divider"></li>
							<?php if($is_admin): ?>
							<li><a href="<?php echo base_url('admin/dashboard'); ?>">Admin</a></li>
							<?php endif; ?>
							<li><a href="<?php echo base_url('auth/signout?return='.uri_string()); ?>">Sign out</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li><a href="<?php echo base_url('auth?return='.uri_string()); ?>">Sign in</a></li>
					<li><a href="<?php echo base_url('auth/signup'); ?>">Sign up</a></li>
				<?php endif; ?>
			</ul>
	</div><!-- /.navbar-collapse -->
</nav>
<div id="body">
	<div class="container">
	<?php if($this->session->flashdata('query')): ?>
		<div class="alert"><?php echo $this->session->flashdata('query'); ?></div>
	<?php endif; ?>
	<?php if($this->session->flashdata('query2')): ?>
		<div class="alert"><?php echo $this->session->flashdata('query2'); ?></div>
	<?php endif; ?>