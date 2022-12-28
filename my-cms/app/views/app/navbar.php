<?php
	defined('MY_CMS') or die('Permission denied');

	function navbar() {
		?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src=<?php echo LOGO ?> alt="Logo de la empresa">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li>
							<a class="btn btn-outline-dark my-3" href="<?php echo INDEX_URL ?>?action=posts">Posts</a>
						</li>
					</ul>
        		</div>
				<div class="float-right">
					<ul class="navbar-nav">
						<li class="nav-item dropdown dropstart">
							<?php
								if (!isset($_SESSION['username'])) {
									echo '<a class="btn btn-outline-dark mx-2 my-3 dropdown-toggle" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user-lock"></i></a>';
								} else {
									if (isset($_SESSION['avatar']) && $_SESSION['avatar'] != '') {
										echo '<img src=' . $_SESSION['avatar'] . ' width="64" height="64" class="mx-2 dropdown-toggle rounded" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false"></img>';
									} else {
										echo '<img src=' . DEFAULT_USER . ' width="64" height="64" class="mx-2 dropdown-toggle rounded" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false"></img>';
									}
								}
							?>
							<ul class="dropdown-menu w-100 p-3 border border-dark" aria-labelledby="navbarDropdownMenu">
								<?php
									if (!isset($_SESSION['username'])) {
										require LOGIN_VIEW;
										echo view_login();
									} else {
										require USERDETAILS_VIEW;
										echo view_userdetails();
									}
								?>
							</ul>
						</li>


						<li class="nav-item dropdown dropstart">
							<?php
								if (!isset($_SESSION['username'])) {
									echo '<div class="mx-2"></div>';
									echo '<a class="btn btn-outline-dark mx-2 my-3 dropdown-toggle" id="navbarRegisterDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-file-pen"></i></a>';
								}
							?>
							<ul class="dropdown-menu p-3 border border-dark" style="width:500px" aria-labelledby="navbarRegisterDrop">
								<?php
									if (!isset($_SESSION['username'])) {
										require REGISTER_VIEW;
										echo view_register();
									}
								?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<?php
	}

/*
<div class="float-right" style="font-size: 0.5em">



						<?php if (date('Y') == 2022) { ?>
							<p class="text-muted">© 2022 - <?php echo PROJECT_AUTHOR ?></p>
						<?php } else { ?>
							<p class="text-muted">© 2022 - <?php echo  date('Y') . PROJECT_AUTHOR ?></p>
						<?php } ?>
					</div>
*/