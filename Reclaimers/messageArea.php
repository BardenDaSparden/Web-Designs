<link rel="stylesheet" type="text/css" href="../styles/messageArea.css">
<?php
	if(Session::exists('message')){
		
		$types = array(
			'message-type-0',
			'message-type-1',
			'message-type-2'
		);

		$data = json_decode(Session::flash('message'), true);
		$message = $data['message'];
		$message_type = intval($data['message_type']);


		echo '
		<div id="message-area-wrapper">
			<div id="message-area">
				<div class="message '.$types[$message_type].'">
					<p>
						'.$message.'
					</p>
				</div>
			</div>
		</div>
		';
	}
?>