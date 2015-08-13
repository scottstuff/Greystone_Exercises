<?php

class Person extends MVC_App {
	
	protected $people_id;
	protected $countrycodes_id;
	protected $occupations_id;
	protected $name;
	protected $email;
	protected $email_visable;
	protected $gender;
	protected $occupations_result;
	
	public $view = 'PersonView';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function __defaultAction()
	{
		$this->__construct();
	}

	public function initPerson()
	{
		return true;
	}
	
	public function addPerson() 
	{
		return true;
	}

	public function __destruct()
	{
		parent::__destruct();
		mysql_close($this->dbLink);
		$connection = false;
		unset($this);
	}

}

?>
