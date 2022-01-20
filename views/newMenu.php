<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>TEST S2NEXT</title>
</head>
<body>
	
	<div class="container my-5">
		<h4>NUEVO MENU</h4>
		<hr>
		<form method="post" action="?action=save" >
			<div class="form-group">
				<label for="menu_padre">MENU PADRE</label>
				<select name="menu_padre" class="form-control" id="menu_padre">
					<option value="0">Seleccione una opción</option>
					<?php
						foreach ($menuPadre as $key => $value) {
					?>
							<option value="<?= $value['id_menu_padre']; ?>"><?= $value['nombre_menu_padre'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="nombre">NOMBRE</label>
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre del menu" required>
				
			</div>
			<div class="form-group">
				<label for="descripcion">DESCRIPCIÓN</label>
				<textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Ingrese descripción del menu" required></textarea>
			</div>
			<a href="?action=list" class="btn btn-warning">CANCELAR</a>
			<button type="submit" class="btn btn-success">GUARDAR</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/app.js"></script>
	
</body>
</html>