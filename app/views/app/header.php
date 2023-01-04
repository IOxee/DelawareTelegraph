<?php
	defined('MY_CMS') or die('Permission denied');

	function view_header_without_login() {
		?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo BACKGROUND_CMS ?>" alt="Logo">
                        </div>
                    </div>
                </div>
            </div>
		<?php
	}
