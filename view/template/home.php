<?php 
	Response::setMetaTitle('Home');
	Response::setMetaDescription('Simple web application to demonstrate geneal ability and Twilio API knowledge');
	include(ROOT_DIR."/view/_header.php");
?>

<div id="content">
	<div class="instructions">
		Fill in the form below to recieve a text message!
	</div>
	<div class="form">
		<form id="textForm">
			<div class="inputWrap">
				<div class="name">
					<label for="name">Name</label>
					<input type="text" name="name"/>
				</div>
				<div class="phone">
					<label for="phone">Phone Number</label>
					<input type="text" name="phone"/>
				</div>
				<div class="message">
					<label for="message">Message</label>
					<input type="text" name="message"/>
				</div>
				<div class="submit">
					<input type="submit" name="send" value="Send"/>
				</div>
			</div>
		</form>
	</div>
</div>
