<?php

  /**
  * MVC_App
  * 
  * The base app class. All model classes extend from this class.
  */
  abstract class MVC_App extends MVC_DB
  {
//      public $presenter = 'smarty';
//      protected $data = array();
      public $bindName;
//      public $tplFile;
//      public $moduleName = null;
//      public $pageTemplateFile = null;
      public function __construct()
      {
          parent::__construct();
      }

      abstract public function __defaultAction();

      public function getData()
      {
          return $this->data;
      }

      public static function isValid($app_Object)
      {
          return (is_object($app_Object) && 
                  $app_Object instanceof MVC_App);
      }

      // Clean up
      public function __destruct()
      {
          parent::__destruct();
      }
  }

?>
