<?php
	include 'includes/core/Init.php';
	Navigation::setActivePage(Config::get("config.navigation.challenges"));
?>


<!DOCTYPE html>

<html>
	<head>
		<title>
			Challenges
		</title>
		<link rel="stylesheet" type="text/css" href="styles/challenges.css">
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
									Challenges
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