<?php

if(Input::exists()){
	if(Input::get('register_redirect')){
		Redirect::to('register.php');
	} else if(Input::get('login_submit')){

		$validate = new Validate();

		$validate->check($_POST, array(
			'login_username' => array(
				'min' => 5,
				'max' => 16,
				'required' => true
			),

			'login_password' => array(
				'min' => 6,
				'max' => 17,
				'required' => true
			)
		));

		if($validate->passed()){
			
			$username = Validation::clean(Input::get('login_username'));
			$password = Validation::clean(Input::get('login_password'));

			$user = new User();
			$login = $user->login($username, $password, true);

			if($login){
				Redirect::to('index.php');
			} else {
				
			}


		} else {
			foreach($validate->getErrors() as $error){
				echo $error.'<br/>';
			}
		}
	}
}

?>

<link rel="stylesheet" type="text/css" href="../styles/login_form.css">
<div id="user-panel-wrapper">
	<div id="user-panel">
		<div class="base-container" id="login-panel">
			<form action="" method="POST">
				<div class="form-column">
					<div class="form-column-label">
						<p>
							Username:
						</p>
					</div>
					<input class="form-text-input" type="text" maxlength=16 id="login_username" name="login_username" autocomplete="off"/>
				</div>
				<div class="vertical-seperator"></div>
				<div class="form-column">
					<div class="form-column-label">
						<p>
							Password:
						</p>
					</div>
					<input class="form-text-input" type="password" maxlength=16 id="login_password" name="login_password" autocomplete="off"/>
				</div>
				<div class="vertical-seperator"></div>
				<div class="form-column">
					<input class="form-button" type="submit" id="login_submit" name="login_submit" value="Login"/>
				</div>
				<div class="vertical-seperator"></div>
				<div class="form-column">
					<input class="form-button" type="submit" id="register_redirect" name="register_redirect" value="Register"/>
				</div>
			</form>
		</div>
	</div>
</div>