<link rel="stylesheet" type="text/css" href="../styles/user_panel.css">
<div id="user-panel-wrapper">
	<div id="user-panel">
		<div id="panel">
			<ul id="user-panel-list">
				<li class="user-panel-list-item">
					<p id="user-panel-username">
						<?php
							$user = new User();
							echo $user->getData()->username;
						?>
					</p>
				</li>
				<div class="seperator"></div>
				<li class="user-panel-list-item">
					<a href="#">
						Actions
					</a>
				</li>
				<div class="seperator"></div>
				<li class="user-panel-list-item">
					<a href="#">
						Edit Profile
					</a>
				</li>
				<div class="seperator"></div>
				<li class="user-panel-list-item">
					<a href="#">
						Messages
					</a>
				</li>
				<div class="seperator"></div>
				<li class="user-panel-list-item">
					<a href="logout.php">
						Logout
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>