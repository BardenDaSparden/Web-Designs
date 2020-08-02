<?php
	$activeClass = 'id="header-navbar-item-active"';
?>

<?php
	
	$user = new User();
	if($user->isLoggedIn()){
		include 'user_panel.php';
	} else {
		include 'login_form.php';
	}

	if(Navigation::isActive(Config::get('config.navigation.home'))){
		include 'messageArea.php';
	}
?>
<link rel="stylesheet" type="text/css" href="../styles/header.css">
<div id="header-wrapper">	
	<div id="header">	
		<div id="header-logo-container">
			<a href="index.php">
				<img src="images/reclaimersLogo.png"/>
			</a>
		</div>
		<div id="header-navbar-container">
			<ul class="base-container"  id="header-navbar">
				<li class="header-navbar-item" <?php if(Navigation::isActive(Config::get('config.navigation.home'))){ echo $activeClass;} ?>>
					<a href="index.php">
						Home
					</a>
				</li>
				<div class="seperator"></div>
				<li class="header-navbar-item" <?php if(Navigation::isActive(Config::get('config.navigation.members'))){ echo $activeClass;} ?>>
					<a href="members.php">
						Members
					</a>
				</li>
				<div class="seperator"></div>
				<li class="header-navbar-item" <?php if(Navigation::isActive(Config::get('config.navigation.events'))){ echo $activeClass;} ?>>
					<a href="events.php">
						Events
					</a>
				</li>
				<div class="seperator"></div>
				<li class="header-navbar-item" <?php if(Navigation::isActive(Config::get('config.navigation.branches'))){ echo $activeClass;} ?>>
					<a href="branches.php">
						Branches
					</a>
				</li>
			</ul>
		</div>
	</div>	
</div>