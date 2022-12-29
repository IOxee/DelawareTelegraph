<?php
	defined('MY_CMS') or die('Permission denied');

	function view_register() {
		echo '<h6 class="text-center">Registrar-se</h6>';
		
		echo '<form action="' . INDEX_URL . '?action=register" method="POST">';
			echo '<input type="hidden" name="action" value="register">';
			echo '<div class="form-group mb-3">';
				echo '<label for="username">Nombre de usuario</label>';
				echo '<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="fullname">Nombre completo</label>';
				echo '<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre completo">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="dob">Fecha de nacimiento</label>';
				echo '<input type="date" class="form-control" id="dob" name="dob" placeholder="Fecha de nacimiento">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="mail">Correo electrónico</label>';
				echo '<input type="text" class="form-control" id="mail" name="mail" placeholder="Correo electrónico">';
			echo '</div>';
			echo '<div class="form-group mb-3">';
				echo '<label for="password">Contraseña</label>';
				echo '<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="reapeatpassword">Repetir contraseña</label>';
				echo '<input type="password" class="form-control" id="reapeatpassword" name="reapeatpassword" placeholder="Repetir contraseña">';
			echo '</div>';
			echo '<div class="text-center mt-3">';
				echo '<button type="submit" class="btn btn-outline-dark" name="register">Registrar-se</button>';
			echo '</div>';
		echo '</form>';
	}