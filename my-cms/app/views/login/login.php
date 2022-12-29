<?php
	defined('MY_CMS') or die('Permission denied');

	function view_login() {
		require CTL_LOGIN;
		echo '<h6 class="text-center">Iniciar Sessió</h6>'
		?>
		<form action=<?php echo INDEX_URL . '?action=login' ?> method='POST'>
			<div class='mb-3 my-2'>
				<input type='text' class='form-control text-center' id='username' name='username' placeholder='Nom de Usuari'>
			</div>
			<div class='mb-3'>
				<input type='password' class='form-control text-center' id='password' name='password' placeholder='Contrasenya'>
			</div>
			<button type='submit' name='login' class='btn btn-outline-dark w-100 p-1'>Iniciar Sessió</button>
		</form>
		<?php
	}