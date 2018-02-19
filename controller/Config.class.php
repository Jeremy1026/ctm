<?php

class Config
{
	const HELP_CONTACT_EMAIL = 'josh@lbry.io';

	//Constant to help with managing strings
	const TWILIO_SID = "twilio_sid";
	const TWILIO_NUMBER = "twilio_number";
	const TWILIO_TOKEN = "twilio_token";
	const DB_HOST = "database_host";
	const DB_USER = "database_user";
	const DB_PASSWORD = "database_password";
	const DB_NAME = "database_name";

	protected static $loaded = false;
	protected static $data = [];

	public static function get($name, $default = null) {
		static::load();
		return array_key_exists($name, static::$data) ? static::$data[$name] : $default;
	}


	protected static function load() {
		if (!static::$loaded) {
			$dataFile = ROOT_DIR.'/data/config.php';
			if (!is_readable($dataFile)) {
				throw new RuntimeException('config file is missing or not readable');
			}
			static::$data = require $dataFile;
			static::$loaded = true;
		}
	}
}
