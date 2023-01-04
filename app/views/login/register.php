<?php
	defined('MY_CMS') or die('Permission denied');

	function view_register() {
		echo '<h6 class="text-center">'.REGISTER_TITLE.'</h6>';

		echo '<form action="' . INDEX_URL . '?action=register" method="POST">';
			echo '<input type="hidden" name="action" value="register">';
			echo '<div class="form-group mb-3">';
				echo '<label for="username">'.REGISTER_USERNAME.'</label>';
				echo '<input type="text" class="form-control" id="username" name="username" placeholder="'.REGISTER_USERNAME.'">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="fullname">'.REGISTER_FULLNAME.'</label>';
				echo '<input type="text" class="form-control" id="fullname" name="fullname" placeholder="'.REGISTER_FULLNAME.'">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="dob">'.REGISTER_DOB.'</label>';
				echo '<input type="date" class="form-control" id="dob" name="dob" placeholder="'.REGISTER_DOB.'">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="mail">'.REGISTER_MAIL.'</label>';
				echo '<input type="text" class="form-control" id="mail" name="mail" placeholder="'.REGISTER_MAIL.'">';
			echo '</div>';
			echo '<div class="form-group mb-3">';
				echo '<label for="password">'.REGISTER_PASSWORD.'</label>';
				echo '<input type="password" class="form-control" id="password" name="password" placeholder="'.REGISTER_PASSWORD.'">';
			echo '</div>';
			echo '<div class="form-group  mb-3">';
				echo '<label for="reapeatpassword">'.REGISTER_PASSWORD_CONFIRM.'</label>';
				echo '<input type="password" class="form-control" id="reapeatpassword" name="reapeatpassword" placeholder="'.REGISTER_PASSWORD_CONFIRM.'">';
			echo '</div>';
			echo '<div class="text-center mt-3">';
				echo '<button type="submit" class="btn btn-outline-dark" name="register">'.REGISTER_BUTTON.'</button>';
			echo '</div>';
		echo '</form>';
	}