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
//		$this->user = new FR_User();
//		$this->session = FR_Session::singleton();
	}

	public function __default()
	{
		$this->__construct();
	}

	public function initPerson()
	{
	
//		$sql_string = 'SELECT * from countrycodes;';
//		$countrycodes_result = query_it($sql_string);
//echo mysql_num_rows($countrycodes_result);
//		$sql_string = 'SELECT * from occupations;';
//		$occupations_result = mysql_query($sql_string, $this->dbLink);
//echo mysql_num_rows($occupations_result);
//		$newPerson = new $this;
//		$return_array = array('person' => $newPerson, 'countrycodes' => $countrycodes_result, 'occupations' => $occupations_result);
//		var_dump($occupations_result);
		return true;
//		return $return_array;
//		return array('person' => $newPerson, 'countrycodes' => $countrycodes_results, 'occupations' => $occupation_results);

	}
	
	public function addPerson() 
	{
		echo '<h1>hi</h1>';
		var_dump($_POST);
		echo '<h1>hi 22</h1>';
		var_dump ($this);
echo '<h3>new Person2 </h3>';
var_dump ($person);
		echo '<h1>hi 3</h1>';

		$this->setFld('countrycodes_id', $_POST['countrycodes_id']);
		$this->setFld('occupations_id', $_POST['occupations_id']);
		$this->setFld('name', $_POST['name']);
		$this->setFld('email', $_POST['email']);
		$this->setFld('email_visable', $_POST['email_visable']);
		$this->setFld('gender', $_POST['gender']);
		$this->setFld('age', $_POST['age']);
		$sql_insert = 'INSERT INTO `people` (countrycodes_id, occupations_id, name, email, email_visable, gender, age) VALUES (';
		$sql_insert .= $this->countrycodes_id.', '.$this->occupations_id.', '.$this->name.', '.$this->email.', '.$this->email_visable.', '.$this->gender.', '.$this->age.')';
		echo $sql_insert;

		return $this->query_it($sql_insert);
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
