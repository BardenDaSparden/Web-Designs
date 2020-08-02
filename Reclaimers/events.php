<?php
	include 'includes/core/Init.php';
	
	Navigation::setActivePage(Config::get("config.navigation.events"));
?>


<!DOCTYPE html>

<html>
	<head>
		<title>
			Events
		</title>
		<link rel="stylesheet" type="text/css" href="styles/events.css">
	</head>
	<body>
		<div id="wrapper">
			<?php
				include 'header.php';
			?>
			<div id="content-wrapper">
				<div id="content">
					<div id="content-left">
						<div id="template-content-wrapper">
							<div class="content-header">
								<p>
									Events
								</p>
							</div>
							<div class="content-container-left base-container" id="template-wrapper">
							
							</div>
						</div>
					</div>
					<?php
						include_once 'contentRight.php';
					?>
				</div>	
			</div>
			<?php
				include_once 'footer.php';
			?>
		</div>
	</body>
</html>