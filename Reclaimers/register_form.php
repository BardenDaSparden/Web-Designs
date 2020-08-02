<?php

	$message = "Join and become a Reclaimer";

	if(Input::exists()){
		if(Input::get('register_submit')){
			$database = Database::instance();

			//Do Form Processing Here
			$email = Validation::clean(Input::get('email'));
			$email_c = Validation::clean(Input::get('email_confirm'));
			$username = Validation::clean(Input::get('username'));
			$password = Validation::clean(Input::get('password'));
			$password_c = Validation::clean(Input::get('password_confirm'));
			$gamertag = Validation::clean(Input::get('gamertag'));
			$recruiter_tag = Validation::clean(Input::get('recruiter'));

			$salt = Hash::salt(32);
			$passHash = Hash::make($password, $salt);

			$database->get('users', array('username', '=', $recruiter_tag));
			$id = $database->first()->id;

			$date = date("Y-m-d H:i:s");
			
			$database->insert('users', array(
				'email'	=> $email,
				'username'		=> $username,
				'password'		=> $passHash,
				'salt'			=> $salt,
				'gamertag'		=> $gamertag,
				'recruiter_id' 	=> $id,
				'joined' 		=> $date,
				'group_id'		=> 1,
				'branch_id'		=> 0,
				'approved'		=> 0
			));

			$message = '{
				"message":"Thank you for submitting your application to Reclaimers. Your application will be reviewed by a recruiter and you will be sent an email once you\'ve been approved",
				"message_type" : 0
			}';

			Session::flash('message', $message);
			Redirect::to('index.php');
		}
	}

	echo 
	'
	<div class="form-message-wrapper">
		<div class="form-message message-type-default">
			<p>
				'.$message.'
			</p>
		</div>
	</div>
	';

?>
<script type="text/javascript" src="scripts/jQuery.js"></script>

<link rel="stylesheet" type="text/css" href="../styles/register_form.css">
<div id="form-wrapper">
	<form action="" method="POST">
		<div id="form-container">
			<div class="horizontal-seperator"></div>
			<ul id="form-list">
				<li class="form-list-item">
					<p class="form-list-item-label">Email</p>
					<input id="input-email" class="form-list-item-input" type="text" name="email" maxlength=40 />
					<p id="form-message-email" class="form-list-item-message"></p>
				</li>
				<li class="form-list-item">
					<p class="form-list-item-label">Confirm Email</p>
					<input id="input-email-confirm" class="form-list-item-input" type="text" name="email_confirm" maxlength=40 />
				</li>
				<div class="horizontal-seperator"></div>
				<li class="form-list-item">
					<p class="form-list-item-label">Username</p>
					<input id="input-username" class="form-list-item-input" type="text" name="username" maxlength=16 />
					<p id="form-message-username" class="form-list-item-message"></p>
				</li>
				<li class="form-list-item">
					<p class="form-list-item-label">Password</p>
					<input id="input-password" class="form-list-item-input" type="password" name="password" maxlength=16 />
					<p id="form-message-password" class="form-list-item-message"></p>
				</li>
				<li class="form-list-item">
					<p class="form-list-item-label">Confirm Password</p>
					<input id="input-password-confirm" class="form-list-item-input" type="password" name="password_confirm" maxlength=16 />
					<p class="form-list-item-message"></p>
				</li>
				<div class="horizontal-seperator"></div>
				<li class="form-list-item">
					<p class="form-list-item-label">Your Gamertag</p>
					<input id="input-gamertag" class="form-list-item-input" type="text" name="gamertag" maxlength=16 />
					<p id="form-message-gamertag" class="form-list-item-message"></p>
				</li>
				<li class="form-list-item">
					<p class="form-list-item-label">Recruiter Gamertag</p>
					<input id="input-recruiter-gamertag" class="form-list-item-input" type="text" name="recruiter" maxlength=16 />
					<p id="form-message-recruiter-gamertag" class="form-list-item-message"></p>
				</li>
				<div class="horizontal-seperator"></div>
				<li class="form-list-item">
					<div id="submit-button-wrapper">
						<input id="form-submit" type="submit" name="register_submit" value="Register" disabled/>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script type="text/javascript" src="scripts/formValidation.js"></script>
<script type="text/javascript" src="scripts/formAJAX.js"></script>