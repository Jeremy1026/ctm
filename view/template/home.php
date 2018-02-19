<?php 
	Response::setMetaTitle('Home');
	Response::setMetaDescription('Simple web application to demonstrate geneal ability and Twilio API knowledge');
	include(ROOT_DIR."/view/_header.php");
?>

<div id="content">
	<div class="instructions animated fadeIn">
		Fill in the form below to recieve a text message!
	</div>
	<div class="errorMessage"></div>
	<div class="form">
		<form id="textForm" action="/sendSMS">
			<div class="inputWrap">
				<div class="name animated slideInRight animated-delayed-1">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="John Doe" />
				</div>
				<div class="phone animated slideInRight animated-delayed-2">
					<label for="phone">Phone Number</label>
					<input type="text" name="phone" id="phone" placeholder="555-555-5555"/>
				</div>
				<div class="message animated slideInRight animated-delayed-3">
					<label for="message">Message</label>
					<input type="text" id="message" name="message"/>
				</div>
				<div class="submit animated slideInRight animated-delayed-4">
					<input type="submit" name="send" value="Send"/>
				</div>
			</div>
		</form>
	</div>
</div>
