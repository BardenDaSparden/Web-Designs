<?php
	require_once 'includes/core/Init.php';
	require_once 'includes/classes/Config.php';
	require_once 'includes/classes/Navigation.php';
	
	Navigation::setActivePage(Config::get("config.navigation.home"));
?>


<!DOCTYPE html>

<html>
	<head>
		<title>
			Template Page
		</title>
		<link rel="stylesheet" type="text/css" href="styles/template.css">
	</head>
	<body>
		<div id="wrapper">
			<?php
				include_once 'includes/userPanel.php';
				include_once 'includes/messageArea.php';
				include_once 'includes/header.php';
			?>
			<div id="content-wrapper">
				<div id="content">
					<div id="content-left">
						<div id="template-content-wrapper">
							<div class="content-header">
								<p>
									Template Content Header
								</p>
							</div>
							<div class="content-container-left base-container" id="template-wrapper">
							
							</div>
						</div>
					</div>
					<?php
						include_once 'includes/contentRight.php';
					?>
				</div>	
			</div>
			<?php
				include_once 'includes/footer.php';
			?>
		</div>
	</body>
</html>