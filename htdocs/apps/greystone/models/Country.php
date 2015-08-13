<?php

class Country extends MVC_App {
	
	protected $countrycodes_id;
	protected $code;
	protected $country;
	
	public $view = 'CountryView';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function __defaultAction()
	{
	
		return __construct();
	}

	public static function get_all_countries()
	{
		return MVC_DB::query_it('SELECT * from countrycodes;');
	}

	public static function getDb() {
		if (is_null(Countrycodes::$db)) {
			Countrycodes::$db = CoughDatabaseFactory::getDatabase(Countrycodes::$dbName);
		}
		return Countrycodes::$db;
	}
	
	public static function getDbName() {
		return CoughDatabaseFactory::getDatabaseName(Countrycodes::$dbName);
	}
	
	public static function getTableName() {
		return Countrycodes::$tableName;
	}
		
	public function getCountrycodesId() {
		return $this->getField('countrycodes_id');
	}
	
	public function setCountrycodesId($value) {
		$this->setField('countrycodes_id', $value);
	}
	
	public function getCode() {
		return $this->getField('code');
	}
	
	public function setCode($value) {
		$this->setField('code', $value);
	}
	
	public function getCountry() {
		return $this->getField('country');
	}
	
	public function setCountry($value) {
		$this->setField('country', $value);
	}
	
	public function __destruct()
	{
		parent::__destruct();
		unset($this);
	}

}

?>
