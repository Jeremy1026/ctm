<?php

class SMSActions {

	private static $sid;
	private static $token;
	private static $phoneNumber;
	private static $client;

	public static function executeSend() {
		static::setProperties();
		static::sendMessage($_POST['phone'], $_POST['message']);
	}

	private static function setProperties() {
		static::$sid = Config::get(Config::TWILIO_SID);
		static::$token = Config::get(Config::TWILIO_TOKEN);
		static::$phoneNumber = Config::get(Config::TWILIO_NUMBER);
		static::$client = new Twilio\Rest\Client(static::$sid, static::$token);
	}

	private static function sendMessage($to, $message) {
		static::$client->messages->create(
		    $to,
		    array(
		        'from' => static::$phoneNumber,
		        'body' => $message
		    )
		);

	}

}