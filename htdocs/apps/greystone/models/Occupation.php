<?php

class Occupation extends MVC_App {
	
	protected $occupations_id;
	protected $name;
	
	public $view = 'OccupationView';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function __defaultAction()
	{
		return Occupation::__construct();
	}

	public static function get_all_occupations()
	{
		return MVC_DB::query_it('SELECT * from occupations;');
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
