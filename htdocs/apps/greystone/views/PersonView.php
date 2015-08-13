<?php

class PersonView extends MVC_DefaultView
{
	
	public function display () {

		include (MVC_BASE_PATH."/apps/".$this->app."/views/".strtolower($this->view_display).".php");
		$ex = new $this->view_display;
	}
}
