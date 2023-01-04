<?php
	defined('MY_CMS') or die('Permission denied');

	function view_userdetails() {
		?>
        <form action='<?PHP echo INDEX_URL . '?action=profile' ?>' method="GET">
            <input type="hidden" name="action" value="profile">
            <button type="submit" class="btn btn-outline-dark w-100 p-1 my-2">
                <i class="fa-solid fa-user mx-2"></i><?php echo USER_DETAILS_TITLE ?>
            </button>
        </form>

		<?php if($_SESSION['level'] >= 5) : ?>
            <form action='<?PHP echo INDEX_URL . '?action=reporter_panel&view' ?>' method="GET">
                <input type="hidden" name="action" value="reporter_panel">
                <input type="hidden" name="view" value="view">
                <button type="submit" class="btn btn-outline-dark w-100 p-1 my-2">
                    <i class="fa-solid fa-pen mx-2"></i><?php echo USER_DETAILS_REPORTS_BUTTON ?>
                </button>
            </form>
		<?php endif; ?>

		<?php if($_SESSION['level'] >= ADMIN_LEVEL) : ?>
            <form action='<?PHP echo INDEX_URL . '?action=apanel&dashboard' ?>' method="GET">
                <input type="hidden" name="action" value="apanel">
                <input type="hidden" name="dashboard" value="dashboard">
                <button type="submit" class="btn btn-outline-dark w-100 p-1 my-2">
                    <i class="fa-solid fa-gear mx-2"></i><?php echo USER_DETAILS_ADMIN_PANEL_BUTTON ?>
                </button>
            </form>
		<?php endif; ?>

        <form action='<?PHP echo INDEX_URL . '?action=logout' ?>' method="GET">
            <input type="hidden" name="action" value="logout">
            <button type="submit" class="btn btn-outline-dark w-100 p-1 my-2">
                <i class="fa-solid fa-right-to-bracket"></i><?php echo USER_DETAILS_LOGOUT ?>
            </button>
        </form>

		<?php
	}