<?php

class HomeActions {

	public static function executeHome($id = null) {

		return Helpers::render('home');
	}

	public static function executePageNotFound() {
		echo "PAGE NOT FOUND";
		
	}

}