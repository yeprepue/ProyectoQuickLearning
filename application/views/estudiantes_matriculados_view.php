<?php foreach ($matriculados as  $value) { ?>
	<tr>
		<td><?php echo $value['estudiante'] ?></td>
		<td>
			<input type="radio" name="nameEstudianteMatriculado" id="nameEstudianteMatriculado" value="<?php echo $value['estudiante'] ?>">
		</td>
	</tr>
<?php } ?>