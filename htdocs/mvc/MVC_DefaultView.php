<?php

  /**
  * MVC_DefaultView
  *
  */

abstract class MVC_DefaultView extends MVC_DB
{
    public function __construct(MVC_App $app_view)
    {
    	parent::__construct();
    }

    abstract public function display();

    public function __destruct()
    {
        parent::__destruct();
    }
}

?>
