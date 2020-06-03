<?php 
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=reports.xls');

?>


<table style="border:  1px solid black">
	<thead>
	<tr style="border:  1px solid black">	
		<th>firstname</th>
		<th>lastname</th>
		<th>Email</th>
		<th>Role</th>
		<?php if ($option == 2){  ?>			
			<th>Status</th>
		<?php }elseif ($option==4) {?>
			<th>frozen students</th>
		<?php } ?>
	</tr>
	</thead>

	<tbody >
		<?php  foreach ($registros as $value) { ?>

			<tr style="border:  1px solid black">
				<td><?php echo $value['firstname']; ?></td>
				<td><?php echo $value['lastname']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['rol']; ?></td>
				<?php if ($option == 2){  ?>			
					<td>Active</td>
				<?php }elseif ($option == 4) {?>
					<td>Requested</td>
				<?php } ?>
			</tr>

		<?php } ?>
		
	</tbody>
	

</table>