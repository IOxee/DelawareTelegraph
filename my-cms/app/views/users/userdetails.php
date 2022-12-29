<?php
	defined('MY_CMS') or die('Permission denied');

	function view_userdetails() {
		?>
		<a class="btn btn-outline-dark w-100 p-1 my-2" href='<?PHP echo INDEX_URL . '?action=profile' ?>' >
			<i class="fa-solid fa-user mx-2"></i>Perfil
		</a>

		<?php if($_SESSION['level'] >= 5) : ?>
			<a class="btn btn-outline-dark w-100 p-1 my-2" id="reporterOpen" href='<?php echo INDEX_URL . '?action=reporter_panel&view'?>'>
				<i class="fa-solid fa-pen mx-2"></i>Tauler del reporter
			</a>
		<?php endif; ?>

		<?php if($_SESSION['level'] >= ADMIN_LEVEL) : ?>
			<a class="btn btn-outline-dark w-100 p-1 my-2" id="adminOpen" href='<?php echo INDEX_URL . '?action=apanel&dashboard' ?>'>
				<i class="fa-solid fa-gear mx-2"></i>Tauler d'administració
			</a>
		<?php endif; ?>

		<a class="btn btn-outline-dark w-100 p-1 my-2" href=<?php echo INDEX_URL . '?action=logout' ?>>
			<i class="fa-solid fa-right-to-bracket"></i> Sortir
		</a>

		<?php
	}