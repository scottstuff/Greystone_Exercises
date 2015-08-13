<?php

$app = 'greystone';
$bind = 'Person';
$action = '__defaultAction';
$view_display = 'Exercise1';
$execute = new Index();

class Index
{
	public function __construct()
	{
		require_once('config/config.php');
		if (isset($_POST['app'])) {
			$app = $_POST['app'];
		} elseif (isset($_GET['app'])) {
			$app = $_GET['app'];
		} else {
			$app = 'greystone';
		}
		if (isset($_POST['bind'])) {
			$bind = $_POST['bind'];
		} elseif (isset($_GET['bind'])) {
			$bind = $_GET['bind'];
		} else {
			$bind = 'Person';
		}
		if (isset($_POST['action'])) {
			$action = $_POST['action'];
		} elseif (isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = '__defaultAction';
		}
		if (isset($_POST['view_display'])) {
			$view_display = $_POST['view_display'];
		} elseif (isset($_GET['view_display'])) {
			$view_display = $_GET['view_display'];
		} else {
			$view_display = 'Exercise1';
		}
		$this->app = $app;
		$this->bind = $bind;
		$this->action = $action;
		$this->view_display = $view_display;

		require_once(MVC_BASE_PATH.'/mvc/MVC_Object.php');
		require_once(MVC_BASE_PATH.'/mvc/MVC_DB.php');
		require_once(MVC_BASE_PATH.'/mvc/MVC_App.php');
		require_once(MVC_BASE_PATH.'/mvc/MVC_View.php');
		require_once(MVC_BASE_PATH.'/mvc/MVC_DefaultView.php');

		Index::__defaultController();
	}

	function __autoload($bind)
	{
		require_once(MVC_BASE_PATH.'/MVC_Object.php');
	}
	
	// Default Controller method the get POST or GET request and direct to model.
	public function __defaultController() {

		// Include only the Class needed
		$app = $this->app;
		$bind = $this->bind;
		$action = $this->action;
		$view_display = $this->view_display;

		$classFile = MVC_BASE_PATH.'/apps/greystone/models/'.$bind.'.php';
		$classView = MVC_BASE_PATH.'/apps/greystone/views/'.$view_display.'.php';
		$classAction = MVC_BASE_PATH.'/'.$bind.'.php?action='.$action;
		
		// Load and verify Class
		require_once($classFile);

		if (class_exists($bind)) {
			try {
				$instance = new $bind();
				if(!MVC_App::isValid($instance)) {
					die('Not the object I am looking for.');
				}				
			} catch (Exeception $e) {
				echo 'Message: ' .$e->getMessage();
				die("The requested class does not exists!");
			}
		} else {
			echo 'Message: Danger, Danger, Will Robinson!' ;
			die("The requested class does not exists!");
		}

		$instance->appName = $app;
		$result = array();

		// Execute and verify Class Action
		try {
			$result = $instance->$action();
		} catch (Exeception $e) {
			echo 'Message: ' .$e->getMessage();
			die("No action found.");
		}

		//Send the model results to view
		$view = MVC_View::factory($instance->view,$instance);

		$view->app = $app;
		$view->bind = $bind;
		$view->action = $action;
		$view->view_display = $view_display;

		$view->display();

	}

    public function __destruct()
    {
        unset($execute);
    }

}
?>
