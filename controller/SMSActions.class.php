<?php

class SMSActions {

	private static $sid;
	private static $token;
	private static $phoneNumber;
	private static $client;

	public static function executeSend() {
		static::setProperties();
		static::sendMessage($_POST['phone'], $_POST['message'], $_POST['name']);
	}

	public static function executeReceive() {
		static::saveMessage(false, $_REQUEST['From'], $_REQUEST['Body'], null);
	}

	private static function setProperties() {
		static::$sid = Config::get(Config::TWILIO_SID);
		static::$token = Config::get(Config::TWILIO_TOKEN);
		static::$phoneNumber = Config::get(Config::TWILIO_NUMBER);
		static::$client = new Twilio\Rest\Client(static::$sid, static::$token);
	}

	private static function sendMessage($to, $message, $name) {
		static::$client->messages->create(
		    $to,
		    array(
		        'from' => static::$phoneNumber,
		        'body' => $message
		    )
		);

		static::saveMessage(true, null, $to, $message, $name);
	}

	public static function saveMessage($isSent, $to = null, $from = null, $message = null, $name = null) {
		$db = new Database();

		$isSending = ($isSent) ? 1 : 0;
		if ($to !== null) {
			$number = $to;
		}
		elseif ($from !== null) {
			$number = $from;
		}
		else {
			throw new Exception("To or From must be set to save the message.", 1);
		}

		$insert = $db->query("INSERT INTO messages(`isSent`, `number`, `message`, `sender_name`) 
									VALUES (:isSending, :number, :message, :name)", array("isSending" =>$isSending, 
																						  "number"	  =>$number, 
																						  "message"	  =>$message,
																						  "name"	  =>$name));
	}
}