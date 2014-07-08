<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('SRC_PATH', ROOT_PATH . DS . 'src');
define('PUBLIC_PATH', SRC_PATH . DS . 'public');
define('APP_PATH', SRC_PATH . DS . 'application');
define('VENDOR_PATH', ROOT_PATH . DS . 'vendor');
define('LIB_PATH', ROOT_PATH . DS . 'library');

define('APP_ENV', getenv('APPLICATION_ENV'));

require_once VENDOR_PATH . DS . 'autoload.php';

if ('development' === APP_ENV) {
	\php_error\reportErrors();
} else {
	set_exception_handler(array('\Iplib\Error', 'handleException'));
	set_error_handler(array('\Iplib\Error', 'handleError'));
}

//$autoloader = Zend_Loader_Autoloader::getInstance();


$application = new Zend_Application(
		APP_ENV, 
		APP_PATH . DS . 'Core' . DS . 'configs' . DS . 'application.ini'
);

$application->bootstrap();
$application->run();