<?php

class __defaultView extends MVC_DefaultView
{
	protected $display_view = '__defaultView';
	
	public function display () {

		include (MVC_BASE_PATH."/apps/".$this->app."/views/".strtolower($this->view_display).".php");
		$ex = new $this->view_display;
	}
}
