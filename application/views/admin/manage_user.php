<?php include('header.php'); ?>
	<h3><span class="glyphicon glyphicon-user"></span> Manage Users</h3>
		<div class="context">
			<table class="table">
				<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="20%">Display Name</td>
						<th width="35%">E-mail</td>
						<th width="20%">Joined Date</td>
						<th width="20%">Edit/ View/ Ban/ Remove</td>
					</tr>
				</thead>
				<tbody>
					<!-- banned -->
					<tr class="danger">
						<td>1</td>
						<td>Nuttapon</td>
						<td><a href="mailto:nuttt.p@gmail.com">nuttt.p@gmail.com</a></td>
						<td>14 Dec 13, 15:35</td>
						<td>
							<a href="../edit_profile.php"><span class="glyphicon glyphicon-pencil"></span></a>
							&nbsp;
							<a href="../member_profile.php"><span class="glyphicon glyphicon-user"></span></a>
							&nbsp;
							<a href="ban_user.php"><span class="glyphicon glyphicon-eye-close"></span></a>
							&nbsp;
							<a href="#remove"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Nuttapon</td>
						<td><a href="mailto:nuttt.p@gmail.com">nuttt.p@gmail.com</a></td>
						<td>14 Dec 13, 15:35</td>
						<td>
							<a href="../edit_profile.php"><span class="glyphicon glyphicon-pencil"></span></a>
							&nbsp;
							<a href="../member_profile.php"><span class="glyphicon glyphicon-user"></span></a>
							&nbsp;
							<a href="ban_user.php"><span class="glyphicon glyphicon-eye-close"></span></a>
							&nbsp;
							<a href="#remove"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Nuttapon</td>
						<td><a href="mailto:nuttt.p@gmail.com">nuttt.p@gmail.com</a></td>
						<td>14 Dec 13, 15:35</td>
						<td>
							<a href="../edit_profile.php"><span class="glyphicon glyphicon-pencil"></span></a>
							&nbsp;
							<a href="../member_profile.php"><span class="glyphicon glyphicon-user"></span></a>
							&nbsp;
							<a href="ban_user.php"><span class="glyphicon glyphicon-eye-close"></span></a>
							&nbsp;
							<a href="#remove"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!--context-->
<?php include('footer.php'); ?>