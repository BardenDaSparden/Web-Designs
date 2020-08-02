<?php
	include 'includes/core/Init.php';
?>


<!DOCTYPE html>

<html>
	<head>
		<title>
			Register
		</title>
		<link rel="stylesheet" type="text/css" href="styles/register.css">
	</head>
	<body>
		<div id="wrapper">
			<?php
				include 'header.php';
			?>
			<div id="content-wrapper">
				<div id="content">
					<div id="register-content-wrapper">
						<div class="content-header">
							<p>
								Register to become a Recalimer
							</p>
						</div>
						<div class="content-container base-container" id="template-wrapper">
							<?php
								include 'register_form.php';
							?>
						</div>
					</div>
				</div>	
			</div>
			<?php
				include 'footer.php';
			?>
		</div>
	</body>
</html>