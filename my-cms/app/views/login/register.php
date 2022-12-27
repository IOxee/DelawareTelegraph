<?php
	defined('MY_CMS') or die('Permission denied');

	function view_register() {
		echo '<h6 class="text-center">Registrar-se</h6>';
		?>
		<form action="<?php echo INDEX_URL . '?action=register' ?>" method="POST">
			<div class="input-group mb-3">
				<span class="input-group-text" id="useradddon"><i class="fa-regular fa-user"></i></span>
				<input type="text" class="form-control text-center" id="username" name="username" placeholder="Nickname" required>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text" id="fullnameaddon"><i class="fa-regular fa-clipboard"></i></span>
				<input type="text" class="form-control text-center" id="fullname" name="fullname" placeholder="Nom complet" required>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text" id="ageaddon"><i class="fa-regular fa-hourglass-half"></i></span>
				<input type="date" class="form-control text-center" id="dob" name="dob" placeholder="Edat" required>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text" id="emailaddon"><i class="fa-regular fa-envelope"></i></span>
				<input type="email" class="form-control text-center" id="mail" name="mail" placeholder="info@dailytelegraph.uk" required>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text" id="passwordaddon"><i class="fa-solid fa-lock"></i></span>
				<input type="password" class="form-control text-center" id="password" name="password" placeholder="Contrasenya" required>
			</div>

			<div class="input-group mb-3">
				<span class="input-group-text" id="reapeatpasswordaddon"><i class="fa-solid fa-lock"></i></span>
				<input type="password" class="form-control text-center" id="reapeatpassword" name="reapeatpassword" placeholder="Repeteix la contrasenya" required>
			</div>

			<button type="submit" name="register" class="btn btn-outline-dark w-100 p-1">Registrar-se</button>
		</form>
		<?php
	}