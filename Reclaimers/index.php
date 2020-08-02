<?php
	include 'includes/core/Init.php';
	Navigation::setActivePage(Config::get("config.navigation.home"));
?>


<!DOCTYPE html>

<html>
	<head>
		<title>
			Welcome, Reclaimer
		</title>
		<link rel="stylesheet" type="text/css" href="styles/index.css">
	</head>
	<body>
		<div id="wrapper">
			<?php
				include 'header.php';
			?>
			<div id="content-wrapper">
				<div id="content">
					<div id="content-left">
						<div id="news-panel-wrapper">
							<div class="content-header-wrapper">
								<div class="content-header">
									<p>
										News / Events
									</p>
								</div>
							</div>
							<div class="content-container-left base-container">
								<ul id="news-list">
									<li class="news-list-item">
										<div class="news-item-wrapper">
											<div class="news-item-title">
												<span class="news-item-type clan-meeting-type">@newsItemType</span>
												<p>
													@newsItemTitle
												</p>
											</div>
											<div class="news-body-wrapper">
												<div class="news-item-user-info">
													<div class="member-avatar">
														
													</div>
													<p class="news-item-user-info-author">Posted by: <a class="news-item-user-info-author-name" href="#">@name</a><br/>@date</p>
												</div>
												<div class="news-item-content">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</p>
												</div>
											</div>
										</div>
									</li>
									<li class="news-list-item">
										<div class="news-item-wrapper">
											<div class="news-item-title">
												<span class="news-item-type clan-battle-type">@newsItemType</span>
												<p>
													@newsItemTitle
												</p>
											</div>
											<div class="news-body-wrapper">
												<div class="news-item-user-info">
													<div class="member-avatar">
														
													</div>
													<p class="news-item-user-info-author">Posted by: <a class="news-item-user-info-author-name" href="#">@name</a><br/>@date</p>
												</div>
												<div class="news-item-content">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</p>
												</div>
											</div>
										</div>
									</li>
									<li class="news-list-item">
										<div class="news-item-wrapper">
											<div class="news-item-title">
												<span class="news-item-type clan-news-type">@newsItemType</span>
												<p>
													@newsItemTitle
												</p>
											</div>
											<div class="news-body-wrapper">
												<div class="news-item-user-info">
													<div class="member-avatar">
														
													</div>
													<p class="news-item-user-info-author">Posted by: <a class="news-item-user-info-author-name" href="#">@name</a><br/>@date</p>
												</div>
												<div class="news-item-content">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
													</p>
												</div>
											</div>
										</div>
									</li>
								</ul>
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