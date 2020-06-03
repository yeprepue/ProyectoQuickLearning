
<?php foreach ($referidos as  $value) {?>
	
	<tr>
		<td><?php echo $value['estudiante']; ?></td>
		<td><?php echo $value['nameCompleto']; ?></td>
		<td><?php echo $value['Document']; ?></td>
		<td><?php echo $value['numeroDocumento']; ?></td>
		<td><?php echo $value['email']; ?></td>
		<td><?php echo $value['phone']; ?></td>
	</tr>
<?php } ?>