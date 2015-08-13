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

	public function __default()
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
	
	public static function getPkFieldNames() {
		return Countrycodes::$pkFieldNames;
	}
	
	// Static Construction (factory) Methods
	
	/**
	 * Constructs a new Countrycodes object from
	 * a single id (for single key PKs) or a hash of [field_name] => [field_value].
	 * 
	 * The key is used to pull data from the database, and, if no data is found,
	 * null is returned. You can use this function with any unique keys or the
	 * primary key as long as a hash is used. If the primary key is a single
	 * field, you may pass its value in directly without using a hash.
	 * 
	 * @param mixed $idOrHash - id or hash of [field_name] => [field_value]
	 * @return mixed - Countrycodes or null if no record found.
	 **/
	public static function constructByKey($idOrHash, $forPhp5Strict = '') {
		return CoughObject::constructByKey($idOrHash, 'Countrycodes');
	}
	
	/**
	 * Constructs a new Countrycodes object from custom SQL.
	 * 
	 * @param string $sql
	 * @return mixed - Countrycodes or null if exactly one record could not be found.
	 **/
	public static function constructBySql($sql, $forPhp5Strict = '') {
		return CoughObject::constructBySql($sql, 'Countrycodes');
	}
	
	/**
	 * Constructs a new Countrycodes object after
	 * checking the fields array to make sure the appropriate subclass is
	 * used.
	 * 
	 * No queries are run against the database.
	 * 
	 * @param array $hash - hash of [field_name] => [field_value] pairs
	 * @return Countrycodes
	 **/
	public static function constructByFields($hash) {
		return new Countrycodes($hash);
	}
	
	public function notifyChildrenOfKeyChange(array $key) {
		foreach ($this->getPeople_Collection() as $people) {
			$people->setCountrycodesId($key['countrycodes_id']);
		}
	}
	
	public static function getLoadSql() {
		$tableName = Countrycodes::getTableName();
		return '
			SELECT
				`' . $tableName . '`.*
			FROM
				`' . Countrycodes::getDbName() . '`.`' . $tableName . '`
		';
	}
	
	// Generated attribute accessors (getters and setters)
	
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
	
	// Generated one-to-one accessors (loaders, getters, and setters)
	
	// Generated one-to-many collection loaders, getters, setters, adders, and removers
	
	public function loadPeople_Collection() {
		
		// Always create the collection
		$collection = new People_Collection();
		$this->setPeople_Collection($collection);
		
		// But only populate it if we have key ID
		if ($this->hasKeyId()) {
			$db = People::getDb();
			$tableName = People::getTableName();
			$sql = '
				SELECT
					`' . $tableName . '`.*
				FROM
					`' . People::getDbName() . '`.`' . $tableName . '`
				WHERE
					`' . $tableName . '`.`countrycodes_id` = ' . $db->quote($this->getCountrycodesId()) . '
			';

			// Construct and populate the collection
			$collection->loadBySql($sql);
			foreach ($collection as $element) {
				$element->setCountrycodes_Object($this);
			}
		}
	}
	
	public function getPeople_Collection() {
		if (!isset($this->collections['People_Collection'])) {
			$this->loadPeople_Collection();
		}
		return $this->collections['People_Collection'];
	}
	
	public function setPeople_Collection($peopleCollection) {
		$this->collections['People_Collection'] = $peopleCollection;
	}
	
	public function addPeople(People $object) {
		$object->setCountrycodesId($this->getCountrycodesId());
		$object->setCountrycodes_Object($this);
		$this->getPeople_Collection()->add($object);
		return $object;
	}
	
	public function removePeople($objectOrId) {
		$removedObject = $this->getPeople_Collection()->remove($objectOrId);
		if (is_object($removedObject)) {
			$removedObject->setCountrycodesId(null);
			$removedObject->setCountrycodes_Object(null);
		}
		return $removedObject;
	}
	public function __destruct()
	{
		parent::__destruct();
		unset($this);
	}

}

?>
