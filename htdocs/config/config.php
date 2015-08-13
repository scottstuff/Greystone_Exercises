<?php

  /**
  * config.php
  *
  * Set "Global" Constants
  *
  */

	// Application Base Path
	define('MVC_BASE_PATH',str_replace('/config','',dirname(__FILE__)));

	// MySQL DSN
	define('MVC_DSN_HOST', 'localhost');
	define('MVC_DSN_USER', 'root');
	define('MVC_DSN_PASS', '');
	define('MVC_DSN_PORT', '3306');
	define('MVC_DSN_DB', 'greystone');

	// Smarty location
//	define('SMARTY_DIR',MVC_BASE_PATH.'/includes/Smarty/');
	// Default Template
//	define('MVC_TEMPLATE','__default');
	

?>
