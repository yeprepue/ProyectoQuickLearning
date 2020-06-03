


	<label for="id_titulo">Titulos registrados</label>
	<select name="id_titulo" id="id_titulo" class="form-control" required>
		<?php foreach ($titulos as $value) { ?>
	        <option value="<?php echo $value['id_titulo']; ?>"><?php echo $value['titulo']; ?></option>
        <?php } ?>
	</select>


