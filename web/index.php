<?php

include '../data/config.php';
include __DIR__ . '/../bootstrap.php';

require '../vendor/autoload.php';

use Pux\Executor;

define('IS_PRODUCTION', $config['isProd']);
define('ROOT_DIR', __DIR__);

ini_set('display_errors', IS_PRODUCTION ? 'off' : 'on');
ini_set('error_log', ROOT_DIR.'error_log');

error_reporting(IS_PRODUCTION ? 0 : (E_ALL | E_STRICT));

if (!IS_PRODUCTION)
{
  // make warnings into errors
  set_error_handler(function ($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
  }, E_WARNING|E_CORE_WARNING|E_COMPILE_WARNING|E_USER_WARNING);
}

$router = new Pux\Mux;
$router->any('/', ['HomeActions','executeHome']);
$router->post('/sendSMS', ['SMSActions','executeSend']);
$router->post('/receiveSMS', ['SMSActions','executeReceive']);

$router->any('/404', ['HomeActions','executePageNotFound']);

$router->sort();
$route = $router->dispatch( $_SERVER['REQUEST_URI'] );
if ($route) {
	Executor::execute($route);
}
else {
	header("Location: /404");
}