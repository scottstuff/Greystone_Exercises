<?php

/**
*
* MVC_DB
*
* Set Database connection once
*
*/
	abstract class MVC_DB extends MVC_Object
	{
		protected $dbLink = null;
		protected $connected = false;
		protected $db;
		protected $db_dsn = array ( 'host' => MVC_DSN_HOST,
									'user' => MVC_DSN_USER,
									'pass' => MVC_DSN_PASS,
									'port' => MVC_DSN_PORT,
									'db' => MVC_DSN_DB);
	   	public $app = '__default';
	   	public $bind = '__default';
	   	public $action = '__default';
	   	public $view_display = '__default';

      public function __construct()
      {
          parent::__construct();
		if (!$this->connected) {
			if (isset($dsn['host'])) {
				$host = $dsn['host'];
			} else {
				$host = '127.0.0.1';
			}
		
			if (isset($dsn['user'])) {
				$user = $dsn['user'];
			} else {
				$user = 'root';
			}
		
			if (isset($dsn['pass'])) {
				$pass = $dsn['pass'];
			} else {
				$pass = '';
			}
		
			if (isset($dsn['port'])) {
				$host .= ':' . $dsn['port'];
			} else {
				$host .= ':3306';
			}
			$clientFlags = 0;
			$this->dbLink = mysql_connect($host, $user, $pass, true, $clientFlags);
			$db = mysql_select_db(MVC_DSN_DB,$this->dbLink);		
		
			if ( ! $this->dbLink) {
				throw new Exception('Could not connect to MySQL server: ' . mysql_error() . ' | Using ' . print_r($dsn, true));
			} else {
				$this->connected = true;
			}
		}
		$this->db = $this->dbLink;
	}

	static public function query_it($szQuery)
	{
		return mysql_query($szQuery);
	}

	public function fetch_next($pQuery)
	{
		return mysql_fetch_array($pQuery);
	}

	public function setFld($var,$val) {
		$this->$var = $val; 
	}
	public function getFld($var) {
		return $this->data[$var]; 
	}

 	public function __destruct()
	{
		if ($this->connected) {
			unset($this->db);
		}
		parent::__destruct();
	}

}
?>
