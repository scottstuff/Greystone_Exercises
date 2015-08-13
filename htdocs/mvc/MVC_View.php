<?php

	/**
	* 
	* MVC_View
	* 
	* Main view class. Uses a factory to produce view.
	*
	*/
	class MVC_View
	{

		static public function factory($viewClass,MVC_App $appObject)
		{
			$file = MVC_BASE_PATH.'/apps/greystone/views/'.$viewClass.'.php';
			if (require($file)) {
				if (class_exists($viewClass)) {
					$view = new $viewClass($appObject);
					if ($view instanceof MVC_DefaultView) {
						return $view;
					}
					echo 'Bad view.';
					return false;
				}
				echo 'View not found.';
				return false;
			}
			echo 'View not found.';
			return false;
		}
	}

?>
