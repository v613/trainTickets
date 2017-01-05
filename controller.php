<?php
/* Controller */
class Controller
	{
		var $Model;
		function __construct($model)
			{
				$this->Model=$model;
			}
		public function changeTitle()
			{
				$this->Model->PageTitle="ROTT MVC";
				return $this->Model->PageTitle;
			}
	}
?>