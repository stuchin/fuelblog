<h2>Listing Users</h2>
<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Status</th>
			<th>Level</th>
			<th>Created</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->password; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->status; ?></td>
			<td><?php echo $user->level; ?></td>
			<td><?php echo date('Y-m-d',$user->level); ?></td>
			<td>
				<?php echo Html::anchor('user/view/'.$user->id, 'View'); ?> |
				<?php echo Html::anchor('user/edit/'.$user->id, 'Edit'); ?> |
				<?php echo Html::anchor('user/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
<p>
	<?php echo $pagination; ?>
</p>
