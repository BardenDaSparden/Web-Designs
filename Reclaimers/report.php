<?php
	include 'includes/core/Init.php';
?>


<!DOCTYPE html>

<html>
	<head>
		<title>
			Report a Bug
		</title>
		<link rel="stylesheet" type="text/css" href="styles/report.css">
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
									Report a Bug
								</p>
							</div>
							<div class="content-container-left base-container" id="template-wrapper">
							
							</div>
						</div>
					</div>
					<?php
						include 'contentRight.php';
					?>
				</div>	
			</div>
			<?php
				include 'footer.php';
			?>
		</div>
	</body>
</html>