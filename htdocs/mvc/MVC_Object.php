<?php

  /**
  * MVC_Object
  *
  * Foundational MVC Class.
  *
  */
  abstract class MVC_Object
  {

      protected $me;

      public function __construct()
      {
          $this->me = new ReflectionClass($this);
      }


		// Clean up MVC Object
		public function __destruct()
		{
			if (isset($this->me)) {
				unset($this->me);
			}
		}
	}

?>
