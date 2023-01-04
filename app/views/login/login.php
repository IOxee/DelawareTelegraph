<?php
	defined('MY_CMS') or die('Permission denied');
    require CTL_LOGIN;

	function view_login() {
		echo '<h6 class="text-center">'.LOGIN_TITLE.'</h6>'
		?>
		<form action=<?php echo INDEX_URL . '?action=login' ?> method='POST'>
			<div class='mb-3 my-2'>
				<input type='text' class='form-control text-center' id='username' name='username' placeholder='<?php echo LOGIN_USERNAME ?>'>
			</div>
			<div class='mb-3'>
				<input type='password' class='form-control text-center' id='password' name='password' placeholder='<?php echo LOGIN_PASSWORD ?>'>
			</div>
			<button type='submit' name='login' class='btn btn-outline-dark w-100 p-1'><?php echo LOGIN_BUTTON ?></button>
		</form>
		<?php
	}